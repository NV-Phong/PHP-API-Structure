# TÀI LIỆU HƯỚNG DẪN `illuminate/database`

## Giới thiệu
`illuminate/database` là một ORM (Eloquent) và Query Builder của Laravel, giúp thao tác với cơ sở dữ liệu dễ dàng hơn mà không cần viết SQL trực tiếp.

## Cài đặt
Bạn có thể cài đặt `illuminate/database` qua Composer:

```sh
composer require illuminate/database
```

## Cấu hình kết nối cơ sở dữ liệu
Trước khi sử dụng, bạn cần thiết lập kết nối với cơ sở dữ liệu. Tạo tệp `db.php` và cấu hình như sau:

```php
<?php
require 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => '127.0.0.1',
    'database'  => 'my_database',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();
```

## Sử dụng Query Builder
### Lấy dữ liệu
```php
$users = Capsule::table('users')->get();
foreach ($users as $user) {
    echo $user->name;
}
```

### Thêm dữ liệu
```php
Capsule::table('users')->insert([
    'name' => 'John Doe',
    'email' => 'johndoe@example.com'
]);
```

### Cập nhật dữ liệu
```php
Capsule::table('users')->where('id', 1)->update(['name' => 'Jane Doe']);
```

### Xóa dữ liệu
```php
Capsule::table('users')->where('id', 1)->delete();
```

## Sử dụng Eloquent ORM
### Tạo Model
```php
use Illuminate\Database\Eloquent\Model;

class User extends Model {
    protected $table = 'users';
    protected $fillable = ['name', 'email'];
}
```

### Lấy dữ liệu
```php
$users = User::all();
foreach ($users as $user) {
    echo $user->name;
}
```

### Tìm kiếm theo ID
```php
$user = User::find(1);
echo $user->name;
```

### Thêm dữ liệu
```php
User::create([
    'name' => 'John Doe',
    'email' => 'johndoe@example.com'
]);
```

### Cập nhật dữ liệu
```php
$user = User::find(1);
$user->name = 'Jane Doe';
$user->save();
```

### Xóa dữ liệu
```php
User::destroy(1);
```

## Kết luận
`illuminate/database` giúp bạn làm việc với cơ sở dữ liệu dễ dàng hơn mà không cần viết SQL trực tiếp. Nó cung cấp cả Query Builder và ORM (Eloquent) để thao tác dữ liệu một cách hiệu quả.

