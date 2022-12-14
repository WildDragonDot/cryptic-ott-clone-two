-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2022 at 11:40 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crypto-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_info`
--

CREATE TABLE `enquiry_info` (
  `enquiry_id` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `message` varchar(200) NOT NULL,
  `from_ip` varchar(200) NOT NULL,
  `from_browser` varchar(200) NOT NULL,
  `from_time` varchar(200) NOT NULL,
  `id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enquiry_info`
--

INSERT INTO `enquiry_info` (`enquiry_id`, `name`, `email`, `phone`, `address`, `message`, `from_ip`, `from_browser`, `from_time`, `id`) VALUES
('0b11e36b-21c9-4553-8ae3-4d96c915d566', 'aarya sharma', 'vishwakarmachandan336@gmail.com', '9565656500', 'new varanasi, india, india, india', 'dda', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', 'Tue, 23 Aug 2022 18:14:34 +0530', 1),
('5450cdac-ccbd-4b90-8cd9-7d23fd97bd1f', 'aarya sharma', 'vishwakarmachandan336@gmail.com', '9565656500', 'new varanasi, india, india, india', 'dda', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', 'Tue, 23 Aug 2022 18:15:00 +0530', 2),
('c85c45fa-fd9f-4a19-9216-07adda5ff00f', 'aarya sharma', 'vishwakarmachandan336@gmail.com', '9857412303', 'new varanasi, india, india, india', 'dsff', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', 'Tue, 23 Aug 2022 18:15:19 +0530', 3);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favourite_videos`
--

INSERT INTO `favourite_videos` (`favourite_video_id`, `favourite_video_uuid`, `user_id`, `video_info_id`, `from_ip`, `from_browser`, `from_time`) VALUES
(1, 'c5763013-31b9-4059-a500-6c426e4e24fa', '0x49e8883b30c482ade14488fd00a6622c9377c366', 'bed1667b-4d80-4083-b028-f4a0934608f9', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', 'Sat, 20 Aug 2022 15:41:04 +0530'),
(2, '95a80a46-d847-4eba-946e-e4adcce00206', '0x49e8883b30c482ade14488fd00a6622c9377c366', '9f43d4cc-62e6-46d1-ac2c-90b20b962609', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', 'Sat, 20 Aug 2022 15:41:10 +0530'),
(3, 'a4a51305-f0c3-44fa-9d33-7e3fdc89aa15', '0x49e8883b30c482ade14488fd00a6622c9377c366', '7b9cb175-ae27-477c-b055-2d918bf7d45d', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', 'Sat, 20 Aug 2022 15:41:13 +0530'),
(4, '69e90981-79a9-4234-88f6-aff3c3e88a50', '0x49e8883b30c482ade14488fd00a6622c9377c366', 'ac6cf51c-9ac8-4bd0-a6c8-3c1c01d0bb07', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', 'Sat, 20 Aug 2022 15:41:17 +0530'),
(5, 'cd26bc6a-8e48-4beb-88c5-14850e85cefb', '0x49e8883b30c482ade14488fd00a6622c9377c366', '0ada9a87-8a5d-4702-b4bb-95e5aa37cb44', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', 'Mon, 22 Aug 2022 17:37:36 +0530'),
(6, '53e781b1-c721-4bd2-a995-e43e2fda406a', '0x0729aaf5757658bdab03ce2b2d76c06089462ba0', 'addb9130-e382-4058-a885-af9ceab9f2c3', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 'Mon, 31 Oct 2022 15:49:03 +0530'),
(7, '0a1920ad-f018-4f19-adf1-560b9347480d', '0x0729aaf5757658bdab03ce2b2d76c06089462ba0', 'fddb9130-e382-4058-a885-af9ceab9f2c0', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 'Mon, 31 Oct 2022 15:52:05 +0530');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `metamask_login`
--

INSERT INTO `metamask_login` (`ID`, `address`, `publicName`, `nonce`, `created`, `first_time_login`) VALUES
(33, '0x49e8883b30c482ade14488fd00a6622c9377c366', NULL, '6358edd701ed3', '2022-08-19 07:30:14', ''),
(34, '0x89e871fe547ea99bdcc8480ed036f99dfa76beb7', NULL, '633bf7cb35d16', '2022-10-04 09:07:20', ''),
(35, '0x0729aaf5757658bdab03ce2b2d76c06089462ba0', NULL, '6362184d40b0d', '2022-10-26 08:28:54', '');

-- --------------------------------------------------------

--
-- Table structure for table `video_info`
--

CREATE TABLE `video_info` (
  `video_id` int(20) NOT NULL,
  `video_uuid` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `video_desc` varchar(200) NOT NULL,
  `thumbnail_ipfs` varchar(200) NOT NULL,
  `video_uid` varchar(200) NOT NULL,
  `module_uuid` varchar(200) NOT NULL,
  `module` varchar(200) NOT NULL,
  `subscription_type` varchar(200) NOT NULL,
  `video_view` bigint(50) NOT NULL,
  `youtube_trailer` varchar(200) NOT NULL,
  `from_time` varchar(200) NOT NULL,
  `from_browser` varchar(200) NOT NULL,
  `from_ip` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `video_info`
--

INSERT INTO `video_info` (`video_id`, `video_uuid`, `name`, `video_desc`, `thumbnail_ipfs`, `video_uid`, `module_uuid`, `module`, `subscription_type`, `video_view`, `youtube_trailer`, `from_time`, `from_browser`, `from_ip`) VALUES
(34, 'd4f1aaae-1e14-4253-b7a3-7f23c1b7e171', 'I Just Got Tellor |Cryptic Entertainments Orignal', 'It\'s hard to find happiness in the world,\r\nbut when you get it,\r\nThere is no better moment than that. \r\n\r\nThis is the same exact feeling you will get,\r\nOnce you get Tellor too you feel the same\r\n\r\nAnd', 'bafybeidla67ancc7vh3xhfw3376egbzz7d6z746mdki6howy3zmguq5upi', 'https://bafybeia73rv42cfmwlyakour2nnkk2vyrvnilgkfxssjrrx5n56o5w2rty.ipfs.w3s.link/1.mp4', 'f9c5310f-f75f-4217-a0d9-af3891c40531', 'Music', 'early access', 237, 'https://www.youtube.com/watch?v=Qoc_dE0otKA', 'Sat, 20 Aug 2022 06:49:13pm', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', '::1'),
(35, '3a3dde22-e040-4132-a0a0-3939d867c3c9', 'EPNS Aayega ft. Litesh Gumber, Shubham Semwal', '#Defi se kya Kamaayega?🔔\r\nKaun bola ab Notify na ho payega?\r\nKyunki Apna #EPNS aayega\r\n\r\nPresenting to you \"EPNS Aayega\"', 'bafybeidmto6l4naaxzkr67arqs7sms4a5gukjdg4awupc2gkeay3yxbq6a', 'https://bafybeihvg5xhczjeirlbglopyvbqtr4cb2flqds3sxfby4bfkxqg2ohy3i.ipfs.w3s.link/2.mp4', 'f9c5310f-f75f-4217-a0d9-af3891c40531', 'Music', 'early access', 19, 'https://www.youtube.com/watch?v=TzgOFnXub3c', 'Mon, 22 Aug 2022 11:11:24am', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', '::1'),
(36, '37e05307-655a-4c9c-8e38-54b2127f1f4c', 'This is Tellor | Halloween 2021 Special |', 'We have prepared a Special Treat for you with  @Tellor &\r\nWatch now our Latest Original \"This is Tellor\" \r\nThis #halloween2021 we tried to recreate the magic gifted 39 years ago by the Musical Oracles', 'bafybeibrjjoxnpixrlp7ne265iel4fltdhjffw6uj25zifrjr4no3qyxue', 'https://bafybeibcoitxuh4tgabd3qi6f5b3ctefwkcp4zvcc3hrqevglzizzsnimq.ipfs.w3s.link/3.mp4', 'f9c5310f-f75f-4217-a0d9-af3891c40531', 'Music', 'early access', 16, 'https://www.youtube.com/watch?v=ByeoJLeygmo', 'Mon, 22 Aug 2022 11:16:47am', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', '::1'),
(37, '16aab4a8-48b5-41af-a923-928a763cc3e6', 'The IOST Anthem | ft. Litesh Gumber, Semwal & Sparsh Dangwal', 'One friend has everything in his life,\r\nAnd the other has nothing.\r\nBut he is happier than the first one.....\r\nConfused🤔\r\nHow this can be possible?\r\nI was confused too but then...\r\nI listen to this 🎶 ', 'bafybeiexuxz4gyjjxaf5wjyzzwvedzk2nbcg5zghzhok7vhk75zxjjxskm', 'https://bafybeiavd4bw2z5qacukcmwe3jswld5un7shqsa5rj2arvx5tvj3clftxy.ipfs.w3s.link/4.mp4', 'f9c5310f-f75f-4217-a0d9-af3891c40531', 'Music', 'early access', 1, 'https://www.youtube.com/watch?v=uACi_Q3i7vs', 'Mon, 22 Aug 2022 11:19:31am', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', '::1'),
(38, '1281f93a-0667-4660-b4c5-2919e9c46ad1', 'Just Use Polygon ft. Litesh Gumber, Semwal & Sparsh Dangwal', 'Are You Tired of High Gas Fees?!☹️\r\nAre You Tired of Paying the Blockchain More than the Dapp?! 😩\r\nWhy Don\'t You Just Use Polygon … !!!!!😀\r\nThis Music Video Perfectly describes any Defi Explorer\'s Str', 'bafybeie2u52gs3f22xtphlfftltieycj6pnfjqmmk3y4mfsp4lwvxr6uje', 'https://bafybeiartmsvqjbkignc2ref62764wsdnv6apc7b6cbfq3jpq3ahdvhane.ipfs.w3s.link/5.mp4', 'f9c5310f-f75f-4217-a0d9-af3891c40531', 'Music', 'early access', 8, 'https://www.youtube.com/watch?v=lH2dyN8-RBs', 'Mon, 22 Aug 2022 11:23:08am', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', '::1'),
(39, '162a6965-5982-4bc8-8c15-3b34c2d25d09', 'DeFi on Lofi ft. Semwal & Litesh Gumber', 'Our love for the LoFi music genre and crypto forced us to create this crypto original for the community. We traded crypto while listening to the Lofi beats, if you are one of us who loves music and cr', 'bafybeib6h2sjs6uno4gmaajgavxusegia2xns7ccywzddbkubyje7nypyi', 'https://bafybeifpd3r3d4jhipztrzbvjhrelbkgyh3fyj7kqjmyb2eufwglr4i4sm.ipfs.w3s.link/6.mp4', 'f9c5310f-f75f-4217-a0d9-af3891c40531', 'Music', 'early access', 29, 'https://www.youtube.com/watch?v=RIc3JzsEUpY', 'Mon, 22 Aug 2022 11:26:56am', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', '::1'),
(40, 'ca8ba836-f3f9-456c-a6fe-fb464fd1956c', 'DeFi on Lofi | Teaser 1 | Nischal Shetty on DeFi | WazirX | Cryptic Entertainments', 'Decentralized Finance is all about building an ecosystem where you can deal with anyone or any other company and anywhere in the world and you don\'t need to trust them - Nischal Shetty (Founder - Wazi', 'bafybeiaxocedh5kacojmlpvghdcabejjhgymflhf44ckjnswc4sfequjxi', 'https://bafybeihclzegrjzrztshnm4jr6mxum47eb3zmduqlolicfidx26oq5ck44.ipfs.w3s.link/ipfs/bafybeihclzegrjzrztshnm4jr6mxum47eb3zmduqlolicfidx26oq5ck44/7.mp4', 'd8b06f66-bf4f-4244-822f-4378b0f0c9a4', 'Teasers', 'early access', 0, 'https://www.youtube.com/watch?v=1XNQSXHnOy0', 'Mon, 22 Aug 2022 11:37:26am', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', '::1'),
(41, '4c1e840d-5c86-4436-bdb7-c53be368f4a5', 'Just Use Polygon ft. Litesh Gumber, Semwal & Sparsh Dangwal | The Polygon Song', 'Stay Tuned for the Complete Music Video, Releasing soon!\r\n\r\nAre you tried of high gas fees and want a solution that will help you solve this problem?  Here is the solution to all your problems \"JUST U', 'bafybeialcow66ouzao6panucypw4m7o56nh7oedxeksgd7j3y2nxbi7p44', 'https://bafybeiats5vmuugxyr3wr4335s4pilmtcm4kl2zise66ry4nq5n6fbzt4q.ipfs.w3s.link/ipfs/bafybeiats5vmuugxyr3wr4335s4pilmtcm4kl2zise66ry4nq5n6fbzt4q/8.mp4', 'd8b06f66-bf4f-4244-822f-4378b0f0c9a4', 'Teasers', 'early access', 1, 'https://www.youtube.com/watch?v=fJRQg74h0DY', 'Mon, 22 Aug 2022 11:38:36am', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', '::1'),
(42, '0d4ff417-78d1-42c8-83c1-0c14f1137569', '#INDIAWANTSCRYPTO | Official Trailer | Cryptic Entertainments', 'Full Documentary Coming Soon\r\n\r\nDo you know that 2 years ago crypto trading in India was not so easy as today in 2017 India put a banking ban on crypto and many crypto holders lose their assets or som', 'bafybeigui7x2wq54klpztrgzhv4b3zdadooobjev2wjnz7lz7ibnqzuv2e', 'https://bafybeiaqff7jhmdgswswanxd7v3pzieqwlbrgspw2aea2vda2t6rihdnwu.ipfs.w3s.link/ipfs/bafybeiaqff7jhmdgswswanxd7v3pzieqwlbrgspw2aea2vda2t6rihdnwu/9.mp4', 'd8b06f66-bf4f-4244-822f-4378b0f0c9a4', 'Teasers', 'early access', 0, 'https://www.youtube.com/watch?v=l19zTOAAWLI', 'Mon, 22 Aug 2022 11:41:17am', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', '::1'),
(43, '6a6f55ef-7dcc-4592-9fec-6423afbd8ede', 'Official IOST Anthem Teaser Trailer | A Cryptic Entertainments Original', 'Stay Tuned for the Complete Music Video, Releasing soon!\r\n\r\nDo you have everything , but Still feel empty inside?\r\nYou my Friend Need some IOST in your Life\r\n\r\nThe Official IOST Anthem will be Droppin', 'bafybeifrv2wpfl3yo3pqmwx4hrozfhbxde7wb4mvn5amuf6he7lk5m74ea', 'https://bafybeidy6oyp4owgvd32xfvnf2gmuzfgobyf57hnvi3c6bvizwfllnyw7a.ipfs.w3s.link/ipfs/bafybeidy6oyp4owgvd32xfvnf2gmuzfgobyf57hnvi3c6bvizwfllnyw7a/10.mp4', 'd8b06f66-bf4f-4244-822f-4378b0f0c9a4', 'Teasers', 'early access', 0, 'https://www.youtube.com/watch?v=lh3I5dRscuE', 'Mon, 22 Aug 2022 11:42:36am', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', '::1'),
(44, 'f6522396-b319-4e1f-9500-cdeb00bebffc', 'Own a Piece of Indian Cricket History Today, With India\'s Most Authentic Bollywood NFT Platform', 'Presenting to you the exclusive NFT Collection of the Hit movie 83\r\nVisit the Platform now and claim your piece of History at:  https://nft.socialswag.com/\r\n\r\nOn 25th of June 1983,\r\nThe Lord’s Cricket', 'bafybeidz2bjjv7ujqblxzuxe4v6wiqqioo76pwd64gzclzmojso7c5wd5e', 'https://bafybeicpizsiqjby73ruorlnmqtnoyfosujbfcwoefovmxaswqcpd3uube.ipfs.w3s.link/11.mp4', 'd8b06f66-bf4f-4244-822f-4378b0f0c9a4', 'Teasers', 'early access', 0, 'https://www.youtube.com/watch?v=tK-M7yP6k1s', 'Mon, 22 Aug 2022 11:43:58am', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', '::1'),
(45, '160e30ec-63cb-4343-90ef-862cd0f4253e', 'ZKSpace: Layer 2 For All | Official Music Video Trailer | Cryptic Entertainments Original', 'Everyday I wake up and pray to God, \r\nLow gas fees, Low gas fees \r\n\r\nWell, No need to pray more!\r\nZKSpace is here to solve all your problems. \r\nSo let\'s watch the ZKSpace (Layer 2 for all) full music ', 'bafybeibk2br2pmieuff4tklahobe2izt73zd7dkd2x4pux3dafvfbuct7u', 'https://bafybeihgqtqhi3h4i2qhn23bpyksogr3ritgkanpaeopxkfe54zbkahxse.ipfs.w3s.link/12.mp4', 'd8b06f66-bf4f-4244-822f-4378b0f0c9a4', 'Teasers', 'early access', 0, 'https://www.youtube.com/watch?v=vd9Ws329gOc', 'Mon, 22 Aug 2022 11:45:23am', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', '::1'),
(46, '612836fc-e593-4ed7-90d8-7253da07a5bf', 'Here\'s a sneak peek of our latest shoot. Stay Tuned!! 🎵🔥👀', 'Follow us on Twitter:\r\nhttps://twitter.com/Cryptic_Media', 'bafybeiaiybrtwreyi6a2n5tvc27s2ttiflq4yo5uuh5ywpf6tpeiwxwopq', 'https://bafybeifjwho2c3xhwmv4gd7mszlkng7mpbtypusbmh2clbbljq6avi4hxy.ipfs.w3s.link/ipfs/bafybeifjwho2c3xhwmv4gd7mszlkng7mpbtypusbmh2clbbljq6avi4hxy/13.mp4', 'd8b06f66-bf4f-4244-822f-4378b0f0c9a4', 'Teasers', 'early access', 0, 'https://www.youtube.com/watch?v=1aaQcqPKYtg', 'Mon, 22 Aug 2022 11:46:35am', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', '::1'),
(47, '34077e18-cf46-4755-93df-0861c3c59bca', 'Presenting #DoMoreWithDefi 🎵👀| Coming Super Soon !🔥🔥 | #Defi #cryptocurrency', 'Follow us on Twitter:\r\nhttps://twitter.com/Cryptic_Media', 'bafybeibvbnghrwfdv6odfztsof4yg36zcfs7wj5kqteqrxpfe5efuc63dq', 'https://bafybeic5boelbw6w3skkhfu6e3esclj3nmxxtuoa65s4wmew3nkfigjuqq.ipfs.w3s.link/ipfs/bafybeic5boelbw6w3skkhfu6e3esclj3nmxxtuoa65s4wmew3nkfigjuqq/14.mp4', 'd8b06f66-bf4f-4244-822f-4378b0f0c9a4', 'Teasers', 'early access', 0, 'https://www.youtube.com/watch?v=rrHZHbmmJ9M', 'Mon, 22 Aug 2022 11:48:37am', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', '::1'),
(48, 'c33ef234-2058-4a06-b0eb-5bf4b20a5636', 'India\'s First Ever Metaverse Concert| Enjoy Cryptic Orginals on #Metaverse', 'The Future is here,\r\nCryptic Entertainments presents to You\r\nIndia\'s First Metaverse Concert\r\nNow you too can enjoy it.', 'bafybeib43febuxntgrmvu7eh2gvzmwe6lv5mj4x6cywsahpl43jxy3sqp4', 'https://bafybeia37s2zl5r2gu4xun4io57kw4znsfyasg7m6wahxekh3ndhol6lli.ipfs.w3s.link/ipfs/bafybeia37s2zl5r2gu4xun4io57kw4znsfyasg7m6wahxekh3ndhol6lli/15.mp4', 'b48f9720-f5f9-434f-9b73-8693a9c0dc34', 'Metaverse', 'early access', 10, 'https://www.youtube.com/watch?v=9Sa16lDGiR8', 'Mon, 22 Aug 2022 12:10:03pm', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', '::1'),
(49, 'f6fc229b-03ec-4c2a-a411-3beca876cf55', 'Exclusive Interview with @NDTV Covered India\'s First Metaverse Concert', 'Check out our exclusive interview with @ndtv \r\nWhere we share our views about Metaverse, Blockchain and how we became the first Indian\'s to organise a Concert in the metaverse.', 'bafybeigcknrompw27tgnwlmpfktmztbgbpvs5vmhhqixdah27ce4xqbq4y', 'https://bafybeickrfzyxboohj4mcpyv5aj2faknxrmvaggmxfg4hdalxjj3egekde.ipfs.w3s.link/ipfs/bafybeickrfzyxboohj4mcpyv5aj2faknxrmvaggmxfg4hdalxjj3egekde/16.mp4', 'b48f9720-f5f9-434f-9b73-8693a9c0dc34', 'Metaverse', 'early access', 2, 'https://www.youtube.com/watch?v=eT_9SK3xM7M', 'Mon, 22 Aug 2022 12:38:29pm', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', '::1'),
(50, '0ada9a87-8a5d-4702-b4bb-95e5aa37cb44', 'Exclusive Interview with @NDTV India Covered India\'s First Metaverse Concert', 'Check out our exclusive interview with @NDTV India \r\nWhere we share our views about Metaverse, Blockchain and how we became the first Indian\'s to organise a Concert in the metaverse.', 'bafybeih67n5bmbgdh3iuvyqj7xdaunsyvtw7zo5sxdnnw75k6wl3biu2ou', 'https://bafybeicqbvtwe6ezxctzs56olhll6kx43lbl7ijdmqk5mtdbytyy4ax3p4.ipfs.w3s.link/ipfs/bafybeicqbvtwe6ezxctzs56olhll6kx43lbl7ijdmqk5mtdbytyy4ax3p4/17.mp4', 'b48f9720-f5f9-434f-9b73-8693a9c0dc34', 'Metaverse', 'early access', 31, 'https://www.youtube.com/watch?v=Xaidk4rMaFY', 'Mon, 22 Aug 2022 12:56:41pm', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `web-series-episodes-info`
--

CREATE TABLE `web-series-episodes-info` (
  `video_id` int(20) NOT NULL,
  `video_uuid` varchar(200) NOT NULL,
  `web_series_uuid` varchar(200) NOT NULL,
  `name_of_episode` varchar(200) NOT NULL,
  `video_desc` varchar(200) NOT NULL,
  `thumbnail_ipfs` varchar(200) NOT NULL,
  `video_uid` varchar(200) NOT NULL,
  `module_uuid` varchar(200) NOT NULL,
  `module` varchar(200) NOT NULL,
  `episode_no` int(255) NOT NULL,
  `subscription_type` varchar(200) NOT NULL,
  `video_view` bigint(50) NOT NULL,
  `from_time` varchar(200) NOT NULL,
  `from_browser` varchar(200) NOT NULL,
  `from_ip` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `web-series-episodes-info`
--

INSERT INTO `web-series-episodes-info` (`video_id`, `video_uuid`, `web_series_uuid`, `name_of_episode`, `video_desc`, `thumbnail_ipfs`, `video_uid`, `module_uuid`, `module`, `episode_no`, `subscription_type`, `video_view`, `from_time`, `from_browser`, `from_ip`) VALUES
(1, 'fddb9130-e382-4058-a885-af9ceab9f2c0', 'addb9130-e382-4058-a885-af9ceab9f2c3', 'Episode 1', 'This is first episode', 'bafybeidla67ancc7vh3xhfw3376egbzz7d6z746mdki6howy3zmguq5upi', 'https://bafybeihvr43b5z3wt6nwwv2irmheeddruqd6twe233y6aquf4aqoyufi4e.ipfs.w3s.link/What%20is%20JASMY%20Japan%20First%20Approved%20Crypto.mp4', 'b9b5310f-f75f-4217-a0d9-af3891c4087', 'episode', 1, 'super', 8, 'Sat, 20 Aug 2022 06:49:13pm', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', '::1'),
(2, '3a3dde22-e040-4132-a0a0-3939d867c3c9', 'addb9130-e382-4058-a885-af9ceab9f2c3', 'Episode 2', 'This is first episode', 'bafybeidmto6l4naaxzkr67arqs7sms4a5gukjdg4awupc2gkeay3yxbq6a', 'https://bafybeiaqwlz6e6rqz7itt4udsvm3bp4pqy5jh6s2j25yxry4pzwuykuywa.ipfs.w3s.link/5%20Crypto%20Research%20Tools%20जो%20बनाएंगे%20आपकी%20Trading%20Smart.mp4', 'b9b5310f-f75f-4217-a0d9-af3891c4087', 'episode', 2, 'super', 3, 'Sat, 20 Aug 2022 06:49:13pm', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', '::1'),
(3, 'ac6cf51c-9ac8-4bd0-a6c8-3c1c01d0bb07', 'addb9130-e382-4058-a885-af9ceab9f2c3', 'Episode 3', 'This is an episode', 'bafybeibrjjoxnpixrlp7ne265iel4fltdhjffw6uj25zifrjr4no3qyxue', 'https://bafybeifv3tpsgvkshhcdilqowxk2rhheyeu3tosmrvvj5qczqwo2473nvi.ipfs.w3s.link/How%20Can%20You%20Make%20Passive%20Income%20Lending%20Cryptocurrency.mp4', 'b9b5310f-f75f-4217-a0d9-af3891c4087', 'episode', 3, 'super', 1, 'Sat, 23 Aug 2022 06:49:13pm', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', '::1'),
(4, 'bed1667b-4d80-4083-b028-f4a0934608f9', 'fed1667b-4d80-4083-b028-f4a0934608f8', 'episode 1', 'This is an episode', 'bafybeiexuxz4gyjjxaf5wjyzzwvedzk2nbcg5zghzhok7vhk75zxjjxskm', 'https://bafybeigljnjaoxcmuj67bwvf6wmn2gy3u3p3fbwhwq3t2427p35t7mbsmy.ipfs.w3s.link/Vechain%20What%20is%20VeChain%20Real-World%20Applications%20To%20The%20Economy,%20Project%20Analysis.mp4', 'b9b5310f-f75f-4217-a0d9-af3891c4087', 'episode', 1, 'super', 4, 'Sat, 25 Aug 2022 06:49:13pm', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `web_series_info`
--

CREATE TABLE `web_series_info` (
  `web_series_id` int(20) NOT NULL,
  `web_series_uuid` varchar(200) NOT NULL,
  `name_of_web_series` varchar(200) NOT NULL,
  `web_series_thumb` varchar(200) NOT NULL,
  `web_series_desc` varchar(200) NOT NULL,
  `module_uuid` varchar(200) NOT NULL,
  `module` varchar(200) NOT NULL,
  `subscription_type` varchar(200) NOT NULL,
  `token_id` varchar(200) NOT NULL,
  `from_time` varchar(200) NOT NULL,
  `from_browser` varchar(200) NOT NULL,
  `from_ip` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `web_series_info`
--

INSERT INTO `web_series_info` (`web_series_id`, `web_series_uuid`, `name_of_web_series`, `web_series_thumb`, `web_series_desc`, `module_uuid`, `module`, `subscription_type`, `token_id`, `from_time`, `from_browser`, `from_ip`) VALUES
(1, 'addb9130-e382-4058-a885-af9ceab9f2c3', 'Money Heist', 'bafybeidla67ancc7vh3xhfw3376egbzz7d6z746mdki6howy3zmguq5upi', 'This is first episode', 'f9c5310f-f75f-4217-a0d9-af3891c40532', 'Web Series', 'super', '0xa2d9ded6115b7b7208459450d676f0127418ae7a:35330667205828808645805771972788148449949166894449166732923665699564597280769', 'Sat, 20 Aug 2022 06:49:13pm', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', '::1'),
(2, 'fed1667b-4d80-4083-b028-f4a0934608f8', 'Dark', 'bafybeie2u52gs3f22xtphlfftltieycj6pnfjqmmk3y4mfsp4lwvxr6uje', 'This is an episode', 'f9c5310f-f75f-4217-a0d9-af3891c40532', 'Web Series', 'super', '0xa2d9ded6115b7b7208459450d676f0127418ae7a:35330667205828808645805771972788148449949166894449166732923665699564597280769', 'Sat, 25 Aug 2022 06:49:13pm', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', '::1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `enquiry_info`
--
ALTER TABLE `enquiry_info`
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
-- Indexes for table `web-series-episodes-info`
--
ALTER TABLE `web-series-episodes-info`
  ADD PRIMARY KEY (`video_id`);

--
-- Indexes for table `web_series_info`
--
ALTER TABLE `web_series_info`
  ADD PRIMARY KEY (`web_series_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enquiry_info`
--
ALTER TABLE `enquiry_info`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `favourite_videos`
--
ALTER TABLE `favourite_videos`
  MODIFY `favourite_video_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `metamask_login`
--
ALTER TABLE `metamask_login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `video_info`
--
ALTER TABLE `video_info`
  MODIFY `video_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `web-series-episodes-info`
--
ALTER TABLE `web-series-episodes-info`
  MODIFY `video_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `web_series_info`
--
ALTER TABLE `web_series_info`
  MODIFY `web_series_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
