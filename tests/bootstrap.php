<?php
/**
 * File: bootstrap.php
 *
 * PHP Version 5.5.0
 *
 * @category Api_Rest_Implementation_Tests
 * @package  Modules_Todo
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-rest.git
 */
$loader = include_once __DIR__.'/../app/bootstrap.php';

$loader->registerNamespace('Todo\Tests', __DIR__);

/* End of file bootstrap.php */