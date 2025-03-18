
CREATE TABLE USERS (
    IDUser CHAR(36) PRIMARY KEY DEFAULT (UUID()),
    UserName VARCHAR(100) NOT NULL,
    PhoneNumber INTEGER(20) UNIQUE NOT NULL,
    Email VARCHAR(100) UNIQUE NOT NULL,
    IsDeleted BOOLEAN DEFAULT FALSE
);

INSERT INTO USERS (UserName, PhoneNumber, Email, `IsDeleted`) 
VALUES ('John Doe', 1234567890, 'john.doe@example.com', FALSE);