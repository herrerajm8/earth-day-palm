-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2019 at 04:19 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edp`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `announcement_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `topic` text NOT NULL,
  `department` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`announcement_id`, `teacher_id`, `date`, `topic`, `department`) VALUES
(1, 1, '2018-02-28', 'asdasdada', 'DCIS'),
(2, 2, '2018-03-16', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Department of Fine Arts & Design'),
(3, 1, '2018-03-16', 'SMASH', 'smash'),
(4, 1, '2018-11-30', 'Text test', 'Cinema');

-- --------------------------------------------------------

--
-- Table structure for table `grados`
--

CREATE TABLE `grados` (
  `grade_id` int(11) NOT NULL,
  `studentid` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL,
  `mg` float DEFAULT NULL,
  `fg` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grados`
--

INSERT INTO `grados` (`grade_id`, `studentid`, `subjectid`, `mg`, `fg`) VALUES
(10, 71, 24, 1, 2),
(11, 71, 23, 1.5, 2.4);

-- --------------------------------------------------------

--
-- Table structure for table `pre-req`
--

CREATE TABLE `pre-req` (
  `subject` int(11) NOT NULL,
  `subject_prereq` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pre-req`
--

INSERT INTO `pre-req` (`subject`, `subject_prereq`) VALUES
(13, 11),
(22, 13),
(11, NULL),
(12, NULL),
(2, NULL),
(8, 2),
(10, 8),
(20, 10),
(15, NULL),
(4, NULL),
(5, 4),
(9, NULL),
(7, 9),
(20, 4),
(20, 4);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `roomID` int(11) NOT NULL,
  `roomType` enum('LAB','LECTURE','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`roomID`, `roomType`) VALUES
(1, 'LAB'),
(2, 'LECTURE'),
(3, 'LAB'),
(4, 'LAB'),
(5, 'LAB'),
(6, 'LAB'),
(7, 'LAB'),
(8, 'LAB'),
(9, 'LAB'),
(10, 'LAB'),
(11, 'LAB'),
(12, 'LECTURE'),
(13, 'LECTURE'),
(14, 'LECTURE'),
(15, 'LECTURE'),
(16, 'LECTURE'),
(17, 'LECTURE'),
(18, 'LECTURE'),
(19, 'LECTURE'),
(20, 'LECTURE');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studId` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `age` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `course` varchar(123) NOT NULL,
  `studentGender` enum('MALE','FEMALE','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studId`, `firstName`, `lastName`, `email`, `age`, `year`, `password`, `course`, `studentGender`) VALUES
(71, 'Michael', 'Cabusas', 'michaelcabusas@gmail.com', 21, 1, 'b59c67bf196a4758191e42f76670ceba', 'Acting', 'MALE'),
(72, 'Maxine', 'Salcedo', 'maxinesalcedo@gmail.com', 19, 1, 'b59c67bf196a4758191e42f76670ceba', 'Acting', 'FEMALE'),
(73, 'Tristan', 'Catane', 'ttcatane@gmail.com', 21, 1, '2be9bd7a3434f7038ca27d1918de58bd', 'Acting', 'MALE'),
(74, 'Arthur', 'Cabusas', 'ac@gmail.com', 20, 1, '934b535800b1cba8f96a5d72f72f1611', 'Cinema', 'MALE'),
(75, 'Joe', 'Joe', 'joejoe@gmail.com', 21, 1, 'b59c67bf196a4758191e42f76670ceba', 'Acting', 'MALE'),
(76, 'Rj', 'Ybanez', 'Rj@gmail.com', 20, 1, 'b59c67bf196a4758191e42f76670ceba', 'Cinema', 'MALE');

-- --------------------------------------------------------

--
-- Table structure for table `stud_enrollment`
--

CREATE TABLE `stud_enrollment` (
  `stud_enrollmentid` int(11) NOT NULL,
  `studentid` int(11) NOT NULL,
  `subjectscheduleid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stud_enrollment`
--

INSERT INTO `stud_enrollment` (`stud_enrollmentid`, `studentid`, `subjectscheduleid`) VALUES
(118, 71, 68),
(119, 71, 67),
(120, 75, 68),
(121, 75, 67),
(122, 75, 68),
(123, 75, 67),
(124, 75, 68);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subjectID` int(11) NOT NULL,
  `subjectCode` varchar(50) NOT NULL,
  `subjectName` varchar(50) NOT NULL,
  `units` int(11) NOT NULL,
  `courseType` enum('Acting','Cinema','Animation') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subjectID`, `subjectCode`, `subjectName`, `units`, `courseType`) VALUES
(1, 'CINEMA102', 'Directing Class III', 5, 'Cinema'),
(2, 'ANIMATION100', 'Animation I', 5, 'Animation'),
(4, 'CINEMA100', 'Directing Class I', 5, 'Cinema'),
(5, 'CINEMA101', 'Directing Class II', 5, 'Cinema'),
(7, 'CINEMA201', 'Cinema Ethics II', 1, 'Cinema'),
(8, 'ANIMATION101', 'Animation II', 5, 'Animation'),
(9, 'CINEMA200', 'Cinema Ethics I', 1, 'Cinema'),
(10, 'ANIMATION102', '3D Animation ', 5, 'Animation'),
(11, 'ACTING100', 'Stunt Double I', 3, 'Acting'),
(12, 'ACTING200', 'Broadway Acting History', 3, 'Acting'),
(13, 'ACTING101', 'Stunt Double II', 3, 'Acting'),
(14, 'CINEMA5505', 'International History of Cinema', 1, 'Cinema'),
(15, 'ANIMATION5505', 'History of the Middle Eastern Animation', 1, 'Animation'),
(20, 'CINEMA500', 'Graduation Project', 10, 'Cinema'),
(21, 'ANIMATION500', 'Graduation Project', 10, 'Animation'),
(22, 'ACTING500', 'Graduation Project', 10, 'Acting'),
(23, 'test101', 'test', 3, 'Acting'),
(24, 'TEST', 'test', 3, 'Acting'),
(25, 'jhghf', 'test2', 4, 'Acting');

-- --------------------------------------------------------

--
-- Table structure for table `subjectschedule`
--

CREATE TABLE `subjectschedule` (
  `subSchedID` int(11) NOT NULL,
  `roomid` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL,
  `teacherid` int(11) NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `day` enum('M','T','W','Th','F','Sat') NOT NULL,
  `semester` varchar(100) NOT NULL,
  `academic_year_start` int(11) NOT NULL,
  `academic_year_end` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjectschedule`
--

INSERT INTO `subjectschedule` (`subSchedID`, `roomid`, `subjectid`, `teacherid`, `time_start`, `time_end`, `day`, `semester`, `academic_year_start`, `academic_year_end`) VALUES
(67, 2, 23, 1, '07:30:00', '10:30:00', 'M', 'First', 2017, 2018),
(68, 12, 24, 1, '10:30:00', '12:30:00', 'M', 'First', 2017, 2018);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teachersID` int(11) NOT NULL,
  `fName` varchar(1000) NOT NULL,
  `lName` varchar(1000) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` enum('MALE','FEMALE','','') NOT NULL,
  `email` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `courseType` enum('Acting','Cinema','Animation','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teachersID`, `fName`, `lName`, `age`, `gender`, `email`, `password`, `courseType`) VALUES
(1, 'Tristan', 'Catane', 18, 'MALE', 'ttcatane@gmail.com', '934b535800b1cba8f96a5d72f72f1611', 'Acting'),
(2, 'John', 'Bryan', 25, 'MALE', 'admin@gmail.com', '934b535800b1cba8f96a5d72f72f1611', 'Animation'),
(3, 'Jim', 'Fucci', 32, 'MALE', 'jimfucci@gmail.com', '934b535800b1cba8f96a5d72f72f1611', 'Cinema'),
(4, 'Ken', 'Carmine', 42, 'MALE', 'kencarmine@gmail.com', '934b535800b1cba8f96a5d72f72f1611', 'Animation'),
(5, 'Elizabeth', 'O\'Conner', 25, 'FEMALE', 'elizabeth@gmail.com', '934b535800b1cba8f96a5d72f72f1611', 'Acting'),
(6, 'Daniel', 'Caesar', 20, 'MALE', 'daniel@gmail.com', '934b535800b1cba8f96a5d72f72f1611', 'Acting'),
(7, 'Patricia', 'Provo', 31, 'FEMALE', 'pp@gmail.com', '934b535800b1cba8f96a5d72f72f1611', 'Animation'),
(8, 'Milagros', 'Vitela', 35, 'FEMALE', 'milagros@gmail.com', '934b535800b1cba8f96a5d72f72f1611', 'Cinema'),
(9, 'Latosha', 'Provo', 25, 'FEMALE', 'latosha@gmail.com', '934b535800b1cba8f96a5d72f72f1611', 'Cinema'),
(10, 'Cortney', 'Bartmess', 36, 'MALE', 'cbartmess@gmail.com', '934b535800b1cba8f96a5d72f72f1611', 'Animation'),
(11, 'Makeda', 'Sheeran', 42, 'FEMALE', 'makeda@gmail.com', '934b535800b1cba8f96a5d72f72f1611', 'Acting'),
(12, 'Zandra', 'Selke', 38, 'FEMALE', 'zandra@gmail.com', '934b535800b1cba8f96a5d72f72f1611', 'Cinema'),
(13, 'Julian', 'Draxler', 21, 'MALE', 'julian@gmail.com', '934b535800b1cba8f96a5d72f72f1611', 'Cinema'),
(14, 'Anderson', 'Carrico', 22, 'MALE', 'anderson@gmail.com', '934b535800b1cba8f96a5d72f72f1611', 'Acting'),
(15, 'Louis', 'McCullers', 26, 'MALE', 'louis@gmail.com', '934b535800b1cba8f96a5d72f72f1611', 'Acting'),
(16, 'Bo', 'Oleary', 24, 'MALE', 'bo@gmail.com', '934b535800b1cba8f96a5d72f72f1611', 'Acting'),
(17, 'Marco', 'McGurk', 27, 'MALE', 'marco@gmail.com', '934b535800b1cba8f96a5d72f72f1611', 'Animation');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`announcement_id`),
  ADD KEY `fk_teachers_announcments` (`teacher_id`);

--
-- Indexes for table `grados`
--
ALTER TABLE `grados`
  ADD PRIMARY KEY (`grade_id`),
  ADD KEY `fk_grados_students` (`studentid`),
  ADD KEY `fk_grados_subject` (`subjectid`);

--
-- Indexes for table `pre-req`
--
ALTER TABLE `pre-req`
  ADD KEY `fk_class_subject` (`subject`),
  ADD KEY `fk_pre-req_subject` (`subject_prereq`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`roomID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studId`);

--
-- Indexes for table `stud_enrollment`
--
ALTER TABLE `stud_enrollment`
  ADD PRIMARY KEY (`stud_enrollmentid`),
  ADD KEY `fk_studenrollment_student` (`studentid`),
  ADD KEY `fk_studenrollment_subjectchedule` (`subjectscheduleid`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subjectID`);

--
-- Indexes for table `subjectschedule`
--
ALTER TABLE `subjectschedule`
  ADD PRIMARY KEY (`subSchedID`),
  ADD KEY `fk_subjectSched_subject` (`subjectid`),
  ADD KEY `fk_subjectSched_room` (`roomid`),
  ADD KEY `fk_subjectSched_teacher` (`teacherid`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teachersID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `announcement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `grados`
--
ALTER TABLE `grados`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `roomID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `studId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `stud_enrollment`
--
ALTER TABLE `stud_enrollment`
  MODIFY `stud_enrollmentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subjectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `subjectschedule`
--
ALTER TABLE `subjectschedule`
  MODIFY `subSchedID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teachersID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcements`
--
ALTER TABLE `announcements`
  ADD CONSTRAINT `fk_teachers_announcments` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teachersID`);

--
-- Constraints for table `grados`
--
ALTER TABLE `grados`
  ADD CONSTRAINT `fk_grados_students` FOREIGN KEY (`studentid`) REFERENCES `students` (`studId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_grados_subject` FOREIGN KEY (`subjectid`) REFERENCES `subject` (`subjectID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pre-req`
--
ALTER TABLE `pre-req`
  ADD CONSTRAINT `fk_class_subject` FOREIGN KEY (`subject`) REFERENCES `subject` (`subjectID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pre-req_subject` FOREIGN KEY (`subject_prereq`) REFERENCES `subject` (`subjectID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stud_enrollment`
--
ALTER TABLE `stud_enrollment`
  ADD CONSTRAINT `fk_studenrollment_student` FOREIGN KEY (`studentid`) REFERENCES `students` (`studId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_studenrollment_subjectchedule` FOREIGN KEY (`subjectscheduleid`) REFERENCES `subjectschedule` (`subSchedID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subjectschedule`
--
ALTER TABLE `subjectschedule`
  ADD CONSTRAINT `fk_subjectSched_room` FOREIGN KEY (`roomid`) REFERENCES `room` (`roomID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_subjectSched_teacher` FOREIGN KEY (`teacherid`) REFERENCES `teacher` (`teachersID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
