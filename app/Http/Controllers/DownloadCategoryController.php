<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CategoryRequest;

use App\Models\DownloadCategory;

class DownloadCategoryController extends Controller
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
        DownloadCategory::create([
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]);

        return redirect()->back()->withInfo('Download Cagegory Successfully Created!');
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
            $downloadCategory = DownloadCategory::findOrFail($id);

            $response = [
                'data' => $downloadCategory,
                'status' => 'success'
            ];

            return response()->json($response);

        }catch(\Exception $e){
            $e = 'Was unable to get DownloadCategory';

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
            $downloadCategory = DownloadCategory::findOrFail($id);

            $response = [
                'data' => $downloadCategory,
                'status' => 'success'
            ];

            return response()->json($response);

        }catch(\Exception $e){
            $e = 'Was unable to get DownloadCategory';

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
        $downloadCategory = DownloadCategory::findOrFail($id);

        $downloadCategory->update([
            'name'=> $request->input('name'),
            'description' =>$request->input('description'),
        ]);

        return redirect()->back()->withInfo('Download Category was successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $downloadCategory = DownloadCategory::findOrFail($id);

        $downloadCategory->delete();

        return redirect()->back()->withInfo('Download Category was successfully deleted!');
    }
}
