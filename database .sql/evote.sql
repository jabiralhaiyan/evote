/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : evote

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-05-03 23:11:15
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ev_admin
-- ----------------------------
DROP TABLE IF EXISTS `ev_admin`;
CREATE TABLE `ev_admin` (
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `password2nd` varchar(100) DEFAULT NULL,
  `ts` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ev_admin
-- ----------------------------
INSERT INTO `ev_admin` VALUES ('admin', 'b93d83634de0b8143a418f91495b4fdb', '0856', '2017-04-30 22:59:02');

-- ----------------------------
-- Table structure for ev_calonketua
-- ----------------------------
DROP TABLE IF EXISTS `ev_calonketua`;
CREATE TABLE `ev_calonketua` (
  `idcalonketua` int(2) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `nourut` int(1) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `ts` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idcalonketua`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ev_calonketua
-- ----------------------------
INSERT INTO `ev_calonketua` VALUES ('11', 'Haiyan', '4', 'TRIPLE_KILL.jpg', '2017-05-03 13:32:55');
INSERT INTO `ev_calonketua` VALUES ('12', 'Jabir', '3', 'handayani.jpg', '2017-05-03 13:32:34');
INSERT INTO `ev_calonketua` VALUES ('15', 'tttgt', '2', 'handayani.jpg', '2017-05-03 13:32:34');
INSERT INTO `ev_calonketua` VALUES ('16', 'unchh', '1', 'handayani.jpg', '2017-05-03 13:32:32');

-- ----------------------------
-- Table structure for ev_editor
-- ----------------------------
DROP TABLE IF EXISTS `ev_editor`;
CREATE TABLE `ev_editor` (
  `ideditor` int(1) NOT NULL AUTO_INCREMENT,
  `judul` varchar(200) DEFAULT NULL,
  `logo` varchar(200) DEFAULT NULL,
  `ts` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ideditor`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ev_editor
-- ----------------------------
INSERT INTO `ev_editor` VALUES ('1', 'PEMILIHAN UMUM', 'evote-logo2.png', '2017-05-01 18:53:09');

-- ----------------------------
-- Table structure for ev_pemilih
-- ----------------------------
DROP TABLE IF EXISTS `ev_pemilih`;
CREATE TABLE `ev_pemilih` (
  `idpemilih` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `password` varchar(100) DEFAULT NULL,
  `nourut` char(5) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `ts` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idpemilih`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ev_pemilih
-- ----------------------------
INSERT INTO `ev_pemilih` VALUES ('000001', '6x8jwudo', '1', '1', '2017-05-03 22:47:08');
INSERT INTO `ev_pemilih` VALUES ('000002', 'kllkrv6o', '1', '1', '2017-05-03 22:47:08');
INSERT INTO `ev_pemilih` VALUES ('000003', 'lw1ynfgw', '2', '1', '2017-05-03 22:47:08');
INSERT INTO `ev_pemilih` VALUES ('000004', '0nahbbx4', '3', '1', '2017-05-03 22:47:08');
INSERT INTO `ev_pemilih` VALUES ('000005', 'll5uh8c3', '3', '1', '2017-05-03 22:47:09');
INSERT INTO `ev_pemilih` VALUES ('000006', '3gcuyzik', '3', '1', '2017-05-03 22:47:20');
INSERT INTO `ev_pemilih` VALUES ('000007', '70n7f939', '2', '1', '2017-05-03 22:47:09');
INSERT INTO `ev_pemilih` VALUES ('000008', 'qzropuxy', '3', '1', '2017-05-03 22:47:20');
INSERT INTO `ev_pemilih` VALUES ('000009', 'e4g1hipd', '1', '1', '2017-05-03 22:47:09');
INSERT INTO `ev_pemilih` VALUES ('000010', 'z7izjy7b', '1', '1', '2017-05-03 22:47:09');
INSERT INTO `ev_pemilih` VALUES ('000011', '7ymbly5h', '2', '1', '2017-05-03 22:47:09');
INSERT INTO `ev_pemilih` VALUES ('000012', 't5lrgabn', '3', '1', '2017-05-03 22:47:10');
INSERT INTO `ev_pemilih` VALUES ('000013', 'lj42tnfj', '2', '1', '2017-05-03 22:47:10');
INSERT INTO `ev_pemilih` VALUES ('000014', '9u00ht9y', '2', '1', '2017-05-03 22:47:10');
INSERT INTO `ev_pemilih` VALUES ('000015', 'ktzb5jjl', '4', '1', '2017-05-03 22:47:10');
INSERT INTO `ev_pemilih` VALUES ('000016', 'a8sqlk27', '4', '1', '2017-05-03 22:47:10');
INSERT INTO `ev_pemilih` VALUES ('000017', '5t60knil', '4', '1', '2017-05-03 22:47:23');
INSERT INTO `ev_pemilih` VALUES ('000018', 'wcwwsjpg', '3', '1', '2017-05-03 22:47:24');
INSERT INTO `ev_pemilih` VALUES ('000019', 'bjq62zck', '3', '1', '2017-05-03 22:47:11');
INSERT INTO `ev_pemilih` VALUES ('000020', '45dk3q6n', '4', '1', '2017-05-03 22:47:11');
INSERT INTO `ev_pemilih` VALUES ('000021', '3ymtnjzi', '1', '1', '2017-05-03 23:08:08');
INSERT INTO `ev_pemilih` VALUES ('000022', 'xp6oi5iu', 'NULL', '0', '2017-05-03 22:53:25');
INSERT INTO `ev_pemilih` VALUES ('000024', 'czb9zsoz', '1', '1', '2017-05-03 22:47:28');
INSERT INTO `ev_pemilih` VALUES ('000025', 'ezeh5bua', '4', '1', '2017-05-03 22:47:12');
