<?php
/**
 * File: PartyRoleRepositoryTest.php
 *
 * PHP Version 5.3.21
 *
 * @category Api_Rest_Implementation
 * @package  Modules_PartyRole
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-app.git
 */
namespace PartyRole\Tests\PartyRoleBundle\Repository;

use PartyRole\PartyRoleBundle\Repository\PartyRoleRepository;
use Silex\Application;

/**
 * Class PartyRoleRepositoryTest
 *
 * @category Api_Rest_Implementation
 * @package  PartyRole\Tests\PartyRoleBundle\Repository
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-app.git
 */
class PartyRoleRepositoryTest extends \PHPUnit_Extensions_Database_TestCase
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
     * @var \PartyRole\PartyRoleBundle\Repository\PartyRoleRepository
     */
    private $partyroleRepository;

    /**
     * constructor
     *
     */
    public function __construct()
    {
        $this->db = include __DIR__ . "/../../db.php";
        $this->partyroleRepository = new PartyRoleRepository($this->db);
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
            __DIR__ . "/../../DataSet/PartyRole/seedPartyRole.yml"
        );
    }

    /**
     * testConstructPartyRoleRepositoryClass
     *
     * @return void
     */
    public function testConstructPartyRoleRepositoryClass()
    {
        $this->partyroleRepository = new PartyRoleRepository($this->db);
    }

    /**
     * testFindAll
     *
     * @return void
     */
    public function testFindAll()
    {
        $expected = $this->getConnection()->getRowCount('partyrole');
        $actual = count($this->partyroleRepository->findAll());

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
        $whatIsThere = $this->partyroleRepository->find($inputId);

        if ($whatIsThere['role_name'] == '0') {
            $expected = '0';
        } else {
            $expected = 'test_'.'role_name'.'_string';
        }

        $PartyRole = $this->partyroleRepository->find($inputId);
        $actual = $PartyRole['role_name'];

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
        $actual = $this->partyroleRepository->find($inputId);

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

        $this->partyroleRepository->delete($inputId);
        $expected = null;
        $actual = $this->partyroleRepository->find($inputId);

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
        $actual = $this->partyroleRepository->delete($inputId);

        $this->assertEquals($expected, $actual);
    }

    /**
     * testUpdateinputId2NameNewPartyRole
     *
     * @return void
     */
    public function testUpdateInputId2NameNewUser()
    {
        $inputId = 2;
        $whatIsThere = $this->partyroleRepository->find($inputId);

        if ($whatIsThere['role_name'] == '0') {
            $inputParams = array('role_name' => 1);
        } else {
            $inputParams = array('role_name' => 'New PartyRole');
        }

        $this->partyroleRepository->update($inputId, $inputParams);
        $PartyRoleRepository = $this->partyroleRepository->find($inputId);

        if ($whatIsThere['role_name'] == '0') {
            $expected = '1';
        } else {
            $expected = 'New PartyRole';
        }

        $actual = $PartyRoleRepository['role_name'];
        $this->assertEquals($expected, $actual);
    }

    /**
     * testInsertinputNameNewPartyRole
     *
     * @return void
     */
    public function testInsertInputNameNewPartyRole()
    {
        $inputId = 2;
        $whatIsThere = $this->partyroleRepository->find($inputId);

        if ($whatIsThere['role_name'] == '0') {
            $inputParams = array('role_name' => 1);
        } else {
            $inputParams = array('role_name' => 'New PartyRole');
        }

        $this->partyroleRepository->insert($inputParams);
        $lastInsertId = $this->db->lastInsertId();
        $PartyRoleRepository = $this->partyroleRepository->find($lastInsertId);

        if ($whatIsThere['role_name'] == '0') {
            $expected = '1';
        } else {
            $expected = 'New PartyRole';
        }

        $actual = $PartyRoleRepository['role_name'];

        $this->assertEquals($expected, $actual);
    }
}
/* End of file PartyRoleRepositoryTest.php */
