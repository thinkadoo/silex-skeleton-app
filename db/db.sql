CREATE DATABASE IF NOT EXISTS `restdb`;

CREATE TABLE IF NOT EXISTS restdb.party (id int(11) NOT NULL AUTO_INCREMENT, party_name varchar(255) DEFAULT NULL, party_type varchar(255) DEFAULT NULL, PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO restdb.party VALUES(null,'test_party_name_string','test_party_type_string');
INSERT INTO restdb.party VALUES(null,'test_party_name_string','test_party_type_string');
INSERT INTO restdb.party VALUES(null,'test_party_name_string','test_party_type_string');
CREATE TABLE IF NOT EXISTS restdb.partyrelationship (id int(11) NOT NULL AUTO_INCREMENT, relationship_name varchar(255) DEFAULT NULL, relationship_data varchar(255) DEFAULT NULL, party_id varchar(255) DEFAULT NULL, party_role_id varchar(255) DEFAULT NULL, PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO restdb.partyrelationship VALUES(null,'test_relationship_name_string','test_relationship_data_string','test_party_id_string','test_party_role_id_string');
INSERT INTO restdb.partyrelationship VALUES(null,'test_relationship_name_string','test_relationship_data_string','test_party_id_string','test_party_role_id_string');
INSERT INTO restdb.partyrelationship VALUES(null,'test_relationship_name_string','test_relationship_data_string','test_party_id_string','test_party_role_id_string');
CREATE TABLE IF NOT EXISTS restdb.partyrole (id int(11) NOT NULL AUTO_INCREMENT, role_name varchar(255) DEFAULT NULL, role_data varchar(255) DEFAULT NULL, PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO restdb.partyrole VALUES(null,'test_role_name_string','test_role_data_string');
INSERT INTO restdb.partyrole VALUES(null,'test_role_name_string','test_role_data_string');
INSERT INTO restdb.partyrole VALUES(null,'test_role_name_string','test_role_data_string');

CREATE DATABASE IF NOT EXISTS `resttestdb`;

CREATE TABLE IF NOT EXISTS resttestdb.party (id int(11) NOT NULL AUTO_INCREMENT, party_name varchar(255) DEFAULT NULL, party_type varchar(255) DEFAULT NULL, PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO resttestdb.party VALUES(null,'test_party_name_string','test_party_type_string');
INSERT INTO resttestdb.party VALUES(null,'test_party_name_string','test_party_type_string');
INSERT INTO resttestdb.party VALUES(null,'test_party_name_string','test_party_type_string');
CREATE TABLE IF NOT EXISTS resttestdb.partyrelationship (id int(11) NOT NULL AUTO_INCREMENT, relationship_name varchar(255) DEFAULT NULL, relationship_data varchar(255) DEFAULT NULL, party_id varchar(255) DEFAULT NULL, party_role_id varchar(255) DEFAULT NULL, PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO resttestdb.partyrelationship VALUES(null,'test_relationship_name_string','test_relationship_data_string','test_party_id_string','test_party_role_id_string');
INSERT INTO resttestdb.partyrelationship VALUES(null,'test_relationship_name_string','test_relationship_data_string','test_party_id_string','test_party_role_id_string');
INSERT INTO resttestdb.partyrelationship VALUES(null,'test_relationship_name_string','test_relationship_data_string','test_party_id_string','test_party_role_id_string');
CREATE TABLE IF NOT EXISTS resttestdb.partyrole (id int(11) NOT NULL AUTO_INCREMENT, role_name varchar(255) DEFAULT NULL, role_data varchar(255) DEFAULT NULL, PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO resttestdb.partyrole VALUES(null,'test_role_name_string','test_role_data_string');
INSERT INTO resttestdb.partyrole VALUES(null,'test_role_name_string','test_role_data_string');
INSERT INTO resttestdb.partyrole VALUES(null,'test_role_name_string','test_role_data_string');


