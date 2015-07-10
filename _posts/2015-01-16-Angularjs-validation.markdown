---
layout: post
title:  "AngulrJSのバリデーションを使ってみる。"
date: "2015-01-1６"
---
## Angulrjsを使ってvalidationを登録フォームに適用してみた流れ。

 Angulrjsでinputフォームのバリデーション処理とエラーメッセージ表示のエラー処理を行ってみました。

環境：AngularJS 1.3

---

## 手順
* step1. inputフォームのバリデーション処理
* step2. エラーメッセージ項目表示の処理
* step3. エラー項目があれば、フォームを提出しない
* step4. エラー時にボタンをdisabledする
* step5. その他のバリデーション
* step6. エラーチェックのタイミングを制御する

----
## step1. inputフォームのバリデーション処理

### ・一度でも値を変更し、値が正しくなかったら、inputフォームの中を赤くするエラー処理。

__HTML(haml)__

 form → ``name``名を追加(記号以外)

 input → ``ng-model``名の追加、``ng-required``（必須項目）の追加

    form{:name =>'companyForm'}
    input{:type => 'text',:name =>'companyName','ng-model' =>'companyName','ng-required'=>'true'}

__CSS__

``.ng-invalid`` → 値が正しくなかったら、自動追加されるクラス

``.ng-dirty`` → 一度でも値を変更した時に追加されるクラス

上記セレクタ条件時にinputフォームが赤くなるようにスタイル設定。

    input.ng-dirty.ng-invalid{
    background-color:red;
    }

エラー時、inputフォームが赤くなる！成功。

![](/assets/images/Angular-validation/2.png)


---

###  ・一度でも値を変更し、値が正しかったら、inputフォームの中を緑にする

__CSS__

``.ng-valid`` → 値が正しかったら、自動追加されるクラス。

上記セレクタ条件時にinputフォームが青くなるようにスタイル設定。

    input.ng-valid.ng-dirty {
    background-color: #green;
    }

値が正しかったら、inputフォームが緑になる！成功。

![](/assets/images/Angular-validation/6.png)

---

### ・サブミット時、値が正しくなかったら、inputフォームの中を赤くするエラー処理

__CSS__

``ng-submitted`` →  submit時に自動追加されるクラス

  注意点：ng-submitというクラスがつくのはformであり、inputではない。

  submitted時に値、正しくない時

    form.ng-submitted input.ng-invalid,input.ng-invalid.ng-dirty {
    background-color: red;
    }

  submitted時、値が正しい時

    form.ng-submitted input.ng-valid, input.ng-valid.ng-dirty {
    background-color: green;
    }

![](/assets/images/Angular-validation/10.png)

---

## メモ
Angularのバリデーションでは、その条件該当するclass属性を自動追加してくれるのでcssのスタイル設定にすごく便利だった。

今回使ったものクラス属性

__ng-invalid__　inputの値が正しいかった場合

__ng-valid__　　inputの値が正しくなかった場合

__ng-dirty__　一度でもinputの値を変更した

---

## step2. エラーメッセージ表示の処理

### ・最初からでている必須項目のアラートメッセージを表示する。

最初にエラーメッセージ非表示の全体設定として、エラーチェックの対象となる場所の指定ができるようにname名を書いておく。

__HTML(haml)__

form → :name=>'signupform'　

input → :name=>'companyName'

    form.form-horizontal
    {:role=>'role',:name=>'signupform',:novalidate=>'novalidate','ng-submit'=>'submit(signupform.$vali, data)'}

    input
    { :type => 'text',:name=>'companyName','ng-model' =>'companyName','ng-required' =>'true' }

__HTML(haml)__

.notice → 'ng-if'=> 'signupform.companyName.$pristine'

条件に$pristine（一度も変更ない場合）のアラートの表示条件を追加。

.notice → 'ng-hide' =>'signupform.$submitted'

条件にアラートが他のメーメッセージ時とかぶらないようにする為に、formがサブミットされたら、hideする条件も追加。

      .notice{ 'ng-if'=> 'signupform.companyName.$pristine','ng-hide' =>'signupform.$submitted'}
        必須項目

必須項目の欄に最初からメッセージがでた！成功！

![](/assets/images/Angular-validation/4.png)

---

### 値変更後の値が正しい時に、成功マークのメッセージを表示する。

__HTML(haml)__

.success → 'ng-show' => '!signupform.companyName.$error.required'

successクラスに値がエラーではなかった場合（！）の条件を追加。

    .success{ 'ng-show' => '!signupform.companyName.$error.required' }
       .glyphicon.glyphicon-ok-circle

値が正しかった場合にinputの横のメッセージに緑アイコンのチェックマークがでた！

![](/assets/images/Angular-validation/13.png)

---

### 値変更後の値が正しくない時に、必須項目エラーメッセージを表示する。

__HTML(haml)__

.error → 'ng-show' => '!signupform.companyName.$error.required'

errorクラスに値がエラーだった場合の条件を追加。

    .error{ 'ng-if'=> 'signupform.companyName.$error.required && signupform.companyName.$dirty' }
      必須項目

値が正しくなかった場合（必須項目エラー時）にアラートメッセージがでた！

![](/assets/images/Angular-validation/3.png)

---

### 最初に読み込んだ時に出てしまうエラー表示を解消する。

__HTML(haml)__

.error →　signupform.companyName.$dirty

errorクラスに$dirty（一度でも値をいじった条件）を追加。

      .error{ 'ng-if'=> 'signupform.companyName.$error.required && signupform.companyName.$dirty' }
        必須項目

---
### メモ

必須項目のエラーメッセージは、ページが読み込むとすぐに空白を認知して、必須項目エラーを出してしまうのだが、
これはエラーの表示のタイミングが設定されておらず、常に表示になっていた為であり、``$dirty``の条件を追加することで解消できる。

役に立ったリンク：
http://tsuchikazu.net/angularjs-validation/

---

### ・サブミット時にエラーメッセージを表示する。

__HTML(haml)__

.error →  signupform.$submitted

前回の$dirty(一度でも値をいじった条件)の場所に$submitted(サブミットされた場合）の条件も追加。

注意:　$submitted　を使えるのは、バージョンAngular1.3からです。

      .error{ 'ng-if'=> 'signupform.companyName.$error.required && ( signupform.companyName.$dirty || signupform.$submitted )' }
        必須項目＊エラー

![](/assets/images/Angular-validation/12.png)


ここでかなり時間を食った。基本的なミスで、button が a になってていたため、ボタンとしての認知がされてなくて、sumitの認知できなかった。buttonのエレメントにsubmitいう属性を与えるだけでいい。

以下で解決。

    %button.btn.btn-lg.btn-default{ :type=> 'submit' }
        ボタン

$submittedの条件がうまく適用されない時（バージョンAngular1.3じゃない場合とか）、submitボタンのクリック時に値'true'にするfunctionを呼び出してあげる手動的な強引なやり方もあるやしいが。。この強引なやり方やるんだったら、バージョンAngular1.3にしちゃった方がいいだろうと。

参考まで。

    html
    .error{ 'ng-if'=> 'signupform.companyName.$error.required && ( signupform.companyName.$dirty ||submitted )' }
    %btn.btn-lg.btn-default{ :type=> 'submit','ng-click' => "submit()" }
       次へ

    controller.js
    .controller('vendorController', ['$scope', '$http', 'blockUI',
     function( $scope, $http, blockUI) {
        $scope.submit = function () {
            $scope.submitted = true;
        }
      }
    ])
---
###　メモ

$error.required（必須項目）を前提とした条件で、$dirty or（もしくは） $submitted　の条件も追加していることになる。

$submittedがバージョンがAngular3.１でないと使えない。（2015.01現在）

役に立ったリンク

http://stackoverflow.com/questions/18798375/show-validation-error-messages-on-submit-in-angularjs
http://jsfiddle.net/thomporter/ANxmv/2/


---

## step3. エラー項目があれば、フォームを提出しない。

__HTML(haml)__

form → ng-submit=>'cancel(cancelform.$valid, data)'

APIへのポスト実行functionのcancel() にcancelform.$valid, dataという値が正しいデータがあった場合だけ、functionを実行するようにした。

    form.form-inline.cancel-form.row{ :role =>'role',:novalidate =>'novalidate',ng-submit=>'cancel(cancelform.$valid, data)'}


---

## step4. エラー時にボタンをdisabledにする。

__HTML(haml)__

button →  'ng-disabled'=> "signupform.companyName.$dirty && signupform.companyName.$invalid"

disabledをする条件に、$dirty（一度でも値をいじった時） & $invalid（値が正しくない）の条件を追加。


注意：条件を``$dirty``と``$invalid``の順番で書かないと、値が正しくなかった場合だけの場合もdisabledになってしまう。

    button.btn.btn-lg.btn-default{ :type=> 'submit', 'ng-disabled'=> "signupform.companyName.$dirty && signupform.companyName.$invalid" }
         次へ
---

### メモ
submitのエラー時は前章で書いたようにアラートメッセージを表示するやり方もあるが、ボタンをdisabledするやり方もある。どっちもやるのはあまり意味がない。個人的にエラー時にボタンを急に押せなくするのはあまり好きではないが、勉強のため紹介。

disabled条件には、各inputごと指定しないといけないので、コードが長くなって面倒。。もっと一気にかけるいい方法はなかろうか。

---

## step5. その他のバリデーション

上記では、ng-required（必須項目）を使いましたが、AngulrJSではいろんなバリデーションモデルが準備されるようです。

使い方は同じようにinputなど入力要素に属性を追加すれば使えます。同時に何個使ってもOK.

---

### ・文字形式のチェックのバリデーション　``ng-pattern``

![](/assets/images/Angular-validation/8.png)

    %input
    { :type => 'text', 'ng-model' => 'postCode', :name => 'postCode','ng-pattern' =>'/^([1-9]\d*|0)(\-\d+)?$/'}

    .error
    {'ng-show' => 'signupform.postCode.$error.pattern' }
      .glyphicon.glyphicon-remove-circle
         半角数字のみ（文字間のハイフンは含む）

---

### ・文字数のチェックのバリデーション  ``ng-maxlength``

![](/assets/images/Angular-validation/11.png)

    input
    { :type => 'text', 'ng-model' => 'postCode', :name => 'postCode','ng-maxlength' => '8'}

    .col-md-2.form-alert.error
    {'ng-show' => 'signupform.postCode.$error.maxlength' }
      .glyphicon.glyphicon-remove-circl
        8文字以内

---

## step6. エラーチェックのタイミングを制御する。

エラーチェックのタイミングは、デフォルトだと値が入力された時であり、文字形式のチェックなどの場合、
値が一文字毎に変わる度に途中でエラー表示がでてしまうので、タイミングを制御の設定が必要になる。ver.Angular1.3１

### ・フォーカスが外れた時にエラーチェックする。

__HTML(haml)__

input → 'ng-model-options'=>"{updateOn: 'blur'}"

ng-model-options（エラーチェックのタイミング）をblur(フォーカスのタイミング)の条件にする。

    input.form-control{ :type => 'text', 'ng-model' => 'postCode', :name => 'postCode','ng-model-options'=>"{updateOn: 'blur'}", 'ng-maxlength' => '8' }

---

## 今回の勉強点

・ AngularJSのバリデーションは、基本的にinputなど入力要素に属性を追加していく。

・ inputフォーム（フォームの色が変わる等）エラーとエラーメッセージ表示エラーは同じエラー処理ということで混合しがちだが、全くの別の処理で書かなければいけない。

・エラータイミング制御``ng-model-options``とsubmit時のエラー条件``$submitted``がバージョンがAngular3.１でないと使えないらしい。

・今回のプロジェクトで使っていたAngularUIがまだAngular3.１は対応してないということでアップデートもできず困ったが、AngularUIを今のところ使わないということで、Angular3.１アップデートにして対応した。

・フォームの``name``の名前に -（ハイフン）を入れたところ、Angularが使えなくなってしまった。名前に記号は使えない模様。
