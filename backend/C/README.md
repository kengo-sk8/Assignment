# 課題1
下記の様に定義したテーブルがあります。ジャンルごとのitems.priceの平均値とジャンル名を取得したいと思っています。どの様なクエリを発行するべきでしょうか？理由もつけて回答してください

### itemsテーブル
|カラム名   |  型          |  備考                                  |
| -------- | ------------ | ------------------------------------  |
| id       | int          | primary keyとして設定済み               |
| name     | varchar(128) | apple / potato / coke などの文字列が入る |
| price    | int          | 98 / 150 / 350 などの数値が入る          |
| genre_id | int          | genresテーブルのidを参照して紐づけている    |

### genresテーブル
|カラム名   |  型          |  備考                                  |
| -------- | ------------ | ------------------------------------ |
| id       | int          | primary keyとして設定済み              |
| name     | varchar(128) | fruit / vegetable / drink などの文字列が入る|

#### 理由
1. itemsテーブルとgenresテーブルをitems.genre_id と genres.idで結合する
2. GROUP BYで、同じ値のgenre_idをまとめる
3. AVG()メソッドを使用して、items.priceの平均値を算出する
4. items.priceは少数点の数値で算出される為、FLOOR()メソッドを使用して小数点を切り捨てる


```sql
SELECT
    genres.name,
    FLOOR(AVG(items.price)) AS price
FROM
    items
INNER JOIN genres ON items.genre_id = genres.id
GROUP BY
    items.genre_id;

/* MySQL5.7以上のバージョンは、SELECTにGROUP BYで指定したカラム以外を記述するとエラーとなる。(sql_mode=ONLY_FULL_GROUP_BYがが自動で設定されている)

下記のSQL文を叩くか、my.cnfの中身を変更する必要がある
set global sql_mode='NO_ENGINE_SUBSTITUTION';

[mysqld]
sql_mode=STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION
/*
```
## 参考資料
- [Mysql GROUP BY エラー回避するために sql_mode 変更](https://hapicode.com/sql/group-by-error.html#my-cnf-%E5%A4%89%E6%9B%B4)

# 課題2
idカラム以外はインデックスを貼っていません。もし貼っておいた方が良いインデックスがあれば教えてください。こちらも理由をつけて回答してください

### genreのgenre_idカラムにインデックスを貼る
- 外部結合キーにINDEXを貼る事(今回の場合は、genre_id)で、クエリーが発行されるスピードが向上する
