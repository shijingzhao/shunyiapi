<?php

/**
 * @Author: jingzhao
 * @Created Time : 2019/11/05 14:19
 * @File Name: App/HttpController/Ticket/FilterList.php
 * @Description:
 */

namespace App\HttpController\Ticket;

use EasySwoole\MysqliPool\Mysql;
use App\Model\Ticket\TicketModel;

class FilterList extends \App\HttpController\Base
{
    private $page = 1;
    private $tType = 0;
    private $period = 0;

    public function index()
    {
        $this->page = $this->request()->getRequestParam('page');
        if ($this->request()->getRequestParam('tType')) {
            $this->tType = $this->request()->getRequestParam('tType');
        }
        if ($this->request()->getRequestParam('period')) {
            $this->period = $this->request()->getRequestParam('period');
        }

        $db = Mysql::defer('mysql');
        // 获取精选票
        $ticketObj = new TicketModel($db);
        $list = $ticketObj->getFilterTicket($this->page, $this->tType, $this->period);
        $this->writeJson(0, $list, 'ok');
    }

    protected function init()
    {
        $validate = new \EasySwoole\Validate\Validate();
        $validate->addColumn('page', 'page')->required('不能为空')->integer('illegal num');
        if ($this->request()->getRequestParam('tType')) {
            $validate->addColumn('tType', 'tType')->inArray([1, 2, 3, 4], false, 'illegal type');
        }
        if ($this->request()->getRequestParam('period')) {
            $validate->addColumn('period', 'period')->inArray([1, 2, 3, 4], false, 'illegal period');
        }
        return $validate;
    }
}
