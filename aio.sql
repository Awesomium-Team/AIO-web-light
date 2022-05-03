-- phpMyAdmin SQL Dumper
-- version 5.1.1 mod by MrKuBu
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 03 2022 г., 21:00
-- Версия сервера: 10.4.22-MariaDB
-- Версия PHP: 8.1.2 mod by MrKuBu

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `new_sql`
--

-- --------------------------------------------------------

--
-- Структура таблицы `aio_bans`
--

CREATE TABLE `aio_bans` (
  `Name` text NOT NULL,
  `SteamID` varchar(20) NOT NULL,
  `Reasons` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `aio_bans`
--

INSERT INTO `aio_bans` (`Name`, `SteamID`, `Reasons`) VALUES
('Bonifacy', 'STEAM_0:0:66238153', 'LuaRun-er and Hacks'),
('vosrhd9', 'STEAM_0:1:154756330', 'LuaRun-er'),
('*', 'STEAM_0:1:179482706', 'LuaRun-er and Hacks');

-- --------------------------------------------------------

--
-- Структура таблицы `aio_users`
--

CREATE TABLE `aio_users` (
  `SteamName` text NOT NULL,
  `SteamID` varchar(255) NOT NULL,
  `Group` text NOT NULL,
  `Sumbit1` text NOT NULL,
  `Sumbit2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `aio_users`
--

INSERT INTO `aio_users` (`SteamName`, `SteamID`, `Group`, `Sumbit1`, `Sumbit2`) VALUES
('MrKuBu', '76561198107751293', 'admin', '[]', '[]');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `aio_bans`
--
ALTER TABLE `aio_bans`
  ADD PRIMARY KEY (`SteamID`);

--
-- Индексы таблицы `aio_users`
--
ALTER TABLE `aio_users`
  ADD PRIMARY KEY (`SteamID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
