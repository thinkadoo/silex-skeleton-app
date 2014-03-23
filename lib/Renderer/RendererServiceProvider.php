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
        $app['xcrud'] = Xcrud::get_instance('user');
        $app['xcrud']->table('user');
        return $app['xcrud'];
    }

    public function boot(Application $app)
    {
    }
}
