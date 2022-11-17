#
# イベント管理システム

##　ダウンロード方法

git clone 

git clone https://github.com/k-syota/Reserve

ブランチを指定してダウンロードする場合

git clone -b ブランチ名 https://github.com/k-syota/Reserve

## インストール方法

cd Reserve
composer install
npm install
npm run dev

.env.exampleをコピーして.envファイルを作成
.envの中身は環境に応じて変更してください。

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=reserve
DB_USERNAME=root
DB_PASSWORD=

DBを起動後に以下を実行してください（データベーステーブルとダミーデータが生成されればOKです）
php artisan migrate:fresh --seed

最後に
php artisan key:generate
と入力してキーを生成

php artisan serve
で簡易サーバーを立ち上げて、表示を確認してください。

## インストール後の実施事項

画像のリンク作成
php artisan storage:link

プロフィールページで画像アップの機能を使用する場合は
.envのAPP_URLを下記に変更してください。

APP_URL=http://127.0.0.1:8000

Tailwindcss 3.xの、JustInTime機能により
使ったHTML内のクラス飲みに反映されるようになっているので、HTMLを編集する際は
npm run devを実行して監視しながら編集するようにしてください。
