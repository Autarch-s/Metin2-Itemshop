<?php

namespace App\Services;

use App\Constant\ItemsConst;

/**
 * Class ItemShopService
 * @package App\Services
*/
class ItemShopService extends Service
{
    /**
     * @param $itemId
     * @param $repeatByTimes
    */
    public function giveItem($itemId, $repeatByTimes)
    {
        foreach(range(1, $repeatByTimes) as $repeatIdx) {
            $pid = $this->app()->account()->id;
            $login = $this->app()->account()->login;
            $vnum = $itemId;
            $count = ItemsConst::getItemShopItemAmount($itemId);
            $given_time = date('Y-m-d H:i:s');
            $why = 's2.ddmt2.net/shop';
            $socket0 = 0;
            $socket1 = 0;
            $socket2 = 0;
            $mall = 1;
            $sql = "INSERT INTO item_award (pid, login, vnum, count, given_time, why, socket0, socket1, socket2, mall) VALUES (?,?,?,?,?,?,?,?,?,?)";
            $stmt= $this->app()->db()->playerDb()->prepare($sql);
            $stmt->execute([$pid, $login, $vnum, $count, $given_time, $why, $socket0, $socket1, $socket2, $mall]);
        }
    }
}