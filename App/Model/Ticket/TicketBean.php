<?php

/**
 * @Author: jingzhao
 * @Created Time : 2019/11/04 16:04
 * @File Name: TicketBean.php
 * @Description:
 */

namespace App\Model\Ticket;

class TicketBean extends \EasySwoole\Spl\SplBean
{
    protected $tId;
    protected $title;
    protected $tType;
    protected $cover;
    protected $detail;
    protected $isFine;
    protected $created;
    protected $updated;
    protected $remark;


    public function setTId($tId)
    {
        $this->tId = $tId;
    }


    public function getTId()
    {
        return $this->tId;
    }


    public function setTitle($title)
    {
        $this->title = $title;
    }


    public function getTitle()
    {
        return $this->title;
    }


    public function setTType($tType)
    {
        $this->tType = $tType;
    }


    public function getTType()
    {
        return $this->tType;
    }


    public function setCover($cover)
    {
        $this->cover = $cover;
    }


    public function getCover()
    {
        return $this->cover;
    }


    public function setDetail($detail)
    {
        $this->detail = $detail;
    }


    public function getDetail()
    {
        return $this->detail;
    }


    public function setIsFine($isFine)
    {
        $this->isFine = $isFine;
    }


    public function getIsFine()
    {
        return $this->isFine;
    }

    public function setCreate($created)
    {
        $this->created = $created;
    }

    public function getCreate()
    {
        return $this->created;
    }

    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }

    public function getUpdated()
    {
        return $this->updated;
    }

    public function setRemark($remark)
    {
        $this->remark = $remark;
    }

    public function getRemark()
    {
        return $this->remark;
    }
}
