-- Active: 1739352033423@@127.0.0.1@3306@hello_world
CREATE TABLE USERS (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(100) NOT NULL,
    Email VARCHAR(100) UNIQUE NOT NULL
);

INSERT INTO USERS (Name, Email) VALUES
('Nguyễn Văn A', 'nguyenvana@example.com'),
('Trần Thị B', 'tranthib@example.com'),
('Lê Hoàng C', 'lehoangc@example.com'),
('Phạm Minh D', 'phamminhd@example.com'),
('Hoàng Anh E', 'hoanganhe@example.com');
