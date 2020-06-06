<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Player;
use App\Team;


class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $players = Player::all();
        return view('player.index', compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::all();
        return view('player.create', compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $playerData = $request->all();
        unset($playerData['_token']);

        $isAvailable = $this->getAvailabilityPlayerNumber($playerData['back_num'], $playerData['team_id']);

        if($isAvailable){
            return redirect('/player')->with('error', 'Nomor punggung dalam satu tim tidak boleh sama');
        }
        $player = new Player($playerData);
        $player->save();
        return \redirect('/player')->with('success', 'Data pemain disimpan');
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
        $player = Player::find($id);
        $teams = Team::all();
        return view('player.edit', compact(['player', 'teams']));
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
        $player = Player::find($id);
        $player->name = $request->get('name');
        $player->team_id = $request->get('team_id');
        $player->tall = $request->get('tall');
        $player->weight = $request->get('weight');
        $player->role = $request->get('role');
        $player->back_num = $request->get('back_num');
        
        $isAvailable = $this->getAvailabilityPlayerNumber($player->back_num, $player->team_id);

        if($isAvailable){
            return redirect('/player')->with('error', 'Nomor punggung dalam satu tim tidak boleh sama');
        }

        $player->save();
        return redirect('/player')->with('success', 'Data pemain sudah di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Player::destroy($id);
        return \redirect('/player')->with('success', 'player has been deleted temporarily');
    }

    private function getAvailabilityPlayerNumber($num, $team){
        $player_num = Player::where(['back_num' => $num, 'team_id' => $team])->get()->toArray();

        return count($player_num) > 0 ? true : false ;
    }

    public function get_players_by_team($id)
    {
        $player = Player::where('team_id', $id);

        return $player->toJson();
    }
}
