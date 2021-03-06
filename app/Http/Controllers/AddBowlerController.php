<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bowler;
class AddBowlerController extends Controller
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
    public function store(Request $request,$mid,$inngs)
    {
        $cap = Bowler::where('match_id',$mid)->where('innings',$inngs)->where('cap',$request->bowlername)->get()->first();
        $bowler = new Bowler;
        if(Bowler::where('match_id',$mid)->where('innings',$inngs)->where('cap',$request->bowlername)->exists()){
            $cap->onStrike = 1;
            $cap->save();
            return redirect()->back();
        }else{
            
            $bowler->match_id = $mid;
            $bowler->innings = $inngs;
            $bowler->cap = $request->bowlername;
            $bowler->run = 0;
            $bowler->over = 0;
            $bowler->economy = 0;
            $bowler->fours = 0;
            $bowler->sixs = 0;
            $bowler->isActive = 1;
            $bowler->onStrike = 1;
            $bowler->ball = 0;
            $bowler->extra = 0;
            $bowler->save();

            return redirect()->back();
        }
        

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
