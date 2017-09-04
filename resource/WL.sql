-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 產生時間： 2017 年 05 月 30 日 17:44
-- 伺服器版本: 10.1.13-MariaDB
-- PHP 版本： 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `WL`
--

-- --------------------------------------------------------

--
-- 資料表結構 `ITEMMAS`
--

CREATE TABLE `ITEMMAS` (
  `ITEMNO` varchar(25) COLLATE utf8_bin NOT NULL,
  `ITEMNM` varchar(50) COLLATE utf8_bin NOT NULL,
  `ITEMCLASS` varchar(1) COLLATE utf8_bin NOT NULL,
  `TOTALAMT` int(11) NOT NULL,
  `UPDATEDATE` datetime NOT NULL,
  `ACTCODE` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='物料主檔';

--
-- 資料表的匯出資料 `ITEMMAS`
--

INSERT INTO `ITEMMAS` (`ITEMNO`, `ITEMNM`, `ITEMCLASS`, `TOTALAMT`, `UPDATEDATE`, `ACTCODE`) VALUES
('additive_1', '金針花瓣', 'B', 0, '2017-06-01 00:00:00', 1),
('additive_2', '釋迦果粉', 'B', 0, '2017-06-01 00:00:00', 1),
('additive_3', '釋迦果泥', 'B', 0, '2017-06-01 00:00:00', 1),
('additive_4', '米粉', 'B', 0, '2017-06-01 00:00:00', 1),
('additive_5', '蕁麻葉粉', 'B', 0, '2017-06-01 00:00:00', 1),
('additive_6', '金盞花粉', 'B', 0, '2017-06-01 00:00:00', 1),
('additive_7', '金針花粉', 'B', 0, '2017-06-01 00:00:00', 1),
('additive_8', '薑黃粉', 'B', 0, '2017-06-01 00:00:00', 1),
('additive_9', '紅麴粉', 'B', 0, '2017-06-01 00:00:00', 1),
('additive_10', '洛神花粉', 'B', 0, '2017-06-01 00:00:00', 1),
('NaOH', '鹼', 'A', 0, '2017-06-01 00:00:00', 1),
('oil_1', '橄欖油', 'A', 0, '2017-06-01 00:00:00', 1),
('oil_2', '棕梠油', 'A', 0, '2017-06-01 00:00:00', 1),
('oil_3', '椰子油', 'A', 0, '2017-06-01 00:00:00', 1),
('oil_4', '米糠油', 'A', 0, '2017-06-01 00:00:00', 1),
('oil_5', '紅棕梠油', 'A', 0, '2017-06-01 00:00:00', 1),
('oil_6', '葡萄籽油', 'A', 0, '2017-06-01 00:00:00', 1),
('oil_7', '苦茶油', 'A', 0, '2017-06-01 00:00:00', 1),
('oil_8', '蓖麻油', 'A', 0, '2017-06-01 00:00:00', 1),
('oil_9', '乳油木果脂', 'A', 0, '2017-06-01 00:00:00', 1),
('package_1', '不織布包', 'C', 0, '2017-06-01 00:00:00', 1),
('package_2', '鋁包', 'C', 0, '2017-06-01 00:00:00', 1),
('package_3', '單顆皂禮盒封套', 'C', 0, '2017-06-01 00:00:00', 1),
('package_4', '單顆皂禮盒內盒', 'C', 0, '2017-06-01 00:00:00', 1),
('package_5', '皂絲禮盒', 'C', 0, '2017-06-01 00:00:00', 1),
('package_6', '內襯', 'C', 0, '2017-06-01 00:00:00', 1),
('package_7a', '米皂外盒100g', 'C', 0, '2017-06-01 00:00:00', 1),
('package_7b', '米皂外盒50g', 'C', 0, '2017-06-01 00:00:00', 1),
('package_8a', '金針皂外盒100g', 'C', 0, '2017-06-01 00:00:00', 1),
('package_8b', '金針皂外盒50g', 'C', 0, '2017-06-01 00:00:00', 1),
('package_9a', '釋迦皂外盒100g', 'C', 0, '2017-06-01 00:00:00', 1),
('package_9b', '釋迦皂外盒50g', 'C', 0, '2017-06-01 00:00:00', 1),
('moon_package_1', '中秋大禮盒上蓋(兔子)', 'C', 0, '2017-06-01 00:00:00', 1),
('moon_package_2', '中秋大禮盒上蓋(熱氣球)', 'C', 0, '2017-06-01 00:00:00', 1),
('moon_package_3', '中秋大禮盒底座', 'C', 0, '2017-06-01 00:00:00', 1),
('moon_package_4', '中秋大禮盒內襯', 'C', 0, '2017-06-01 00:00:00', 1),
('moon_package_5', '中秋小禮盒封套', 'C', 0, '2017-06-01 00:00:00', 1),
('product_sp_1', '田靜山巒禾風皂100g', 'D', 0, '2017-06-01 00:00:00', 1),
('product_sp_2', '田靜山巒禾風皂50g', 'D', 0, '2017-06-01 00:00:00', 1),
('product_sp_3', '金絲森林渲染皂100g', 'D', 0, '2017-06-01 00:00:00', 1),
('product_sp_4', '金絲森林渲染皂50g', 'D', 0, '2017-06-01 00:00:00', 1),
('product_sp_5', '釋迦手感果力皂100g', 'D', 0, '2017-06-01 00:00:00', 1),
('product_sp_6', '釋迦手感果力皂50g', 'D', 0, '2017-06-01 00:00:00', 1),
('product_sp_box', '三三台東意象禮盒組', 'D', 0, '2017-06-01 00:00:00', 1),
('product_ss_1', '洛神紅麴旅用皂絲', 'D', 0, '2017-06-01 00:00:00', 1),
('product_ss_2', '暖暖薑黃旅用皂絲', 'D', 0, '2017-06-01 00:00:00', 1),
('product_ss_3', '萱草米黃旅用皂絲', 'D', 0, '2017-06-01 00:00:00', 1),
('product_ss_box', '三三台東意象皂絲旅行組', 'D', 0, '2017-06-01 00:00:00', 1),
('moon_box_1', '中秋禮皂-月兔捉迷藏100g', 'D', 0, '2017-06-01 00:00:00', 1),
('moon_box_2', '中秋禮皂-月兔捉迷藏50g', 'D', 0, '2017-06-01 00:00:00', 1),
('moon_box_3', '中秋禮皂-熱氣球登月100g', 'D', 0, '2017-06-01 00:00:00', 1),
('moon_box_4', '中秋禮皂-熱氣球登月50g', 'D', 0, '2017-06-01 00:00:00', 1),
('moon_box_5', '中秋小禮盒(米皂)', 'D', 0, '2017-06-01 00:00:00', 1),
('moon_box_6', '中秋小禮盒(金針皂)', 'D', 0, '2017-06-01 00:00:00', 1),
('moon_box_7', '中秋小禮盒(釋迦皂)', 'D', 0, '2017-06-01 00:00:00', 1),
('sp_1', '米皂', 'E', 0, '2017-06-01 00:00:00', 1),
('sp_1_100', '米皂100g', 'E', 0, '2017-06-01 00:00:00', 1),
('sp_1_50', '米皂50g', 'E', 0, '2017-06-01 00:00:00', 1),
('sp_1_houshanpi', '後山埤的米皂', 'H', 0, '2017-06-01 00:00:00', 1),
('sp_1_100_houshanpi', '後山埤的米皂100g', 'H', 0, '2017-06-01 00:00:00', 1),
('sp_1_50_houshanpi', '後山埤的米皂50g', 'H', 0, '2017-06-01 00:00:00', 1),
('sp_2', '金針皂', 'E', 0, '2017-06-01 00:00:00', 1),
('sp_2_100', '金針皂100g', 'E', 0, '2017-06-01 00:00:00', 1),
('sp_2_50', '金針皂50g', 'E', 0, '2017-06-01 00:00:00', 1),
('sp_2_houshanpi', '後山埤的金針皂', 'H', 0, '2017-06-01 00:00:00', 1),
('sp_2_100_houshanpi', '後山埤的金針皂100g', 'H', 0, '2017-06-01 00:00:00', 1),
('sp_2_50_houshanpi', '後山埤的金針皂50g', 'H', 0, '2017-06-01 00:00:00', 1),
('sp_3', '釋迦皂', 'E', 0, '2017-06-01 00:00:00', 1),
('sp_3_100', '釋迦皂100g', 'E', 0, '2017-06-01 00:00:00', 1),
('sp_3_50', '釋迦皂50g', 'E', 0, '2017-06-01 00:00:00', 1),
('sp_3_houshanpi', '後山埤的釋迦皂', 'H', 0, '2017-06-01 00:00:00', 1),
('sp_3_100_houshanpi', '後山埤的釋迦皂100g', 'H', 0, '2017-06-01 00:00:00', 1),
('sp_3_50_houshanpi', '後山埤的釋迦皂50g', 'H', 0, '2017-06-01 00:00:00', 1),
('ss_1', '洛神皂絲', 'E', 0, '2017-06-01 00:00:00', 1),
('ss_2', '紅麴皂絲', 'E', 0, '2017-06-01 00:00:00', 1),
('ss_3', '薑黃皂絲', 'E', 0, '2017-06-01 00:00:00', 1),
('ss_4', '蕁麻葉皂絲', 'E', 0, '2017-06-01 00:00:00', 1),
('ss_5', '金針皂絲', 'E', 0, '2017-06-01 00:00:00', 1),
('ss_6', '紅棕梠皂絲', 'E', 0, '2017-06-01 00:00:00', 1);


-- --------------------------------------------------------

--
-- 資料表結構 `CONTROLMAS`
--

CREATE TABLE `CONTROLMAS` (
  `NEXT_NO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='控制檔';

--
-- 資料表的匯出資料 `CONTROLMAS`
--

INSERT INTO `CONTROLMAS` (`NEXT_NO`) VALUES
('100001');

-- --------------------------------------------------------

--
-- 資料表結構 `MEMBERMAS`
--

CREATE TABLE `MEMBERMAS` (
  `ACCOUNT` varchar(15) COLLATE utf8_bin NOT NULL,
  `NAME` varchar(15) COLLATE utf8_bin NOT NULL,
  `PASSWORD` varchar(15) COLLATE utf8_bin NOT NULL,
  `TOKEN` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  `AUTHORITY` varchar(1) COLLATE utf8_bin NOT NULL,
  `CREATEDATE` datetime NOT NULL,
  `ONLINEDATE` datetime NOT NULL,
  `ACTCODE` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='成員主檔';

--
-- 資料表的匯出資料 `MEMBERMAS`
--

INSERT INTO `MEMBERMAS` (`ACCOUNT`, `NAME`, `PASSWORD`, `TOKEN`, `AUTHORITY`, `CREATEDATE`, `ONLINEDATE`, `ACTCODE`) VALUES
('beitou', 'beitou', 'beitou', NULL, 'B', '2017-06-01 00:00:00', '2017-06-01 00:00:00', 1),
('houshanpi', 'houshanpi', 'houshanpi', NULL, 'C', '2017-06-01 00:00:00', '2017-06-01 00:00:00', 1),
('intern', 'intern', 'intern', NULL, 'E', '2017-06-01 00:00:00', '2017-06-01 00:00:00', 1),
('taitung', 'taitung', 'taitung', NULL, 'D', '2017-06-01 00:00:00', '2017-06-01 00:00:00', 1),
('trisoap', 'trisoap', 'trisoap', NULL, 'A', '2017-06-01 00:00:00', '2017-06-01 00:00:00', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `COMMANDMAS`
--

CREATE TABLE `CMDMAS` (
  `CMDNO` varchar(15) COLLATE utf8_bin NOT NULL,
  `TARGET` varchar(15) COLLATE utf8_bin NOT NULL,
  `SENDER` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `RECEIVER` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `CMDSTAT` varchar(1) COLLATE utf8_bin NOT NULL,
  `CMDTYPE` varchar(1) COLLATE utf8_bin NOT NULL,
  `NOTICE` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `STARTDATE` date DEFAULT NULL,
  `ENDDATE` date DEFAULT NULL,
  `FILESTAT` tinyint(1) NOT NULL DEFAULT '0',
  `REVIEWDATE` datetime NOT NULL,
  `CREATEDATE` datetime NOT NULL,
  `UPDATEDATE` datetime NOT NULL,
  `ACTCODE` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='下單主檔';

-- --------------------------------------------------------

--
-- 資料表結構 `CMDDTLMAS`
--

CREATE TABLE `CMDDTLMAS` (
  `CMDNO` varchar(15) COLLATE utf8_bin NOT NULL,
  `ITEMNO` varchar(25) COLLATE utf8_bin NOT NULL,
  `ITEMNM` varchar(50) COLLATE utf8_bin NOT NULL,
  `ITEMAMT` int(11) NOT NULL,
  `CHECKSTAT` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='請求內容主檔';

-- --------------------------------------------------------

--
-- 資料表結構 `RQSTDTLMAS`
--

CREATE TABLE `RQSTDTLMAS` (
  `RQSTNO` varchar(15) COLLATE utf8_bin NOT NULL,
  `ITEMNO` varchar(25) COLLATE utf8_bin NOT NULL,
  `ITEMNM` varchar(50) COLLATE utf8_bin NOT NULL,
  `ITEMAMT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='請求內容主檔';

-- --------------------------------------------------------

--
-- 資料表結構 `RQSTMAS`
--

CREATE TABLE `RQSTMAS` (
  `RQSTNO` varchar(15) COLLATE utf8_bin NOT NULL,
  `SENDER` varchar(15) COLLATE utf8_bin NOT NULL,
  `RECEIVER` varchar(15) COLLATE utf8_bin NOT NULL,
  `SENDERDATE` datetime NOT NULL,
  `RECEIVERDATE` datetime DEFAULT NULL,
  `RQSTSTAT` varchar(1) COLLATE utf8_bin NOT NULL,
  `SHIPFEE` int(11) NOT NULL DEFAULT '0',
  `NOTICE` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `CREATEDATE` datetime NOT NULL,
  `UPDATEDATE` datetime NOT NULL,
  `ACTCODE` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='請求主檔';

-- --------------------------------------------------------

--
-- 資料表結構 `WHOUSEITEMMAS`
--

CREATE TABLE `WHOUSEITEMMAS` (
  `WHOUSENO` varchar(15) COLLATE utf8_bin NOT NULL,
  `ITEMNO` varchar(25) COLLATE utf8_bin NOT NULL,
  `ITEMNM` varchar(50) COLLATE utf8_bin NOT NULL,
  `ITEMCLASS` varchar(1) COLLATE utf8_bin NOT NULL,
  `TOTALAMT` int(11) NOT NULL,
  `UPDATEDATE` datetime NOT NULL,
  `ACTCODE` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='倉儲物料主檔';

--
-- 資料表的匯出資料 `WHOUSEITEMMAS`
--

INSERT INTO `WHOUSEITEMMAS` (`WHOUSENO`, `ITEMNO`, `ITEMNM`, `ITEMCLASS`, `TOTALAMT`, `UPDATEDATE`, `ACTCODE`) VALUES
('Beitou', 'oil_1', '橄欖油', 'A', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'oil_2', '棕梠油', 'A', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'oil_3', '椰子油', 'A', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'oil_4', '米糠油', 'A', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'oil_5', '紅棕梠油', 'A', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'oil_6', '葡萄籽油', 'A', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'oil_7', '苦茶油', 'A', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'oil_8', '蓖麻油', 'A', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'oil_9', '乳油木果脂', 'A', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'NaOH', '鹼', 'A', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'additive_1', '金針花瓣', 'B', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'additive_2', '釋迦果粉', 'B', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'additive_3', '釋迦果泥', 'B', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'additive_4', '米粉', 'B', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'additive_5', '蕁麻葉粉', 'B', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'additive_6', '金盞花粉', 'B', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'additive_7', '金針花粉', 'B', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'additive_8', '薑黃粉', 'B', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'additive_9', '紅麴粉', 'B', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'additive_10', '洛神花粉', 'B', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'package_1', '不織布包', 'C', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'package_2', '鋁包', 'C', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'package_3', '單顆皂禮盒封套', 'C', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'package_4', '單顆皂禮盒內盒', 'C', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'package_5', '皂絲禮盒', 'C', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'package_6', '內襯', 'C', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'package_7a', '米皂外盒100g', 'C', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'package_7b', '米皂外盒50g', 'C', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'package_8a', '金針皂外盒100g', 'C', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'package_8b', '金針皂外盒50g', 'C', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'package_9a', '釋迦皂外盒100g', 'C', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'package_9b', '釋迦皂外盒50g', 'C', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'moon_package_1', '中秋大禮盒上蓋(兔子)', 'C', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'moon_package_2', '中秋大禮盒上蓋(熱氣球)', 'C', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'moon_package_3', '中秋大禮盒底座', 'C', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'moon_package_4', '中秋大禮盒內襯', 'C', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'moon_package_5', '中秋小禮盒封套', 'C', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'product_sp_1', '田靜山巒禾風皂100g', 'D', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'product_sp_2', '田靜山巒禾風皂50g', 'D', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'product_sp_3', '金絲森林渲染皂100g', 'D', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'product_sp_4', '金絲森林渲染皂50g', 'D', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'product_sp_5', '釋迦手感果力皂100g', 'D', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'product_sp_6', '釋迦手感果力皂50g', 'D', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'product_sp_box', '三三台東意象禮盒組', 'D', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'product_ss_1', '洛神紅麴旅用皂絲', 'D', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'product_ss_2', '暖暖薑黃旅用皂絲', 'D', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'product_ss_3', '萱草米黃旅用皂絲', 'D', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'product_ss_box', '三三台東意象皂絲旅行組', 'D', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'moon_box_1', '中秋禮皂-月兔捉迷藏100g', 'D', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'moon_box_2', '中秋禮皂-月兔捉迷藏50g', 'D', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'moon_box_3', '中秋禮皂-熱氣球登月100g', 'D', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'moon_box_4', '中秋禮皂-熱氣球登月50g', 'D', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'moon_box_5', '中秋小禮盒(米皂)', 'D', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'moon_box_6', '中秋小禮盒(金針皂)', 'D', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'moon_box_7', '中秋小禮盒(釋迦皂)', 'D', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'sp_1_100', '米皂100g', 'E', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'sp_1_50', '米皂50g', 'E', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'sp_2_100', '金針皂100g', 'E', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'sp_2_50', '金針皂50g', 'E', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'sp_3_100', '釋迦皂100g', 'E', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'sp_3_50', '釋迦皂50g', 'E', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'ss_1', '洛神皂絲', 'E', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'ss_2', '紅麴皂絲', 'E', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'ss_3', '薑黃皂絲', 'E', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'ss_4', '蕁麻葉皂絲', 'E', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'ss_5', '金針皂絲', 'E', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'ss_6', '紅棕梠皂絲', 'E', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'sp_1_100_houshanpi', '後山埤的米皂100g', 'H', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'sp_1_50_houshanpi', '後山埤的米皂50g', 'H', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'sp_2_100_houshanpi', '後山埤的金針皂100g', 'H', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'sp_2_50_houshanpi', '後山埤的金針皂50g', 'H', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'sp_3_100_houshanpi', '後山埤的釋迦皂100g', 'H', 0, '2017-06-01 00:00:00', 1),
('Beitou', 'sp_3_50_houshanpi', '後山埤的釋迦皂50g', 'H', 0, '2017-06-01 00:00:00', 1),
('Houshanpi', 'additive_1', '金針花瓣', 'B', 0, '2017-06-01 00:00:00', 1),
('Houshanpi', 'additive_2', '釋迦果粉', 'B', 0, '2017-06-01 00:00:00', 1),
('Houshanpi', 'additive_3', '釋迦果泥', 'B', 0, '2017-06-01 00:00:00', 1),
('Houshanpi', 'additive_4', '米粉', 'B', 0, '2017-06-01 00:00:00', 1),
('Houshanpi', 'additive_5', '蕁麻葉粉', 'B', 0, '2017-06-01 00:00:00', 1),
('Houshanpi', 'additive_6', '金盞花粉', 'B', 0, '2017-06-01 00:00:00', 1),
('Houshanpi', 'additive_7', '金針花粉', 'B', 0, '2017-06-01 00:00:00', 1),
('Houshanpi', 'additive_8', '薑黃粉', 'B', 0, '2017-06-01 00:00:00', 1),
('Houshanpi', 'additive_9', '紅麴粉', 'B', 0, '2017-06-01 00:00:00', 1),
('Houshanpi', 'additive_10', '洛神花粉', 'B', 0, '2017-06-01 00:00:00', 1),
('Houshanpi', 'sp_1_100_houshanpi', '後山埤的米皂100g', 'H', 0, '2017-06-01 00:00:00', 1),
('Houshanpi', 'sp_1_50_houshanpi', '後山埤的米皂50g', 'H', 0, '2017-06-01 00:00:00', 1),
('Houshanpi', 'sp_2_100_houshanpi', '後山埤的金針皂100g', 'H', 0, '2017-06-01 00:00:00', 1),
('Houshanpi', 'sp_2_50_houshanpi', '後山埤的金針皂50g', 'H', 0, '2017-06-01 00:00:00', 1),
('Houshanpi', 'sp_3_100_houshanpi', '後山埤的釋迦皂100g', 'H', 0, '2017-06-01 00:00:00', 1),
('Houshanpi', 'sp_3_50_houshanpi', '後山埤的釋迦皂50g', 'H', 0, '2017-06-01 00:00:00', 1),
('Taitung', 'oil_1', '橄欖油', 'A', 0, '2017-06-01 00:00:00', 1),
('Taitung', 'oil_2', '棕梠油', 'A', 0, '2017-06-01 00:00:00', 1),
('Taitung', 'oil_3', '椰子油', 'A', 0, '2017-06-01 00:00:00', 1),
('Taitung', 'oil_4', '米糠油', 'A', 0, '2017-06-01 00:00:00', 1),
('Taitung', 'oil_5', '紅棕梠油', 'A', 0, '2017-06-01 00:00:00', 1),
('Taitung', 'oil_6', '葡萄籽油', 'A', 0, '2017-06-01 00:00:00', 1),
('Taitung', 'oil_7', '苦茶油', 'A', 0, '2017-06-01 00:00:00', 1),
('Taitung', 'oil_8', '蓖麻油', 'A', 0, '2017-06-01 00:00:00', 1),
('Taitung', 'oil_9', '乳油木果脂', 'A', 0, '2017-06-01 00:00:00', 1),
('Taitung', 'NaOH', '鹼', 'A', 0, '2017-06-01 00:00:00', 1),
('Taitung', 'additive_1', '金針花瓣', 'B', 0, '2017-06-01 00:00:00', 1),
('Taitung', 'additive_2', '釋迦果粉', 'B', 0, '2017-06-01 00:00:00', 1),
('Taitung', 'additive_3', '釋迦果泥', 'B', 0, '2017-06-01 00:00:00', 1),
('Taitung', 'additive_4', '米粉', 'B', 0, '2017-06-01 00:00:00', 1),
('Taitung', 'additive_5', '蕁麻葉粉', 'B', 0, '2017-06-01 00:00:00', 1),
('Taitung', 'additive_6', '金盞花粉', 'B', 0, '2017-06-01 00:00:00', 1),
('Taitung', 'additive_7', '金針花粉', 'B', 0, '2017-06-01 00:00:00', 1),
('Taitung', 'additive_8', '薑黃粉', 'B', 0, '2017-06-01 00:00:00', 1),
('Taitung', 'additive_9', '紅麴粉', 'B', 0, '2017-06-01 00:00:00', 1),
('Taitung', 'additive_10', '洛神花粉', 'B', 0, '2017-06-01 00:00:00', 1),
('Taitung', 'sp_1_100', '米皂100g', 'E', 0, '2017-06-01 00:00:00', 1),
('Taitung', 'sp_1_50', '米皂50g', 'E', 0, '2017-06-01 00:00:00', 1),
('Taitung', 'sp_2_100', '金針皂100g', 'E', 0, '2017-06-01 00:00:00', 1),
('Taitung', 'sp_2_50', '金針皂50g', 'E', 0, '2017-06-01 00:00:00', 1),
('Taitung', 'sp_3_100', '釋迦皂100g', 'E', 0, '2017-06-01 00:00:00', 1),
('Taitung', 'sp_3_50', '釋迦皂50g', 'E', 0, '2017-06-01 00:00:00', 1),
('Taitung', 'ss_1', '洛神皂絲', 'E', 0, '2017-06-01 00:00:00', 1),
('Taitung', 'ss_2', '紅麴皂絲', 'E', 0, '2017-06-01 00:00:00', 1),
('Taitung', 'ss_3', '薑黃皂絲', 'E', 0, '2017-06-01 00:00:00', 1),
('Taitung', 'ss_4', '蕁麻葉皂絲', 'E', 0, '2017-06-01 00:00:00', 1),
('Taitung', 'ss_5', '金針皂絲', 'E', 0, '2017-06-01 00:00:00', 1),
('Taitung', 'ss_6', '紅棕梠皂絲', 'E', 0, '2017-06-01 00:00:00', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `WHOUSEMAS`
--

CREATE TABLE `WHOUSEMAS` (
  `WHOUSENO` varchar(15) COLLATE utf8_bin NOT NULL,
  `DESCRIPT` varchar(50) COLLATE utf8_bin NOT NULL,
  `TOTALAMT` int(11) NOT NULL,
  `UPDATEDATE` datetime NOT NULL,
  `ACTCODE` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='倉庫主檔';

--
-- 資料表的匯出資料 `WHOUSEMAS`
--

INSERT INTO `WHOUSEMAS` (`WHOUSENO`, `DESCRIPT`, `TOTALAMT`, `UPDATEDATE`, `ACTCODE`) VALUES
('Beitou', '北投', 0, '2017-06-01 00:00:00', 1),
('Houshanpi', '後山埤', 0, '2017-06-01 00:00:00', 1),
('Taitung', '台東', 0, '2017-06-01 00:00:00', 1);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `ITEMMAS`
--
ALTER TABLE `ITEMMAS`
  ADD PRIMARY KEY (`ITEMNO`);

--
-- 資料表索引 `MEMBERMAS`
--
ALTER TABLE `MEMBERMAS`
  ADD PRIMARY KEY (`ACCOUNT`);

--
-- 資料表索引 `RQSTDTLMAS`
--
ALTER TABLE `RQSTDTLMAS`
  ADD PRIMARY KEY (`RQSTNO`,`ITEMNO`);

--
-- 資料表索引 `RQSTMAS`
--
ALTER TABLE `RQSTMAS`
  ADD PRIMARY KEY (`RQSTNO`);

--
-- 資料表索引 `WHOUSEITEMMAS`
--
ALTER TABLE `WHOUSEITEMMAS`
  ADD PRIMARY KEY (`WHOUSENO`,`ITEMNO`);

--
-- 資料表索引 `WHOUSEMAS`
--
ALTER TABLE `WHOUSEMAS`
  ADD PRIMARY KEY (`WHOUSENO`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
