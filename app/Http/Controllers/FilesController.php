<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
    private $img_ext = ['jpg', 'png', 'jpeg', 'gif', 'JPG', 'PNG', 'JPEG', 'GIF'];
    private $video_ext = ['mp4', 'avi', 'mpeg', 'MP4', 'AVI', 'MPEG'];
    private $document_ext = ['doc', 'docx', 'pdf', 'odt', 'DOC', 'DOCX', 'PDF', 'ODT'];
    private $audio_ext = ['mp3', 'mpga', 'wma', 'ogg', 'MP3', 'MPGA', 'WMA', 'OGG'];

    public function __construct(){
        $this->middleware('auth');
    }

    public function create(){
        return view('admin.files.create');
    }

    public function store(Request $request){
        $max_size = (int)ini_get('upload_max_filesize') * 1000;
        $all_ext = implode(',', $this->allExtensions());

        $this->validate(request(), [
            'file' => 'required|file|mimes:' . $all_ext . '|max:' . $max_size
        ]);

        $uploadFile = new File();

        $file = $request->file('file');
        $name = time().$file->getClientOriginalExtension();
        $ext = $file->getClientOriginalExtension();
        $type = $this->getType($ext);

        if(Storage::putFileAs('/public/' . $this->getUserFolder() . '/' . $type . '/', $file, $name . '.' . $ext)){
            $uploadFile::create([
                'name'      => $name,
                'type'      => $type,
                'extension' => $ext,
                'user_id'   => Auth::id()
            ]);
        }

        return back()->with('info', ['success', 'El archivo se ha subido correctamente']);
    }

    private function getType($ext){
        if(in_array($ext, $this->img_ext))
        {
            return 'image';
        }
        if(in_array($ext, $this->video_ext))
        {
            return 'video';
        }
        if(in_array($ext, $this->document_ext))
        {
            return 'documento';
        }
        if(in_array($ext, $this->audio_ext))
        {
            return 'audio';
        }
    }

    private function allExtensions(){
        return array_merge($this->img_ext, $this->video_ext, $this->document_ext, $this->audio_ext);
    }

    private function getUserFolder(){
        return Auth::user()->name . '-' . Auth::id();
    }
}
