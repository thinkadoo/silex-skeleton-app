<?php
/**
 * File: YamRepositoryTest.php
 *
 * PHP Version 5.3.21
 *
 * @category Api_Rest_Implementation_Tests
 * @package  Modules_Yam
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-rest.git
 */
namespace Yam\Tests\YamBundle\Repository;

use Yam\YamBundle\Repository\YamRepository;
use Silex\Application;

/**
 * Class YamRepositoryTest
 *
 * @category Api_Rest_Implementation_Tests
 * @package  Yam\Tests\YamBundle\Core
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-rest.git
 */
class YamRepositoryTest extends \PHPUnit_Extensions_Database_TestCase
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
     * @var \Yam\YamBundle\Repository\YamRepository
     */
    private $_yamRepository;

    /**
     * constructor
     *
     */
    public function __construct()
    {
        $this->_db = include __DIR__ . "/../../db.php";
        $this->_yamRepository = new YamRepository($this->_db);
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
            __DIR__ . "/../../DataSet/Yam/seedYam.yml"
        );
    }

    /**
     * testConstructYamRepositoryClass
     *
     * @return void
     */
    public function testConstructYamRepositoryClass()
    {
        $this->_yamRepository = new YamRepository($this->_db);
    }

    /**
     * testFindAll
     *
     * @return void
     */
    public function testFindAll()
    {
        $expected = $this->getConnection()->getRowCount('Yam');
        $actual = count($this->_yamRepository->findAll());

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

        $expected = 'test_yam_name';
        $Yam = $this->_yamRepository->find($inputId);
        $actual = $Yam['name'];

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
        $actual = $this->_yamRepository->find($inputId);

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

        $this->_yamRepository->delete($inputId);
        $expected = null;
        $actual = $this->_yamRepository->find($inputId);

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
        $actual = $this->_yamRepository->delete($inputId);

        $this->assertEquals($expected, $actual);
    }

    /**
     * testUpdate_inputId2NameNewYam
     *
     * @return void
     */
    public function testUpdateInputId2NameNewYam()
    {
        $inputId = 2;
        $inputParams = array('name' => 'New Yam');

        $this->_yamRepository->update($inputId, $inputParams);
        $YamRepository = $this->_yamRepository->find($inputId);

        $expected = 'New Yam';
        $actual = $YamRepository['name'];
        $this->assertEquals($expected, $actual);
    }

    /**
     * testInsert_inputNameNewYam
     *
     * @return void
     */
    public function testInsertInputNameNewYam()
    {
        $inputParams = array('name' => 'New Yam');
        $this->_yamRepository->insert($inputParams);
        $lastInsertId = $this->_db->lastInsertId();
        $YamRepository = $this->_yamRepository->find($lastInsertId);

        $expected = 'New Yam';
        $actual = $YamRepository['name'];

        $this->assertEquals($expected, $actual);
    }
}
/* End of file YamRepositoryTest.php */
