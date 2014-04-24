<?php
/**
 * File: PartyRelationshipController.php
 *
 * PHP Version 5.3.21
 *
 * @category Api_Rest_Implementation
 * @package  Modules_PartyRelationship
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-app.git
 */
namespace PartyRelationship\PartyRelationshipBundle\Controller;

use Silex\Application;

use PartyRelationship\PartyRelationshipBundle\Core\ControllerCore;
use PartyRelationship\PartyRelationshipBundle\Repository;

/**
 * Class PartyRelationshipController
 *
 * @category Api_Rest_Implementation
 * @package  PartyRelationship\PartyRelationshipBundle\Controller
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-app.git
 */
class PartyRelationshipController extends ControllerCore
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
            $xcrud->table('partyrelationship');
            $xcrud->relation('party_id','party','id','party_name');
            $xcrud->relation('party_role_id','partyrole','id','role_name');
            return $app['twig']->render('partyrelationship.twig', array(
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
/* End of file PartyRelationshipController.php */
