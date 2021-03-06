<?php

namespace App\Http\Controllers;

use App\Model\Reply;
use Illuminate\Http\Request;
use App\Model\Questions;
use Illuminate\Support\Facades\Response;
use App\Http\Resources\ReplyResource;



class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Questions $question)
    {
        // cek koneksi
        // return $question;
       // return Reply::latest()->get();
        return ReplyResource::collection($question->replies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Questions $question, Request $request)
    {
        //store method 
        $reply = $question->replies()->create($request->all());
        return \response(['reply' => new ReplyResource($reply)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function show(Questions $question, Reply $reply)
    {
        //
        return new ReplyResource($reply);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function update(Questions $question, Request $request, Reply $reply)
    {
        //update method
        $reply->update($request->all());
        return \response('Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Questions $question, Reply $reply)

    {
        //
        $reply->delete();
        return \response('Berhasil Di Hapus!!!');
    }
}
