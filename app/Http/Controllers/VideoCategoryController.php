<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CategoryRequest;

use App\Models\VideoCategory;

class VideoCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
    public function store(CategoryRequest $request)
    {
        VideoCategory::create([
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]);

        return redirect()->back()->withInfo('Video Cagegory Successfully Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $videoCategory = VideoCategory::findOrFail($id);

            $response = [
                'data' => $videoCategory,
                'status' => 'success'
            ];

            return response()->json($response);

        }catch(\Exception $e){
            $e = 'Was unable to get Video Category';

            return response()->json([
                'data' => $e,
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
        try{
            $videoCategory = VideoCategory::findOrFail($id);

            $response = [
                'data' => $videoCategory,
                'status' => 'success'
            ];

            return response()->json($response);

        }catch(\Exception $e){
            $e = 'Was unable to get Video Category';

            return response()->json([
                'data' => $e,
                'status' => 'error'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $videoCategory = VideoCategory::findOrFail($id);

        $videoCategory->update([
            'name'=> $request->input('name'),
            'description' =>$request->input('description'),
        ]);

        return redirect()->back()->withInfo('Video Category was successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $videoCategory = VideoCategory::findOrFail($id);

        $videoCategory->delete();

        return redirect()->back()->withInfo('Video Category was successfully deleted!');
    }
}
