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
     * @var \Yam\YamBundle\Repository\YamRepository
     */
    private $yamRepository;

    /**
     * constructor
     *
     */
    public function __construct()
    {
        $this->db = include __DIR__ . "/../../db.php";
        $this->yamRepository = new YamRepository($this->db);
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
        $this->yamRepository = new YamRepository($this->db);
    }

    /**
     * testFindAll
     *
     * @return void
     */
    public function testFindAll()
    {
        $expected = $this->getConnection()->getRowCount('yam');
        $actual = count($this->yamRepository->findAll());

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
        $Yam = $this->yamRepository->find($inputId);
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
        $actual = $this->yamRepository->find($inputId);

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

        $this->yamRepository->delete($inputId);
        $expected = null;
        $actual = $this->yamRepository->find($inputId);

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
        $actual = $this->yamRepository->delete($inputId);

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

        $this->yamRepository->update($inputId, $inputParams);
        $YamRepository = $this->yamRepository->find($inputId);

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
        $this->yamRepository->insert($inputParams);
        $lastInsertId = $this->db->lastInsertId();
        $YamRepository = $this->yamRepository->find($lastInsertId);

        $expected = 'New Yam';
        $actual = $YamRepository['name'];

        $this->assertEquals($expected, $actual);
    }
}
/* End of file YamRepositoryTest.php */
