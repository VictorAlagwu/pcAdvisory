-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2017 at 07:20 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expert_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL,
  `cat_body` varchar(255) NOT NULL,
  `cat_tags` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_title`, `cat_body`, `cat_tags`) VALUES
(1, 'Network', '<p>Contains information about internet and network, related problems&nbsp;</p>', 'internet,network'),
(2, 'USB Ports', '<p>Contains all information about usb ports and their problems</p>', 'USB,Ports'),
(3, 'Hard Drive', '<p>Contains information about hard drives and their related problems</p>', 'Hard, Drive'),
(4, 'Virus', '<p>Contains information about the different type of virues that can attack a system and their efffects</p>', 'virus'),
(5, 'Hardware', '<p>All hardware related problems and their solutions</p>', 'hardware'),
(6, 'Battery', '<p>Contains information about battery and their related problems</p>', 'battery');

-- --------------------------------------------------------

--
-- Table structure for table `symptoms`
--

CREATE TABLE `symptoms` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sym_pro` varchar(255) NOT NULL,
  `sym_body` varchar(255) NOT NULL,
  `sym_answer` varchar(1024) NOT NULL,
  `sym_tags` varchar(255) NOT NULL,
  `checker` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `symptoms`
--

INSERT INTO `symptoms` (`id`, `cat_id`, `sym_pro`, `sym_body`, `sym_answer`, `sym_tags`, `checker`) VALUES
(1, 1, 'Is your internet always slow ?', '<p>internet slow</p>', '<ul>\r\n<li>Check if the network in your environment is strong</li>\r\n<li>Contact your <strong>Internet Service Provider (ISP)</strong></li>\r\n<li>Try updating your network drivers</li>\r\n<li>Move to a better network area/environment</li>\r\n</ul>', 'internet,slow,network,not,fast', 'Yes'),
(2, 3, 'Has your laptop ever ran CHKDSK when its booting', '<p>Check disk error</p>', '<h4>Most times, it is better if we allow chkdsk(Check disk) to run completely when booting,but if it now appears every time we try boooting,then do the following</h4>\r\n<p>Allow it to finish <strong>OR</strong> Press any key When booting to escape it</p>', 'chkdsk,laptop,booting,hard,drive', 'Yes'),
(3, 2, 'How often do you have USB problems', '<p>USB problems</p>', '<ul>\r\n<li>Check if the USB device is well plugged</li>\r\n<li>Check if the drivers for that device is installed</li>\r\n<li>If not, try to download the drivers online</li>\r\n</ul>', 'USB,port,detected,can''t,unknown,device,plug', 'Yes'),
(4, 2, 'USB can''t be detected', '<p>Can''t detect USB Drive</p>', '<p>If USB device is well plugged in,do the following</p>\r\n<ul>\r\n<li>Install the drivers for the USB device</li>\r\n<li>Try to update your sytsem drivers</li>\r\n<li>If none is working, check if device is still working</li>\r\n<li>Try another similar device</li>\r\n</ul>', 'USB,port,detected,can''t,device,plug', 'Yes'),
(5, 2, 'Unknown Device found when USB device is plug', '<p>Unknown device error</p>', '<p>Install the driver for the device</p>\r\n<p>Scan for virus</p>\r\n<p>Check if the device is functional with any laptop</p>', 'USB,port,can''t,unknown,device,plug', 'Yes'),
(6, 4, 'Do you see Pop-up adverts on your desktop or browser', '<p>Solution to pop up adverts</p>', '<p><strong>Chrome Browser</strong></p>\r\n<ul>\r\n<li>Go to <em><strong>"More tools"</strong></em></li>\r\n<li>Then, <em><strong>"Extensions"</strong></em></li>\r\n<li>Remove all&nbsp;unnecessarily extensions</li>\r\n</ul>\r\n<p><strong>Mozilla Firefox Browser</strong></p>\r\n<ul>\r\n<li>Go to<em><strong> "Add Ons"</strong></em></li>\r\n<li>Enter all unnecessarily add-ons</li>\r\n</ul>\r\n<p>Finally, Install any good I<strong>nternet Security Software</strong></p>', 'virus,pop,up adverts,desktop,browser', 'Yes'),
(7, 5, 'Have you experienced endless beeps during booting ', '<p>Beeping error</p>', '<ul>\r\n<li>Check for the "<strong>Number of beeps</strong>"</li>\r\n<li>Check your device manuel for related problems for specify number of beeps</li>\r\n<li>Check for solutions to the problems either in your manuel or online</li>\r\n</ul>', 'endless,beeps,beep,booting,boot', 'Yes'),
(8, 6, 'Do you experience battery issues', '<p>battery issues</p>', '<ul>\r\n<li>Check if it is the laptop recommend charger</li>\r\n<li>Try pulling your battery out(after switching off your system) and pushing it back inside</li>\r\n</ul>\r\n<p>&nbsp;</p>', 'battery,issues,not,charging', 'Yes'),
(9, 6, 'Do you experience battery issues', '<p>Battery doesn''t charge to 100</p>', '<p>Check if your battery charger adapter is the recommeded one for your laptop</p>\r\n<p>Check if the battery is still good</p>\r\n<p>Get a new battery</p>', 'charge,battery,100,percentage', 'Yes'),
(10, 6, 'Do you experience battery issues', '<p>BATTERY ISSUES</p>', '<p>The best thing to do is to get another battery&nbsp;</p>', 'battery,dies,quickly', 'Yes'),
(11, 3, 'Do you notice that you are running out of hard drive space unnecessarily', '<p>Solution to hard drive space</p>', '<ul>\r\n<li>Remove unwanted and rarely used apps or softwares</li>\r\n<li>Remove large files that are not being used</li>\r\n<li>You can still get a new larger hard drive, if you want</li>\r\n<li>Or store most of your files online</li>\r\n</ul>\r\n<p>&nbsp;</p>', 'hard,drive,running,out,unnecessarily,space', 'Yes'),
(12, 1, 'Does your Wi-Fi keep disconnecting ?', '<p>Solution to wifi problems</p>', '<p>&nbsp;</p>\r\n<p>Ask other users of the same network, if they are experiencing the same problem</p>\r\n<p>if Yes, then the fault is not from your system,check your ISP for more information</p>\r\n<p>if No, then continue</p>\r\n<ul>\r\n<li>Make sure your Wi-Fi adapter is well installed</li>\r\n<li>Update your network adapter</li>\r\n<li>Contact your ISP</li>\r\n</ul>\r\n<p>&nbsp;</p>', 'wifi,internet,limited,network,disconnecting', 'Yes'),
(14, 4, 'How often do you get blue screens that say you should restart your personal computer?', '<p>Solution to BSOD</p>', '<p>There are different blue screen of death error messages,but one common way to solve all is by making use of the following steps</p>\r\n<p>i. Use <strong>CHKDSK (Check Disk)</strong> to check for hard drive errors</p>\r\n<ul>\r\n<li>Open your command prompth via admin</li>\r\n<li>Type <em><strong>"chkdsk /f /r "</strong></em> in the given line</li>\r\n</ul>\r\n<p>ii. Use <em><strong>"sfc scannow "</strong></em> code</p>\r\n<p>iii. Try to do <em><strong>system restore</strong></em></p>\r\n<p>&nbsp;</p>', 'bsod,blue,screen,death,personal,computer,restart', 'Yes'),
(15, 4, 'Does your system convert files in a USB to shortcuts?', '<p>Solution to usb problem</p>', '<ul>\r\n<li>Update or Antivirus (recommended antivirus eg Windows Defender)</li>\r\n<li>Do a full scan</li>\r\n<li>Unhide all folders and files&nbsp;</li>\r\n<li>Install Smadav Antivirus</li>\r\n<li>Scan all your system files</li>\r\n<li>Scan any USB device before using it.</li>\r\n</ul>', 'usb,shortcuts,convert,files,folder,system', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, 'Victor', 'victoralagwu@gmail.com', '$2y$10$nTAr6lqSjAvKLNAGZ3rPPOQ0XiY1V.1SAo6y/Z1IM0DSf8cydvpoS', 'Admin'),
(2, 'Tester', 'test@gmail.com', '$2y$10$UqRX6K.OScNHlzEXBt/foeQ3cq9oYvSjn4gYyEkOrH18We0zjZIpG', 'User'),
(3, 'kingsleyukeje', 'swissking009@gmail.com', '$2y$10$SHhY7uTp0zxfKqfJ759buegnYO3BhvttsNrRfx37NhbVgQFvZdkla', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `categories` ADD FULLTEXT KEY `cat_title` (`cat_title`,`cat_tags`,`cat_body`);

--
-- Indexes for table `symptoms`
--
ALTER TABLE `symptoms`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `symptoms` ADD FULLTEXT KEY `sym_body` (`sym_body`,`sym_tags`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `symptoms`
--
ALTER TABLE `symptoms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
