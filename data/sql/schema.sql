CREATE TABLE `character` (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL, gender VARCHAR(255) NOT NULL, actor_id BIGINT NOT NULL, production_id BIGINT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX actor_id_idx (actor_id), INDEX production_id_idx (production_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE company (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL, email VARCHAR(255), telephone VARCHAR(255), description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE genre (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE image (id BIGINT AUTO_INCREMENT, title VARCHAR(255) NOT NULL, caption VARCHAR(255), production_id BIGINT, person_id BIGINT, path VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, slug VARCHAR(255), UNIQUE INDEX image_sluggable_idx (slug), INDEX production_id_idx (production_id), INDEX person_id_idx (person_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE performance (id BIGINT AUTO_INCREMENT, production_id BIGINT NOT NULL, venue_id BIGINT NOT NULL, adult_tickets_available BIGINT, adult_ticket_price BIGINT, child_tickets_available BIGINT, child_ticket_price BIGINT, complimentary_tickets_available BIGINT, student_tickets_available BIGINT, student_ticket_price BIGINT, setup_at DATETIME, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX venue_id_idx (venue_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE person (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL, image_id BIGINT, email VARCHAR(255), telephone VARCHAR(255), gender VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX image_id_idx (image_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE production (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL, pvm_code VARCHAR(20), image_id BIGINT, production_type_id BIGINT, genre_id BIGINT, company_id BIGINT, director_id BIGINT, producer_id BIGINT, technician_id BIGINT, description TEXT, booking_status TEXT, contract_details TEXT, collaboration_nature TEXT, funding TEXT, notes TEXT, gross_income BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX image_id_idx (image_id), INDEX production_type_id_idx (production_type_id), INDEX genre_id_idx (genre_id), INDEX company_id_idx (company_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE production_type (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE `show` (id BIGINT AUTO_INCREMENT, performance_id BIGINT NOT NULL, show_at DATETIME NOT NULL, adult_tickets_sold BIGINT, adult_attendees BIGINT, child_tickets_sold BIGINT, child_attendees BIGINT, complimentary_tickets_sold BIGINT, student_tickets_sold BIGINT, student_attendees BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX performance_id_idx (performance_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE venue (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL, telephone VARCHAR(255), capacity BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
ALTER TABLE `character` ADD CONSTRAINT _character__production_id_production_id FOREIGN KEY (production_id) REFERENCES production(id);
ALTER TABLE `character` ADD CONSTRAINT _character__actor_id_person_id FOREIGN KEY (actor_id) REFERENCES person(id);
ALTER TABLE image ADD CONSTRAINT image_production_id_production_id FOREIGN KEY (production_id) REFERENCES production(id);
ALTER TABLE image ADD CONSTRAINT image_person_id_person_id FOREIGN KEY (person_id) REFERENCES person(id);
ALTER TABLE performance ADD CONSTRAINT performance_venue_id_venue_id FOREIGN KEY (venue_id) REFERENCES venue(id);
ALTER TABLE person ADD CONSTRAINT person_image_id_image_id FOREIGN KEY (image_id) REFERENCES image(id);
ALTER TABLE production ADD CONSTRAINT production_production_type_id_production_type_id FOREIGN KEY (production_type_id) REFERENCES production_type(id);
ALTER TABLE production ADD CONSTRAINT production_image_id_image_id FOREIGN KEY (image_id) REFERENCES image(id);
ALTER TABLE production ADD CONSTRAINT production_genre_id_genre_id FOREIGN KEY (genre_id) REFERENCES genre(id);
ALTER TABLE production ADD CONSTRAINT production_company_id_company_id FOREIGN KEY (company_id) REFERENCES company(id);
ALTER TABLE `show` ADD CONSTRAINT _show__performance_id_performance_id FOREIGN KEY (performance_id) REFERENCES performance(id);
