<?php
/**
 * File: user_password.php
 *
 * PHP Version 5.5.0
 *
 * @category Api_Rest_Implementation
 * @package  Modules_Todo
 * @author   Andre Venter <aventer@iteonline.co.za>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-rest.git
 */
namespace Todo\TaskBundle\Core;

use Silex\Application;
use Silex\Route;
use Silex\ControllerCollection;
use Silex\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ControllerCore
 *
 * @category Api_Rest_Implementation
 * @package  Todo\TaskBundle\Core
 * @author   Andre Venter <aventer@iteonline.co.za>
 * @license  Thinkadoo http://think-a-doo.net
 * @link     https://github.com/thinkadoo/silex-skeleton-rest.git
 */
class ControllerCore implements ControllerProviderInterface
{
    /**
     * @var Object $repository
     */
    protected $repository;
    /**
     * @var Object $controller
     */
    protected $controller;

    /**
     * setRepository
     *
     * @param Object $repository dependency inject the repository used
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
     * @param Object $controller dependency inject the controller used
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

        $targetRepository = "Todo\\TaskBundle\\Repository\\" . $this->repository . "Repository";
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
