<?php


namespace app\common\validate;


use think\Validate;

class Cate extends Validate
{
    protected $rule = [
        'catename|栏目名称' => 'require|unique:cate',
        'sort|排序' => 'require|number'
    ];

    //添加操作场景
    public function sceneAdd() {
        return $this->only(['catename', 'sort']);
    }
}