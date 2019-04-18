<?php
/**
 * Created by PhpStorm.
 * User: i am kerel
 * Date: 08.04.2019
 * Time: 14:45
 */

namespace App\MyClasses;

use App\Meet;
use App\Participant;

use Illuminate\Support\Facades\DB;

class DataBase
{
    /**
     * Get data for meets list view
     *
     * @return array
     */
    static function getDataMeetList($sort, $search) {

        if ($search == null) {
            $search = "";
        }
            $query = Meet::where('name', 'like', '%'.$search.'%');

        switch ($sort){
            case 'asc':
                $query->orderBy('name', 'asc');
                break;
            case 'desc':
                $query->orderBy('name', 'desc');
                break;
        }

        $meets = $query->paginate(10);

        return $meets;
    }

    /**
     * @param int $id
     * @return array
     */
    static function getDataMeet(int $id) {

       // $meet = DB::table('meets')->where('id', '=', $id)->first();
       // $participants = DB::table('participants')->where('meet_id','=', $id)
       //     ->paginate(10);

        $meet = Meet::where('id', '=', $id)->first();
        $participants = Participant::where('meet_id', '=', $id)
            ->orderBy('points', 'desc')
            ->paginate(10);

        return array('meet' => $meet,
            'participants' => $participants);
    }

    /**
     * @param int $admin_id
     * @return array
     */
    static function getMyMeetsData(int $admin_id) {
       // $meets = DB::table('meets')->where('admin_id', '=', $admin_id)->paginate(10);
        $meets = Meet::where('admin_id', '=', $admin_id)->paginate(10);
        return $meets;
    }

    /********************************************************
     * Database write methods follow
     ********************************************/

    static function createMeet($name, $admin_id){
        $meet = new Meet();

        $meet->name = $name;
        $meet->admin_id = $admin_id;

        $meet->save();
    }

    static function deleteMeet($id){
        $meet = Meet::where('id', '=', $id)->first();
        $meet->delete();
    }

    static function addParticipant($name, $meet_id){
        $participant = new Participant();

        $participant->name = $name;
        $participant->points = 0;
        $participant->meet_id = $meet_id;

        $participant->save();
    }

    static function deleteParticipant($id) {
        $participant = Participant::where('id', '=', $id)->first();
        $participant->delete();
    }

    static function addPoint($participant_id) {
        $participant = Participant::where('id', '=', $participant_id)->first();
        $participant->points++;

        $participant->save();
    }

    static function removePoint($participant_id) {
        $participant = Participant::where('id', '=', $participant_id)->first();
        if ($participant->points > 0) {
            $participant->points--;
            $participant->save();
        }
    }
}