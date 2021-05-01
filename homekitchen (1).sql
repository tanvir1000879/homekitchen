-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2021 at 08:20 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homekitchen`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `pw` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `pw`, `role`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$W3E2yojRVFpG3G0px8cDPuIW6SMaeq639QEG.yck.POLPAEzM7m22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `chefs`
--

CREATE TABLE `chefs` (
  `chef_id` int(11) NOT NULL,
  `chef_name` varchar(255) NOT NULL,
  `chef_email` varchar(255) NOT NULL,
  `chef_address` varchar(255) NOT NULL,
  `chef_phone` varchar(255) NOT NULL,
  `bkash` varchar(255) NOT NULL,
  `pw` varchar(255) NOT NULL,
  `nid` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `role` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chefs`
--

INSERT INTO `chefs` (`chef_id`, `chef_name`, `chef_email`, `chef_address`, `chef_phone`, `bkash`, `pw`, `nid`, `code`, `status`, `role`) VALUES
(15, 'Tarek Ahmed', 'tarek-chef@gmail.com', 'Wapda road, West Rampura ', '01534343432', '', '$2y$10$Da7zd3t8RB.f5QAGEnxvK.Qan4spq16nh3cQQVo1vlF/sXUm0/WAy', '1617786041.jpg', 'ca706fc019f580854632775a051bb8b09831943076836a6', 1, 2),
(19, 'Tarek Ahmed 2', 'tarek-chef2@gmail.com', '12 Sutrapur, Jatrabari 2', '01534343432222', '', '$2y$10$Da7zd3t8RB.f5QAGEnxvK.Qan4spq16nh3cQQVo1vlF/sXUm0/WAy', '1617786041.jpg', 'ca706fc019f580854632775a051bb8b09831943076836a6', 1, 2),
(20, 'Tarek Ahmed 3', 'tarek-chef3@gmail.com', '12 Sutrapur, Jatrabari 3', '01534343432333', '', '$2y$10$Da7zd3t8RB.f5QAGEnxvK.Qan4spq16nh3cQQVo1vlF/sXUm0/WAy', '1617786041.jpg', 'ca706fc019f580854632775a051bb8b09831943076836a6', 1, 2),
(21, 'Tarek Ahmed 4', 'tarek-chef4@gmail.com', '12 Sutrapur, Jatrabari 4', '01534343432444', '', '$2y$10$Da7zd3t8RB.f5QAGEnxvK.Qan4spq16nh3cQQVo1vlF/sXUm0/WAy', '1617786041.jpg', 'ca706fc019f580854632775a051bb8b09831943076836a6', 1, 2),
(22, 'allen', 'allentheresa767@gmail.com', 'banani', '01700330033', '', '$2y$10$k7sLZ96.zu4Cul7H6KlJR.ukCkZ/Syqe2dTkhU0urL9yhm1Xvb1Zi', '1618081151.png', '6a08b11761961ea8177bdd943c24c28e1dd30c899715316', 1, 2),
(26, 'tanvir ahmed', 'tanvirahmed.mt@gmail.com', '154/8, west rampura, dhaka', '01730699144', '', '$2y$10$NjskkTYWpi7oI/yoeqg/GOso8xgiIFCNuVXjYpy0H5hZWqk/IwwqW', '1618510194.png', '00c7d5c32659bc1693414824882315146d4d1953dc491c8', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE `conversations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `chef_id` int(11) NOT NULL,
  `last_text` varchar(255) NOT NULL,
  `time_stamp` varchar(100) NOT NULL,
  `status_u` int(11) NOT NULL DEFAULT 1,
  `status_c` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conversations`
--

INSERT INTO `conversations` (`id`, `user_id`, `chef_id`, `last_text`, `time_stamp`, `status_u`, `status_c`) VALUES
(1, 4, 15, 'how are you', '16.Apr.21, 12:37 AM', 0, 0),
(3, 15, 4, 'ga', '06.Apr.21, 11:22 AM', 1, 0),
(4, 6, 15, 'hi', '29.Apr.21, 12:44 PM', 0, 0),
(5, 4, 26, 'ok', '16.Apr.21, 12:22 AM', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hired`
--

CREATE TABLE `hired` (
  `hire_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `event_date` varchar(255) NOT NULL,
  `event_category` varchar(255) NOT NULL,
  `for_people` varchar(255) NOT NULL,
  `recipe` varchar(255) NOT NULL,
  `kitchen_name` varchar(255) NOT NULL,
  `chef_id` int(11) NOT NULL,
  `chef_name` varchar(255) NOT NULL,
  `chef_phone` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hired`
--

INSERT INTO `hired` (`hire_id`, `user_id`, `user_name`, `user_phone`, `user_address`, `event_date`, `event_category`, `for_people`, `recipe`, `kitchen_name`, `chef_id`, `chef_name`, `chef_phone`, `status`) VALUES
(5, 6, 'tanvir ahmed', '01730699144', '154/8, west rampura', '2021-04-1322:26', 'Breakfast', '2', 'rice', '', 15, 'Tarek Ahmed', '01534343432', 'Cancelled'),
(6, 6, 'tanvir ahmed', '01730699144', '154/8, west rampura', '2021-04-2722:30', 'Lunch', '4', 'rice and chicken', '', 15, 'Tarek Ahmed', '01534343432', 'Completed'),
(7, 6, 'tanvir ahmed', '01730699144', '154/8, west rampura', '2021-04-2912:05', 'Breakfast', '1', 'kala vuna', '', 22, 'allen', '01700330033', 'Cancelled'),
(8, 6, 'tanvir ahmed', '01730699144', '154/8, west rampura', '2021-04-2917:32', 'Lunch', '3', 'rice and vegetables', '', 22, 'allen', '01700330033', 'Completed'),
(9, 6, 'tanvir ahmed', '01730699144', '154/8, west rampura', '30.Apr.21 01:29 AM', 'Breakfast', '2', 'test', 'Green Rannaghor', 21, 'Tarek Ahmed 4', '01534343432444', 'Accepted'),
(10, 6, 'tanvir ahmed', '01730699144', '154/8, west rampura', '28.Apr.21 04:32 AM', 'Lunch', '2', 'rice', 'Tarek Khanas', 15, 'Tarek Ahmed', '01534343432', 'Cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `kitchen`
--

CREATE TABLE `kitchen` (
  `kitchen_id` int(11) NOT NULL,
  `chef_id` int(11) NOT NULL,
  `kitchen_name` varchar(255) NOT NULL,
  `kitchen_address` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `rating` varchar(255) NOT NULL DEFAULT '0',
  `rating_count` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kitchen`
--

INSERT INTO `kitchen` (`kitchen_id`, `chef_id`, `kitchen_name`, `kitchen_address`, `location`, `rating`, `rating_count`, `status`) VALUES
(3, 15, 'Tarek Khanas', '12 Sutrapur', 'Jatrabari', '0', 0, 1),
(6, 22, 'Allen Kitchen', 'banani', 'Banani', '0', 0, 1),
(7, 26, 'tanvir new kitchen', 'banani', 'Khilgaon', '0', 0, 1),
(8, 21, 'Green Rannaghor', 'khilgaon Govt. School', 'Khilgaon', '0', 0, 1),
(9, 20, 'Maa er Ranna', 'Dhanmondi 32', 'Dhanmondi', '0', 0, 1),
(10, 19, 'delicious recipe', 'mohammadpur school', 'Mohammadpur', '0', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `text_message` varchar(255) NOT NULL,
  `time_stamp` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `text_message`, `time_stamp`) VALUES
(1, 4, 15, 'Hello', '5 April, 2021, 10:25 AM'),
(3, 15, 4, 'hi', '06.Apr.21, 10:35 AM'),
(4, 15, 4, 'hi', '06.Apr.21, 10:40 AM'),
(5, 15, 4, 'hoy', '06.Apr.21, 10:40 AM'),
(6, 15, 4, 'gi', '06.Apr.21, 10:41 AM'),
(7, 15, 4, 'gu', '06.Apr.21, 10:41 AM'),
(8, 4, 15, 'hola', '06.Apr.21, 11:13 AM'),
(9, 4, 15, 'hi', '06.Apr.21, 11:14 AM'),
(11, 4, 15, 'hola', '06.Apr.21, 11:20 AM'),
(12, 15, 4, 'ga', '06.Apr.21, 11:22 AM'),
(13, 4, 15, 'gu', '06.Apr.21, 11:23 AM'),
(14, 4, 15, 'hey', '06.Apr.21, 11:28 AM'),
(15, 4, 15, 'hi', '06.Apr.21, 11:28 AM'),
(16, 15, 4, 'hw', '06.Apr.21, 11:29 AM'),
(17, 15, 4, 'hw', '06.Apr.21, 11:29 AM'),
(18, 4, 15, 'hi', '06.Apr.21, 11:29 AM'),
(19, 4, 15, 'yo', '06.Apr.21, 11:30 AM'),
(20, 15, 4, 'yo yo yo', '06.Apr.21, 11:31 AM'),
(21, 6, 15, 'hey', '10.Apr.21, 11:27 PM'),
(22, 6, 15, 'hello', '11.Apr.21, 12:47 AM'),
(23, 15, 6, 'hi', '11.Apr.21, 12:50 AM'),
(24, 15, 6, 'whats up', '11.Apr.21, 12:51 AM'),
(25, 4, 26, 'hi i need it by 5.0 clock', '16.Apr.21, 12:21 AM'),
(26, 26, 4, 'ok', '16.Apr.21, 12:22 AM'),
(27, 4, 15, 'how are you', '16.Apr.21, 12:37 AM'),
(28, 15, 6, 'hi', '29.Apr.21, 12:44 PM');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `chef_id` int(11) NOT NULL,
  `order_time` varchar(255) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `tran_id` varchar(255) NOT NULL DEFAULT 'NA',
  `quantity` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `withdrawal` int(11) NOT NULL DEFAULT 0,
  `rating` varchar(255) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `uname`, `user_email`, `user_address`, `user_phone`, `recipe_id`, `title`, `file`, `chef_id`, `order_time`, `payment`, `tran_id`, `quantity`, `price`, `total_price`, `withdrawal`, `rating`, `status`) VALUES
(8, 4, 'Tarek', 'tarek-user@gmail.com', '15/B Jamia Road, Jatrabari', '01823557743', 5, '7 piece choco cupcakes', '1616934589.jpg', 15, '04.Apr.21, 06:24 PM', 'bKash', 'A4U988B2A3', '', '250', '', 0, '5', 2),
(9, 4, 'Tarek', 'tarek-user@gmail.com', '15/B Jamia Road, Jatrabari', '01823557743', 5, '7 piece choco cupcakes', '1616934589.jpg', 15, '04.Apr.21, 06:24 PM', 'bKash', 'A4U988B2A3', '', '250', '', 0, '5', 2),
(10, 4, 'Tarek', 'tarek-user@gmail.com', '15/B Jamia Road, Jatrabari', '01823557743', 5, '7 piece choco cupcakes', '1616934589.jpg', 15, '04.Apr.21, 06:24 PM', 'bKash', 'A4U988B2A3', '', '250', '', 0, '5', 2),
(11, 6, 'tanvir ahmed', 'tanvirahmed.mt@gmail.com', '154/8, west rampura', '01730699144', 5, '7 piece choco cupcakes', '1616934589.jpg', 15, '10.Apr.21, 11:03 PM', 'bKash', '123456', '', '250', '', 0, '5', 2),
(12, 6, 'tanvir ahmed', 'tanvirahmed.mt@gmail.com', '154/8, west rampura', '01730699144', 5, '7 piece choco cupcakes', '1616934589.jpg', 15, '10.Apr.21, 11:22 PM', 'Cash', '', '', '250', '', 0, '5', 2),
(13, 4, 'Tarek User', 'tarek-user@gmail.com', '15/B Jamia Road, Jatrabari', '01823557743', 10, 'Murabba', '1616935466.jpg', 15, '15.Apr.21, 11:20 PM', 'bKash', '123456', '', '300', '', 0, '5', 2),
(14, 4, 'Tarek User', 'tarek-user@gmail.com', '15/B Jamia Road, Jatrabari', '01823557743', 12, 'fuchka', '1618510662.jpg', 26, '16.Apr.21, 12:20 AM', 'bKash', '123456', '', '60', '', 0, '4', 2),
(15, 4, 'Tarek User', 'tarek-user@gmail.com', '15/B Jamia Road, Jatrabari', '01823557743', 7, 'Chowmin', '1616935047.jpg', 15, '16.Apr.21, 12:35 AM', 'bKash', '123456', '', '120', '', 0, '5', 2),
(16, 6, 'tanvir ahmed', 'tanvirahmed.mt@gmail.com', '154/8, west rampura', '01730699144', 7, 'Chowmin', '1616935047.jpg', 15, '18.Apr.21, 03:55 PM', 'Cash', '', '', '120', '', 0, '1', 2),
(17, 6, 'tanvir ahmed', 'tanvirahmed.mt@gmail.com', '154/8, west rampura', '01730699144', 8, 'Fresh fruits', '1616935175.jpg', 15, '18.Apr.21, 04:33 PM', 'Cash', '', '', '100', '', 0, '3', 2),
(18, 6, 'tanvir ahmed', 'tanvirahmed.mt@gmail.com', '154/8, west rampura', '01730699144', 9, 'Butter Naan with creamy fruits', '1616935359.jpg', 15, '19.Apr.21, 01:08 AM', 'Cash', '', '', '200', '', 0, '5', 2),
(19, 4, 'Tarek User', 'tarek-user@gmail.com', '15/B Jamia Road, Jatrabari', '01823557743', 11, 'Rice', '1618085094.jpg', 22, '20.Apr.21, 03:42 PM', 'Cash', '', '', '100', '', 0, '0', 1),
(20, 6, 'tanvir ahmed', 'tanvirahmed.mt@gmail.com', '154/8, west rampura', '01730699144', 8, 'Fresh fruits', '1616935175.jpg', 15, '25.Apr.21, 12:45 PM', 'Cash', '', '3', '100', '300', 0, '0', 3),
(21, 6, 'tanvir ahmed', 'tanvirahmed.mt@gmail.com', '154/8, west rampura', '01730699144', 19, 'fish fry', '1619549549.jpg', 20, '28.Apr.21, 01:03 AM', 'Cash', '', '2', '180', '360', 0, '5', 2),
(22, 6, 'tanvir ahmed', 'tanvirahmed.mt@gmail.com', '154/8, west rampura', '01730699144', 17, 'french fries', '1619548704.jpg', 22, '29.Apr.21, 12:09 PM', 'Cash', '', '1', '200', '200', 0, '5', 2),
(23, 6, 'tanvir ahmed', 'tanvirahmed.mt@gmail.com', '154/8, west rampura', '01730699144', 6, 'Mini chicken rice bowl', '1616934915.jpg', 15, '29.Apr.21, 12:42 PM', 'bKash', '123456', '1', '150', '150', 0, '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `recipe_id` int(11) NOT NULL,
  `kitchen_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `ingredients` varchar(255) NOT NULL,
  `for_people` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `rating` varchar(255) NOT NULL DEFAULT '0',
  `rating_count` varchar(255) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`recipe_id`, `kitchen_id`, `title`, `category`, `description`, `ingredients`, `for_people`, `location`, `price`, `file`, `rating`, `rating_count`, `status`) VALUES
(5, 3, '7 piece choco cupcakes', 'Snacks', 'Fresh and tasty, homemade cup cakes', 'Flour, chocolate, sugar, cream', '2', 'Jatrabari', '250', '1616934589.jpg', '24', '5', 1),
(6, 3, 'Mini chicken rice bowl', 'Lunch', 'Made with fresh ingredients, love and care', 'Rice, chicken, salad', '1', 'Jatrabari', '150', '1616934915.jpg', '12', '3', 1),
(7, 3, 'Chowmin', 'Snacks', 'Perfect for light meal', 'Noodles, spices, fried crispy chicken', '1', 'Jatrabari', '120', '1616935047.jpg', '6', '2', 1),
(8, 3, 'Fresh fruits', 'Snacks', 'Fresh fruits as lite snacks', 'Mango, banana, blueberry', '2', 'Jatrabari', '100', '1616935175.jpg', '3', '1', 1),
(9, 3, 'Butter Naan with creamy fruits', 'Breakfast', 'Special and healthy breakfast for your and your loved ones. Best as surprise treat.', 'Butter, naan, cream, berry', '2', 'Jatrabari', '200', '1616935359.jpg', '5', '1', 1),
(10, 3, 'Murabba', 'Snacks', 'Tradition is the new trand', 'Fruites, sugar syrup', '4', 'Jatrabari', '300', '1616935466.jpg', '5', '1', 1),
(11, 6, 'Rice', 'Lunch', 'Only rice', 'rice rice', 'people', 'Banani', '100', '1618085094.jpg', '0', '0', 1),
(12, 7, 'fuchka', 'Snacks', 'delicious fuchka item', 'fuchka, alu, dim, boot, tok', 'everyone', 'Khilgaon', '60', '1618510662.jpg', '4', '1', 0),
(13, 7, 'Vorta Item', 'Lunch', '11 types of delicious vorta.', 'Potato, Lentil, Egg, Potol, Kali jira, kacha kola, Begun, fish, Shutki, Shim, Tomato', 'everyone', 'Khilgaon', '160', '1618903364.jpg', '0', '0', 1),
(15, 8, 'kala Bhuna ', 'Lunch', 'Bangladeshi Kala Bhuna', 'Beef Onion Green Chili Ginger paste Garlic Paste', 'everyone', 'Khilgaon', '450', '1619547757.jpg', '0', '0', 1),
(16, 8, 'Indian Mutton Biryani', 'Lunch', 'Indian Mutton Biryani is a tasty and delicious biryani that you just can not go wrong with.', 'mutton basmati rice oil/ghee onions green chili', '2', 'Khilgaon', '500', '1619548466.jpg', '0', '0', 1),
(17, 6, 'french fries', 'Snacks', 'This Homemade Double Fried French Fries recipe is out-of-this-world crispy and satisfying! Easy, super crispy, and made in less than 30 minutes, these homemade fries are the best! Sprinkle a little bit of sea salt over the fries and relish in perfection.', 'potato, savory sea salt, oil, sauce', '4', 'Banani', '200', '1619548704.jpg', '5', '1', 1),
(18, 9, 'homemade cake', 'Dessert', 'Homemade Chocolate cake for kids', 'chocolate ganache, chocolate sprinkles, gems', '8', 'Dhanmondi', '650', '1619549165.jpg', '0', '0', 1),
(19, 9, 'fish fry', 'Fish', 'Vanjaram Fish Fry | Seer Fish Fry | King Fish Fry | South Indian Fish Fry', 'fish, chilli powder, coriander powder, cumin powder, fennel powder', '2', 'Dhanmondi', '180', '1619549549.jpg', '5', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `report_date` varchar(255) NOT NULL,
  `reply` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `name`, `email`, `subject`, `message`, `report_date`, `reply`, `status`) VALUES
(2, 'Tarek Random', 'tarequeahmed31@gmail.com', 'Food not well enough', 'Food not delivered, Food not delivered, Food not delivered', '07.Apr.21, 10:55 AM', 'mmm', 1),
(3, 'tanvir ahmed', 'tanvirahmed.mt@gmail.com', 'issue', 'food was not good', '11.Apr.21, 02:14 AM', 'please describe the issue and mention the kitchen', 1),
(4, 'allen', 'allentheresa767@gmail.com', 'food quality', 'food quality is not great', '16.Apr.21, 12:26 AM', '', 1),
(5, 'tanvir ahmed', 'tanvirahmed.mt@gmail.com', 'issue', 'The recipes do not include original image', '20.Apr.21, 04:42 PM', 'tell me details about it', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `pw` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `role` int(11) NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_address`, `user_phone`, `pw`, `code`, `status`, `role`) VALUES
(4, 'Tarek User', 'tarek-user@gmail.com', '15/B Jamia Road, Jatrabari', '01823557743', '$2y$10$nQSnxFSWyLFRHokh9wHELOYy4fwMYHml4KgFtG.0fJLMKEmTnepV2', '', 1, 3),
(6, 'tanvir ahmed', 'tanvirahmed.mt@gmail.com', '154/8, west rampura', '01730699144', '$2y$10$hjD8w3UgjHbYIHpX470w2.Zzo203AL5sXWcqxKlpTzWm4yKDfM1gC', '96c3b24525d932310d30d4c14818170ccd847766604c415', 1, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `chefs`
--
ALTER TABLE `chefs`
  ADD PRIMARY KEY (`chef_id`);

--
-- Indexes for table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hired`
--
ALTER TABLE `hired`
  ADD PRIMARY KEY (`hire_id`);

--
-- Indexes for table `kitchen`
--
ALTER TABLE `kitchen`
  ADD PRIMARY KEY (`kitchen_id`),
  ADD KEY `chef_id` (`chef_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`recipe_id`),
  ADD KEY `kitchen_id` (`kitchen_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chefs`
--
ALTER TABLE `chefs`
  MODIFY `chef_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hired`
--
ALTER TABLE `hired`
  MODIFY `hire_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kitchen`
--
ALTER TABLE `kitchen`
  MODIFY `kitchen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `recipe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kitchen`
--
ALTER TABLE `kitchen`
  ADD CONSTRAINT `kitchen_ibfk_1` FOREIGN KEY (`chef_id`) REFERENCES `chefs` (`chef_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recipe`
--
ALTER TABLE `recipe`
  ADD CONSTRAINT `recipe_ibfk_1` FOREIGN KEY (`kitchen_id`) REFERENCES `kitchen` (`kitchen_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
