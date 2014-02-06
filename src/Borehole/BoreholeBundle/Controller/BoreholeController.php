<?php
/**
 * File: BoreholeController.php
 *
 * PHP Version 5.3.21
 *
 * @category Api_Rest_Implementation
 * @package  Modules_Borehole
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-rest.git
 */
namespace Borehole\BoreholeBundle\Controller;

use Silex\Application;

use Borehole\BoreholeBundle\Core\ControllerCore;
use Borehole\BoreholeBundle\Repository;

/**
 * Class BoreholeController
 *
 * @category Api_Rest_Implementation
 * @package  Borehole\BoreholeBundle\Core
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-rest.git
 */
class BoreholeController extends ControllerCore
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
/* End of file BoreholeController.php */
