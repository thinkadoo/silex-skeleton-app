<?php
/**
 * File: ControllerCore.php
 *
 * PHP Version 5.3.21
 *
 * @category Api_Rest_Implementation
 * @package  Modules_Yam
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-rest.git
 */
namespace Yam\YamBundle\Core;

use Silex\Application;
use Silex\Route;
use Silex\ControllerCollection;
use Silex\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ControllerCore
 *
 * @category Api_Rest_Implementation
 * @package  Yam\YamBundle\Core
 * @author   Andre Venter <andre.n.venter@gmail.com>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-rest.git
 */
class ControllerCore implements ControllerProviderInterface
{
    /**
     * @var object $repository
     */
    protected $repository;
    /**
     * @var object $controller
     */
    protected $controller;

    /**
     * setRepository
     *
     * @param object $repository dependency inject the repository used
     *
     * @return void
     */
    public function setRepository($repository)
    {
        $this->repository = $repository;
    }

    /**
     * setController
     *
     * @param object $controller dependency inject the controller used
     *
     * @return void
     */
    public function setController($controller)
    {
        $this->controller = $controller;
    }

    /**
     * constructor
     *
     * @return void
     */
    public function __construct()
    {
        $calledClass = explode('\\', get_called_class());
        $class = end($calledClass);

        $this->setRepository(substr($class, 0, -10));
        $this->setController(new ControllerCollection(new Route()));
    }

    /**
     * connect
     *
     * @param Application $app framework injected
     *
     * @return ControllerCollection
     */
    public function connect(Application $app)
    {
        // @codingStandardsIgnoreStart

        $controller = $this->controller;

        $targetRepository = "User\\UserBundle\\Repository\\" . $this->repository . "Repository";

        /**
         * get
         */
        $controller->get("/", function() use ($app, $targetRepository) {
            $repository = new $targetRepository($app['db']);
            $results = $repository->findAll();

            return $app->json($results);
        });

        /**
         * get/id
         */
        $controller->get("/{id}", function($id) use ($app, $targetRepository) {
            $repository = new $targetRepository($app['db']);
            $result = $repository->find($id);

            return $app->json($result);
        })
        ->assert('id', '\d+');

        /**
         * post
         */
        $controller->post("/", function(Request $request) use ($app, $targetRepository) {
        $repository = new $targetRepository($app['db']);
        $params = $request->request->all();

        return $app->json($repository->insert($params));
        });

        /**
         * put/id
         */
        $controller->put("/{id}", function(Request $request, $id) use ($app, $targetRepository) {
            $repository = new $targetRepository($app['db']);
            $params = $request->request->all();

            return $app->json($repository->update($id, $params));
        })
        ->assert('id', '\d+');

        /**
         * delete/id
         */
        $controller->delete("/{id}", function($id) use ($app, $targetRepository) {
            $repository = new $targetRepository($app['db']);

            return $app->json($repository->delete($id));
        })
        ->assert('id', '\d+');

        return $controller;

        // @codingStandardsIgnoreEnd
    }
}
/* End of file ControllerCore.php */
