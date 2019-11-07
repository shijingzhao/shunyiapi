<?php

/**
 * @Author: jingzhao
 * @Created Time : 2019/11/04 16:05
 * @File Name: TicketModel.php
 * @Description:
 */

namespace App\Model\Ticket;

class TicketModel extends \App\Model\BaseModel
{
    protected $table = 'ticket';
    protected $primaryKey = 'tId';

    /**
     * @getAll
     * @keyword UserName
     * @param  int  page  1
     * @param  string  keyword
     * @param  int  pageSize  10
     * @return array[total,list]
     */
    public function getAll(int $page = 1, string $keyword = null, int $pageSize = 10): array
    {
        if (!empty($keyword)) {
            $this->getDbConnection()->where('UserAccount', '%' . $keyword . '%', 'like');
        }

        $list = $this->getDbConnection()
            ->withTotalCount()
            ->orderBy($this->primaryKey, 'DESC')
            ->get($this->table, [$pageSize * ($page - 1), $pageSize]);
        $total = $this->getDbConnection()->getTotalCount();
        return ['total' => $total, 'list' => $list];
    }

    /**
     * @getFine
     * @return
     */
    public function getFine(): array
    {
        $fields = ['tId', 'title', 'cover', 'isFine'];
        $list = $this->getDbConnection()
            ->where('isFine', 0, '>')
            ->orderBy('isFine', 'ASC')
            ->get($this->table, 10, $fields);
        return $list ?: [];
    }

    /**
     * @筛选
     * @param  int  page  1
     * @param  int  pageSize  10
     * @return array[total,list]
     */
    public function getFilterTicket(int $page = 1, int $tType = 0, int $period = 0, int $pageSize = 10): array
    {
        if ($tType > 0) {
            $this->getDbConnection()->where('tType', $tType);
        }

        if ($period > 0) {
            // 获取时间段
            $showTime = \App\Tools\Util::getPeriod($period);
            if (!empty($showTime)) {
                $this->getDbConnection()->where('showTime', $showTime['startTime'], '>');
                $this->getDbConnection()->where('showTime', $showTime['endTime'], '<');
            }
        }

        $fields = ['tId', 'title', 'cover', 'isFine', 'showTime'];
        $list = $this->getDbConnection()
            ->withTotalCount()
            ->get($this->table, [$pageSize * ($page - 1), $pageSize], $fields);
        $total = $this->getDbConnection()->getTotalCount();
        return ['total' => $total, 'list' => $list];
    }

    public function getTicketBasis(int $tId = 0): array
    {
        $fields = ['tId', 'title', 'cover', 'isFine', 'showTime'];
        $basis = $this->getDbConnection()
            ->where($this->primaryKey, $tId)
            ->getOne($this->table, $fields);

        return $basis ?: [];
    }
}
