# Tài liệu hướng dẫn `vlucas/phpdotenv`

## Giới thiệu
`vlucas/phpdotenv` là một thư viện PHP giúp tải biến môi trường từ tệp `.env` vào `$_ENV` và `$_SERVER`, giúp quản lý cấu hình ứng dụng dễ dàng hơn.

## Cài đặt
Bạn có thể cài đặt `phpdotenv` thông qua Composer:

```sh
composer require vlucas/phpdotenv
```

## Cách sử dụng

### 1. Tạo tệp `.env`
Tạo tệp `.env` trong thư mục gốc của dự án và khai báo các biến môi trường:

```
APP_NAME=MyApp
APP_ENV=local
DB_HOST=localhost
DB_USER=root
DB_PASS=secret
```

### 2. Nạp biến môi trường trong PHP
Tạo một tệp PHP (ví dụ: `config.php`) và sử dụng `phpdotenv` để tải biến môi trường:

```php
<?php
require __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Truy cập biến môi trường
echo getenv('APP_NAME'); // MyApp
echo $_ENV['APP_ENV'];   // local
echo $_SERVER['DB_HOST']; // localhost
```

## Các tính năng nâng cao

### 1. Xác thực biến môi trường bắt buộc
Bạn có thể định nghĩa các biến môi trường bắt buộc bằng phương thức `required()`:

```php
$dotenv->required(['DB_HOST', 'DB_USER', 'DB_PASS']);
```

Nếu một trong các biến trên không có trong tệp `.env`, ứng dụng sẽ ném lỗi.

### 2. Sử dụng giá trị mặc định
Trong trường hợp một biến môi trường không tồn tại, bạn có thể đặt giá trị mặc định:

```php
$dbHost = getenv('DB_HOST') ?: '127.0.0.1';
```

### 3. Xử lý các giá trị Boolean
`phpdotenv` hỗ trợ xử lý giá trị Boolean từ chuỗi:

```php
$debug = filter_var(getenv('APP_DEBUG'), FILTER_VALIDATE_BOOLEAN);
```

Nếu `APP_DEBUG=true` trong `.env`, giá trị `$debug` sẽ là `true`.

## Lưu ý quan trọng
1. **Không commit tệp `.env` vào Git.** Hãy sử dụng `.gitignore` để bỏ qua tệp này.
2. **Sử dụng tệp `.env.example`** để lưu mẫu biến môi trường cần thiết.

## Kết luận
`vlucas/phpdotenv` là một thư viện hữu ích giúp bạn quản lý cấu hình ứng dụng một cách dễ dàng, đảm bảo mã nguồn sạch sẽ và bảo mật hơn khi làm việc với thông tin nhạy cảm.

