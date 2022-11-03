DROP DATABASE IF EXISTS ReservationList;
CREATE DATABASE ReservationList;
USE ReservationList;

-- Create table facility
Create TABLE facility (
    facility_id TINYINT(3) AUTO_INCREMENT PRIMARY KEY,
    short_name CHAR(5),
    long_name TINYTEXT
) Engine=InnoDB;


-- Insert facility
INSERT INTO facility (short_name, long_name) 
    VALUES ('MR', 'Meeting Room'),
    ('SR', 'Seminar Room'),
    ('HR', 'Hitech Room'),
    ('GC', 'Gymanstic'),
    ('AM', 'Auditorium');

-- Create table reservation
create table reservation (
	reservation_id VARCHAR(50),
	full_name VARCHAR(50),
	email VARCHAR(50),
	facility_id INT,
	date DATE,
	length INT
)Engine=InnoDB;

-- Insert reservation
insert into reservation (reservation_id, full_name, email, facility_id, date, length) values ('132C28P25J', 'Freida Yanele', 'fyanele0@npr.org', 2, '2021-03-09', 5);
insert into reservation (reservation_id, full_name, email, facility_id, date, length) values ('132C18X00J', 'Graham Giveen', 'ggiveen1@simplemachines.org', 3, '2021-09-27', 5);
insert into reservation (reservation_id, full_name, email, facility_id, date, length) values ('132C52X14E', 'Edward Dobeson', 'edobeson3@addtoany.com', 5, '2021-07-16', 6);
insert into reservation (reservation_id, full_name, email, facility_id, date, length) values ('132A39X02N', 'Haven Busst', 'hbusst4@google.co.uk', 2, '2021-07-02', 1);
insert into reservation (reservation_id, full_name, email, facility_id, date, length) values ('132A34X67E', 'Vere Commucci', 'vcommucci5@paginegialle.it', 3, '2021-08-03', 5);
insert into reservation (reservation_id, full_name, email, facility_id, date, length) values ('132B78P28J', 'Ingrid Lathwood', 'ilathwood6@eventbrite.com', 1, '2020-09-24', 2);
insert into reservation (reservation_id, full_name, email, facility_id, date, length) values ('132C74X34E', 'Riki Westraw', 'rwestraw7@is.gd', 4, '2021-06-09', 1);
insert into reservation (reservation_id, full_name, email, facility_id, date, length) values ('132A25P07E', 'Riccardo Mayhow', 'rmayhowc@last.fm', 5, '2020-10-23', 4);
insert into reservation (reservation_id, full_name, email, facility_id, date, length) values ('132C58Q41N', 'Kara Naire', 'knaired@pcworld.com', 1, '2021-06-15', 6);
insert into reservation (reservation_id, full_name, email, facility_id, date, length) values ('132C35X56E', 'Ronny Bernardoux', 'rbernardouxe@reference.com', 4, '2021-04-04', 6);