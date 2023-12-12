<?php

use Illuminate\Support\Facades\File;
function updateActor($request,$Actor)
{
    if($request->img)
    { 
        $extension =$request->img->extension();
        $img = verta()->format('Ymd-hms')."-".random_int(100000, 999999).".".$extension;
        $request->img->move(public_path('images/Actorimages'),$img);
        File::delete('images/Actorimages/'.$Actor->img);
        return $img;
    }
    else
    {
        return $Actor->img;
    }
}

function updateDirector($request,$Director)
{
    if($request->img)
    { 
        $extension =$request->img->extension();
        $img = verta()->format('Ymd-hms')."-".random_int(100000, 999999).".".$extension;
        $request->img->move(public_path('images/Directorimages'),$img);
        File::delete('images/Directorimages/'.$Director->img);
        return $img;
    }
    else
    {
        return $Director->img;
    }
}
function getimgActor($img)
{
    return '<img class="img-thumbnail img-Berand-update" src="'.asset('images/Actorimages/'.$img).'" id="img-old">';
}
function getimgDirector($img)
{
    return '<img class="img-thumbnail img-Berand-update" src="'.asset('images/Directorimages/'.$img).'" id="img-old">';
}