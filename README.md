
# try-fuelphp-donichi



[書籍](http://froide-kk.co.jp/donichi/)を写経したファイル一式。
ざっくりした内容としてはVirtualBox＆Vagrantで環境構築してFuelPHP＆Bootstrapで ”社内連絡用Webアプリ” を作ってみようといったものだった。  
windowsユーザーを想定した内容だったため、macで進める上で代替的に行った手順などを一応メモ。



## 学習メモ



### 事前準備

VirtualBox, Vagrant, Git, サクラエディタ, FuelPHP, PuTTY, Bootstrapテーマ が必要とあったが、すべて[書籍サイト](http://froide-kk.co.jp/donichi/)からインストーラなどで入手できる模様。

* VirtualBox, Vagrant, Git => インストール済みだったのでスルー
* サクラエディタ => 代替で使い慣れたエディタを使用
* FuelPHP => 書籍サイトからダウンロードできるバージョン1.7.3ではなく最新版を[別手順](http://sachips.byeto.jp/fuelphp/mac-fuelphp-install.html)で入手
* PuTTY => 代替でターミナルのSSHコマンド（`$ ssh -p 2222 vagrant@localhost`）で接続
* Bootstrapテーマ => 書籍サイトからダウンロードできる startbootstrap-small-business-1.0.3.zip を使用（[公式サイト](http://startbootstrap.com/template-overviews/small-business/)）
* Vagrant用FuelPHP開発環境は[書籍の公式Github](https://github.com/froide-kk/vagrant-donichi-php-i386)からクローン

展開先は以下。

* FuelPHPフレームワーク： [try-fuelphp-donichi/fuelphp/](https://github.com/BAPH0/try-fuelphp-donichi/tree/master/fuelphp)
* Vagrant用FuelPHP開発環境： [try-fuelphp-donichi/fuelphp/vagrant/](https://github.com/BAPH0/try-fuelphp-donichi/tree/master/fuelphp/vagrant)
* Bootstrapテーマ： [try-fuelphp-donichi/fuelphp/public/assets/startbootstrap-small-business-1.0.3/](https://github.com/BAPH0/try-fuelphp-donichi/tree/master/fuelphp/public/assets/startbootstrap-small-business-1.0.3)



### oilコマンド

#### `oil g controller`

TOPページのベースファイルを自動生成してくれる。  
コマンドに入力した「tweet」部分がURLの末尾になる→ [http://localhost:8000/tweet](http://localhost:8000/tweet)

```
[vagrant@localhost fuelphp]$ oil g controller tweet
-> Creating view: /mnt/fuelphp/fuel/app/views/template.php
-> Creating view: /mnt/fuelphp/fuel/app/views/tweet/index.php
-> Creating controller: /mnt/fuelphp/fuel/app/classes/controller/tweet.php
```

* template.php：全ページ共通レイアウト
* index.php：トップページ
* tweet.php：「tweet」のControllerクラス


#### `oil g scaffold`

データベースを使用した基本的なWebアプリケーションに必要なプログラムとマイグレーションファイルを自動生成する。Scaffoldは「足場」という意味で、登録（CREATE）、参照（READ）、更新（UPDATE）、削除（DELETE）の４つの機能（CRUD）を自動的に作成してくれる。

```
[vagrant@localhost ~]$ cd fuelphp/
[vagrant@localhost fuelphp]$ oil g scaffold request body:string ip:string
-> Creating migration: /mnt/fuelphp/fuel/app/migrations/001_create_requests.php
-> Creating model: /mnt/fuelphp/fuel/app/classes/model/request.php
-> Creating controller: /mnt/fuelphp/fuel/app/classes/controller/request.php
-> Creating view: /mnt/fuelphp/fuel/app/views/request/index.php
-> Creating view: /mnt/fuelphp/fuel/app/views/request/view.php
-> Creating view: /mnt/fuelphp/fuel/app/views/request/create.php
-> Creating view: /mnt/fuelphp/fuel/app/views/request/edit.php
-> Creating view: /mnt/fuelphp/fuel/app/views/request/_form.php
```



### 成果物

* とりえあず軽くPHPを書いてみようという章で[簡素なカレンダー](https://github.com/BAPH0/try-fuelphp-donichi/blob/master/fuelphp/public/donichi.php)を作成
* 社内連絡用Webアプリ[社絡](https://github.com/BAPH0/try-fuelphp-donichi/blob/master/fuelphp/fuel/app/views/request/index.php)を作成
* 感想：肝心のPHPについての内容は若干薄い気がしましたが、ノンプログラマーをかなり丁寧にカバーしている内容だと思うので、何から何まで初めての人は広く浅い知識がまとめて獲得できる気がしました。すべてにおいて深入りはしないけど、とっかかりだけ与えてくれる感じ。そもそも２日で読了させようとしてる内容が薄いっていうのはしょうがないか…



## 仮想環境

### 起動

* [vagrant](https://github.com/BAPH0/try-fuelphp-donichi/tree/master/fuelphp/vagrant)ディレクトリに移動：`$ cd /{任意のパス}/fuelphp/vagrant`
* -> 起動：`$ vagrant up` してから [http://localhost:8000/](http://localhost:8000/) にアクセス

### その他

* -> 再起動：`$ vagrant reload`
* -> 停止：`$ vagrant halt`


