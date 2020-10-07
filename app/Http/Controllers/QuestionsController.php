<?php

namespace App\Http\Controllers;

use App\Model\Questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get Data For Question 
        return Questions::latest()->get();
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

    public function show(Questions $questions, $slug)
    {
        // get data with binding 
        // $data = Questions::find($slug);
        // return $data;
        return Questions::where('slug', $slug)->first();
       
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Questions $questions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function destroy(Questions $questions, $slug)
    {
       $data = Questions::where('slug', $slug)->first();
       // dd($data);
       $data->delete();
       return \response('Has Delete');
    }
}
