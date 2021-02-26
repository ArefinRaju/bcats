-- ---
-- Table 'users'
--
-- ---

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` INTEGER AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL UNIQUE,
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

-- ---
-- Table 'projects'
--
-- ---

DROP TABLE IF EXISTS `projects`;

CREATE TABLE `projects` (
  `id` INTEGER AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `type` VARCHAR(255) NOT NULL,
  `budget` DECIMAL(14,2) NOT NULL DEFAULT 0,
  `deadline` DATE NOT NULL,
  `status` VARCHAR(30) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);

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
  `project_id` INTEGER NULL DEFAULT NULL,
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
  `total` DECIMAL(14,2) NOT NULL DEFAULT 0,
  `due` DECIMAL(14,2) NOT NULL DEFAULT 0,
  `required` DECIMAL(14,2) NOT NULL DEFAULT 0,
  `credit` DECIMAL(14,2) NOT NULL DEFAULT 0,
  `debit` DECIMAL(14,2) NOT NULL DEFAULT 0,
  `type` VARCHAR(30) NOT NULL,
  `comment` VARCHAR(255) NULL DEFAULT NULL,
  `is_fund` TINYINT(1) NOT NULL,
  `by_user` INTEGER NULL DEFAULT NULL,
  `user_id` INTEGER NULL DEFAULT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `project_id` INTEGER NULL DEFAULT NULL,
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
  `payees_id` INTEGER NULL DEFAULT NULL,
  `user_id` INTEGER NULL DEFAULT NULL,
  `material_id` INTEGER NULL DEFAULT NULL,
  `total` DECIMAL(14,2) NOT NULL DEFAULT 0,
  `required` DECIMAL(14,2) NOT NULL DEFAULT 0,
  `credit` DECIMAL(14,2) NOT NULL DEFAULT 0,
  `debit` DECIMAL(14,2) NOT NULL DEFAULT 0,
  `comment` VARCHAR(255) NULL DEFAULT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `project_id` INTEGER NULL DEFAULT NULL,
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
  `adresses` VARCHAR(255) NOT NULL,
  `mobile` VARCHAR(255) NOT NULL,
  `paid` DECIMAL(14,2) NOT NULL DEFAULT 0,
  `type` VARCHAR(30) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);

-- ---
-- Foreign Keys
-- ---

ALTER TABLE `users` ADD FOREIGN KEY (project_id) REFERENCES `projects` (`id`);
ALTER TABLE `project_users` ADD FOREIGN KEY (user_id) REFERENCES `users` (`id`);
ALTER TABLE `project_users` ADD FOREIGN KEY (project_id) REFERENCES `projects` (`id`);
ALTER TABLE `accounts` ADD FOREIGN KEY (payee_id) REFERENCES `payees` (`id`);
ALTER TABLE `accounts` ADD FOREIGN KEY (by_user) REFERENCES `users` (`id`);
ALTER TABLE `accounts` ADD FOREIGN KEY (user_id) REFERENCES `users` (`id`);
ALTER TABLE `accounts` ADD FOREIGN KEY (project_id) REFERENCES `projects` (`id`);
ALTER TABLE `material_histories` ADD FOREIGN KEY (payees_id) REFERENCES `payees` (`id`);
ALTER TABLE `material_histories` ADD FOREIGN KEY (user_id) REFERENCES `users` (`id`);
ALTER TABLE `material_histories` ADD FOREIGN KEY (material_id) REFERENCES `materials` (`id`);
ALTER TABLE `material_histories` ADD FOREIGN KEY (project_id) REFERENCES `projects` (`id`);