<?php
/**
 * @Author: jingzhao
 * @Created Time : 2019/11/07 11:16
 * @File Name: App/Model/Ticket/TicketDetailModel.php
 * @Description:
 */
namespace App\Model\Ticket;

class TicketDetailModel extends \App\Model\BaseModel
{
    protected $table = 'ticketDetail';
    protected $primaryKey = 'tdId';

    /** 
     * @Author: shi jingzhao 
     * @Date: 2019-11-07 11:17:41 
     * @Desc: 票详情 
     */
    public function getTicketDetail(int $tId = 0): array
    {
        $fields = ['cityname', 'location', 'venue', 'content', 'detail'];
        $detail = $this->getDbConnection()
            ->where('tId', $tId)
            ->getOne($this->table, $fields);

        return $detail ?: [];
    }
}