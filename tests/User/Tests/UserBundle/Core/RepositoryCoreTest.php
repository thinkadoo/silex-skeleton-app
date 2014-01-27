<?php
/**
 * File: RepositoryCoreTest.php
 *
 * PHP Version 5.5.0
 *
 * @category Api_Rest_Implementation_Tests
 * @package  User_Tests_UserBundle_Core
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
class RepositoryCoreTest extends \PHPUnit_Extensions_Database_TestCase
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
     * @var \User\UserBundle\Core\RepositoryCore
     */
    private $_repositoryCore;

    /**
     * constructor
     *
     */
    public function __construct()
    {
        $tableName = 'user';

        $this->_db = include __DIR__ . "/../../db.php";
        $this->_repositoryCore = new RepositoryCore($this->_db);
        $this->_repositoryCore->setTable($tableName);
    }

    /**
     * getConnection
     *
     * @return object|\PHPUnit_Extensions_Database_DB_DefaultDatabaseConnection
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
     * @return \PHPUnit_Extensions_Database_DataSet_IDataSet
     */
    public function getDataSet()
    {
        self::$_pdo->exec("set foreign_key_checks=0");

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
        $this->_repositoryCore = new RepositoryCore($this->_db);
        $this->_repositoryCore->setTable($inputTableName);
    }

    /**
     * testFindAll
     *
     * @return void
     */
    public function testFindAll()
    {
        $expected = $this->getConnection()->getRowCount('user');
        $actual = count($this->_repositoryCore->findAll());

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

        $expected = 'test_user_name';
        $user = $this->_repositoryCore->find($inputId);
        $actual = $user['name'];

        $this->assertEquals($expected, $actual);
    }

    /**
     * testFind_inputId2_outputNameUtilizeTheSkeletonSoICanUseItForMyProject
     *
     * @return void
     */
    public function testFindInputId2OutputNameUtilizeTheSkeletonSoICanUseItForMyProject()
    {
        $inputId = 2;

        $expected = 'test_user_name_2';
        $user = $this->_repositoryCore->find($inputId);
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
        $actual = $this->_repositoryCore->find($inputId);

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

        $this->_repositoryCore->delete($inputId);
        $expected = null;
        $actual = $this->_repositoryCore->find($inputId);

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
        $actual = $this->_repositoryCore->delete($inputId);

        $this->assertEquals($expected, $actual);
    }

    /**
     * testUpdate_inputId2NameFooBar
     *
     * @return void
     */
    public function testUpdateInputId2NameFooBar()
    {
        $inputId = 2;
        $inputParams = array('name' => 'Foo Bar');

        $this->_repositoryCore->update($inputId, $inputParams);
        $repositoryCore = $this->_repositoryCore->find($inputId);

        $expected = 'Foo Bar';
        $actual = $repositoryCore['name'];
        $this->assertEquals($expected, $actual);
    }

    /**
     * testInsert_inputNameFooBar
     *
     * @return void
     */
    public function testInsertInputNameFooBar()
    {
        $inputParams = array('name' => 'Foo Bar');
        $this->_repositoryCore->insert($inputParams);
        $lastInsertId = $this->_db->lastInsertId();
        $repositoryCore = $this->_repositoryCore->find($lastInsertId);

        $expected = 'Foo Bar';
        $actual = $repositoryCore['name'];

        $this->assertEquals($expected, $actual);
    }
}
/* End of file RepositoryCoreTest.php */