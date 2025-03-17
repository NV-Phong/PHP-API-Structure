# PHP API STRUCTURE

### INTRODUCE
Dự án **PHP API Structure** là một Server API đơn giản được xây dựng bằng PHP thuần, hỗ trợ tự động tải (`autoload`) theo tiêu chuẩn PSR-4.

### PROJECT STRUCTURE
```
PHP-API-Structure/
│── app/             # Chứa mã nguồn chính của API
│── config/          # Cấu hình hệ thống
│── routes/          # Định nghĩa các route của API
│── test/            # Thư mục chứa các test case
│── vendor/          # Thư mục chứa các gói Composer
│── .env.development # File cấu hình môi trường phát triển
│── .env.production  # File cấu hình môi trường sản xuất
│── .gitignore       # Các file cần bỏ qua khi push lên Git
│── composer.json    # Định nghĩa các package cần thiết
│── composer.lock    # Lưu trạng thái package đã cài đặt
│── readme.md        # Tài liệu hướng dẫn
```

### INSTALL
Trước tiên, cần cài đặt các package cần thiết bằng Composer:

```sh
composer install
```

### RUN PROJECT
Chạy ứng dụng với lệnh:

```sh
composer start
```

Lệnh này sẽ:
- Bỏ giới hạn thời gian xử lý của Composer.
- Khởi chạy PHP built-in server tại `http://localhost:3000` với thư mục `app` làm gốc.

Bạn cũng có thể chạy trực tiếp bằng:

```sh
php -S localhost:3000 -t app
```

### AUTHOR
- **NV-Phong**
- Email: `ui.engineer.workspace@gmail.com`
