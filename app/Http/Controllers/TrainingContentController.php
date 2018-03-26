<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\TrainingContentRequest;
use App\Models\TrainingContent;
use App\Models\VideoCategory;

class TrainingContentController extends Controller
{

    public function getTrainingContentManagement()
    {
        $trainingContents = TrainingContent::all();
        $trainingCategories = VideoCategory::all();

        return view('admins.training-content-management')->with(['trainingContents' => $trainingContents,'trainingCategories'=>$trainingCategories]);
    }

    public function createTrainingContent(Request $request)
    {
        if(!$request->hasFile($request->input('cover-image')))
            return redirect()->back()->withErrors('Choose a file to upload first');

        $file = $request->file('cover-image');
        $extension = $file->getClientOriginalExtension();
        //dd($extension);
        if($extension === 'pdf')
            return redirect()->back()->withErrors('File format not support!');
        if($extension === 'exe')
            return redirect()->back()->withErrors('File format not support!');

        $file->store('/public/coverImages/');
        //Storage::disk('local')->putFileAs($file->getFilename().'.'.$extension,  File::get($file),'public');

		$trainingContent = new TrainingContent();
		$trainingContent->title = $request->input('title');
		$trainingContent->video_category_id = $request->input('video_category_id');
		$trainingContent->type = $request->input('type');
		$trainingContent->url = $request->input('url');
        $trainingContent->content = $request->input('content');
        $trainingContent->user_id = Auth::user()->id;
		$trainingContent->cover_image = $file->hashName(); //$file->getFilename().'.'.$extension;
 
		$trainingContent->save();
        return redirect()->back()->withSuccess('Training Content Successfully created!');
    }

    public function editTrainingContent($id)
    {
        try {
            $trainingContent = TrainingContent::findOrFail($id);

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

    public function updateTrainingContent(TrainingRequest $request, $id)
    {
        $trainingContent = TrainingContent::findOrFail($id);

        $trainingContent->update([
            'title' => $request->input('title'),
            'video_category_id' => $request->input('category_id'),
            'type' => $request->input('type'),
            'content' => $request->input('content')
        ]);

        return redirect()->back()->withInfo('Training Video Successfully updated!');
    }

    public function deleteTrainingContent($id)
    {
        try {
            $trainingContent = TrainingContent::findOrFail($id);
            Storage::delete('/public/coverImages/'.$trainingContent->cover_image);
            $trainingContent->delete();

            return response()->json([
                'data' => 'Training Video Successfully deleted!',
                'status' => 'success'
            ]);

        }catch(\Exception $e){
            return response()->json([
                'data' => 'Training Content can not be located!',
                'status' => 'error'
            ]);
        }
    }
}
