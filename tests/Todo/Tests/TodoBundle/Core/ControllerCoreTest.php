<?php
/**
 * File: RepositoryCoreTest.php
 *
 * PHP Version 5.5.0
 *
 * @category Api_Rest_Implementation_Tests
 * @package  Todo_Tests_TodoBundle_Core
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-rest.git
 */
namespace Todo\Tests\TodoBundle\Core;

use Silex\WebTestCase;
/**
 * Class RepositoryCoreTest
 *
 * @category Api_Rest_Implementation
 * @package  Todo\Tests\TodoBundle\Core
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-rest.git
 */
class ControllerCoreTest extends WebTestCase
{
    /**
     * @var string
     */
    private $_controllerName = 'todo';

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
        $client->request('GET', "/$this->_controllerName/");
        $response = $client->getResponse();
        $data = json_decode($response->getContent(), true);

        $expected = array('id' => '2', 'name' => 'Utilize the skeleton so I can use it for my project.', 'created' => '2013-01-06 19:00:00');
        $actual = $data[1];
        $this->assertSame($expected, $actual);
    }

    /**
     * testGet_inputId1
     *
     * @return void
     */
    public function testGetInputId1()
    {
        $inputId = "1";
        $client = static::createClient();
        $client->request('GET', "/$this->_controllerName/$inputId");
        $response = $client->getResponse();
        $data = json_decode($response->getContent(), true);

        $expected = array('id' => '1', 'name' => 'Download silex-skeleton-rest.', 'created' => '2013-01-01 00:00:00');
        $actual = $data;
        $this->assertSame($expected, $actual);
    }

    /**
     * testPost_inputNameFooBar
     *
     * @return void
     */
    public function testPostInputNameFooBar()
    {
        $inputName = 'Foo Bar';

        $client = static::createClient();

        $client->request('GET', "/$this->_controllerName/");
        $expected = count(json_decode($client->getResponse()->getContent(), true)) + 1;

        $client->request('POST', "/$this->_controllerName/", array('name' => $inputName));
        $client->request('GET', "/$this->_controllerName/");
        $actual = count(json_decode($client->getResponse()->getContent(), true));

        $this->assertSame($expected, $actual);
    }

    /**
     * testPut_inputId2NameFooBar
     *
     * @return void
     */
    public function testPutInputId2NameFooBar()
    {
        $inputId = "2";
        $inputName = 'Foo Bar';

        $client = static::createClient();

        $client->request('PUT', "/$this->_controllerName/$inputId", array('name' => $inputName));
        $client->request('GET', "/$this->_controllerName/$inputId");

        $expected = array('id' => $inputId, 'name' => $inputName, 'created' => '2013-01-06 19:00:00');
        $actual = json_decode($client->getResponse()->getContent(), true);

        $this->assertSame($expected, $actual);
    }

    /**
     * testDelete_inputId5
     *
     * @return void
     */
    public function testDeleteInputId2()
    {
        $inputId = '2';

        $client = static::createClient();

        $client->request('GET', "/$this->_controllerName/");
        $expected = count(json_decode($client->getResponse()->getContent(), true)) - 1;

        $client->request('DELETE', "/$this->_controllerName/$inputId");
        $client->request('GET', "/$this->_controllerName/");
        $actual = count(json_decode($client->getResponse()->getContent(), true));

        $this->assertSame($expected, $actual);
    }
}
/* End of file ControllerCoreTest.php */