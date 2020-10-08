<?php

namespace App\Http\Controllers;

use App\Model\Questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use App\User;
use App\Http\Resources\QuestionsResource;


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
        $data = Questions::latest()->get();
        return QuestionsResource::collection($data);
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
        Questions::create($request->all());
    }

     /**
     * Display the specified resource.
     *
     * @param  \App\Model\Questions  $questions
     * @return \Illuminate\Http\Response
     */

    public function show(Questions $question)
    {
        // get data with binding 
        // $data = Questions::find($slug);
        // return $data;
        // $data = Questions::where('slug', $slug)->first();
        // return new QuestionsResource($data);
        return new QuestionsResource($question);
       
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Questions $questions, $slug)
    {
        //
        $data = Questions::where('slug', $slug)->first();
       // dd($data);
        
        $data->update($request->all());
        return \request('Update', Response::HTTP_ACCEPTED);
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
