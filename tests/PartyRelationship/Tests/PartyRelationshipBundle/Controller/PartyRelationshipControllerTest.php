<?php
/**
 * File: PartyRelationshipControllerTest.php
 *
 * PHP Version 5.3.21
 *
 * @category Api_Rest_Implementation
 * @package  Modules_PartyRelationship
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-app.git
 */
namespace PartyRelationship\Tests\PartyRelationshipBundle\Controller;

use Silex\WebTestCase;

/**
 * Class PartyRelationshipController
 *
 * @category Api_Rest_Implementation
 * @package  PartyRelationship\Tests\PartyRelationshipBundle\Controller
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-app.git
 */
class PartyRelationshipControllerTest extends WebTestCase
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
/* End of file PartyRelationshipControllerTest.php */
