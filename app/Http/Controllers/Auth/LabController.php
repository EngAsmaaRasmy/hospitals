<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LabLoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LabController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(LabLoginRequest $request)
    {
        if( $request->authenticate()){
            $request->session()->regenerate();
            return redirect()->intended(RouteServiceProvider::LAB);
        }

        return redirect()->back()->withErrors(['name' => (trans('Dashboard/auth.failed'))]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Request $request)
    {
        Auth::guard('lab')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
