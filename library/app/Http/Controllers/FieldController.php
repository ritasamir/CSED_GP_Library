<?php

namespace App\Http\Controllers;

use App\Field;
use App\Notifications\commentNotification;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class FieldController extends Controller
{
    //
    public function store(Request $data)
    {

        Field::create([
            'fname' => $data->get('fname')
        ]);
        return redirect()->back();

    }

}
