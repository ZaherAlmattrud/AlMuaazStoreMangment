<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use stdClass;

class testc extends Controller
{
    //
    public function test()
    {

        $products = [];
        $itess = new stdClass();
        $itess->id = 0;
        $itess->name = "teccccts";
        $products[] = $itess;

        $ite = new stdClass();
        $ite->id = 1;
        $ite->name = "tets";
        $products[] = $ite;
        $d = new stdClass();
        $d->id = 2;
        $d->name = "gggg";

        $products[] =  $d;


        return view('tables', compact('products'));
    }

    public function test2(){


    }
}
