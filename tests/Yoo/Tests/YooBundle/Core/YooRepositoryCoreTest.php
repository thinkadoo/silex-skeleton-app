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
namespace Yoo\Tests\YooBundle\Core;

use Yoo\YooBundle\Repository\YooRepository;
use Silex\Application;

/**
 * Class YooRepositoryTest
 *
 * @category Api_Rest_Implementation_Tests
 * @package  Yoo\Tests\YooBundle\Repository
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-rest.git
 */
class YooRepositoryTest extends \PHPUnit_Extensions_Database_TestCase
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
     * @var \Yoo\YooBundle\Repository\YooRepository
     */
    private $yooRepository;

    /**
     * constructor
     *
     */
    public function __construct()
    {
        $this->db = include __DIR__ . "/../../db.php";
        $this->yooRepository = new YooRepository($this->db);
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
        $this->yooRepository = new YooRepository($this->db);
    }

    /**
     * testFindAll
     *
     * @return void
     */
    public function testFindAll()
    {
        $expected = $this->getConnection()->getRowCount('yoo');
        $actual = count($this->yooRepository->findAll());

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

        $expected = 'test_yoo_name';
        $Yoo = $this->yooRepository->find($inputId);
        $actual = $Yoo['name'];

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
        $actual = $this->yooRepository->find($inputId);

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

        $this->yooRepository->delete($inputId);
        $expected = null;
        $actual = $this->yooRepository->find($inputId);

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
        $actual = $this->yooRepository->delete($inputId);

        $this->assertEquals($expected, $actual);
    }

    /**
     * testUpdateinputId2NameNewYoo
     *
     * @return void
     */
    public function testUpdateInputId2NameNewYoo()
    {
        $inputId = 2;
        $inputParams = array('name' => 'New Yoo');

        $this->yooRepository->update($inputId, $inputParams);
        $YooRepository = $this->yooRepository->find($inputId);

        $expected = 'New Yoo';
        $actual = $YooRepository['name'];
        $this->assertEquals($expected, $actual);
    }

    /**
     * testInsertinputNameNewYoo
     *
     * @return void
     */
    public function testInsertInputNameNewYoo()
    {
        $inputParams = array('name' => 'New Yoo');
        $this->yooRepository->insert($inputParams);
        $lastInsertId = $this->db->lastInsertId();
        $YooRepository = $this->yooRepository->find($lastInsertId);

        $expected = 'New Yoo';
        $actual = $YooRepository['name'];

        $this->assertEquals($expected, $actual);
    }
}
/* End of file YooRepositoryTest.php */
