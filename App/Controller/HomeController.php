<?php

namespace App\Controller;

use App\Constant\ItemsConst;

/**
 * Class HomeController
 * @package App\Controller
*/
class HomeController extends Controller
{
    /**
     * @return array|false|string|string[]
    */
    public function index()
    {
        $account = $this->app()->account()->get();
        $characters = $this->app()->account()->characters();

        return $this->viewService()
            ->setLayout('authorized')
            ->setView('home')
            ->setData(compact('account', 'characters'))
            ->render();
    }

    /**
     * @return array|false|string|string[]
    */
    public function itemshop()
    {
        $itemShopItems = ItemsConst::getItemShopItems();

        return $this->viewService()
            ->setLayout('authorized')
            ->setView('itemshop')
            ->setData(compact('itemShopItems'))
            ->render();
    }
}