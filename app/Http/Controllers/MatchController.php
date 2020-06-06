<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Match;
use App\Schedule;
use App\Player;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedule = Schedule::all();
        return view('match.index', compact(['schedule']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($schedule_id)
    {
        $schedule = Schedule::find($schedule_id);
        $home_player = Player::where('team_id',$schedule->home_team_id)->get();
        $away_player = Player::where('team_id',$schedule->away_team_id)->get();

        // $home_score = Match::where('team_id',$schedule->home_team_id)->get();
        // $away_score = Match::where('team_id',$schedule->away_team_id)->get();

        return view('match.create', compact(['schedule', 'home_player', 'away_player']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $matchData = $request->all();
        unset($matchData['_token']);
        $matchData['scores'] = 1;
        $match = new Match($matchData);
        $match->save();
        return redirect(route('match.create', $matchData['schedule_id']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
