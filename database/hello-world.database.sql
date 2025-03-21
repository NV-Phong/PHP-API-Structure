CREATE DATABASE HELLO_WORLD

USE HELLO_WORLD

CREATE TABLE USERS (
    IDUser CHAR(36) PRIMARY KEY DEFAULT (UUID()),
    UserName VARCHAR(100) NOT NULL,
    PhoneNumber INTEGER(20) UNIQUE NOT NULL,
    Email VARCHAR(100) UNIQUE NOT NULL,
    IsDeleted BOOLEAN DEFAULT FALSE
);

INSERT INTO USERS (UserName, PhoneNumber, Email, `IsDeleted`) 
VALUES ('John Doe', 1234567890, 'john.doe@example.com', FALSE);


CREATE TABLE ANHMOI(
   IDAnhMoi  CHAR(36) PRIMARY KEY DEFAULT (UUID()),
   RealName  VARCHAR(255) UNIQUE NOT NULL,
   BirthDate DATE NOT NULL,
   Gender    BOOLEAN NOT NULL,
   IQ        INTEGER NOT NULL,
   IsDeleted  BOOLEAN NOT NULL
)

INSERT INTO ANHMOI (RealName, BirthDate, Gender, IQ, IsDeleted) VALUES
('Lầu Hoàng Nguyên', '1990-05-15', FALSE, 120, FALSE),
('Lầu Hoàng Phong', '1988-12-03', TRUE, 115, FALSE),
('Lầu Hoàng Nhân', '1995-08-22', TRUE, 125, FALSE),
('Lầu Hoàng Phú', '1992-02-10', FALSE, 118, FALSE),
('Lầu Hoàng Phước', '1985-11-30', TRUE, 130, FALSE),
('Lầu Hoàng Nghĩa', '1985-11-30', TRUE, 130, FALSE),
('Lầu Hoàng Tây', '1985-11-30', TRUE, 130, FALSE);
