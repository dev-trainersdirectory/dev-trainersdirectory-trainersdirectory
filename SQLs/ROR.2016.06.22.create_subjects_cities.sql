CREATE TABLE IF NOT EXISTS tr_categories(
	id INT NOT NULL AUTO_INCREMENT,
	parent_tr_category_id INT,
	name varchar(45),
	description varchar(45),
	icon varchar(45),
	is_published BOOLEAN DEFAULT TRUE,
	order_num INT,
	deleted_by INT,
	deleted_on TIMESTAMP,
	created_by INT,
	created_on TIMESTAMP,
	PRIMARY KEY (id),
	FOREIGN KEY fk_parent_tr_category_id(parent_tr_category_id)
		REFERENCES tr_categories(id)
		ON DELETE RESTRICT
)ENGINE=InnoDB;

INSERT INTO `tr_categories`(`id`, `parent_tr_category_id`, `name`, `description`, `order_num`,`deleted_by`, `deleted_on`, `created_by`, `created_on` )
VALUES 	( 1, NULL, 'Educational', 'Educational', 1, NULL, NULL, 1, NOW() ),
		( 2, NULL, 'Fitness', 'Fitness', 2, NULL, NULL, 1, NOW() ),
		( 3, NULL, 'Hobby', 'Hobby', 3, NULL, NULL, 1, NOW() ),
		( 4, 1, 'Languages', 'Languages', 1, NULL, NULL, 1, NOW() ),
		( 5, 1, 'Academic', 'Academic', 1, NULL, NULL, 1, NOW() ),
		( 6, 1, 'Test Preparation', 'Test Preparation', 2, NULL, NULL, 1, NOW() ),
		( 7, 2, 'Fitness & Wellness', 'Fitness & Wellness', 1, NULL, NULL, 1, NOW() ),
		( 8, 2, 'Sports', 'Sports', 2, NULL, NULL, 1, NOW() ),
		( 9, 3, 'Dance', 'Dance', 1, NULL, NULL, 1, NOW() ),
		( 10, 3, 'Music', 'Music', 2, NULL, NULL, 1, NOW() );

CREATE TABLE IF NOT EXISTS tr_subjects(
	id INT NOT NULL AUTO_INCREMENT,
	tr_category_id INT,
	name varchar(50),
	description varchar(50),
	is_published BOOLEAN DEFAULT TRUE,
	order_num INT,
	deleted_by INT,
	deleted_on TIMESTAMP,
	created_by INT,
	created_on TIMESTAMP,
	PRIMARY KEY (id),
	FOREIGN KEY fk_tr_category_id(tr_category_id)
		REFERENCES tr_categories(id)
		ON DELETE RESTRICT
)ENGINE=InnoDB;

INSERT INTO `tr_subjects` (`id`,`tr_category_id`, `name`, `description`, `order_num`, `created_by`, `created_on` )
VALUES ( 1, 4, 'English', 'English', 1, 1, NOW() ),
		( 2, 4, 'German', 'German', 2, 1, NOW() ),
		( 3, 4, 'French', 'French', 3, 1, NOW() ),
		( 4, 4, 'Chinese', 'Chinese', 4, 1, NOW() ),
		( 5, 4, 'Japanese', 'Japanese', 5, 1, NOW() ),
		( 6, 4, 'Spanish', 'Spanish', 6, 1, NOW() ),
		( 7, 4, 'Hindi', 'Hindi', 7, 1, NOW() ),
		( 8, 4, 'Marathi', 'Marathi', 8, 1, NOW() ),
		( 9, 5, 'Mathematics', 'Mathematics', 1, 1, NOW() ),
		( 10, 5, 'Science(Physics,Chemistry,Biology)', 'Science', 2, 1, NOW() ),
		( 11, 5, 'History', 'History', 3, 1, NOW() ),
		( 12, 5, 'Geography', 'Geography', 4, 1, NOW() ),		
		( 13, 5, 'Engineering', 'Engineering', 5, 1, NOW() ),
		( 14, 5, 'Commerce', 'Commerce', 6, 1, NOW() ),
		( 15, 6, 'UPSC/MPSC', 'UPSC/MPSC', 1, 1, NOW() ),
		( 16, 6, 'IELTS, TOFFEL, GRE, MCAT', 'IELTS, TOFFEL, GRE, MCAT', 2, 1, NOW() ),
		( 17, 6, 'MSCIT', 'MSCIT', 3, 1, NOW() ),
		( 18, 7, 'Gym', 'Gym', 3, 1, NOW() ),
		( 19, 7, 'Swimming', 'Swimming', 3, 1, NOW() ),
		( 20, 7, 'Yoga', 'Yoga', 3, 1, NOW() ),
		( 21, 7, 'Meditation', 'Meditation', 3, 1, NOW() ),
		( 22, 9, 'Bollywood & Western', 'Bollywood & Western', 1, 1, NOW() ),
		( 23, 9, 'Folk Dance', 'Folk Dance', 2, 1, NOW() ),
		( 24, 10, 'Singing', 'Singing', 1, 1, NOW() ),
		( 25, 10, 'Musical Intstruments(Guitar etc)', 'Musical Intstruments(Guitar etc)', 2, 1, NOW() );

CREATE TABLE IF NOT EXISTS states(
	id INT NOT NULL AUTO_INCREMENT,
	name varchar(45),
	map_location varchar(45),
	is_published BOOLEAN DEFAULT TRUE,
	deleted_by INT,
	deleted_on TIMESTAMP,
	created_by INT,
	created_on TIMESTAMP,
	PRIMARY KEY (id)
)ENGINE=InnoDB;

INSERT INTO `states` ( `id`, `name`, `created_by`, `created_on` )
VALUES ( 1, 'Maharashtra', 1, NOW() );

CREATE TABLE IF NOT EXISTS cities(
	id INT NOT NULL AUTO_INCREMENT,
	name varchar(45),
	map_location varchar(45),
	state_id INT,
	is_published BOOLEAN DEFAULT TRUE,
	deleted_by INT,
	deleted_on TIMESTAMP,
	created_by INT,
	created_on TIMESTAMP,
	PRIMARY KEY (id),
	INDEX( state_id ),
	FOREIGN KEY fk_state_id(state_id)
		REFERENCES states(id)
		ON DELETE RESTRICT
)ENGINE=InnoDB;

INSERT INTO `cities` ( `id`, `name`, `state_id`, `created_by`, `created_on` )
VALUES ( 1, 'Pune', 1, 1, NOW() );
