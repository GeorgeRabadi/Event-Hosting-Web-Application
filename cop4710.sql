-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1

--
-- Database: `cop4710`
--
-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `userID` varchar(20) NOT NULL,
  `eventName` varchar(20) NOT NULL,
  `text` varchar(8000) NOT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `userID`, `eventName`, `text`, `rating`) VALUES
(1, 'AUCF', 'EVENTUCFPRIVATE', 'Amazing Event! Loved the food and drinks! Can\'t wait for next year\'s event!', 5),
(2, 'UUCF', 'EVENTUCFPRIVATE', 'The admin above me is lying lol', 5);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `userID` varchar(20) NOT NULL,
  `eventName` varchar(20) NOT NULL,
  `text` varchar(8000) NOT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `userID`, `eventName`, `text`, `rating`) VALUES
(1, 'AUCF', 'EVENTUCFPRIVATE', 'Amazing Event! Loved the food and drinks! Can\'t wait for next year\'s event!', 5),
(2, 'UUCF', 'EVENTUCFPRIVATE', 'The admin above me is lying lol', 5);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `Host` varchar(20) NOT NULL,
  `rsoName` varchar(50) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `category` varchar(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  `time` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `locationName` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phoneNum` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`Host`, `rsoName`, `name`, `category`, `description`, `time`, `date`, `locationName`, `type`, `email`, `phoneNum`) VALUES
('AUMIAMI', 'RSOMIAMI', 'EVENTMIAMIPRIVATE', 'Category1', 'Description1', '01:01', '0001-01-01', 'University of Miami, South Dixie Highway, Coral Gables, FL, USA', 'Private', 'email1@umiami.edu', '0000000000'),
('AUMIAMI', 'RSOMIAMI', 'EVENTMIAMIRSO', 'Category2', 'Description2', '01:01', '0001-01-01', 'University of Miami, South Dixie Highway, Coral Gables, FL, USA', 'RSO', 'email2@umiami.edu', '0000000000'),
('AUCF', 'RSOUCF', 'EVENTUCFPRIVATE', 'Category1', 'Description1', '01:01', '0001-01-01', 'University of Central Florida, Central Florida Blvd, Orlando, FL, USA', 'Private', 'email1@knights.ucf.edu', '0000000000'),
('AUCF', 'RSOUCF', 'EVENTUCFRSO', 'Category2', 'Description2', '01:01', '0001-01-01', 'University of Central Florida, Central Florida Blvd, Orlando, FL, USA', 'RSO', 'email2@knights.ucf.edu', '0000000000'),
('AUFL', '', 'EVENTUFLPUBLIC3', 'Category3', 'Description3', '02:02', '0001-02-02', 'University of Florida, Gainesville, FL, USA', 'Public', 'email3@ufl.edu', '0000000000'),
('AUSF', 'RSOUSF', 'EVENTUSFPRIVATE', 'Category1', 'Description1', '01:01', '0001-01-01', 'University of South Florida, East Fowler Avenue, Tampa, FL, USA', 'Private', 'email1@mail.usf.edu', '0000000000'),
('AUSF', 'RSOUSF', 'EVENTUSFRSO', 'Category2', 'Description2', '01:01', '0001-01-01', 'University of South Florida, East Fowler Avenue, Tampa, FL, USA', 'RSO', 'email2@mail.usf.edu', '0000000000'),
('SAVALENCIA', 'RSOVALENCIA', 'EVENTVALENCIAPRIVATE', 'Category1', 'Description1', '01:01', '0001-01-01', 'Valencia College, West Campus, South Kirkman Road, Orlando, FL, USA', 'Private', 'email1@mail.valenciacollege.edu', '0000000000'),
('SAVALENCIA', 'RSOVALENCIA', 'EVENTVALENCIARSO', 'Category2', 'Description2', '01:01', '0001-01-01', 'Valencia College, West Campus, South Kirkman Road, Orlando, FL, USA', 'RSO', 'email2@mail.valenciacollege.edu', '0000000000'),
('AUFL', 'RSOUFL1', 'RSOEVENTPRIVATE1', 'Category1', 'Description2', '01:01', '0001-01-01', 'University of Florida, Gainesville, FL, USA', 'RSO', 'email2@ufl.edu', '0000000000'),
('AUCF', '', 'UCFPUBLICEVENT', 'Category1', 'Description3', '01:01', '0001-01-01', 'UCF, Central Florida Blvd, Orlando, FL, USA', 'Public', 'email@knights.ucf.edu', '0000000000'),
('AUCF', '', 'UCFPUBLICEVENT1', 'Category2', 'Description2', '01:01', '0001-01-01', 'UCF, Central Florida Blvd, Orlando, FL, USA', 'Public', 'email2@knights.ucf.edu', '0000000000'),
('SAUFL', 'RSOUFL', 'UFLEVENTPRIVATE', 'Category2', 'Description1', '01:01', '0001-01-01', 'University of Florida, Gainesville, FL, USA', 'Private', 'email1@ufl.edu', '0000000000'),
('SAUFL', 'RSOUFL', 'UFLEVENTRSO', 'Category1', 'Description1', '01:01', '0001-01-01', 'University of Florida, Gainesville, FL, USA', 'RSO', 'email2@ufl.edu', '0000000000');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `locationName` varchar(255) NOT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`locationName`, `latitude`, `longitude`) VALUES
('UCF, Central Florida Blvd, Orlando, FL, USA', '28.6024274', '-81.200059'),
('University of Central Florida, Central Florida Blvd, Orlando, FL', '28.6024', '81.2001'),
('University of Central Florida, Central Florida Blvd, Orlando, FL, USA', '28.6024274', '-81.200059'),
('University of Florida, Gainesville, FL, USA', '29.6436325', '-82.354930'),
('University of Miami, South Dixie Highway, Coral Gables, FL, USA', '25.7173947', '-80.278126'),
('University of South Florida, East Fowler Avenue, Tampa, FL, USA', '28.0587031', '-82.413853'),
('USF - University of South Florida | Office of Financial Aid, E Fowler Ave, Tampa, FL, USA', '28.0625694', '-82.412571'),
('Valencia College, West Campus, South Kirkman Road, Orlando, FL, USA', '28.5210228', '-81.465636');

-- --------------------------------------------------------

--
-- Table structure for table `requestedevents`
--

CREATE TABLE `requestedevents` (
  `Host` varchar(20) NOT NULL,
  `rsoName` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `category` varchar(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  `time` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `locationName` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phoneNum` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requestedrso`
--

CREATE TABLE `requestedrso` (
  `rsoName` varchar(50) NOT NULL,
  `adminID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requestedrsomembership`
--

CREATE TABLE `requestedrsomembership` (
  `rsoName` varchar(50) NOT NULL,
  `userID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rso`
--

CREATE TABLE `rso` (
  `rsoName` varchar(50) NOT NULL,
  `adminID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rso`
--

INSERT INTO `rso` (`rsoName`, `adminID`) VALUES
('RSOUCF', 'AUCF'),
('RSOUCF2', 'AUCF'),
('RSOUFL', 'AUFL'),
('RSOUFL1', 'AUFL'),
('RSOUFL2', 'AUFL'),
('RSOUSF', 'AUSF'),
('RSOMIAMI', 'SAUMIAMI'),
('RSOUSF1', 'SAUSF'),
('RSOUFL3', 'UUFL'),
('RSOUSF2', 'UUSF1'),
('RSOVALENCIA', 'UVALENCIA1'),
('RSOVALENCIA1', 'UVALENCIA1');

-- --------------------------------------------------------

--
-- Table structure for table `rsojoinrequests`
--

CREATE TABLE `rsojoinrequests` (
  `rsoName` varchar(50) NOT NULL,
  `userID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rsojoinrequests`
--

INSERT INTO `rsojoinrequests` (`rsoName`, `userID`) VALUES
('RSOUCF2', 'SAUCF');

-- --------------------------------------------------------

--
-- Table structure for table `rsomembership`
--

CREATE TABLE `rsomembership` (
  `rsoName` varchar(50) NOT NULL,
  `userID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rsomembership`
--

INSERT INTO `rsomembership` (`rsoName`, `userID`) VALUES
('RSOMIAMI', 'AUMIAMI'),
('RSOMIAMI', 'SAUMIAMI'),
('RSOMIAMI', 'UUMIAMI'),
('RSOMIAMI', 'UUMIAMI1'),
('RSOMIAMI', 'UUMIAMI2'),
('RSOMIAMI', 'UUMIAMI3'),
('RSOUCF', 'AUCF'),
('RSOUCF', 'UUCF'),
('RSOUCF', 'UUCF1'),
('RSOUCF', 'UUCF2'),
('RSOUCF2', 'AUCF'),
('RSOUCF2', 'UUCF'),
('RSOUCF2', 'UUCF1'),
('RSOUFL', 'AUFL'),
('RSOUFL', 'SAUFL'),
('RSOUFL', 'UUFL'),
('RSOUFL', 'UUFL1'),
('RSOUFL', 'UUFL2'),
('RSOUFL', 'UUFL3'),
('RSOUFL', 'UUFL4'),
('RSOUFL1', 'AUFL'),
('RSOUFL1', 'SAUFL'),
('RSOUFL1', 'UUFL'),
('RSOUFL1', 'UUFL1'),
('RSOUFL1', 'UUFL2'),
('RSOUFL1', 'UUFL3'),
('RSOUFL2', 'AUFL'),
('RSOUFL2', 'SAUFL'),
('RSOUFL2', 'UUFL1'),
('RSOUFL2', 'UUFL2'),
('RSOUFL2', 'UUFL3'),
('RSOUFL3', 'AUFL'),
('RSOUFL3', 'SAUFL'),
('RSOUFL3', 'UUFL'),
('RSOUFL3', 'UUFL1'),
('RSOUSF', 'AUSF'),
('RSOUSF', 'SAUSF'),
('RSOUSF', 'UUSF'),
('RSOUSF', 'UUSF1'),
('RSOUSF', 'UUSF4'),
('RSOUSF1', 'AUSF'),
('RSOUSF1', 'SAUSF'),
('RSOUSF1', 'UUSF'),
('RSOUSF1', 'UUSF1'),
('RSOUSF1', 'UUSF2'),
('RSOUSF1', 'UUSF3'),
('RSOUSF2', 'AUSF'),
('RSOUSF2', 'SAUSF'),
('RSOUSF2', 'UUSF'),
('RSOUSF2', 'UUSF1'),
('RSOUSF2', 'UUSF2'),
('RSOVALENCIA', 'AVALENCIA'),
('RSOVALENCIA', 'SAVALENCIA'),
('RSOVALENCIA', 'UVALENCIA'),
('RSOVALENCIA', 'UVALENCIA1'),
('RSOVALENCIA1', 'SAVALENCIA'),
('RSOVALENCIA1', 'UVALENCIA'),
('RSOVALENCIA1', 'UVALENCIA1'),
('RSOVALENCIA1', 'UVALENCIA2'),
('RSOVALENCIA1', 'UVALENCIA3');

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

CREATE TABLE `university` (
  `universityName` varchar(50) NOT NULL,
  `locationName` varchar(100) NOT NULL,
  `description` varchar(8000) DEFAULT NULL,
  `numStudents` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `university`
--

INSERT INTO `university` (`universityName`, `locationName`, `description`, `numStudents`) VALUES
('The University of Florida', 'University of Florida, Gainesville, FL, USA', 'One of America’s all-around best universities, the University of Florida drives future-making education, eye-opening discoveries, life-saving health care, and community-building collaboration for our state, our nation, and our world.', '52,367'),
('The University of Miami', 'University of Miami, South Dixie Highway, Coral Gables, FL, USA', 'As one of the top research universities in the country, the University of Miami brings together esteemed faculty and talented students from throughout the United States and the world. Challenging courses, projects that forge together knowledge and practice, and a stimulating, diverse environment – find it all at the U.', '19,000'),
('University of Central Florida', 'University of Central Florida, Central Florida Blvd, Orlando, FL', 'UCF is unleashing the potential of students & faculty. UCF is one of America\'s best colleges for academics, research, impact & value.', '66,183'),
('University of South Florida', 'University of South Florida, East Fowler Avenue, Tampa, FL, USA', 'Home to more than 2,200 students and 130 faculty members, the University of South Florida College of Education values high-quality education and excellence in research, teaching and learning. Our college is nationally accredited by the Council for the Accreditation of Educator Preparation (CAEP) and our educator preparation programs are fully approved by the Florida Department of Education.', '37,000'),
('Valencia College', 'Valencia College, West Campus, South Kirkman Road, Orlando, FL, USA', 'At Valencia College, you\'ll get a quality education at a price you can afford. We offer the same education as a state university, only at about half the cost. And, with smaller campuses and classes, you\'ll get more support along the way.', '42,631');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` varchar(20) NOT NULL,
  `universityName` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `UserStatus` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `universityName`, `password`, `UserStatus`) VALUES
('AUCF', 'University of Central Florida', 'dc34895379d40411ea0eba0081345c11', 'A'),
('AUFL', 'The University of Florida', '9f726efbd9c32dce1a21b9f7646b5808', 'A'),
('AUMIAMI', 'The University of Miami', '3b807c96f2ebc0126adc99e96fdfe7b8', 'A'),
('AUSF', 'University of South Florida', 'ec651c1b3fa81c7bb77d8edcb01ba8da', 'A'),
('AVALENCIA', 'Valencia College', '1c112ff4a2d96d4ea02e5455c0e6aee9', 'A'),
('GeorgeRabadi', 'University of Central Florida', 'cced671a552230ec280134094fbaa4d8', 'U'),
('SAUCF', 'University of Central Florida', 'e704c5fd0e3ef94b8e65a1bb2b567f29', 'S'),
('SAUFL', 'The University of Florida', 'd4b1585eb140b0f718615f8e8d7301fd', 'S'),
('SAUMIAMI', 'The University of Miami', '24c96e1c5355803b6d819b29aeb620ba', 'S'),
('SAUSF', 'University of South Florida', '2aa92c1927c27e31001330839a9d1820', 'S'),
('SAVALENCIA', 'Valencia College', '92666e6c39e48d199529748b6f151c95', 'S'),
('UUCF', 'University of Central Florida', '96ca7a20b17e67a5614ae0f7dc5f5837', 'U'),
('UUCF1', 'University of Central Florida', '96ca7a20b17e67a5614ae0f7dc5f5837', 'A'),
('UUCF2', 'University of Central Florida', '96ca7a20b17e67a5614ae0f7dc5f5837', 'U'),
('UUCF3', 'University of Central Florida', '96ca7a20b17e67a5614ae0f7dc5f5837', 'U'),
('UUCF4', 'University of Central Florida', '96ca7a20b17e67a5614ae0f7dc5f5837', 'U'),
('UUFL', 'The University of Florida', 'a511c3f1dbfe05b37b6c41098ede7590', 'A'),
('UUFL1', 'The University of Florida', 'a511c3f1dbfe05b37b6c41098ede7590', 'U'),
('UUFL2', 'The University of Florida', 'a511c3f1dbfe05b37b6c41098ede7590', 'U'),
('UUFL3', 'The University of Florida', '75cf5b29db244c5d63b12988da21a979', 'U'),
('UUFL4', 'The University of Florida', 'a511c3f1dbfe05b37b6c41098ede7590', 'U'),
('UUMIAMI', 'The University of Miami', 'a816c16dc26124ac507307f390e113d3', 'U'),
('UUMIAMI1', 'The University of Miami', 'a816c16dc26124ac507307f390e113d3', 'U'),
('UUMIAMI2', 'The University of Miami', 'a816c16dc26124ac507307f390e113d3', 'U'),
('UUMIAMI3', 'The University of Miami', '7db3fef51450979176a5db8c07c17baf', 'U'),
('UUMIAMI4', 'The University of Miami', 'a816c16dc26124ac507307f390e113d3', 'U'),
('UUSF', 'University of South Florida', 'faf283fff77e69147782d3551f3ca0c2', 'U'),
('UUSF1', 'University of South Florida', 'faf283fff77e69147782d3551f3ca0c2', 'A'),
('UUSF2', 'University of South Florida', 'faf283fff77e69147782d3551f3ca0c2', 'U'),
('UUSF3', 'University of South Florida', 'faf283fff77e69147782d3551f3ca0c2', 'U'),
('UUSF4', 'University of South Florida', 'faf283fff77e69147782d3551f3ca0c2', 'U'),
('UVALENCIA', 'Valencia College', '1c112ff4a2d96d4ea02e5455c0e6aee9', 'U'),
('UVALENCIA1', 'Valencia College', '001252490bea484094b6748fdf1dc7c0', 'A'),
('UVALENCIA2', 'Valencia College', '1c112ff4a2d96d4ea02e5455c0e6aee9', 'U'),
('UVALENCIA3', 'Valencia College', '650c90e00bbf15db0df37f2ff9966d57', 'U'),
('UVALENCIA4', 'Valencia College', '1c112ff4a2d96d4ea02e5455c0e6aee9', 'U');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userID` (`userID`),
  ADD KEY `eventName` (`eventName`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`name`),
  ADD KEY `locationName` (`locationName`),
  ADD KEY `rsoName` (`rsoName`),
  ADD KEY `Host` (`Host`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`locationName`);

--
-- Indexes for table `requestedevents`
--
ALTER TABLE `requestedevents`
  ADD PRIMARY KEY (`name`),
  ADD KEY `locationName` (`locationName`),
  ADD KEY `Host` (`Host`);

--
-- Indexes for table `requestedrso`
--
ALTER TABLE `requestedrso`
  ADD PRIMARY KEY (`rsoName`),
  ADD KEY `adminID` (`adminID`);

--
-- Indexes for table `requestedrsomembership`
--
ALTER TABLE `requestedrsomembership`
  ADD PRIMARY KEY (`rsoName`,`userID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `rso`
--
ALTER TABLE `rso`
  ADD PRIMARY KEY (`rsoName`),
  ADD KEY `adminID` (`adminID`);

--
-- Indexes for table `rsojoinrequests`
--
ALTER TABLE `rsojoinrequests`
  ADD PRIMARY KEY (`rsoName`,`userID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `rsomembership`
--
ALTER TABLE `rsomembership`
  ADD PRIMARY KEY (`rsoName`,`userID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `university`
--
ALTER TABLE `university`
  ADD PRIMARY KEY (`universityName`),
  ADD KEY `locationName` (`locationName`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `universityName` (`universityName`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`eventName`) REFERENCES `events` (`name`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`locationName`) REFERENCES `location` (`locationName`),
  ADD CONSTRAINT `events_ibfk_3` FOREIGN KEY (`Host`) REFERENCES `users` (`userID`);

--
-- Constraints for table `requestedevents`
--
ALTER TABLE `requestedevents`
  ADD CONSTRAINT `requestedevents_ibfk_1` FOREIGN KEY (`locationName`) REFERENCES `location` (`locationName`),
  ADD CONSTRAINT `requestedevents_ibfk_2` FOREIGN KEY (`Host`) REFERENCES `users` (`userID`);

--
-- Constraints for table `requestedrso`
--
ALTER TABLE `requestedrso`
  ADD CONSTRAINT `requestedrso_ibfk_1` FOREIGN KEY (`adminID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `requestedrsomembership`
--
ALTER TABLE `requestedrsomembership`
  ADD CONSTRAINT `requestedrsomembership_ibfk_1` FOREIGN KEY (`rsoName`) REFERENCES `requestedrso` (`rsoName`),
  ADD CONSTRAINT `requestedrsomembership_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `rso`
--
ALTER TABLE `rso`
  ADD CONSTRAINT `rso_ibfk_1` FOREIGN KEY (`adminID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `rsojoinrequests`
--
ALTER TABLE `rsojoinrequests`
  ADD CONSTRAINT `rsojoinrequests_ibfk_1` FOREIGN KEY (`rsoName`) REFERENCES `rso` (`rsoName`),
  ADD CONSTRAINT `rsojoinrequests_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `rsomembership`
--
ALTER TABLE `rsomembership`
  ADD CONSTRAINT `rsomembership_ibfk_1` FOREIGN KEY (`rsoName`) REFERENCES `rso` (`rsoName`),
  ADD CONSTRAINT `rsomembership_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `university`
--
ALTER TABLE `university`
  ADD CONSTRAINT `university_ibfk_1` FOREIGN KEY (`locationName`) REFERENCES `location` (`locationName`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`universityName`) REFERENCES `university` (`universityName`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
