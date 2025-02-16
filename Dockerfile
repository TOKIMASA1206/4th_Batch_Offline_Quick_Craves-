
# 例: php:8.2-fpm, php:8.2-cli, php:8.2-apache など。
FROM php:8.2-cli

# システム依存パッケージなどをインストール
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip \
    nodejs npm \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Composer をインストール
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# 作業ディレクトリを設定
WORKDIR /var/www/html

# ここでアプリのソースコードを全てコピー
COPY . .

# PHPパッケージインストール（本番向けに最適化）
RUN composer install --no-dev --optimize-autoloader

# Nodeパッケージインストール＆ビルド (Viteなど)
RUN npm install
RUN npm run build

# 必要ならマイグレーション (自動実行する場合)
# RUN php artisan migrate --force

# ポート公開 (組み込みサーバーで80番を使用する例)
EXPOSE 80

# コンテナ起動時に実行するコマンド
CMD ["php", "-S", "0.0.0.0:80", "-t", "public"]
