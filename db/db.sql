
CREATE DATABASE IF NOT EXISTS `restdb`;

CREATE DATABASE IF NOT EXISTS `resttestdb`;


    CREATE TABLE IF NOT EXISTS `restdb`.`user` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) DEFAULT NULL,
    `surname` varchar(255) DEFAULT NULL,
    `email` varchar(255) DEFAULT NULL,
    `employee_nr` varchar(255) DEFAULT NULL,
    `role` tinyint(4) NOT NULL DEFAULT '0',
    `password` varchar(255) DEFAULT NULL,
    `salt` varchar(255) DEFAULT NULL,
    `locked` tinyint(4) NOT NULL DEFAULT '0',
    `deleted` tinyint(4) NOT NULL DEFAULT '0',
    `created_by` varchar(255) DEFAULT NULL,
    `created_at` char(20) DEFAULT NULL,
    `updated_by` varchar(255) DEFAULT NULL,
    `updated_at` char(20) DEFAULT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    CREATE TABLE IF NOT EXISTS `resttestdb`.`user` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) DEFAULT NULL,
    `surname` varchar(255) DEFAULT NULL,
    `email` varchar(255) DEFAULT NULL,
    `employee_nr` varchar(255) DEFAULT NULL,
    `role` tinyint(4) NOT NULL DEFAULT '0',
    `password` varchar(255) DEFAULT NULL,
    `salt` varchar(255) DEFAULT NULL,
    `locked` tinyint(4) NOT NULL DEFAULT '0',
    `deleted` tinyint(4) NOT NULL DEFAULT '0',
    `created_by` varchar(255) DEFAULT NULL,
    `created_at` char(20) DEFAULT NULL,
    `updated_by` varchar(255) DEFAULT NULL,
    `updated_at` char(20) DEFAULT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    insert into `restdb`.`user` values
    (null, 'test_user_name', 'test_user_surname', 'test_user_name@email.com', 'test_user_employee_nr', '0', 'test_user_password', 'test_user_salt', '0', '0', 'test_user_created_by', '2013-01-01 00:00:00', 'test_user_updated_by', '2013-01-01 00:00:00'),
    (null, 'test_user_name_2', 'test_user_surname_2', 'test_user_name_2@email.com', 'test_user_employee_nr_2', '0', 'test_user_password_2', 'test_user_salt_2', '0', '0', 'test_user_created_by', '2013-01-01 00:00:00', 'test_user_updated_by', '2013-01-01 00:00:00');

    insert into `resttestdb`.`user` values
    (null, 'test_user_name', 'test_user_surname', 'test_user_name@email.com', 'test_user_employee_nr', '0', 'test_user_password', 'test_user_salt', '0', '0', 'test_user_created_by', '2013-01-01 00:00:00', 'test_user_updated_by', '2013-01-01 00:00:00'),
    (null, 'test_user_name_2', 'test_user_surname_2', 'test_user_name_2@email.com', 'test_user_employee_nr_2', '0', 'test_user_password_2', 'test_user_salt_2', '0', '0', 'test_user_created_by', '2013-01-01 00:00:00', 'test_user_updated_by', '2013-01-01 00:00:00');


    CREATE TABLE IF NOT EXISTS `restdb`.`yam` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) DEFAULT NULL,
    `surname` varchar(255) DEFAULT NULL,
    `email` varchar(255) DEFAULT NULL,
    `employee_nr` varchar(255) DEFAULT NULL,
    `role` tinyint(4) NOT NULL DEFAULT '0',
    `password` varchar(255) DEFAULT NULL,
    `salt` varchar(255) DEFAULT NULL,
    `locked` tinyint(4) NOT NULL DEFAULT '0',
    `deleted` tinyint(4) NOT NULL DEFAULT '0',
    `created_by` varchar(255) DEFAULT NULL,
    `created_at` char(20) DEFAULT NULL,
    `updated_by` varchar(255) DEFAULT NULL,
    `updated_at` char(20) DEFAULT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    CREATE TABLE IF NOT EXISTS `resttestdb`.`yam` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) DEFAULT NULL,
    `surname` varchar(255) DEFAULT NULL,
    `email` varchar(255) DEFAULT NULL,
    `employee_nr` varchar(255) DEFAULT NULL,
    `role` tinyint(4) NOT NULL DEFAULT '0',
    `password` varchar(255) DEFAULT NULL,
    `salt` varchar(255) DEFAULT NULL,
    `locked` tinyint(4) NOT NULL DEFAULT '0',
    `deleted` tinyint(4) NOT NULL DEFAULT '0',
    `created_by` varchar(255) DEFAULT NULL,
    `created_at` char(20) DEFAULT NULL,
    `updated_by` varchar(255) DEFAULT NULL,
    `updated_at` char(20) DEFAULT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    insert into `restdb`.`yam` values
    (null, 'test_yam_name', 'test_yam_surname', 'test_yam_name@email.com', 'test_yam_employee_nr', '0', 'test_yam_password', 'test_yam_salt', '0', '0', 'test_yam_created_by', '2013-01-01 00:00:00', 'test_yam_updated_by', '2013-01-01 00:00:00'),
    (null, 'test_yam_name_2', 'test_yam_surname_2', 'test_yam_name_2@email.com', 'test_yam_employee_nr_2', '0', 'test_yam_password_2', 'test_yam_salt_2', '0', '0', 'test_yam_created_by', '2013-01-01 00:00:00', 'test_yam_updated_by', '2013-01-01 00:00:00');

    insert into `resttestdb`.`yam` values
    (null, 'test_yam_name', 'test_yam_surname', 'test_yam_name@email.com', 'test_yam_employee_nr', '0', 'test_yam_password', 'test_yam_salt', '0', '0', 'test_yam_created_by', '2013-01-01 00:00:00', 'test_yam_updated_by', '2013-01-01 00:00:00'),
    (null, 'test_yam_name_2', 'test_yam_surname_2', 'test_yam_name_2@email.com', 'test_yam_employee_nr_2', '0', 'test_yam_password_2', 'test_yam_salt_2', '0', '0', 'test_yam_created_by', '2013-01-01 00:00:00', 'test_yam_updated_by', '2013-01-01 00:00:00');


    CREATE TABLE IF NOT EXISTS `restdb`.`yum` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) DEFAULT NULL,
    `surname` varchar(255) DEFAULT NULL,
    `email` varchar(255) DEFAULT NULL,
    `employee_nr` varchar(255) DEFAULT NULL,
    `role` tinyint(4) NOT NULL DEFAULT '0',
    `password` varchar(255) DEFAULT NULL,
    `salt` varchar(255) DEFAULT NULL,
    `locked` tinyint(4) NOT NULL DEFAULT '0',
    `deleted` tinyint(4) NOT NULL DEFAULT '0',
    `created_by` varchar(255) DEFAULT NULL,
    `created_at` char(20) DEFAULT NULL,
    `updated_by` varchar(255) DEFAULT NULL,
    `updated_at` char(20) DEFAULT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    CREATE TABLE IF NOT EXISTS `resttestdb`.`yum` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) DEFAULT NULL,
    `surname` varchar(255) DEFAULT NULL,
    `email` varchar(255) DEFAULT NULL,
    `employee_nr` varchar(255) DEFAULT NULL,
    `role` tinyint(4) NOT NULL DEFAULT '0',
    `password` varchar(255) DEFAULT NULL,
    `salt` varchar(255) DEFAULT NULL,
    `locked` tinyint(4) NOT NULL DEFAULT '0',
    `deleted` tinyint(4) NOT NULL DEFAULT '0',
    `created_by` varchar(255) DEFAULT NULL,
    `created_at` char(20) DEFAULT NULL,
    `updated_by` varchar(255) DEFAULT NULL,
    `updated_at` char(20) DEFAULT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    insert into `restdb`.`yum` values
    (null, 'test_yum_name', 'test_yum_surname', 'test_yum_name@email.com', 'test_yum_employee_nr', '0', 'test_yum_password', 'test_yum_salt', '0', '0', 'test_yum_created_by', '2013-01-01 00:00:00', 'test_yum_updated_by', '2013-01-01 00:00:00'),
    (null, 'test_yum_name_2', 'test_yum_surname_2', 'test_yum_name_2@email.com', 'test_yum_employee_nr_2', '0', 'test_yum_password_2', 'test_yum_salt_2', '0', '0', 'test_yum_created_by', '2013-01-01 00:00:00', 'test_yum_updated_by', '2013-01-01 00:00:00');

    insert into `resttestdb`.`yum` values
    (null, 'test_yum_name', 'test_yum_surname', 'test_yum_name@email.com', 'test_yum_employee_nr', '0', 'test_yum_password', 'test_yum_salt', '0', '0', 'test_yum_created_by', '2013-01-01 00:00:00', 'test_yum_updated_by', '2013-01-01 00:00:00'),
    (null, 'test_yum_name_2', 'test_yum_surname_2', 'test_yum_name_2@email.com', 'test_yum_employee_nr_2', '0', 'test_yum_password_2', 'test_yum_salt_2', '0', '0', 'test_yum_created_by', '2013-01-01 00:00:00', 'test_yum_updated_by', '2013-01-01 00:00:00');


    CREATE TABLE IF NOT EXISTS `restdb`.`yoo` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) DEFAULT NULL,
    `surname` varchar(255) DEFAULT NULL,
    `email` varchar(255) DEFAULT NULL,
    `employee_nr` varchar(255) DEFAULT NULL,
    `role` tinyint(4) NOT NULL DEFAULT '0',
    `password` varchar(255) DEFAULT NULL,
    `salt` varchar(255) DEFAULT NULL,
    `locked` tinyint(4) NOT NULL DEFAULT '0',
    `deleted` tinyint(4) NOT NULL DEFAULT '0',
    `created_by` varchar(255) DEFAULT NULL,
    `created_at` char(20) DEFAULT NULL,
    `updated_by` varchar(255) DEFAULT NULL,
    `updated_at` char(20) DEFAULT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    CREATE TABLE IF NOT EXISTS `resttestdb`.`yoo` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) DEFAULT NULL,
    `surname` varchar(255) DEFAULT NULL,
    `email` varchar(255) DEFAULT NULL,
    `employee_nr` varchar(255) DEFAULT NULL,
    `role` tinyint(4) NOT NULL DEFAULT '0',
    `password` varchar(255) DEFAULT NULL,
    `salt` varchar(255) DEFAULT NULL,
    `locked` tinyint(4) NOT NULL DEFAULT '0',
    `deleted` tinyint(4) NOT NULL DEFAULT '0',
    `created_by` varchar(255) DEFAULT NULL,
    `created_at` char(20) DEFAULT NULL,
    `updated_by` varchar(255) DEFAULT NULL,
    `updated_at` char(20) DEFAULT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    insert into `restdb`.`yoo` values
    (null, 'test_yoo_name', 'test_yoo_surname', 'test_yoo_name@email.com', 'test_yoo_employee_nr', '0', 'test_yoo_password', 'test_yoo_salt', '0', '0', 'test_yoo_created_by', '2013-01-01 00:00:00', 'test_yoo_updated_by', '2013-01-01 00:00:00'),
    (null, 'test_yoo_name_2', 'test_yoo_surname_2', 'test_yoo_name_2@email.com', 'test_yoo_employee_nr_2', '0', 'test_yoo_password_2', 'test_yoo_salt_2', '0', '0', 'test_yoo_created_by', '2013-01-01 00:00:00', 'test_yoo_updated_by', '2013-01-01 00:00:00');

    insert into `resttestdb`.`yoo` values
    (null, 'test_yoo_name', 'test_yoo_surname', 'test_yoo_name@email.com', 'test_yoo_employee_nr', '0', 'test_yoo_password', 'test_yoo_salt', '0', '0', 'test_yoo_created_by', '2013-01-01 00:00:00', 'test_yoo_updated_by', '2013-01-01 00:00:00'),
    (null, 'test_yoo_name_2', 'test_yoo_surname_2', 'test_yoo_name_2@email.com', 'test_yoo_employee_nr_2', '0', 'test_yoo_password_2', 'test_yoo_salt_2', '0', '0', 'test_yoo_created_by', '2013-01-01 00:00:00', 'test_yoo_updated_by', '2013-01-01 00:00:00');

