-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2022 at 08:26 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fin_2021`
--

-- --------------------------------------------------------

--
-- Table structure for table `donate_eth`
--

CREATE TABLE `donate_eth` (
  `donate_id` int(200) NOT NULL,
  `donate_uid` varchar(200) NOT NULL,
  `donate_chain_network` varchar(200) NOT NULL,
  `txn_network_url` varchar(200) NOT NULL,
  `user_address_url` varchar(200) NOT NULL,
  `current_coin_symble` varchar(200) NOT NULL,
  `video_id` varchar(200) NOT NULL,
  `from_user_address` varchar(200) NOT NULL,
  `to_user_address` varchar(200) NOT NULL,
  `eth_price` varchar(200) NOT NULL,
  `transation_hash` varchar(200) NOT NULL,
  `from_ip` varchar(200) NOT NULL,
  `from_time` varchar(200) NOT NULL,
  `from_browser` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donate_eth`
--

INSERT INTO `donate_eth` (`donate_id`, `donate_uid`, `donate_chain_network`, `txn_network_url`, `user_address_url`, `current_coin_symble`, `video_id`, `from_user_address`, `to_user_address`, `eth_price`, `transation_hash`, `from_ip`, `from_time`, `from_browser`) VALUES
(1, '16081dd6-9827-4f73-ba12-45dfcf62bac1', '4', 'https://etherscan.io/tx/', 'https://etherscan.io/address/', 'ETH', 'aa085fd1-4198-4e05-bece-bd0028a7c647', '0x49e8883b30c482ade14488fd00a6622c9377c366', '0x49E8883B30c482ADE14488Fd00A6622c9377C366', '0.00058', '0x96ce128284ef5019e3c8499b3a2494ace6d57dab33ea411d6bb68f5ae79e91a2', '::1', '2022-08-25', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36'),
(2, 'cb89113c-d657-43aa-84a7-f1f2f5aef720', '4', 'https://rinkeby.etherscan.io/tx/', 'https://rinkeby.etherscan.io/address/', 'ETH', 'aa085fd1-4198-4e05-bece-bd0028a7c647', '0x49e8883b30c482ade14488fd00a6622c9377c366', '0x49E8883B30c482ADE14488Fd00A6622c9377C366', '0.00058', '0x3944776a990d5b242382092a94fe31a5d3c8ea76a2d36ca96925f5a9a64d0028', '::1', '2022-08-25', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36'),
(3, 'af9185b2-27b6-46fa-8fe1-24a9eca98783', '4', 'https://rinkeby.etherscan.io/tx/', 'https://rinkeby.etherscan.io/address/', 'ETH', 'aa085fd1-4198-4e05-bece-bd0028a7c647', '0x49e8883b30c482ade14488fd00a6622c9377c366', '0x49E8883B30c482ADE14488Fd00A6622c9377C366', '0.00058', '0xca8f7e242d235f0e8ddf7c06c4448d4b9c0c94ce38aeead1cf5a7b4585ea237b', '::1', '2022-08-25', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36'),
(4, '6a726fa3-94d0-4908-9929-e9adeea5843f', '4', 'https://rinkeby.etherscan.io/tx/', 'https://rinkeby.etherscan.io/address/', 'ETH', 'aa085fd1-4198-4e05-bece-bd0028a7c647', '0x49e8883b30c482ade14488fd00a6622c9377c366', '0x49E8883B30c482ADE14488Fd00A6622c9377C366', '0.00058', '0xb54c4a859b543bf253be7470bbb415cf83a9d803a6fa7f2ed402d1051c107c28', '::1', '2022-08-25', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36'),
(5, 'd8d54ce7-9315-45b3-bfea-99585af600df', '4', 'https://rinkeby.etherscan.io/tx/', 'https://rinkeby.etherscan.io/address/', 'ETH', 'aa085fd1-4198-4e05-bece-bd0028a7c647', '0x49e8883b30c482ade14488fd00a6622c9377c366', '0x49E8883B30c482ADE14488Fd00A6622c9377C366', '0.00059', '0x5603eca74dc8f114c34b88c0658c5f12f7e65f12a38457a8377951fcbf3dfd07', '::1', '2022-08-25', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36'),
(6, 'cfcb9a5a-8b46-4d1e-91dd-41dce6c4f03c', '4', 'https://rinkeby.etherscan.io/tx/', 'https://rinkeby.etherscan.io/address/', 'ETH', 'aa085fd1-4198-4e05-bece-bd0028a7c647', '0x49e8883b30c482ade14488fd00a6622c9377c366', '0x49E8883B30c482ADE14488Fd00A6622c9377C366', '0.00059', '0xa49d1eced931ccd414b949c4533eba0326a325bf5091e720d1e56e52973e235c', '::1', '2022-08-25', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36'),
(7, '86c36571-07c4-42ea-b856-90c94c15af62', '4', 'https://rinkeby.etherscan.io/tx/', 'https://rinkeby.etherscan.io/address/', 'ETH', 'aa085fd1-4198-4e05-bece-bd0028a7c647', '0x49e8883b30c482ade14488fd00a6622c9377c366', '0x49E8883B30c482ADE14488Fd00A6622c9377C366', '0.00058', '0xb2cf28fdee513080ba5229d4ac205710f237e1e3790e6b700a8a0cf0d25e17a5', '::1', '2022-08-25', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36'),
(8, 'd8f03a35-ea1d-4676-9415-bbe0a6f4cc5d', '4', 'https://rinkeby.etherscan.io/tx/', 'https://rinkeby.etherscan.io/address/', 'ETH', 'aa085fd1-4198-4e05-bece-bd0028a7c647', '0x49e8883b30c482ade14488fd00a6622c9377c366', '0x49E8883B30c482ADE14488Fd00A6622c9377C366', '0.00058', '0x1c5c46b42d790b66e338f1a0691afb7e74c6f2202126025e53828cfd34b6e16a', '::1', '2022-08-25', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36'),
(9, '677feeae-a464-460e-a994-a8ce0f8ffee6', '4', 'https://rinkeby.etherscan.io/tx/', 'https://rinkeby.etherscan.io/address/', 'ETH', 'aa085fd1-4198-4e05-bece-bd0028a7c647', '0x49e8883b30c482ade14488fd00a6622c9377c366', '0x49E8883B30c482ADE14488Fd00A6622c9377C366', '0.00058', '0xa16b1c87ba0f25a8656b5bff1186f7ce35f2098b0b3951c6c03c3fb1712f67cf', '::1', '2022-08-31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36'),
(10, 'a70f3eed-08eb-429a-9b25-d1393a08250d', '4', 'https://rinkeby.etherscan.io/tx/', 'https://rinkeby.etherscan.io/address/', 'ETH', 'aa085fd1-4198-4e05-bece-bd0028a7c647', '0x49e8883b30c482ade14488fd00a6622c9377c366', '0x49E8883B30c482ADE14488Fd00A6622c9377C366', '0.00060', '0x7ccdd1bef4df0f9c08bde4df075e0de27f96fe398025cfafc4b9a9790f6dcb94', '::1', '2022-09-01', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36'),
(11, '306d0ad4-dd8d-4fde-ad01-be5fcf0bf1ee', '4', 'https://rinkeby.etherscan.io/tx/', 'https://rinkeby.etherscan.io/address/', 'ETH', '529add58-5f14-4cf4-a843-6199441cf86c', '0x49e8883b30c482ade14488fd00a6622c9377c366', '0x49E8883B30c482ADE14488Fd00A6622c9377C366', '0.00065', '0x3cd3fade8049e7da4f2a7756abb2851ff88c73bbb186a68f428290198a05d5ea', '::1', '2022-09-01', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36'),
(12, '65787f43-e812-47ba-a3c3-719a007702f9', '4', 'https://rinkeby.etherscan.io/tx/', 'https://rinkeby.etherscan.io/address/', 'ETH', '08ae1204-7588-420d-ada7-1ffcbdf75a7f', '0x49e8883b30c482ade14488fd00a6622c9377c366', '0x49E8883B30c482ADE14488Fd00A6622c9377C366', '0.00065', '0xffe2048a86f8b74074e4e256cfd221ea8cb66ec07504c49bb641c3c4a80c3fe3', '::1', '2022-09-01', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36');

-- --------------------------------------------------------

--
-- Table structure for table `dual_auth`
--

CREATE TABLE `dual_auth` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dual_auth`
--

INSERT INTO `dual_auth` (`id`, `username`, `password`) VALUES
(1, 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918');

-- --------------------------------------------------------

--
-- Table structure for table `favourite_videos`
--

CREATE TABLE `favourite_videos` (
  `favourite_video_id` int(20) NOT NULL,
  `favourite_video_uuid` varchar(200) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `video_info_id` varchar(200) NOT NULL,
  `from_ip` varchar(200) NOT NULL,
  `from_browser` varchar(200) NOT NULL,
  `from_time` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favourite_videos`
--

INSERT INTO `favourite_videos` (`favourite_video_id`, `favourite_video_uuid`, `user_id`, `video_info_id`, `from_ip`, `from_browser`, `from_time`) VALUES
(7, '3b575b27-b155-4dcd-a20f-8f792add1834', '', '52ff0b28-0baa-4c32-9217-0752c5960b20', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'Wed, 29 Jun 2022 20:03:53 +0530'),
(8, 'd6a6302f-10aa-41ec-84b3-6c4767478684', '0x49e8883b30c482ade14488fd00a6622c9377c366', 'fddb9130-e382-4058-a885-af9ceab9f2c0', '::1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Mobile Safari/537.36', 'Mon, 29 Aug 2022 18:29:24 +0530');

-- --------------------------------------------------------

--
-- Table structure for table `metamask_login`
--

CREATE TABLE `metamask_login` (
  `ID` int(11) NOT NULL,
  `address` varchar(42) NOT NULL,
  `publicName` tinytext DEFAULT NULL,
  `nonce` tinytext DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `first_time_login` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `metamask_login`
--

INSERT INTO `metamask_login` (`ID`, `address`, `publicName`, `nonce`, `created`, `first_time_login`) VALUES
(31, '0xed9b1756dbf760a79547677f598bf001dad50fd1', NULL, '62bd41d706e17', '2022-06-29 10:18:54', ''),
(32, '0x49e8883b30c482ade14488fd00a6622c9377c366', NULL, '63107d4b8c5f9', '2022-08-26 06:18:16', ''),
(33, '0xfdb9621b453957728e8799c26fef850c3e107d6b', NULL, '63451602b25d6', '2022-10-11 07:06:36', '');

-- --------------------------------------------------------

--
-- Table structure for table `video_info`
--

CREATE TABLE `video_info` (
  `video_id` int(20) NOT NULL,
  `video_uuid` varchar(200) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `name` varchar(200) NOT NULL,
  `video_desc` varchar(200) NOT NULL,
  `thumbnail_ipfs` varchar(200) NOT NULL,
  `video_uid` varchar(200) NOT NULL,
  `module` varchar(200) NOT NULL,
  `module_uuid` varchar(200) NOT NULL,
  `more_details` varchar(255) NOT NULL,
  `from_time` varchar(200) NOT NULL,
  `from_browser` varchar(200) NOT NULL,
  `from_ip` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `video_info`
--

INSERT INTO `video_info` (`video_id`, `video_uuid`, `user_address`, `user_type`, `name`, `video_desc`, `thumbnail_ipfs`, `video_uid`, `module`, `module_uuid`, `more_details`, `from_time`, `from_browser`, `from_ip`) VALUES
(22, 'fddb9130-e382-4058-a885-af9ceab9f2c0', '', '', 'What is JASMY: Japan’s First Approved Crypto', 'Jasmy is an organization that develops Internet of Things (IoT) platforms and decentralized data lockers.', 'bafybeibw637dcctdmzb6dnk5y3dvj4yoiisznhspngp367ztvd4p6q2mau', 'aa085fd1-4198-4e05-bece-bd0028a7c647', 'Cryptonite', '927f0965-6eed-462c-bfa0-79867c9f9448', '', '2022-06-25', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '::1'),
(23, '47f5e19b-2d4a-42d5-baa9-576401469d95', '', '', '5 Crypto Research Tools जो बनाएंगे आपकी Trading Smart', 'Trading से पहले हमेशा Research Important होती है, अगर आप भी Crypto मे कर रहे है Investments तो यह ', 'bafybeih3nylvwemdkfaqas57xukp3cqpg3zqweabt2pnoxwqbecmztjxtu', '5e807d18-7b09-4c24-abb7-ef668ff8857a', 'Cryptonext', 'fd3d24bd-8764-494e-9ade-40911b8e11a1', '', '2022-06-25', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '::1'),
(24, '52ff0b28-0baa-4c32-9217-0752c5960b20', '', '', 'Big News: Football Star Cristiano Ronaldo and Binance inks NFT Partnership', 'Crypto exchange Binance partners with Cristiano Ronaldo for NFT push', 'bafybeie3luadbjpf3ybtxtzx2j5mv2nr4urr4o2r4p4svbt2ityxjulhny', '31640887-7147-4336-99e6-124e86a9c27d', 'Cryptonite', '927f0965-6eed-462c-bfa0-79867c9f9448', '', '2022-06-25', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '::1'),
(25, 'ac6cf51c-9ac8-4bd0-a6c8-3c1c01d0bb07', '', '', 'How Can You Make Passive Income Lending Cryptocurrency', 'Nexo, you can earn industry-leading interest on your crypto, borrow against your digital assets, or exchange between hundreds of market pairs', 'bafybeien3liccddalw6sy6dftsl2eneq5efijyexwcfx566ywtlkwaqmeq', '065b3a95-2a61-4300-a353-32eefbbb7d94', 'Cryptonext', 'fd3d24bd-8764-494e-9ade-40911b8e11a1', '', '2022-06-25', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '::1'),
(26, '7b9cb175-ae27-477c-b055-2d918bf7d45d', '', '', 'WazirX Token', 'WRX is WazirX’s native utility token. \nIt is programmed to serve as the backbone \nof the entire WazirX ecosystem', 'bafybeiclhmxoun72gi4h3dd54yvvdyjet73aelnbwomko2fqx5ktqp5vja', '5b3907f2-e114-46b3-aba1-c077dcd447cd', 'Cryptonext', 'fd3d24bd-8764-494e-9ade-40911b8e11a1', '', '2022-06-25', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '::1'),
(27, '9f43d4cc-62e6-46d1-ac2c-90b20b962609', '', '', '#cryptonewstoday : क्या #ShibaInu करेगा 80% पार', 'आज की  #cryptonews में जानिये की...', 'bafybeif6quqizfnr4pd5mlzkwzshbiequmjz2m6hohon3ttlgesnurjvmi', '08ae1204-7588-420d-ada7-1ffcbdf75a7f', 'Cryptonite', '927f0965-6eed-462c-bfa0-79867c9f9448', '', '2022-06-26', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '::1'),
(29, 'bed1667b-4d80-4083-b028-f4a0934608f9', '', '', 'Vechain: What is VeChain? Real-World Applications To The Economy, Project Analysis', 'The VeChain network and its native VET coin have very unique and interesting plans to provide their services to businesses. Can they revolutionize the supply chain industry?', 'bafybeibdlsizaf3ue4fgxti6255nvmsicobwhkccjuk3zynrtkyn4bxnui', '529add58-5f14-4cf4-a843-6199441cf86c', 'Cryptonite', '927f0965-6eed-462c-bfa0-79867c9f9448', '', '2022-06-27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '::1'),
(30, 'ed61d9d7-3b6c-4b0d-98f7-c12f838bfe59', '', '', 'chandan vishwakarma', 'hello this is chandan vishwakarma', 'bafybeie2u52gs3f22xtphlfftltieycj6pnfjqmmk3y4mfsp4lwvxr6uje', '1e584bd9-908c-4144-9aa0-a79b88b87133', '', 'fd3d24bd-8764-494e-9ade-40911b8e11a1', '', '2022-08-30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', '::1'),
(31, '727dc76a-26ce-453e-9311-40847950523c', '', '', 'test video', 'ello this is test video', 'bafybeiexuxz4gyjjxaf5wjyzzwvedzk2nbcg5zghzhok7vhk75zxjjxskm', 'ca54bbab-5f6e-4c9c-95ee-d9d64aac2afd', 'Cryptonext', 'fd3d24bd-8764-494e-9ade-40911b8e11a1', '', '2022-08-31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', '::1'),
(32, '5aa0f0c3-e3a1-4abd-b4fd-0fe50d7db8ac', '', '', 'second video', 'this is secons video', 'bafybeie2u52gs3f22xtphlfftltieycj6pnfjqmmk3y4mfsp4lwvxr6uje', 'null', 'Cryptonext', 'fd3d24bd-8764-494e-9ade-40911b8e11a1', '', '2022-09-02', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', '::1'),
(33, '103124e0-7bd0-43fd-bad5-bce1f9a2d65f', '', '', 'third test ', 'this is third video', 'bafybeiexuxz4gyjjxaf5wjyzzwvedzk2nbcg5zghzhok7vhk75zxjjxskm', 'bafybeidpibdqrk56pfx556or56occoggeyqligdvwcqpyjgwkanxshbate', 'Cryptonite', '927f0965-6eed-462c-bfa0-79867c9f9448', '', '2022-09-02', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', '::1'),
(34, 'b940b7cb-fde7-46b4-8082-91867d76b4f8', '', '', 'four', 'this is four', 'bafybeib6h2sjs6uno4gmaajgavxusegia2xns7ccywzddbkubyje7nypyi', 'bafybeigonlxdu6ya4nshmpllgs3mujeiri7i66tbfme2ttiwv37twm3mzi', 'Cryptonite', '927f0965-6eed-462c-bfa0-79867c9f9448', '', '2022-09-02', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', '::1'),
(35, '3a2c451e-0386-4774-bdf2-4b4845438b4d', '', '', 'video test', 'hello this is test', 'bafybeib6h2sjs6uno4gmaajgavxusegia2xns7ccywzddbkubyje7nypyi', 'bafybeigonlxdu6ya4nshmpllgs3mujeiri7i66tbfme2ttiwv37twm3mzi', 'Cryptonite', '927f0965-6eed-462c-bfa0-79867c9f9448', '', '2022-09-02', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', '::1'),
(36, '5761127f-faa2-4e09-b8f6-b89121842646', '', '', 'five video', 'this is five video', 'bafybeiexuxz4gyjjxaf5wjyzzwvedzk2nbcg5zghzhok7vhk75zxjjxskm', 'bafybeidpibdqrk56pfx556or56occoggeyqligdvwcqpyjgwkanxshbate', 'Cryptonite', '927f0965-6eed-462c-bfa0-79867c9f9448', '', '2022-09-02', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', '::1'),
(37, 'e12ec46f-1243-4b5a-b03a-91a6426a742d', '', '', 'new video', 'hello this is new video thank you', 'bafybeidla67ancc7vh3xhfw3376egbzz7d6z746mdki6howy3zmguq5upi', 'bafybeicxihyr5vwgzyprm5azogonzq63bo6pjg473ayyq65w3rzuf5su64', 'Cryptonite', '927f0965-6eed-462c-bfa0-79867c9f9448', '', '2022-09-02', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', '::1'),
(38, 'd8bb079f-be1f-4297-9485-9d11063c1145', '0xfdb9621b453957728e8799c26fef850c3e107d6b', 'user', 'jhdgsjh 01', 'kjfshh 01', 'https://bafybeiaaycm4zhn4b6ds6g2msjaa2npjz7gbsjrhbwdoskca7jgabi7tma.ipfs.w3s.link', 'https://bafybeicqlb4vr6rkozhe6sruknuhfj3mschscshfyduzjyczplir37z45m.ipfs.w3s.link', 'Cryptonext', 'fd3d24bd-8764-494e-9ade-40911b8e11a1', '/videodetails/d8bb079f-be1f-4297-9485-9d11063c1145', '2022-10-11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '::1'),
(39, '1ced5067-e997-48ec-8b9c-53b7fd91895e', '0xfdb9621b453957728e8799c26fef850c3e107d6b', 'admin', 'My new Video', 'This is my new Video', 'https://bafybeiam6nhk65vxbpppphegvlysfjq72byhgm52bi65xhdzk3yi7ykuua.ipfs.w3s.link/naoh-cova-v4AOxmEeZP8-unsplash.jpg', 'https://bafybeig4mt27fgoxgajno4zhv5qlxtym4horesqohpwjy36p54onmvn7sq.ipfs.w3s.link/4.%20Project%20Demo%20Video.mp4', 'Cryptonite', '927f0965-6eed-462c-bfa0-79867c9f9448', '/videodetails/1ced5067-e997-48ec-8b9c-53b7fd91895e', '2022-10-11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '::1'),
(40, '93915fb2-44db-45ea-9f75-26110be9ac96', '0xfdb9621b453957728e8799c26fef850c3e107d6b', 'admin', 'My new Video', 'This is my new Video', 'https://bafybeia724izwq7yhcvvroiilxulimoovushae63qx2adns5xdn4e5v62u.ipfs.w3s.link/1.png', 'https://bafybeig4mt27fgoxgajno4zhv5qlxtym4horesqohpwjy36p54onmvn7sq.ipfs.w3s.link/4.%20Project%20Demo%20Video.mp4', 'Cryptonite', '927f0965-6eed-462c-bfa0-79867c9f9448', '/videodetails/93915fb2-44db-45ea-9f75-26110be9ac96', '2022-10-11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '::1'),
(41, '17b1cbf2-e6a7-4b57-89ab-58c90fd236e2', '0xfdb9621b453957728e8799c26fef850c3e107d6b', 'admin', 'jksdhkj', 'kdjflk', 'https://bafybeia724izwq7yhcvvroiilxulimoovushae63qx2adns5xdn4e5v62u.ipfs.w3s.link/1.png', 'https://bafybeig4mt27fgoxgajno4zhv5qlxtym4horesqohpwjy36p54onmvn7sq.ipfs.w3s.link/4.%20Project%20Demo%20Video.mp4', 'Cryptonite', '927f0965-6eed-462c-bfa0-79867c9f9448', '/videodetails/17b1cbf2-e6a7-4b57-89ab-58c90fd236e2', '2022-10-11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '::1'),
(42, '23465aa1-33c5-41cb-9515-f99521b6d887', '0xfdb9621b453957728e8799c26fef850c3e107d6b', 'admin', 'jkdshfkjs', 'jdhskjhfk', 'https://bafybeihrlymiwu7bpsqfvjvoh275uro5gbouqwxrs5vdr4lmmfek7fpesa.ipfs.w3s.link/arnold-francisca-f77Bh3inUpE-unsplash.jpg', 'https://bafybeig4mt27fgoxgajno4zhv5qlxtym4horesqohpwjy36p54onmvn7sq.ipfs.w3s.link/4.%20Project%20Demo%20Video.mp4', 'Cryptonite', '927f0965-6eed-462c-bfa0-79867c9f9448', '/videodetails/23465aa1-33c5-41cb-9515-f99521b6d887', '2022-10-11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '::1'),
(43, '423e2ac1-4f3d-4569-b777-128495850f24', '0xfdb9621b453957728e8799c26fef850c3e107d6b', 'admin', 'Eth', 'Eth', 'https://bafybeihrlymiwu7bpsqfvjvoh275uro5gbouqwxrs5vdr4lmmfek7fpesa.ipfs.w3s.link/arnold-francisca-f77Bh3inUpE-unsplash.jpg', 'https://bafybeig4mt27fgoxgajno4zhv5qlxtym4horesqohpwjy36p54onmvn7sq.ipfs.w3s.link/4.%20Project%20Demo%20Video.mp4', 'Cryptonite', '927f0965-6eed-462c-bfa0-79867c9f9448', '/videodetails/423e2ac1-4f3d-4569-b777-128495850f24', '2022-10-11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `id` int(11) NOT NULL,
  `user_ip` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `time` time NOT NULL DEFAULT current_timestamp(),
  `from_browser` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`id`, `user_ip`, `date`, `time`, `from_browser`) VALUES
(1, '::1', '2022-10-11', '13:03:23', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donate_eth`
--
ALTER TABLE `donate_eth`
  ADD PRIMARY KEY (`donate_id`);

--
-- Indexes for table `dual_auth`
--
ALTER TABLE `dual_auth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favourite_videos`
--
ALTER TABLE `favourite_videos`
  ADD PRIMARY KEY (`favourite_video_id`);

--
-- Indexes for table `metamask_login`
--
ALTER TABLE `metamask_login`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `address` (`address`);

--
-- Indexes for table `video_info`
--
ALTER TABLE `video_info`
  ADD PRIMARY KEY (`video_id`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donate_eth`
--
ALTER TABLE `donate_eth`
  MODIFY `donate_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `dual_auth`
--
ALTER TABLE `dual_auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `favourite_videos`
--
ALTER TABLE `favourite_videos`
  MODIFY `favourite_video_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `metamask_login`
--
ALTER TABLE `metamask_login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `video_info`
--
ALTER TABLE `video_info`
  MODIFY `video_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
