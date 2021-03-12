-- SQL Dump
-- version 5.0.2
--
-- сервера: 8.0.23
-- PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- db name: `auth-test`
--

-- --------------------------------------------------------

--
-- table `users`
--

CREATE TABLE `users` (
         `id` int NOT NULL,
         `username` varchar(50) NOT NULL,
         `name` varchar(255) NOT NULL,
         `email` varchar(100) NOT NULL,
         `password` varchar(255) NOT NULL,
         `published` tinyint(1) NOT NULL DEFAULT '0',
         `created_at` timestamp NULL DEFAULT NULL,
         `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `password`, `published`, `created_at`, `updated_at`) VALUES
(1, 'mukhin', 'Sergey', '1234@1234.ru', '$2y$10$cFIzd2EySEJ2WHRDRExzdOHnooK7KgygTn3iJnSRXzETmAEpKiVua', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- table `users_remember_tokens`
--

CREATE TABLE `users_remember_tokens` (
             `id` int NOT NULL,
             `user_id` int NOT NULL,
             `token` varchar(255) NOT NULL,
             `ip` varchar(18) NOT NULL,
             `user_agent` varchar(255) NOT NULL,
             `expired_at` timestamp NOT NULL,
             `created_at` timestamp NOT NULL,
             `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `users`
    ADD PRIMARY KEY (`id`);


ALTER TABLE `users_remember_tokens`
    ADD PRIMARY KEY (`id`),
  ADD KEY `token` (`token`),
  ADD KEY `user_id` (`user_id`);

ALTER TABLE `users`
    MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `users_remember_tokens`
    MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;
