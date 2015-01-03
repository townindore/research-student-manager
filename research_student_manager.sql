-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 10, 2014 at 11:30 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `research_student_manager`
--
CREATE DATABASE IF NOT EXISTS `research_student_manager` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `research_student_manager`;

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE IF NOT EXISTS `administrator` (
  `User_ID` varchar(20) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Access_Lv` int(11) NOT NULL,
  PRIMARY KEY (`User_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`User_ID`, `Password`, `Access_Lv`) VALUES
('admin', 'admin', -1),
('editor', 'editor', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `Project_ID` int(11) NOT NULL,
  `Message_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Date_Time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Content` varchar(2000) NOT NULL,
  `isToStu` tinyint(1) NOT NULL DEFAULT '0',
  `isToSup` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Message_ID`),
  KEY `Project_ID` (`Project_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=100012 ;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`Project_ID`, `Message_ID`, `Date_Time`, `Content`, `isToStu`, `isToSup`) VALUES
(1001, 100001, '2014-04-08 21:51:20', 'This is to notify that this project has been approved by the Department of Graduate Studies. Please carry on with the further specifications.', 0, 1),
(1002, 100002, '2014-04-08 21:52:17', 'This is to nofify that this project has been reject due to that the funding source and funding budget is not approved. Please resubmit your request within 5 days or the project will be dropped.', 1, 1),
(1001, 100003, '2014-04-08 22:43:38', 'This is just a testing notification to let you know that your project is going well!', 1, 0),
(1003, 100005, '2014-04-26 18:29:47', 'Hi this is to inform you that your project has been approved!', 0, 1),
(1011, 100006, '2014-04-26 18:49:42', 'hi this is to notify you that your project has been approved!', 1, 0),
(1011, 100009, '2014-04-26 18:54:16', 'Hi good work with your proejct!', 0, 1),
(1011, 100011, '2014-04-26 18:55:13', 'Hi this is to let you know that your project is now at the mid term stage. good job!', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `Project_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Project_Title` varchar(100) NOT NULL,
  `Fund_Amount` int(10) NOT NULL,
  `Fund_Source` varchar(50) NOT NULL,
  `Fund_Purpose` varchar(20) NOT NULL,
  `Early_Assess` int(10) DEFAULT NULL,
  `Mid_Assess` int(10) DEFAULT NULL,
  `Final_Assess` int(10) DEFAULT NULL,
  `Project_Description` varchar(300) DEFAULT NULL,
  `Current_Stage` varchar(20) NOT NULL DEFAULT 'Proposing',
  `Managed_by` int(15) NOT NULL,
  PRIMARY KEY (`Project_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1014 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`Project_ID`, `Project_Title`, `Fund_Amount`, `Fund_Source`, `Fund_Purpose`, `Early_Assess`, `Mid_Assess`, `Final_Assess`, `Project_Description`, `Current_Stage`, `Managed_by`) VALUES
(1001, 'An Economics Phenomenon Research', 5000, 'Department of Economics', 'Research Equipment', 87, 67, 0, 'This is a project that researches into the current economics phenomenon topics of modern International finance', 'Mid-Tern', 1008),
(1002, 'Developing an automated information system', 8000, 'Faculty of Information', 'Research Use', 78, 86, 86, 'The automated information system project researches in to the ongoing trend in the area of information system design and development.', 'Completed', 1014),
(1003, 'Study of topics in Internet user social pattern', 10000, 'School of Business', 'Research', 94, 0, 0, 'The study of social pattern of online users is a part of a long-term project by the school of social studies, and it researches into how people communicate with new emerging Internet communication technologies.', 'Dropped', 1015),
(1004, 'Implmentation of a distributed online information ', 25000, 'Department of Computer Science', 'Implementation', 87, 87, 95, 'The implmentation of a distributed online information retrieval system project is a project conducted by the ', 'Completed', 1006),
(1005, 'Design of an Information System', 10000, 'Faculty of Information', 'Course Project', 65, 76, NULL, 'The Design of an Information system is a project that intends to build a state-of-the-art information system to be used by the Faculty of Information', 'Mid-Tern', 1002),
(1006, 'Implementation of a multiple processor machine', 50000, 'Department of Computer Engineering', 'Research', 77, 87, NULL, 'Multiple processor machines are machines that utilize the parallel processing technology of multiple processor to make maximum clock rate possible. This project intends to build such a machine.', 'Mid-Tern', 1013),
(1007, 'Comparison Studies of Programming Languages', 3000, 'Department of Computer Science', 'Research', NULL, NULL, NULL, 'Nowadays, many programming languages are prevalent in the field of computer science. This research aims to discover the commonalities and differences between these many programming languages.', 'Proposing', 1003),
(1008, 'A detailed analysis of Computer Hardware', 13000, 'Department of Computer Engineering', 'Research', NULL, NULL, NULL, 'Computer Hardware can be different for any specific computer engineering environment. This project aims to discover the implications behind the differences.', 'Proposing', 1012),
(1009, 'Analysis of social economics patterns in UK', 8000, 'Department of Economics', 'Research', NULL, NULL, NULL, 'The social economics patterns in the United Kingdom has some level complexity which is influenced by the population, the multiple cultural environment and the economics status of the society. This project aims to discover this.', 'Proposing', 1004),
(1010, 'Human Resource Management in Consulting Enterprise', 60000, 'School of Business', 'Research', NULL, NULL, NULL, 'Human resource management can be a different job in the consulting industry where knowledge is intensive and information exchange is frequent among employees.This project aims to discover the principles behind this.', 'Proposing', 1011),
(1011, 'Study of the advanced algorithms', 7500, 'Department of Computer Science', 'Research', 87, NULL, NULL, 'The algorithm and data structure are two key topics for any programming language. This study focuses on the advanced algorithms, and aims to discover the essence of it.', 'Mid-Tern', 1005),
(1012, 'Logistics and supply chain analysis of today''s e-commerce firms', 32000, 'School of Business', 'Research', NULL, NULL, NULL, 'In today''s e-commerce firms, logistics and supply chain activities have become more important than usual. This study studies logistics and supply chain analysis of today''s e-commerce firms.', 'Proposing', 1010),
(1013, 'Human computer interaction study of a design project', 2500, 'Department of Computer Science', 'Project', NULL, NULL, NULL, 'This is a project that is dedicated to research into the human computer interaction aspects of a design project by the department of computer science.', 'Dropped', 1007);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `Stu_Num` int(10) NOT NULL AUTO_INCREMENT,
  `Stu_Name` varchar(20) NOT NULL,
  `Birth_Date` date NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Program` varchar(25) NOT NULL,
  `Sup_ID` int(11) NOT NULL DEFAULT '1000',
  PRIMARY KEY (`Stu_Num`),
  KEY `student_ibfk_1` (`Sup_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10021 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Stu_Num`, `Stu_Name`, `Birth_Date`, `Gender`, `Email`, `Program`, `Sup_ID`) VALUES
(10001, 'Jackson Clark', '1991-09-15', 'Male', 'jacksonclark@bupt.edu.cn', 'E-commerce Engineering', 1008),
(10002, 'Ben Steven', '1990-01-21', 'Male', 'bensteven@bupt.edu.cn', 'Telecommunications', 1007),
(10003, 'Harry Peter', '1987-09-11', 'Male', 'harrypeter@bupt.edu.cn', 'Telecommunications', 1004),
(10004, 'Sally Jean', '1989-08-13', 'Female', 'sallyjean@qmul.ac.uk', 'E-commerce Engineering', 1001),
(10005, 'Jena Chen', '1992-03-23', 'Female', 'jenachen@qmul.ac.uk', 'E-commerce Engineering', 1015),
(10006, 'Adam Strong', '1992-08-06', 'Male', 'adam.strong@qmul.ac.uk', 'Computer Science', 1003),
(10007, 'Caroline Fisher', '1987-09-13', 'Female', 'caroline.fisher@qmul.ac.uk', 'Computer Science', 1004),
(10008, 'Dora Fong', '1991-01-31', 'Female', 'dora.fong@bupt.edu.cn', 'Telecommunications', 1003),
(10009, 'Lilia Homes', '1989-04-23', 'Female', 'lilia.homes@qmul.ac.uk', 'E-commerce Engineering', 1008),
(10010, 'Edward North', '1985-09-21', 'Male', 'edward.north@qmul.ac.uk', 'Computer Science', 1007),
(10011, 'Ferrari Helms', '1989-05-18', 'Male', 'ferrari.hemls@qmul.ac.uk', 'Telecommunications', 1010),
(10012, 'Ronnie Jasper', '1986-10-14', 'Female', 'Ronnie.Jasper@qmul.ac.uk', 'Telecommunications', 1006),
(10014, 'Gwenda Wat', '1987-11-07', 'Female', 'Gwenda.Wat@qmul.ac.uk', 'Computer Science', 1003),
(10015, 'Duane Reanna', '1987-12-13', 'Female', 'Duane.Reanna@qmul.ac.uk', 'Computer Engineering', 1009),
(10016, 'Norah Jerrold', '1988-01-02', 'Male', 'Norah.Jerrold@qmul.ac.uk', 'Computer Engineering', 1011),
(10017, 'Ernie Topher', '1988-01-04', 'Male', 'Ernie.Topher@qmul.ac.uk', 'Information Studies', 1000),
(10018, 'Kayla Cainneach', '1988-03-22', 'Female', 'Kayla.Cainneach@qmul.ac.uk', 'Information Studies', 1008),
(10019, 'Cecily Linford', '1988-05-05', 'Female', 'Cecily.Linford@qmul.ac.uk', 'Information Studies', 1010),
(10020, 'Flossie York', '1988-08-13', 'Male', 'Flossie.York@qmul.ac.uk', 'Information Studies', 1002);

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE IF NOT EXISTS `supervisor` (
  `Sup_Name` varchar(50) NOT NULL,
  `Sup_ID` int(11) NOT NULL,
  `Faculty` varchar(50) DEFAULT NULL,
  `Title` varchar(30) DEFAULT NULL,
  `Research_int` varchar(30) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`Sup_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`Sup_Name`, `Sup_ID`, `Faculty`, `Title`, `Research_int`, `email`) VALUES
('School of Graduate Studies', 1000, 'School of Graduate Studies', '', '', 'graduate.school@qmul.ac.uk'),
('Andrew Black', 1001, 'Department of Computer Science', 'Professor', 'Software Engineering', 'andrewblack@qmul.ac.uk'),
('Cherry Lara', 1002, 'Department of Economics', 'Associate Professor', 'Microeconomics', 'cherrylara@qmul.ac.uk'),
('Joan Steven', 1003, 'Department of Computer Science', 'Professor', 'Big Data', 'joan.steven@qmul.ac.uk'),
('Octavia Lusifer', 1004, 'Department of Economics', 'Associate Professor', 'Economics Engineering', 'octavia.lusifer@qmul.ac.uk'),
('Eunice Sue', 1005, 'Department of Computer Engineering', 'Associate Professor', 'Parallel Processing', 'Eunice.Sue@qmul.ac.uk'),
(' Vasant Brannon', 1006, 'Department of Economics', 'Dr.', 'Social Economics', 'Vasant.Brannon@qmul.ac.uk'),
('Sitara Andi', 1007, 'Faculty of Information', 'Professor', 'Information System Design', 'Sitara.Andi@qmul.ac.uk'),
('Malcom Barrfind', 1008, 'Faculty of Information', 'Professor', 'Information Science', 'Malcom.Barrfind@qmul.ac.uk'),
('Casey Rocky', 1009, 'Department of Computer Science', 'Dr.', 'Operation System', 'Casey.Rocky@qmul.ac.uk'),
('Tamsin Norah', 1010, 'Faculty of Information', 'Professor', 'Information Engineering', 'Tamsin.Norah@qmul.ac.uk'),
('Elaine Wynter', 1011, 'School of Business', 'Professor', 'Business Administration', 'Elaine.Wynter@qmul.ac.uk'),
('Purushottama Simon', 1012, 'School of Business', 'Professor', 'Human Resource Management', 'Purushottama.Simon@qmul.ac.uk'),
('Omar Perlie', 1013, 'School of Business', 'Associate Professor', 'Marketing', 'Omar.Perlie@qmul.ac.uk'),
('Dianna Tarah', 1014, 'Department of Computer Engineering', 'Dr.', 'Micro Processors', 'Dianna.Tarah@qmul.ac.uk'),
('Uzi Poliana', 1015, 'Department of Computer Engineering', 'Professor', 'The Internet of Things', 'uzi.poliana@qmul.ac.uk');

-- --------------------------------------------------------

--
-- Table structure for table `works_in`
--

CREATE TABLE IF NOT EXISTS `works_in` (
  `Stu_Num` int(11) NOT NULL,
  `Project_ID` int(11) NOT NULL,
  `Since_Date` date DEFAULT NULL,
  PRIMARY KEY (`Stu_Num`,`Project_ID`),
  KEY `Project_ID` (`Project_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `works_in`
--

INSERT INTO `works_in` (`Stu_Num`, `Project_ID`, `Since_Date`) VALUES
(10001, 1001, '2009-06-05'),
(10001, 1003, '2011-09-05'),
(10001, 1005, '2013-05-20'),
(10001, 1009, '2013-04-09'),
(10002, 1004, '2010-09-13'),
(10002, 1008, '2011-09-01'),
(10002, 1009, '2009-04-08'),
(10003, 1006, '2013-03-21'),
(10003, 1007, '2009-03-14'),
(10004, 1007, '2009-08-15'),
(10005, 1002, '2011-05-06'),
(10006, 1005, '2011-05-21'),
(10007, 1013, '2013-06-14'),
(10008, 1002, '2009-03-27'),
(10009, 1007, '2010-12-01'),
(10010, 1012, '2011-03-14'),
(10011, 1011, '2011-10-01'),
(10012, 1007, '2012-02-20'),
(10014, 1006, '2012-07-28'),
(10015, 1007, '2012-11-16'),
(10016, 1010, '2012-12-01'),
(10017, 1009, '2013-07-04'),
(10018, 1008, '2013-09-02'),
(10019, 1002, '2014-03-31'),
(10019, 1005, '2009-07-23'),
(10019, 1006, '2011-03-05'),
(10020, 1004, '2008-04-21');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`Project_ID`) REFERENCES `project` (`Project_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`Sup_ID`) REFERENCES `supervisor` (`Sup_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `works_in`
--
ALTER TABLE `works_in`
  ADD CONSTRAINT `works_in_ibfk_1` FOREIGN KEY (`Stu_Num`) REFERENCES `student` (`Stu_Num`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `works_in_ibfk_2` FOREIGN KEY (`Project_ID`) REFERENCES `project` (`Project_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
