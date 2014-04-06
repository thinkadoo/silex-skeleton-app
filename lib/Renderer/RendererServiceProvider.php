<?php

namespace Renderer;

require_once __DIR__.'../../../xcrud/xcrud.php';
use Xcrud;

use Silex\Application;
use Silex\ServiceProviderInterface;

class RendererServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $options = $app['db.options'];
        $app['xcrud'] = Xcrud::get_instance($options['dbname']);
        $app['xcrud']->connection($options['user'], $options['password'], $options['dbname'], $options['host'].':'.$options['port']);
        return $app['xcrud'];
    }

    public function boot(Application $app)
    {

    }
}
