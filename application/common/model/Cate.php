<?php

namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;

class Cate extends Model
{
    //软删除
    use SoftDelete;

    //栏目添加
    public function add($data) {
        $validate = new \app\common\validate\Cate();
        if (!$validate->scene('add')->check($data)) {
            return $validate->getError();
        }
        $result = $this->allowField(true)->save($data);
        if ($result) {
            return 1;
        } else {
            return '栏目添加失败!';
        }
    }
}