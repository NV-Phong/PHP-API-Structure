-- Active: 1739352033423@@127.0.0.1@3306@hello_world
CREATE TABLE USERS (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(100) NOT NULL,
    Email VARCHAR(100) UNIQUE NOT NULL
);

INSERT INTO
    USERS (Name, Email)
VALUES (
        'Nguyễn Văn A',
        'nguyenvana@example.com'
    ),
    (
        'Trần Thị B',
        'tranthib@example.com'
    ),
    (
        'Lê Hoàng C',
        'lehoangc@example.com'
    ),
    (
        'Phạm Minh D',
        'phamminhd@example.com'
    ),
    (
        'Hoàng Anh E',
        'hoanganhe@example.com'
    );

CREATE TABLE PRODUCTS (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(100) NOT NULL,
    Description NVARCHAR (255),
    Image VARCHAR(255),
    Price DECIMAL(10, 2) NOT NULL
);

INSERT INTO
    PRODUCTS (Name, Description, Image, Price)
VALUES
    ('Laptop Dell XPS 13', 'High-performance ultrabook', 'dell-xps-13.jpg', 1299.99),
    ('iPhone 13 Pro', 'Latest Apple smartphone', 'iphone-13-pro.jpg', 999.99),
    ('Sony WH-1000XM4', 'Wireless noise-canceling headphones', 'sony-headphones.jpg', 349.99),
    ('Samsung 4K TV', '65-inch QLED Smart TV', 'samsung-tv.jpg', 1499.99),
    ('Nintendo Switch', 'Portable gaming console', 'nintendo-switch.jpg', 299.99);