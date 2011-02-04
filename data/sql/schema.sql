CREATE TABLE `character` (`id` BIGINT AUTO_INCREMENT, `name` VARCHAR(255) NOT NULL, `gender` VARCHAR(255) NOT NULL, `actor_id` BIGINT NOT NULL, `production_id` BIGINT NOT NULL, `created_at` DATETIME NOT NULL, `updated_at` DATETIME NOT NULL, INDEX `actor_id_idx` (`actor_id`), INDEX `production_id_idx` (`production_id`), PRIMARY KEY(`id`)) ENGINE = INNODB;
CREATE TABLE `collaboration` (`id` BIGINT AUTO_INCREMENT, `name` VARCHAR(255) NOT NULL, `description` TEXT, PRIMARY KEY(`id`)) ENGINE = INNODB;
CREATE TABLE `company` (`id` BIGINT AUTO_INCREMENT, `name` VARCHAR(255) NOT NULL, `email` VARCHAR(255), `telephone` VARCHAR(255), `mobile` VARCHAR(255), `address_line_1` VARCHAR(255), `address_line_2` VARCHAR(255), `address_line_3` VARCHAR(255), `address_line_4` VARCHAR(255), `post_code` VARCHAR(20), `description` TEXT, `created_at` DATETIME NOT NULL, `updated_at` DATETIME NOT NULL, PRIMARY KEY(`id`)) ENGINE = INNODB;
CREATE TABLE `genre` (`id` BIGINT AUTO_INCREMENT, `name` VARCHAR(255) NOT NULL, PRIMARY KEY(`id`)) ENGINE = INNODB;
CREATE TABLE `image` (`id` BIGINT AUTO_INCREMENT, `title` VARCHAR(255) NOT NULL, `caption` VARCHAR(255), `production_id` BIGINT, `person_id` BIGINT, `path` VARCHAR(255) NOT NULL, `created_at` DATETIME NOT NULL, `updated_at` DATETIME NOT NULL, `slug` VARCHAR(255), UNIQUE INDEX `image_sluggable_idx` (`slug`), PRIMARY KEY(`id`)) ENGINE = INNODB;
CREATE TABLE `layout` (`id` BIGINT AUTO_INCREMENT, `name` VARCHAR(255) NOT NULL, `venue_id` BIGINT NOT NULL, `capacity` BIGINT, INDEX `venue_id_idx` (`venue_id`), PRIMARY KEY(`id`)) ENGINE = INNODB;
CREATE TABLE `person` (`id` BIGINT AUTO_INCREMENT, `name` VARCHAR(255) NOT NULL, `image_id` BIGINT, `email` VARCHAR(255), `telephone` VARCHAR(255), `gender` VARCHAR(255) NOT NULL, `created_at` DATETIME NOT NULL, `updated_at` DATETIME NOT NULL, INDEX `image_id_idx` (`image_id`), PRIMARY KEY(`id`)) ENGINE = INNODB;
CREATE TABLE `production` (`id` BIGINT AUTO_INCREMENT, `name` VARCHAR(255) NOT NULL, `type_id` BIGINT, `genre_id` BIGINT, `layout_id` BIGINT, `company_id` BIGINT, `collaboration_id` BIGINT, `image_id` BIGINT, `director_id` BIGINT, `producer_id` BIGINT, `technician_id` BIGINT, `description` TEXT, `start_at` datetime, `end_at` datetime, `fundraiser` TINYINT(1) DEFAULT '0', `adult_ticket_price` FLOAT(18, 2), `child_ticket_price` FLOAT(18, 2), `student_ticket_price` FLOAT(18, 2), `funding` TEXT, `notes` TEXT, `gross_income` FLOAT(18, 2), `created_at` DATETIME NOT NULL, `updated_at` DATETIME NOT NULL, INDEX `type_id_idx` (`type_id`), INDEX `genre_id_idx` (`genre_id`), INDEX `layout_id_idx` (`layout_id`), INDEX `company_id_idx` (`company_id`), INDEX `collaboration_id_idx` (`collaboration_id`), INDEX `image_id_idx` (`image_id`), INDEX `director_id_idx` (`director_id`), INDEX `producer_id_idx` (`producer_id`), INDEX `technician_id_idx` (`technician_id`), PRIMARY KEY(`id`)) ENGINE = INNODB;
CREATE TABLE `production_sponsor` (`production_id` BIGINT, `sponsor_id` BIGINT, PRIMARY KEY(`production_id`, `sponsor_id`)) ENGINE = INNODB;
CREATE TABLE `sponsor` (`id` BIGINT AUTO_INCREMENT, `name` VARCHAR(255) NOT NULL, `created_at` DATETIME NOT NULL, `updated_at` DATETIME NOT NULL, PRIMARY KEY(`id`)) ENGINE = INNODB;
CREATE TABLE `type` (`id` BIGINT AUTO_INCREMENT, `name` VARCHAR(255) NOT NULL, PRIMARY KEY(`id`)) ENGINE = INNODB;
CREATE TABLE `venue` (`id` BIGINT AUTO_INCREMENT, `name` VARCHAR(255) NOT NULL, `email` VARCHAR(255), `telephone` VARCHAR(255), `mobile` VARCHAR(255), `address_line_1` VARCHAR(255), `address_line_2` VARCHAR(255), `address_line_3` VARCHAR(255), `address_line_4` VARCHAR(255), `post_code` VARCHAR(20), PRIMARY KEY(`id`)) ENGINE = INNODB;
CREATE TABLE `sf_guard_forgot_password` (`id` BIGINT AUTO_INCREMENT, `user_id` BIGINT NOT NULL, `unique_key` VARCHAR(255), `expires_at` DATETIME NOT NULL, `created_at` DATETIME NOT NULL, `updated_at` DATETIME NOT NULL, INDEX `user_id_idx` (`user_id`), PRIMARY KEY(`id`)) ENGINE = INNODB;
CREATE TABLE `sf_guard_group` (`id` BIGINT AUTO_INCREMENT, `name` VARCHAR(255) UNIQUE, `description` TEXT, `created_at` DATETIME NOT NULL, `updated_at` DATETIME NOT NULL, PRIMARY KEY(`id`)) ENGINE = INNODB;
CREATE TABLE `sf_guard_group_permission` (`group_id` BIGINT, `permission_id` BIGINT, `created_at` DATETIME NOT NULL, `updated_at` DATETIME NOT NULL, PRIMARY KEY(`group_id`, `permission_id`)) ENGINE = INNODB;
CREATE TABLE `sf_guard_permission` (`id` BIGINT AUTO_INCREMENT, `name` VARCHAR(255) UNIQUE, `description` TEXT, `created_at` DATETIME NOT NULL, `updated_at` DATETIME NOT NULL, PRIMARY KEY(`id`)) ENGINE = INNODB;
CREATE TABLE `sf_guard_remember_key` (`id` BIGINT AUTO_INCREMENT, `user_id` BIGINT, `remember_key` VARCHAR(32), `ip_address` VARCHAR(50), `created_at` DATETIME NOT NULL, `updated_at` DATETIME NOT NULL, INDEX `user_id_idx` (`user_id`), PRIMARY KEY(`id`)) ENGINE = INNODB;
CREATE TABLE `sf_guard_user` (`id` BIGINT AUTO_INCREMENT, `first_name` VARCHAR(255), `last_name` VARCHAR(255), `email_address` VARCHAR(255) NOT NULL UNIQUE, `username` VARCHAR(128) NOT NULL UNIQUE, `algorithm` VARCHAR(128) DEFAULT 'sha1' NOT NULL, `salt` VARCHAR(128), `password` VARCHAR(128), `is_active` TINYINT(1) DEFAULT '1', `is_super_admin` TINYINT(1) DEFAULT '0', `last_login` DATETIME, `created_at` DATETIME NOT NULL, `updated_at` DATETIME NOT NULL, INDEX `is_active_idx_idx` (`is_active`), PRIMARY KEY(`id`)) ENGINE = INNODB;
CREATE TABLE `sf_guard_user_group` (`user_id` BIGINT, `group_id` BIGINT, `created_at` DATETIME NOT NULL, `updated_at` DATETIME NOT NULL, PRIMARY KEY(`user_id`, `group_id`)) ENGINE = INNODB;
CREATE TABLE `sf_guard_user_permission` (`user_id` BIGINT, `permission_id` BIGINT, `created_at` DATETIME NOT NULL, `updated_at` DATETIME NOT NULL, PRIMARY KEY(`user_id`, `permission_id`)) ENGINE = INNODB;
ALTER TABLE `character` ADD CONSTRAINT `character_production_id_production_id` FOREIGN KEY (`production_id`) REFERENCES `production`(`id`);
ALTER TABLE `character` ADD CONSTRAINT `character_actor_id_person_id` FOREIGN KEY (`actor_id`) REFERENCES `person`(`id`);
ALTER TABLE `layout` ADD CONSTRAINT `layout_venue_id_venue_id` FOREIGN KEY (`venue_id`) REFERENCES `venue`(`id`);
ALTER TABLE `person` ADD CONSTRAINT `person_image_id_image_id` FOREIGN KEY (`image_id`) REFERENCES `image`(`id`);
ALTER TABLE `production` ADD CONSTRAINT `production_type_id_type_id` FOREIGN KEY (`type_id`) REFERENCES `type`(`id`);
ALTER TABLE `production` ADD CONSTRAINT `production_technician_id_person_id` FOREIGN KEY (`technician_id`) REFERENCES `person`(`id`);
ALTER TABLE `production` ADD CONSTRAINT `production_producer_id_person_id` FOREIGN KEY (`producer_id`) REFERENCES `person`(`id`);
ALTER TABLE `production` ADD CONSTRAINT `production_layout_id_layout_id` FOREIGN KEY (`layout_id`) REFERENCES `layout`(`id`);
ALTER TABLE `production` ADD CONSTRAINT `production_image_id_image_id` FOREIGN KEY (`image_id`) REFERENCES `image`(`id`);
ALTER TABLE `production` ADD CONSTRAINT `production_genre_id_genre_id` FOREIGN KEY (`genre_id`) REFERENCES `genre`(`id`);
ALTER TABLE `production` ADD CONSTRAINT `production_director_id_person_id` FOREIGN KEY (`director_id`) REFERENCES `person`(`id`);
ALTER TABLE `production` ADD CONSTRAINT `production_company_id_company_id` FOREIGN KEY (`company_id`) REFERENCES `company`(`id`);
ALTER TABLE `production` ADD CONSTRAINT `production_collaboration_id_collaboration_id` FOREIGN KEY (`collaboration_id`) REFERENCES `collaboration`(`id`);
ALTER TABLE `production_sponsor` ADD CONSTRAINT `production_sponsor_sponsor_id_sponsor_id` FOREIGN KEY (`sponsor_id`) REFERENCES `sponsor`(`id`);
ALTER TABLE `production_sponsor` ADD CONSTRAINT `production_sponsor_production_id_production_id` FOREIGN KEY (`production_id`) REFERENCES `production`(`id`);
ALTER TABLE `sf_guard_forgot_password` ADD CONSTRAINT `sf_guard_forgot_password_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user`(`id`) ON DELETE CASCADE;
ALTER TABLE `sf_guard_group_permission` ADD CONSTRAINT `sf_guard_group_permission_permission_id_sf_guard_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission`(`id`) ON DELETE CASCADE;
ALTER TABLE `sf_guard_group_permission` ADD CONSTRAINT `sf_guard_group_permission_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group`(`id`) ON DELETE CASCADE;
ALTER TABLE `sf_guard_remember_key` ADD CONSTRAINT `sf_guard_remember_key_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user`(`id`) ON DELETE CASCADE;
ALTER TABLE `sf_guard_user_group` ADD CONSTRAINT `sf_guard_user_group_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user`(`id`) ON DELETE CASCADE;
ALTER TABLE `sf_guard_user_group` ADD CONSTRAINT `sf_guard_user_group_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group`(`id`) ON DELETE CASCADE;
ALTER TABLE `sf_guard_user_permission` ADD CONSTRAINT `sf_guard_user_permission_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user`(`id`) ON DELETE CASCADE;
ALTER TABLE `sf_guard_user_permission` ADD CONSTRAINT `sf_guard_user_permission_permission_id_sf_guard_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission`(`id`) ON DELETE CASCADE;
