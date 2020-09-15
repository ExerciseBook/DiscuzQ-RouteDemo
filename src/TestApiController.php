<?php


namespace ExerciseBook\DiscuzQRouteDemo;


use Discuz\Api\Controller\AbstractResourceController;
use Psr\Http\Message\ServerRequestInterface;
use Tobscure\JsonApi\Document;

class TestApiController extends AbstractResourceController
{

    /**
     * 表示本类中的 data 函数返回的数据由哪个序列化类进行序列化
     *
     * @var string
     */
    public $serializer = TestApiSerializer::class;

    /**
     * 重写本方法以处理用户请求
     * 返回的内容将传递到 Serializer 类的 getDefaultAttributes 函数中第一个参数
     *
     * {@inheritdoc}
     */
    protected function data(ServerRequestInterface $request, Document $document)
    {
        return Collect([114514, 1919810])->random();
    }
}
