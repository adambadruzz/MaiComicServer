<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookmarkController extends Controller
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
        return Bookmark::all();
    }

    public function readBookmarkAll()
    {
       return DB::table('bookmarks')
       ->join('comics', 'comics.id_comic', '=', 'bookmarks.comic_id')
       ->join('users', 'users.id_user', '=', 'bookmarks.user_id')
       ->select('bookmarks.*', 'comics.*', 'users.*')
       ->get();
    }

    public function readBookmarkUser($user_id)
    {
       return DB::table('bookmarks')
       ->join('comics', 'comics.id_comic', '=', 'bookmarks.comic_id')
       ->join('authors', 'comics.author_id', '=', 'authors.id_author')
       ->join('users', 'users.id_user', '=', 'bookmarks.user_id')
       ->select('bookmarks.*', 'comics.*', 'authors.*','users.*')
       ->where('bookmarks.user_id', '=', $user_id)
       ->get();
    }

    public function readBookmarkType($user_id,$type)
    {
       return DB::table('bookmarks')
       ->join('comics', 'comics.id_comic', '=', 'bookmarks.comic_id')
       ->join('authors', 'comics.author_id', '=', 'authors.id_author')
       ->join('users', 'users.id_user', '=', 'bookmarks.user_id')
       ->select('bookmarks.*', 'comics.*', 'authors.*','users.*')
       ->where('bookmarks.user_id', '=', $user_id)
       ->where('comics.type', '=', $type)
       ->get();
    }

    public function readBookmark($comic_id,$user_id)
    {
       return Bookmark::where('comic_id', '=', $comic_id)->where('user_id', '=', $user_id)->get();
    }

    public function readBookmarkId($comic_id)
    {
       return Bookmark::where('comic_id', '=', $comic_id)->get();
    }


    public function create(Request $request)
    {
        $bookmark = new Bookmark();
        $bookmark->comic_id = $request->comic_id;
        $bookmark->user_id = $request->user_id;


        $bookmark->save();
        return "Data added successfully";
    }

    public function update(Request $request, $id_bookmark)
    {
        $bookmark = Bookmark::find($id_bookmark);
        $bookmark->comic_id = $request->comic_id;
        $bookmark->user_id = $request->user_id;
    }

    public function delete(Request $request, $id_bookmark){
        $bookmark = Bookmark::find($id_bookmark);
        $bookmark->delete();
        
        return "Data deleted successfully";
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
     * @param  \App\Models\Bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function show(Bookmark $bookmark)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function edit(Bookmark $bookmark)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bookmark $bookmark)
    {
        //
    }
}
