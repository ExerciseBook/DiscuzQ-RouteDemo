<?php

namespace ExerciseBook\DiscuzQRouteDemo;

use Discuz\Foundation\AbstractServiceProvider;
use Discuz\Http\Middleware\DispatchRoute;
use Discuz\Http\RouteCollection;
use Discuz\Foundation\Application;
use Illuminate\View\ViewServiceProvider;
use Laminas\Stratigility\MiddlewarePipe;

class RouteProvider extends AbstractServiceProvider
{
    /**
     * @var Application
     */
    protected Application $app;

    /**
     * RouteProvider constructor.
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * 注册服务.
     */
    public function register()
    {
        // 创建一个名为 routedemo.middleware 的实例并放到容器中
        $this->app->singleton('routedemo.middleware', function (Application $app) {

            $app->register(ViewServiceProvider::class);

            $pipe = new MiddlewarePipe();
            $pipe->pipe($app->make(TestMiddleware::class));
            return $pipe;
        });

        // 保证路由中间件最后执行
        $this->app->afterResolving('routedemo.middleware', function (MiddlewarePipe $pipe) {
            $pipe->pipe($this->app->make(DispatchRoute::class));
        });
    }

    /**
     * 启动函数
     */
    public function boot()
    {
        // 注册服务
        $this->app->register(static::class);

        // 获取路由控制器
        $route = $this->getRoute();

        // API 路由组
        $route->group('/api/route-demo', function (RouteCollection $route) {
            // 添加一个 API 路由
            $route->get('/api-demo', 'routedemo.apidemo', TestApiController::class);
        });

        // 添加一个普通页面路由
        $route->get('/view-demo', 'routedemo.viewdemo', TestViewController::class);

        // 添加一个普通页面路由
        $route->get('/middleware-demo', 'routedemo.middlewaredemo', TestViewController::class);
    }

    /**
     * @return RouteCollection
     */
    private function getRoute()
    {
        return $this->app->make(RouteCollection::class);
    }
}
