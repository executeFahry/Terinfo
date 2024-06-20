<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('backend.content.user.list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.content.user.formTambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'role' => 'required',
        ]);

        $users = new User();
        $users->name = $request->name;
        $users->role = $request->role;
        $users->email = $request->email;
        $users->password = bcrypt('password');

        try {
            $users->save();
            return redirect()->route('admin.user.index')->with('pesan', ['success', 'User berhasil ditambahkan']);
        } catch (\Exception $e) {
            return redirect()->route('admin.user.index')->with('pesan', ['danger', 'User gagal ditambahkan']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::findOrFail($id);
        return view('backend.content.user.formUbah', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'name' => 'required',
            'role' => 'required',
            'email' => 'required|email',
        ]);

        $user = User::findOrFail($request->id);
        $user->name = $request->name;
        $user->role = $request->role;
        $user->email = $request->email;

        try {
            $user->save();
            return redirect()->route('admin.user.index')->with('pesan', ['success', 'User berhasil diubah']);
        } catch (\Exception $e) {
            return redirect()->route('admin.user.index')->with('pesan', ['danger', 'User gagal diubah']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::findOrFail($id);

        try {
            $users->delete();
            return redirect()->route('admin.user.index')->with('pesan', ['success', 'User berhasil dihapus']);
        } catch (\Exception $e) {
            return redirect()->route('admin.user.index')->with('pesan', ['danger', 'User gagal dihapus']);
        }
    }
}
