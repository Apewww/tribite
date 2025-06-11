/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 100432
 Source Host           : localhost:3306
 Source Schema         : tribite

 Target Server Type    : MySQL
 Target Server Version : 100432
 File Encoding         : 65001

 Date: 11/06/2025 22:16:06
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for akun
-- ----------------------------
DROP TABLE IF EXISTS `akun`;
CREATE TABLE `akun`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `telepon` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0,
  `picture` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `bitepay` int(11) NOT NULL DEFAULT 0,
  `point` int(11) NOT NULL DEFAULT 0,
  `date` datetime(0) NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL,
  `metode_pembayaran` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL,
  `status` enum('aktif','deleted') CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of akun
-- ----------------------------
INSERT INTO `akun` VALUES (6, 'Rafly Anggara Putra', '$2y$10$g8tUyT9QHzRtkHP6FmpyM.LTqxlAiKKF5cLZoQ6lLcuguEjQ3OEMu', 'apewinaja@gmail.com', '+6285710789216', 1, '/tribite/assets/img/upload/profile/6.jpg', 30, 400, '2025-06-05 00:00:00', 'aaaa', NULL, 'aktif', '2025-05-26 22:22:43', NULL);
INSERT INTO `akun` VALUES (7, 'Nabila Dwi Marsono', '$2y$10$xY4JwtBs6yclZDhSfPW.UuTA7iZlUj4w8lTeI.MD66A9JuCOU1Gxe', 'nabila@gmail.com', '+6281388502890', 1, '', 500000, 0, NULL, NULL, NULL, 'aktif', '2025-05-27 07:04:41', '2025-05-31 09:12:30');
INSERT INTO `akun` VALUES (8, 'Siti Aulia', '$2y$10$jQcTjp64sTAta9Nt0f4Wg.lSDcQpuQFE9PuKIMgI9HMBFlyWvPHza', 'sauliarr03@gmail.com', '+6285864510735', 0, '', 0, 0, NULL, NULL, NULL, 'deleted', '2025-05-31 18:48:09', '2025-06-02 14:23:10');
INSERT INTO `akun` VALUES (11, 'Rafly Anggara Putra', '$2y$10$MNmtOfRTDfKNMdscfrDPfuKEALjKL94jgF2RW/CVuI0sbWOMz/Xxe', 'rafly@gmail.com', '+62857107892216', 0, '/tribite/assets/img/upload/profile/11.jpg', 0, 100, '2025-06-06 00:00:00', 'Test', NULL, 'aktif', '2025-06-06 13:43:42', NULL);
INSERT INTO `akun` VALUES (12, 'Rafi Saputra', '$2y$10$9pYs2Oc/WvF7lj9FdGVGf./NeRgeDEXI6U5ru7I7r58ZdsCplDtpi', 'srafi3225@gmail.com', '+6281387937006', 1, '/tribite/assets/img/upload/profile/12.png', 100000, 320, '2025-06-11 00:00:00', NULL, NULL, 'aktif', '2025-06-08 11:13:48', NULL);

-- ----------------------------
-- Table structure for katalog
-- ----------------------------
DROP TABLE IF EXISTS `katalog`;
CREATE TABLE `katalog`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `harga` decimal(10, 0) NOT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `kategori_id` int(11) NOT NULL DEFAULT 0,
  `rating` int(11) NOT NULL DEFAULT 0,
  `status` enum('aktif','nonaktif','deleted') CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `created_at` datetime(0) NOT NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `kategori`(`kategori_id`) USING BTREE,
  CONSTRAINT `kategori` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of katalog
-- ----------------------------
INSERT INTO `katalog` VALUES (7, 'Test', 'Test', 1000, '/tribite/assets/img/upload/Untitled.png', 1, 0, 'deleted', '2025-06-02 11:46:04', '2025-06-02 11:46:04');
INSERT INTO `katalog` VALUES (8, 'Test2', '', 10000, '/tribite/assets/img/upload/Christy_JKT48.jpg', 1, 0, 'deleted', '2025-06-02 11:47:22', '2025-06-02 11:47:22');
INSERT INTO `katalog` VALUES (9, 'Test3', '', 1000, '/tribite/assets/img/upload/Christy_JKT48.jpg', 1, 0, 'deleted', '2025-06-02 11:47:51', '2025-06-02 11:47:51');
INSERT INTO `katalog` VALUES (10, 'Test', 'Test', 20000, '/tribite/assets/img/upload/Chocolate.jpg', 2, 5, 'aktif', '2025-06-02 14:53:50', '2025-06-02 14:53:50');
INSERT INTO `katalog` VALUES (11, 'Test2', '', 300000, '/tribite/assets/img/upload/Avocado_Milkshake.webp', 2, 3, 'aktif', '2025-06-02 14:58:14', '2025-06-02 14:58:14');
INSERT INTO `katalog` VALUES (12, 'Test3', '', 30000, '/tribite/assets/img/upload/star-none.png', 1, 0, 'aktif', '2025-06-04 15:50:20', NULL);

-- ----------------------------
-- Table structure for kategori
-- ----------------------------
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `created_at` datetime(0) NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `nama`(`nama`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kategori
-- ----------------------------
INSERT INTO `kategori` VALUES (1, 'Makanan', 'Jenis Kategori untuk makanan', '2025-05-31 21:08:22');
INSERT INTO `kategori` VALUES (2, 'Minuman', 'Jenis Kategori minuman untuk minuman', '2025-05-31 21:52:50');

-- ----------------------------
-- Table structure for kupon
-- ----------------------------
DROP TABLE IF EXISTS `kupon`;
CREATE TABLE `kupon`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `tipe_diskon` enum('persen','nominal') CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `nilai_diskon` decimal(10, 2) NOT NULL,
  `minimal_belanja` decimal(10, 2) NULL DEFAULT 0,
  `tanggal_mulai` datetime(0) NOT NULL,
  `tanggal_berakhir` datetime(0) NOT NULL,
  `status` enum('aktif','nonaktif','deleted') CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT 'aktif',
  `created_at` datetime(0) NULL DEFAULT current_timestamp(0),
  `updated_at` datetime(0) NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `kode`(`kode`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kupon
-- ----------------------------
INSERT INTO `kupon` VALUES (1, 'KUPON01', '', 'nominal', 20000.00, 250000.00, '2025-06-01 00:00:00', '2025-07-03 00:00:00', 'deleted', '2025-06-01 19:52:33', '2025-06-08 13:35:53');
INSERT INTO `kupon` VALUES (3, 'TEST', '', 'nominal', 20000.00, 50000.00, '2025-06-02 00:00:00', '2025-06-10 00:00:00', 'deleted', '2025-06-02 14:11:41', '2025-06-08 13:35:55');
INSERT INTO `kupon` VALUES (5, 'KUPON001', '', 'nominal', 25000.00, 60000.00, '2025-06-02 00:00:00', '2025-06-19 00:00:00', 'deleted', '2025-06-02 14:33:07', '2025-06-08 13:50:48');
INSERT INTO `kupon` VALUES (6, 'Diskon 20%', 'Diskon 20%, Minimal Belanja 100.000rb', 'persen', 20.00, 100000.00, '2025-06-06 00:00:00', '2025-06-30 00:00:00', 'aktif', '2025-06-06 19:53:36', '2025-06-06 19:56:52');
INSERT INTO `kupon` VALUES (7, 'Diskon 50.000', 'Diskon 50.000 Minimal Belanja 100.000rb', 'nominal', 50000.00, 100000.00, '2025-06-08 00:00:00', '2025-06-30 00:00:00', 'aktif', '2025-06-06 20:25:38', '2025-06-08 14:11:04');
INSERT INTO `kupon` VALUES (8, 'Diskon 25%', 'Diskon 25%, minimal belanja 80.000rb\r\n', 'persen', 25.00, 80000.00, '2025-06-08 00:00:00', '2025-06-17 00:00:00', 'aktif', '2025-06-08 13:32:41', '2025-06-08 14:10:45');
INSERT INTO `kupon` VALUES (11, 'Diskon 30%', 'Diskon 30%, Minimal belanja 120.000', 'persen', 30.00, 120000.00, '2025-06-25 00:00:00', '2025-06-30 00:00:00', 'aktif', '2025-06-11 15:49:26', '2025-06-11 15:49:26');

-- ----------------------------
-- Table structure for reservasi
-- ----------------------------
DROP TABLE IF EXISTS `reservasi`;
CREATE TABLE `reservasi`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `kode_booking` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `tanggal` date NOT NULL,
  `jam_mulai` time(0) NOT NULL,
  `jumlah_orang` int(11) NOT NULL,
  `catatan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `status` enum('menunggu','dikonfirmasi','selesai','dibatalkan') CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT 'menunggu',
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `kode_booking`(`kode_booking`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  CONSTRAINT `reservasi_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `nama_lengkap` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `telepon` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `username`(`username`) USING BTREE,
  UNIQUE INDEX `email`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin ROW_FORMAT = Dynamic;

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
-- Procedure structure for ChangeAlamat
-- ----------------------------
DROP PROCEDURE IF EXISTS `ChangeAlamat`;
delimiter ;;
CREATE PROCEDURE `ChangeAlamat`(IN p_id INT,
    IN p_alamat_new VARCHAR(255))
BEGIN
		IF EXISTS (SELECT 1 FROM akun WHERE id = p_id) THEN
        UPDATE akun SET alamat = p_alamat_new WHERE id = p_id;
    ELSE
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'ID tidak ditemukan!';
    END IF;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for ChangeEmail
-- ----------------------------
DROP PROCEDURE IF EXISTS `ChangeEmail`;
delimiter ;;
CREATE PROCEDURE `ChangeEmail`(IN p_id INT,
    IN p_email_new VARCHAR(255))
BEGIN
		IF EXISTS (SELECT 1 FROM akun WHERE id = p_id) THEN
        UPDATE akun SET email = p_email_new WHERE id = p_id;
    ELSE
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'ID tidak ditemukan!';
    END IF;
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
-- Procedure structure for ChangeTelp
-- ----------------------------
DROP PROCEDURE IF EXISTS `ChangeTelp`;
delimiter ;;
CREATE PROCEDURE `ChangeTelp`(IN p_id INT,
    IN p_telp_new VARCHAR(255))
BEGIN
		IF EXISTS (SELECT 1 FROM akun WHERE id = p_id) THEN
        UPDATE akun SET telepon = p_telp_new WHERE id = p_id;
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
-- Procedure structure for GetAuth
-- ----------------------------
DROP PROCEDURE IF EXISTS `GetAuth`;
delimiter ;;
CREATE PROCEDURE `GetAuth`(IN p_id INT)
BEGIN
  SELECT *
  FROM akun
  WHERE id = p_id and status != 'deleted'
  LIMIT 1;
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
