<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

use App\Models\Download;
 

class DownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDownloadContentManagement()
    {
        $downloadableContents = Download::all();

       // dd($downloadableContents);

        return view('admins.download-content-management')->with(['downloadableContents'=>$downloadableContents]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createDownloadContent(Request $request)
    {

        if($request->input('type') == 'local'){
            //dd($request->all());
            if(!$request->hasFile($request->input('file')))
                return redirect()->back()->withErrors('Choose a file to upload first');

            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            //dd($extension);
            // if($extension !== 'pdf')
            //     return redirect()->back()->withErrors('File format not support '.$extension);
            // if($extension !== 'exe')
            //     return redirect()->back()->withErrors('File format not support '.$extension);

            

            $file->store('/public/downloads/'.$extension);
            //Storage::disk('local')->putFileAs($file->getFilename().'.'.$extension,  File::get($file),'public');

            $downloadablefile = new Download();
            $downloadablefile->file_name = $request->input('file_name');
            $downloadablefile->file_extension = $extension;
            $downloadablefile->description = $request->input('file_description');
            $downloadablefile->path = $file->hashName();
    
            $downloadablefile->save();
    
            return redirect()->back()->withSuccess('New downloadable content uploaded!');
        }

        $downloadablefile = new Download();
        $downloadablefile->file_name = $request->input('file_name');
        $downloadablefile->file_extension = $request->input('file_extension');
        $downloadablefile->description = $request->input('file_description');
        $downloadablefile->remote_url = $request->input('file_url');

        $downloadablefile->save();

        return redirect()->back()->withSuccess('New downloadable content uploaded!');


      
    }
    public function editDowbloadContent($id)
    {
        # code...
    }
    public function updateDownloadContent(Request $request)
    {
        # code...
    }
    public function deleteDownloadContent($id)
    {
        try{
            $downloadableContent = Download::findOrFail($id);
            if($downloadableContent->remote_url != NULL ){
                $downloadableContent->delete();
                return response()->json([
                    'data' => 'Downloadable content Successfully deleted!',
                    'status' => 'success'                                                   
                ]);
            }
            Storage::delete('/public/downloads/'.$downloadableContent->file_extension.'/'.$downloadableContent->path);
            $downloadableContent->delete();

            return response()->json([
                'data' => 'Downloadable content Successfully deleted!',
                'status' => 'success'
            ]);
        }catch(\Exception $e){
            return response()->json([
                'data' => 'Downloadable content could not be located!',
                'status' => 'error'
            ]);
        }
    }
}
