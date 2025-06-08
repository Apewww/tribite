/*
 Navicat Premium Data Transfer

 Source Server         : Local
 Source Server Type    : MySQL
 Source Server Version : 80403
 Source Host           : localhost:3306
 Source Schema         : tribite

 Target Server Type    : MySQL
 Target Server Version : 80403
 File Encoding         : 65001

 Date: 05/06/2025 08:01:52
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for akun
-- ----------------------------
DROP TABLE IF EXISTS `akun`;
CREATE TABLE `akun`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `telepon` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `role` tinyint(0) NOT NULL DEFAULT 0,
  `picture` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `bitepay` int(0) NOT NULL DEFAULT 0,
  `point` int(0) NOT NULL DEFAULT 0,
  `date` datetime(0) NULL DEFAULT NULL,
  `status` enum('aktif','deleted') CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for katalog
-- ----------------------------
DROP TABLE IF EXISTS `katalog`;
CREATE TABLE `katalog`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `harga` decimal(10, 0) NOT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `kategori_id` int(0) NOT NULL DEFAULT 0,
  `rating` int(0) NOT NULL DEFAULT 0,
  `status` enum('aktif','nonaktif','deleted') CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `kategori`(`kategori_id`) USING BTREE,
  CONSTRAINT `kategori` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for kategori
-- ----------------------------
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `nama`(`nama`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for kupon
-- ----------------------------
DROP TABLE IF EXISTS `kupon`;
CREATE TABLE `kupon`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `kode` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `tipe_diskon` enum('persen','nominal') CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `nilai_diskon` decimal(10, 2) NOT NULL,
  `minimal_belanja` decimal(10, 2) NULL DEFAULT 0.00,
  `tanggal_mulai` datetime(0) NOT NULL,
  `tanggal_berakhir` datetime(0) NOT NULL,
  `status` enum('aktif','nonaktif','deleted') CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT 'aktif',
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `updated_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `kode`(`kode`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Procedure structure for AddKatalog
-- ----------------------------
DROP PROCEDURE IF EXISTS `AddKatalog`;
delimiter ;;
CREATE PROCEDURE `AddKatalog`(IN k_nama VARCHAR(100),
  IN k_deskripsi TEXT,
  IN k_harga INT,
  IN k_gambar VARCHAR(255),
  IN k_kategori_id INT,
  IN k_status ENUM('aktif', 'nonaktif', 'deleted'))
BEGIN
  INSERT INTO katalog (nama, deskripsi, harga, gambar, kategori_id, status, created_at)
  VALUES (k_nama, k_deskripsi, k_harga, k_gambar, k_kategori_id, k_status, NOW());
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for AddKategori
-- ----------------------------
DROP PROCEDURE IF EXISTS `AddKategori`;
delimiter ;;
CREATE PROCEDURE `AddKategori`(IN k_nama VARCHAR(100),
  IN k_deskripsi TEXT)
BEGIN
  INSERT INTO kategori (nama, deskripsi, created_at)
  VALUES (k_nama, k_deskripsi, NOW());
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for AddKupon
-- ----------------------------
DROP PROCEDURE IF EXISTS `AddKupon`;
delimiter ;;
CREATE PROCEDURE `AddKupon`(IN k_kode VARCHAR(50),
  IN k_deskripsi TEXT,
  IN k_tipediskon ENUM('persen', 'nominal'),
  IN k_nilai_diskon DECIMAL(10,2),
  IN k_minimal_belanja DECIMAL(10,2),
  IN k_tanggal_mulai DATE,
  IN k_tanggal_berakhir DATE,
  IN k_status ENUM('aktif', 'nonaktif','deleted'))
BEGIN
  INSERT INTO kupon (kode, deskripsi, tipe_diskon, nilai_diskon, minimal_belanja, tanggal_mulai, tanggal_berakhir, status, created_at)
  VALUES (k_kode, k_deskripsi, k_tipediskon, k_nilai_diskon, k_minimal_belanja, k_tanggal_mulai, k_tanggal_berakhir, k_status, NOW());
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for ChangePassword
-- ----------------------------
DROP PROCEDURE IF EXISTS `ChangePassword`;
delimiter ;;
CREATE PROCEDURE `ChangePassword`(IN p_id INT,
    IN p_password_new VARCHAR(255))
BEGIN
		IF EXISTS (SELECT 1 FROM akun WHERE id = p_id) THEN
        UPDATE akun SET password = p_password_new WHERE id = p_id;
    ELSE
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'ID tidak ditemukan!';
    END IF;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for ChangeUsername
-- ----------------------------
DROP PROCEDURE IF EXISTS `ChangeUsername`;
delimiter ;;
CREATE PROCEDURE `ChangeUsername`(IN p_id INT,
    IN p_username_new VARCHAR(255))
BEGIN
		IF EXISTS (SELECT 1 FROM akun WHERE id = p_id) THEN
        UPDATE akun SET nama = p_username_new WHERE id = p_id;
    ELSE
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'ID tidak ditemukan!';
    END IF;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for CountAkun
-- ----------------------------
DROP PROCEDURE IF EXISTS `CountAkun`;
delimiter ;;
CREATE PROCEDURE `CountAkun`()
BEGIN
	SELECT COUNT(*) AS total_akun FROM akun WHERE status != 'deleted';
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for CountKatalog
-- ----------------------------
DROP PROCEDURE IF EXISTS `CountKatalog`;
delimiter ;;
CREATE PROCEDURE `CountKatalog`()
BEGIN
	SELECT COUNT(*) AS total_katalog FROM katalog where status != 'deleted';
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for CountKategori
-- ----------------------------
DROP PROCEDURE IF EXISTS `CountKategori`;
delimiter ;;
CREATE PROCEDURE `CountKategori`()
BEGIN
	SELECT COUNT(*) AS total_kategori FROM kategori;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for CountKupon
-- ----------------------------
DROP PROCEDURE IF EXISTS `CountKupon`;
delimiter ;;
CREATE PROCEDURE `CountKupon`()
BEGIN
	SELECT COUNT(*) AS total_kupon FROM kupon where status != 'deleted';
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for CreateAkun
-- ----------------------------
DROP PROCEDURE IF EXISTS `CreateAkun`;
delimiter ;;
CREATE PROCEDURE `CreateAkun`(IN p_nama VARCHAR(100),
  IN p_email VARCHAR(100),
  IN p_password VARCHAR(255),
  IN p_telepon VARCHAR(20))
BEGIN
	IF EXISTS (SELECT 1 FROM akun WHERE email = p_email) THEN
    SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Email sudah terdaftar, gunakan email lain';
  ELSE
    INSERT INTO akun (nama, email, password, telepon, created_at, status)
    VALUES (p_nama, p_email, p_password, p_telepon, NOW(), 'aktif');
  END IF;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for DeleteAkun
-- ----------------------------
DROP PROCEDURE IF EXISTS `DeleteAkun`;
delimiter ;;
CREATE PROCEDURE `DeleteAkun`(IN p_id INT)
BEGIN
	IF EXISTS (SELECT 1 FROM akun WHERE id = p_id) THEN
			UPDATE akun
				SET 
					deleted_at = NOW(),
					status = 'deleted'
      WHERE id = p_id;
	ELSE
		SIGNAL SQLSTATE '45000' 
        SET MESSAGE_TEXT = 'ID Tidak ditemukan, terjadi kesalahan!';
	END IF;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for DeleteKatalog
-- ----------------------------
DROP PROCEDURE IF EXISTS `DeleteKatalog`;
delimiter ;;
CREATE PROCEDURE `DeleteKatalog`(IN k_id INT)
BEGIN
	IF EXISTS (SELECT 1 FROM katalog WHERE id = k_id) THEN
			UPDATE katalog
				SET status = 'deleted'
      WHERE id = k_id;
	ELSE
		SIGNAL SQLSTATE '45000' 
        SET MESSAGE_TEXT = 'ID Tidak ditemukan, terjadi kesalahan!';
	END IF;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for DeleteKupon
-- ----------------------------
DROP PROCEDURE IF EXISTS `DeleteKupon`;
delimiter ;;
CREATE PROCEDURE `DeleteKupon`(IN k_id INT)
BEGIN
	IF EXISTS (SELECT 1 FROM kupon WHERE id = k_id) THEN
			UPDATE kupon
				SET status = 'deleted'
      WHERE id = k_id;
	ELSE
		SIGNAL SQLSTATE '45000' 
        SET MESSAGE_TEXT = 'ID Tidak ditemukan, terjadi kesalahan!';
	END IF;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for GetAkun
-- ----------------------------
DROP PROCEDURE IF EXISTS `GetAkun`;
delimiter ;;
CREATE PROCEDURE `GetAkun`()
BEGIN
  SELECT * FROM Akun where status != 'deleted';
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for GetKatalog
-- ----------------------------
DROP PROCEDURE IF EXISTS `GetKatalog`;
delimiter ;;
CREATE PROCEDURE `GetKatalog`()
BEGIN
  SELECT * FROM katalog where status != 'deleted';
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for GetKategori
-- ----------------------------
DROP PROCEDURE IF EXISTS `GetKategori`;
delimiter ;;
CREATE PROCEDURE `GetKategori`()
BEGIN
  SELECT id,nama FROM kategori;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for GetKupon
-- ----------------------------
DROP PROCEDURE IF EXISTS `GetKupon`;
delimiter ;;
CREATE PROCEDURE `GetKupon`()
BEGIN
  SELECT * FROM kupon where status != 'deleted';
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for GetLogin
-- ----------------------------
DROP PROCEDURE IF EXISTS `GetLogin`;
delimiter ;;
CREATE PROCEDURE `GetLogin`(IN p_email VARCHAR(100))
BEGIN
  SELECT *
  FROM akun
  WHERE email = p_email and status != 'deleted'
  LIMIT 1;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for UpdateAkun
-- ----------------------------
DROP PROCEDURE IF EXISTS `UpdateAkun`;
delimiter ;;
CREATE PROCEDURE `UpdateAkun`(IN p_id INT,
    IN p_nama VARCHAR(100),
    IN p_email VARCHAR(100),
    IN p_role INT,
    IN p_password VARCHAR(255),
		IN p_bitepay INT,
		IN p_point INT)
BEGIN
	IF EXISTS (SELECT 1 FROM akun WHERE id = p_id) THEN
        IF p_password IS NULL OR p_password = '' THEN
            UPDATE akun
            SET 
                nama = p_nama,
                email = p_email,
                role = p_role,
								bitepay = bitepay + p_bitepay,
								point = point + p_point
            WHERE id = p_id;
        ELSE
            UPDATE akun
            SET 
                nama = p_nama,
                email = p_email,
                role = p_role,
                password = p_password,
								bitepay = bitepay + p_bitepay,
								point = point + p_point
            WHERE id = p_id;
        END IF;
	ELSE
		SIGNAL SQLSTATE '45000' 
        SET MESSAGE_TEXT = 'ID Tidak ditemukan, terjadi kesalahan!';
	END IF;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for UpdateKatalog
-- ----------------------------
DROP PROCEDURE IF EXISTS `UpdateKatalog`;
delimiter ;;
CREATE PROCEDURE `UpdateKatalog`(IN k_id INT,
  IN k_nama VARCHAR(100),
  IN k_deskripsi TEXT,
  IN k_harga INT,
  IN k_gambar VARCHAR(255),
  IN k_kategori_id INT,
  IN k_status ENUM('aktif', 'nonaktif'))
BEGIN
  IF EXISTS (SELECT 1 FROM katalog WHERE id = k_id) THEN


    IF (k_gambar IS NULL OR k_gambar = '') THEN
      UPDATE katalog
      SET nama = k_nama,
          deskripsi = k_deskripsi,
          harga = k_harga,
          kategori_id = k_kategori_id,
          status = k_status
      WHERE id = k_id;
    ELSE
      UPDATE katalog
      SET nama = k_nama,
          deskripsi = k_deskripsi,
          harga = k_harga,
          gambar = k_gambar,
          kategori_id = k_kategori_id,
          status = k_status
      WHERE id = k_id;
    END IF;

  ELSE
    SIGNAL SQLSTATE '45000'
      SET MESSAGE_TEXT = 'ID Tidak ditemukan, terjadi kesalahan!';
  END IF;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for UpdateKupon
-- ----------------------------
DROP PROCEDURE IF EXISTS `UpdateKupon`;
delimiter ;;
CREATE PROCEDURE `UpdateKupon`(IN k_id INT,
  IN k_kode VARCHAR(50),
  IN k_deskripsi TEXT,
  IN k_tipediskon ENUM('persen', 'nominal'),
  IN k_nilai_diskon DECIMAL(10,2),
  IN k_minimal_belanja DECIMAL(10,2),
  IN k_tanggal_mulai DATE,
  IN k_tanggal_berakhir DATE,
  IN k_status ENUM('aktif', 'nonaktif','deleted'))
BEGIN
  IF EXISTS (SELECT 1 FROM kupon WHERE id = k_id) THEN
		UPDATE kupon
		SET kode = k_kode,
				deskripsi = k_deskripsi,
				tipe_diskon = k_tipediskon,
				nilai_diskon = k_nilai_diskon,
				minimal_belanja = k_minimal_belanja,
				tanggal_mulai = k_tanggal_mulai,
				tanggal_berakhir = k_tanggal_berakhir,
				status = k_status
		WHERE id = k_id;
  ELSE
    SIGNAL SQLSTATE '45000'
      SET MESSAGE_TEXT = 'ID Tidak ditemukan, terjadi kesalahan!';
  END IF;
END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
