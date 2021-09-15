<?php
/**
 * Created by PhpStorm.
 * User: eduard
 * Date: 15.09.2021
 * Time: 22:48
 */

namespace App\Http\Controllers;


class AccountController extends HomeController
{
    public function favorite()
    {
        $token     = session()->get('token');
        $favorites = $this->getFavorite($token);
        $sections  = $this->getAllSections();

        return view('account.favorite', [
            'favorites' => $favorites,
            'sections' => $sections->sections,
            'cities' => $this->getAvailableCitites()
        ]);
    }

    public function orders()
    {
        $orders = $this->getUserOrders();

        $sections = $this->getAllSections();
        return view('account.orders', [
            'orders' => $orders->orders,
            'sections' => $sections->sections,
            'cities' => $this->getAvailableCitites()
        ]);
    }

    public function profile()
    {
        $token    = session()->get('token');
        $userData = $this->getUserData($token);
        $sections = $this->getAllSections();

        return view('account.profile', [
            'user' => $userData->user,
            'sections' => $sections->sections,
            'cities' => $this->getAvailableCitites()
        ]);
    }
}
