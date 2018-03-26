<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;

class LikeController extends Controller
{
    public function likeTrainingContent($id)
    {
        // here you can check if Training content exists or is valid or whatever
        try{
            $this->handleLike('App\Models\TrainingContent', $id);
            return response()->json(['status'=>'success']);
            //return redirect()->back();
        }catch(\Exception $e){}
        
    }
    public function likeDownload($id)
    {
        // here you can check if Training content exists or is valid or whatever
        try{
            $this->handleLike('App\Models\Download', $id);
            return response()->json(['status'=>'success']);
            //return redirect()->back();
        }catch(\Exception $e){}
        
    }

    public function handleLike($type, $id)
    {
        $existing_like = Like::withTrashed()->whereLikeableType($type)->whereLikeableId($id)->whereUserId(Auth::id())->first();

        if (is_null($existing_like)) {
            Like::create([
                'user_id'       => Auth::id(),
                'likeable_id'   => $id,
                'likeable_type' => $type,
            ]);
        } else {
            if (is_null($existing_like->deleted_at)) {
                $existing_like->delete();
            } else {
                $existing_like->restore();
            }
        }
    }
}
