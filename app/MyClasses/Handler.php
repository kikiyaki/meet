<?php
/**
 * Created by PhpStorm.
 * User: i am kerel
 * Date: 25.02.2019
 * Time: 13:55
 */
namespace App\MyClasses;




abstract class Handler {

    static function getInstance($isLogged) {
        if ($isLogged) {
            return new AdminHandler();
        } else {
            return new GuestHandler();
        }
    }

    abstract function getHomeView();

    abstract function getMeetListView($sort, $search);

    abstract function getMeetView(int $id);

    abstract function getCreateView();

    abstract function getMyMeetsView(int $admin_id);
}



