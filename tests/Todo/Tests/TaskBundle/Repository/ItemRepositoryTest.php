<?php
/**
 * File: ItemRepositoryTest.php
 *
 * PHP Version 5.5.0
 *
 * @category Api_Rest_Implementation_Tests
 * @package  Todo_Tests_TaskBundle_Core
 * @author   Andre Venter <aventer@iteonline.co.za>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-rest.git
 */
namespace Todo\Tests\TaskBundle\Repository;

use Silex\Application;
use Todo\TaskBundle\Repository\ItemRepository;
/**
 * Class ItemRepositoryTest
 *
 * @category Api_Rest_Implementation
 * @package  Todo\Tests\TaskBundle\Repository
 * @author   Andre Venter <aventer@iteonline.co.za>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-rest.git
 */
class ItemRepositoryTest extends \PHPUnit_Extensions_Database_TestCase
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
     * @var \Todo\TaskBundle\Repository\ItemRepository
     */
    private $_itemRepository;

    /**
     * constructor
     *
     */
    public function __construct()
    {
        $this->_db = include __DIR__ . "/../../db.php";
        $this->_itemRepository = new ItemRepository($this->_db);
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
            __DIR__ . "/../../DataSet/Item/seedItem.yml"
        );
    }

    /**
     * testConstructItemRepositoryClass
     *
     * @return void
     */
    public function testConstructItemRepositoryClass()
    {
        $this->_itemRepository = new ItemRepository($this->_db);
    }

    /**
     * testFindAll
     *
     * @return void
     */
    public function testFindAll()
    {
        $expected = $this->getConnection()->getRowCount('item');
        $actual = count($this->_itemRepository->findAll());

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
        $item = $this->_itemRepository->find($inputId);
        $actual = $item['name'];

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
        $actual = $this->_itemRepository->find($inputId);

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

        $this->_itemRepository->delete($inputId);
        $expected = null;
        $actual = $this->_itemRepository->find($inputId);

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
        $actual = $this->_itemRepository->delete($inputId);

        $this->assertEquals($expected, $actual);
    }

    /**
     * testUpdate_inputId2NameNewTask
     *
     * @return void
     */
    public function testUpdateInputId2NameNewTask()
    {
        $inputId = 2;
        $inputParams = array('name' => 'New Task');

        $this->_itemRepository->update($inputId, $inputParams);
        $itemRepository = $this->_itemRepository->find($inputId);

        $expected = 'New Task';
        $actual = $itemRepository['name'];
        $this->assertEquals($expected, $actual);
    }

    /**
     * testInsert_inputNameNewItem
     *
     * @return void
     */
    public function testInsertInputNameNewItem()
    {
        $inputParams = array('name' => 'New Item');
        $this->_itemRepository->insert($inputParams);
        $lastInsertId = $this->_db->lastInsertId();
        $itemRepository = $this->_itemRepository->find($lastInsertId);

        $expected = 'New Item';
        $actual = $itemRepository['name'];

        $this->assertEquals($expected, $actual);
    }
}
/* End of file ItemRepositoryTest.php */