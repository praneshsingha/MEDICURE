-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2018 at 03:33 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medicure`
--

-- --------------------------------------------------------

--
-- Table structure for table `5ad8da8ff19f7`
--

CREATE TABLE `5ad8da8ff19f7` (
  `cartid` varchar(100) NOT NULL,
  `iid` varchar(100) DEFAULT NULL,
  `iname` varchar(100) DEFAULT NULL,
  `QTY` int(11) DEFAULT '1',
  `IPRICE` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `5ad8da8ff19fd`
--

CREATE TABLE `5ad8da8ff19fd` (
  `serialid` varchar(100) NOT NULL,
  `orderid` varchar(100) DEFAULT NULL,
  `iid` varchar(100) DEFAULT NULL,
  `iname` varchar(100) DEFAULT NULL,
  `QTY` int(20) DEFAULT '1',
  `IPRICE` int(11) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'prepare for dispatch',
  `d_date` date DEFAULT NULL,
  `r_date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `5ad9a66616d5d`
--

CREATE TABLE `5ad9a66616d5d` (
  `serialid` varchar(100) NOT NULL,
  `orderid` varchar(100) DEFAULT NULL,
  `iid` varchar(100) DEFAULT NULL,
  `iname` varchar(100) DEFAULT NULL,
  `QTY` int(20) DEFAULT '1',
  `IPRICE` int(11) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'prepare for dispatch'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `5ad9a66616d55`
--

CREATE TABLE `5ad9a66616d55` (
  `cartid` varchar(100) NOT NULL,
  `iid` varchar(100) DEFAULT NULL,
  `iname` varchar(100) DEFAULT NULL,
  `QTY` int(11) DEFAULT '1',
  `IPRICE` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `5ad99fceb6d5f`
--

CREATE TABLE `5ad99fceb6d5f` (
  `cartid` varchar(100) NOT NULL,
  `iid` varchar(100) DEFAULT NULL,
  `iname` varchar(100) DEFAULT NULL,
  `QTY` int(11) DEFAULT '1',
  `IPRICE` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `5ad99fceb6d6c`
--

CREATE TABLE `5ad99fceb6d6c` (
  `serialid` varchar(100) NOT NULL,
  `orderid` varchar(100) DEFAULT NULL,
  `iid` varchar(100) DEFAULT NULL,
  `iname` varchar(100) DEFAULT NULL,
  `QTY` int(20) DEFAULT '1',
  `IPRICE` int(11) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'prepare for dispatch'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `5ae970632d21d`
--

CREATE TABLE `5ae970632d21d` (
  `cartid` varchar(100) NOT NULL,
  `iid` varchar(100) DEFAULT NULL,
  `iname` varchar(100) DEFAULT NULL,
  `QTY` int(11) DEFAULT '1',
  `IPRICE` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `5ae970632d21d`
--

INSERT INTO `5ae970632d21d` (`cartid`, `iid`, `iname`, `QTY`, `IPRICE`) VALUES
('5ae957f5a398f', NULL, 'SBL Wipe Clear Acne Lotion', 1, 126),
('5ae96117ec047', NULL, 'Moisturizing Face Wash', 1, 100);

-- --------------------------------------------------------

--
-- Table structure for table `5ae970632d225`
--

CREATE TABLE `5ae970632d225` (
  `serialid` varchar(100) NOT NULL,
  `orderid` varchar(100) DEFAULT NULL,
  `iid` varchar(100) DEFAULT NULL,
  `iname` varchar(100) DEFAULT NULL,
  `QTY` int(20) DEFAULT '1',
  `IPRICE` int(11) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'prepare for dispatch'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `a_id` varchar(100) NOT NULL,
  `o_id` varchar(100) NOT NULL,
  `u_id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(20) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`a_id`, `o_id`, `u_id`, `name`, `address`, `city`, `state`, `pincode`, `email`, `phone`) VALUES
('5ae60c5cd2bf9', '5ae60c5cd2bff', 'ram@gmail.com', 'Pranesh Kumar Singha', 'Domohona Ps Karandighi Uttar Dinajpur', 'Raiganj', 'west Bengal', '733215', 'praneshsingha@gmail.com', 2147483647),
('5ae60c4d33202', '5ae60c4d33213', 'ram@gmail.com', 'Pranesh Kumar Singha', 'Domohona Ps Karandighi Uttar Dinajpur', 'Raiganj', 'west Bengal', '733215', 'praneshsingha@gmail.com', 2147483647),
('5ae5e932bd760', '5ae5e932bd766', 'ram@gmail.com', 'Pranesh Kumar Singha', 'Domohona Ps Karandighi Uttar Dinajpur, State West Bengal', 'Raiganj', 'west Bengal', '733215', 'praneshsingha@gmail.com', 2147483647),
('5ae5e93d9d13f', '5ae5e93d9d14b', 'ram@gmail.com', 'Pranesh Kumar Singha', 'Domohona Ps Karandighi Uttar Dinajpur, State West Bengal', 'Raiganj', 'west Bengal', '733215', 'praneshsingha@gmail.com', 2147483647),
('5ae5e861d0ee0', '5ae5e861d0f34', 'ram@gmail.com', 'Pranesh Kumar Singha', 'Domohona Ps Karandighi Uttar Dinajpur, State West Bengal', 'Raiganj', 'west Bengal', '733215', 'praneshsingha@gmail.com', 2147483647),
('5ae5e8586432f', '5ae5e85864335', 'ram@gmail.com', 'Pranesh Kumar Singha', 'Domohona Ps Karandighi Uttar Dinajpur, State West Bengal', 'Raiganj', 'west Bengal', '733215', 'praneshsingha@gmail.com', 2147483647),
('5ae5df6e0488b', '5ae5df6e04892', 'ram@gmail.com', 'Pranesh Kumar Singha', 'Domohona Ps Karandighi Uttar Dinajpur, State West Bengal', 'Raiganj', 'west Bengal', '733215', 'praneshsingha@gmail.com', 2147483647),
('5ae5a736c9a49', '5ae5a736c9a51', 'ram@gmail.com', 'Pranesh Kumar Singha', 'Domohona Ps Karandighi Uttar Dinajpur, State West Bengal', 'Raiganj', 'west Bengal', '733215', 'praneshsingha@gmail.com', 2147483647),
('5ae5a427c3f65', '5ae5a427c3f6e', 'ram@gmail.com', 'Pranesh Kumar Singha', 'Domohona Ps Karandighi Uttar Dinajpur, State West Bengal', 'Raiganj', 'west Bengal', '733215', 'praneshsingha@gmail.com', 2147483647),
('5ae5a3ecec6ee', '5ae5a3ecec6fc', 'ram@gmail.com', 'Pranesh Kumar Singha', 'Domohona Ps Karandighi Uttar Dinajpur, State West Bengal', 'Raiganj', 'west Bengal', '733215', 'praneshsingha@gmail.com', 2147483647),
('5ae60c83aff81', '5ae60c83aff87', 'ram@gmail.com', 'Pranesh Kumar Singha', 'Domohona Ps Karandighi Uttar Dinajpur', 'Raiganj', 'west Bengal', '733215', 'praneshsingha@gmail.com', 2147483647),
('5ae60cad50adf', '5ae60cad50ae5', 'ram@gmail.com', 'Pranesh Kumar Singha', 'Domohona Ps Karandighi Uttar Dinajpur', 'Raiganj', 'west Bengal', '733215', 'praneshsingha@gmail.com', 2147483647),
('5ae60cd9d1549', '5ae60cd9d154f', 'ram@gmail.com', 'Pranesh Kumar Singha', 'Domohona Ps Karandighi Uttar Dinajpur', 'Raiganj', 'west Bengal', '733215', 'praneshsingha@gmail.com', 2147483647),
('5ae60ce656869', '5ae60ce656873', 'ram@gmail.com', 'Pranesh Kumar Singha', 'Domohona Ps Karandighi Uttar Dinajpur', 'Raiganj', 'west Bengal', '733215', 'praneshsingha@gmail.com', 2147483647),
('5ae60cf6caf4a', '5ae60cf6caf50', 'ram@gmail.com', 'Pranesh Kumar Singha', 'Domohona Ps Karandighi Uttar Dinajpur', 'Raiganj', 'west Bengal', '733215', 'praneshsingha@gmail.com', 2147483647),
('5ae60d009b24c', '5ae60d009b255', 'ram@gmail.com', 'Pranesh Kumar Singha', 'Domohona Ps Karandighi Uttar Dinajpur', 'Raiganj', 'west Bengal', '733215', 'praneshsingha@gmail.com', 2147483647),
('5ae60d06425ab', '5ae60d06425b1', 'ram@gmail.com', 'Pranesh Kumar Singha', 'Domohona Ps Karandighi Uttar Dinajpur', 'Raiganj', 'west Bengal', '733215', 'praneshsingha@gmail.com', 2147483647),
('5ae60d06d5ffe', '5ae60d06d6007', 'ram@gmail.com', 'Pranesh Kumar Singha', 'Domohona Ps Karandighi Uttar Dinajpur', 'Raiganj', 'west Bengal', '733215', 'praneshsingha@gmail.com', 2147483647),
('5ae60d0cd96d0', '5ae60d0cd96e1', 'ram@gmail.com', 'Pranesh Kumar Singha', 'Domohona Ps Karandighi Uttar Dinajpur', 'Raiganj', 'west Bengal', '733215', 'praneshsingha@gmail.com', 2147483647),
('5ae60d11bd422', '5ae60d11bd428', 'ram@gmail.com', 'Pranesh Kumar Singha', 'Domohona Ps Karandighi Uttar Dinajpur', 'Raiganj', 'west Bengal', '733215', 'praneshsingha@gmail.com', 2147483647),
('5ae60e5c093dc', '5ae60e5c093e2', 'ram@gmail.com', 'Pranesh Kumar Singha', 'Domohona Ps Karandighi Uttar Dinajpur', 'Raiganj', 'west Bengal', '733215', 'praneshsingha@gmail.com', 2147483647),
('5ae60e8c26581', '5ae60e8c26588', 'ram@gmail.com', 'Pranesh Kumar Singha', 'Domohona Ps Karandighi Uttar Dinajpur, State West Bengal', 'Raiganj', 'west Bengal', '733215', 'praneshsingha@gmail.com', 2147483647),
('5ae60eb45fc93', '5ae60eb45fc99', 'ram@gmail.com', 'Pranesh Kumar Singha', 'Domohona Ps Karandighi Uttar Dinajpur, State West Bengal', 'Raiganj', 'west Bengal', '733215', 'praneshsingha@gmail.com', 2147483647),
('5ae60f7a9a5dc', '5ae60f7a9a5e5', 'ram@gmail.com', 'Pranesh Kumar Singha', 'Domohona Ps Karandighi Uttar Dinajpur, State West Bengal', 'Raiganj', 'west Bengal', '733215', 'praneshsingha@gmail.com', 2147483647),
('5ae60fd080892', '5ae60fd0808a1', 'ram@gmail.com', 'Pranesh Kumar Singha', 'Domohona Ps Karandighi Uttar Dinajpur, State West Bengal', 'Raiganj', 'west Bengal', '733215', 'praneshsingha@gmail.com', 2147483647),
('5ae61bfe44241', '5ae61bfe44248', 'ram@gmail.com', 'Pranesh Kumar Singha', 'Domohona Ps Karandighi Uttar Dinajpur, State West Bengal', 'Raiganj', 'west Bengal', '733215', 'praneshsingha@gmail.com', 2147483647),
('5ae6fb0da87f6', '5ae6fb0da8800', 'ram@gmail.com', 'Pranesh Kumar Singha', 'Domohona Ps Karandighi Uttar Dinajpur, State West Bengal', 'Raiganj', 'west Bengal', '733215', 'praneshsingha@gmail.com', 2147483647),
('5ae971bb30489', '5ae971bb30492', 'goku@gmail.com', 'Pranesh Kumar Singha', 'Domohona Ps Karandighi Uttar Dinajpur, State West Bengal', 'Raiganj', 'west Bengal', '733215', 'praneshsingha@gmail.com', 2147483647),
('5ae9e829abb67', '5ae9e829abb75', 'goku@gmail.com', 'Pranesh Kumar Singha', 'Domohona Ps Karandighi Uttar Dinajpur', 'Raiganj', 'west Bengal', '733215', 'praneshsingha@gmail.com', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(30) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `username`, `password`) VALUES
('admin', 'admin', 'pkrq6vk6i9v6M');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `userid` varchar(100) NOT NULL,
  `bankName` varchar(100) NOT NULL,
  `cardName` varchar(100) NOT NULL,
  `cardNumber` bigint(16) NOT NULL,
  `cvv` int(3) NOT NULL,
  `pinCode` int(4) NOT NULL,
  `expDate` date DEFAULT NULL,
  `amount` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`userid`, `bankName`, `cardName`, `cardNumber`, `cvv`, `pinCode`, `expDate`, `amount`) VALUES
('5ae4efff027ad', 'SBI', 'RAM KUMAR', 1234567891011121, 123, 1234, '2019-01-01', 100000),
('5ae4f007abd06', 'AXIS', 'RIYA KUMARI', 1020304050607080, 555, 1611, '2020-01-01', 10);

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `m_id` varchar(100) NOT NULL,
  `m_name` varchar(200) NOT NULL,
  `m_desc` varchar(500) NOT NULL,
  `m_cost` float NOT NULL,
  `m_exp` date DEFAULT NULL,
  `m_mfg` date DEFAULT NULL,
  `m_comp` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `quentity` bigint(100) NOT NULL,
  `symptoms` varchar(200) DEFAULT NULL,
  `type` varchar(100) NOT NULL,
  `category` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`m_id`, `m_name`, `m_desc`, `m_cost`, `m_exp`, `m_mfg`, `m_comp`, `image`, `quentity`, `symptoms`, `type`, `category`) VALUES
('5ae957f5a398f', 'SBL Wipe Clear Acne Lotion', 'SBL Wipe Clear - Acne Lotion is an excellent antiseptic and cleanser for acne, pimples, boils, and blotches. Used in cases of acne vulgaris, papules, pustules and comedones on the face, arms & back.', 126, '2018-01-01', '2018-01-01', 'natural ingridient', 'store_images/5ae957f5a36bc.jpg', 120, 'null', 'personal care', 'personal_care'),
('5ae96117ec047', 'Moisturizing Face Wash', 'Aloe Vera moisturizes nourishes skin and protects it against skin diseases eczema and dry skin. ', 100, '2018-01-01', '2018-01-02', 'natural ingridient', 'store_images/5ae96117ebd01.jpg', 100, 'null', 'personal care', 'personal_care'),
('5ae961bd615b7', 'Jiva Neem Face Wash Pack of 2', 'Jiva neem face wash combines the goodness of neem, tulsi, aloe vera, and lemon. Neem, popular for its anti-bacterial properties, improves skin health and immunity and fights off bacterial infections such as acne', 175, '2018-01-01', '2018-01-01', 'natural ingridient', 'store_images/5ae961bd61238.jpg', 120, 'null', 'personal care', 'personal_care'),
('5ae962843c016', 'Organic India Tulsi Green Tea Classic', 'Tulsi Green Tea : - A healthy and refreshing tea for all tea lovers. This tea is made using a perfect blend of Tulsi herbs and Green Tea. 100% organic certified, this tea has become quite popular for every one', 175, '2018-01-01', '2018-01-01', 'tea leaf', 'store_images/5ae962843bc65.jpg', 100, 'fitness', 'personal care', 'personal_care'),
('5ae964a10ade3', 'Seven Seas Perfect7 Man', 'Our experts have developed this unique blend of essential multivitamins', 311, '2018-01-01', '2018-01-01', 'vitamins', 'store_images/5ae964a10aa15.jpg', 200, 'null', 'nutrition', 'nutrition'),
('5ae964f76ffb1', 'Amway Nutrilite Daily Multivitamin and Multimineral Tablet', 'Nutrilite Daily Multivitamin and Multimineral Tablet is a potent, convenient way to help fill in the nutritional gaps in your daily diet.', 1716, '2018-01-01', '2018-01-01', 'vitamins', 'store_images/5ae964f76fc02.jpg', 150, 'null', 'nutrition', 'nutrition'),
('5ae9656394c15', 'Herbalife Formula 2 Multivitamin Mineral & Herbal Tablet', 'Herbalife Formula-2 Multivitamin Tablet is a nutritinal supplement', 299, '2018-01-01', '2018-01-01', 'vitamins', 'store_images/5ae96563948af.jpg', 130, 'null', 'nutrition', 'nutrition'),
('5ae965e901f08', 'Easum Baby Cereal Powder', 'Easum baby cereals are specifically developed to introduce delicious tastes and thicker textures as your baby progresses. Easum is pure baby rice with Mung dal is specially prepared with a perfectly smooth texture as an ideal first weaning food.', 215, '2018-01-01', '2018-01-01', 'rice', 'store_images/5ae965e901b1d.jpg', 120, 'null', 'mom and baby', 'mom baby'),
('5ae9669d4a6c3', 'Himalaya Baby Cream', 'Himalaya Baby Cream contains Country Mallow  Olive Oil and Licorice as major ingredients  The cream protects and preserves the softness of baby delicate skin', 124, '2018-02-01', '2018-01-01', 'natural ingridient', 'store_images/5ae9669d4a2c4.jpg', 120, 'null', 'mom and baby', 'mom baby'),
('5ae9674a56890', 'Dermadew Baby Soap', 'Dermadew Baby Soap contains vegetable oils combined with gentle sulphosuccinate base cleanser and fortified with specific emollients moisturisers antioxidants and skin nourishers It is enriched with Glycerine Shea Butter Kokum Butter Olive Extract, Aloe Vera Extract, Milk Protein Wheat Protein Almond Protein Turmeric Oil and Almond Oil', 162, '2018-01-01', '2018-01-01', 'natural ingridient', 'store_images/5ae9674a5653e.jpg', 130, 'null', 'mom and baby', 'mom baby'),
('5ae96809beaeb', 'Himalaya Baby Lotion', 'Himalaya Baby Lotion contains Almond Oil Olive Oil and Licorice as major ingredients The lotion is developed to deeply nourish and protect the baby delicate skin from infections', 143, '2018-01-01', '2018-01-01', 'natural ingridient', 'store_images/5ae96809be6c9.jpg', 140, 'null', 'mom and baby', 'mom baby');

-- --------------------------------------------------------

--
-- Table structure for table `medi_register`
--

CREATE TABLE `medi_register` (
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `dob` date NOT NULL,
  `password` varchar(20) NOT NULL,
  `cart_nm` varchar(100) NOT NULL,
  `order_table` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medi_register`
--

INSERT INTO `medi_register` (`name`, `email`, `gender`, `contact`, `dob`, `password`, `cart_nm`, `order_table`) VALUES
('ram', 'ram@gmail.com', 'male', 8903475093, '2018-01-01', 'pkEd11V0upP6k', '5ad8da8ff19f7', '5ad8da8ff19fd'),
('riya', 'riya@gmail.com', 'female', 8903458903, '1996-01-01', 'pkGsMHguT.loo', '5ad99fceb6d5f', '5ad99fceb6d6c'),
('goku', 'goku@gmail.com', 'male', 9876543212, '1995-03-03', 'pkfQCwYvZKqrI', '5ae970632d21d', '5ae970632d225');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pid` varchar(30) NOT NULL,
  `orderid` varchar(30) NOT NULL,
  `user` varchar(100) NOT NULL,
  `tran_id` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `order_by` varchar(100) DEFAULT 'by card'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pid`, `orderid`, `user`, `tran_id`, `amount`, `order_by`) VALUES
('5ae6fb35209bb', '5ae6fb352027b', 'ram@gmail.com', '5ae6fb35209bf', 4626, 'COD'),
('5ae61c010d4d5', '5ae61c010cbc9', 'ram@gmail.com', '5ae61c010d4da', 4626, 'COD'),
('5ae60fddd8447', '5ae60fddd780b', 'ram@gmail.com', '5ae60fddd844d', 4626, 'CARD'),
('5ae60fa96c3eb', '5ae60fa96bb6e', 'ram@gmail.com', '5ae60fa96c3f1', 4626, 'by card'),
('5ae60e5e1bb24', '5ae60e5e1b52a', 'ram@gmail.com', '5ae60e5e1bb29', 4626, 'COD');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `p_id` varchar(100) NOT NULL,
  `u_id` varchar(100) NOT NULL,
  `p_file` varchar(200) NOT NULL,
  `p_status` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`p_id`, `u_id`, `p_file`, `p_status`) VALUES
('5ae97181d0330', 'goku@gmail.com', 'pres_images/5ae97181cff47.jpg', 'verifying'),
('5ae96956d89b8', 'ram@gmail.com', 'pres_images/5ae96956d8661.jpg', 'on The Way');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `5ad8da8ff19f7`
--
ALTER TABLE `5ad8da8ff19f7`
  ADD PRIMARY KEY (`cartid`);

--
-- Indexes for table `5ad8da8ff19fd`
--
ALTER TABLE `5ad8da8ff19fd`
  ADD PRIMARY KEY (`serialid`);

--
-- Indexes for table `5ad9a66616d5d`
--
ALTER TABLE `5ad9a66616d5d`
  ADD PRIMARY KEY (`serialid`);

--
-- Indexes for table `5ad9a66616d55`
--
ALTER TABLE `5ad9a66616d55`
  ADD PRIMARY KEY (`cartid`);

--
-- Indexes for table `5ad99fceb6d5f`
--
ALTER TABLE `5ad99fceb6d5f`
  ADD PRIMARY KEY (`cartid`);

--
-- Indexes for table `5ad99fceb6d6c`
--
ALTER TABLE `5ad99fceb6d6c`
  ADD PRIMARY KEY (`serialid`);

--
-- Indexes for table `5ae970632d21d`
--
ALTER TABLE `5ae970632d21d`
  ADD PRIMARY KEY (`cartid`);

--
-- Indexes for table `5ae970632d225`
--
ALTER TABLE `5ae970632d225`
  ADD PRIMARY KEY (`serialid`);

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `medi_register`
--
ALTER TABLE `medi_register`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`p_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
