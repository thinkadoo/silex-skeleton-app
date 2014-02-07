<?php
/**
 * File: ControllerCoreTest.php
 *
 * PHP Version 5.3.21
 *
 * @category Api_Rest_Implementation_Tests
 * @package  Modules_Yam
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-rest.git
 */
namespace Yam\Tests\YamBundle\Core;

use Silex\WebTestCase;

/**
 * Class ControllerCoreTest
 *
 * @category Api_Rest_Implementation_Tests
 * @package  Yam\YamBundle\Core
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-rest.git
 */
class ControllerCoreTest extends WebTestCase
{
    
    /**
     * @var string
     */
    private $controllerName = 'yam';

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

        $expected = array(
            'id' => '2',
            'name' => 'test_yam_name_2',
            'surname' => 'test_yam_surname_2',
            'email' => 'test_yam_name_2@email.com',
            'employee_nr' => 'test_yam_employee_nr_2',
            'role' => '0',
            'password' => 'test_yam_password_2',
            'salt' => 'test_yam_salt_2',
            'locked' => '0',
            'deleted' => '0',
            'created_by' => 'test_yam_created_by',
            'created_at' => '2013-01-01 00:00:00',
            'updated_by' => 'test_yam_updated_by',
            'updated_at' => '2013-01-01 00:00:00'
        );

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

        $expected = array(
            'id' => '1',
            'name' => 'test_yam_name',
            'surname' => 'test_yam_surname',
            'email' => 'test_yam_name@email.com',
            'employee_nr' => 'test_yam_employee_nr',
            'role' => '0',
            'password' => 'test_yam_password',
            'salt' => 'test_yam_salt',
            'locked' => '0',
            'deleted' => '0',
            'created_by' => 'test_yam_created_by',
            'created_at' => '2013-01-01 00:00:00',
            'updated_by' => 'test_yam_updated_by',
            'updated_at' => '2013-01-01 00:00:00'
            );

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
        $inputName = 'test_yam_name_Foo_Bar';

        $client = static::createClient();

        $client->request('GET', "/$this->controllerName/");
        $expected = count(json_decode($client->getResponse()->getContent(), true)) + 1;

        $client->request('POST', "/$this->controllerName/", array('name' => $inputName));
        $client->request('GET', "/$this->controllerName/");
        $actual = count(json_decode($client->getResponse()->getContent(), true));

        $this->assertSame($expected, $actual);
    }

    /**
     * testPutinputId2NameFooBar
     *
     * @return void
     */
    public function testPutInputId2NameFooBar()
    {
        $inputId = "2";
        $inputName = 'test_yam_name_Foo_Bar';

        $client = static::createClient();

        $client->request('PUT', "/$this->controllerName/$inputId", array('name' => $inputName));
        $client->request('GET', "/$this->controllerName/$inputId");

        $expected = array(
            'id' => '2',
            'name' => 'test_yam_name_Foo_Bar',
            'surname' => 'test_yam_surname_2',
            'email' => 'test_yam_name_2@email.com',
            'employee_nr' => 'test_yam_employee_nr_2',
            'role' => '0',
            'password' => 'test_yam_password_2',
            'salt' => 'test_yam_salt_2',
            'locked' => '0',
            'deleted' => '0',
            'created_by' => 'test_yam_created_by',
            'created_at' => '2013-01-01 00:00:00',
            'updated_by' => 'test_yam_updated_by',
            'updated_at' => '2013-01-01 00:00:00'
            );

        $actual = json_decode($client->getResponse()->getContent(), true);

        $this->assertSame($expected, $actual);
    }

    /**
     * testDeleteinputId5
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
/* End of file ControllerCoreTest.php */