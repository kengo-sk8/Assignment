## 提出方法

# ディレクトリ構成

GitHub の public リポジトリ又は Gist の private にて下記の様なディレクトリ構成にしてそれぞれのディレクトリ以下に回答を作成し URL を共有して下さい。

```
    frontend
        |--A
        |--B
        |--C
    backend
        |--A
        |--B
        |--C
    infra
        |--A
        |--B
```

# フロントエンド

## A

更新ボタンを押したら API で取得した文言に切り替えられる様にしてください。javascript をそのまま使用しても jQuery を使用しても ok です。文言を取得する API には [https://catfact.ninja/fact](https://catfact.ninja/fact) を使用してください。

![a](https://user-images.githubusercontent.com/62537601/212488320-b183dac9-a478-4bce-b305-f266f864f06b.png)

## B

vue.js または React または Angular をセットアップして追加と X を押して削除ができるアプリケーションを作成してください
指定されている様にスタイルを当てて下さい。
![b](https://user-images.githubusercontent.com/62537601/212488422-dae69eff-971d-446b-8dde-bdc30a46750a.png)

![b_design](https://user-images.githubusercontent.com/62537601/212488405-9c5af2f0-6159-4449-824b-b9e2a94996a5.png)

## C

- Vuex または Redux を使って左右を別コンポーネントで実装してください
- 右に移動ボタンで左側の一番下の要素を右側の一番下に移動、左に移動ボタンで右側の一番下の要素を左側の一番下に移動するように実装してください
- 指定されている様にスタイルを当てて下さい
  ![c](https://user-images.githubusercontent.com/62537601/212488442-cd2fecbd-42f4-4077-a5a4-c67afb4ab29a.png)
  ![c_design](https://user-images.githubusercontent.com/62537601/212488440-4b19aea4-908b-49e8-a9df-a3b401b89e46.png)

# サーバーサイド

## 環境起動方法

```sh
docker compose up
```

## A

[Django](https://d2p9dc5u8hbh89.cloudfront.net/002/files/django.zip) / [Ruby on Rails](https://d2p9dc5u8hbh89.cloudfront.net/002/files/rails.zip) / [Laravel](https://d2p9dc5u8hbh89.cloudfront.net/002/files/laravel.zip)のどれかを使用して POST(application/json)で下記の様な Request/Response により items テーブルに保存する API を作成してください。

使用したいフレームワークのリンクからコードをダウンロードしてそれを元に作成してください。

### 登録 API

#### Request

POST /items

```json
{
  "name": "apple",
  "price": 200
}
```

#### Response

成功時ステータスコード 200 で下記のレスポンスを返す

```json
{
  "message": "success"
}
```

### 一覧 API

#### Request

GET /items

#### Response

成功時ステータスコード 200 で下記のレスポンスを返す

```json
[
  {
    "name": "apple",
    "price": 200
  }
]
```

## B

[Django](https://d2p9dc5u8hbh89.cloudfront.net/002/files/django.zip) / [Ruby on Rails](https://d2p9dc5u8hbh89.cloudfront.net/002/files/rails.zip) / [Laravel](https://d2p9dc5u8hbh89.cloudfront.net/002/files/laravel.zip)のどれかを使用して下記要件を満たす web アプリケーションを作成してください。

使用したいフレームワークのリンクからコードをダウンロードしてそれを元に作成してください。

- アカウントの新規作成/ログイン機能
- 文字列の投稿機能(ログイン済みユーザーのみ可能)
- 投稿された文字列の一覧ページ(非ログイン済みユーザーも閲覧可能)

## C

- 下記の様に定義したテーブルがあります。ジャンルごとの items.price の平均値とジャンル名を取得したいと思っています
- どの様なクエリを発行するべきでしょうか？理由もつけて回答してください
- id カラム以外はインデックスを貼っていません。もし貼っておいた方が良いインデックスがあれば教えてください。こちらも理由をつけて回答してください

### items テーブル

| カラム名 | 型           | 備考                                        |
| -------- | ------------ | ------------------------------------------- |
| id       | int          | primary key として設定済み                  |
| name     | varchar(128) | apple / potato / coke などの文字列が入る    |
| price    | int          | 98 / 150 / 350 などの数値が入る             |
| genre_id | int          | genres テーブルの id を参照して紐づけている |

### genres テーブル

| カラム名 | 型           | 備考                                         |
| -------- | ------------ | -------------------------------------------- |
| id       | int          | primary key として設定済み                   |
| name     | varchar(128) | fruit / vegetable / drink などの文字列が入る |

# インフラ

## A

ログインを伴う web アプリケーションのインフラ構成図を作成して PNG ファイル又は PDF ファイルで提出してください。構成について補足する事があれば文章でも補足してください。

ファイルのアップロードは infra->A のディレクトリ以下にお願いします。

## B

AWS / GCP / Azure のどれかに terraform を使ってオブジェクトストレージ(S3/Cloud Storage/Azure Blob Storage)にローカルのファイル(sample.txt)をアップロードする設定を書いてください。提出の際 secret key などの情報は含まれない様にお願いします。
