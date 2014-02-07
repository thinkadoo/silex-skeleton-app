<?php
/**
 * File: YooRepositoryTest.php
 *
 * PHP Version 5.3.21
 *
 * @category Api_Rest_Implementation_Tests
 * @package  Modules_Yoo
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-rest.git
 */
namespace Yoo\Tests\YooBundle\Repository;

use Yoo\YooBundle\Repository\YooRepository;
use Silex\Application;

/**
 * Class YooRepositoryTest
 *
 * @category Api_Rest_Implementation_Tests
 * @package  Yoo\Tests\YooBundle\Core
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-rest.git
 */
class YooRepositoryTest extends \PHPUnit_Extensions_Database_TestCase
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
     * @var \Yoo\YooBundle\Repository\YooRepository
     */
    private $_yooRepository;

    /**
     * constructor
     *
     */
    public function __construct()
    {
        $this->_db = include __DIR__ . "/../../db.php";
        $this->_yooRepository = new YooRepository($this->_db);
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
            __DIR__ . "/../../DataSet/Yoo/seedYoo.yml"
        );
    }

    /**
     * testConstructYooRepositoryClass
     *
     * @return void
     */
    public function testConstructYooRepositoryClass()
    {
        $this->_yooRepository = new YooRepository($this->_db);
    }

    /**
     * testFindAll
     *
     * @return void
     */
    public function testFindAll()
    {
        $expected = $this->getConnection()->getRowCount('Yoo');
        $actual = count($this->_yooRepository->findAll());

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

        $expected = 'test_yoo_name';
        $Yoo = $this->_yooRepository->find($inputId);
        $actual = $Yoo['name'];

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
        $actual = $this->_yooRepository->find($inputId);

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

        $this->_yooRepository->delete($inputId);
        $expected = null;
        $actual = $this->_yooRepository->find($inputId);

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
        $actual = $this->_yooRepository->delete($inputId);

        $this->assertEquals($expected, $actual);
    }

    /**
     * testUpdate_inputId2NameNewYoo
     *
     * @return void
     */
    public function testUpdateInputId2NameNewYoo()
    {
        $inputId = 2;
        $inputParams = array('name' => 'New Yoo');

        $this->_yooRepository->update($inputId, $inputParams);
        $YooRepository = $this->_yooRepository->find($inputId);

        $expected = 'New Yoo';
        $actual = $YooRepository['name'];
        $this->assertEquals($expected, $actual);
    }

    /**
     * testInsert_inputNameNewYoo
     *
     * @return void
     */
    public function testInsertInputNameNewYoo()
    {
        $inputParams = array('name' => 'New Yoo');
        $this->_yooRepository->insert($inputParams);
        $lastInsertId = $this->_db->lastInsertId();
        $YooRepository = $this->_yooRepository->find($lastInsertId);

        $expected = 'New Yoo';
        $actual = $YooRepository['name'];

        $this->assertEquals($expected, $actual);
    }
}
/* End of file YooRepositoryTest.php */
