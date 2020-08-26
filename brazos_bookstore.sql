-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 10, 2019 at 02:41 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brazos_bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

DROP TABLE IF EXISTS `authors`;
CREATE TABLE IF NOT EXISTS `authors` (
  `AuthorID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  `BirthDate` date DEFAULT NULL,
  `Photo` varchar(255) DEFAULT NULL,
  `Notes` text,
  PRIMARY KEY (`AuthorID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`AuthorID`, `Name`, `BirthDate`, `Photo`, `Notes`) VALUES
(1, 'Nguyễn Nhật Ánh', '1968-12-08', 'EmpID1.pic', 'Education includes a BA in psychology from Colorado State University. She also completed (The Art of the Cold Call). Nancy is a member of \'Toastmasters International\'.'),
(2, 'JK.Rowling', '1952-02-19', 'EmpID2.pic', 'Andrew received his BTS commercial and a Ph.D. in international marketing from the University of Dallas. He is fluent in French and Italian and reads German. He joined the company as a sales representative, was promoted to sales manager and was then named vice president of sales. Andrew is a member of the Sales Management Roundtable, the Seattle Chamber of Commerce, and the Pacific Rim Importers Association.'),
(3, 'Leverling', '1963-08-30', 'EmpID3.pic', 'Janet has a BS degree in chemistry from Boston College). She has also completed a certificate program in food retailing management. Janet was hired as a sales associate and was promoted to sales representative.'),
(4, 'Peacock', '1958-09-19', 'EmpID4.pic', 'Margaret holds a BA in English literature from Concordia College and an MA from the American Institute of Culinary Arts. She was temporarily assigned to the London office before returning to her permanent post in Seattle.'),
(5, 'Buchanan', '1955-03-04', 'EmpID5.pic', 'Steven Buchanan graduated from St. Andrews University, Scotland, with a BSC degree. Upon joining the company as a sales representative, he spent 6 months in an orientation program at the Seattle office and then returned to his permanent post in London, where he was promoted to sales manager. Mr. Buchanan has completed the courses \'Successful Telemarketing\' and \'International Sales Management\'. He is fluent in French.'),
(6, 'Suyama', '1963-07-02', 'EmpID6.pic', 'Michael is a graduate of Sussex University (MA, economics) and the University of California at Los Angeles (MBA, marketing). He has also taken the courses \'Multi-Cultural Selling\' and \'Time Management for the Sales Professional\'. He is fluent in Japanese and can read and write French, Portuguese, and Spanish.'),
(7, 'King', '1960-05-29', 'EmpID7.pic', 'Robert King served in the Peace Corps and traveled extensively before completing his degree in English at the University of Michigan and then joining the company. After completing a course entitled \'Selling in Europe\', he was transferred to the London office.'),
(8, 'Callahan', '1958-01-09', 'EmpID8.pic', 'Laura received a BA in psychology from the University of Washington. She has also completed a course in business French. She reads and writes French.'),
(9, 'Dodsworth', '1969-07-02', 'EmpID9.pic', 'Anne has a BA degree in English from St. Lawrence College. She is fluent in French and German.'),
(10, 'West', '1928-09-19', 'EmpID10.pic', 'An old chum.');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `BookID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  `AuthorID` int(11) DEFAULT NULL,
  `CategoryID` int(11) DEFAULT '8',
  `Price` double DEFAULT '0',
  `PosterURI` varchar(255) DEFAULT 'no-thumbnail.jpg',
  `QuantitySold` int(11) DEFAULT '0',
  `ShortDescription` varchar(255) DEFAULT '',
  PRIMARY KEY (`BookID`),
  KEY `products_ibfk_2_idx` (`AuthorID`),
  KEY `books_ibfk_2_idx` (`CategoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`BookID`, `Title`, `AuthorID`, `CategoryID`, `Price`, `PosterURI`, `QuantitySold`, `ShortDescription`) VALUES
(1, 'Tôi thấy hoa vàng trên cỏ xanh', 1, 1, 68.99, 'book-1.jpg', 0, 'Cuốn sách bán chạy nhất năm 2018'),
(2, 'Nắng ban mai', 1, 1, 19, 'released-2.jpg', 0, ''),
(3, 'Phù Đổng Thiên Vương', 2, 6, 10, 'lich-su.gif', 0, ''),
(4, 'Hoàng tử ếch', 5, 6, 22, 'co-tich.jpg', 0, ''),
(5, 'Bí ẩn kim tự tháp', 6, 5, 21.35, 'khvt.jpg', 0, ''),
(6, 'Sách dạy nấu ăn', 8, 8, 25, 'released-4.jpg', 0, ''),
(7, 'Tôi thấy hoa vàng trên cỏ đen', 1, 7, 30, 'slider-book-2.png', 0, ''),
(8, 'Kỹ thuật nhiếp ảnh', 10, 8, 40, 'released-3.jpg', 0, ''),
(9, 'Quỷ nhập tràng', 4, 3, 97, 'kinh-di.jpg', 0, ''),
(10, 'Mưu sát', 4, 4, 31, 'trinh-tham.png', 0, ''),
(26, 'Harry Portter và Hòn đá phù thuỷ', 2, 2, 99.99, 'ebook-harry-potter-va-hon-da-phu-thuy-tap-1-epub-prc-mobi-pdf-azw3.jpg', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `CategoryID` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(255) NOT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `ThumbnailURI` varchar(255) DEFAULT 'no-thumbnail.jpg',
  PRIMARY KEY (`CategoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CategoryID`, `CategoryName`, `Description`, `ThumbnailURI`) VALUES
(1, 'Hành động', 'Thể loại này thường có nội dung về đánh nhau, bạo lực, hỗn loạn với diễn biến nhanh', 'released-3.jpg'),
(2, 'Phiêu lưu', 'Thể loại phiêu lưu, mạo hiểm, thường là hành trình của các nhân vật.', 'phieu-luu.jpg'),
(3, 'Kinh dị', 'Là thể loại rùng rợn, nghe cái tên là bạn đã hiểu thể loại này có nội dung thế nào. Nó làm cho bạn kinh hãi, khiếp sợ, ghê rợn, run rẩy, có thể gây sock – một thể loại không dành cho người yếu tim.', 'kinh-di.jpg'),
(4, 'Trinh thám', 'Các truyện có nội dung về các vụ án, các thám tử cảnh sát điều tra…', 'trinh-tham.png'),
(5, 'Khoa học Viễn tưởng', 'Bao gồm những chuyện khoa học viễn tưởng, đa phần chúng xoay quanh nhiều hiện tượng mà liên quan tới khoa học, công nghệ, tuy vậy thường thì những câu chuyện đó không gắn bó chặt chẽ với các thành tựu khoa học hiện thời.', 'khvt.jpg'),
(6, 'Truyện thiếu nhi', 'Truyện dành cho lứa tuổi thiếu nhi, thường là truyện cổ tích', 'co-tich.jpg'),
(7, 'Tâm lý tình cảm', 'Đề cập các yếu tố tình yêu, tâm sinh lý và các vấn đề trong cuộc sống thường ngày', 'released-2.jpg'),
(8, 'Khác', 'Thể loại khác', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company-info`
--

DROP TABLE IF EXISTS `company-info`;
CREATE TABLE IF NOT EXISTS `company-info` (
  `id` varchar(20) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 DEFAULT '',
  `address` varchar(100) CHARACTER SET utf8 DEFAULT '',
  `country` varchar(45) CHARACTER SET utf8 DEFAULT '',
  `phone` varchar(45) CHARACTER SET utf8 DEFAULT '',
  `email` varchar(100) DEFAULT '',
  `facebook` varchar(200) DEFAULT 'facebook.com',
  `twitter` varchar(200) DEFAULT 'twitter.com',
  `instagram` varchar(200) DEFAULT 'instagram.com',
  `map` varchar(500) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company-info`
--

INSERT INTO `company-info` (`id`, `name`, `address`, `country`, `phone`, `email`, `facebook`, `twitter`, `instagram`, `map`) VALUES
('DEFAULT', 'Brazos Bookstore - Tiệm sách quốc dân', 'Học viện Công nghệ Bưu chính Viễn thông, Km10 Nguyễn Trãi', 'Việt Nam', '(+84) 1 234 567 89', 'supportservice@brazos.com', 'facebook.com', 'twitter.com', 'instagram.com', '<iframe\r\n            src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.2688308447737!2d105.7966720144066!3d20.9818582947549!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135acc4106a8a99%3A0xda4db9c48cf21b05!2s1st+Domitory!5e0!3m2!1svi!2s!4v1558973902818!5m2!1svi!2s\"\r\n            width=\"100%\" height=\"250\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `CustomerID` int(11) NOT NULL AUTO_INCREMENT,
  `CustomerName` varchar(255) DEFAULT NULL,
  `Phone` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(255) DEFAULT NULL,
  `PostalCode` varchar(255) DEFAULT NULL,
  `Country` varchar(255) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  PRIMARY KEY (`CustomerID`),
  KEY `fk_account_idx` (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CustomerID`, `CustomerName`, `Phone`, `Address`, `City`, `PostalCode`, `Country`, `UserID`) VALUES
(1, 'Trần Văn Tuấn', '(463) 789-0434 239', '12 Hoàn Kiếm', 'Hà Nội', '12209', 'Việt Nam', NULL),
(2, 'Nguyễn Tuấn Mạnh', '080-695-1564', 'Avda. de la Constitución 2222', 'Hồ Chí Minh', '05021', 'Việt Nam', NULL),
(3, 'Antonio Moreno Taquería', '633-721-2870', 'Mataderos 2312', 'México D.F.', '05023', 'Mexico', NULL),
(4, 'Around the Horn', '061-059-0680', '120 Hanover Sq.', 'London', 'WA1 1DP', 'UK', NULL),
(5, 'Berglunds snabbköp', '555-043-2297', 'Berguvsvägen 8', 'Luleå', 'S-958 22', 'Sweden', NULL),
(6, 'Blauer See Delikatessen', '450-973-8160', 'Forsterstr. 57', 'Mannheim', '68306', 'Germany', NULL),
(7, 'Blondel père et fils', '130-361-9807', '24, place Kléber', 'Strasbourg', '67000', 'France', NULL),
(8, 'Bólido Comidas preparadas', '(763) 429-7478 0859', 'C/ Araquil, 67', 'Madrid', '28023', 'Spain', NULL),
(9, 'Bon app\'', '991-764-3684', '12, rue des Bouchers', 'Marseille', '13008', 'France', NULL),
(10, 'Bottom-Dollar Marketse', '(003) 298-1166', '23 Tsawassen Blvd.', 'Tsawassen', 'T2F 8M4', 'Canada', NULL),
(11, 'B\'s Beverages', '362-307-3899 955', 'Fauntleroy Circus', 'London', 'EC2 5NT', 'UK', NULL),
(12, 'Cactus Comidas para llevar', '799-715-1387', 'Cerrito 333', 'Buenos Aires', '1010', 'Argentina', NULL),
(13, 'Centro comercial Moctezuma', '801-038-1170', 'Sierras de Granada 9993', 'México D.F.', '05022', 'Mexico', NULL),
(14, 'Chop-suey Chinese', '927-017-1440', 'Hauptstr. 29', 'Bern', '3012', 'Switzerland', NULL),
(15, 'Comércio Mineiro', '056-097-3608', 'Av. dos Lusíadas, 23', 'São Paulo', '05432-043', 'Brazil', NULL),
(16, 'Consolidated Holdings', '565-387-5095', 'Berkeley Gardens 12 Brewery', 'London', 'WX1 6LT', 'UK', NULL),
(17, 'Drachenblut Delikatessend', '551-707-8360', 'Walserweg 21', 'Aachen', '52066', 'Germany', NULL),
(18, 'Du monde entier', '499-772-4426', '67, rue des Cinquante Otages', 'Nantes', '44000', 'France', NULL),
(19, 'Eastern Connection', '108-524-1244', '35 King George', 'London', 'WX3 6FW', 'UK', NULL),
(20, 'Ernst Handel', '039-329-2645', 'Kirchgasse 6', 'Graz', '8010', 'Austria', NULL),
(21, 'Familia Arquibaldo', '240-452-4697', 'Rua Orós, 92', 'São Paulo', '05442-030', 'Brazil', NULL),
(22, 'FISSA Fabrica Inter. Salchichas S.A.', '751-688-1070', 'C/ Moralzarzal, 86', 'Madrid', '28034', 'Spain', NULL),
(23, 'Folies gourmandes', '592-433-0414', '184, chaussée de Tournai', 'Lille', '59000', 'France', NULL),
(24, 'Trần Ngọc Phúc', '0987654321', '7A Nguyễn Trãi, Thanh Xuân', 'Hà Nội', '10000', 'Việt Nam', 6);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `CustomerID` int(11) NOT NULL,
  `BookID` int(11) NOT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Note` varchar(255) DEFAULT NULL,
  `Date` datetime DEFAULT CURRENT_TIMESTAMP,
  `Status` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_book_idx` (`BookID`),
  KEY `fk_customer_idx` (`CustomerID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `CustomerID`, `BookID`, `Quantity`, `Note`, `Date`, `Status`) VALUES
(3, 6, 2, 4, '', '2019-12-10 02:00:02', 0),
(4, 6, 2, 4, '', '2019-12-10 02:04:30', 0),
(5, 6, 2, 1, '', '2019-12-10 02:07:27', 1),
(6, 6, 3, 2, '', '2019-12-10 02:07:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `role` varchar(45) NOT NULL DEFAULT 'EMPL',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'ADMIN'),
(2, 'tuan', 'tuan', 'EMPL'),
(4, 'test', 'test', 'EMPL'),
(5, 'hello', 'dsadad', 'EMPL'),
(6, 'nptran', '1234', 'CUSTOMER');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`AuthorID`) REFERENCES `authors` (`AuthorID`),
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`CategoryID`);

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `fk_account` FOREIGN KEY (`UserID`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
