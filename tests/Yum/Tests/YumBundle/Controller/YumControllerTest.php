<?php
/**
 * File: YumControllerTest.php
 *
 * PHP Version 5.3.21
 *
 * @category Api_Rest_Implementation_Tests
 * @package  Modules_Yum
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-rest.git
 */
namespace Yum\Tests\YumBundle\Controller;

use Silex\WebTestCase;

/**
 * Class YumController
 *
 * @category Api_Rest_Implementation_Tests
 * @package  Yum\YumBundle\Controller
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-rest.git
 */
class YumControllerTest extends WebTestCase
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
        $this->assertEquals(1,1);
    }
}
/* End of file YumControllerTest.php */
