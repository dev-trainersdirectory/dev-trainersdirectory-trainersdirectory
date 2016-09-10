




DROP DATABASE IF EXISTS trainers_dir;

CREATE DATABASE IF NOT EXISTS trainers_dir;

USE trainers_dir;

CREATE USER 'developer'@'td.lcl' IDENTIFIED BY 'developer';
GRANT ALL PRIVILEGES 
ON trainers_dir.* 
TO 'developer'@'localhost'
IDENTIFIED BY 'developer' 
WITH GRANT OPTION;

CREATE USER 'web'@'localhost' IDENTIFIED BY 'web_td';
GRANT SELECT, INSERT, UPDATE, DELETE 
ON trainers_dir.* 
TO 'web'@'localhost'
IDENTIFIED BY 'web_td' 
WITH GRANT OPTION;

CREATE TABLE IF NOT EXISTS locations(
	id INT NOT NULL AUTO_INCREMENT,
	state_id INT,
	city_id INT, 
	name varchar(45),
	map_location varchar(45),
	is_published BOOLEAN DEFAULT TRUE,
	created_by INT,
	created_on TIMESTAMP,
	PRIMARY KEY (id),
	FOREIGN KEY fk_state_id(state_id)
		REFERENCES states(id)
		ON DELETE RESTRICT,
	FOREIGN KEY fk_city_id(city_id)
		REFERENCES cities(id)
		ON DELETE RESTRICT
)ENGINE=InnoDB;

INSERT INTO `locations` (`id`, `state_id`, `city_id`, `name`, `created_by`, `created_on` )
VALUES ( 1, 1, 1, 'Erandwane', 1, NOW() ),
	( 2, 1, 1, 'Hinjewadi', 1, NOW() ),
	( 3, 1, 1, 'Pashan', 1, NOW() ),
	( 4, 1, 1, 'kondhwa', 1, NOW() ),
	( 5, 1, 1, 'Boat club road', 1, NOW() ),
	( 6, 1, 1, 'Akurdi', 1, NOW() ),
	( 7, 1, 1, 'Karve Nagar', 1, NOW() ),
	( 8, 1, 1, 'Alandi Devachi', 1, NOW() ),
	( 9, 1, 1, 'Navi Peth', 1, NOW() ),
	( 10, 1, 1, 'Warje', 1, NOW() ),
	( 11, 1, 1, 'Ambegaon Manchar', 1, NOW() ),
	( 12, 1, 1, 'Anand Nagar', 1, NOW() ),
	( 13, 1, 1, 'Wadgaon', 1, NOW() ),
	( 14, 1, 1, 'Aundh', 1, NOW() ),
	( 15, 1, 1, 'Bavadan', 1, NOW() ),
	( 16, 1, 1, 'Katraj', 1, NOW() );
	
CREATE TABLE IF NOT EXISTS genders(
	id INT NOT NULL AUTO_INCREMENT,
	name varchar(45),
	PRIMARY KEY (id)
)ENGINE=InnoDB;

INSERT INTO `genders` ( `id`, `name`)
VALUES ( 1, 'Male' ),
	( 2, 'Female' ),
	( 3, 'Not Disclosed' );
	
CREATE TABLE IF NOT EXISTS user_types(
	id INT NOT NULL AUTO_INCREMENT,
	name VARCHAR(50),
	PRIMARY KEY (id)
)ENGINE=InnoDB;

INSERT INTO `user_types` ( `id`, `name` )
VALUES ( 1, 'Admin' ),
	( 2, 'Student' ),
	( 3, 'Trainer' ),
	( 4, 'Institute' );

CREATE TABLE IF NOT EXISTS profile_steps(
	id INT NOT NULL AUTO_INCREMENT,
	user_type_id INT NOT NULL,
	name varchar(45),
	PRIMARY KEY (id),
	FOREIGN KEY fk_profile_steps_user_type_id(user_type_id)
		REFERENCES user_types(id)
		ON DELETE RESTRICT
)ENGINE=InnoDB;

INSERT INTO `profile_steps` (id, user_type_id, name)
VALUES (1,3, 'Personal Info');

CREATE TABLE IF NOT EXISTS users(
	id INT NOT NULL AUTO_INCREMENT,
	contact_number BIGINT NOT NULL,
	email_id VARCHAR(50),
	encrypted_password VARCHAR(50),
	facebook_id VARCHAR(50),
	google_id VARCHAR(50),
	status_id INT,
	verified_by INT,
	verified_on TIMESTAMP,
	deleted_by INT,
	deleted_on TIMESTAMP,
	created_by INT,
	created_on TIMESTAMP,
	PRIMARY KEY (id),
	CONSTRAINT uc_users_contact_number UNIQUE (contact_number),
	INDEX(facebook_id),
	INDEX(contact_number)	
)ENGINE=InnoDB;

CREATE TABLE user_type_associations(
	id INT NOT NULL AUTO_INCREMENT,
	user_id INT NOT NULL,
	user_type_id INT NOT NULL,
	PRIMARY KEY (id),
	CONSTRAINT uc_user_type_association UNIQUE (user_id, user_type_id),
	FOREIGN KEY fk_uta_user_type_id(user_type_id)
		REFERENCES user_types(id)
		ON DELETE RESTRICT,
	FOREIGN KEY fk_uta_user_id(user_id)
		REFERENCES users(id)
		ON DELETE RESTRICT
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS leads(
	id INT NOT NULL AUTO_INCREMENT,
	user_id INT NOT NULL,
	first_name varchar(45),
	last_name varchar(45),
	gender_id INT NOT NULL DEFAULT 3,
	birth_date DATE,
	profile_pic varchar(500),
	address varchar(45),
	city_id INT,
	state_id INT,
	pin_code varchar(10),
	alternate_contact_number INT,
	is_number_verified BOOLEAN DEFAULT FALSE,
	is_number_private BOOLEAN DEFAULT FALSE,
	allow_sms_alert BOOLEAN DEFAULT TRUE,
	coins INT DEFAULT 0,
	is_active BOOLEAN DEFAULT FALSE,
	created_by INT,
	created_on TIMESTAMP,
	PRIMARY KEY (id),
	FOREIGN KEY fk_user_id(user_id)
		REFERENCES users(id)
		ON DELETE RESTRICT,
	FOREIGN KEY fk_state_id(state_id)
		REFERENCES states(id)
		ON DELETE RESTRICT,
	FOREIGN KEY fk_city_id(city_id)
		REFERENCES cities(id)
		ON DELETE RESTRICT
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS trainers(
	id INT NOT NULL AUTO_INCREMENT,
	lead_id INT NOT NULL,
	user_id INT NOT NULL,
	description VARCHAR(50000),
	profile_step_id INT DEFAULT 1,
	is_paid_profile BOOLEAN DEFAULT FALSE,
	auto_buy_leads BOOLEAN DEFAULT FALSE,
	completed_on TIMESTAMP,
	experience INT DEFAULT 0,
	has_taught_in_school_colleges BOOLEAN DEFAULT FALSE,
	has_vehicle BOOLEAN DEFAULT FALSE,
	min_rate INT,
	max_rate INT,
	available_day_id INT,
	available_start_time_id INT,
	available_end_time_id INT,
	qualities VARCHAR(5000),
	views INT DEFAULT 0,
	deleted_by INT,
	deleted_on TIMESTAMP,
	created_by INT,
	created_on TIMESTAMP,
	PRIMARY KEY (id),
	FOREIGN KEY fk_lead_id(lead_id)
		REFERENCES leads(id)
		ON DELETE RESTRICT,
	FOREIGN KEY fk_user_id(user_id)
		REFERENCES users(id)
		ON DELETE RESTRICT,
	FOREIGN KEY fk_profile_step_id(profile_step_id)
		REFERENCES profile_steps(id)
		ON DELETE RESTRICT
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS trainer_skills(
	id INT NOT NULL AUTO_INCREMENT,
	trainer_id INT NOT NULL,
	tr_subject_id INT NOT NULL,
	deleted_by INT,
	deleted_on TIMESTAMP,
	created_by INT,
	created_on TIMESTAMP,
	PRIMARY KEY (id),
	INDEX(trainer_id),
	INDEX(tr_subject_id),
	FOREIGN KEY fk_trainer_id(trainer_id)
		REFERENCES trainers(id)
		ON DELETE RESTRICT,
	FOREIGN KEY fk_tr_subject_id(tr_subject_id)
		REFERENCES tr_subjects(id)
		ON DELETE RESTRICT
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS preferences(
	id INT NOT NULL AUTO_INCREMENT,
	title VARCHAR(50),
	description VARCHAR(100),
	created_by INT,
	created_on TIMESTAMP,
	PRIMARY KEY (id)
)ENGINE=InnoDB;

INSERT INTO `preferences` ( `id`, `title`, `description`, `created_by`, `created_on` )
VALUES ( 1, 'Teaching Preference', 'Teach at my Home', 1, NOW() ),
	( 2, 'Teaching Preference', 'Teach at students Home', 1, NOW() ),
	( 3, 'Teaching Preference', 'Teach online', 1, NOW() ),
	( 4, 'Teaching Preference', 'Teach at an institute', 1, NOW() );

CREATE TABLE IF NOT EXISTS trainer_prefereces(
	id INT NOT NULL AUTO_INCREMENT,
	trainer_id INT NOT NULL,
	preference_id INT NOT NULL,
	created_by INT,
	created_on TIMESTAMP,
	PRIMARY KEY (id),
	INDEX(trainer_id),
	FOREIGN KEY fk_trainer_id(trainer_id)
		REFERENCES trainers(id)
		ON DELETE RESTRICT
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS trainer_locations(
	id INT NOT NULL AUTO_INCREMENT,
	trainer_id INT NOT NULL,
	location_id INT NOT NULL,
	created_by INT,
	created_on TIMESTAMP,
	PRIMARY KEY (id),
	INDEX(trainer_id),
	INDEX(location_id),
	FOREIGN KEY fk_trainer_id(trainer_id)
		REFERENCES trainers(id)
		ON DELETE RESTRICT,
	FOREIGN KEY fk_location_id(location_id)
		REFERENCES locations(id)
		ON DELETE RESTRICT
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS days(
	id INT NOT NULL AUTO_INCREMENT,
	name VARCHAR(50),
	is_grouped BOOLEAN DEFAULT FALSE,
	is_published BOOLEAN DEFAULT TRUE,
	PRIMARY KEY (id)
)ENGINE=InnoDB;

INSERT INTO `days` ( `id`, `name`, `is_grouped` )
VALUES ( 1, 'Sunday', 0 ),
	( 2, 'Monday', 0 ),
	( 3, 'Tuesday', 0 ),
	( 4, 'Wednesday', 0 ),
	( 5, 'Thursday', 0 ),
	( 6, 'Friday', 0 ),
	( 7, 'Saturday', 0 ),
	( 8, 'Weekend', 1 ),
	( 9, 'Weekdays', 1 ),
	( 10, 'All days in week', 1 );

CREATE TABLE IF NOT EXISTS times(
	id INT NOT NULL AUTO_INCREMENT,
	name VARCHAR(50),
	is_published BOOLEAN DEFAULT TRUE,
	PRIMARY KEY (id)
)ENGINE=InnoDB;

INSERT INTO `times` ( `id`, `name` )
VALUES ( 1, '7:00 AM'),
	(2, '8:00 AM'),
	(3, '9:00 AM'),
	(4, '10:00 AM'),
	(5, '11:00 AM'),
	(6, '12:00 Noon'),
	(7, '1:00 PM'),
	(8, '2:00 PM'),
	(9, '3:00 PM'),
	(10, '4:00 PM'),
	(11, '5:00 PM'),
	(12, '6:00 PM'),
	(13, '7:00 PM'),
	(14, '8:00 PM'),
	(15, '9:00 PM'),
	(16, '10:00 PM'),
	(17, '11:00 PM'),
	(18, '12:00 AM'),
	(19, '1:00 AM'),
	(20, '2:00 AM'),
	(21, '3:00 AM'),
	(22, '4:00 AM'),
	(23, '5:00 AM'),
	(24, '6:00 AM');
	
CREATE TABLE IF NOT EXISTS statuses(
	id INT NOT NULL AUTO_INCREMENT,
	name VARCHAR(50),
	PRIMARY KEY (id)
)ENGINE=InnoDB;

INSERT INTO `statuses` ( `id`, `name` )
VALUES ( 1, 'Verification Pending' ),
	( 2, 'Active' ),
	( 3, 'Suspended' ),
	( 4, 'Banned' );

CREATE TABLE IF NOT EXISTS purchased_leads(
	id INT NOT NULL AUTO_INCREMENT,
	user_id INT NOT NULL,
	bought_user_id INT NOT NULL,
	notified_on TIMESTAMP,
	closed_on TIMESTAMP,
	created_on TIMESTAMP,
	PRIMARY KEY (id),
	FOREIGN KEY fk_user_id(user_id)
		REFERENCES users(id)
		ON DELETE RESTRICT,
	FOREIGN KEY fk_bought_user_id(bought_user_id)
		REFERENCES users(id)
		ON DELETE RESTRICT
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS show_interests(
	id INT NOT NULL AUTO_INCREMENT,
	user_id INT NOT NULL,
	trainer_user_id INT NOT NULL,
	notified_on TIMESTAMP,
	closed_on TIMESTAMP,
	created_on TIMESTAMP,
	PRIMARY KEY (id),
	FOREIGN KEY fk_user_id(user_id)
		REFERENCES users(id)
		ON DELETE RESTRICT,
	FOREIGN KEY fk_trainer_user_id(trainer_user_id)
		REFERENCES users(id)
		ON DELETE RESTRICT
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS coin_transactions(
	id INT NOT NULL AUTO_INCREMENT,
	lead_id INT NOT NULL,
	credit INT DEFAULT 0,
	debit INT DEFAULT 0,
	purchased_lead_id INT,
	remark VARCHAR(50),
	status VARCHAR(50),
	coin_transaction_id INT,
	created_by INT,
	created_on TIMESTAMP,
	PRIMARY KEY (id),
	FOREIGN KEY fk_lead_id(lead_id)
		REFERENCES leads(id)
		ON DELETE RESTRICT,
	FOREIGN KEY fk_purchased_lead_id(purchased_lead_id)
		REFERENCES purchased_leads(id)
		ON DELETE RESTRICT
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS comunication_statuses(
	id INT NOT NULL AUTO_INCREMENT,
	name VARCHAR(50),
	PRIMARY KEY (id)
)ENGINE=InnoDB;

INSERT INTO `comunication_statuses` ( `id`, `name` )
VALUES ( 1, 'Pending' ),
	( 2, 'Delivered' ),
	( 3, 'Failed' );
	
CREATE TABLE IF NOT EXISTS system_emails(
	id INT NOT NULL AUTO_INCREMENT,
	email_to VARCHAR(50) NOT NULL,
	email_from VARCHAR(50) NOT NULL,
	email_subject varchar(50) NOT NULL,
	email_body VARCHAR(5000),
	communication_status_id INT,
	delivered_on TIMESTAMP,
	created_on TIMESTAMP,
	PRIMARY KEY (id),
	INDEX(email_to),
	INDEX(email_from)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS sms_types(
	id INT NOT NULL AUTO_INCREMENT,
	subject varchar(45),
	is_active BOOLEAN DEFAULT TRUE,
	PRIMARY KEY (id)
)ENGINE=InnoDB;

INSERT INTO `sms_types` ( `id`, `subject` )
VALUES ( 1, 'Verify User' ),
	( 2, 'Show Interest' ),
	( 3, 'Buy Profile' ),
	( 4, 'Buy Package' );

CREATE TABLE IF NOT EXISTS sms_templates(
	id INT NOT NULL AUTO_INCREMENT,
	sms_type_id INT NOT NULL,
	content varchar(1000),
	is_active BOOLEAN DEFAULT TRUE,
	PRIMARY KEY (id),
	FOREIGN KEY fk_sms_type_id(sms_type_id)
		REFERENCES sms_types(id)
		ON DELETE RESTRICT
)ENGINE=InnoDB;

INSERT INTO `sms_templates` ( `id`, `sms_type_id`, `content` )
VALUES ( 1, 1, 'Dear, {RECEIPIENT} Your One Time Password is {OTP}.'),
	( 2, 2, 'Dear, {RECEIPIENT} You have an alert regarding student lead.');

CREATE TABLE IF NOT EXISTS system_sms(
	id INT NOT NULL AUTO_INCREMENT,
	sms_type_id INT NOT NULL,
	sms_template_id INT,
	send_to VARCHAR(50),
	sent_from VARCHAR(50),
	subject VARCHAR(50),
	content VARCHAR(5000),
	communication_status_id INT,
	delivered_on TIMESTAMP,
	created_on TIMESTAMP,
	PRIMARY KEY (id),
	INDEX(send_to),
	INDEX(sent_from),
	FOREIGN KEY fk_sms_type_id(sms_type_id)
		REFERENCES sms_types(id)
		ON DELETE RESTRICT,
	FOREIGN KEY fk_sms_template_id(sms_template_id)
		REFERENCES sms_templates(id)
		ON DELETE RESTRICT
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS merge_fields(
	id INT NOT NULL AUTO_INCREMENT,
	name VARCHAR(50) NOT NULL,
	label VARCHAR(500) NOT NULL,
	PRIMARY KEY (id)
)ENGINE=InnoDB;

INSERT INTO `merge_fields` ( `id`, `name`, `label` )
VALUES ( 1, '{RECEIPIENT}', 'Receiver Name' ),
		( 2, '{OTP}', 'One Time Password' );
		
CREATE TABLE IF NOT EXISTS otps(
	id INT NOT NULL AUTO_INCREMENT,
	user_id INT,
	contact_number BIGINT NOT NULL,
	otp varchar(10),
	sent_on TIMESTAMP,
	expires_on TIMESTAMP,
	closed_on TIMESTAMP,
	PRIMARY KEY (id),
	FOREIGN KEY fk_user_id(user_id)
		REFERENCES users(id)
		ON DELETE RESTRICT
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS reviews_ratings(
	id INT NOT NULL AUTO_INCREMENT,
	reviewer_id INT NOT NULL,
	reviewee_id INT NOT NULL,
	review VARCHAR(50000),
	ratings INT,
	deleted_by INT,
	deleted_on TIMESTAMP,
	created_by INT,
	created_on TIMESTAMP,
	PRIMARY KEY (id),
	FOREIGN KEY fk_reviewer_id(reviewer_id)
		REFERENCES users(id)
		ON DELETE RESTRICT,
	FOREIGN KEY fk_reviewee_id(reviewer_id)
		REFERENCES users(id)
		ON DELETE RESTRICT
)ENGINE=InnoDB;

CREATE TABLE trainer_videos(
	id INT NOT NULL AUTO_INCREMENT,
	trainer_id INT NOT NULL,
	trainer_skill_id INT NULL,
	video_link VARCHAR(500) NOT NULL,
	is_published BOOLEAN DEFAULT TRUE,
	deleted_by INT,
	deleted_on TIMESTAMP,
	created_by INT,
	created_on TIMESTAMP,
	PRIMARY KEY(id),
	FOREIGN KEY fk_trainer_id(trainer_id)
		REFERENCES trainers(id)
		ON DELETE RESTRICT,
	FOREIGN KEY fk_trainer_skill_id(trainer_skill_id)
		REFERENCES trainer_skills(id)
		ON DELETE RESTRICT
)ENGINE=InnoDB;
	
CREATE TABLE `sequence_data` (
	`sequence_name` varchar(100) NOT NULL,
	`sequence_increment` int(11) unsigned NOT NULL DEFAULT 1,
	`sequence_min_value` int(11) unsigned NOT NULL DEFAULT 1,
	`sequence_max_value` bigint(20) unsigned NOT NULL DEFAULT 18446744073709551615,
	`sequence_cur_value` bigint(20) unsigned DEFAULT 1,
	`sequence_cycle` boolean NOT NULL DEFAULT FALSE,
	PRIMARY KEY (`sequence_name`)
) ENGINE=MyISAM;

INSERT INTO sequence_data
	(sequence_name)
VALUE
	('sq_users'),('sq_user_type_associations'),('sq_leads'),('sq_trainers'),('sq_trainer_videos')
	,('sq_advertisements'),('sq_advertisers'),('sq_cities'),('sq_coin_transactions'),('sq_communication_statuses'),
	('sq_days'),('email_templates'),('email_types'),('sq_genders'),('sq_locations'),('sq_merge_fields'),('sq_otps'),
	('sq_preferences'),('sq_profile_steps'),('sq_purchased_leads'),('sq_review_ratings'),('sq_sms_templates'),
	('sq_sms_types'),('sq_states'),('sq_statuses'),('sq_system_emails'),('sq_system_sms'),('sq_times'),('sq_trainer_locations'),
	('sq_trainer_preferences'),('sq_trainer_skills'),('sq_tr_categories'),('sq_tr_subjects'),('sq_show_interests');

DELIMITER //
CREATE FUNCTION `nextval` (`seq_name` varchar(100))
RETURNS bigint(20) NOT DETERMINISTIC
BEGIN
	DECLARE cur_val bigint(20);

	SELECT
		sequence_cur_value INTO cur_val
	FROM
		sequence_data
	WHERE
		sequence_name = seq_name
	;

	IF cur_val IS NOT NULL THEN
		UPDATE
			sequence_data
		SET
			sequence_cur_value = IF (
				(sequence_cur_value + sequence_increment) > sequence_max_value,
				IF (
					sequence_cycle = TRUE,
					sequence_min_value,
					NULL
				),
				sequence_cur_value + sequence_increment
			)
		WHERE
			sequence_name = seq_name
		;
	END IF;

	RETURN cur_val;
END//
DELIMITER ;	
		
INSERT INTO `users` (`id`, `contact_number`, `email_id`, `encrypted_password`, `facebook_id`, `google_id`, `status_id`, `verified_by`, `verified_on`, `deleted_by`, `deleted_on`, `created_by`, `created_on`) VALUES
(1, 1425639685, '', '$1$9y2.cV4.$VTKHzOUEs2MRsw8QL0iwP.', '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(2, 1234567890, 'test@test.lcl', '$1$9y2.cV4.$VTKHzOUEs2MRsw8QL0iwP.', '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(3, 1542437856, '', '$1$9y2.cV4.$VTKHzOUEs2MRsw8QL0iwP.', '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(4, 2523437856, '', '$1$9y2.cV4.$VTKHzOUEs2MRsw8QL0iwP.', '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(5, 3542432345, '', '$1$9y2.cV4.$VTKHzOUEs2MRsw8QL0iwP.', '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(6, 9027852696, '', '$1$9y2.cV4.$VTKHzOUEs2MRsw8QL0iwP.', '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(7, 8022145236, '', '$1$9y2.cV4.$VTKHzOUEs2MRsw8QL0iwP.', '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(8, 8525369633, '', '$1$9y2.cV4.$VTKHzOUEs2MRsw8QL0iwP.', '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(9, 9042437856, '', '$1$9y2.cV4.$VTKHzOUEs2MRsw8QL0iwP.', '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(10, 8542437856, '', '$1$9y2.cV4.$VTKHzOUEs2MRsw8QL0iwP.', '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(11, 8512431256, '', '$1$9y2.cV4.$VTKHzOUEs2MRsw8QL0iwP.', '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(12, 9999999999, '', '$1$9y2.cV4.$VTKHzOUEs2MRsw8QL0iwP.', '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(13, 7852698512, '', '$1$9y2.cV4.$VTKHzOUEs2MRsw8QL0iwP.', '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00');

INSERT INTO `user_type_associations` (`id`, `user_id`, `user_type_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 2),
(5, 2, 3),
(6, 3, 3),
(7, 4, 3),
(8, 5, 3),
(9, 6, 3),
(10, 7, 3),
(11, 8, 3),
(12, 9, 3),
(13, 10, 3),
(14, 11, 3),
(15, 12, 3);

INSERT INTO `leads` (`id`, `user_id`, `first_name`, `last_name`, `gender_id`, `birth_date`, `profile_pic`, `address`, `city_id`, `state_id`, `pin_code`, `alternate_contact_number`, `is_number_verified`, `is_number_private`, `allow_sms_alert`, `coins`, `is_active`, `created_by`, `created_on`) VALUES
(1, 1, 'TD', '', 3, '0000-00-00', '', '', 1, 1, '411028', 0, 1, 0, 1, 0, 1, 1, '0000-00-00 00:00:00'),
(2, 2, 'John', '', 1, '0000-00-00', '', '', 1, 1, '411028', 0, 1, 0, 1, 0, 1, 1, '0000-00-00 00:00:00'),
(3, 3, 'Sachin', '', 1, '0000-00-00', '', '', 1, 1, '411028', 0, 1, 0, 1, 500, 1, 1, '0000-00-00 00:00:00'),
(4, 4, 'Virat', '', 1, '0000-00-00', '', '', 1, 1, '411028', 0, 1, 0, 1, 0, 1, 1, '0000-00-00 00:00:00'),
(5, 5, 'Rohit', '', 2, '0000-00-00', '', '', 1, 1, '411028', 0, 1, 0, 1, 100, 1, 1, '0000-00-00 00:00:00'),
(6, 6, 'Rahul', '', 1, '0000-00-00', '', '', 1, 1, '411028', 0, 1, 0, 1, 0, 1, 1, '0000-00-00 00:00:00'),
(7, 7, 'Vishal', '', 1, '0000-00-00', '', '', 1, 1, '411028', 0, 1, 0, 1, 0, 1, 1, '0000-00-00 00:00:00'),
(8, 8, 'Vijay', '', 3, '0000-00-00', '', '', 1, 1, '411028', 0, 1, 0, 1, 0, 1, 1, '0000-00-00 00:00:00'),
(9, 9, 'Soniya', '', 2, '0000-00-00', '', '', 1, 1, '411028', 0, 0, 0, 1, 0, 1, 1, '0000-00-00 00:00:00'),
(10, 10, 'Kareena', '', 2, '0000-00-00', '', '', 1, 1, '411028', 0, 1, 0, 1, 0, 1, 1, '0000-00-00 00:00:00'),
(11, 11, 'Ema', '', 2, '0000-00-00', '', '', 1, 1, '411028', 0, 0, 0, 1, 0, 1, 1, '0000-00-00 00:00:00'),
(12, 12, 'Raj', '', 1, '0000-00-00', '', '', 1, 1, '411028', 0, 1, 0, 1, 0, 1, 1, '0000-00-00 00:00:00'),
(13, 13, 'Rahul', '', 1, '0000-00-00', '', '', 1, 1, '411028', 0, 1, 0, 1, 0, 1, 1, '0000-00-00 00:00:00');

INSERT INTO `trainers` (`id`, `lead_id`, `user_id`, `description`, `profile_step_id`, `is_paid_profile`, `completed_on`, `experience`, `has_taught_in_school_colleges`, `has_vehicle`, `min_rate`, `max_rate`, `available_day_id`, `available_start_time_id`, `available_end_time_id`, `qualities`, `views`, `deleted_by`, `deleted_on`, `created_by`, `created_on`) VALUES
(1, 1, 1, 'English trainer', 1, 1, '0000-00-00 00:00:00', 10, 1, 1, 100, 1000, 10, 1, 24, 'Experienced in teaching', 100, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(2, 2, 2, 'Gym trainer', 1, 1, '0000-00-00 00:00:00', 10, 1, 1, 100, 1000, 1, 1, 24, 'Experienced in teaching', 100, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(3, 3, 3, 'Language trainer', 1, 0, '0000-00-00 00:00:00', 10, 1, 1, 50, 800, 2, 1, 24, 'Experienced in teaching', 100, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(4, 4, 4, 'Hobby Trainer', 1, 0, '0000-00-00 00:00:00', 10, 1, 1, 100, 700, 1, 1, 24, 'Experienced in teaching', 50, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(5, 5, 5, 'English trainer', 1, 1, '0000-00-00 00:00:00', 10, 1, 0, 100, 1000, 9, 1, 24, 'Experienced in teaching', 100, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(6, 6, 6, 'Gym trainer', 1, 0, '0000-00-00 00:00:00', 10, 0, 1, 200, 1000, 10, 1, 24, 'Experienced in teaching', 100, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(7, 7, 7, 'Language trainer', 1, 0, '0000-00-00 00:00:00', 10, 1, 1, 100, 1000, 10, 1, 24, 'Experienced in teaching', 0, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(8, 8, 8, 'Hobby Trainer', 1, 1, '0000-00-00 00:00:00', 10, 0, 0, 100, 1000, 10, 1, 24, 'Experienced in teaching', 100, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(9, 9, 9, 'English trainer', 1, 0, '0000-00-00 00:00:00', 10, 1, 1, 500, 1000, 10, 1, 24, 'Experienced in teaching', 400, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(10, 10, 10, 'Gym trainer', 1, 0, '0000-00-00 00:00:00', 10, 1, 1, 100, 1000, 10, 1, 24, 'Experienced in teaching', 100, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(11, 11, 11, 'Language trainer', 1, 0, '0000-00-00 00:00:00', 10, 1, 1, 100, 1500, 10, 1, 24, 'Experienced in teaching', 100, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(12, 12, 12, 'Hobby Trainer', 1, 0, '0000-00-00 00:00:00', 10, 1, 1, 100, 1000, 10, 1, 24, 'Experienced in teaching', 800, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(13, 13, 13, 'English trainer', 1, 0, '0000-00-00 00:00:00', 10, 1, 1, 100, 1000, 10, 1, 24, 'Experienced in teaching', 100, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00');

INSERT INTO `trainer_locations` (`id`, `trainer_id`, `location_id`, `created_by`, `created_on`) VALUES
(1, 1, 1, 1, '0000-00-00 00:00:00'),
(2, 1, 2, 1, '0000-00-00 00:00:00'),
(3, 1, 3, 1, '0000-00-00 00:00:00'),
(4, 1, 4, 1, '0000-00-00 00:00:00'),
(5, 1, 5, 1, '0000-00-00 00:00:00'),
(6, 1, 6, 1, '0000-00-00 00:00:00'),
(7, 1, 7, 1, '0000-00-00 00:00:00'),
(8, 1, 8, 1, '0000-00-00 00:00:00'),
(9, 1, 9, 1, '0000-00-00 00:00:00');

INSERT INTO `trainer_skills` (`id`, `trainer_id`, `tr_subject_id`, `deleted_by`, `deleted_on`, `created_by`, `created_on`) VALUES
(1, 1, 1, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(2, 1, 2, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(3, 1, 3, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(4, 1, 4, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(5, 2, 1, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(6, 2, 2, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(7, 2, 3, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(8, 2, 4, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(9, 2, 5, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(10, 2, 6, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(11, 2, 7, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(12, 3, 1, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(13, 3, 2, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(14, 3, 3, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(15, 5, 1, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(16, 5, 2, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(17, 5, 3, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(18, 4, 1, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(19, 4, 2, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(20, 4, 3, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(21, 4, 4, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(22, 6, 1, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(23, 6, 2, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(24, 7, 1, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(25, 7, 2, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(26, 8, 1, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(27, 8, 2, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(28, 9, 1, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(29, 9, 2, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(30, 10, 1, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(31, 10, 2, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(32, 11, 1, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(33, 11, 2, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(34, 12, 1, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(35, 13, 2, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00');

INSERT INTO `trainer_videos` (`id`, `trainer_id`, `trainer_skill_id`, `video_link`, `is_published`, `deleted_by`, `deleted_on`, `created_by`, `created_on`) VALUES
(1, 1, NULL, 'v=9reHIVqdFhc', 1, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(2, 2, NULL, 'v=9reHIVqdFhc', 1, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(3, 3, NULL, 'v=9reHIVqdFhc', 0, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(4, 4, NULL, 'v=9reHIVqdFhc', 1, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(5, 5, NULL, 'v=9reHIVqdFhc', 1, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(6, 6, NULL, 'v=9reHIVqdFhc', 0, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(7, 7, NULL, 'v=9reHIVqdFhc', 1, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(8, 8, NULL, 'v=9reHIVqdFhc', 1, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(9, 9, NULL, 'v=9reHIVqdFhc', 1, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(10, 10, NULL, 'v=9reHIVqdFhc', 1, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(11, 11, NULL, 'v=9reHIVqdFhc', 1, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(12, 12, NULL, 'v=9reHIVqdFhc', 1, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00');

INSERT INTO `reviews_ratings` (`id`, `reviewer_id`, `reviewee_id`, `review`, `ratings`, `deleted_by`, `deleted_on`, `created_by`, `created_on`) VALUES
(1, 1, 1, 'Awesome!!!', 5, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(2, 1, 2, 'Awesome!!!', 3, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(3, 1, 3, 'Awesome!!!', 2, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(4, 1, 4, 'Awesome!!!', 2, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(5, 1, 5, 'Awesome!!!', 3, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(6, 1, 6, 'Awesome!!!', 3, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(7, 1, 7, 'Awesome!!!', 3, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(8, 1, 8, 'Awesome!!!', 2, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(9, 1, 9, 'Awesome!!!', 3, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(10, 1, 10, 'Awesome!!!', 3, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(11, 1, 11, 'Awesome!!!', 3, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(12, 1, 12, 'Awesome!!!', 3, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(13, 1, 13, 'Awesome!!!', 3, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(14, 1, 1, 'Awesome!!!', 3, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(15, 1, 2, 'Awesome!!!', 5, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(16, 1, 3, 'Awesome!!!', 3, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(17, 1, 4, 'Awesome!!!', 4, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(18, 1, 5, 'Awesome!!!', 3, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(19, 1, 6, 'Awesome!!!', 3, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(20, 1, 7, 'Awesome!!!', 3, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(21, 1, 8, 'Awesome!!!', 3, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(22, 1, 9, 'Awesome!!!', 3, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00');
