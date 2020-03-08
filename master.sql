-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2017 at 05:46 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE TABLE `login` (
  `user` varchar(50) NOT NULL,
  `passwrd` varchar(45) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `login` (`user`, `passwrd`, `role`) VALUES
('CIT-100-001/2020', 'kim', 2),
('pkamau', 'pkamau', 1),
('1000', '1000', 0),
('CIT-100-015/2020', 'brenda', 2),
('CIT-100-020/2020', 'Kowero', 2);

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `title` varchar(70) NOT NULL,
  `description` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `title`, `description`, `time`) VALUES
(13, 'Reminder: Submission Deadline for Proposals', 'You are all reminded to submit your proposals on time to avoid penalties.', '2017-03-03 14:02:34'),
(15, 'Progress Report', 'Dear Students you are required to submit your progress reports in soft copy before 5th Friday 2020 at 1600 hours.  Upload your soft copies in here and submit hard copies at the coordinator\'s office ', '2017-03-05 06:44:10'),
(16, 'Final session', 'Grand finale in June', '2020-02-02 07:08:31');

-- --------------------------------------------------------

--
-- Table structure for table `conceptnote`
--

CREATE TABLE `proposalnote` (
  `proposalid` int(15) NOT NULL AUTO_INCREMENT,
  `studentid` varchar(50) NOT NULL,
  `proposedtitle` varchar(100) NOT NULL,
  `expectedoutput` varchar(50) NOT NULL,
  `proposalfile` varchar(100) NOT NULL,
  `supervisor` varchar(20) NOT NULL,
  `reccomended` varchar(16) NOT NULL,
  `approval` varchar(20) DEFAULT NULL,
  `time` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conceptnote`
--

INSERT INTO `proposalnote` (`proposalid`, `studentid`, `proposedtitle`, `expectedoutput`, `proposalfile`, `supervisor`, `reccomended`, `approval`, `time`) VALUES
(1, 'CIT-100-001/2020', 'Makulaji', 'Mobile App', '', 'cvictor', 'waiting', 'waiting', '2020-02-19 09:53:00'),
(5, '$regNo', '$proptitle', '$expectedoutput', '$target_file', 'cvictor', 'no', 'disapproved', '2017-06-07 17:50:05');

-- --------------------------------------------------------

--
-- Table structure for table `grp`
--

--
-- Dumping data for table `grp`
--



-- --------------------------------------------------------



-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `idlogs` int(11) NOT NULL,
  `time` timestamp(6) NULL DEFAULT NULL,
  `progressreport_reportId` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--



-- --------------------------------------------------------

--
-- Table structure for table `pastproject`
--

CREATE TABLE `pastproject` (
  `id` int(5) NOT NULL,
  `title` text NOT NULL,
  `year` year(4) NOT NULL,
  `description` text NOT NULL,
  `output` text NOT NULL,
  `pastprojectfile` varchar(60) NOT NULL,
  `supervisorId` varchar(20) NOT NULL,
  `students` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pastproject`
--

INSERT INTO `pastproject` (`id`, `title`, `year`, `description`, `output`, `pastprojectfile`, `supervisorId`, `students`) VALUES
(1, 'Book Swappers', 2015, 'A site for book lovers to showcase their book libraries and swap books with other readers', 'Web App', '..\\past-projects\\BookSwappers.pdf', 'cvictor', '2015004');

-- --------------------------------------------------------

--
-- Table structure for table `progressreport`
--

CREATE TABLE `progressreport` (
  `reportId` int(5) NOT NULL,
  `projectId` int(5) NOT NULL PRIMARY KEY,
  `review` varchar(100) NOT NULL,
  `wk1_progress` varchar(100) DEFAULT NULL,
   `wk2_progress` varchar(100) DEFAULT NULL,
    `wk3_progress` varchar(100) DEFAULT NULL,
     `wk4_progress` varchar(100) DEFAULT NULL,
      `wk5_progress` varchar(100) DEFAULT NULL,
       `wk6_progress` varchar(100) DEFAULT NULL,
        `wk7_progress` varchar(100) DEFAULT NULL,
         `wk8_progress` varchar(100) DEFAULT NULL,
          `wk9_progress` varchar(100) DEFAULT NULL,
           `wk10_progress` varchar(100) DEFAULT NULL,
  `final` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `progressreport`
--

INSERT INTO `progressreport` (`reportId`, `projectId`, `review`, `wk1_progress`,  `wk2_progress`, `wk3_progress`, `wk4_progress`, `wk5_progress`, `wk6_progress`,`wk7_progress`,`wk8_progress`,`wk9_progress`,`wk10_progress`,`final`) VALUES
(1, 1, '', 'reports/gr42.pdf', NULL, NULL, NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `projectId` int(5) NOT NULL,
  `projectTitle` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `output` text NOT NULL,
  `regNo` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`projectId`, `projectTitle`, `description`, `output`, `regNo`) VALUES
(1, 'LGA\'s Land Valuation and Taxation Management System\r\n\r\n', 'An application that assists local governments in maintaining land and their respective tax collection data.', 'A web app','CIT-100-001/2020' );

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `regNo` varchar(50) NOT NULL,
  `fName` varchar(25) NOT NULL,
  `mName` varchar(25) DEFAULT NULL,
  `lName` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phoneNo` varchar(20) NOT NULL,
  `course` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`regNo`, `fName`, `mName`, `lName`, `email`, `phoneNo`, `course`) VALUES
('CIT-100-020/2020', 'Abubakari', ' Yasini', 'Kowero', 'abuyako@gmail.com', '+255714228208', 'Bsc. in Computer Science'),
('CIT-100-001/2020', 'Joe', ' Rono', 'Kimutai', 'kim@gmail.com', '0701223223', 'Bsc. in Computer Science'),
('CIT-100-021/2020', 'Timothy', '', 'Mwaisaka', 'timoso@yahoo.com', '+255716683434', 'Bsc. in Computer Science'),
('CIT-100-022/2020', 'Jesse-Justin', 'S', 'Mdachi', 'jessejustinm@gmail.com', '0684597032', 'Bsc. in Computer Science'),
('CIT-100-023/2020', 'Nancy', 'Victor', 'David', 'navish45@gmail.com', '0782120252', 'Bsc. in Computer Science'),
('CIT-100-024/2020', 'Janeth', 'Yohana', 'Mhagama', 'janethmhagama@gmail.com', '+255785979254', 'Bsc. in Computer Science'),
('CIT-100-025/2020', 'Raymond', NULL, 'Chacha', 'raymondchacha19@gmail.com', '0652799910', 'Bsc. in Computer Science'),
('CIT-100-026/2020', 'Daud ', NULL, 'Shanyangi', 'shaydavid46@gmail.com', '0719707543', 'Bsc. in Computer Science'),
('CIT-100-027/2020', 'Jerrold', 'John', 'Gwaseko', 'jjgwaseko@gmail.com', '0717939395', 'Bsc. in Computer Science'),
('CIT-100-028/2020', 'ANETH', NULL, 'NEMES ', 'mworiaaneth114@gmail.com  ', '0753993170  ', 'Bsc. in Computer Science'),
('CIT-100-029/2020', 'Brian', 'Jude', 'Mndeme', 'pierremory1@gmail.com', '0716879797', 'Bsc. in Computer Science'),
('CIT-100-030/2020', 'Emmanuel ', '', 'Manyhnela ', 'emanuelian3@gmail.com', '+255752548877', 'Bsc. in Computer Science'),
('CIT-100-031/2020', 'Godson', NULL, 'Derick', 'godsonderick@gmail.com', '0652559657', 'Bsc. in Computer Science'),
('CIT-100-032/2020', 'Ibrahim', 'Juma', 'Wickama', 'ibrahimwickama@gmail.com', '+255653994194', 'Bsc. in Computer Science'),
('CIT-100-033/2020', 'Jephter ', 'John', 'Saganda', 'jephtersaganda30@gmail.com', '0716474389', 'Bsc. in Computer Science'),
('CIT-100-034/2020', 'Oswald', 'Gerald', 'Moshi', 'moswaldgerald@gmail.com', '+255762592689', 'Bsc. in Computer Science'),
('CIT-100-035/2020', 'Jackson Paschal ', '', 'Jackson', 'paschaljackson111@gmail.com', '+255682611584', 'Bsc. in Computer Science'),
('CIT-100-036/2020', 'Pendo ', 'P', 'Gaitu', 'cutiependo@gmail.com', '+255653175907', 'Bsc. in Computer Science'),
('CIT-100-037/2020', 'Reuben ', 'W.', 'Mwakalundwa', '23nownii5t311a@gmail.com', '+255683950948', 'Bsc. in Computer Science'),
('CIT-100-038/2020', 'Teodori', '', 'FAUSTINE', 'theodoryf@gmail.com ', '0653974024  ', 'Bsc. in Computer Science'),
('CIT-100-039/2020', 'George', NULL, 'Elia', 'georgemarx90@gmail.com', '0713220532', 'Bsc. in Computer Science'),
('CIT-100-040/2020', 'Daniel', '', 'Babere', 'danielbabere@gmail.com', '+255657316169', 'Bsc with Computer Science'),
('CIT-100-041/2020', 'David ', 'Pius', 'Mbwilo', 'mbwilodavy@gmail.com', '+255652612459', 'Bsc. with Computer Science'),
('CIT-100-042/2020', 'Deogratias ', 'Peter', 'Amasi', 'amasdeorsantos@gmail.com', '+255712794778', 'BSc with Computer Science'),
('CIT-100-043/2020', 'Frank', NULL, 'Thomas', 'frankthomaseng@gmail.com', '0756618619', 'Bsc with Computer Science'),
('CIT-100-044/2020', 'Helena', 'Charles', 'Mwangila', 'mwangilahelena@gmail.com', '+255752150498', 'Bsc. with Computer Science');

-- --------------------------------------------------------

--
-- Table structure for table `suggestedgroup`
--

CREATE TABLE `stud` (
   `regNo` varchar(50) NOT NULL,
  `appId` int(7) NOT NULL,
  `approval` int(11) NOT NULL,
  `empId` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grp`
--

INSERT INTO `stud` (`appId`, `approval`, `empId`) VALUES
(6482, 1, 'mtunga','CIT-100-020/2020');



ALTER TABLE `stud`
  ADD PRIMARY KEY (`appId`),
  ADD KEY `empId` (`empId`)
   ADD UNIQUE KEY `regNo` (`regNo`);


-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `empId` varchar(20) NOT NULL,
  `fName` varchar(25) NOT NULL,
  `lName` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `phoneNo` varchar(15) NOT NULL,
  `expertise` varchar(50) NOT NULL,
  `office` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`empId`, `fName`, `lName`, `email`, `phoneNo`, `expertise`, `office`) VALUES
('cmushi', 'Cosmas', 'Mushi', 'joseph.cosmas@udsm.ac.tz', '0714141414', 'Web Programming', 'A23'),
('cvictor', 'Collins', 'Victor', 'c.victor@udsm.ac.tz', '0754545454', 'Internet Security', 'A20'),
('hkalisti', 'Mr. Henry', 'Kalisti', 'kanry2@gmail.com', '0758010101', 'Database', 'B108'),
('hkimaro', 'Dr. Honest', 'Kimaro', '', '', 'IOT', ''),
('kfrank', 'Mr. Kennedy', 'Frank', 'kenfactz@gmail.com', '', 'Data Science', ''),
('kkapis', 'Dr. Kosmas', 'Kapis', '', '', 'IT Security', 'A23'),
('mtunga', 'Ms. Mahadia', 'Tunga', 'mahadiatunga@gmail.com', '', 'Software Development', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conceptnote`
--
ALTER TABLE `proposalnote`
  ADD PRIMARY KEY (`proposalid`),
  ADD KEY `supervisor` (`supervisor`);

--
-- Indexes for table `grp`
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user`),
  ADD KEY `empId` (`user`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`idlogs`),
  ADD KEY `fk_logs_progressreport1_idx` (`progressreport_reportId`);

--
-- Indexes for table `members`
--


--
-- Indexes for table `pastproject`
--
ALTER TABLE `pastproject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supervisorId` (`supervisorId`);

--
-- Indexes for table `progressreport`
--
ALTER TABLE `progressreport`
  ADD PRIMARY KEY (`reportId`),
  ADD KEY `projectId` (`projectId`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`projectId`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`regNo`),
  ADD UNIQUE KEY `regNo` (`regNo`);

--
-- Indexes for table `suggestedgroup`
--

--
-- Indexes for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`empId`),
  ADD KEY `empId` (`empId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `conceptnote`
--
ALTER TABLE `proposalnote`
  MODIFY `proposalid` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `grp`
--

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `idlogs` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pastproject`
--
ALTER TABLE `pastproject`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `progressreport`
--
ALTER TABLE `progressreport`
  MODIFY `reportId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `projectId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `suggestedgroup`
--

-- Constraints for dumped tables
--

--
-- Constraints for table `proposalnote`
--
ALTER TABLE `proposalnote`
  ADD CONSTRAINT `proposalnote_ibfk_1` FOREIGN KEY (`supervisor`) REFERENCES `supervisor` (`empId`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `fk_logs_progressreport1` FOREIGN KEY (`progressreport_reportId`) REFERENCES `progressreport` (`reportId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--

--


--
-- Constraints for table `pastproject`
--
ALTER TABLE `pastproject`
  ADD CONSTRAINT `pastproject_ibfk_1` FOREIGN KEY (`supervisorId`) REFERENCES `supervisor` (`empId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `progressreport`
--
ALTER TABLE `progressreport`
  ADD CONSTRAINT `progressreport_ibfk_1` FOREIGN KEY (`projectId`) REFERENCES `project` (`projectId`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

