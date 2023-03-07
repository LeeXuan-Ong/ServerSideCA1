
DROP DATABASE IF EXISTS instrument_data;
CREATE DATABASE instrument_data;
use instrument_data;

DROP TABLE IF EXISTS instruments;
CREATE TABLE instruments(
	insId int NOT NULL AUTO_INCREMENT,
	insName VARCHAR(50),
	insStocks int,
	insDesc text,
	insPrice decimal(10,2),
	insCategory VARCHAR(50),
	PRIMARY KEY (insId)
);

CREATE TABLE users(
	userId int NOT NULL AUTO_INCREMENT,
	email VARCHAR(255),
	password VARCHAR(255),
	role varchar(50),
	PRIMARY KEY (userId)
);

CREATE TABLE carts(
userId int NOT NULL,
insId int NOT NULL,
quantity int,
PRIMARY KEY(userId, insId),
FOREIGN KEY (userId) REFERENCES Users(userId),
FOREIGN KEY (insId) REFERENCES Instruments(insId)
);

CREATE TABLE forms(
formId int NOT NULL,
formFirstName VARCHAR(50),
formLastName VARCHAR(50),
formMessage text,
formType VARCHAR(50),
created_at DATE,
userId int,
PRIMARY KEY (formId),
FOREIGN KEY (userId) REFERENCES Users(userId)
);

INSERT INTO instruments (insName, insStocks, insDesc, insPrice, insCategory) VALUES
('Guitar', 10, 'This is a guitar', 100.00, 'String'),
('Piano', 10, 'This is a piano', 100.00, 'String'),
('Drums', 10, 'This is a drum', 100.00, 'Percussion'),
('Violin', 10, 'This is a violin', 100.00, 'String'),
('Trumpet', 10, 'This is a trumpet', 100.00, 'Brass'),
('Saxophone', 10, 'This is a saxophone', 100.00, 'Brass'),
('Flute', 10, 'This is a flute', 100.00, 'Woodwind'),
('Clarinet', 10, 'This is a clarinet', 100.00, 'Woodwind'),
('Trombone', 10, 'This is a trombone', 100.00, 'Brass'),
('Cello', 10, 'This is a cello', 100.00, 'String');

INSERT INTO users (email, password, role) VALUES
('admin@admin.com', 'admin', 'admin'),
('customer01@mail.com', 'customer01', 'customer');