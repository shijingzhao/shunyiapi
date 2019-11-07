<?php

/**
 * @Author: jingzhao
 * @Created Time : 2019/11/04 16:20
 * @File Name: Ticket/GetGine.php
 * @Description:
 */

namespace App\HttpController\Ticket;

use EasySwoole\MysqliPool\Mysql;
use App\Model\Ticket\TicketModel;

class GetFine extends \App\HttpController\Base
{
    public function index()
    {
        $db = Mysql::defer('mysql');
        // 获取精选票
        $ticketObj = new TicketModel($db);
        $list = $ticketObj->getFine();
        $this->writeJson(0, $list, 'ok');
    }

    protected function init()
    { }
}
