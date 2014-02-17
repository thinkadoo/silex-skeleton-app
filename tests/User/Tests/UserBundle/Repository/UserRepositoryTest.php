<?php
/**
 * File: UserRepositoryTest.php
 *
 * PHP Version 5.3.21
 *
 * @category Api_Rest_Implementation
 * @package  Modules_User
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-rest.git
 */
namespace User\Tests\UserBundle\Repository;

use User\UserBundle\Repository\UserRepository;
use Silex\Application;

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
    static private $pdo = null;
    /**
     * @var object
     */
    private $conn;
    /**
     * @var mixed
     */
    private $db;
    /**
     * @var \User\UserBundle\Repository\UserRepository
     */
    private $userRepository;

    /**
     * constructor
     *
     */
    public function __construct()
    {
        $this->db = include __DIR__ . "/../../db.php";
        $this->userRepository = new UserRepository($this->db);
    }

    /**
     * getConnection
     *
     * @return \PHPUnit_Extensions_Database_DB_DefaultDatabaseConnection
     */
    public function getConnection()
    {
        if ($this->conn === null) {
            if (self::$pdo == null) {
                self::$pdo = new \PDO($GLOBALS['DB_DSN'], $GLOBALS['DB_USER'], $GLOBALS['DB_PASSWD']);
            }
            $this->conn = $this->createDefaultDBConnection(self::$pdo, $GLOBALS['DB_DBNAME']);
        }

        return $this->conn;
    }

    /**
     * getDataSet
     *
     * @return \PHPUnit_Extensions_Database_DataSet_IDataSet|\PHPUnit_Extensions_Database_DataSet_YamlDataSet
     */
    public function getDataSet()
    {
        self::$pdo->exec("set foreign_key_checks=0");

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
        $this->userRepository = new UserRepository($this->db);
    }

    /**
     * testFindAll
     *
     * @return void
     */
    public function testFindAll()
    {
        $expected = $this->getConnection()->getRowCount('user');
        $actual = count($this->userRepository->findAll());

        $this->assertEquals($expected, $actual);
    }

    /**
     * testFindinputId1outputNameDownloadSilexSkeletonRest
     *
     * @return void
     */
    public function testFindInputId1OutputNameDownloadSilexSkeletonRest()
    {
        $inputId = 1;

        $expected = 'test_'.'name'.'_string';
        $User = $this->userRepository->find($inputId);
        $actual = $User['name'];

        $this->assertEquals($expected, $actual);
    }

    /**
     * testFindinputId10outputNull
     *
     * @return void
     */
    public function testFindInputId10OutputNull()
    {
        $inputId = 10;

        $expected = null;
        $actual = $this->userRepository->find($inputId);

        $this->assertEquals($expected, $actual);
    }

    /**
     * testDeleteinputId1
     *
     * @return void
     */
    public function testDeleteInputId1()
    {
        $inputId = 1;

        $this->userRepository->delete($inputId);
        $expected = null;
        $actual = $this->userRepository->find($inputId);

        $this->assertEquals($expected, $actual);
    }

    /**
     * testDeleteinputId10
     *
     * @return void
     */
    public function testDeleteInputId10()
    {
        $inputId = 10;

        $expected = 0;
        $actual = $this->userRepository->delete($inputId);

        $this->assertEquals($expected, $actual);
    }

    /**
     * testUpdateinputId2NameNewUser
     *
     * @return void
     */
    public function testUpdateInputId2NameNewUser()
    {
        $inputId = 2;
        $inputParams = array('name' => 'New User');

        $this->userRepository->update($inputId, $inputParams);
        $UserRepository = $this->userRepository->find($inputId);

        $expected = 'New User';
        $actual = $UserRepository['name'];
        $this->assertEquals($expected, $actual);
    }

    /**
     * testInsertinputNameNewUser
     *
     * @return void
     */
    public function testInsertInputNameNewUser()
    {
        $inputParams = array('name' => 'New User');
        $this->userRepository->insert($inputParams);
        $lastInsertId = $this->db->lastInsertId();
        $UserRepository = $this->userRepository->find($lastInsertId);

        $expected = 'New User';
        $actual = $UserRepository['name'];

        $this->assertEquals($expected, $actual);
    }
}
/* End of file UserRepositoryTest.php */
