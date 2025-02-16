# ベースイメージ。php:8.2-cli を使用（必要に応じて fpm や apache も可）
FROM php:8.2-cli

# システム依存パッケージのインストール
# libzip-dev は ext-zip 用、libgd-dev は ext-gd 用ライブラリ
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip unzip \
    libzip-dev \
    libgd-dev \
    nodejs \
    npm \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# PHP 拡張のインストール
RUN docker-php-ext-install pdo_mysql zip gd sodium

# Composer を公式の Composer イメージからコピー
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# 作業ディレクトリを設定
WORKDIR /var/www/html

# アプリケーションのソースコードを全てコピー
COPY . .

# PHP の依存パッケージを本番向けにインストール
RUN composer install --no-dev --optimize-autoloader

# Node.js の依存パッケージをインストール＆フロントエンドビルド（Vite 等）
RUN npm install
RUN npm run build

# ポート80番を公開
EXPOSE 80

# コンテナ起動時に PHP 組み込みサーバーを起動
CMD ["php", "-S", "0.0.0.0:80", "-t", "public"]
