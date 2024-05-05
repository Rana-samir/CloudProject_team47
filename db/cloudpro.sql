CREATE DATABASE IF NOT EXISTS cloud;


USE cloud;


CREATE TABLE students (
    id INT PRIMARY KEY NOT NULL,
    name VARCHAR(100) NOT NULL,
    age INT,
    cgpa FLOAT
);

INSERT INTO students (id,name, age, cgpa) VALUES
    (22010120,'shimaa', 20, 3.75),
    (22011607,'rana', 20, 3.85),
    (22011647,'mohamed', 20, 3.85),
	(22010070,'basmala', 20, 3.75),
    (22010119,'shahd', 19, 3.90);

