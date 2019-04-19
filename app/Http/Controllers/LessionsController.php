<?php

namespace App\Http\Controllers;


use App\Lessions;
use App\User;
use Illuminate\Http\Request;
use App\ExtFolder\TransFormers\LessionTransformer;

class LessionsController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $lessionTransformer;

    function __construct(LessionTransformer $lessionTransformer){

        $this->lessionTransformer = $lessionTransformer;

        $this->beforeFilter('auth.basic',['on'=>'post']);

    }
 
   


    public function index()
    {
       $lessions =  Lessions::all();

       return $this->response([ 
        'data' => $this->lessionTransformer->transformCollection($lessions->all())
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
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
     * @param  \App\lessions  $lessions
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lession = Lessions::find($id);
        $data = new Lessions;

        if(!$lession){

          return  $this->respondNotFound("this is awesomely working");

        }

        return $this->response([

            'data' => $this->lessionTransformer->transform($lession)
    
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\lessions  $lessions
     * @return \Illuminate\Http\Response
     */
    public function edit(Lessions $lessions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\lessions  $lessions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lessions $lessions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\lessions  $lessions
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lessions $lessions)
    {
        //
    }

    private function transformCollectionns($lessions){

        return array_map([$this, 'transForm'],$lessions->toArray());
    }

    private function transForm($lession){
       
        return [
                'title'=> $lession['title'],
                'active' =>(boolean)$lession['some_bool'],
                'body' => $lession['body']
                
            ];

    }
}
