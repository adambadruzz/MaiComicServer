<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use App\Models\Bookmark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function readAll(){
        return Comic::all();
    }

    public function readComicAll()
    {
       return DB::table('comics')->join('authors', 'comics.author_id', '=', 'authors.id_author')->select('comics.*','authors.author_name')->get();
    }

    public function readComicType($type)
    {
       return DB::table('comics')->join('authors', 'comics.author_id', '=', 'authors.id_author')
       ->select('comics.*','authors.author_name')->where('type', '=', $type)->get();
    }

    // public function readComicManhua()
    // {
    //    return DB::table('comics')->join('authors', 'comics.author_id', '=', 'authors.id')->select('comics.*','authors.author_name')->where('type', '=', 'Manhua')->get();
    // }

    // public function readComicManhwa()
    // {
    //    return DB::table('comics')->join('authors', 'comics.author_id', '=', 'authors.id')->select('comics.*','authors.author_name')->where('type', '=', 'Manhwa')->get();
    // }



    public function create(Request $request)
    {
        $comic = new Comic();
        $comic->cover = $request->cover;
        $comic->comic_name = $request->comic_name;
        $comic->episode = $request->episode;
        $comic->status = $request->status;
        $comic->type = $request->type;
        $comic->description = $request->description;
        $comic->author_id = $request->author_id;

        $comic->save();
        return "Data added successfully";
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_comic)
    {
        $comic = Comic::find($id);
        $comic->cover = $request->cover;
        $comic->comic_name = $request->comic_name;
        $comic->episode = $request->episode;
        $comic->status = $request->status;
        $comic->type = $request->type;
        $comic->description = $request->description;
        $comic->author_id = $request->author_id;

        $comic->save();
        return "Data updated successfully";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function delete($id_comic)
    {
        $comic = Comic::find($id_comic);
        $comic->delete();
        return "Data deleted successfully";
    }

    // public function bookmarks()
    // {
    //     return $this->hasMany(Bookmark::class);
    // }

    // public function destroy($id)
    // {
    //     $comic = Comic::find($id);

    //     foreach($comic->bookmarks()->get() as $book) {

    //         //delete post
    //         $book->delete();
    //     }

    //     $comic->delete();
    // }
}
