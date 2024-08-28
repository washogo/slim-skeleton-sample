# Slim の環境構築のテスト

## 環境構築手順

1. PHPのインストール
    1. brew update
    2. brew install php
    3. php -v
2. Composerのインストール
    1. brew install composer
    2. composer -v
3. slim-skeletonの構築
    1. composer create-project slim/slim-skeleton 任意の名前のアプリ名
4. composer.jsonの`require`と`require-dev`の書き換え
    ```json
      "require": {
        "php": "^7.4 || ^8.0",
        "ext-json": "*",
        "awurth/slim-validation": "^3.4",
        "illuminate/database": "^8.58",
        "monolog/monolog": "^2.9",
        "php-di/php-di": "^6.4",
        "picqer/php-barcode-generator": "^2.2",
        "slim/psr7": "^1.6",
        "slim/slim": "^4.12",
        "vlucas/phpdotenv": "^5.3"
      },
      "require-dev": {
        "jangregor/phpstan-prophecy": "^1.0.0",
        "phpspec/prophecy-phpunit": "^2.2",
        "phpstan/extension-installer": "^1.3.1",
        "phpstan/phpstan": "^1.10",
        "phpunit/phpunit": "^9.6.15"
      },
    ```
1. 動作確認
    1. cd 任意の名前のアプリ名
    2. composer start
    3. composer test

## バージョン情報

1. PHP 8.3.10
2. Composer 2.7.8
3. Slim ^4.12
4. Eloquent ^8.58

## パッケージ情報

### `require` セクション

1. **awurth/slim-validation**
   - **概要**: Slim Framework向けの入力バリデーションライブラリで、リクエストパラメーターやフォームデータの検証を簡単に行うことができる
   - **リポジトリ**: [awurth/slim-validation](https://github.com/awurth/SlimValidation)

2. **illuminate/database**
   - **概要**: Laravelのデータベース抽象化ライブラリで、Eloquent ORMを含んでおり、データベース操作を簡単に行うことができる
   - **リポジトリ**: [illuminate/database](https://github.com/illuminate/database)

3. **monolog/monolog**
   - **概要**: PHP向けのロギングライブラリ。さまざまなログハンドラーをサポートし、システムやアプリケーションのログを柔軟に管理できる
   - **リポジトリ**: [monolog/monolog](https://github.com/Seldaek/monolog)

4. **php-di/php-di**
   - **概要**: PHP向けの依存性注入ライブラリで、依存性管理を簡素化し、コードのモジュール性を向上させる
   - **リポジトリ**: [php-di/php-di](https://github.com/PHP-DI/PHP-DI)

5. **phpspec/prophecy-phpunit**
   - **概要**: ProphecyをPHPUnitで使用するためのインテグレーションパッケージ
   - **リポジトリ**: [phpspec/prophecy-phpunit](https://github.com/phpspec/prophecy-phpunit)

6. **picqer/php-barcode-generator**
   - **概要**: バーコードを生成するためのPHPライブラリ
   - **リポジトリ**: [picqer/php-barcode-generator](https://github.com/picqer/php-barcode-generator)

7. **slim/psr7**
   - **概要**: PSR-7に準拠したHTTPメッセージを扱うためのSlim Frameworkのコンポーネントで、HTTPリクエストやレスポンスを標準化された方法で処理する
   - **リポジトリ**: [slim/psr7](https://github.com/slimphp/Slim-Psr7)

8. **slim/slim**
   - **概要**: PHP向けの軽量なマイクロフレームワークで、ルーティングやミドルウェアの管理が可能で、シンプルなWebアプリケーションを迅速に構築できる
   - **リポジトリ**: [slim/slim](https://github.com/slimphp/Slim)

9. **vlucas/phpdotenv**
   - **概要**: `.env` ファイルを使用して環境変数を管理するためのライブラリ
   - **リポジトリ**: [vlucas/phpdotenv](https://github.com/vlucas/phpdotenv)

### `require-dev` セクション

1. **jangregor/phpstan-prophecy**
   - **概要**: PHPStanにProphecyのサポートを追加する拡張機能
   - **リポジトリ**: [jangregor/phpstan-prophecy](https://github.com/JakubOnderka/PHPStan-Prophecy)

2. **phpstan/extension-installer**
   - **概要**: PHPStan拡張機能のインストールを自動化するライブラリ
   - **リポジトリ**: [phpstan/extension-installer](https://github.com/phpstan/extension-installer)

3. **phpstan/phpstan**
   - **概要**: 静的コード解析ツールで、PHPコードの潜在的なバグや問題を検出する
   - **リポジトリ**: [phpstan/phpstan](https://github.com/phpstan/phpstan)

4. **phpunit/phpunit**
   - **概要**: PHP向けのユニットテストフレームワーク
   - **リポジトリ**: [phpunit/phpunit](https://github.com/sebastianbergmann/phpunit)
