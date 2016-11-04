-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2016 at 05:59 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `info230_sp16_jao57sp16`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `iID` int(11) NOT NULL AUTO_INCREMENT,
  `iName` varchar(50) NOT NULL,
  `GroupName` varchar(50) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `URL` varchar(50) NOT NULL,
  `Credit` varchar(255) NOT NULL,
  PRIMARY KEY (`iID`),
  KEY `iCredit` (`Credit`),
  FULLTEXT KEY `Credit` (`Credit`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`iID`, `iName`, `GroupName`, `Gender`, `URL`, `Credit`) VALUES
(1, 'APink White Dresses', 'APink', 'Female', '../images/apink1.jpg', 'http://1.soompi.io/wp-content/uploads/2015/04/apink-luv-jpn-1.jpg'),
(2, 'Infinite White & Black', 'Infinite', 'Male', '../images/infinite1.jpg', 'http://i1.wp.com/seoulbeats.com/wp-content/uploads/2015/03/150301_seoulbeats_infinite.jpg?resize=620%2C500'),
(3, 'Infinite Dance Party', 'Infinite', 'Male', '../images/infinite2.jpg', 'http://www.ifnt7.com/images/main_bg2.jpg'),
(4, 'APink Group Photo', 'APink', 'Female', '../images/apink3.jpg', 'http://i.imgur.com/ZQhhxuB.jpg'),
(5, 'LUV Cover', 'APink', 'Female', '../images/apink2.jpg', 'https://fanart.tv/fanart/music/9102bdf6-b03e-4470-9f78-12127c4995cc/artistbackground/apink-5460ed5e0b336.jpg'),
(6, 'Infinite Prep', 'Infinite', 'Male', '../images/infinite3.jpg', 'http://www.kmc-radio.fr/wp-content/uploads/2013/08/infinite_688811.jpg'),
(7, 'SNSD Street', 'SNSD', 'Female', '../images/snsd2.jpg', 'http://cdn.playbuzz.com/cdn/209ba42e-5b39-4f8c-8b2b-3bab50db4136/b64190cf-3e3a-4d21-83b7-f98df72fecd9.jpg'),
(8, 'SNSD Awards Show', 'SNSD', 'Female', '../images/snsd1.jpg', 'http://3.bp.blogspot.com/-LGeCVeCyQ08/VaoKZsP8CoI/AAAAAAAAsKY/9JYXh8ndrsc/s640/snsd%2Bgroup%2Bpicture%2Bmusic%2Bcore%2Bparty%2Bwin.jpg'),
(9, 'SNSD Cover', 'SNSD', 'Female', '../images/snsd3.jpg', 'http://fc03.deviantart.net/fs70/i/2013/055/3/0/snsd_the_boys_wallpaper_by_awesmatasticaly_cool-d5w5hcf.png'),
(10, 'IU Hoodie', 'None', 'Female', '../images/iu2.jpg', 'http://0.soompi.io/wp-content/uploads/2013/05/iu_main-e1368805397609.jpg'),
(11, 'IU Eating Heart', 'None', 'Female', '../images/iu1.png', 'http://1.soompi.io/wp-content/uploads/2013/10/Screen-Shot-2013-10-19-at-5.47.19-PM.png'),
(12, 'IU Singing With Guitar', 'None', 'Female', '../images/iu3.jpg', 'http://images.kpopstarz.com/data/images/full/2597/iu-singing-in-japan.jpg'),
(13, 'Ailee with Award', 'None', 'Female', '../images/ailee2.png', 'http://41.media.tumblr.com/f149bce42611217283bb4dc954fae97b/tumblr_ng0cd73s3H1qhtg9lo1_500.png'),
(14, 'Ailee Pose', 'None', 'Female', '../images/ailee1.png', 'http://officiallykmusic.com/wp-content/uploads/2014/10/ailee_beyonce-2.png'),
(16, 'Big Bang Group Photo', 'Big Bang', 'Male', '../images/bigbang1.jpg', 'http://entervrexworld.files.wordpress.com/2011/07/big-bang.jpg'),
(17, 'Big Bang Falling', 'Big Bang', 'Male', '../images/bigbang2.jpg', 'http://1.soompi.io/wp-content/uploads/8/k/af/486728/486728.jpg'),
(18, 'Big Bang Phones', 'Big Bang', 'Male', '../images/bigbang3.jpg', 'http://cfile10.uf.tistory.com/image/115B9D444DBD4A33128953'),
(25, 'Pink Memory', 'APink', 'Female', '../images/pink.jpg', 'http://www.kfashionista.com/wp-content/uploads/20150721_kfashionista_apink2.jpg'),
(26, 'Akdong Cover', 'Akdong Musician', 'None', '../images/akdong.jpg', 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxQTEhUUExQWFhUXGRcYFxgYGBgaHRoeHBwXHhgYHBgYHCggGB0lHBcXITEhJSksLi4uFx8zODMsNygtLisBCgoKDg0OGxAQGzQkICQsLDcsLywsLCwsLCwsLCwsLCwsLCwvLCwsLCwsL'),
(28, 'IU Posing', 'None', 'Female', '../images/iu.jpg', 'http://www.billboard.com/files/styles/article_main_image/public/media/iu-kpop-may-2015-billboard-650.jpg'),
(29, 'Infinite Old', 'Infinite', 'Male', '../images/infinite.jpg', 'http://images4.fanpop.com/image/photos/24100000/Wallpaper-infinite-EC-9D-B8-ED-94-BC-EB-8B-88-ED-8A-B8-24150974-1200-892.jpg'),
(30, 'Girls Day Blue Dress', 'Girls Day', 'Female', '../images/girlsday2.jpg', 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxITEhUTExMWFhUWGBgaGBgXGRgdGBkYFx0aGBoYFxgaICggGB0lGx8YITEiJSkrLi4uGCAzODMsNygtLi4BCgoKDg0OGxAQGzUlICUtLTUtLS0tLy0tLy0tLS0vLS0tLy0tLS0tLS0tL'),
(31, 'Vixx with Drinks', 'Vixx', 'Male', '../images/vixx.jpg', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQfl_H_Gq7z5HWmMhb5Q0cdO62LhiIu7LY1HjviHxp6t9e71QL'),
(32, 'Vixx Hearts', 'Vixx', 'Male', '../images/vixx2.jpg', 'http://static.tumblr.com/ecc450e61cb7b7c94db77bf70804aaa3/qkdhqtj/qIWnzwbyg/tumblr_static_2knl8n3iwmw4480so48gwkgok.jpg'),
(33, 'Vixx Moon', 'Vixx', 'Male', '../images/vixx3.jpg', 'https://upload.wikimedia.org/wikipedia/en/5/5b/VIXX_On_and_On_(single)_Cover.jpg'),
(35, 'Akdong Sing', 'Akdong Musician', 'None', '../images/akdong3.jpg', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSMAyGEdikvATj2kjt4W8ReLOC60DRGZi60K64mN7cTuUbJd2yA'),
(36, 'Girls Day Black', 'Girls Day', 'Female', '../images/girlsday3.jpg', 'http://www.koreaboo.com/wp-content/uploads/2014/10/213.jpg'),
(37, 'Girls Day Pose', 'Girls Day', 'Female', '../images/girlsday.jpg', 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxMSEhUSEhIVFRUWGBUXFhcXFRgWGBcYFRYXFxgVFRUYHiggGBolGxgYITEhJSkrLi4uFx8zODMtNygtLisBCgoKDg0OGxAQGi0lHyUvLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tL'),
(38, 'Troublemaker Cover', 'Troublemaker', 'None', '../images/TroubleMaker.jpg', 'http://i42.tinypic.com/rh3mvk.jpg'),
(39, 'Error Cover', 'Vixx', 'Male', '../images/error.jpg', 'http://www.jpopasia.com/img/album-covers/3/41848-andltahrefhttpwwwjpo-m4co.jpg'),
(40, 'AOA Lacrosse', 'AOA', 'Female', '../images/aoa2.jpg', 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcT6PFk1WSvDK0r1sV2uoihh-_sHrPFpNvUrg_uxcd0a2LwQekAk'),
(42, 'AOA White & Black', 'AOA', 'Female', '../images/aoa3.jpg', 'http://41.media.tumblr.com/7b53a7f0e6f718b6d4cf8010cea72971/tumblr_ntfvuo4eTW1u0xqzko1_1280.jpg'),
(43, 'AOA Sporty', 'AOA', 'Female', '../images/aoa4.jpg', 'http://www.asianjunkie.com/wp-content/uploads/2016/01/AOAEllesse5.jpg'),
(45, 'BTS Run', 'BTS', 'Male', '../images/bts1.jpg', 'https://farm2.staticflickr.com/1511/24504707883_1d209c692c_o.jpg'),
(46, 'BTS Jackets', 'BTS', 'Male', '../images/bts2.jpg', 'http://www.allkpop.com/upload/2015/10/af_org/bts_1445223931_af_org.jpg'),
(47, 'BTS I Need U', 'BTS', 'Male', '../images/bts3.jpg', 'http://1.soompi.io/wp-content/uploads/2015/12/BTS1.jpg'),
(49, 'Troublemaker Duo', 'Troublemaker', 'None', '../images/trouble.jpg', 'https://s-media-cache-ak0.pinimg.com/736x/bf/2c/5c/bf2c5c2279f0268021345a1a27a6769b.jpg'),
(50, 'Kim Jong Kook Glasses', 'None', 'Male', '../images/kook3.jpg', 'https://pbs.twimg.com/profile_images/679339774067539968/0CeevxS6.jpg'),
(51, 'Kim Jong Kook Running Man', 'None', 'Male', '../images/kook2.jpeg', 'http://3.bp.blogspot.com/-Xsh0HTrUL7s/UcsGJiLGTtI/AAAAAAAADDw/2RV22ystBRM/s1600/Kim-Jong-Kook.jpeg'),
(52, 'Kim Jong Kook Thumbs Up', 'None', 'Male', '../images/kook4.png', 'https://www.dramafever.com/st/news/images/Screen_Shot_2015-02-05_at_11.46.09_AM.png'),
(53, 'Kim Jong Kook Tiger', 'None', 'Male', '../images/tiger.jpg', 'http://gwangsvatar.files.wordpress.com/2013/08/tumblr_mnclnjey3j1s8vgmio1_500.jpg'),
(54, 'Kim Jong Kook Peace', 'None', 'Male', '../images/kjkpeace.jpg', 'https://pbs.twimg.com/media/BsMhFloCMAABeP8.jpg'),
(55, 'CNBlue Sitting', 'CNBlue', 'Male', '../images/cnbluesit.jpg', 'http://images.kdramastars.com/data/images/full/20321/cnblue.jpg'),
(56, 'CNBlue', 'CNBlue', 'Male', '../images/cnblueinst.jpg', 'https://cnbstorm.files.wordpress.com/2012/11/robot_cnblue.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
