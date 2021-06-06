<?php

namespace App\Controller;

use App\Constant\ItemsConst;

/**
 * Class ItemShopController
 * @package App\Controller
*/
class ItemShopController extends Controller
{
    /**
     * @return null
    */
    public function buy()
    {
        $itemId = $_REQUEST['itemId'] ?? null;
        $repeatByTimes = $_REQUEST['itemAmount'] ?? null;

        # Ellenőrzés hogy a felhasználó be van-e jelentkezve
        if(false === $this->app()->account()->isAuthenticated()) {
            return $this->app()->response()->json([
                'success' => false,
                'msg' => 'Hiba történt a vásárlás során! (Err: 01)'
            ]);
        }

        # Ellenőrzés hogy benne van-e a tömbben
        if(!in_array($itemId, array_keys(ItemsConst::getItemShopItems()))) {
            return $this->app()->response()->json([
                'success' => false,
                'msg' => 'Hiba történt a vásárlás során! (Err: 02)'
            ]);
        }

        # Ellenőrzés hogy az itemAmount benne van-e a tömbben
        if(!in_array($repeatByTimes, ItemsConst::getAvailableItemAmount())) {
            return $this->app()->response()->json([
                'success' => false,
                'msg' => 'Hiba történt a vásárlás során! (Err: 03)'
            ]);
        }

        (new \App\Services\ItemShopService())->giveItem((int)$itemId, (int)$repeatByTimes);

        return $this->app()->response()->json([
            'success' => true,
            'msg' => 'A vásárlás sikeresen megtörtént!'
        ]);
    }
}