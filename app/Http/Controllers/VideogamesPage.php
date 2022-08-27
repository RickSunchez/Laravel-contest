<?php

namespace App\Http\Controllers;

use App\Http\Requests\VideogameCreate;
use App\Http\Requests\VideogameRead;
use App\Models\Api\Videogames;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class VideogamesPage extends Controller
{
    public function main(VideogameRead $request)
    {
        $vgc = new VideogamesController();
        $games = $vgc->read($request);

        $games->each(function(&$game){
            $game->tags = implode(', ', $game->tags);
        });

        return view('app', array('games'=>$games, 'tags'=>$vgc->tags()['data']));
    }

    public function delete($id)
    {
        Videogames::where("id", $id)->delete();
        return Redirect::to('/');
    }

    public function update($id)
    {
        $game = Videogames::find($id);
        $game->tags = implode(', ', $game->tags);

        return view('update', array('game'=>$game));
    }

    public function create()
    {
        return view('create');
    }
}
