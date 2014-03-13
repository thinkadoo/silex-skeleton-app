
CREATE DATABASE IF NOT EXISTS `restdb`;

CREATE TABLE IF NOT EXISTS restdb.user (id int(11) NOT NULL AUTO_INCREMENT, name varchar(255) DEFAULT NULL, surname varchar(255) DEFAULT NULL, PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO restdb.user VALUES(null, 'test_name_string', 'test_surname_string');
INSERT INTO restdb.user VALUES(null, 'test_name_string', 'test_surname_string');
INSERT INTO restdb.user VALUES(null, 'test_name_string', 'test_surname_string');

CREATE DATABASE IF NOT EXISTS `resttestdb`;

CREATE TABLE IF NOT EXISTS resttestdb.user (id int(11) NOT NULL AUTO_INCREMENT, name varchar(255) DEFAULT NULL, surname varchar(255) DEFAULT NULL, PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO resttestdb.user VALUES(null, 'test_name_string', 'test_surname_string');
INSERT INTO resttestdb.user VALUES(null, 'test_name_string', 'test_surname_string');
INSERT INTO resttestdb.user VALUES(null, 'test_name_string', 'test_surname_string');


