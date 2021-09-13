-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 14, 2021 at 04:32 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `OnlineExam`
--

-- --------------------------------------------------------

--
-- Table structure for table `Courses`
--

CREATE TABLE `Courses` (
  `idCourses` int(11) NOT NULL,
  `Cname` varchar(45) DEFAULT NULL,
  `Depts_idDepts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Courses`
--

INSERT INTO `Courses` (`idCourses`, `Cname`, `Depts_idDepts`) VALUES
(3, 'Data Structure and Algorithm', 4),
(4, 'PHP', 4),
(5, 'Applied', 4);

-- --------------------------------------------------------

--
-- Table structure for table `Depts`
--

CREATE TABLE `Depts` (
  `idDepts` int(11) NOT NULL,
  `Name` varchar(45) DEFAULT NULL,
  `Fid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Depts`
--

INSERT INTO `Depts` (`idDepts`, `Name`, `Fid`) VALUES
(4, 'Computer sc', 3),
(5, 'Maths', 4),
(6, 'bio tech', 5);

-- --------------------------------------------------------

--
-- Table structure for table `Exams`
--

CREATE TABLE `Exams` (
  `idExams` int(11) NOT NULL,
  `Title` varchar(45) DEFAULT NULL,
  `TimeLimit` varchar(45) DEFAULT NULL,
  `Qamount` int(11) DEFAULT NULL,
  `Desc` varchar(1000) DEFAULT NULL,
  `Created` varchar(45) DEFAULT NULL,
  `Courses_idCourses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Exams`
--

INSERT INTO `Exams` (`idExams`, `Title`, `TimeLimit`, `Qamount`, `Desc`, `Created`, `Courses_idCourses`) VALUES
(1, 'this is test', '5', 5, 'test one', '2021-07-13', 3),
(2, 'the first exam', '2', 2, 'test desc', '2021-07-13', 3);

-- --------------------------------------------------------

--
-- Table structure for table `Facultys`
--

CREATE TABLE `Facultys` (
  `idFacultys` int(11) NOT NULL,
  `Fname` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Facultys`
--

INSERT INTO `Facultys` (`idFacultys`, `Fname`) VALUES
(3, 'Informatics'),
(4, 'Computional'),
(5, 'vetrary medicen');

-- --------------------------------------------------------

--
-- Table structure for table `Questions`
--

CREATE TABLE `Questions` (
  `idQuestions` int(11) NOT NULL,
  `Question` varchar(5000) DEFAULT NULL,
  `Ch1` varchar(1000) DEFAULT NULL,
  `Ch2` varchar(1000) DEFAULT NULL,
  `Ch3` varchar(1000) DEFAULT NULL,
  `Ch4` varchar(1000) DEFAULT NULL,
  `Answer` varchar(1000) DEFAULT NULL,
  `Status` varchar(45) DEFAULT NULL,
  `Exams_idExams` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Questions`
--

INSERT INTO `Questions` (`idQuestions`, `Question`, `Ch1`, `Ch2`, `Ch3`, `Ch4`, `Answer`, `Status`, `Exams_idExams`) VALUES
(1, 'qust tst?', 'chhose a', 'chhose b', 'chhose c', 'chhose d', 'chhose c', 'yes', 2),
(2, 'this is war', 'chhose a', 'chhose b', 'chhose c', 'chhose d', 'chhose d', 'no', 2),
(3, 'third q', 'chhose a', 'chhose b', 'chhose c', 'chhose d', 'chhose b', 'yes', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Results`
--

CREATE TABLE `Results` (
  `idResults` int(11) NOT NULL,
  `Mark` int(11) DEFAULT NULL,
  `Exams_idExams` int(11) NOT NULL,
  `Users_Username` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Results`
--

INSERT INTO `Results` (`idResults`, `Mark`, `Exams_idExams`, `Users_Username`) VALUES
(1, 2, 2, 'stud'),
(2, 1, 2, 'stud'),
(3, 0, 2, 'stud'),
(4, 1, 2, 'stud'),
(5, 0, 2, 'stud'),
(6, 0, 2, 'stud');

-- --------------------------------------------------------

--
-- Table structure for table `Students`
--

CREATE TABLE `Students` (
  `idStudents` int(11) NOT NULL,
  `examid` int(11) NOT NULL,
  `Users_username` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `StuExams`
--

CREATE TABLE `StuExams` (
  `idStuExams` int(11) NOT NULL,
  `Users_Username` varchar(45) NOT NULL,
  `Exams_idExams` int(11) NOT NULL,
  `StuSts` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `StuExams`
--

INSERT INTO `StuExams` (`idStuExams`, `Users_Username`, `Exams_idExams`, `StuSts`) VALUES
(1, 'stud', 2, 'taken');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `Username` varchar(45) NOT NULL,
  `Fname` varchar(45) DEFAULT NULL,
  `Lname` varchar(45) DEFAULT NULL,
  `Pass` varchar(500) NOT NULL,
  `Role` varchar(45) DEFAULT NULL,
  `Status` varchar(45) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `Phone` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`Username`, `Fname`, `Lname`, `Pass`, `Role`, `Status`, `Email`, `Phone`) VALUES
('admin', 'Fadmin', 'Ladmin', '$2y$10$JGONv0.KMUVdWvwu/RSeUOQwHJ6LoYL5UycQqMl4vdc.sRgIHNXXi', 'admin', 'on', 'admin@gmail.com', 987654321),
('examc', 'Fec', 'Lec', '$2y$10$2TkgN756LQVqLawk4Y9lM.Ce0FHYpCLdY0nPG0mbjMVVBdlCcgzwm', 'ec', 'on', 'ec@gmail.com', 987654321),
('inst', 'Finst', 'Linst', '$2y$10$f1C.9QcfCEBBe9wX7jYQZe1yjFW9ZjOaFnM5IDsqZGghm/4vIqF6C', 'instracter', 'on', 'ins@gmail.com', 987654321),
('stud', 'fstudent', 'lstudent', '$2y$10$DkqkZ2Hmwj/XVvj3eP3k7Oy3etRhGVz/OMlfXJZGvFC.8/BU1wqmK', 'student', 'on', 'stud@gmail.com', 987654321);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Courses`
--
ALTER TABLE `Courses`
  ADD PRIMARY KEY (`idCourses`),
  ADD KEY `fk_Courses_Depts1_idx` (`Depts_idDepts`);

--
-- Indexes for table `Depts`
--
ALTER TABLE `Depts`
  ADD PRIMARY KEY (`idDepts`),
  ADD KEY `fk_Depts_Facultys1_idx` (`Fid`);

--
-- Indexes for table `Exams`
--
ALTER TABLE `Exams`
  ADD PRIMARY KEY (`idExams`),
  ADD KEY `fk_Exams_Courses1_idx` (`Courses_idCourses`);

--
-- Indexes for table `Facultys`
--
ALTER TABLE `Facultys`
  ADD PRIMARY KEY (`idFacultys`);

--
-- Indexes for table `Questions`
--
ALTER TABLE `Questions`
  ADD PRIMARY KEY (`idQuestions`),
  ADD KEY `fk_Questions_Exams1_idx` (`Exams_idExams`);

--
-- Indexes for table `Results`
--
ALTER TABLE `Results`
  ADD PRIMARY KEY (`idResults`),
  ADD KEY `fk_Results_Exams1_idx` (`Exams_idExams`),
  ADD KEY `fk_Results_Users1_idx` (`Users_Username`);

--
-- Indexes for table `Students`
--
ALTER TABLE `Students`
  ADD PRIMARY KEY (`idStudents`),
  ADD KEY `fk_Students_Users_idx` (`Users_username`);

--
-- Indexes for table `StuExams`
--
ALTER TABLE `StuExams`
  ADD PRIMARY KEY (`idStuExams`),
  ADD KEY `fk_StuExams_Users1_idx` (`Users_Username`),
  ADD KEY `fk_StuExams_Exams1_idx` (`Exams_idExams`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Courses`
--
ALTER TABLE `Courses`
  MODIFY `idCourses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Depts`
--
ALTER TABLE `Depts`
  MODIFY `idDepts` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Exams`
--
ALTER TABLE `Exams`
  MODIFY `idExams` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Facultys`
--
ALTER TABLE `Facultys`
  MODIFY `idFacultys` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Questions`
--
ALTER TABLE `Questions`
  MODIFY `idQuestions` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Results`
--
ALTER TABLE `Results`
  MODIFY `idResults` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Students`
--
ALTER TABLE `Students`
  MODIFY `idStudents` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `StuExams`
--
ALTER TABLE `StuExams`
  MODIFY `idStuExams` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Courses`
--
ALTER TABLE `Courses`
  ADD CONSTRAINT `fk_Courses_Depts1` FOREIGN KEY (`Depts_idDepts`) REFERENCES `Depts` (`idDepts`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Depts`
--
ALTER TABLE `Depts`
  ADD CONSTRAINT `fk_Depts_Facultys1` FOREIGN KEY (`Fid`) REFERENCES `Facultys` (`idFacultys`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Exams`
--
ALTER TABLE `Exams`
  ADD CONSTRAINT `fk_Exams_Courses1` FOREIGN KEY (`Courses_idCourses`) REFERENCES `Courses` (`idCourses`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Questions`
--
ALTER TABLE `Questions`
  ADD CONSTRAINT `fk_Questions_Exams1` FOREIGN KEY (`Exams_idExams`) REFERENCES `Exams` (`idExams`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Results`
--
ALTER TABLE `Results`
  ADD CONSTRAINT `fk_Results_Exams1` FOREIGN KEY (`Exams_idExams`) REFERENCES `Exams` (`idExams`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Results_Users1` FOREIGN KEY (`Users_Username`) REFERENCES `Users` (`Username`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Students`
--
ALTER TABLE `Students`
  ADD CONSTRAINT `fk_Students_Users` FOREIGN KEY (`Users_username`) REFERENCES `Users` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `StuExams`
--
ALTER TABLE `StuExams`
  ADD CONSTRAINT `fk_StuExams_Exams1` FOREIGN KEY (`Exams_idExams`) REFERENCES `Exams` (`idExams`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_StuExams_Users1` FOREIGN KEY (`Users_Username`) REFERENCES `Users` (`Username`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
