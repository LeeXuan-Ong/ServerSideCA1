
DROP DATABASE IF EXISTS instrument_data;
CREATE DATABASE instrument_data;
use instrument_data;

DROP TABLE IF EXISTS instruments;
CREATE TABLE `instruments` (
`insId` int(11) NOT NULL AUTO_INCREMENT,
`insName` varchar(50) DEFAULT NULL,
`insStocks` int(11) DEFAULT NULL,
`insDesc` text DEFAULT NULL,
`insPrice` decimal(10,2) DEFAULT NULL,
`insCategory` varchar(50) DEFAULT NULL,
`imageId` int(11) DEFAULT NULL,
PRIMARY KEY (insId)
);

INSERT INTO `instruments` (`insId`, `insName`, `insStocks`, `insDesc`, `insPrice`, `insCategory`, `imageId`) VALUES
(1, 'Guitar', 10, 'This is a guitar', '100.00', 'String', 1),
(2, 'Piano', 10, 'This is a piano', '100.00', 'String', 1),
(3, 'Drums', 10, 'This is a drum', '100.00', 'Percussion', 1),
(4, 'Violin', 10, 'This is a violin', '100.00', 'String', 1),
(5, 'Trumpet', 10, 'This is a trumpet', '100.00', 'Brass', 1),
(6, 'Saxophone', 10, 'This is a saxophone', '100.00', 'Brass', 1),
(7, 'Flute', 10, 'This is a flute', '100.00', 'Woodwind', 1),
(8, 'Clarinet', 10, 'This is a clarinet', '100.00', 'Woodwind', 1),
(9, 'Trombone', 10, 'This is a trombone', '100.00', 'Brass', 1),
(10, 'Cello', 10, 'This is a cello', '100.00', 'String', NULL);

ALTER TABLE `instruments`
    AUTO_INCREMENT=11;

DROP TABLE IF EXISTS users;
CREATE TABLE `users` (
`userId` int(11) NOT NULL AUTO_INCREMENT,
`email` varchar(255) DEFAULT NULL,
`password` varchar(255) DEFAULT NULL,
`role` varchar(50) DEFAULT NULL,
`phone` varchar(255) DEFAULT NULL,
`address` text NOT NULL,
`age` int(11) NOT NULL,
`dob` date DEFAULT NULL,
`gender` varchar(255) NOT NULL,
PRIMARY KEY (userId)
);

INSERT INTO `users` (`userId`, `email`, `password`, `role`, `phone`, `address`, `age`, `dob`, `gender`) VALUES
(1, 'admin@admin.com', 'admin', 'admin', '00000000', 'My home', 99, '1998-02-18', 'male');


CREATE TABLE forms(
`formId` int(11) NOT NULL AUTO_INCREMENT,
`formFirstName` varchar(50) DEFAULT NULL,
`formLastName` varchar(50) DEFAULT NULL,
`formMessage` text DEFAULT NULL,
`created_at` date DEFAULT current_timestamp(),
`userId` int(11) DEFAULT NULL,
`formEmail` varchar(255) NOT NULL,
`formAddress` varchar(255) NOT NULL,
`formPhone` int(11) NOT NULL,
`formQuantity` int(11) NOT NULL,
`insId` int(11) NOT NULL,
PRIMARY KEY (formId)
);

INSERT INTO `forms` (`formId`, `formFirstName`, `formLastName`, `formMessage`, `created_at`, `userId`, `formEmail`, `formAddress`, `formPhone`, `formQuantity`, `insId`) VALUES
(1, 'test', 'test', 'test', '2023-03-15', 1, 'test@gmail.com', 'test', 874068686, 3, 0),
(2, 'test', 'test', 'test', '2023-03-15', 1, 'test@gmail.com', 'test', 874068686, 3, 0);

ALTER TABLE `forms`
AUTO_INCREMENT=3;

DROP TABLE IF EXISTS images;
CREATE TABLE `images` (
`imgId` int(11) NOT NULL AUTO_INCREMENT,
`imgType` varchar(255) NOT NULL,
`imgContent` longblob NOT NULL,
`imgName` varchar(255) NOT NULL,
primary key (imgId)
);

INSERT INTO `images` (`imgId`, `imgType`, `imgContent`, `imgName`) VALUES
(1, 'image/png', 0x89504e470d0a1a0a0000000d49484452000000ad000000820803000000038bb89200000039504c5445ffffffa1a1a19d9d9deaeaeaaeaeaef8f8f8c8c8c89a9a9ad5d5d5e2e2e2eeeeeeb6b6b6fcfcfccecececbcbcbf1f1f1dbdbdbc0c0c0a7a7a7ab53f702000001a049444154789cedd9ed6e8230148061cf29500a88c0fd5fece44386c0b2b22d395df23ebf0c42f20aa545bddd0000000000000000000000c06f85ec27ee46b585577f990eb9556d5bb96baa4e32b3daf2f23115b55196dac68547f431d6b58f5a6488bed18d6bf34145c4c7e61ad7965e464313778c716daf53ad8f6c30ae2dfe55ad9b4682f627ef87ee18663d27dcbdaa1f4ee6b0d2fbec309aad6b6faee8cf6684f01c225aefb79ad79e6b86698474bbcd89d6d6cbdde7de37a759dbcdb122bba19b64ed3c539ccc1629d63699acfcdbd04da67673c97bfdac15ad363ba5521beaf59a775eb6eacde748a43678792d0695bec58adf0cdd346af3717ad5767a5def6a45c3ba5f12b5cd5ce8c7acdecbc13a7493a85d9e72e5f9bc10f66756b62b700ab54ed72c776c1d4f7a9b4eed767a1d4e6b455d32b587dbea4c9e486d1713bbacc0e6b52e26f6f5b5d8bc368bab9d5760ebda223256a64ee3da70b2167c75727bebdaeaf91d32dab8bf696d575cd136a6b54d7e91b3abd5e1fadf0e6a555b46df5f5b7de4ef7b7feee29f0e33a3530b00000000000000000000c0373e00c8f113dbc1dfef830000000049454e44ae426082, 'images.png');

ALTER TABLE `images`
AUTO_INCREMENT=2;
