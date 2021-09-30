-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2021-09-18 13:08:53
-- サーバのバージョン： 10.4.21-MariaDB
-- PHP のバージョン: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gsacs_d03_03`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `kadai_table`
--

CREATE TABLE `kadai_table` (
  `id` int(12) NOT NULL,
  `todo` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `iken` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `kadai_table`
--

INSERT INTO `kadai_table` (`id`, `todo`, `deadline`, `created_at`, `updated_at`, `iken`) VALUES
(1, 'raea', '2021-09-30', '2021-09-18 17:41:20', '2021-09-18 17:41:20', 'ara'),
(2, 'らえあ', '2021-09-01', '2021-09-18 17:51:20', '2021-09-18 17:51:20', 'あら'),
(3, 'カナイ', '2021-09-15', '2021-09-18 17:54:59', '2021-09-18 17:54:59', '美味しい'),
(4, '金井', '2021-09-18', '2021-09-18 20:07:34', '2021-09-18 20:07:34', '美味しい');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `kadai_table`
--
ALTER TABLE `kadai_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `kadai_table`
--
ALTER TABLE `kadai_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
