# 課題概要

## 登録APIの作成
POST(application/json)で下記の様なRequest/Responseによりitemsテーブルに保存するAPIを作成してください。

Request POST /items
```
{"name": "apple", "price": 200}
```

Response 成功時ステータスコード200で下記のレスポンスを返す
```
{"message": "success"}
```

## 一覧APIの作成
Request
GET /items

Response
成功時ステータスコード200で下記のレスポンスを返す
```
[{"name": "apple", "price": 200}]
```

# 操作方法
git clone等でソースコードをローカル環境にダウンロードした後、.env.sampleファイルの`sample`の部分のみ消去する。

dockercompose.ymlのあるディレクトリーに移動した後、下記のコマンドの順番で、ターミナルに入力する

```sh
$ docker compose build
$ docker compose up -d
```
下記のコマンドをターミナルに入力する事で、POSTとGETを行う事ができる
## POST
```sh
curl -X POST \
-H "Content-Type: application/json" \
-d '{"name":"apple", "price":200}' \
http://localhost:9001/api/items
```

## GET
```sh
curl http://localhost:9001/api/items
```

# 課題作成に使用した参考資料

## docker関連
- [DockerでphpMyAdminを使用する手順を紹介するよ](https://hara-chan.com/it/infrastructure/docker-phpmyadmin/)
- [【VsCode】Docker環境でPHP Debugを導入する手順](https://maasaablog.com/development/backend/php/laravel/2308/)
- [【Laravel】Docker環境にXdebug3を導入&VSCodeでデバッグ(M1対応)](https://yutaro-blog.net/2021/07/08/laravel-docker-xdebug-vscode/)


## マイグレーション関連
- [Laravel9.x マイグレーション](https://readouble.com/laravel/9.x/ja/migrations.html)
- [migrationの作成と実行方法](https://www.wakuwakubank.com/posts/450-laravel-migration/)
- [Where to put the php artisan migrate command](https://stackoverflow.com/questions/48850813/where-to-put-the-php-artisan-migrate-command)
(docker runを使用してマイグレーションファイルを作成する為、参考にした)
- [LaravelのマイグレーションでDBにカラムを追加する](https://pgmemo.tokyo/data/archives/1552.html)

## マイグレーションのコマンド集

### テーブル作成
```sh
docker exec [your_container_name] php artisan migrate create_[your_table_name]_table --create=[your_table_name]
```
### マイグレーション実行コマンド
```sh
docker exec [your_container_name] php artisan migrate
```

### マイグレーションのロールバックコマンド
```sh
docker exec [your_container_name] php artisan migrate:rollback
```

## Laravelのコマンド集

### コントローラ作成
```sh
docker exec [your_container_name] php artisan make:controller [controller_name]
```
<span style="color: red; ">※ controller_nameはの頭文字は大文字にする</span>

## API作成関連

- [How to make API in Laravel 9](https://dev.to/shanisingh03/how-to-make-api-in-laravel-9-310g)
- [Laravel PHPでRESTful APIを構築する方法](https://www.twilio.com/blog/building-and-consuming-a-restful-api-in-laravel-php-jp)
- [
curlコマンドでPOSTする, 様々な形式別メモ](https://weblabo.oscasierra.net/curl-post/)
