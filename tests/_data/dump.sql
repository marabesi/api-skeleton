CREATE TABLE users
(
    id INT(11) PRIMARY KEY,
    email VARCHAR(200) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME NOT NULL
);