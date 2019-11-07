<?php

/**
 * @Author: jingzhao
 * @Created Time : 2019/11/07 11:02
 * @File Name: App/HttpController/Ticket/Detail.php
 * @Description:
 */

namespace App\HttpController\Ticket;

use EasySwoole\MysqliPool\Mysql;
use App\Model\Image\ImageModel;
use App\Model\Ticket\TicketModel;
use App\Model\Ticket\TicketDetailModel;

class Detail extends \App\HttpController\Base
{
    private $tId = 0;

    public function index()
    {
        try {
            $this->tId = $this->request()->getRequestParam('tId');
            $db = Mysql::defer('mysql');
            // 获取精选票
            $ticketObj = new TicketModel($db);
            $basis = $ticketObj->getTicketBasis($this->tId);
            $ticketDetailObj = new TicketDetailModel($db);
            $detail = $ticketDetailObj->getTicketDetail($this->tId);
            $imgModelObj = new ImageModel($db);
            $images = $imgModelObj->getTicketImages($this->tId);
            $this->result = array_merge($basis, $detail);
            $this->result['poster'] = $images;
        } catch (\Exception $e) {
            $this->code = $e->getCode();
            $this->msg = $e->getMessage();
        }

        $this->writeJson($this->code, $this->result, $this->msg);
    }

    protected function init()
    {
        $validate = new \EasySwoole\Validate\Validate();
        $validate->addColumn('tId', 'tId')->required('不能为空')->integer('illegal num');
        return $validate;
    }
}
