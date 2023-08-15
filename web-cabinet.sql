-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 15 2023 г., 18:59
-- Версия сервера: 10.8.4-MariaDB
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `web-cabinet`
--

-- --------------------------------------------------------

--
-- Структура таблицы `claims`
--

CREATE TABLE `claims` (
  `claim_id` int(11) NOT NULL,
  `organization_id` int(11) DEFAULT NULL,
  `manager_id` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_creation` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `claims`
--

INSERT INTO `claims` (`claim_id`, `organization_id`, `manager_id`, `description`, `date_of_creation`) VALUES
(1, 1, 2, 'Продать чего-нибудь на 3000 у.е.', '2023-08-15 15:25:06'),
(2, 3, 3, 'Заявка номер1', '2023-08-15 15:58:46');

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1692112691),
('m230809_180655_create_positions_table', 1692112693),
('m230811_191936_create_users_table', 1692112693),
('m230812_171508_create_organizations_table', 1692112693),
('m230813_080646_create_claims_table', 1692112693);

-- --------------------------------------------------------

--
-- Структура таблицы `organizations`
--

CREATE TABLE `organizations` (
  `organization_id` int(11) NOT NULL,
  `identification_tax_number` bigint(100) DEFAULT NULL,
  `organization_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `director_last_name` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `director_first_name` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `director_surname` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `organizations`
--

INSERT INTO `organizations` (`organization_id`, `identification_tax_number`, `organization_name`, `director_last_name`, `director_first_name`, `director_surname`) VALUES
(1, 987654132, 'ООО \"Три Топора\"', 'Сидоров', 'Петр', 'Петрович'),
(2, 12345678, 'ООО \"Строй-Ломай\"', 'Петров', 'Анатолий', 'Иванович'),
(3, 50291033433, 'ООО \"Фикс-Ремонт\"', 'Алексеев ', 'Никита ', 'Глебович'),
(4, 169252666903, 'ООО \"Миграции\"', 'Тихонов ', 'Степан ', 'Кириллович');

-- --------------------------------------------------------

--
-- Структура таблицы `positions`
--

CREATE TABLE `positions` (
  `position_id` int(11) NOT NULL,
  `position` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `positions`
--

INSERT INTO `positions` (`position_id`, `position`, `description`) VALUES
(1, 'PHP-Разработчик', 'Пишет код на пыхе'),
(2, 'Менеджер', 'Прорабатывает обращения'),
(3, 'Frontend-Разработчик', 'Реализует пользовательские интерфейсы с помощью программного кода'),
(4, 'Project-Менеджер', 'Ведет проекты');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` char(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` char(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surname` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position_id` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `last_name`, `first_name`, `surname`, `position_id`) VALUES
(1, 'admin', '$2y$13$HNDedHi5jK2W5y880fgSR.MdBfKDanFoTH3r.s9V0EXu5IzDKKkKG', 'Чистяков', 'Евгений', 'Вячеславович', 1),
(2, 'dmitriy123', '$2y$13$nLKwMHVCSzS9UsNSCPUv1uMOB9nuXWnbaN2/CNpuqR5ASL9ZJ47D2', 'Павлов', 'Дмитрий', 'Алексеевич', 2),
(3, 'nikolay123', '$2y$13$5yjCPaE6GLDFj/R/f9RTO.0D8d9XBJCSbcLMA4ZCvyNWHAJCKmSUS', 'Смирнов ', 'Николай ', 'Тихонович', 3),
(4, 'arty123', '$2y$13$UrYKTwfCjlN7nXjhpWc7xujG5g87hFOzImMYau694ZVgusKV.j6NW', 'Соловьев ', 'Артём ', 'Алексеевич', 4);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `claims`
--
ALTER TABLE `claims`
  ADD PRIMARY KEY (`claim_id`),
  ADD KEY `fk-organization_id` (`organization_id`),
  ADD KEY `fk-manager_id` (`manager_id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`organization_id`);

--
-- Индексы таблицы `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`position_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `fk-position_id` (`position_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `claims`
--
ALTER TABLE `claims`
  MODIFY `claim_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `organizations`
--
ALTER TABLE `organizations`
  MODIFY `organization_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `positions`
--
ALTER TABLE `positions`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `claims`
--
ALTER TABLE `claims`
  ADD CONSTRAINT `fk-manager_id` FOREIGN KEY (`manager_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-organization_id` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`organization_id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk-position_id` FOREIGN KEY (`position_id`) REFERENCES `positions` (`position_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
