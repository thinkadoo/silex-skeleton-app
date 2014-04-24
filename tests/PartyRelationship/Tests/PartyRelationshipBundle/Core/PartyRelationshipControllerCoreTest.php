<?php
/**
 * File: PartyRelationshipControllerCoreTest.php
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

use Silex\WebTestCase;

/**
 * Class ControllerCoreTest
 *
 * @category Api_Rest_Implementation
 * @package  PartyRelationship\Tests\PartyRelationshipBundle\Core
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-app.git
 */
class PartyRelationshipControllerCoreTest extends WebTestCase
{
    
    /**
     * @var string
     */
    private $controllerName = 'partyrelationship';

    /**
     * createApplication
     *
     * @return mixed|\Symfony\Component\HttpKernel\HttpKernel
     */
    public function createApplication()
    {
        return include $_SERVER['APP_DIR'] . "/app_test.php";
    }

    /**
     * testGet
     *
     * @return void
     */
    public function testGet()
    {
        $client = static::createClient();
        $client->request('GET', "/$this->controllerName/");
        $response = $client->getResponse();
        $data = json_decode($response->getContent(), true);

        $expected = array('id' => '2', 'relationship_name'=>'test_relationship_name_string','relationship_data'=>'test_relationship_data_string','party_id'=>'test_party_id_string','party_role_id'=>'test_party_role_id_string');

        $actual = $data[1];
        $this->assertSame($expected, $actual);
    }

    /**
     * testGetinputId1
     *
     * @return void
     */
    public function testGetInputId1()
    {
        $inputId = "1";
        $client = static::createClient();
        $client->request('GET', "/$this->controllerName/$inputId");
        $response = $client->getResponse();
        $data = json_decode($response->getContent(), true);

        $expected = array('id' => '1', 'relationship_name'=>'test_relationship_name_string','relationship_data'=>'test_relationship_data_string','party_id'=>'test_party_id_string','party_role_id'=>'test_party_role_id_string');

        $actual = $data;
        $this->assertSame($expected, $actual);
    }

    /**
     * testPostinputNameFooBar
     *
     * @return void
     */
    public function testPostInputNameFooBar()
    {
        $input = array('relationship_name'=>'test_partyrelationship_name_Foo_Bar','relationship_data'=>'test_partyrelationship_name_Foo_Bar','party_id'=>'test_partyrelationship_name_Foo_Bar','party_role_id'=>'test_partyrelationship_name_Foo_Bar');

        $client = static::createClient();

        $client->request('GET', "/$this->controllerName/");
        $expected = count(json_decode($client->getResponse()->getContent(), true));

        $client->request('POST', "/$this->controllerName/", $input);
        $client->request('GET', "/$this->controllerName/");
        $actual = count(json_decode($client->getResponse()->getContent(), true));

        $this->assertGreaterThan($expected, $actual);
    }

    /**
     * testPutinputId2NameFooBar
     *
     * @return void
     */
    public function testPutInputId2NameFooBar()
    {
        $inputId = "2";
        $input = array('relationship_name'=>'test_partyrelationship_name_Foo_Bar','relationship_data'=>'test_partyrelationship_name_Foo_Bar','party_id'=>'test_partyrelationship_name_Foo_Bar','party_role_id'=>'test_partyrelationship_name_Foo_Bar');

        $client = static::createClient();

        $client->request('PUT', "/$this->controllerName/$inputId", $input);
        $client->request('GET', "/$this->controllerName/$inputId");

        $expected = array('id' => '2', 'relationship_name'=>'test_partyrelationship_name_Foo_Bar','relationship_data'=>'test_partyrelationship_name_Foo_Bar','party_id'=>'test_partyrelationship_name_Foo_Bar','party_role_id'=>'test_partyrelationship_name_Foo_Bar');

        $actual = json_decode($client->getResponse()->getContent(), true);

        $this->assertSame($expected, $actual);
    }

    /**
     * testDeleteinputId2
     *
     * @return void
     */
    public function testDeleteInputId2()
    {
        $inputId = '2';

        $client = static::createClient();

        $client->request('GET', "/$this->controllerName/");
        $expected = count(json_decode($client->getResponse()->getContent(), true)) - 1;

        $client->request('DELETE', "/$this->controllerName/$inputId");
        $client->request('GET', "/$this->controllerName/");
        $actual = count(json_decode($client->getResponse()->getContent(), true));

        $this->assertSame($expected, $actual);
    }
}
/* End of file PartyRelationshipControllerCoreTest.php */
