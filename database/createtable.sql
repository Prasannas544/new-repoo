---database name ->testdb

CREATE TABLE hosts(
    email VARCHAR(50) NOT NULL PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    phoneNo VARCHAR(15),
);
CREATE TABLE visiters(
    email VARCHAR(50) NOT NULL PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    phoneNo VARCHAR(15),
    checkIn DATETIME NOT NULL,
    host VARCHAR(50) NOT NULL,
    FOREIGN KEY (host) REFERENCES hosts(email)
);
