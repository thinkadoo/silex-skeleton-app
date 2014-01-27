<?php
/**
 * File: UserRepositoryTest.php
 *
 * PHP Version 5.5.0
 *
 * @category Api_Rest_Implementation_Tests
 * @package  User_Tests_UserBundle_Core
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-rest.git
 */
namespace User\Tests\UserBundle\Repository;

use Silex\Application;
use User\UserBundle\Repository\UserRepository;
/**
 * Class UserRepositoryTest
 *
 * @category Api_Rest_Implementation
 * @package  User\Tests\UserBundle\Repository
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-rest.git
 */
class UserRepositoryTest extends \PHPUnit_Extensions_Database_TestCase
{
    /**
     * @var null
     */
    static private $_pdo = null;
    /**
     * @var object
     */
    private $_conn;
    /**
     * @var mixed
     */
    private $_db;
    /**
     * @var \User\UserBundle\Repository\UserRepository
     */
    private $_userRepository;

    /**
     * constructor
     *
     */
    public function __construct()
    {
        $this->_db = include __DIR__ . "/../../db.php";
        $this->_userRepository = new UserRepository($this->_db);
    }

    /**
     * getConnection
     *
     * @return \PHPUnit_Extensions_Database_DB_DefaultDatabaseConnection
     */
    public function getConnection()
    {
        if ($this->_conn === null) {
            if (self::$_pdo == null) {
                self::$_pdo = new \PDO($GLOBALS['DB_DSN'], $GLOBALS['DB_USER'], $GLOBALS['DB_PASSWD']);
            }
            $this->_conn = $this->createDefaultDBConnection(self::$_pdo, $GLOBALS['DB_DBNAME']);
        }

        return $this->_conn;
    }

    /**
     * getDataSet
     *
     * @return \PHPUnit_Extensions_Database_DataSet_IDataSet|\PHPUnit_Extensions_Database_DataSet_YamlDataSet
     */
    public function getDataSet()
    {
        self::$_pdo->exec("set foreign_key_checks=0");

        return new \PHPUnit_Extensions_Database_DataSet_YamlDataSet(
            __DIR__ . "/../../DataSet/User/seedUser.yml"
        );
    }

    /**
     * testConstructUserRepositoryClass
     *
     * @return void
     */
    public function testConstructUserRepositoryClass()
    {
        $this->_userRepository = new UserRepository($this->_db);
    }

    /**
     * testFindAll
     *
     * @return void
     */
    public function testFindAll()
    {
        $expected = $this->getConnection()->getRowCount('user');
        $actual = count($this->_userRepository->findAll());

        $this->assertEquals($expected, $actual);
    }

    /**
     * testFind_inputId1_outputNameDownloadSilexSkeletonRest
     *
     * @return void
     */
    public function testFindInputId1OutputNameDownloadSilexSkeletonRest()
    {
        $inputId = 1;

        $expected = 'Download silex-skeleton-rest.';
        $user = $this->_userRepository->find($inputId);
        $actual = $user['name'];

        $this->assertEquals($expected, $actual);
    }

    /**
     * testFind_inputId10_outputNull
     *
     * @return void
     */
    public function testFindInputId10OutputNull()
    {
        $inputId = 10;

        $expected = null;
        $actual = $this->_userRepository->find($inputId);

        $this->assertEquals($expected, $actual);
    }

    /**
     * testDelete_inputId1
     *
     * @return void
     */
    public function testDeleteInputId1()
    {
        $inputId = 1;

        $this->_userRepository->delete($inputId);
        $expected = null;
        $actual = $this->_userRepository->find($inputId);

        $this->assertEquals($expected, $actual);
    }

    /**
     * testDelete_inputId10
     *
     * @return void
     */
    public function testDeleteInputId10()
    {
        $inputId = 10;

        $expected = 0;
        $actual = $this->_userRepository->delete($inputId);

        $this->assertEquals($expected, $actual);
    }

    /**
     * testUpdate_inputId2NameNewUser
     *
     * @return void
     */
    public function testUpdateInputId2NameNewUser()
    {
        $inputId = 2;
        $inputParams = array('name' => 'New User');

        $this->_userRepository->update($inputId, $inputParams);
        $userRepository = $this->_userRepository->find($inputId);

        $expected = 'New User';
        $actual = $userRepository['name'];
        $this->assertEquals($expected, $actual);
    }

    /**
     * testInsert_inputNameNewUser
     *
     * @return void
     */
    public function testInsertInputNameNewUser()
    {
        $inputParams = array('name' => 'New User');
        $this->_userRepository->insert($inputParams);
        $lastInsertId = $this->_db->lastInsertId();
        $userRepository = $this->_userRepository->find($lastInsertId);

        $expected = 'New User';
        $actual = $userRepository['name'];

        $this->assertEquals($expected, $actual);
    }
}
/* End of file UserRepositoryTest.php */