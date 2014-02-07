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
     * @var \Yum\YumBundle\Repository\YumRepository
     */
    private $yumRepository;

    /**
     * constructor
     *
     */
    public function __construct()
    {
        $this->db = include __DIR__ . "/../../db.php";
        $this->yumRepository = new YumRepository($this->db);
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
        $this->yumRepository = new YumRepository($this->db);
    }

    /**
     * testFindAll
     *
     * @return void
     */
    public function testFindAll()
    {
        $expected = $this->getConnection()->getRowCount('yum');
        $actual = count($this->yumRepository->findAll());

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

        $expected = 'test_yum_name';
        $Yum = $this->yumRepository->find($inputId);
        $actual = $Yum['name'];

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
        $actual = $this->yumRepository->find($inputId);

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

        $this->yumRepository->delete($inputId);
        $expected = null;
        $actual = $this->yumRepository->find($inputId);

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
        $actual = $this->yumRepository->delete($inputId);

        $this->assertEquals($expected, $actual);
    }

    /**
     * testUpdateinputId2NameNewYum
     *
     * @return void
     */
    public function testUpdateInputId2NameNewYum()
    {
        $inputId = 2;
        $inputParams = array('name' => 'New Yum');

        $this->yumRepository->update($inputId, $inputParams);
        $YumRepository = $this->yumRepository->find($inputId);

        $expected = 'New Yum';
        $actual = $YumRepository['name'];
        $this->assertEquals($expected, $actual);
    }

    /**
     * testInsertinputNameNewYum
     *
     * @return void
     */
    public function testInsertInputNameNewYum()
    {
        $inputParams = array('name' => 'New Yum');
        $this->yumRepository->insert($inputParams);
        $lastInsertId = $this->db->lastInsertId();
        $YumRepository = $this->yumRepository->find($lastInsertId);

        $expected = 'New Yum';
        $actual = $YumRepository['name'];

        $this->assertEquals($expected, $actual);
    }
}
/* End of file YumRepositoryTest.php */
