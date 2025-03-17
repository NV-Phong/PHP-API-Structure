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

CREATE TABLE CATEGORY (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Description NVARCHAR(255),
    Name VARCHAR(100) NOT NULL
);

INSERT INTO
    CATEGORY (Name, Description)
VALUES 
    ('Electronics', 'Electronic devices and gadgets'),
    ('Clothing', 'Fashion apparel and accessories'),
    ('Books', 'Books, magazines, and publications'),
    ('Home & Kitchen', 'Home appliances and kitchenware'),
    ('Toys & Games', 'Entertainment items for all ages');

CREATE TABLE PRODUCTS (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(100) NOT NULL,
    Description NVARCHAR (255),
    Image VARCHAR(255),
    Price DECIMAL(10, 2) NOT NULL,
    CategoryID INT,
    FOREIGN KEY (CategoryID) REFERENCES CATEGORY(ID)
);

INSERT INTO
    PRODUCTS (
        Name,
        Description,
        Image,
        Price,
        CategoryID
    )
VALUES (
        'Laptop Dell XPS 13',
        'High-performance ultrabook',
        'https://i.pinimg.com/736x/6c/40/85/6c40855fba53f5e7e20ffcc9b0f9bbc6.jpg',
        1299.99,
        1
    ),
    (
        'iPhone 13 Pro',
        'Latest Apple smartphone',
        'https://i.pinimg.com/736x/89/be/83/89be8350f3e37ebdbed9cd5ba16c0f69.jpg',
        999.99,
        1
    ),
    (
        'Sony WH-1000XM4',
        'Wireless noise-canceling headphones',
        'https://i.pinimg.com/736x/eb/b1/68/ebb16890a316de11109383963b80de91.jpg',
        349.99,
        2
    ),
    (
        'Samsung 4K TV',
        '65-inch QLED Smart TV',
        'https://i.pinimg.com/736x/27/99/6a/27996a3ab1da1cf5a7341e32f3c88cdc.jpg',
        1499.99,
        2
    ),
    (
        'Nintendo Switch',
        'Portable gaming console',
        'https://i.pinimg.com/736x/3a/76/b9/3a76b93699349cffb235f4ba2829445a.jpg',
        299.99,
        3
    );

