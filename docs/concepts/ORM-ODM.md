# ORM (Object-Relational Mapping) và ODM (Object-Document Mapping)

## 1. Giới thiệu
ORM (Object-Relational Mapping) và ODM (Object-Document Mapping) là hai phương pháp phổ biến để tương tác với cơ sở dữ liệu thông qua mô hình hóa đối tượng. ORM chủ yếu được sử dụng với cơ sở dữ liệu quan hệ (SQL), trong khi ODM được sử dụng với cơ sở dữ liệu NoSQL dạng document như MongoDB.

---

## 2. ORM - Object-Relational Mapping
### 2.1. Định nghĩa
ORM là kỹ thuật cho phép lập trình viên làm việc với cơ sở dữ liệu quan hệ bằng cách sử dụng các đối tượng trong ngôn ngữ lập trình thay vì viết truy vấn SQL trực tiếp.

### 2.2. Ưu điểm
- **Trừu tượng hóa:** Không cần viết SQL thủ công.
- **Dễ bảo trì:** Code rõ ràng hơn so với việc sử dụng truy vấn SQL thuần.
- **Tương thích đa nền tảng:** Có thể dễ dàng chuyển đổi giữa các hệ quản trị cơ sở dữ liệu khác nhau.

### 2.3. Nhược điểm
- **Hiệu suất có thể bị ảnh hưởng:** Các ORM có thể tạo ra truy vấn không tối ưu.
- **Khó kiểm soát:** Khi cần tối ưu hiệu suất, đôi khi vẫn phải viết SQL thủ công.

### 2.4. Một số thư viện ORM phổ biến
- **TypeORM** (TypeScript, Node.js)
- **Sequelize** (JavaScript, Node.js)
- **Hibernate** (Java)
- **Entity Framework** (C#)
- **Doctrine** (PHP)
- **Eloquent** (Laravel, PHP)

### 2.5. Ví dụ ORM với TypeORM (NestJS)
```typescript
import { Entity, PrimaryGeneratedColumn, Column } from "typeorm";

@Entity()
export class User {
  @PrimaryGeneratedColumn()
  id: number;

  @Column()
  name: string;

  @Column()
  email: string;
}
```

### 2.6. Ví dụ ORM với Eloquent (Laravel, PHP)
```php
use Illuminate\Database\Eloquent\Model;

class User extends Model {
    protected $table = 'users';
    protected $fillable = ['name', 'email'];
}

// Sử dụng
$user = User::create(['name' => 'Phong', 'email' => 'phong@example.com']);
$user = User::find(1);
echo $user->name;
```

### 2.7. Ví dụ ORM với Doctrine (PHP)
```php
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User {
    /** @ORM\Id @ORM\GeneratedValue @ORM\Column(type="integer") */
    private $id;

    /** @ORM\Column(type="string") */
    private $name;

    /** @ORM\Column(type="string") */
    private $email;
}
```

---

## 3. ODM - Object-Document Mapping
### 3.1. Định nghĩa
ODM là kỹ thuật cho phép làm việc với cơ sở dữ liệu NoSQL dạng document như MongoDB thông qua mô hình đối tượng.

### 3.2. Ưu điểm
- **Tích hợp chặt chẽ với NoSQL:** Phù hợp với mô hình dữ liệu linh hoạt.
- **Không cần schema cố định:** Dữ liệu có thể thay đổi linh hoạt.
- **Tốc độ truy vấn cao với NoSQL:** Phù hợp với hệ thống lớn.

### 3.3. Nhược điểm
- **Không có chuẩn chung:** Mỗi ODM có cách tiếp cận khác nhau.
- **Không hỗ trợ truy vấn SQL:** Không thể tận dụng được các tính năng SQL mạnh mẽ.

### 3.4. Một số thư viện ODM phổ biến
- **Mongoose** (Node.js, MongoDB)
- **Pymongo ODM** (Python, MongoDB)
- **Doctrine ODM** (PHP, MongoDB)

### 3.5. Ví dụ ODM với Mongoose (Node.js)
```typescript
import { Schema, model } from "mongoose";

const UserSchema = new Schema({
  name: String,
  email: String
});

const User = model("User", UserSchema);
```

### 3.6. Ví dụ ODM với Doctrine ODM (PHP, MongoDB)
```php
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @ODM\Document
 */
class User {
    /** @ODM\Id */
    private $id;

    /** @ODM\Field(type="string") */
    private $name;

    /** @ODM\Field(type="string") */
    private $email;
}
```

---

## 4. So sánh ORM và ODM
| Đặc điểm       | ORM (SQL)                | ODM (NoSQL)              |
|---------------|-------------------------|-------------------------|
| Loại CSDL     | Quan hệ (SQL)           | Document (NoSQL)       |
| Schema       | Cố định, có quan hệ       | Linh hoạt, không quan hệ |
| Truy vấn     | SQL                      | API của NoSQL DB       |
| Hiệu suất    | Tối ưu cho giao dịch      | Tốc độ cao với dữ liệu lớn |
| Thư viện phổ biến | TypeORM, Sequelize, Hibernate, Doctrine, Eloquent | Mongoose, Pymongo ODM, Doctrine ODM |

---

## 5. Khi nào nên sử dụng ORM và ODM?
- **Chọn ORM nếu:**
  - Dữ liệu có quan hệ chặt chẽ, cần đảm bảo toàn vẹn dữ liệu.
  - Cần thực hiện nhiều giao dịch (transactions).
  - Hệ thống có cấu trúc dữ liệu ổn định.
- **Chọn ODM nếu:**
  - Dữ liệu không có cấu trúc cố định, cần lưu trữ dữ liệu linh hoạt.
  - Cần hiệu suất cao và khả năng mở rộng tốt hơn SQL.
  - Hệ thống có nhiều dữ liệu phi cấu trúc (JSON, logs, etc.).

---

## 6. Kết luận
ORM và ODM đều giúp lập trình viên làm việc với cơ sở dữ liệu dễ dàng hơn bằng cách sử dụng đối tượng trong ngôn ngữ lập trình. Việc chọn ORM hay ODM phụ thuộc vào loại cơ sở dữ liệu và yêu cầu của dự án.

