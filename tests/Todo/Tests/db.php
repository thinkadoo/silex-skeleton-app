<?php
/**
 * File: db.php
 *
 * PHP Version 5.5.0
 *
 * @category Api_Rest_Implementation_Tests
 * @package  Todo_Tests_TodoBundle
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-rest.git
 */

return \Doctrine\DBAL\DriverManager::getConnection(
    array(
        'driver'   => $GLOBALS['DB_DRIVER'],
        'dbname'   => $GLOBALS['DB_DBNAME'],
        'host'     => $GLOBALS['DB_HOST'],
        'user'     => $GLOBALS['DB_USER'],
        'password' => $GLOBALS['DB_PASSWD']
    )
);

/* End of file db.php */