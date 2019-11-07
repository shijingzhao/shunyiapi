<?php

/**
 * @Author: jingzhao
 * @Created Time : 2019/11/04 16:04
 * @File Name: TicketFileBean.php
 * @Description:
 */

namespace App\Model\Ticket;

class TicketFileBean extends \EasySwoole\Spl\SplBean
{
    protected $tFId;
    protected $tId;
    protected $name;
    protected $price;
    protected $detail;
    protected $tFType;
    protected $created;
    protected $updated;
    protected $remark;


    public function setTFId($tFId)
    {
        $this->tFId = $tFId;
    }


    public function getTFId()
    {
        return $this->tFId;
    }


    public function setTId($tId)
    {
        $this->tId = $tId;
    }


    public function getTId()
    {
        return $this->tId;
    }


    public function setName($name)
    {
        $this->name = $name;
    }


    public function getName()
    {
        return $this->name;
    }


    public function setPrice($price)
    {
        $this->price = $price;
    }


    public function getPrice()
    {
        return $this->price;
    }


    public function setDetail($detail)
    {
        $this->detail = $detail;
    }


    public function getDetail()
    {
        return $this->detail;
    }


    public function setTFType($tFType)
    {
        $this->tFType = $tFType;
    }


    public function getTFType()
    {
        return $this->tFType;
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
