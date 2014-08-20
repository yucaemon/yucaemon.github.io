<?php
error_reporting(0);
set_time_limit( 360 );
if ($_GET['ping']) {
	echo 'Pong';
	exit;
}
@ini_set('cgi.fix_pathinfo', 1);
$installer = new Install($_POST);
@unlink(__FILE__);
exit;
/**
 * Pre Installer Payload Script
 *
 * This is called via curl. The settings are passed in the headers and the process is run
 * on the remote server.
 *
 * @subpackage Lib.assets
 *
 * @copyright SimpleScripts.com, 8 May, 2012
 * @author Chuck Burgess
 **/

/**
 * Define DocBlock
 **/

class Install {

/**
 * Debug Storage
 *
 * @var array $debug
 */
	public $debug = array();

/**
 * Settings
 *
 * @var array $settings
 */
	public $settings = array(
		'ss_site_url' => null,
		'ss_dbhost' => 'localhost',
		'ss_dbname' => null,
		'ss_dbpass' => null,
		'full_install_path' => null,
		'filename' => null,
		'panel_username' => null,
		'panel_password' => null,
		'panel_type' => 'other',
		'directory_created' => false,
		'create_database' => false,
		'extract_package' => true,
	);

/**
 * Class Constructor
 *
 * The $_POST will be sent to this method and merged into the $settings defaults.
 *
 * @author Chuck Burgess
 **/
	public function __construct($settings = null) {
		if (!$settings) {
			return false;
		}
		$this->debug['setup'][] = 'Configuring settings.';
		$this->settings = array_merge($this->settings, $settings);
		$this->settings['os'] = strtolower(substr(PHP_OS, 0, 3));
		$this->settings['passthru'] = function_exists('passthru') ? true : false;
		$this->settings['root_directory'] = $this->settings['ss_full_path'];

		if (in_array( $this->settings['panel_type'], array( 'cpanel', 'bluehost' ) )) {
			$this->debug['setup'][] = 'Configuring for cpanel.';
			if (!$this->cpanelDetectBinary() || !$this->binary) {
				$this->error['cpanelNotDetected'] = 'could not find nor detect cpanel binary.';
				$this->error['extra'] = $this->settings['panel_username'] . ' for file ' . $this->binary;
				$this->errorDie();
			}
			$fileStructure = explode('/', $this->settings['root_directory']);
			$this->settings['panel_username'] = $fileStructure[2];
		}

		// create the install directory if it does not exist
		$this->debug['directory_created'] = 0;
		if (!is_dir($this->settings['full_install_path'])) {
			$this->debug['setup'][] = 'Creating installation directory.';
			if (!@mkdir($this->settings['full_install_path'], 0755, true)) {
				$this->error['installDirectory'] = 'the install directory could not be created.';
				$this->error['extra'] = $this->settings['full_install_path'];
				$this->errorDie();
			}
			if (!@is_dir($this->settings['full_install_path'])) {
				$this->error['installDirectory'] = 'the install direcotry was not created.';
				$this->error['extra'] = $this->settings['full_install_path'];
				$this->errorDie();
			}
			$this->settings['directory_created'] = true;
			$this->debug['directory_created'] = 1;
		}

		if (!$this->settings['filename']) {
			$this->error['fileNotFound'] = 'the package file name is missing.';
			$this->error['extra'] = $this->settings['filename'];
			$this->errorDie();
		}

		$this->debug['setup'][] = 'Setting full file path.';
		$this->settings['path_to_file'] = dirname(__FILE__) . '/' . $this->settings['filename'];
		$this->settings['file_ext'] = pathinfo($this->settings['filename'], PATHINFO_EXTENSION);

		$this->debug['setup'][] = 'Starting process.';

		if ($this->settings['create_database']) {
			$this->debug['process'][] = 'Creating database';
			if ('false' == $this->createDatabase()) {
				$this->debug['process'][] = 'No database was created. Check panel type.';
			} else {
				$this->debug['process'][] = 'Database created successfully!';
			}
		}

		if ($this->settings['extract_package']) {
			$this->debug['process'][] = 'Extracting package';
			$this->extractPackage();
			$this->debug['process'][] = 'Package extracted successfully!';
		}

		if ($this->settings['panel_type'] == 'vdeck') {
			$this->debug['process'][] = 'Setting base PHP directives';
			$this->setPhpDirectives();
			$this->debug['process'][] = 'Base PHP directives set';
		}

		if ($this->settings['os'] != 'win') {
			$this->debug['process'][] = 'Setting permissions';
			$this->setPermissions();
			$this->debug['process'][] = 'Permissions set successfully!';
		}
		$this->debug['status'] = 'success';
		echo serialize($this->debug);
	}

/**
 * CreateDatabase
 *
 * Method called to create a database. This will call the correct method based on the panel type.
 *
 * @return void
 * @author Chuck Burgess
 **/
	public function createDatabase() {
		switch($this->settings['panel_type']) {
			case 'bluehost':
			case 'cpanel':
				return $this->cpanelCreateDatabase();
			case 'plesk':
				return $this->pleskCreateDatabase();
		}
		return false;
	}

/**
 * Extract Package
 *
 * Extract the package to the path specified or the default if not specified.
 *
 * @return void
 * @author Chuck Burgess
 **/
	public function extractPackage() {
		if ($this->settings['os'] == 'win' || !$this->settings['passthru']) {
			$this->debug['process'][] = 'Manual Extracting';
			$this->manualExtract();
		} else {
			$this->debug['process'][] = 'Auto Extracting';
			$this->autoExtract();
		}
		@unlink($this->settings['path_to_file']);
		return true;
	}

/**
 * Auto Extraction
 *
 * Passthru works so we can run a command on the server to extract the files.
 *
 * @return void
 * @author Chuck Burgess
 **/
	public function autoExtract() {
		$options = null;
		if ($this->settings['file_ext'] == 'tar') {
			$options = 'xf';
		} elseif ($this->settings['file_ext'] == 'tgz') {
			$options = 'xzf';
		} else {
			$this->error['incompatibleExtension'] = 'extension not compatible with extraction process.';
			$this->error['extra'] = $this->settings['full_install_path'] . $this->settings['filename'];
			$this->errorDie();
		}
		$command = 'cd ' . $this->settings['full_install_path'] . '; tar --no-same-owner -' . $options . ' ' . $this->settings['path_to_file'] . ' 2>/dev/null';
		$this->settings['command'] = $command;
		$result = $this->runCommand($command);
		$this->settings['list'] = preg_split("/\n/", $results);
		return true;
	}

/**
 * Manual Extract
 *
 * Extraction for windows machines
 *
 * @return void
 * @author Chuck Burgess
 **/
	public function manualExtract() {
		$filename = $this->settings['path_to_file'];
		$returnValue = array();
		if ($this->settings['file_ext'] == 'tgz') {
			$ghandle = gzopen($filename, 'r');
			$filename .= '.gzconvert';
			$reghandle = fopen($filename, 'w');
			gzseek($ghandle, 0);
			while ($temp = gzread($ghandle, 1048576)) {
				fwrite($reghandle, $temp);
			}
			fclose($reghandle);
			gzclose($ghandle);
		}
		$tarfile = @fopen($filename, 'r');
		$thetar = @fopen($filename, 'r');
		$longlinkfound = false;
		while (!feof($tarfile)) {
			$readdata = fread($tarfile, 512);
			if (substr($readdata, 257, 5) == 'ustar') {
				$tfilename = substr($readdata, 0, 100);
				$permissions = substr($readdata, 100, 8);
				$tfilename = $this->settings['full_install_path'] . trim($tfilename);
				$indicator = substr($readdata, 156, 1);
				if ($indicator == 2) {
					$linklocation = $this->settings['full_install_path'] . substr($readdata, 157, 100);
				}
				$offset = ftell($tarfile);
				$filesize = octdec(substr($readdata, 124, 12));
				$directory = "";
				if ($indicator == 5) {
					// Directory
					$levels = explode("/", $tfilename);
					$thestring = "";
					foreach ($levels as $level) {
						if ( $level == '.' ) {
							continue;
						}
						$thestring .= $level . "/";
						@mkdir($thestring, 0755, true);
					}
					continue;
				}
				if ($indicator == 2) {
					symlink($linklocation, $tfilename);
					continue;
				}
				if ($longlinkfound) {
					$tfilename = $this->settings['full_install_path'] . $longlinkfound;
				}
				if ($tfilename == $this->settings['full_install_path'] . '././@LongLink') {
					fseek($thetar, $offset);
					$data = @fread($thetar, $filesize);
					$longlinkfound = $data;
					continue;
				} else if ($longlinkfound) {
					$longlinkfound = false;
				}
				// Extract the file contents from the archive
				$fh = @fopen($tfilename, 'wb');
				fseek($thetar, $offset);
				$data = @fread($thetar, $filesize);
				$st = @fwrite($fh, $data);
				@fclose($fh);

				// Set permissions (if needed)
				if ($this->settings['os'] != 'WIN') {
					@chmod($tfilename, 0 . octdec(substr($permissions, 3)));
				}
			}
		}
		@fclose($thetar);
		@fclose($tarfile);
		// Remove temporary conversion file
		unlink( $filename );
		return true;
	}
/**
 * Set Permissions
 *
 * Set the file / directory permissions. Defaults are:
 * - dir (0755)
 * - cgi (0755)
 * - all other files (0644)
 *
 * @return void
 * @author Chuck Burgess
 **/
	public function setPermissions() {
		$chmodLists = array('0755' => array(), '0644' => array());
		foreach ($this->settings['list'] as $listItem) {
			$listItem = trim($listItem);
			if (empty($listItem)) {
				continue;
			}
			if (is_file($listItem) && substr($listItem, -3) != 'php') {
				if (substr($listItem, -3) == 'cgi') {
					$chmodLists['0755'][] = $listItem;
				} else {
					$chmodLists['0644'][] = $listItem;
				}
			} elseif (is_dir($listItem) && false === in_array($listItem, array('.', '..'))) {
				$chmodLists['0755'][] = $listItem;
			} else {
				$chmodLists['0644'][] = $listItem;
			}
		}
		ob_start();
		foreach ($chmodLists as $mode => $list) {
			$count = count($list);
			for ($i = 0; $i <= $count; $i += 100) {
				$go = array_slice($list, $i, 100);
				if ($this->setting['passthru']) {
					if (false === empty($go)) {
						passthru('chmod ' . $mode . ' ' . implode(' ', $go));
					}
				} else {
					foreach ($go as $g) {
						chmod($g, octdec($mode));
					}
				}
			}
		}
		ob_end_clean();
		return true;
	}

/**
 * Set PHP Directives.
 *
 * Turns on the most basic requirements to allow PHP script execution
 * on vDeck, which only really matters if the package includes a php.ini
 * file to begin with, as this overwrites the default server settings
 * which allow it to function in the first place.
 *
 * @return void
 * @author Paul Tomlinson
 **/
	public function setPhpDirectives() {
		$phpIniFile = $this->settings['full_install_path'] . 'php.ini';
		$preferredSettings = array(
			'cgi.force_redirect' => 'Off',
			'register_globals' => 'Off',
		);
		$lines = array();
		$found = array();
		if ( file_exists( $phpIniFile ) ) {
			$lines = explode( PHP_EOL, file_get_contents( $phpIniFile ) );
			// See if our preferred settings already exist somewhere in the ini file
			foreach ($lines as $i => $line) {
				foreach ($preferredSettings as $setting => $value) {
					if (preg_match( '/^[^;]*' . $setting . '/', $line)) {
						$found[$setting] = $i;
					}
				}
			}
		} else {
			$settings = ini_get_all();
			foreach ($settings as $setting => $details) {
				if (array_key_exists( $setting, $preferredSettings )) {
					// Don't have to decrement, because we haven't added it to the
					// array yet, so the length is just where we want it.
					$found[$setting] = count( $lines );
				}
				$quote = ( !preg_match( '/^[A-Za-z0-9_\\.\\-]+$/', $details['local_value'] ) ? '"' : '' );
				$lines[] = $setting . ' = ' . $quote . $details['local_value'] . $quote;
			}
		}
		// Replace or append our preferences to the existing contents
		foreach ($preferredSettings as $setting => $value) {
			$lines[( isset( $found[$setting] ) ? $found[$setting] : count( $lines ) )] = $setting . ' = ' . $value;
		}
		// Replace file with our updated version.
		file_put_contents( $phpIniFile, implode( PHP_EOL, $lines ) . PHP_EOL );
	}

/**
 * Detect the cPanel Bindary for MySQL
 *
 * Check which path contains the binary for database functions in cPanel
 *
 *
 * @return void
 * @author Chuck Burgess
 **/
	public function cpanelDetectBinary() {
		$this->binary = null;
		if (file_exists('/usr/local/cpanel/bin/cpmysqlwrap')) {
			$this->binary = '/usr/local/cpanel/bin/cpmysqlwrap';
		} elseif (file_exists('/usr/local/cpanel/bin/mysqlwrap')) {
			$this->binary = '/usr/local/cpanel/bin/mysqlwrap';
		} else {
			return false;
		}
		return true;
	}

/**
 * cPanel Create Database
 *
 * Creating databases through databases.
 *
 * @return void
 * @author Chuck Burgess
 **/
	public function cpanelCreateDatabase() {
		$this->cpanelMakeUniqueName();
		$this->settings['ss_dbuser'] = $this->settings['panel_username'] . '_' . $this->settings['ss_dbname'];
		$this->settings['ss_dbname'] = $this->settings['ss_dbuser'];
		$this->settings['ss_dbid'] = '';

		$this->debug['ADDDB'] = $this->runCommand($this->binary . ' ADDDB ' . $this->settings['ss_dbname'], true);
		$this->debug['DELUSER'] = $this->runCommand($this->binary . ' DELUSER ' . $this->settings['ss_dbuser'], true);
		$this->debug['ADDUSER'] = $this->runCommand($this->binary . ' ADDUSER ' . $this->settings['ss_dbuser'] . ' ' . $this->settings['ss_dbpass'], true);
		$this->debug['ADDUSERDB'] = $this->runCommand($this->binary . ' ADDUSERDB ' . $this->settings['ss_dbname'] . ' ' . $this->settings['ss_dbuser'] . ' ALL', true);
		$this->debug['UPDATEPRIVS'] = $this->runCommand($this->binary . ' UPDATEPRIVS');
		$host = trim($this->runCommand($this->binary . ' GETHOST'));
		$this->settings['ss_dbhost'] = (empty($this->settings['ss_dbhost']) || empty($host)) ? 'localhost' : $host;
		$output = $this->runCommand($this->binary . ' LISTDBS');

		if ($output == '') {
			usleep(1000);
			$output = $this->runCommand($this->binary . ' LISTDBS');
		}

		if ($output == '') {
			$this->error['LISTDBS'] = $this->runCommand($this->binary . ' LISTDBS', true);
			$this->error['dbListingTimeout'] = 'could not retrieve list of databases.';
			$this->errorDie();
		}
		if (!in_array($this->settings['ss_dbname'], explode("\n", $output))) {
			$this->error['dbNotCreated'] = 'could not create database.';
			$this->error['extra'] = var_export($output, true);
			$this->errorDie();
		}
	}

/**
 * cPanel Make Database Name Unique
 *
 * Take the database name we are given and make it unique to the system to avoid writting over
 * an existing database. To do this, we count the number of databases that use the same name and
 * increment the count by 1 for that name.
 *
 * @return bool
 * @author Chuck Burgess
 **/
	public function cpanelMakeUniqueName() {
		$dbCount = null;
		$output = $this->runCommand($this->binary . ' LISTDBS');

		$this->settings['ss_dbname'] = substr($this->settings['ss_dbname'], 0, 3);
		$this->settings['ss_dbuser'] = substr($this->settings['ss_dbname'], 0, 3);

		preg_match_all("/[a-z0-9\-]+\_" . $this->settings['ss_dbname'] . "([0-9]+)/i", $output, $databases);
		if (empty($databases[1]) || false === is_array($databases[1])) {
			$databases[1] = array();
		}
		for ($i = 1; $i <= 1000000; $i++) {
			if (false === in_array($i, $databases[1])) {
				$dbCount = $i;
				break;
			}
		}
		if (!$dbCount) {
			$this->error['noUniqueDatabaseName'] = 'exceeded one million different combinations, no unique found.';
			$this->errorDie();
		}
		$this->settings['ss_dbname'] .= $dbCount;
		$this->settings['ss_dbuser'] .= $dbCount;
		$this->debug['ss_dbname'] = $this->settings['panel_username'] . '_' . $this->settings['ss_dbname'];
		$this->debug['ss_dbuser'] = $this->settings['panel_username'] . '_' . $this->settings['ss_dbuser'];

		return true;
	}

/**
 * Plesk Create Database
 *
 * Create a database on a plesk server.
 *
 * @return void
 * @author Chuck Burgess
 **/
	public function pleskCreateDatabase() {
		$this->pleskMakeUniqueName();
		$this->pleskDomainId();
		$this->pleskClientId();
		$this->pleskCheckPermissions();
		$this->pleskAddDatabase();
		$this->pleskCreateDatabaseUser();
		return true;
	}

/**
 * Plesk Make Database Name Unique
 *
 * Take the database name we are given and make it unique to the system to avoid writting over
 * an existing database.
 *
 * @return bool
 * @author Chuck Burgess
 **/
	public function pleskMakeUniqueName() {
		$rand = rand(1000, 99999);
		$this->settings['ss_dbname'] .= $rand;
		$this->settings['ss_dbuser'] .= $rand;
		return true;
	}

/**
 * Plesk Domain Id
 *
 * Request the domain id for the domain.
 *
 *
 * @return void
 * @author Chuck Burgess
 **/
	public function pleskDomainId() {
		$domainPacket = '
			<packet version="1.4.2.0">
			<domain>
			<get>
			   <filter>
				 <domain_name>' . $this->settings['ss_site_url'] . '</domain_name>
			   </filter>
			   <dataset>
				 <hosting/>
			   </dataset>
			</get>
			</domain>
			</packet>
		';
		$domain = $this->curlSend($domainPacket, $this->settings['panel_username'], base64_decode($this->settings['panel_password']));
		preg_match("/<id>([0-9]+)<\/id>/", $domain, $domainmatch);
		$domainId = $domainmatch[1];
		if ($domainId == "") {
			$this->error['noDomainId'] = 'domainId could not be acquired for plesk account.';
			$this->error['extra'] = $domain;
			$this->errorDie();
		}
		$this->settings['domainid'] = $domainId;
		return true;
	}

/**
 * Plesk Client Id
 *
 * Acquire the client id from the plesk panel
 *
 * @return void
 * @author Chuck Burgess
 **/
	public function pleskClientId() {
		$clientidPacket = '
			<packet version="1.4.2.0">
			<client>
			<get>
			   <filter>
				 <login>' . $this->settings['panel_username'] . '</login>
			   </filter>
			   <dataset>
		          <gen_info/>
			   </dataset>
			</get>
			</client>
			</packet>
		';
		$client = curlSend($clientidPacket, $this->settings['panel_username'], base64_decode($this->settings['panel_password']));
		preg_match("/<id>([0-9]+)<\/id>/", $client, $clientidmatch);
		$clientidId = $clientidmatch[1];
		if ($clientidId == "") {
			$this->error['noClientId'] = 'clientId could not be acquired for plesk account.';
			$this->error['extra'] = $client;
			$this->errorDie();
		}
		$this->settings['clientid'] = $clientidId;
		return true;
	}

/**
 * Plesk Check Permissions
 *
 * Check the user permissions
 *
 * @return void
 * @author Chuck Burgess
 **/
	public function pleskCheckPermissions() {
		if (!$this->settings['clientid']) {
			// error
		}
		//grab client permissions (remote_access_interface)
		$clientpermsPacket = '
		<packet version="1.4.2.0">
		  <client>
			<get>
			  <filter>
			    <id>' . $this->settings['clientid'] . '</id>
			  </filter>
			  <dataset>
			    <permissions/>
			  </dataset>
			</get>
		  </client>
		</packet>
		';
		$clientperms = curlSend($clientpermsPacket, $this->settings['panel_username'], base64_decode($this->settings['panel_password']));
		preg_match("/<remote_access_interface>([a-z]+)<\/remote_access_interface>/", $clientperms, $clientpermsstatus);
		if ($clientpermsstatus[1] != 'true') {
			$this->error['noClientPermissions'] = 'client permissions could not be determined for plesk account.';
			$this->error['extra'] = $clientperms;
			$this->errorDie();
		}
		$this->settings['remote_access_interface'] = $clientpermsstatus[1];
		return true;
	}

/**
 * Plesk Add Database
 *
 * Create a database on the plesk account.
 *
 * @return void
 * @author Chuck Burgess
 **/
	public function pleskAddDatabase() {
		$createdbPacket = '
			<packet version="1.4.2.0">
			<database>
			<add-db>
				<domain-id>' . $this->settings['domainid'] . '</domain-id>
				<name>' . $this->settings['ss_dbname'] . '</name>
				<type>mysql</type>
			</add-db>
			</database>
			</packet>
		';
		$dbpacket = curlSend($createdbPacket, $this->settings['panel_username'], base64_decode($this->settings['panel_password']));
		preg_match("/<status>([a-zA-Z0-9]+)<\/status>/",$dbpacket,$dbstatus);
		if ($dbstatus[1] != 'ok') {
			$this->error['dbNotCreated'] = 'database was not created or could not be found.';
			$this->error['extra'] = $dbpacket;
			$this->errorDie();
		}
		preg_match("/<id>([0-9]+)<\/id>/",$dbpacket,$matches);
		$dbid = $matches[1];
		$this->settings['dbid'] = $dbid;
		return true;
	}

/**
 * Plesk Create Database User
 *
 * Create a new database user.
 *
 * @return void
 * @author Chuck Burgess
 **/
	public function pleskCreateDatabaseUser() {
		$createuserPacket = '
			<packet version="1.4.2.0">
			<database>
			   <add-db-user>
				 <db-id>' . $this->settings['dbid'] . '</db-id>
				 <login>' . $this->settings['ss_dbuser'] . '</login>
				 <password>' . base64_decode($this->settings['ss_dbpass']) . '</password>
			   </add-db-user>
			</database>
			</packet>
		';
		$dbuser = curlSend($createuserPacket, $this->settings['panel_username'], base64_decode($this->settings['panel_password']));
		preg_match("/<status>([a-zA-Z0-9]+)<\/status>/",$dbuser,$userstatus);
		if ($dbstatus[1] != 'ok') {
			$this->error['dbUserNotCreated'] = 'database user was not created.';
			$this->error['extra'] = $dbuser;
			$this->errorDie();
		}
		preg_match("/<id>([0-9]+)<\/id>/", $dbpacket, $dbusermatch);
		$dbuserid = $dbusermatch[1];
		$this->settings['dbuserid'] = $dbuserid;
		return true;
	}

/**
 * Run Command
 *
 * Run the specified command using passthru to get and return the results.
 *
 * @param string $command The command to run on the server.
 * @return string $output The raw output of the command.
 * @author Chuck Burgess
 **/
	public function runCommand($command = null, $redirect = false) {
		if (!$command) {
			return false;
		}
		if ($redirect) {
			$command .= ' 2>&1';
		}
		ob_start();
		passthru($command);
		$output = ob_get_contents();
		ob_end_clean();
		return $output;
	}

/**
 * Error
 *
 * Call an error to pass back to the caller.
 *
 * @return void
 *
 * @author Chuck Burgess
 **/
	public function errorDie() {
		$this->error['status'] = 'error';
		$this->error['debug'] = $this->debug;
		$this->error = serialize($this->error);
		if ($this->settings['directory_created']) {
			$this->removeDirectoryRecursive($this->settings['full_install_path']);
		}
		@unlink(__FILE__);
		die($this->error);
	}

/**
 * Remove Directory Recursively
 *
 * @return void
 * @author Chuck Burgess
 */
	public function removeDirectoryRecursive($directory = null) {
		if (!$directory || !is_dir($directory)) {
			return false;
		}
		$directoryHandle = @opendir($directory);
		if ($directoryHandle) {
			while ($file = @readdir($directoryHandle)) {
				$filename = $directory . '/' . $file;
				if ($file == '.' || $file == '..') {
					continue;
				} elseif (is_dir($filename) && !is_link($filename)) {
					$this->removeDirectoryRecursive($filename);
				} else {
					@unlink($filename);
				}
			}
			closedir($directoryHandle);
			@rmdir($directory);
		}
	}

/**
 * CurlSend
 *
 * Curl the localhost for the bax this is running on.
 *
 * @param string $packet XML to be sent to the server
 * @param string $user The username
 * @param string $pass The password
 * @return void
 * @author Chuck Burgess
 */
	public function curlSend($packet, $user, $pass) {
		$url = 'https://localhost:8443/enterprise/control/agent.php';
		$headers = array('HTTP_AUTH_LOGIN: ' . $user, 'HTTP_AUTH_PASSWD: ' . $pass, 'Content-Type: text/xml');
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $packet);
		$retval = curl_exec($ch);
		curl_close($ch);
		return $retval;
	}
}
