# グルシェア
　お気に入りのお店や料理を共有する画像投稿サービス

# 開発環境
 * Windows10
 * PHP 7.2.34
 * Laravel 6.18.43

 # 環境構築の手順
1. 下記のコマンドプロジェクトをクローンする
  `git clone https://github.com/dqtenix0218/GourmetShare`

2. 下記のコマンドでcomposerをアップデートする
  `composer update`

3. 下記のコマンドで.env.exampleファイルをコピーし.envを作成する
  `copy .env.example .env`

4. .envファイルのDB接続やgoogle map apiキ-をご自身の環境に合わせて書き換える

5. 下記のコマンドでアプリケーションキーの初期化をおこなう
  `php artisan key:generate`

6. 下記のコマンドでマイグレーションを実行する
  `php artisan migrate`

7. 下記コマンドでシーディングを実行する
  `php artisan db:seed`

# 機能
 * 画像投稿、削除機能
 * 投稿に対するいいね、コメント機能
 * フォロー・フォロワー機能
 * キーワード検索機能
 * プロフィール編集機能
 * google map apiによる住所確認機能

# 注力した点
 * 投稿に対するいいね、コメント機能
 * Google Map APIによる住所の取得・表示機能

 # デモ
  * heroku:<http://thawing-eyrie-25308.herokuapp.com/>
 　・テストアカウント
   メールアドレス:`sample@sample.com`
   パスワード:samplepass

 # 今後実装予定の機能
  * 投稿された画像のリサイズ機能
  * 会員登録のメール認証機能
  * 画像の保存にデータベースを用いているが, AWSのS3等の外部ストレージを使用することを検討中
