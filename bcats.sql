-- ---
-- Table 'users'
--
-- ---

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
    `id` INTEGER AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `password` VARCHAR(70) NOT NULL,
    `remember_token` VARCHAR(100) NULL DEFAULT NULL,
    `mobile` VARCHAR(15) NOT NULL,
    `email` VARCHAR(255) NOT NULL UNIQUE,
    `email_verified_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    `acl` VARCHAR(50) NOT NULL,
    `contribution` DECIMAL(14,2) NOT NULL DEFAULT 0,
    `on_hold` DECIMAL(14,2) NOT NULL DEFAULT 0,
    `due` DECIMAL(14,2) NOT NULL DEFAULT 0,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `project_id` INTEGER NULL DEFAULT NULL,
    PRIMARY KEY (`id`)
);

INSERT INTO `users` (`id`, `name`, `password`, `remember_token`, `mobile`, `email`, `email_verified_at`, `acl`, `contribution`, `on_hold`, `due`, `created_at`, `updated_at`, `project_id`) VALUES
(1, 'Admin', '$2y$10$PKtPFCI.3Mh.VKrCqnOqXuQKQ/4zpD0.VoiguzFw78N2J7e6htVDS', NULL, '+8801774444000', 'admin@bcats.net', CURRENT_TIMESTAMP, 'QURNSU4=', '0.00', '0.00', '0.00', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, NULL),
(2, 'Manager', '$2y$10$kxosv25q/F3ByBkevrjHUuTu.lmOpLgZYROjhqC5t65iji3Q0fOwG', NULL, '01973939656', 'manager@bcats.net', '2021-03-20 10:06:12', 'TUFOQUdFUg==', '0.00', '0.00', '0.00', '2021-03-20 04:06:12', '2021-03-20 04:06:12', NULL),
(3, 'Project Admin', '$2y$10$TX17HIKmBd/nP1gZHzE6CObNdg1YLjb/UNO5iktOf8LieEX5C020.', NULL, '01748986541', 'project-admin@bcats.net', '2021-03-20 12:21:14', 'UFJPSkVDVF9BRE1JTg==', '0.00', '0.00', '0.00', '2021-03-20 06:21:14', '2021-03-20 06:21:14', 1);

-- ---
-- Table 'projects'
--
-- ---

DROP TABLE IF EXISTS `projects`;

CREATE TABLE `projects` (
    `id` INTEGER AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL UNIQUE,
    `type` VARCHAR(255) NOT NULL,
    `budget` DECIMAL(14,2) NOT NULL DEFAULT 0,
    `deadline` DATE NOT NULL,
    `status` VARCHAR(30) NOT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
);

INSERT INTO `projects` (`id`, `name`, `type`, `budget`, `deadline`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Project', 'BUILDING', '20000.00', '2022-11-20', 'PLANNING', '2021-03-20 06:21:14', '2021-03-20 06:21:14');

-- ---
-- Table 'project_users'
--
-- ---

DROP TABLE IF EXISTS `project_users`;

CREATE TABLE `project_users` (
    `id` INTEGER AUTO_INCREMENT,
    `user_id` INTEGER NULL DEFAULT NULL,
    `role` VARCHAR(255) NOT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `project_id` INTEGER NOT NULL,
    PRIMARY KEY (`id`)
);

-- ---
-- Table 'accounts'
--
-- ---

DROP TABLE IF EXISTS `accounts`;

CREATE TABLE `accounts` (
    `id` INTEGER AUTO_INCREMENT,
    `payee_id` INTEGER NULL DEFAULT NULL,
    `emi_id` INTEGER NULL DEFAULT NULL,
    `total` DECIMAL(14,2) NOT NULL DEFAULT 0,
    `due` DECIMAL(14,2) NOT NULL DEFAULT 0,
    `required` DECIMAL(14,2) NOT NULL DEFAULT 0,
    `credit` DECIMAL(14,2) NOT NULL DEFAULT 0,
    `debit` DECIMAL(14,2) NOT NULL DEFAULT 0,
    `type` VARCHAR(30) NOT NULL,
    `comment` VARCHAR(255) NULL DEFAULT NULL,
    `image` VARCHAR(255) NULL DEFAULT NULL,
    `is_fund` TINYINT(1) NOT NULL,
    `by_user` INTEGER NULL DEFAULT NULL,
    `user_id` INTEGER NULL DEFAULT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `project_id` INTEGER NOT NULL,
    PRIMARY KEY (`id`)
);

-- ---
-- Table 'materials'
--
-- ---

DROP TABLE IF EXISTS `materials`;

CREATE TABLE `materials` (
    `id` INTEGER AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `enum` VARCHAR(25) NULL DEFAULT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
);

-- ---
-- Table 'material_histories'
--
-- ---

DROP TABLE IF EXISTS `material_histories`;

CREATE TABLE `material_histories` (
    `id` INTEGER AUTO_INCREMENT,
    `payee_id` INTEGER NULL DEFAULT NULL,
    `payee_name` VARCHAR(255) NULL DEFAULT NULL,
    `user_id` INTEGER NOT NULL,
    `user_name` VARCHAR(255) NULL DEFAULT NULL,
    `material_id` INTEGER NULL DEFAULT NULL,
    `material_name` VARCHAR(255) NULL DEFAULT NULL,
    `total` DECIMAL(14,2) NOT NULL DEFAULT 0,
    `required` DECIMAL(14,2) NOT NULL DEFAULT 0,
    `credit` DECIMAL(14,2) NOT NULL DEFAULT 0,
    `debit` DECIMAL(14,2) NOT NULL DEFAULT 0,
    `comment` VARCHAR(255) NULL DEFAULT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `project_id` INTEGER NOT NULL,
    PRIMARY KEY (`id`)
);

-- ---
-- Table 'payees'
--
-- ---

DROP TABLE IF EXISTS `payees`;

CREATE TABLE `payees` (
    `id` INTEGER AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `address` VARCHAR(255) NOT NULL,
    `mobile` VARCHAR(255) NOT NULL,
    `paid` DECIMAL(14,2) NOT NULL DEFAULT 0,
    `type` VARCHAR(30) NOT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `project_id` INTEGER NOT NULL,
    PRIMARY KEY (`id`)
);

-- ---
-- Table 'emis'
--
-- ---

DROP TABLE IF EXISTS `emis`;

CREATE TABLE `emis` (
    `id` INTEGER AUTO_INCREMENT,
    `user_id` INTEGER NULL DEFAULT NULL,
    `value` DECIMAL(14,2) NOT NULL,
    `status` VARCHAR(30) NULL DEFAULT NULL,
    `date` DATE NOT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `project_id` INTEGER NOT NULL,
    PRIMARY KEY (`id`)
);

-- ---
-- Foreign Keys
-- ---

ALTER TABLE `users` ADD FOREIGN KEY (project_id) REFERENCES `projects` (`id`);
ALTER TABLE `project_users` ADD FOREIGN KEY (user_id) REFERENCES `users` (`id`);
ALTER TABLE `project_users` ADD FOREIGN KEY (project_id) REFERENCES `projects` (`id`);
ALTER TABLE `accounts` ADD FOREIGN KEY (payee_id) REFERENCES `payees` (`id`);
ALTER TABLE `accounts` ADD FOREIGN KEY (emi_id) REFERENCES `emis` (`id`);
ALTER TABLE `accounts` ADD FOREIGN KEY (by_user) REFERENCES `users` (`id`);
ALTER TABLE `accounts` ADD FOREIGN KEY (user_id) REFERENCES `users` (`id`);
ALTER TABLE `accounts` ADD FOREIGN KEY (project_id) REFERENCES `projects` (`id`);
ALTER TABLE `material_histories` ADD FOREIGN KEY (payee_id) REFERENCES `payees` (`id`);
ALTER TABLE `material_histories` ADD FOREIGN KEY (user_id) REFERENCES `users` (`id`);
ALTER TABLE `material_histories` ADD FOREIGN KEY (material_id) REFERENCES `materials` (`id`);
ALTER TABLE `material_histories` ADD FOREIGN KEY (project_id) REFERENCES `projects` (`id`);
ALTER TABLE `payees` ADD FOREIGN KEY (project_id) REFERENCES `projects` (`id`);
ALTER TABLE `emis` ADD FOREIGN KEY (user_id) REFERENCES `users` (`id`);
ALTER TABLE `emis` ADD FOREIGN KEY (project_id) REFERENCES `projects` (`id`);