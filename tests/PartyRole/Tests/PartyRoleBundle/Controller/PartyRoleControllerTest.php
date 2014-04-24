<?php
/**
 * File: PartyRoleControllerTest.php
 *
 * PHP Version 5.3.21
 *
 * @category Api_Rest_Implementation
 * @package  Modules_PartyRole
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-app.git
 */
namespace PartyRole\Tests\PartyRoleBundle\Controller;

use Silex\WebTestCase;

/**
 * Class PartyRoleController
 *
 * @category Api_Rest_Implementation
 * @package  PartyRole\Tests\PartyRoleBundle\Controller
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-app.git
 */
class PartyRoleControllerTest extends WebTestCase
{
    
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
     * testInitialPage
     *
     * @return void
     */
    public function testInitialPage()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/');

        $this->assertTrue($client->getResponse()->isOk());
        $this->assertCount(1, $crawler->filter('title:contains("silex-skeleton-app")'));
    }
}
/* End of file PartyRoleControllerTest.php */
