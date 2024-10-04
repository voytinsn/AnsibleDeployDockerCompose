CREATE DATABASE example_db;
USE example_db;

CREATE TABLE `phonebook` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

ALTER TABLE `phonebook`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `phonebook`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;
