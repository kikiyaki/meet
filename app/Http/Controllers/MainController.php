<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MyClasses\Handler;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    function showHome() {
        $handler = Handler::getInstance(Auth::check());
        $view = $handler->getHomeView();
        return $view;
    }

    function showMeetList(Request $request) {
        $sort = $request->input('sort');
        $search = $request->input('search');

        $handler = Handler::getInstance(Auth::check());
        $view = $handler->getMeetListView($sort, $search);
        return $view;
    }

    function showMeet($id) {
        $handler = Handler::getInstance(Auth::check());
        $view = $handler->getMeetView($id);
        return $view;
    }

    function showCreate() {
        $handler = Handler::getInstance(Auth::check());
        $view = $handler->getCreateView();
        return $view;
    }

    function showMyMeets() {
        $handler = Handler::getInstance(Auth::check());

        if (Auth::check()){
            $id= Auth::id();
        } else {
            $id = -1;
        }

        $view = $handler->getMyMeetsView($id);
        return $view;
    }


}
