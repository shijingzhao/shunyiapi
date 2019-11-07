<?php
/**
 * @Author: jingzhao
 * @Created Time : 2019/11/07 11:16
 * @File Name: App/Model/Ticket/ImageModel.php
 * @Description:
 */
namespace App\Model\Image;

class ImageModel extends \App\Model\BaseModel
{
    protected $table = 'images';
    protected $primaryKey = 'imgId';

    /** 
     * @Author: shi jingzhao 
     * @Date: 2019-11-07 11:17:41 
     * @Desc: 票详情 
     */
    public function getTicketImages(int $tId = 0): array
    {
        $fields = ['url'];
        $images = $this->getDbConnection()
            ->where('tId', $tId)
            ->get($this->table, 10, $fields);

        return $images ?: [];
    }
}