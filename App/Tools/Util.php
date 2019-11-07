<?php
/**
 * @Author: jingzhao
 * @Created Time : 2019/11/05 15:44
 * @File Name: ../shunyi/App/Tools/Util.php
 * @Description:
 */
namespace App\Tools;

class Util
{
    /**
     * 时间段对应
     * 1 今天; 2 明天; 3 一周内
     */
    public static function getPeriod($index) {
        if (!$index) return ['', ''];

        $period = [
            1 => [
                'startTime' => date('Y-m-d 00:00:00'),
                'endTime' => date('Y-m-d 23:59:59')
            ],
            2 => [
                'startTime' => date('Y-m-d 00:00:00', strtotime('+1 day')),
                'endTime' => date('Y-m-d 23:59:59', strtotime('+1 day'))
            ],
            3 => [
                'startTime' => date('Y-m-d 00:00:00'),
                'endTime' => date('Y-m-d 00:00:00', strtotime('+7 day')),
            ]
        ];
        if (!isset($period[$index])) {
            $index = 1;
        }
        return $period[$index];
    }
}
