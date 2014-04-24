<?php
/**
 * File: PartyRoleController.php
 *
 * PHP Version 5.3.21
 *
 * @category Api_Rest_Implementation
 * @package  Modules_PartyRole
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-app.git
 */
namespace PartyRole\PartyRoleBundle\Controller;

use Silex\Application;

use PartyRole\PartyRoleBundle\Core\ControllerCore;
use PartyRole\PartyRoleBundle\Repository;

/**
 * Class PartyRoleController
 *
 * @category Api_Rest_Implementation
 * @package  PartyRole\PartyRoleBundle\Controller
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-app.git
 */
class PartyRoleController extends ControllerCore
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
        // @codingStandardsIgnoreStart
        // @codeCoverageIgnoreStart

        $controller = $this->controller;

        /**
         * crud
         */
        $controller->get("/crud", function() use ($app)
        {
            $xcrud = $app['xcrud'];
            $xcrud->table('partyrole');
            return $app['twig']->render('partyrole.twig', array(
                'xcrud' => $xcrud,
                'className' => $this->repository
            ));
        });

        parent::connect($app);
        return $controller;

        // @codeCoverageIgnoreEnd
        // @codingStandardsIgnoreEnd
    }
}
/* End of file PartyRoleController.php */
