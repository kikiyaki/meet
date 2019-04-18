<?php
/**
 * Created by PhpStorm.
 * User: i am kerel
 * Date: 25.02.2019
 * Time: 14:05
 */

namespace App\MyClasses;

use App\Meet;
use App\Participant;
use Illuminate\Support\Facades\Auth;

class AdminHandler extends GuestHandler {
    function getHomeView() {
        return view('home.admin');
    }

    function getMeetListView($sort, $search)
    {
        return view('meet_list.admin', ['meets' => DataBase::getDataMeetList($sort, $search)]);
    }

    function getMeetView(int $id)
    {
        $data = DataBase::getDataMeet($id);
        $meet = Meet::where('id', '=', $id)->first();

        $meet_admin_id = $meet->admin_id;
        $current_admin_id = Auth::id();

        if ($meet_admin_id == $current_admin_id) {
            return view('meet.admin_my_meet', ['meet' => $data['meet'],
                'participants' => $data['participants']]);
        } else {
            return view('meet.admin', ['meet' => $data['meet'],
                'participants' => $data['participants']]);
        }
    }

    function getCreateView()
    {
        return view('create.admin');
    }

    function getMyMeetsView(int $admin_id)
    {
        return view('my_meets.admin', ['meets' => DataBase::getMyMeetsData($admin_id)]);
    }

    /********************************************************
     * Database write methods follow
     ********************************************/


    /**
     * @param $name
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    function createMeet($name){
        $admin_id = Auth::id();
        DataBase::createMeet($name, $admin_id);

        return redirect('/myMeets');
    }

    function deleteMeet($id)
    {
        $meet = Meet::where('id', '=', $id)->first();

        $meet_admin_id = $meet->admin_id;
        $current_admin_id = Auth::id();

        if ($meet_admin_id == $current_admin_id) {
            DataBase::deleteMeet($id);
            return redirect('myMeets');
        } else {
            return $this->noAccess();
        }
    }

    function addParticipant($name, $meet_id)
    {
        $meet = Meet::where('id', '=', $meet_id)->first();
        $admin_meet_id = $meet->admin_id;
        $current_admin_id = Auth::id();

        if($admin_meet_id == $current_admin_id) {
            DataBase::addParticipant($name, $meet_id);
            return back();
        } else {
            return $this->noAccess();
        }
    }

    function deleteParticipant($id)
    {
        $participant = Participant::where('id', '=', $id)->first();
        $meet = $participant->meet;

        $admin_meet_id = $meet->admin_id;
        $current_admin_id = Auth::id();

        if($admin_meet_id == $current_admin_id) {
            DataBase::deleteParticipant($id);
            return back();
        } else {
            return $this->noAccess();
        }
    }

    /**
     * Method handles AJAX-request, no return view or redirect
     *
     * @return int
     * @param $participant_id
     */
    function addPoint($participant_id)
    {
        $participant = Participant::where('id', '=', $participant_id)->first();
        $meet = $participant->meet;

        $admin_meet_id = $meet->admin_id;
        $current_admin_id = Auth::id();

        if($admin_meet_id == $current_admin_id) {
            DataBase::addPoint($participant_id);
        }

        $participant->refresh();
        return $participant->points;
    }

    /**
     * Method handles AJAX-request, no return view or redirect
     *
     * @return int
     * @param $participant_id
     */
    function removePoint($participant_id)
    {
        $participant = Participant::where('id', '=', $participant_id)->first();
        $meet = $participant->meet;

        $admin_meet_id = $meet->admin_id;
        $current_admin_id = Auth::id();

        if($admin_meet_id == $current_admin_id) {
            DataBase::removePoint($participant_id);
        }

        $participant->refresh();
        return $participant->points;
    }

    function noAccess(){
        return view('no_access.admin');
    }
}