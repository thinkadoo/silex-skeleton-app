<?php
/**
 * File: UserRepositoryCoreTest.php
 *
 * PHP Version 5.3.21
 *
 * @category Api_Rest_Implementation
 * @package  Modules_User
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-rest.git
 */
namespace User\Tests\UserBundle\Core;

use Silex\Application;
use User\UserBundle\Core\RepositoryCore;

/**
 * Class RepositoryCoreTest
 *
 * @category Api_Rest_Implementation
 * @package  User\Tests\UserBundle\Core
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-rest.git
 */
class UserRepositoryCoreTest extends \PHPUnit_Extensions_Database_TestCase
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
     * @var \User\UserBundle\Core\RepositoryCore
     */
    private $repositoryCore;

    /**
     * constructor
     *
     */
    public function __construct()
    {
        $tableName = 'user';

        $this->db = include __DIR__ . "/../../db.php";
        $this->repositoryCore = new RepositoryCore($this->db);
        $this->repositoryCore->setTable($tableName);
    }

    /**
     * getConnection
     *
     * @return object|\PHPUnit_Extensions_Database_DB_DefaultDatabaseConnection
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
     * @return \PHPUnit_Extensions_Database_DataSet_IDataSet
     */
    public function getDataSet()
    {
        self::$pdo->exec("set foreign_key_checks=0");

        return new \PHPUnit_Extensions_Database_DataSet_YamlDataSet(
            __DIR__ . "/../../DataSet/User/seedUser.yml"
        );
    }

    /**
     * testConstructRepositoryCoreClass
     *
     * @return void
     */
    public function testConstructRepositoryCoreClass()
    {
        $inputTableName = 'user';
        $this->repositoryCore = new RepositoryCore($this->db);
        $this->repositoryCore->setTable($inputTableName);
    }

    /**
     * testFindAll
     *
     * @return void
     */
    public function testFindAll()
    {
        $expected = $this->getConnection()->getRowCount('user');
        $actual = count($this->repositoryCore->findAll());

        $this->assertEquals($expected, $actual);
    }

    /**
     * testFindinputId1_outputNameDownloadSilexSkeletonRest
     *
     * @return void
     */
    public function testFindInputId1OutputNameDownloadSilexSkeletonRest()
    {
        $inputId = 1;

        $expected = 'test_'.'name'.'_string';
        $user = $this->repositoryCore->find($inputId);
        $actual = $user['name'];

        $this->assertEquals($expected, $actual);
    }

    /**
     * testFindinputId2_outputNameUtilizeTheSkeletonSoICanUseItForMyProject
     *
     * @return void
     */
    public function testFindInputId2OutputNameUtilizeTheSkeletonSoICanUseItForMyProject()
    {
        $inputId = 2;

        $expected = 'test_'.'name'.'_string';
        $user = $this->repositoryCore->find($inputId);
        $actual = $user['name'];

        $this->assertEquals($expected, $actual);
    }

    /**
     * testFindinputId10_outputNull
     *
     * @return void
     */
    public function testFindInputId10OutputNull()
    {
        $inputId = 10;

        $expected = null;
        $actual = $this->repositoryCore->find($inputId);

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

        $this->repositoryCore->delete($inputId);
        $expected = null;
        $actual = $this->repositoryCore->find($inputId);

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
        $actual = $this->repositoryCore->delete($inputId);

        $this->assertEquals($expected, $actual);
    }

    /**
     * testUpdateinputId2NameFooBar
     *
     * @return void
     */
    public function testUpdateInputId2NameFooBar()
    {
        $inputId = 2;
        $inputParams = array('name' => 'Foo Bar');

        $this->repositoryCore->update($inputId, $inputParams);
        $repositoryCore = $this->repositoryCore->find($inputId);

        $expected = 'Foo Bar';
        $actual = $repositoryCore['name'];
        $this->assertEquals($expected, $actual);
    }

    /**
     * testInsertinputNameFooBar
     *
     * @return void
     */
    public function testInsertInputNameFooBar()
    {
        $inputParams = array('name' => 'Foo Bar');
        $this->repositoryCore->insert($inputParams);
        $lastInsertId = $this->db->lastInsertId();
        $repositoryCore = $this->repositoryCore->find($lastInsertId);

        $expected = 'Foo Bar';
        $actual = $repositoryCore['name'];

        $this->assertEquals($expected, $actual);
    }
}
/* End of file UserRepositoryCoreTest.php */
