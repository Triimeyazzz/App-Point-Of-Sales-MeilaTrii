<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

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
        $roles = Role::pluck('name', 'name')->all();

        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'confirm-password' => 'required|same:password',
        ]);

        if($request->hasFile('photo')){
            $input['photo'] = $request->file('photo')->store('users', 'public');
        }

        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);

        $user->assignRole('Admin');

        return redirect()->route('users.index')->with('success', 'Pengguna berhasil dibuat');
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

        $roles = Role::pluck('name', 'name')->all();

        return view('users.edit', compact('user', 'roles'));
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

        return redirect()->route('users.index')->with('success', 'Pengguna berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $user = User::find($id);

        $user->delete();

        return redirect()->back()->with('success', 'Pengguna berhasil di hapus');
    }
}
