<?php
/**
 * File: YooController.php
 *
 * PHP Version 5.3.21
 *
 * @category Api_Rest_Implementation
 * @package  Modules_Yoo
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-rest.git
 */
namespace Yoo\YooBundle\Controller;

use Silex\Application;

use Yoo\YooBundle\Core\ControllerCore;
use Yoo\YooBundle\Repository;

/**
 * Class YooController
 *
 * @category Api_Rest_Implementation
 * @package  Yoo\YooBundle\Controller
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-rest.git
 */
class YooController extends ControllerCore
{
    
    /**
     * connect
     *
     * @param Application $app framework injected
     *
     * @return Object|\Silex\ControllerCollection
     */
    public function connect(Application $app)
    {
        $controller = $this->controller;

        // In here, you can write additional controller
        // or overwrite existing controller in ControllerCore

        parent::connect($app);
        return $controller;
    }
}
/* End of file YooController.php */
