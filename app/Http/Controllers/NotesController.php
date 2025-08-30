<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Createnotes;
use Illuminate\Support\Facades\Hash;

class NotesController extends Controller
{
    function createTask(Request $request)
    {
          //validate first
          $request->validate([
            'title' => 'required|string',
            'content' => 'required',
        ]);
        Createnotes::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $request->user_id,
        ]);
        echo "success";die;
        return redirect()->route('dashboard')->with('success', 'Data saved successfully!');
    }
}