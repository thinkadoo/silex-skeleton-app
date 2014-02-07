<?php
/**
 * File: YumRepositoryTest.php
 *
 * PHP Version 5.3.21
 *
 * @category Api_Rest_Implementation_Tests
 * @package  Modules_Yum
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-rest.git
 */
namespace Yum\Tests\YumBundle\Repository;

use Yum\YumBundle\Repository\YumRepository;
use Silex\Application;

/**
 * Class YumRepositoryTest
 *
 * @category Api_Rest_Implementation_Tests
 * @package  Yum\Tests\YumBundle\Core
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-rest.git
 */
class YumRepositoryTest extends \PHPUnit_Extensions_Database_TestCase
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
     * @var \Yum\YumBundle\Repository\YumRepository
     */
    private $_yumRepository;

    /**
     * constructor
     *
     */
    public function __construct()
    {
        $this->_db = include __DIR__ . "/../../db.php";
        $this->_yumRepository = new YumRepository($this->_db);
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
            __DIR__ . "/../../DataSet/Yum/seedYum.yml"
        );
    }

    /**
     * testConstructYumRepositoryClass
     *
     * @return void
     */
    public function testConstructYumRepositoryClass()
    {
        $this->_yumRepository = new YumRepository($this->_db);
    }

    /**
     * testFindAll
     *
     * @return void
     */
    public function testFindAll()
    {
        $expected = $this->getConnection()->getRowCount('yum');
        $actual = count($this->_yumRepository->findAll());

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

        $expected = 'test_yum_name';
        $Yum = $this->_yumRepository->find($inputId);
        $actual = $Yum['name'];

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
        $actual = $this->_yumRepository->find($inputId);

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

        $this->_yumRepository->delete($inputId);
        $expected = null;
        $actual = $this->_yumRepository->find($inputId);

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
        $actual = $this->_yumRepository->delete($inputId);

        $this->assertEquals($expected, $actual);
    }

    /**
     * testUpdate_inputId2NameNewYum
     *
     * @return void
     */
    public function testUpdateInputId2NameNewYum()
    {
        $inputId = 2;
        $inputParams = array('name' => 'New Yum');

        $this->_yumRepository->update($inputId, $inputParams);
        $YumRepository = $this->_yumRepository->find($inputId);

        $expected = 'New Yum';
        $actual = $YumRepository['name'];
        $this->assertEquals($expected, $actual);
    }

    /**
     * testInsert_inputNameNewYum
     *
     * @return void
     */
    public function testInsertInputNameNewYum()
    {
        $inputParams = array('name' => 'New Yum');
        $this->_yumRepository->insert($inputParams);
        $lastInsertId = $this->_db->lastInsertId();
        $YumRepository = $this->_yumRepository->find($lastInsertId);

        $expected = 'New Yum';
        $actual = $YumRepository['name'];

        $this->assertEquals($expected, $actual);
    }
}
/* End of file YumRepositoryTest.php */
