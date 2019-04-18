<?php
/**
 * Created by PhpStorm.
 * User: i am kerel
 * Date: 25.02.2019
 * Time: 14:02
 */
namespace App\MyClasses;


use phpDocumentor\Reflection\Types\Integer;


class GuestHandler extends Handler {

    function getHomeView() {
        return view('home.guest');
    }

    /**
     * Get meet_list view with table of meets
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function getMeetListView($sort, $search)
    {
        return view('meet_list.guest', ['meets' => DataBase::getDataMeetList($sort, $search)]);
    }

    /**
     * Get meet view with table of participants for one selected meet
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function getMeetView(int $id)
    {
        $data = DataBase::getDataMeet($id);

        return view('meet.guest', ['meet' => $data['meet'],
                                         'participants' => $data['participants']]);
    }

    function getCreateView()
    {
        return view('create.guest');
    }

    function getMyMeetsView(int $admin_id)
    {
        return view('my_meets.guest');
    }

    /********************************************************
     * Database write methods follow
     ********************************************/

    /**
     * @param $name
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    function createMeet($name){
        return $this->noAccess();
    }

    function deleteMeet($id) {
        return $this->noAccess();
    }

    function addParticipant($name, $meet_id) {
        return $this->noAccess();
    }

    function deleteParticipant($id) {
        return $this->noAccess();
    }

    function addPoint($participant_id){
        return $this->noAccess();
    }

    function removePoint($participant_id){
        return $this->noAccess();
    }

    function noAccess(){
        return view('no_access.guest');
    }
}