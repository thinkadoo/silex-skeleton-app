<?php
/**
 * File: YamController.php
 *
 * PHP Version 5.3.21
 *
 * @category Api_Rest_Implementation
 * @package  Modules_Yam
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-rest.git
 */
namespace Yam\YamBundle\Controller;

use Silex\Application;

use Yam\YamBundle\Core\ControllerCore;
use Yam\YamBundle\Repository;

/**
 * Class YamController
 *
 * @category Api_Rest_Implementation
 * @package  Yam\YamBundle\Controller
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-rest.git
 */
class YamController extends ControllerCore
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
/* End of file YamController.php */
