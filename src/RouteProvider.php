<?php

namespace ExerciseBook\DiscuzQRouteDemo;

use Discuz\Foundation\AbstractServiceProvider;
use Discuz\Http\RouteCollection;

class RouteProvider extends AbstractServiceProvider
{
    /**
     * 注册服务.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * @param string $string
     * @param $default
     * @return mixed
     */
    public function get_config($app, string $string, $default)
    {
        return (Arr::get(app()['discuz.config'], $string, $default));
    }

    /**
     * 启动函数
     */
    public function boot()
    {
        // 获取路由控制器
        $route = $this->getRoute();

        // 添加一个路由组
        $route->group('/api/route-demo', function (RouteCollection $route) {
            // 添加一个路由
            $route->get('/api-demo', 'routedemo.apidemo', TestApiController::class);
        });
    }

    /**
     * @return RouteCollection
     */
    private function getRoute()
    {
        return $this->app->make(RouteCollection::class);
    }
}
