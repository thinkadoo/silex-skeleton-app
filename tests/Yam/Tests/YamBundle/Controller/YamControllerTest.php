<?php
/**
 * File: YamControllerTest.php
 *
 * PHP Version 5.3.21
 *
 * @category Api_Rest_Implementation_Tests
 * @package  Modules_Yam
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-rest.git
 */
namespace Yam\Tests\YamBundle\Controller;

use Silex\WebTestCase;

/**
 * Class YamController
 *
 * @category Api_Rest_Implementation_Tests
 * @package  Yam\Tests\YamBundle\Controller
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-rest.git
 */
class YamControllerTest extends WebTestCase
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
        $this->assertEquals(1, 1);
    }
}
/* End of file YamControllerTest.php */
