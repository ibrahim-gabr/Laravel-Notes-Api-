<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use App\Transformers\NoteTransformer;
use Illuminate\Support\Facades\DB;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Note::all()->transformWith(new NoteTransformer())->toArray();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    
        
        $note = new Note();
        $note->title = $request->title;
        $note->body = $request->body;
        $note->save();
        $note->tags()->sync($request->tag_id, false);
        $note->save();
        return  $note;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {     
        return Note::where( 'id' , $note->id)->get()->transformWith(new NoteTransformer());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        // ddd($note->id);
        $note_edit = Note::where( 'id' , $note->id)->first();
        $note_edit->title = $request->input('title');
        $note_edit->body = $request->body;
        $note_edit->tags()->sync($request->tag_id, false);
        $note_edit->save();
        return $note_edit;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        $note_delete = Note::where( 'id' , $note->id)->first();
        $note_delete->tags()->detach();
        $note_delete->delete();
        return $note_delete->toJson();
    }
}
