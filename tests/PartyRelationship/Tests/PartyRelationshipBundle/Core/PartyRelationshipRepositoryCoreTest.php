<?php
/**
 * File: PartyRelationshipRepositoryCoreTest.php
 *
 * PHP Version 5.3.21
 *
 * @category Api_Rest_Implementation
 * @package  Modules_PartyRelationship
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-app.git
 */
namespace PartyRelationship\Tests\PartyRelationshipBundle\Core;

use Silex\Application;
use PartyRelationship\PartyRelationshipBundle\Core\RepositoryCore;

/**
 * Class RepositoryCoreTest
 *
 * @category Api_Rest_Implementation
 * @package  PartyRelationship\Tests\PartyRelationshipBundle\Core
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-app.git
 */
class PartyRelationshipRepositoryCoreTest extends \PHPUnit_Extensions_Database_TestCase
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
     * @var \PartyRelationship\PartyRelationshipBundle\Core\RepositoryCore
     */
    private $repositoryCore;

    /**
     * constructor
     *
     */
    public function __construct()
    {
        $tableName = 'partyrelationship';

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
            __DIR__ . "/../../DataSet/PartyRelationship/seedPartyRelationship.yml"
        );
    }

    /**
     * testConstructRepositoryCoreClass
     *
     * @return void
     */
    public function testConstructRepositoryCoreClass()
    {
        $inputTableName = 'partyrelationship';
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
        $expected = $this->getConnection()->getRowCount('partyrelationship');
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

        $expected = array('id' => '1', 'relationship_name'=>'test_relationship_name_string','relationship_data'=>'test_relationship_data_string','party_id'=>'test_party_id_string','party_role_id'=>'test_party_role_id_string');
        $partyrelationship = $this->repositoryCore->find($inputId);
        $actual = $partyrelationship;

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

        $expected = array('id' => '2', 'relationship_name'=>'test_relationship_name_string','relationship_data'=>'test_relationship_data_string','party_id'=>'test_party_id_string','party_role_id'=>'test_party_role_id_string');
        $partyrelationship = $this->repositoryCore->find($inputId);
        $actual = $partyrelationship;

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
        $whatIsThere = $this->repositoryCore->find($inputId);

        if ($whatIsThere['relationship_name'] == '0') {
            $inputParams = array('relationship_name' => 1);
        } else {
            $inputParams = array('relationship_name' => 'Foo Bar');
        }

        $this->repositoryCore->update($inputId, $inputParams);
        $repositoryCore = $this->repositoryCore->find($inputId);

        if ($whatIsThere['relationship_name'] == '0') {
            $expected = '1';
        } else {
            $expected = 'Foo Bar';
        }

        $actual = $repositoryCore['relationship_name'];
        $this->assertEquals($expected, $actual);
    }

    /**
     * testInsertinputNameFooBar
     *
     * @return void
     */
    public function testInsertInputNameFooBar()
    {
        $inputId = 2;
        $whatIsThere = $this->repositoryCore->find($inputId);

        if ($whatIsThere['relationship_name'] == '0') {
            $inputParams = array('relationship_name' => 1);
        } else {
            $inputParams = array('relationship_name' => 'Foo Bar');
        }

        $this->repositoryCore->insert($inputParams);
        $lastInsertId = $this->db->lastInsertId();
        $repositoryCore = $this->repositoryCore->find($lastInsertId);

        if ($whatIsThere['relationship_name'] == '0') {
            $expected = '1';
        } else {
            $expected = 'Foo Bar';
        }

        $actual = $repositoryCore['relationship_name'];

        $this->assertEquals($expected, $actual);
    }
}
/* End of file PartyRelationshipRepositoryCoreTest.php */
