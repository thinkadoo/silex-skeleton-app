<?php
/**
 * File: db.php
 *
 * PHP Version 5.3.21
 *
 * @category Api_Rest_Implementation
 * @package  Modules_PartyRelationship
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-app.git
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
