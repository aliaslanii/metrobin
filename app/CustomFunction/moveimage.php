<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

// move insert img
function moveimg($request,$path)
{
    if($request->img)
    {
        $extension =$request->img->extension();
        $img = verta()->format('Ymd-hms')."-".random_int(100000, 999999).".".$extension;
        $request->img->move(public_path($path),$img);
        return $img;
    }
}

// move Movie
function moveMovie($TempFile)
{
    $FilePath = $TempFile->File;
    File::copy(storage_path('app/Movies/temp/' . $TempFile->Folder . '/'. $TempFile->File),'Movies/'.$TempFile->File);
    Storage::deleteDirectory('Movies/temp/'.$TempFile->Folder);
    $TempFile->delete();
    return $FilePath;
}

function deleteimgHome($Asset)
{
    if($Asset->image != null)
    {
        File::delete('images/Home-image/'.$Asset->image);
    }
}