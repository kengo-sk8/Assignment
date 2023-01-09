# 課題概要
Django / Ruby on Rails / Laravelのどれかを使用して下記要件を満たすwebアプリケーションを作成してください。

- アカウントの新規作成/ログイン機能
- 文字列の投稿機能(ログイン済みユーザーのみ可能)
- 投稿された文字列の一覧ページ(非ログイン済みユーザーも閲覧可能)

# 操作方法
dockercompose.ymlのあるディレクトリーに移動した後、下記のコマンドの順番で、ターミナルに入力する

```sh
$ docker compose build
$ docker compose up -d
```
コンテナー立ち上がった後、下記のコマンド実行する
```sh
docker exec　[コンテナー名] npm install && npm run dev && npm run build


# 上手くいかない場合は、下記のコマンド入力
$ docker exec -it [コンテナー名] /bin/bash
# 　コンテナー名は、docker ps で確認する

#　コンテナー内で入力する
$ npm install && npm run dev && npm run build

# または、1つずつ入力を行う
$ npm run install
$ npm run dev
# exit　または controller + commandを押して、抜ける
$ npm run build
```

# 課題作成に使用した参考資料

## docker関連
- [Dockerfile のベスト・プラクティス](https://docs.docker.jp/develop/develop-images/dockerfile_best-practices.html)
- [DockerでphpMyAdminを使用する手順を紹介するよ](https://hara-chan.com/it/infrastructure/docker-phpmyadmin/)
- [【VsCode】Docker環境でPHP Debugを導入する手順](https://maasaablog.com/development/backend/php/laravel/2308/)
- [【Laravel】Docker環境にXdebug3を導入&VSCodeでデバッグ(M1対応)](https://yutaro-blog.net/2021/07/08/laravel-docker-xdebug-vscode/)
- [Docker環境のlaravel9で vite / tailwindcss / ページネーション のホットリロードを有効にする手順](https://glancebeat.hatenablog.com/entry/2023/01/02/170520)


## laravel
- [【初心者必見】Laravelを1から入門してTodoアプリを作ってみよう](https://b-risk.jp/blog/2022/08/laravel/)
- [Laravel9のBreezeで、ユーザー登録・ログインを実装する](https://specially198.com/implement-user-registration-and-login-with-breeze-of-laravel9/)
- [Dockerで環境構築して Laravel 9で CRUD 機能を作る](https://logsuke.com/web/programming/laravel/docke-laravel9-crud)
- [【Laravel】hrefの指定で、urlとrouteの指定の違いは何？](http://hp789.blog.fc2.com/blog-entry-91.html)
- [Laravel Breeze 日本語化パッケージ：Breezejp](https://github.com/askdkc/breezejp)
- [Tailwind CSS (Rapidly build modern websites without ever leaving your HTML.)](https://tailwindcss.com/)

## node.js
- [(公式)NodeSource Node.js Binary Distributions](https://github.com/nodesource/distributions)(バージョンの上げ方を参照した)
- [Dockerでphpコンテナとかにnpmをインストールするときのメモ](https://tsyama.hatenablog.com/entry/docker-not-found-npm)
- [DockerでLaravel構築した後に、bootstrapを導入。エラー祭りを解決](https://prglog.info/home/?p=371)


## マイグレーション関連
- [Laravel9.x マイグレーション](https://readouble.com/laravel/9.x/ja/migrations.html)
- [migrationの作成と実行方法](https://www.wakuwakubank.com/posts/450-laravel-migration/)
- [Where to put the php artisan migrate command](https://stackoverflow.com/questions/48850813/where-to-put-the-php-artisan-migrate-command)
(docker runを使用してマイグレーションファイルを作成する為、参考にした)
- [LaravelのマイグレーションでDBにカラムを追加する](https://pgmemo.tokyo/data/archives/1552.html)
- [Laravelでphp artisanをしたらYour app key is missingとおいうエラーがでた時の対処法](https://poppotennis.com/posts/laravel-keygenerate)
