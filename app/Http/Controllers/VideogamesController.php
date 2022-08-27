<?php

namespace App\Http\Controllers;

use App\Http\Requests\VideogameCreate;
use App\Http\Requests\VideogameDelete;
use App\Http\Requests\VideogameRead;
use App\Http\Requests\VideogameUpdate;
use App\Http\Resources\VideogamesResource;
use App\Models\Api\Videogames;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VideogamesController extends Controller
{
    public function create(VideogameCreate $request) {
        $new_item = Videogames::create($request->validated());

        return new VideogamesResource($new_item);
    }

    public function read(VideogameRead $request) {   
        $q = Videogames
        ::when(
            $request->has('id') && !is_null($request->input('id')), 
            function ($query) use ($request) {
                return $query->where('id', $request->input('id'));
            }
        )
        ->when(
            $request->has('title') && !is_null($request->input('title')),
            function ($query) use ($request) {
                $title = $request->input('title');
                return $query->where('title', 'LIKE', '%'.$title.'%');
            }
        )
        ->when(
            $request->has('developer') && !is_null($request->input('developer')),
            function ($query) use ($request) {
                $developer = $request->input('developer');
                return $query->where('developer', 'LIKE', '%'.$developer.'%');
            }
        )
        ->when(
            $request->has('tags') && !is_null($request->input('tags')),
            function ($query) use ($request) {
                return $query->whereJsonContains('tags', $request->input('tags'));
            }
        );

        return VideogamesResource::collection($q->get());
    }

    public function update(VideogameUpdate $request)
    {
        Videogames
            ::where('id', $request->input('id'))
            ->update($request->validated());
        
        return new VideogamesResource(Videogames::find($request->input('id')));
    }

    public function delete(VideogameDelete $request)
    {
        $game = Videogames::find($request->input('id'));

        Videogames::where("id", $request->input('id'))
            ->delete();

        return new VideogamesResource($game);
    }

    public function tags() {
        $raw = DB::select("
            SELECT DISTINCT tt.tag
            FROM 
            videogames,
            JSON_TABLE(
                tags, '$[*]'
                COLUMNS (tag TEXT(128)  PATH '$')
            ) tt;
        ");

        $tags = array();

        foreach ($raw as $value) {
            $tags[] = $value->tag;
        }

        return array(
            'data' => $tags
        );
    }
}
