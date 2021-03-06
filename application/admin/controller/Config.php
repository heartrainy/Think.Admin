<?php

namespace app\admin\controller;

use controller\BasicAdmin;
use library\Data;

/**
 * 后台参数配置控制器
 * Class Config
 * @package app\admin\controller
 * @author Anyon <zoujingli@qq.com>
 * @date 2017/02/15 18:05
 */
class Config extends BasicAdmin {

    protected $table = 'SystemConfig';
    protected $title = '网站参数配置';

    public function index() {
        if (!$this->request->isPost()) {
            parent::_list($this->table);
        } else {
            $data = $this->request->post();
            foreach ($data as $key => $vo) {
                $_data = ['name' => $key, 'value' => $vo];
                Data::save($this->table, $_data, 'name');
            }
            $this->success('数据修改成功！', '');
        }
    }

    public function file() {
        $this->title = '文件存储配置';
        $this->index();
    }

    public function mail() {
        $this->title = '邮箱账号配置';
        $this->index();
    }

    public function sms() {
        $this->title = '短信账号配置';
        $this->index();
    }

}
