<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\TrainingRequest;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainingContents = Training::paginate(20);

       // return view()->compact(['trainingContents' => $trainingContents]);
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
    public function store(TrainingRequest $request)
    {
        //

        Training::create([
            'title' => $request->input('title'),
            'video_category_id' => $request->input('category_id'),
            'type' => $request->input('type'),
            'content' => $request->input('content')
        ]);

        return redirect()->back()->withInfo('Training Video Successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $trainingContent = Training::findOrFail($id);

            return response()->json([
                'data' => $trainingContent,
                'status' => 'success'
            ]);

        }catch(\Exception $e){
            return response()->json([
                'data' => 'Training Content can not be located!',
                'status' => 'error'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TrainingRequest $request, $id)
    {
        $trainingContent = Training::findOrFail($id);

        $trainingContent->update([
            'title' => $request->input('title'),
            'video_category_id' => $request->input('category_id'),
            'type' => $request->input('type'),
            'content' => $request->input('content')
        ]);

        return redirect()->back()->withInfo('Training Video Successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trainingContent = Training::findOrFail($id);
        $trainingContent->delete();

        return redirect()->back()->withInfo('Training Video Successfully deleted!');        
    }
}
