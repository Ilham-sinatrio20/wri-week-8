CREATE DATABASE driver;
-- DROP DATABASE driver;
USE driver;

CREATE TABLE user(
	id INT PRIMARY KEY AUTO_INCREMENT,
    name varchar(70),
    username varchar(50),
    email varchar(50),
    password varchar(50),
    role varchar(10),
    status boolean default false
);

INSERT INTO `user`(name, username, email, password, role) VALUES
	("Ilham Sinatrio Gumelar", "IlhamSG", "IlhamSG@gmail.com" ,md5("admin123"), "Admin"),
    ("Zaed Abdullah", "ZaedAbd", "Zaed@gmail.com", md5("admin456"), "Admin"),
    ("Makoto Shinkai", "Sinkai10", "MShinkai@gmail.com", md5("user123"), "User"),
    ("Ronald Reagen", "Reagen20", "RReagen20@gmail.com", md5("user456"), "User");

CREATE TABLE driver(
	id_driver INT PRIMARY KEY AUTO_INCREMENT,
    name varchar(225),
    team varchar(80),
    nation varchar(70),
    number varchar(3)
);

INSERT INTO driver(name, team, nation, number) VALUES
	("Carlos Sainz", "Ferrari", "Spanyol", "55"),
    ("Valtteri Bottas", "Alfa Romeo", "Finlandia", "77"),
    ("Pierre Gasly", "Alpha Tauri", "Perancis", "10"),
    ("Esteban Ocon", "Alpine", "Perancis", "31"),
    ("Sebastian Vettel", "Aston Martin", "Jerman", "5"),
    ("Mick Schumacher", "Haas", "Jerman", "47"),
    ("Daniel Ricciardo", "McLaren", "Australia", "3"),
    ("Lewis Hamilton", "Mercedes", "Inggris", "44"),
    ("Max Verstappen", "Red Bull", "Belanda", "1"),
    ("Nicholas Latifi", "Williams", "Kanada", "6");



















