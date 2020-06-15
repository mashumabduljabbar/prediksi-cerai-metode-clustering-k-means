-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.8-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for db_prediksicerai
CREATE DATABASE IF NOT EXISTS `db_prediksicerai` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `db_prediksicerai`;


-- Dumping structure for table db_prediksicerai.tbl_user
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL COMMENT 'User Name',
  `nm_user` varchar(100) DEFAULT NULL COMMENT 'Nama User',
  `lv_user` varchar(100) DEFAULT NULL COMMENT 'Level',
  `password` varchar(200) DEFAULT NULL COMMENT 'Password',
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table db_prediksicerai.tbl_user: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` (`id_user`, `username`, `nm_user`, `lv_user`, `password`) VALUES
	(1, 'admin', 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');
INSERT INTO `tbl_user` (`id_user`, `username`, `nm_user`, `lv_user`, `password`) VALUES
	(2, 'pengguna', 'User', 'pengguna', '8b097b8a86f9d6a991357d40d3d58634');
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
