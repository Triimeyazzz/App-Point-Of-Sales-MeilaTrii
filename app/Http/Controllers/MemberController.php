<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $members = Member::with('user');

        if (request()->ajax()) {
            return datatables()->of($members)
                ->addIndexColumn()
                ->addColumn('name', function ($data) {
                    return view('member._namefield', compact('data'));
                })
                ->addColumn('email', function ($data) {
                    return $data->user->email;
                })
                ->addColumn('actions', function ($data) {
                    return view('member._actions', compact('data'));
                })
                ->rawColumns(['actions', 'name', 'role'])
                ->make(true);
        }

        return view('member.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('member.create');
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

        if ($request->hasFile('photo')) {
            $input['photo'] = $request->file('photo')->store('users', 'public');
        }

        $userUpdateData = [
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => bcrypt($input['password']),
        ];

        if (isset($input['photo'])) {
            $userUpdateData['photo'] = $input['photo'];
        }

        $user = User::create($userUpdateData);

        $user->assignRole('Member');

        $member = Member::create([
            'user_id' => $user->id,
            'no_hp' => $input['no_hp'],
            'alamat' => $input['alamat']
        ]);

        return redirect()->route('member.index')->with('success', 'Member berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        //
        return view('member.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        //
        $input = $request->all();

        if ($request->hasFile('photo')) {
            $input['photo'] = $request->file('photo')->store('users', 'public');
        } else {
            unset($input['photo']);
        }

        if ($input['password'] == null) {
            unset($input['password']);
        } else {
            $input['password'] = bcrypt($input['password']);
        }

        $userUpdateData = [
            'name' => $input['name'],
            'email' => $input['email'],
        ];

        if (isset($input['photo'])) {
            $userUpdateData['photo'] = $input['photo'];
        }

        $member->user->update($userUpdateData);

        $member->update([
            'no_hp' => $input['no_hp'],
            'alamat' => $input['alamat']
        ]);

        return redirect()->route('member.index')->with('success', 'Member berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        //
        $member->user->delete();
        $member->delete();

        return redirect()->back()->with('success', 'Member berhasil di hapus');
    }
}
