<?php


namespace ExerciseBook\DiscuzQRouteDemo;


use Discuz\Api\Controller\AbstractResourceController;
use Psr\Http\Message\ServerRequestInterface;
use Tobscure\JsonApi\Document;
use Tobscure\JsonApi\SerializerInterface;

/**
 * 这里是控制器类
 *
 * 本类一般为从 命名空间 Discuz\Api\Controller 中某个虚类派生 的类
 *
 * Class TestApiController
 * @package ExerciseBook\DiscuzQRouteDemo
 */
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
     * 具体见文档：https://discuz.com/docs/api.html
     *
     * 返回的内容将传递到 Serializer 类的 getDefaultAttributes 函数中第一个参数
     *
     * 返回值类型表
     * AbstractCreateController     Object
     * AbstractDeleteController     返回空
     * AbstractListController       Array of Object
     * AbstractResourceController   Object
     *
     * AbstractSerializeController  根据自己继承的 createElement 函数定义。
     *
     * {@inheritdoc}
     * @param ServerRequestInterface $request
     * @param Document $document
     * @return object
     */
    protected function data(ServerRequestInterface $request, Document $document)
    {
        return (object)[
            "id" => Collect([114514, 1919810])->random(),
            "msg" => Collect([
                "Bass Bass Kick Kick Bass Kick Kick Bass Bass Kick Kick Bass Kick Kick",
                "O-oooooooooo AAAAE-A-A-I-A-U-JO-oooooooooooo AAE-O-A-A-U-U-A-E-eee-ee-eee AAAAE-A-E-I-E-A-"
            ])->random()
        ];
    }

}
