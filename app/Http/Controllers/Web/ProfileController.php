<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return view('page.web.profile.list');
        }
        return view('page.web.profile.main');
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function edit()
    {

    }
    public function update(Request $request)
    {
        //
    }
    public function destroy()
    {
        //
    }
    public function deactivate()
    {
        //
    }
}