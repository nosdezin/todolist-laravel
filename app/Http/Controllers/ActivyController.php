<?php

namespace App\Http\Controllers;

use App\Models\activity;
use Illuminate\Http\Request;

class ActivyController extends Controller
{
    function home()
    {
        $activies = activity::all();
        return view('welcome', ['activies' => $activies]);
    }

    function createActivy(Request $request)
    {
        try {
            activity::create([
                'title' => $request->title,
                'checked' => false
            ]);
            return redirect()->route('home');
        } catch (\Exception $e) {
            return 'deu error ' . $e->getMessage();
        }
    }

    function removeActivy($id)
    {
        try {
            activity::Find($id)->delete();
            return redirect()->route('home');
        } catch (\Exception $e) {
            return 'deu erro ' . $e->getMessage();
        }
    }

    function updateCheck($id, $isChecked)
    {
        try {
            $activy = activity::Find($id);
            $activy->checked = !$isChecked;
            $activy->save();
            return redirect()->route('home');
        } catch (\Exception $e) {
            return 'deu erro -> ' . $e->getMessage();
        }
    }
}
