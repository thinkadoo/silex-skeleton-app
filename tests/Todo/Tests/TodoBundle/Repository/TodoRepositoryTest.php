<?php
/**
 * File: TodoRepositoryTest.php
 *
 * PHP Version 5.5.0
 *
 * @category Api_Rest_Implementation_Tests
 * @package  Todo_Tests_TodoBundle_Core
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-rest.git
 */
namespace Todo\Tests\TodoBundle\Repository;

use Silex\Application;
use Todo\TodoBundle\Repository\TodoRepository;
/**
 * Class TodoRepositoryTest
 *
 * @category Api_Rest_Implementation
 * @package  Todo\Tests\TodoBundle\Repository
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-rest.git
 */
class TodoRepositoryTest extends \PHPUnit_Extensions_Database_TestCase
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
     * @var \Todo\TodoBundle\Repository\TodoRepository
     */
    private $_todoRepository;

    /**
     * constructor
     *
     */
    public function __construct()
    {
        $this->_db = include __DIR__ . "/../../db.php";
        $this->_todoRepository = new TodoRepository($this->_db);
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
            __DIR__ . "/../../DataSet/Todo/seedTodo.yml"
        );
    }

    /**
     * testConstructTodoRepositoryClass
     *
     * @return void
     */
    public function testConstructTodoRepositoryClass()
    {
        $this->_todoRepository = new TodoRepository($this->_db);
    }

    /**
     * testFindAll
     *
     * @return void
     */
    public function testFindAll()
    {
        $expected = $this->getConnection()->getRowCount('todo');
        $actual = count($this->_todoRepository->findAll());

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
        $todo = $this->_todoRepository->find($inputId);
        $actual = $todo['name'];

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
        $actual = $this->_todoRepository->find($inputId);

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

        $this->_todoRepository->delete($inputId);
        $expected = null;
        $actual = $this->_todoRepository->find($inputId);

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
        $actual = $this->_todoRepository->delete($inputId);

        $this->assertEquals($expected, $actual);
    }

    /**
     * testUpdate_inputId2NameNewTodo
     *
     * @return void
     */
    public function testUpdateInputId2NameNewTodo()
    {
        $inputId = 2;
        $inputParams = array('name' => 'New Todo');

        $this->_todoRepository->update($inputId, $inputParams);
        $todoRepository = $this->_todoRepository->find($inputId);

        $expected = 'New Todo';
        $actual = $todoRepository['name'];
        $this->assertEquals($expected, $actual);
    }

    /**
     * testInsert_inputNameNewTodo
     *
     * @return void
     */
    public function testInsertInputNameNewTodo()
    {
        $inputParams = array('name' => 'New Todo');
        $this->_todoRepository->insert($inputParams);
        $lastInsertId = $this->_db->lastInsertId();
        $todoRepository = $this->_todoRepository->find($lastInsertId);

        $expected = 'New Todo';
        $actual = $todoRepository['name'];

        $this->assertEquals($expected, $actual);
    }
}
/* End of file TodoRepositoryTest.php */