<?php
/**
 * File: PartyRelationshipRepositoryTest.php
 *
 * PHP Version 5.3.21
 *
 * @category Api_Rest_Implementation
 * @package  Modules_PartyRelationship
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-app.git
 */
namespace PartyRelationship\Tests\PartyRelationshipBundle\Repository;

use PartyRelationship\PartyRelationshipBundle\Repository\PartyRelationshipRepository;
use Silex\Application;

/**
 * Class PartyRelationshipRepositoryTest
 *
 * @category Api_Rest_Implementation
 * @package  PartyRelationship\Tests\PartyRelationshipBundle\Repository
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-app.git
 */
class PartyRelationshipRepositoryTest extends \PHPUnit_Extensions_Database_TestCase
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
     * @var \PartyRelationship\PartyRelationshipBundle\Repository\PartyRelationshipRepository
     */
    private $partyrelationshipRepository;

    /**
     * constructor
     *
     */
    public function __construct()
    {
        $this->db = include __DIR__ . "/../../db.php";
        $this->partyrelationshipRepository = new PartyRelationshipRepository($this->db);
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
            __DIR__ . "/../../DataSet/PartyRelationship/seedPartyRelationship.yml"
        );
    }

    /**
     * testConstructPartyRelationshipRepositoryClass
     *
     * @return void
     */
    public function testConstructPartyRelationshipRepositoryClass()
    {
        $this->partyrelationshipRepository = new PartyRelationshipRepository($this->db);
    }

    /**
     * testFindAll
     *
     * @return void
     */
    public function testFindAll()
    {
        $expected = $this->getConnection()->getRowCount('partyrelationship');
        $actual = count($this->partyrelationshipRepository->findAll());

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
        $whatIsThere = $this->partyrelationshipRepository->find($inputId);

        if ($whatIsThere['relationship_name'] == '0') {
            $expected = '0';
        } else {
            $expected = 'test_'.'relationship_name'.'_string';
        }

        $PartyRelationship = $this->partyrelationshipRepository->find($inputId);
        $actual = $PartyRelationship['relationship_name'];

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
        $actual = $this->partyrelationshipRepository->find($inputId);

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

        $this->partyrelationshipRepository->delete($inputId);
        $expected = null;
        $actual = $this->partyrelationshipRepository->find($inputId);

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
        $actual = $this->partyrelationshipRepository->delete($inputId);

        $this->assertEquals($expected, $actual);
    }

    /**
     * testUpdateinputId2NameNewPartyRelationship
     *
     * @return void
     */
    public function testUpdateInputId2NameNewUser()
    {
        $inputId = 2;
        $whatIsThere = $this->partyrelationshipRepository->find($inputId);

        if ($whatIsThere['relationship_name'] == '0') {
            $inputParams = array('relationship_name' => 1);
        } else {
            $inputParams = array('relationship_name' => 'New PartyRelationship');
        }

        $this->partyrelationshipRepository->update($inputId, $inputParams);
        $PartyRelationshipRepository = $this->partyrelationshipRepository->find($inputId);

        if ($whatIsThere['relationship_name'] == '0') {
            $expected = '1';
        } else {
            $expected = 'New PartyRelationship';
        }

        $actual = $PartyRelationshipRepository['relationship_name'];
        $this->assertEquals($expected, $actual);
    }

    /**
     * testInsertinputNameNewPartyRelationship
     *
     * @return void
     */
    public function testInsertInputNameNewPartyRelationship()
    {
        $inputId = 2;
        $whatIsThere = $this->partyrelationshipRepository->find($inputId);

        if ($whatIsThere['relationship_name'] == '0') {
            $inputParams = array('relationship_name' => 1);
        } else {
            $inputParams = array('relationship_name' => 'New PartyRelationship');
        }

        $this->partyrelationshipRepository->insert($inputParams);
        $lastInsertId = $this->db->lastInsertId();
        $PartyRelationshipRepository = $this->partyrelationshipRepository->find($lastInsertId);

        if ($whatIsThere['relationship_name'] == '0') {
            $expected = '1';
        } else {
            $expected = 'New PartyRelationship';
        }

        $actual = $PartyRelationshipRepository['relationship_name'];

        $this->assertEquals($expected, $actual);
    }
}
/* End of file PartyRelationshipRepositoryTest.php */
