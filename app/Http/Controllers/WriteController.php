<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MyClasses\Handler;
use Illuminate\Support\Facades\Auth;

class WriteController extends Controller
{
    function createMeet(Request $request) {
        $handler = Handler::getInstance(Auth::check());
        $name = $request->name;
        return $handler->createMeet($name);
    }

    function deleteMeet(Request $request) {
        $handler = Handler::getInstance(Auth::check());
        $meet_id = $request->meet_id;
        return $handler->deleteMeet($meet_id);
    }

    function addParticipant(Request $request) {
        $handler = Handler::getInstance(Auth::check());
        $name = $request->name;
        $meet_id = $request->meet_id;
        return $handler->addParticipant($name, $meet_id);
    }

    function deleteParticipant(Request $request) {
        $handler = Handler::getInstance(Auth::check());
        $id = $request->id;
        return $handler->deleteParticipant($id);
    }

    function addPoint(Request $request) {
        $handler = Handler::getInstance(Auth::check());
        return $handler->addPoint($request->participant_id);
    }

    function removePoint(Request $request) {
        $handler = Handler::getInstance(Auth::check());
        return $handler->removePoint($request->participant_id);
    }
}
