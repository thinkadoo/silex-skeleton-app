<?php
/**
 * File: PartyController.php
 *
 * PHP Version 5.3.21
 *
 * @category Api_Rest_Implementation
 * @package  Modules_Party
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-app.git
 */
namespace Party\PartyBundle\Controller;

use Silex\Application;

use Party\PartyBundle\Core\ControllerCore;
use Party\PartyBundle\Repository;

/**
 * Class PartyController
 *
 * @category Api_Rest_Implementation
 * @package  Party\PartyBundle\Controller
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-app.git
 */
class PartyController extends ControllerCore
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
            $xcrud->table('party');
            return $app['twig']->render('party.twig', array(
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
/* End of file PartyController.php */
