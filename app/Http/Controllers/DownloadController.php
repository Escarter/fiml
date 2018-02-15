<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Download;
 
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
 

class DownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $downloadbales = Download::all();

        return view('admin.downloads', compact('downloadbales'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$request->hasFile($request->input('filefield')))
            return redirect()->back()->withErrors('Choose a file to upload first');

        $file = $request->file('filefield');
        $extension = $file->getClientOriginalExtension();
        //dd($extension);
        if($extension != 'pdf')
            return redirect()->back()->withErrors('File format not support ');
        if($extension != 'exe')
            return redirect()->back()->withErrors('File format not support ');

            $file->store('/public/downloads/'.$extension);
        //Storage::disk('local')->putFileAs($file->getFilename().'.'.$extension,  File::get($file),'public');

		$dowbloadablefile = new Download();
		$dowbloadablefile->mime = $file->getClientMimeType();
		$dowbloadablefile->original_filename = $file->getClientOriginalName();
		$dowbloadablefile->filename = $file->getFilename().'.'.$extension;
 
		$dowbloadablefile->save();
 
		//return redirect('/');
      
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
