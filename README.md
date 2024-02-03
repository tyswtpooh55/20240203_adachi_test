# 20240203_adachi_test　お問い合わせフォーム(Fashionably Late)

## 環境構築

### Dockerビルド
1. [git clone リンク]()
2. docker-compose up -d --build

### Laravel環境構築
1. docker-compose exec php bash
2. conposer install
3. .enx.exampleファイルから.envを作成し、環境変数を変更
4. php artisan key:generate
5. php artisan migrate
6. php artisan db:seed

## 使用技術
・　PHP 7.4
・　Laravel 8.83
・　MySQL  8.0

## URL
・ 開発環境: (http://localhost/)
・ phpMyAdmin: (http://localhost:8080/)
