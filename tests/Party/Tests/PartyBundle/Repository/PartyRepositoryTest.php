<?php
/**
 * File: PartyRepositoryTest.php
 *
 * PHP Version 5.3.21
 *
 * @category Api_Rest_Implementation
 * @package  Modules_Party
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-app.git
 */
namespace Party\Tests\PartyBundle\Repository;

use Party\PartyBundle\Repository\PartyRepository;
use Silex\Application;

/**
 * Class PartyRepositoryTest
 *
 * @category Api_Rest_Implementation
 * @package  Party\Tests\PartyBundle\Repository
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-app.git
 */
class PartyRepositoryTest extends \PHPUnit_Extensions_Database_TestCase
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
     * @var \Party\PartyBundle\Repository\PartyRepository
     */
    private $partyRepository;

    /**
     * constructor
     *
     */
    public function __construct()
    {
        $this->db = include __DIR__ . "/../../db.php";
        $this->partyRepository = new PartyRepository($this->db);
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
            __DIR__ . "/../../DataSet/Party/seedParty.yml"
        );
    }

    /**
     * testConstructPartyRepositoryClass
     *
     * @return void
     */
    public function testConstructPartyRepositoryClass()
    {
        $this->partyRepository = new PartyRepository($this->db);
    }

    /**
     * testFindAll
     *
     * @return void
     */
    public function testFindAll()
    {
        $expected = $this->getConnection()->getRowCount('party');
        $actual = count($this->partyRepository->findAll());

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
        $whatIsThere = $this->partyRepository->find($inputId);

        if ($whatIsThere['party_name'] == '0') {
            $expected = '0';
        } else {
            $expected = 'test_'.'party_name'.'_string';
        }

        $Party = $this->partyRepository->find($inputId);
        $actual = $Party['party_name'];

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
        $actual = $this->partyRepository->find($inputId);

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

        $this->partyRepository->delete($inputId);
        $expected = null;
        $actual = $this->partyRepository->find($inputId);

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
        $actual = $this->partyRepository->delete($inputId);

        $this->assertEquals($expected, $actual);
    }

    /**
     * testUpdateinputId2NameNewParty
     *
     * @return void
     */
    public function testUpdateInputId2NameNewUser()
    {
        $inputId = 2;
        $whatIsThere = $this->partyRepository->find($inputId);

        if ($whatIsThere['party_name'] == '0') {
            $inputParams = array('party_name' => 1);
        } else {
            $inputParams = array('party_name' => 'New Party');
        }

        $this->partyRepository->update($inputId, $inputParams);
        $PartyRepository = $this->partyRepository->find($inputId);

        if ($whatIsThere['party_name'] == '0') {
            $expected = '1';
        } else {
            $expected = 'New Party';
        }

        $actual = $PartyRepository['party_name'];
        $this->assertEquals($expected, $actual);
    }

    /**
     * testInsertinputNameNewParty
     *
     * @return void
     */
    public function testInsertInputNameNewParty()
    {
        $inputId = 2;
        $whatIsThere = $this->partyRepository->find($inputId);

        if ($whatIsThere['party_name'] == '0') {
            $inputParams = array('party_name' => 1);
        } else {
            $inputParams = array('party_name' => 'New Party');
        }

        $this->partyRepository->insert($inputParams);
        $lastInsertId = $this->db->lastInsertId();
        $PartyRepository = $this->partyRepository->find($lastInsertId);

        if ($whatIsThere['party_name'] == '0') {
            $expected = '1';
        } else {
            $expected = 'New Party';
        }

        $actual = $PartyRepository['party_name'];

        $this->assertEquals($expected, $actual);
    }
}
/* End of file PartyRepositoryTest.php */
