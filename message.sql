-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-11-01 04:08:37
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `message`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `created_at` int(11) NOT NULL,
  `is_root` tinyint(4) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `created_at`, `is_root`, `updated_at`, `status`) VALUES
(1, '1099083298@qq.com', 'e10adc3949ba59abbe56e057f20f883e', 1477968181, 1, 1477968181, 1),
(2, 'lb@zidoo.tv', 'e10adc3949ba59abbe56e057f20f883e', 1477968329, 0, 1477968329, 1),
(3, '123@qq.com', 'e10adc3949ba59abbe56e057f20f883e', 1477969181, 0, 1477969181, 1);

-- --------------------------------------------------------

--
-- 表的结构 `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(256) NOT NULL,
  `created_at` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `message`
--

INSERT INTO `message` (`id`, `message`, `created_at`, `user_id`, `updated_at`, `status`) VALUES
(1, '明月几时有，把酒问青天。不知天上宫阙，今夕是何年？\r\n我欲乘风归去，又恐琼楼玉宇，\r\n　　高处不胜寒。\r\n　　起舞弄清影，何似在人间！\r\n　　转朱阁，低绮户，照无眠。\r\n　　不应有恨，何事长向别时圆？\r\n　　人有悲欢离合，月有阴晴圆缺，\r\n　　此事古难全。\r\n　　但愿人长久，千里共婵娟。', 1477968268, 1, 1477968268, 1),
(2, '寒蝉凄切，对长亭晚。\r\n　　骤雨初歇，都门帐饮无绪，\r\n　　方留恋处，兰舟催发。\r\n　　执手相看泪眼，竟无语凝噎。\r\n　　念去去，千里烟波，\r\n　　暮霭沉沉楚天阔。\r\n　　多情自古伤离别，更那堪，\r\n　　冷落清秋节。\r\n　　今宵酒醒何处？\r\n　　杨柳岸，晓风残月。\r\n　　此去经年，应是良辰好景虚设。\r\n　　便纵有千种风情，待与何人说！', 1477968284, 1, 1477968284, 1),
(3, '　伫倚危楼风细细，望极春愁，\r\n　　黯黯生天际。\r\n　　草色烟光残照里，无言谁会凭栏意。\r\n　　拟把疏狂图一醉，对酒当歌，\r\n　　强乐还无味。\r\n　　衣带渐宽终不悔，为伊消得人憔悴。', 1477968344, 2, 1477968344, 1),
(4, '大江东去，浪淘尽。\r\n　　千古风流人物。\r\n　　故垒西边，人道是，三国周郎赤壁。\r\n　　乱石穿空，惊涛拍岸，卷起千堆雪。\r\n　　江山如画，一时多少豪杰！\r\n　　遥想公瑾当年，小乔初嫁了，\r\n　　雄姿英发，羽扇纶巾，\r\n　　谈笑间，樯橹灰飞烟灭。\r\n　　故国神游，多情应笑我，早生华发。\r\n　　人间如梦，一樽还酹江月。', 1477968368, 2, 1477968368, 1),
(5, '　乳燕飞华屋。悄无人、桐阴转午，\r\n　　晚凉新浴。\r\n　　手弄生绡白团扇，扇手一时似玉。\r\n　　渐困倚、孤眠清熟。\r\n　　帘外谁来推绣户？\r\n　　枉教人梦断瑶台曲。\r\n　　又却是，风敲竹。\r\n　　石榴半吐红巾蹙。\r\n　　待浮花浪蕊都尽，伴君幽独。\r\n　　秾艳一枝细看取，芳心千重似束。\r\n　　又恐被、秋风惊绿。\r\n　　若待得君来向此，花前对酒不忍触。\r\n　　共粉泪，两簌簌。', 1477968411, 2, 1477968411, 1),
(6, '红藕香残玉簟秋。\r\n　　轻解罗裳，独上兰舟。\r\n　　云中谁寄锦书来？\r\n　　雁字回时，月满西楼。\r\n　　花自飘零水自流，\r\n　　一种相思，两处闲愁。\r\n　　此情无计可消除，\r\n　　才下眉头，却上心头。', 1477969202, 3, 1477969202, 1),
(7, '　　春花秋月何时了，往事知多少！\r\n　　小楼昨夜又东风，故国不堪回首月明中。\r\n　　雕栏玉砌应犹在，只是朱颜改。\r\n　　问君能有多少愁？恰似一江春水向东流。', 1477969209, 3, 1477969209, 1),
(8, '三年枕上吴中路。\r\n　　遣黄耳、随君去。\r\n　　若到松江呼小渡。\r\n　　莫惊鸥鹭，四桥尽是，\r\n　　老子经行处。\r\n　　辋川图上看春暮。\r\n　　常记高人右丞句。\r\n　　作个归期天已许。\r\n　　春衫犹是，小蛮针线，\r\n　　曾湿西湖雨。', 1477969218, 3, 1477969218, 1),
(9, '夜饮东坡醒复醉，归来仿佛已三更。\r\n　　家童鼻息已雷鸣，敲门都不应，\r\n　　倚帐听江声。\r\n　　长恨此身非我有，何时忘却营营。\r\n　　夜阑风静彀纹平，小舟从此逝，江海寄余生。', 1477969226, 3, 1477969226, 1),
(10, '　留人不住，醉解兰舟去。\r\n　　一棹碧涛春水路，过尽晓莺啼处。\r\n　　渡头杨柳青青，枝枝叶叶离情。\r\n　　此后锦书休寄，画楼云雨无凭。', 1477969234, 3, 1477969234, 1),
(11, '关山魂梦长，鱼雁音尘少。\r\n　　两鬓可怜青，只为相思老。\r\n　　归梦碧纱窗，说与人人道。\r\n　　真个别离难，不似相逢好。', 1477969246, 3, 1477969246, 1),
(12, '　彩袖殷勤捧玉钟，当年拚却醉颜红。\r\n　　舞低杨柳楼心月，歌尽桃花扇底风。\r\n　　从别后，忆相逢，几回魂梦与君同。\r\n　　今宵剩把银釭照，犹恐相逢是梦中', 1477969632, 3, 1477969632, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
