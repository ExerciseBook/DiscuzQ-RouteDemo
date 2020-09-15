<?php


namespace ExerciseBook\DiscuzQRouteDemo;

use App\Models\Attachment;
use Discuz\Api\Serializer\AbstractSerializer;

class TestApiSerializer extends AbstractSerializer
{
    /**
     * 给前端看的，表示这是一个什么类型的数据
     *
     * @var string
     */
    protected $type = 'test-api';

    /**
     * 重写本方法以序列化数据给前端。
     *
     * {@inheritdoc}
     *
     * @param Attachment $model
     */
    public function getDefaultAttributes($model)
    {
        return ["value" => $model];
    }
}
