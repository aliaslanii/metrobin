<?php

use App\Models\Genre;

function Geners()
{
    return Genre::where('delete_at','=',null)->get();
}