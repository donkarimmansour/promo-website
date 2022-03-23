-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2022 at 01:48 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `clm_a_id` int(11) NOT NULL,
  `clm_a_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clm_a_pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clm_a_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clm_a_date` datetime NOT NULL DEFAULT current_timestamp(),
  `clm_a_img` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`clm_a_id`, `clm_a_user`, `clm_a_pass`, `clm_a_email`, `clm_a_date`, `clm_a_img`) VALUES
(10, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@aol.com', '2021-08-10 17:24:19', 'adminsfcfbc004a56c08330f4577538a0a3174__profile.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog`
--

CREATE TABLE `tbl_blog` (
  `clm_id` int(11) NOT NULL,
  `clm_name` varchar(255) NOT NULL,
  `clm_text` text NOT NULL,
  `clm_link` text NOT NULL,
  `clm_status` enum('draft','publish') NOT NULL,
  `clm_image` text NOT NULL,
  `clm_date` datetime NOT NULL DEFAULT current_timestamp(),
  `clm_type` enum('article','link') NOT NULL,
  `clm_parent` int(11) DEFAULT NULL,
  `clm_count` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_blog`
--

INSERT INTO `tbl_blog` (`clm_id`, `clm_name`, `clm_text`, `clm_link`, `clm_status`, `clm_image`, `clm_date`, `clm_type`, `clm_parent`, `clm_count`) VALUES
(1, '5 recipes for when you\'re revi sing', '<p><em>This post is brought to you by HelloFresh.</em></p>\r\n<p>&nbsp;</p>\r\n<p><em>Exam season is here and in order for you to perform your best, it&rsquo;s imperative that you take care of your health and wellbeing throughout what could be a stressful time. Being mindful of what you eat is one way to help take care of yourself. With a nutritious and balanced diet you&rsquo;ll be putting</em></p>\r\n<p><em>&nbsp;all the good stuff into your body. Take the stress out of your weekly food shop with up to <a href=\"https://www.myunidays.com/GB/en-GB/partners/hellofreshfirst3/view\">50% off your first 3 / 4 boxes with HelloFresh</a></em></p>\r\n<p><em><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"../images/articale/4725649d6924dab403545cc668db0879_article_img.png\" width=\"854\" height=\"673\" /></em></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 'empty', 'publish', '9bf6f7bb6cc1d974511a14cf7c1f80ea_blog_img.jpg', '2021-12-07 13:51:40', 'article', 67, 1),
(2, '4. Tasty tacos', '<h2>4. Tasty tacos</h2>\r\n<h2>&nbsp;</h2>\r\n<h2>It&rsquo;s time to move away from your standard food order and mix things up a bit with a fiery mexican! Choose from an array of meats, fish and vegetarian options to suit your mood and pack a punch. If you&rsquo;re not feeling tacos, nachos could be a great option to share with your mates&hellip; just make sure you&rsquo;ve got all the toppings.</h2>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"../images/articale/b15b491d6ce1c6df9e6f6791279630e1_article_img.png\" width=\"725\" height=\"369\" /></p>', 'empty', 'publish', 'ce29ad1c88b61269fab8fe347bc88862_blog_img.jpg', '2021-12-07 13:54:16', 'article', 67, 1),
(3, 'test', '<p>jjj</p>', 'empty', 'publish', '87572f9981aa922c4598f07c3624e157_blog_img.jpg', '2021-12-07 14:01:02', 'article', 67, 1),
(4, '^^oo', '<p>jjj</p>', 'https://mail.google.com/mail/u/0/#inbox', 'publish', 'c0a98898087bfca9f31b5b57c3f23d41_blog_img.jpg', '2021-12-07 14:01:40', 'link', 67, 1),
(5, '5 recipes for when you\'re revi sing2', '<p><em>This post is brought to you by HelloFresh.</em></p>\r\n<p>&nbsp;</p>\r\n<p><em>Exam season is here and in order for you to perform your best, it&rsquo;s imperative that you take care of your health and wellbeing throughout what could be a stressful time. Being mindful of what you eat is one way to help take care of yourself. With a nutritious and balanced diet you&rsquo;ll be putting</em></p>\r\n<p><em>&nbsp;all the good stuff into your body. Take the stress out of your weekly food shop with up to <a href=\"https://www.myunidays.com/GB/en-GB/partners/hellofreshfirst3/view\">50% off your first 3 / 4 boxes with HelloFresh</a></em></p>\r\n<p><em><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"../images/articale/4725649d6924dab403545cc668db0879_article_img.png\" width=\"854\" height=\"673\" /></em></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 'empty', 'publish', '9bf6f7bb6cc1d974511a14cf7c1f80ea_blog_img.jpg', '2021-12-07 13:51:40', 'article', 106, 2),
(6, '4. Tasty tacos', '<h2>4. Tasty tacos</h2>\r\n<h2>&nbsp;</h2>\r\n<h2>It&rsquo;s time to move away from your standard food order and mix things up a bit with a fiery mexican! Choose from an array of meats, fish and vegetarian options to suit your mood and pack a punch. If you&rsquo;re not feeling tacos, nachos could be a great option to share with your mates&hellip; just make sure you&rsquo;ve got all the toppings.</h2>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"../images/articale/b15b491d6ce1c6df9e6f6791279630e1_article_img.png\" width=\"725\" height=\"369\" /></p>', 'empty', 'publish', 'ce29ad1c88b61269fab8fe347bc88862_blog_img.jpg', '2021-12-07 13:54:16', 'article', 106, 1),
(7, '5 recipes for when you\'re revi sing', '<p><em>This post is brought to you by HelloFresh.</em></p>\r\n<p>&nbsp;</p>\r\n<p><em>Exam season is here and in order for you to perform your best, it&rsquo;s imperative that you take care of your health and wellbeing throughout what could be a stressful time. Being mindful of what you eat is one way to help take care of yourself. With a nutritious and balanced diet you&rsquo;ll be putting</em></p>\r\n<p><em>&nbsp;all the good stuff into your body. Take the stress out of your weekly food shop with up to <a href=\"https://www.myunidays.com/GB/en-GB/partners/hellofreshfirst3/view\">50% off your first 3 / 4 boxes with HelloFresh</a></em></p>\r\n<p><em><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"../images/articale/4725649d6924dab403545cc668db0879_article_img.png\" width=\"854\" height=\"673\" /></em></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 'empty', 'publish', '9bf6f7bb6cc1d974511a14cf7c1f80ea_blog_img.jpg', '2021-12-07 13:51:40', 'article', 106, 1),
(8, '4. Tasty tacos1', '<h2>4. Tasty tacos</h2>\r\n<h2>&nbsp;</h2>\r\n<h2>It&rsquo;s time to move away from your standard food order and mix things up a bit with a fiery mexican! Choose from an array of meats, fish and vegetarian options to suit your mood and pack a punch. If you&rsquo;re not feeling tacos, nachos could be a great option to share with your mates&hellip; just make sure you&rsquo;ve got all the toppings.</h2>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"../images/articale/b15b491d6ce1c6df9e6f6791279630e1_article_img.png\" width=\"725\" height=\"369\" /></p>', 'empty', 'publish', 'ce29ad1c88b61269fab8fe347bc88862_blog_img.jpg', '2021-12-07 13:54:16', 'article', 106, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `clm_id` int(11) NOT NULL,
  `clm_name` varchar(255) NOT NULL,
  `clm_description` text NOT NULL,
  `clm_link` text NOT NULL DEFAULT 'empty',
  `clm_place` enum('blog','website') NOT NULL,
  `clm_status` enum('draft','publish') NOT NULL,
  `clm_parent` int(11) DEFAULT 0,
  `clm_type` enum('category','link') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`clm_id`, `clm_name`, `clm_description`, `clm_link`, `clm_place`, `clm_status`, `clm_parent`, `clm_type`) VALUES
(0, 'Top Parent(Home)', 'Top Parent(Home)', 'empty', 'website', 'publish', 0, 'category'),
(63, 'Food & Drink', 'Description\'s Food & Drink', 'empty', 'website', 'publish', 0, 'category'),
(64, 'Fashion', 'Description\'s Fashion', 'empty', 'website', 'publish', 0, 'category'),
(65, 'Clothing', 'Score some epic savings on your next new outfit with UNiDAYS student discount - from Ted Baker to Ralph Lauren, Mango to River Island, save on your favourite clothing brands today.', 'empty', 'website', 'publish', 64, 'category'),
(66, 'Shoes', 'From adidas to Nike, Puma to Timberland, UNiDAYS brings you student discount on the latest in men\'s and women\'s footwear, including Air Max, PureBoost and Stan Smith styles.', 'empty', 'website', 'publish', 64, 'category'),
(67, 'Food & Drink', 'Description\'s Food & Drink', 'empty', 'blog', 'publish', 0, 'category'),
(70, 'caty link(blog)', 'Description\'s caty link', 'https://www.myunidays.com/', 'blog', 'publish', 0, 'link'),
(71, 'caty link(website)', 'Description\'s caty link', 'https://www.myunidays.com/', 'website', 'publish', 0, 'link'),
(106, 'Food & Drink (two)', 'Description\'s Food & Drink', 'empty', 'blog', 'publish', 0, 'category');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_header_offers`
--

CREATE TABLE `tbl_header_offers` (
  `clm_id` int(11) NOT NULL,
  `clm_name` varchar(255) NOT NULL,
  `clm_description` text NOT NULL,
  `clm_link` text NOT NULL,
  `clm_status` enum('draft','publish') NOT NULL,
  `clm_image` text NOT NULL,
  `clm_logo` text NOT NULL,
  `clm_date` datetime DEFAULT NULL,
  `clm_type` enum('offer','link') NOT NULL,
  `clm_parent` int(11) DEFAULT NULL,
  `tbl_name` int(10) NOT NULL DEFAULT 1,
  `clm_count` int(11) NOT NULL DEFAULT 1,
  `clm_limited` enum('yes','no') NOT NULL DEFAULT 'no',
  `clm_in` enum('instore','online') NOT NULL,
  `clm_coupon` text NOT NULL,
  `clm_offername` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_header_offers`
--

INSERT INTO `tbl_header_offers` (`clm_id`, `clm_name`, `clm_description`, `clm_link`, `clm_status`, `clm_image`, `clm_logo`, `clm_date`, `clm_type`, `clm_parent`, `tbl_name`, `clm_count`, `clm_limited`, `clm_in`, `clm_coupon`, `clm_offername`) VALUES
(8, 'M&S Food', 'Christmas is here Marks & Spencer Food is known for its iconic products, made with the finest quality, fresh ingredients sourced from the best producers, and with deliciousness at the heart of everything they do. Their much-loved food on the move range is no exception. As the UK&#39;s first retailer to sell pre-packaged sandwiches, Marks & Spencer Food have been feeding the nation sandwiches for over 40 years – and they&#39;re pretty obsessive about getting it right! Their range of sandwiches, wraps and rolls are made with the tastiest fillings, from extra-crispy bacon to artisan cheeses. Never content in their search for sandwich perfection, last year they upgraded many of their sandwiches, wraps and rolls to make them even tastier.', 'empty', 'publish', 'M&S Food_Image_90f99ca669f4ff865da8a2fe5ec8a7c7.jpg', 'M&S Food_logo_90f99ca669f4ff865da8a2fe5ec8a7c7.png', '2023-12-31 16:34:00', 'offer', 63, 1, 97, 'yes', 'online', 'dfghvgkhlkk411465646', 'offernameTest'),
(9, 'Deliveroo', 'Deliveroo brings you the food you love, from big brands to local favourites. Get comfort food, sweet treats, and even groceries delivered to your door - great for when you&#x2019;ve run out of milk or want snacks for your night in. Download the app to see what&#x2019;s nearby and tuck into a tasty UNiDAYS offer just for you.', 'empty', 'publish', 'Deliveroo_Image_86a087e3c2051d1f5a2d11e5e9309946.jpg', 'Deliveroo_logo_86a087e3c2051d1f5a2d11e5e9309946.png', '2023-12-31 16:34:00', 'offer', 63, 1, 26, 'yes', 'online', 'dfghvgkhlkk411465646', 'offernameTest'),
(10, 'ASK Italian', 'Inspired by the Italian way of eating, ASK Italian celebrates mealtimes as an opportunity to connect with one another around the table. Start with a perfect-for-sharing antipasti board from the ASK Italian menu, and enjoy signature dishes from fresh pasta to crispy stone-baked pizzas with a great choice of toppings. And because there&#x2019;s always room for dessert, diners can indulge in a selection of beautiful desserts including the chocolate Etna, served with plenty of theatre.', 'empty', 'publish', 'ASK Italian_Image_bd3084847c1afa585881ea104f224d20.jpg', 'ASK Italian_logo_bd3084847c1afa585881ea104f224d20.png', '2023-12-31 16:34:00', 'offer', 63, 1, 80, 'yes', 'online', 'dfghvgkhlkk411465646', 'offernameTest'),
(11, 'ASOS', 'The leading fashion destination for stylish 20-somethings, ASOS offers a curated edit of 85,000 items, sourced from both in-house labels and the best global brands. Through our market-leading app and mobile/desktop web experience, alongside an ever-greater number of payment methods and hundreds of localised delivery and returns options, we aim to give all our customers a truly frictionless experience worldwide.', 'empty', 'publish', 'ASOS_Image_4ac5928ce1eea2b614d36f5b7df71b7f.jpg', 'ASOS_logo_4ac5928ce1eea2b614d36f5b7df71b7f.png', '2023-12-31 16:34:00', 'offer', 65, 1, 99, 'yes', 'online', 'dfghvgkhlkk411465646', 'offernameTest'),
(12, 'Urban Outfitters', 'From hand-picked vintage to one-of-a-kind collections, discover the latest in fashion and lifestyle at Urban Outfitters. Featuring exclusive drops from most hyped brands and standout styles you won&#x2019;t find anywhere else. Our collections cover everything from BDG, Juicy Couture, Champion, Out From Under, Chilly&#x2019;s, iets frans and so much more.&#xD;&#xA;&#xD;&#xA; &#xD;&#xA;&#xD;&#xA;Refresh and personalise your space with UO too. From exclusive bedding, furniture, wall art and cosy accessories, to lighting, rugs, kitchenware and plants - we&#x2019;ve got everything you need to make your space your own. Plus, check out the Tech Shop for the latest music and tech drops including photography, record players, speakers and vinyl.', 'empty', 'publish', 'Urban Outfitters_Image_c5c794f172e1a9da69c34585e908aaeb.jpg', 'Urban Outfitters_logo_c5c794f172e1a9da69c34585e908aaeb.png', '2023-12-31 16:34:00', 'offer', 65, 1, 91, 'yes', 'online', 'dfghvgkhlkk411465646', 'offernameTest'),
(13, 'Levi\'s', 'When Levi Strauss co-invented the blue jean in 1873, he didn&#x2019;t know that he was creating a global brand that would become known for self-expression and classic American cool. And that&#x2019;s the beauty of the Levi&#x27;s&#xAE; story. Unrivalled construction. Tried and tested. American originals.', 'empty', 'publish', 'Levi\'s_Image_f452d9441d212107aa495fed5a44c6ec.jpg', 'Levi\'s_logo_f452d9441d212107aa495fed5a44c6ec.png', '2023-12-31 16:34:00', 'offer', 65, 1, 21, 'yes', 'online', 'dfghvgkhlkk411465646', 'offernameTest'),
(14, 'Michael Kors', 'Michael Kors is a world-renowned, award-winning designer of luxury accessories and ready-to-wear, bringing American Jet Set luxury to your everyday life.  His namesake company, established in 1981, currently produces a range of products including accessories, footwear, watches, jewellery, men&#x2019;s and women&#x2019;s ready-to-wear, eyewear and a full line of fragrance products.', 'empty', 'publish', 'Michael Kors_Image_5bf343d577dc00b746037aedb401d3cd.jpg', 'Michael Kors_logo_5bf343d577dc00b746037aedb401d3cd.png', '2023-12-31 16:34:00', 'offer', 64, 1, 36, 'yes', 'online', 'dfghvgkhlkk411465646', 'offernameTest'),
(15, 'boohoo', 'Offering trend-led clothing at affordable prices boohoo is one of the UK&#x2019;s leading online fashion retailers, providing a wide selection of celebrity and catwalk inspired pieces &#x2013; with lots of new looks arriving daily.', 'empty', 'publish', 'boohoo_Image_512ccd1e5eabbb13334be9a9bdf1c3a0.jpg', 'boohoo_logo_512ccd1e5eabbb13334be9a9bdf1c3a0.png', '2023-12-31 16:34:00', 'offer', 64, 1, 40, 'yes', 'online', 'dfghvgkhlkk411465646', 'offernameTest'),
(16, 'Levi\'s', 'When Levi Strauss co-invented the blue jean in 1873, he didn&#x2019;t know that he was creating a global brand that would become known for self-expression and classic American cool. And that&#x2019;s the beauty of the Levi&#x27;s&#xAE; story. Unrivalled construction. Tried and tested. American originals.', 'empty', 'publish', 'Levi\'s_Image_df6d80a31893d043550f089df9a0328f.jpg', 'Levi\'s_logo_df6d80a31893d043550f089df9a0328f.png', '2023-12-31 16:34:00', 'offer', 64, 1, 92, 'yes', 'online', 'dfghvgkhlkk411465646', 'offernameTest'),
(18, 'Nike', 'One of the most famous brands in the world, Nike is revolutionary in its approach to sportswear design. They focus on Nike Brand and Brand Jordan product offerings in seven key categories: running, basketball, football, men&#x27;s training, women&#x27;s training, Nike sportswear, and action sports.', 'empty', 'publish', 'Nike_Image_d7636409b55780527507850d4f2443b0.jpg', 'Nike_logo_d7636409b55780527507850d4f2443b0.png', '2023-12-31 16:34:00', 'offer', 66, 1, 71, 'yes', 'online', 'dfghvgkhlkk411465646', 'offernameTest'),
(19, 'Foot Locker', 'Foot Locker is the leading global athletic footwear and apparel retailer. With our ultimate top brands, they will constantly provide you with the best, most exclusive ranges of products there is. At Foot Locker, they live sneakers, they breathe sneakers, they dream sneakers&#x2026; Only the best, most relevant and exciting products ever make it onto our shelves and onto our online catalogues. Foot Locker has you covered, from the feet up.', 'empty', 'publish', 'Foot Locker_Image_c19db87b7cbeb7e3b727d64e78011b5d.jpg', 'Foot Locker_logo_c19db87b7cbeb7e3b727d64e78011b5d.png', '2023-12-31 16:34:00', 'offer', 66, 1, 89, 'yes', 'online', 'dfghvgkhlkk411465646', 'offernameTest'),
(20, 'New Look', 'Why not make New Look your one-stop destination for student fashion? From OMG-dresses to cool jeans and bang on-trend boots, they&#x2019;ve got your wardrobe covered for virtual seminars, at-home hangouts &amp; more. Plus, with 100s of new in homeware pieces, you can dress up your desk space too,', 'empty', 'publish', 'New Look_Image_d4be8dd70e2ff022d305e7ce6b22b151.jpg', 'New Look_logo_d4be8dd70e2ff022d305e7ce6b22b151.png', '2023-12-31 16:34:00', 'offer', 66, 1, 73, 'yes', 'online', 'dfghvgkhlkk411465646', 'offernameTest'),
(21, 'PrettyLittleThing', 'Want style that&#x2019;s on-point delivered to your doorstep? Then PrettyLittleThing is what your wardrobe needs. The online destination for trend-led women&#x2019;s fashion at all the best prices, they make sure you&#x2019;ve got access to all the &#x201C;must add to bag&#x201D; looks straight from your fave celebs or fresh off the runway. With new products added every day of the week and outfits starting from &#xA3;10, they&#x2019;re the only shop perfect for the party girl on the go.', 'empty', 'publish', 'PrettyLittleThing_Image_46000f7870c7d4a665e5659c4283a9c2.jpg', 'PrettyLittleThing_logo_46000f7870c7d4a665e5659c4283a9c2.png', '2023-12-31 16:34:00', 'offer', 0, 1, 72, 'yes', 'online', 'dfghvgkhlkk411465646', 'offernameTest'),
(22, 'BT Mobile', 'BT offers fast, reliable, wireless broadband, BT TV and great value call plans. BT Mobile offers great SIM only plans, starting from as low as &#xA3;5 a month for existing broadband customers.', 'empty', 'publish', 'BT Mobile_Image_8480a023d9df9b1ac60feb4e6d82bf65.jpg', 'BT Mobile_logo_8480a023d9df9b1ac60feb4e6d82bf65.png', '2023-12-31 16:34:00', 'offer', 0, 1, 19, 'yes', 'online', 'dfghvgkhlkk411465646', 'offernameTest'),
(23, 'Zizzi', 'If you&#x2019;re a Rustica pizza seeker, a more-cheese-pleaser or a bowl of pasta dreamer then Zizzi is for you, offering good times from starter to finish.', 'empty', 'publish', 'Zizzi_Image_669bbea3e3a1f5b8ff0935c1b3bf337a.jpg', 'Zizzi_logo_669bbea3e3a1f5b8ff0935c1b3bf337a.png', '2023-12-31 16:34:00', 'offer', 0, 1, 32, 'yes', 'online', 'dfghvgkhlkk411465646', 'offernameTest');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_html`
--

CREATE TABLE `tbl_html` (
  `clm_html` text COLLATE utf8_unicode_ci NOT NULL,
  `clm_subject` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_html`
--

INSERT INTO `tbl_html` (`clm_html`, `clm_subject`) VALUES
('PGRpdiBzdHlsZT0ndGV4dC1hbGlnbjogY2VudGVyOyc+DQoJCQnCoCAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS08d2JyPi0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLTx3YnI+LS0tLS0tLS0tPGJyPg0KCQkJwqAgIFBhc3N3b3JkIDxicj4NCgkJCcKgIC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLTx3YnI+LS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tPHdicj4tLS0tLS0tLS08YnI+DQoJCQk8YnI+DQoJCQnCoCBEZWFyICgvdXNlcm5hbWUpLDxicj4NCgkJCTxicj4NCgkJCTxicj4NCgkJCcKgRm9yIHlvdXIgaW5mb3JtYXRpb246PGJyPg0KCQkJPGJyPg0KCQkJPGJyPg0KCQkJwqAgVXNlciBOYW1lIDrCoCAoL3VzZXJuYW1lKX0gPGJyPg0KCQkJwqAgRW1haWwgOsKgICgvZW1haWwpIDxicj4NCgkJCcKgIE5ldyBQYXNzd29yZCA6wqAgKC9uZXdDb2RlKSA8YnI+DQoJCQk8YnI+DQoJCQk8YnI+DQoJCQk8L2Rpdj4NCjxicj4gKC9pbWcp', 'testb');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_links`
--

CREATE TABLE `tbl_links` (
  `clm_id` int(11) NOT NULL,
  `clm_link` text NOT NULL,
  `clm_status` enum('draft','publish') NOT NULL,
  `clm_image` text NOT NULL,
  `clm_parent` int(11) NOT NULL,
  `clm_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_links`
--

INSERT INTO `tbl_links` (`clm_id`, `clm_link`, `clm_status`, `clm_image`, `clm_parent`, `clm_date`) VALUES
(1, 'https://www.youtube.com/', 'publish', '13dfd75e5534c8488d1eed12b90cea88_link_img.png', 63, '2020-12-12 16:34:00'),
(2, 'https://www.youtube.com/', 'publish', '13dfd75e5534c8488d1eed12b90cea88_link_img.png', 64, '2021-12-31 16:34:00'),
(3, 'https://www.youtube.com/', 'publish', '13dfd75e5534c8488d1eed12b90cea88_link_img.png', 65, '2021-12-31 16:34:00'),
(4, 'https://www.youtube.com/', 'publish', '13dfd75e5534c8488d1eed12b90cea88_link_img.png', 0, '2021-12-31 16:34:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_main_offers`
--

CREATE TABLE `tbl_main_offers` (
  `clm_id` int(11) NOT NULL,
  `clm_name` varchar(255) NOT NULL,
  `clm_description` text NOT NULL,
  `clm_link` text NOT NULL,
  `clm_status` enum('draft','publish') NOT NULL,
  `clm_limited` enum('yes','no') NOT NULL DEFAULT 'no',
  `clm_image` text NOT NULL,
  `clm_logo` text NOT NULL,
  `clm_date` datetime NOT NULL DEFAULT current_timestamp(),
  `clm_parent` int(11) DEFAULT NULL,
  `clm_style` enum('half','full','text') NOT NULL,
  `clm_type` enum('offer','link') NOT NULL,
  `tbl_name` int(10) NOT NULL DEFAULT 2,
  `clm_count` int(11) NOT NULL DEFAULT 0,
  `clm_in` enum('instore','online') NOT NULL,
  `clm_coupon` text NOT NULL,
  `clm_offername` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_main_offers`
--

INSERT INTO `tbl_main_offers` (`clm_id`, `clm_name`, `clm_description`, `clm_link`, `clm_status`, `clm_limited`, `clm_image`, `clm_logo`, `clm_date`, `clm_parent`, `clm_style`, `clm_type`, `tbl_name`, `clm_count`, `clm_in`, `clm_coupon`, `clm_offername`) VALUES
(2, 'Uber Eats', 'Uber Eats has hundreds of restaurants to choose from. When you open the app, you can scroll through for inspiration or search for a particular restaurant or cuisine. When you find something you like, tap to add it to your order. You can use the same payment methods you use on Uber trips. Follow your order in the app.', 'empty', 'publish', 'yes', 'Uber Eats_Image_20045479f2593dd4ef77512bb76c4f08.jpg', 'Uber Eats_logo_20045479f2593dd4ef77512bb76c4f08.png', '2023-12-31 16:34:00', 63, 'full', 'offer', 2, 87, 'online', 'dfghvgkhlkk411465646', 'offernameTest'),
(3, 'YO!', 'YO! burst onto the restaurant scene shaking up UK dining with their vibrant &#x2018;kaiten&#x2019; conveyor belt . Sushi is what they&#x2019;re known for, as well as a range of mouth-watering street food, from chicken katsu curry to innovative fusion dishes.  Better yet, they&#x2019;ve levelled up how you dine with the exciting new way to YO! Have your meal your way using their digital menu to order and pay on your phone. Your food is then freshly prepared by expert chefs and delivered directly to your table on the upgraded iconic belt. Chopsticks at the ready, it&#x2019;s YO! Time.', 'empty', 'publish', 'yes', 'YO!_Image_bdb0d9ba59f3701efd742d548cdb4446.jpg', 'YO!_logo_bdb0d9ba59f3701efd742d548cdb4446.png', '2023-12-31 16:34:00', 63, 'full', 'offer', 2, 56, 'online', 'dfghvgkhlkk411465646', 'offernameTest'),
(4, 'PizzaExpress', 'PizzaExpress knows the importance of good pizza. That&#x27;s why their skilled pizzaiolos take their famous dough, the freshest ingredients around, and cook it all to perfection every time. Never a quiet meal, PizzaExpress is the place for elbows on tables, sauce on t-shirts, and smiles on faces.&#xD;&#xA;Dig into the classic you know and love, or try some brilliant new dishes - tons of toppings, delicious Dough Ball recipes, vegan options galore, drinks, desserts, and so much more to sink your teeth into. Buon appetito!', 'empty', 'publish', 'no', 'PizzaExpress_Image_d89e00322c0d49c7ce993d3289a48bed.jpg', 'PizzaExpress_logo_d89e00322c0d49c7ce993d3289a48bed.png', '2023-12-31 16:34:00', 63, 'full', 'link', 2, 14, 'instore', 'dfghvgkhlkk411465646', 'offernameTest'),
(5, 'Pasta Evangelists', 'Discover the freshest, artisan Italian recipe kits with Pasta Evangelists. Featuring one-of-a-kind pasta recipes and top-quality Italian ingredients such as black truffle, &#x27;nduja and burrata, Pasta Evangelists recipe kits include fresh pasta, homemade sauce and a delicious garnish delivered direct to your doorstep and ready in five minutes or less. The pasta collection includes everything from classic Carbonara and Fresh Basil Lasagne to little-known specialities such as Wild Boar Rag&#xF9; and Octopus Orzo Salad. Gluten-free &amp; vegan recipes and optional extras like antipasti &amp; Italian dolce are available every week. Pasta is food for the soul, so why not enjoy the very best?', 'empty', 'publish', 'yes', 'Pasta Evangelists_Image_f3611affe6a6aa59f158e76e33a65a50.jpg', 'Pasta Evangelists_logo_f3611affe6a6aa59f158e76e33a65a50.png', '2023-12-31 16:34:00', 63, 'half', 'offer', 2, 13, 'online', 'dfghvgkhlkk411465646', 'offernameTest'),
(6, 'yfood', 'Healthy nutrition without cooking. yfood is a balanced and delicious drinking meal which contains all the nutrients your body needs. Wanna be part of the new food revolution? Shop the yfood Tasterpack.&#xD;&#xA;', 'empty', 'publish', 'yes', 'yfood_Image_d0f384f5fef1718b671c7ed4473f62f6.jpg', 'yfood_logo_d0f384f5fef1718b671c7ed4473f62f6.png', '2023-12-31 16:34:00', 63, 'half', 'offer', 2, 62, 'instore', 'dfghvgkhlkk411465646', 'offernameTest'),
(7, 'Bella Italia', 'At Bella they bring you the true spirit of Italy, with a fresh and tasty menu that satisfies big appetites and creates even bigger smiles.', 'empty', 'publish', 'no', 'Bella Italia_Image_f3f7263b0ad8d012c3950331b1166045.jpg', 'Bella Italia_logo_f3f7263b0ad8d012c3950331b1166045.png', '2023-12-31 16:34:00', 63, 'half', 'offer', 2, 14, 'instore', 'dfghvgkhlkk411465646', 'offernameTest'),
(8, 'Michael Kors', 'Michael Kors is a world-renowned, award-winning designer of luxury accessories and ready-to-wear, bringing American Jet Set luxury to your everyday life.  His namesake company, established in 1981, currently produces a range of products including accessories, footwear, watches, jewellery, men&#x2019;s and women&#x2019;s ready-to-wear, eyewear and a full line of fragrance products.', 'empty', 'publish', 'yes', 'Michael Kors_Image_77c6b6f3312192d13ef9df551207551b.jpg', 'Michael Kors_logo_77c6b6f3312192d13ef9df551207551b.png', '2023-12-31 16:34:00', 65, 'half', 'offer', 2, 72, 'online', 'dfghvgkhlkk411465646', 'offernameTest'),
(9, 'Oh Polly', 'Oh Polly is an online women&#x27;s fashion boutique created for fashion forward, free thinking women. All pieces are designed in the UK and they personally manufacture each of their items themselves. If you&#x27;re looking for gorgeous and unique styles, then look no further!', 'empty', 'publish', 'yes', 'Oh Polly_Image_ac097d6112208e70da59c13c8c8fa5a7.jpg', 'Oh Polly_logo_ac097d6112208e70da59c13c8c8fa5a7.png', '2023-12-31 16:34:00', 65, 'half', 'offer', 2, 97, 'online', 'dfghvgkhlkk411465646', 'offernameTest'),
(10, 'Missguided', 'Missguided is THE one stop shop for student style! With 300 fresh new designs hitting the site every week at affordable prices, you can have all the latest trends the second they land. Giving those must have pieces a serious seasonal update, you can be a major in killer style with a mix of too-cool-for-school ripped jeans and insanely hot dresses. Missguided is the only online fashion destination for any style savvy student!', 'empty', 'publish', 'yes', 'Missguided_Image_3f2ef9580d50f87a58ad73cc943b578f.jpg', 'Missguided_logo_3f2ef9580d50f87a58ad73cc943b578f.png', '2023-12-31 16:34:00', 65, 'half', 'offer', 2, 93, 'online', 'dfghvgkhlkk411465646', 'offernameTest'),
(11, 'ASOS', 'The leading fashion destination for stylish 20-somethings, ASOS offers a curated edit of 85,000 items, sourced from both in-house labels and the best global brands. Through our market-leading app and mobile/desktop web experience, alongside an ever-greater number of payment methods and hundreds of localised delivery and returns options, we aim to give all our customers a truly frictionless experience worldwide.', 'empty', 'publish', 'yes', 'ASOS_Image_93e8930591ddc079fdadbd67c550a44b.jpg', 'ASOS_logo_93e8930591ddc079fdadbd67c550a44b.png', '2023-12-31 16:34:00', 65, 'half', 'offer', 2, 48, 'online', 'dfghvgkhlkk411465646', 'offernameTest'),
(12, 'ASOS', 'The leading fashion destination for stylish 20-somethings, ASOS offers a curated edit of 85,000 items, sourced from both in-house labels and the best global brands. Through our market-leading app and mobile/desktop web experience, alongside an ever-greater number of payment methods and hundreds of localised delivery and returns options, we aim to give all our customers a truly frictionless experience worldwide.', 'empty', 'publish', 'yes', 'ASOS_Image_70cb2ba71e02f8ab78d3b93ed590c223.jpg', 'ASOS_logo_70cb2ba71e02f8ab78d3b93ed590c223.png', '2023-12-31 16:34:00', 65, 'half', 'offer', 2, 47, 'online', 'dfghvgkhlkk411465646', 'offernameTest'),
(13, 'New Look', 'Why not make New Look your one-stop destination for student fashion? From OMG-dresses to cool jeans and bang on-trend boots, they&#x2019;ve got your wardrobe covered for virtual seminars, at-home hangouts &amp; more. Plus, with 100s of new in homeware pieces, you can dress up your desk space too,', 'empty', 'publish', 'yes', 'New Look_Image_dfb1057f1510dd91568cd47000fc8728.jpg', 'New Look_logo_dfb1057f1510dd91568cd47000fc8728.png', '2023-12-31 16:34:00', 65, 'full', 'offer', 2, 32, 'online', 'dfghvgkhlkk411465646', 'offernameTest'),
(14, 'Public Desire', 'Public Desire is a global online footwear brand selling new styles daily to fashion forward girls looking for stylish updates without breaking the bank!', 'empty', 'publish', 'yes', 'Public Desire_Image_e76131164a392d60d048f6bc338259b1.jpg', 'Public Desire_logo_e76131164a392d60d048f6bc338259b1.png', '2023-12-31 16:34:00', 66, 'full', 'offer', 2, 86, 'online', 'dfghvgkhlkk411465646', 'offernameTest'),
(15, 'EGO', 'EGO is your one stop shop for must-have pieces. Trend focused clothing, shoes and statement accessories have established EGO as a hotspot for global celebrities, influencers and bloggers alike. Bringing designer inspired pieces to your everyday, turn your morning commute into a runway and your night out into something spectacular.', 'empty', 'publish', 'yes', 'EGO_Image_1fdcce50e643a5c385ccfbe87a39ac3e.jpg', 'EGO_logo_1fdcce50e643a5c385ccfbe87a39ac3e.png', '2023-12-31 16:34:00', 66, 'full', 'offer', 2, 14, 'online', 'dfghvgkhlkk411465646', 'offernameTest'),
(16, 'JD Sports', 'Home to the latest and greatest brands in the world, including Nike, adidas Originals, Sik Silk and Vans. JD Sports stocks the best of the best, with 100s of exclusive kicks, apparel and accessories sat alongside own labels A.L.I.G.N and Pink Soda Sport. From pro sports gear to street ready looks, JD Sports is the Undisputed King of Trainers.', 'empty', 'publish', 'yes', 'JD Sports_Image_4014af98d6aa256987100b3ad0eeb24a.jpg', 'JD Sports_logo_4014af98d6aa256987100b3ad0eeb24a.png', '2023-12-31 16:34:00', 66, 'full', 'offer', 2, 97, 'online', 'dfghvgkhlkk411465646', 'offernameTest'),
(17, 'Footasylum', 'Discover Footasylum; the go-to for all things streetwear.  Home to the biggest names in the game, they&#x2019;ve got all your everyday essentials boxed off, as well as the latest launches for guys and girls from Nike, Adidas, Guess, Calvin Klein and more.&#xD;&#xA;&#xD;&#xA;', 'empty', 'publish', 'yes', 'Footasylum_Image_2facfa6e8ffed1db63ff808c2988be09.jpg', 'Footasylum_logo_2facfa6e8ffed1db63ff808c2988be09.png', '2023-12-31 16:34:00', 66, 'full', 'offer', 2, 42, 'online', 'dfghvgkhlkk411465646', 'offernameTest'),
(18, 'adidas', 'adidas give everything they&#x27;ve got, then go back for more. No doubts, no holding back, no giving in. From the court to the catwalk, the stadium to the street; whatever the game, adidas play the same way: Heart over head. Inclusion over ego. United by passion, adidas go all in.', 'empty', 'publish', 'yes', 'adidas_Image_edd21de2069e04b8e9f8cbeea41eda5e.jpg', 'adidas_logo_edd21de2069e04b8e9f8cbeea41eda5e.png', '2023-12-31 16:34:00', 66, 'half', 'offer', 2, 78, 'online', 'dfghvgkhlkk411465646', 'offernameTest'),
(19, 'Vans', 'With more than 40 years of history &#x2013; and now offering a complete range of footwear, apparel, accessories, snowboard boots &amp; outerwear and Pro-Tec protective equipment &#x2013; Vans has risen to become a worldwide dominant force in the action sports industry and the genuine brand of choice for the contemporary lifestyle consumer.', 'empty', 'publish', 'yes', 'Vans_Image_8766d5d44b96da41ec16a715bf96ef6d.jpg', 'Vans_logo_8766d5d44b96da41ec16a715bf96ef6d.png', '2023-12-31 16:34:00', 66, 'half', 'offer', 2, 11, 'online', 'dfghvgkhlkk411465646', 'offernameTest'),
(20, 'Olivia Burton', 'If unique, vintage-inspired watches and jewellery are your thing, you&#x27;ll love Olivia Burton. From the understated cool of oversized dials and rose gold detailing to vegan-friendly straps and pretty blooms, there&#x27;s a timepiece for every wrist. You&#x27;re spoilt for choice when it comes to jewellery with cute lucky charms, mix &amp; match earrings and classic pieces you&#x27;ll wear every day.', 'empty', 'publish', 'yes', 'Olivia Burton_Image_31b491f62ec58b7a4b876933fe399388.jpg', 'Olivia Burton_logo_31b491f62ec58b7a4b876933fe399388.png', '2023-12-31 16:34:00', 64, 'half', 'offer', 2, 28, 'online', 'dfghvgkhlkk411465646', 'offernameTest'),
(21, 'Olivia Burton', 'If unique, vintage-inspired watches and jewellery are your thing, you&#x27;ll love Olivia Burton. From the understated cool of oversized dials and rose gold detailing to vegan-friendly straps and pretty blooms, there&#x27;s a timepiece for every wrist. You&#x27;re spoilt for choice when it comes to jewellery with cute lucky charms, mix &amp; match earrings and classic pieces you&#x27;ll wear every day.', 'empty', 'publish', 'yes', 'Olivia Burton_Image_16d4688b8ceb30204f8d11c4d67b4351.jpg', 'Olivia Burton_logo_16d4688b8ceb30204f8d11c4d67b4351.png', '2023-12-31 16:34:00', 64, 'full', 'offer', 2, 61, 'online', 'dfghvgkhlkk411465646', 'offernameTest'),
(22, 'Oh Polly', 'Oh Polly is an online women&#x27;s fashion boutique created for fashion forward, free thinking women. All pieces are designed in the UK and they personally manufacture each of their items themselves. If you&#x27;re looking for gorgeous and unique styles, then look no further!', 'empty', 'publish', 'yes', 'Oh Polly_Image_632b0349309be24a21ff389ecd7a20f6.jpg', 'Oh Polly_logo_632b0349309be24a21ff389ecd7a20f6.png', '2023-12-31 16:34:00', 64, 'full', 'offer', 2, 42, 'online', 'dfghvgkhlkk411465646', 'offernameTest'),
(23, 'The Body Shop', 'The Body Shop British cosmetics, skin care and perfume company was founded in 1976 by Dame&#xD;&#xA;Anita Roddick. Over 1,000 products which it sells in over 3,000 stores internationally in 66 countries.&#xD;&#xA;Explore their cruelty-free beauty products including make-up, skincare, bodycare and hair care.&#xD;&#xA;Ethically sourced, inspired by nature,&#xA0;The Body Shop&#xA0;is committed to banning animal testing.', 'empty', 'publish', 'yes', 'The Body Shop_Image_9a887202ecc1ad2dc1622da14db474ed.jpg', 'The Body Shop_logo_9a887202ecc1ad2dc1622da14db474ed.png', '2023-12-31 16:34:00', 64, 'full', 'offer', 2, 36, 'online', 'dfghvgkhlkk411465646', 'offernameTest'),
(24, 'The Body Shop', 'The Body Shop British cosmetics, skin care and perfume company was founded in 1976 by Dame&#xD;&#xA;Anita Roddick. Over 1,000 products which it sells in over 3,000 stores internationally in 66 countries.&#xD;&#xA;Explore their cruelty-free beauty products including make-up, skincare, bodycare and hair care.&#xD;&#xA;Ethically sourced, inspired by nature,&#xA0;The Body Shop&#xA0;is committed to banning animal testing.', 'empty', 'publish', 'yes', 'The Body Shop_Image_615232924fb225c8f97b804fbc85e686.jpg', 'The Body Shop_logo_615232924fb225c8f97b804fbc85e686.png', '2023-12-31 16:34:00', 0, 'full', 'offer', 2, 96, 'online', 'dfghvgkhlkk411465646', 'offernameTest'),
(25, 'O2 Accessories', 'Choose from hundreds of cases and protectors that&#x2019;ll keep your tech safe, power banks that&#x2019;ll keep you going through your next all-nighter, and plenty of smart wearables to keep you looking fresh and feeling your best. Or if you want to share your music, pick up a speaker and get the party started.', 'empty', 'publish', 'yes', 'O2 Accessories_Image_501135c26713931562926f3ea5d58d69.jpg', 'O2 Accessories_logo_501135c26713931562926f3ea5d58d69.png', '2023-12-31 16:34:00', 0, 'full', 'offer', 2, 21, 'online', 'dfghvgkhlkk411465646', 'offernameTest'),
(26, 'Samsung', 'Through innovative, reliable products and services, talented people, a responsible approach to business and global citizenship, and collaboration with their partners and customers, Samsung is taking the world in imaginative new directions.', 'empty', 'publish', 'yes', 'Samsung_Image_16ccc3f32d47813fa89fb2c4eba72c13.jpg', 'Samsung_logo_16ccc3f32d47813fa89fb2c4eba72c13.png', '2023-12-31 16:34:00', 0, 'half', 'offer', 2, 23, 'online', 'dfghvgkhlkk411465646', 'offernameTest');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_offer`
--

CREATE TABLE `tbl_offer` (
  `clm_id` int(11) NOT NULL,
  `clm_title` text NOT NULL,
  `clm_link` text NOT NULL,
  `clm_offer` int(11) NOT NULL,
  `clm_oo` enum('1','2','3') NOT NULL,
  `clm_date` datetime NOT NULL DEFAULT current_timestamp(),
  `clm_status` enum('draft','publish') NOT NULL,
  `clm_coupon` text NOT NULL,
  `clm_type` enum('offer','link') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_small_offers`
--

CREATE TABLE `tbl_small_offers` (
  `clm_id` int(11) NOT NULL,
  `clm_name` varchar(255) NOT NULL,
  `clm_description` text NOT NULL,
  `clm_link` text NOT NULL,
  `clm_status` enum('draft','publish') NOT NULL,
  `clm_image` text NOT NULL,
  `clm_logo` text NOT NULL,
  `clm_limited` enum('yes','no') NOT NULL DEFAULT 'no',
  `clm_date` datetime NOT NULL DEFAULT current_timestamp(),
  `clm_parent` int(11) NOT NULL,
  `clm_type` enum('offer','link') NOT NULL,
  `tbl_name` int(10) NOT NULL DEFAULT 3,
  `clm_count` int(11) NOT NULL DEFAULT 0,
  `clm_in` enum('instore','online') NOT NULL,
  `clm_coupon` text NOT NULL,
  `clm_offername` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_small_offers`
--

INSERT INTO `tbl_small_offers` (`clm_id`, `clm_name`, `clm_description`, `clm_link`, `clm_status`, `clm_image`, `clm_logo`, `clm_limited`, `clm_date`, `clm_parent`, `clm_type`, `tbl_name`, `clm_count`, `clm_in`, `clm_coupon`, `clm_offername`) VALUES
(1, 'Domino\'s', 'Parties? Oh yeah! Nights in? &#x2018;Course. Breakfast? Erm, ok. Random Tuesday afternoons when it&#x2019;s kinda raining, but not raining too much, and there&#x2019;s nothing on the telly and you just fancy a pizza? Yep.', 'empty', 'publish', 'Domino\'s_Image_3558669b5c2d3fe7e8c9f81c72849a48.jpg', 'Domino\'s_logo_3558669b5c2d3fe7e8c9f81c72849a48.png', 'yes', '2023-12-31 16:34:00', 63, 'offer', 3, 61, 'online', 'dfghvgkhlkk411465646', 'offernameTest'),
(2, 'Franco Manca', 'Franco Manca don&#x2019;t overcomplicate. They don&#x2019;t overprice. They don&#x2019;t stuff crusts. Franco Manca do sourdough pizza. Their slow-rising sourdough, made on site daily, is blast cooked at 450c. The slow-quick process means the flavour, aroma and moisture cannot escape and that we never keep you waiting. Welcome to sourdough pizza, as it should be.', 'empty', 'publish', 'Franco Manca_Image_ed5ed7edad899153afa391a33bf86b5e.jpg', 'Franco Manca_logo_ed5ed7edad899153afa391a33bf86b5e.png', 'yes', '2023-12-31 16:34:00', 63, 'offer', 3, 67, 'online', 'dfghvgkhlkk411465646', 'offernameTest'),
(3, 'Lyre\'s', 'Many years in the making, Lyre&#x27;s exquisite range of lovingly crafted non-alcoholic spirits was borne from a quest to make the impossible possible &#x2013; giving the freedom to drink your drink, your way.', 'empty', 'publish', 'Lyre\'s_Image_21e77785953c85a840f2826535cfc122.jpg', 'Lyre\'s_logo_21e77785953c85a840f2826535cfc122.png', 'yes', '2023-12-31 16:34:00', 63, 'offer', 3, 74, 'online', 'dfghvgkhlkk411465646', 'offernameTest'),
(4, 'Twisted Tailor', 'Twisted Tailor turns traditional tailoring on its head. Designing stand out Skinny fit suits, tuxedos, jackets, blazers, shirts, waistcoats and trousers, for any event &#x2013; be it your prom, graduation, weddings, one-night stands, or everyday wear &#x2013; there is a piece in the collection for your personal style.', 'empty', 'publish', 'Twisted Tailor_Image_05b5ef9acc885abdb708c8a69b2a0abf.jpg', 'Twisted Tailor_logo_05b5ef9acc885abdb708c8a69b2a0abf.png', 'yes', '2023-12-31 16:34:00', 64, 'offer', 3, 100, 'online', 'dfghvgkhlkk411465646', 'offernameTest'),
(5, 'Blacks', 'Blacks offer a huge range of premium outdoor gear, from clothing and footwear to camping and hiking equipment. Blacks only work with the most trusted outdoor brands known for their outstanding technical performanced, catering for everyone from first time adventurers to outdoor experts.', 'empty', 'publish', 'Blacks_Image_b5dc7e4a2612c83f9de0b63dc964ccb0.jpg', 'Blacks_logo_b5dc7e4a2612c83f9de0b63dc964ccb0.png', 'yes', '2023-12-31 16:34:00', 66, 'offer', 3, 54, 'online', 'dfghvgkhlkk411465646', 'offernameTest'),
(6, 'GetTheLabel.com', 'On-trend, Off-price. Stylish, a no brainer! If you haven&#x2019;t yet heard of GetTheLabel.com, where have you been? They&#x27;re the ultimate website for essential and indispensable designer clothing and footwear, and their team is dedicated to offering their customers the best prices when it comes to fashion.', 'empty', 'publish', 'GetTheLabel.com_Image_d94e1177da8c9a4bb901c4ccf6331f97.jpg', 'GetTheLabel.com_logo_d94e1177da8c9a4bb901c4ccf6331f97.png', 'yes', '2023-12-31 16:34:00', 66, 'offer', 3, 17, 'online', 'dfghvgkhlkk411465646', 'offernameTest'),
(7, 'Ultimate Outdoors', 'Ultimate Outdoors is the number one destination for everything outdoors. Whether you are experienced in the mountains, or heading out on your first camping trip you will find the right gear for you at the best price.', 'empty', 'publish', 'Ultimate Outdoors_Image_4f335de082a4ca577987483a28a9f27f.jpg', 'Ultimate Outdoors_logo_4f335de082a4ca577987483a28a9f27f.png', 'yes', '2023-12-31 16:34:00', 66, 'offer', 3, 77, 'online', 'dfghvgkhlkk411465646', 'offernameTest'),
(8, 'Evans Cycles', 'There are many different reasons to cycle, it&#x2019;s important to make sure you have the right cycling clothing &amp; accessories tailored to suit what you&#x2019;re doing. Whether you&#x2019;re commuting to work, riding competitively or riding with your cycle club at the weekend, here at Evans Cycles we have something to cover your needs.', 'empty', 'publish', 'Evans Cycles_Image_495a8fbc0979fd1744c9a2b8d309fd57.jpg', 'Evans Cycles_logo_495a8fbc0979fd1744c9a2b8d309fd57.png', 'yes', '2023-12-31 16:34:00', 65, 'offer', 3, 53, 'online', 'dfghvgkhlkk411465646', 'offernameTest'),
(9, 'East Dane', 'Shop the top brands shipped free from the US to your door! Launched in 2013 East Dane serve up new names for men to help elevate your wardrobe. They understand that dressing well comes from a combination of confidence and quality construction.', 'empty', 'publish', 'East Dane_Image_473ede635f64e897a7cd08aa9915ecd8.jpg', 'East Dane_logo_473ede635f64e897a7cd08aa9915ecd8.png', 'yes', '2023-12-31 16:34:00', 65, 'offer', 3, 48, 'online', 'dfghvgkhlkk411465646', 'offernameTest'),
(10, 'Millets', 'Millets is one of the high street&#x27;s best-known names and offers quality products and friendly, knowledgeable advice on a selection of outdoor kit.', 'empty', 'publish', 'Millets_Image_b0915e6b6350c675d1866bee41217f4b.jpg', 'Millets_logo_b0915e6b6350c675d1866bee41217f4b.png', 'yes', '2023-12-31 16:34:00', 65, 'offer', 3, 84, 'online', 'dfghvgkhlkk411465646', 'offernameTest'),
(11, 'FutureLearn', 'FutureLearn is a leading social learning platform with over 12 million people signed up worldwide. FutureLearn offers credible and flexible short online courses, microcredentials, as well as undergraduate and postgraduate degrees that improve working lives. We partner with over a quarter of the world&#x2019;s top universities, as well as organisations such as Accenture, the British Council, CIPD, Raspberry Pi and Health Education England (HEE). &#xD;&#xA;&#xD;&#xA;FutureLearn was formed in December 2012 and is now jointly owned by The Open University and The SEEK Group.', 'empty', 'publish', 'FutureLearn_Image_bfbb0882e7dee7d67008b055cf3244ff.jpg', 'FutureLearn_logo_bfbb0882e7dee7d67008b055cf3244ff.png', 'yes', '2023-12-31 16:34:00', 0, 'offer', 3, 32, 'online', 'dfghvgkhlkk411465646', 'offernameTest'),
(12, 'Three Broadband', 'Three is the best mobile network for data. Letting you snap, chat, binge, roam, explore and enjoy more.', 'empty', 'publish', 'Three Broadband_Image_2122d775616c8de220cdf710591acde3.jpg', 'Three Broadband_logo_2122d775616c8de220cdf710591acde3.png', 'yes', '2023-12-31 16:34:00', 0, 'offer', 3, 14, 'online', 'dfghvgkhlkk411465646', 'offernameTest'),
(13, 'ASOS', 'The leading fashion destination for stylish 20-somethings, ASOS offers a curated edit of 85,000 items, sourced from both in-house labels and the best global brands. Through our market-leading app and mobile/desktop web experience, alongside an ever-greater number of payment methods and hundreds of localised delivery and returns options, we aim to give all our customers a truly frictionless experience worldwide.', 'empty', 'publish', 'ASOS_Image_8ec4ce35de1a2a2b5e2dc5f751618b36.jpg', 'ASOS_logo_8ec4ce35de1a2a2b5e2dc5f751618b36.png', 'yes', '2023-12-31 16:34:00', 0, 'offer', 3, 28, 'online', 'dfghvgkhlkk411465646', 'offernameTest');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_smtp`
--

CREATE TABLE `tbl_smtp` (
  `clm_st_host` text COLLATE utf8_unicode_ci NOT NULL,
  `clm_st_username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clm_st_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clm_st_port` int(11) NOT NULL,
  `clm_st_from` text COLLATE utf8_unicode_ci NOT NULL,
  `clm_st_fromname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clm_st_state` enum('on','off') COLLATE utf8_unicode_ci NOT NULL,
  `clm_st_reply_to` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clm_st_security` enum('tls','ssl') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_smtp`
--

INSERT INTO `tbl_smtp` (`clm_st_host`, `clm_st_username`, `clm_st_password`, `clm_st_port`, `clm_st_from`, `clm_st_fromname`, `clm_st_state`, `clm_st_reply_to`, `clm_st_security`) VALUES
('smtp.gmail.com', 'mmoneyblogs@gmail.com', 'Kmwr/@98', 587, 'mmoneyblogs@gmail.com', 'karimwydad', 'on', 'mmoneyblogs@gmail.com', 'tls');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `clm_u_id` int(11) NOT NULL,
  `clm_u_username` varchar(225) NOT NULL,
  `clm_u_email` varchar(225) NOT NULL,
  `clm_u_password` varchar(225) NOT NULL,
  `clm_u_personal` varchar(225) NOT NULL,
  `clm_u_phone` varchar(225) NOT NULL,
  `clm_u_img` text NOT NULL DEFAULT 'empty',
  `clm_u_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`clm_u_id`, `clm_u_username`, `clm_u_email`, `clm_u_password`, `clm_u_personal`, `clm_u_phone`, `clm_u_img`, `clm_u_date`) VALUES
(1, 'Karim Mansour', 'don.karimmansour@gmail.com', '28e152bb5b02b7ba59f9987dcebeb140', 'don.karimmansour@gmail.com', '+233658982795', 'empty', '2021-12-07 12:59:42'),
(5, 'Karim Mansour', 'mmoneyblogs@gmail.com', '4d9abe59d789a38f39985e1a0511a33b', 'mmoneyblogs@gmail.com', '+233658982795', 'empty', '2021-12-07 13:12:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`clm_a_id`);

--
-- Indexes for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD PRIMARY KEY (`clm_id`),
  ADD KEY `key_onenn` (`clm_parent`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`clm_id`),
  ADD KEY `clm_parent` (`clm_parent`) USING BTREE;

--
-- Indexes for table `tbl_header_offers`
--
ALTER TABLE `tbl_header_offers`
  ADD PRIMARY KEY (`clm_id`),
  ADD KEY `key_onen` (`clm_parent`);

--
-- Indexes for table `tbl_links`
--
ALTER TABLE `tbl_links`
  ADD PRIMARY KEY (`clm_id`);

--
-- Indexes for table `tbl_main_offers`
--
ALTER TABLE `tbl_main_offers`
  ADD PRIMARY KEY (`clm_id`),
  ADD KEY `clm_parent` (`clm_parent`) USING BTREE;

--
-- Indexes for table `tbl_offer`
--
ALTER TABLE `tbl_offer`
  ADD PRIMARY KEY (`clm_id`);

--
-- Indexes for table `tbl_small_offers`
--
ALTER TABLE `tbl_small_offers`
  ADD PRIMARY KEY (`clm_id`),
  ADD KEY `key_two` (`clm_parent`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`clm_u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `clm_a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  MODIFY `clm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `clm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `tbl_header_offers`
--
ALTER TABLE `tbl_header_offers`
  MODIFY `clm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_links`
--
ALTER TABLE `tbl_links`
  MODIFY `clm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_main_offers`
--
ALTER TABLE `tbl_main_offers`
  MODIFY `clm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_offer`
--
ALTER TABLE `tbl_offer`
  MODIFY `clm_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_small_offers`
--
ALTER TABLE `tbl_small_offers`
  MODIFY `clm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `clm_u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD CONSTRAINT `key_onenn` FOREIGN KEY (`clm_parent`) REFERENCES `tbl_categories` (`clm_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD CONSTRAINT `key_one` FOREIGN KEY (`clm_parent`) REFERENCES `tbl_categories` (`clm_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_header_offers`
--
ALTER TABLE `tbl_header_offers`
  ADD CONSTRAINT `key_onen` FOREIGN KEY (`clm_parent`) REFERENCES `tbl_categories` (`clm_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_main_offers`
--
ALTER TABLE `tbl_main_offers`
  ADD CONSTRAINT `key_oneb` FOREIGN KEY (`clm_parent`) REFERENCES `tbl_categories` (`clm_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_small_offers`
--
ALTER TABLE `tbl_small_offers`
  ADD CONSTRAINT `key_two` FOREIGN KEY (`clm_parent`) REFERENCES `tbl_categories` (`clm_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
