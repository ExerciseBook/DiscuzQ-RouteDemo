<?php


namespace ExerciseBook\DiscuzQRouteDemo;

use Discuz\Web\Controller\AbstractWebController;
use Psr\Http\Message\ServerRequestInterface;
use Illuminate\View\Factory;

class TestViewController extends AbstractWebController
{
    public function render(ServerRequestInterface $request, Factory $view)
    {
        return "<title>Hello</title>My first view.";
    }
}
