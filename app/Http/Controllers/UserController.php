<?php

namespace App\Http\Controllers;

use App\Models\VideoCategory;
use App\Models\Download;
use Response;
use File;

class UserController extends Controller
{
    public function getDashboard()
    {
        return view('users.dashboard');
    }

    public function getTrainingContent($tag)
    {
        $videoCat = VideoCategory::with('training_contents')->where('tag', $tag)->latest();

        $trainingContents = $videoCat->first()->training_contents;

        switch ($tag) {
            case 'fiml':
                return view('users.fiml-training')->with(['trainingContents' => $trainingContents]);
                break;

            case 'forex':

                return view('users.forex-training')->with(['trainingContents' => $trainingContents]);
                break;

            case 'binary':

                return view('users.binary-training')->with(['trainingContents' => $trainingContents]);
                break;
            case 'affiliate':

                return view('users.affiliate-training')->with(['trainingContents' => $trainingContents]);
                break;
            default:

            return;
        }
    }

    public function getDownloadContent($type)
    {
        switch ($type) {
            case 'pdf':
                    $downloadableContents = Download::where('file_extension', $type)->get();

                    return view('users.downloadable-documents')->with(['downloadableContents' => $downloadableContents]);
                break;
            case 'robot':
                $downloadableContents = Download::where('file_extension', '<>', 'pdf')->get();

                return view('users.downloadable-robots')->with(['downloadableContents' => $downloadableContents]);
                break;
            default:
            return;
        }
    }

    public function downloadFile($id)
    {
        //Get file
        $downloadContent = Download::findOrFail($id);
        if ($downloadContent->remote_url != null) {
            // Check for a better implementation

            //return Response::download($downloadContent->file_name, $downloadContent->file_name, ['location' => $downloadContent->remote_url]);

            return redirect($downloadContent->remote_url);
        }
        $file = storage_path('app/public/downloads/'.$downloadContent->file_extension.'/'.$downloadContent->path);

        return Response::download($file);
    }
}
