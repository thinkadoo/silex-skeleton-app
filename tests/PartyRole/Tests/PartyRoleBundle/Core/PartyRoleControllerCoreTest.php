<?php
/**
 * File: PartyRoleControllerCoreTest.php
 *
 * PHP Version 5.3.21
 *
 * @category Api_Rest_Implementation
 * @package  Modules_PartyRole
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-app.git
 */
namespace PartyRole\Tests\PartyRoleBundle\Core;

use Silex\WebTestCase;

/**
 * Class ControllerCoreTest
 *
 * @category Api_Rest_Implementation
 * @package  PartyRole\Tests\PartyRoleBundle\Core
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-app.git
 */
class PartyRoleControllerCoreTest extends WebTestCase
{
    
    /**
     * @var string
     */
    private $controllerName = 'partyrole';

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

        $expected = array('id' => '2', 'role_name'=>'test_role_name_string','role_data'=>'test_role_data_string');

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

        $expected = array('id' => '1', 'role_name'=>'test_role_name_string','role_data'=>'test_role_data_string');

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
        $input = array('role_name'=>'test_partyrole_name_Foo_Bar','role_data'=>'test_partyrole_name_Foo_Bar');

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
        $input = array('role_name'=>'test_partyrole_name_Foo_Bar','role_data'=>'test_partyrole_name_Foo_Bar');

        $client = static::createClient();

        $client->request('PUT', "/$this->controllerName/$inputId", $input);
        $client->request('GET', "/$this->controllerName/$inputId");

        $expected = array('id' => '2', 'role_name'=>'test_partyrole_name_Foo_Bar','role_data'=>'test_partyrole_name_Foo_Bar');

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
/* End of file PartyRoleControllerCoreTest.php */
