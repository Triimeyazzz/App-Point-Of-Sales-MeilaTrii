<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::orderBy('id', 'asc');

        if (request()->ajax()) {
            return datatables()->of($users)
                ->addIndexColumn()
                ->addColumn('name', function ($data) {
                    return view('users._namefield', compact('data'));
                })
                ->addColumn('role', function ($data) {
                    return view('users._role', compact('data'));
                })
                ->addColumn('actions', function ($data) {
                    return view('users._actions', compact('data'));
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $user = User::find($id);

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $input = $request->all();

        $user = User::find($id);

        if($request->hasFile('photo')){
            $input['photo'] = $request->file('photo')->store('users', 'public');
        }

        if($input['password'] == null){
            unset($input['password']);
        }else{
            $input['password'] = Hash::make($input['password']);
        }
        $user->update($input);

        return redirect()->route('users.index')->with('success', 'User has been successfully changed.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $user = User::find($id);

        $user->delete();

        return redirect()->back()->with('success', 'User has been successfully deleted.');
    }
}
