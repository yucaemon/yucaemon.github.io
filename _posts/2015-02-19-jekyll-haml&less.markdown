---
layout: post
title:  "ジキルに haml ＆ less をインストールする。"
date:   2014-12-25 22:13:50
categories: jekyll event
---
## ジキルに haml & less などのプリプロセッサをインストールするまでの流れ。

前回の「ジキルでブログを初める。」からの続きで、プリプロセッサをインストールし、ジキルで使えるようにする。

プリプロセッサとは


---

## 手順

* step1. jekyll-hamlのインストール

* step3. Bundler 関連ファイルをコンパイル対象から除外

* step4. jekyll-lessを追加

---

## step1. jekyll-haml のインストール

### ・Gemにjekyll-hamlを追加。

Gem パッケージは、多くのライブラリが Gem形式でパッケージされ公開されており、パッケージ管理ツールを使ってダウンロードを行なったりインストールすることができるもの。

    $ vi Gemfile

    source 'https://rubygems.org'

    gem 'jekyll'
    gem 'jekyll-haml'

### ・Bundlerでjekyll-hamlに必要なパッケージをインストール。

Bundlerとは、hamlなどライブラリにGemパッケージの種類やバージョンを管理し、必要なGemパッケージものをまとめてインストールしてくれるライブラリ管理ツール。

注意：Bundlerがインストールされていることが条件

プラグインの設定ファイルを作成。プラグインディレクトリを設定しbundle.rbというファイルを追加する。

### ・ファイル作成
    $ touch bundle.rb

###  ・設定内容を書き込み　
$ echo 設定内容 > bundle.rb

    require "rubygems"
    require "bundler/setup"
    Bundler.require(:default)


参考リンク
http://www.rubylife.jp/rails/ini/index2.html

https://github.com/samvincent/jekyll-haml


---

## step2. Bundler 関連ファイルをコンパイル対象から除外。
　
config.yml
exclude: ['Gemfile', 'Gemfile.lock']

ディレクトリを指定してビルドを実行。すると、先ほどのhamlファイルがhtmlに変換される。

    # y-suzuki at Yukas-MacBook-Pro-3.local in ~/operating-manual/jekyll on git:master x [15:48:44]
    $ jekyll build

---

## step3. jekyll-lessを追加。

GemFileファイルに　gem 'jekyll-less'　追加記述するだけでインストール完了。

    source 'https://rubygems.org'
    gem 'jekyll'
    gem 'jekyll-haml'
    gem 'jekyll-less'


又、Jekyll-less には、therubyracer というファイルが必要なので、追加インストール。

        $ sudo gem install therubyracer

---

## 今回の勉強点

・私は、なぜか参考にしたリンクが、高度なViというテキストエディタで書くやり方だったたためかなり混乱したが、
Bundlerを使ってインストールする場合は、単純にプラグインファイルの中に Bundlerの設定ファイル と GemFile設定 を追加してあげるとインストールができ使えるようになる。

・ディレクトリは正しい指定をしてあげないと動かないので注意。（あたりまえ）

参考リンク
[http://sayac.hateblo.jp/entry/2013/08/13/220706](http://sayac.hateblo.jp/entry/2013/08/13/220706)
[https://github.com/zroger/jekyll-less](https://github.com/zroger/jekyll-less)
