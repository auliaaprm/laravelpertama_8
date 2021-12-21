<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Friends;
use App\Models\Groups;


class CobaController extends Controller
{
    
    public function index()
    {
        $friends = Friends::orderBy('id', 'desc')->paginate(3);
        return view('friends.index', compact('friends'));
    }
    public function create()
    {
        return view('friends.create');
    }
    public function store(Request $request)
    {
        // validate the request...
        $request->validate([
            'nama' => 'required|unique:friends|max:255',
            'no_tlp' => 'required|numeric',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'instagram' => 'required',
        ]);

        $friends = new Friends;

        $friends->groups_id = $request->groups_id;
        $friends->nama = $request->nama;
        $friends->no_tlp = $request->no_tlp;
        $friends->alamat = $request->alamat;
        $friends->jenis_kelamin = $request->jenis_kelamin;
        $friends->instagram = $request->instagram;

        $friends->save();

        return redirect('/');
    }
    public function show($id)
    {
        $friends = Friends::where('id', $id)->first();
        return view('friends.show', ['friend' => $friends]);
    }
    public function edit($id)
    {
        $friends = Friends::where('id', $id)->first();
        return view('friends.edit', ['friend' => $friends]);
    }
    public function update(Request $request, $id)
    {
    $request->validate([
        'nama' => 'required|unique:friends|max:255',
        'no_tlp' => 'required|numeric',
        'alamat' => 'required',
        'jenis_kelamin' => 'required',
        'instagram' => 'required',
    ]);

    Friends::find($id)->update([
        'nama' => $request->nama,
        'no_tlp' => $request->no_tlp,
        'alamat' => $request->alamat,
        'jenis_kelamin' => $request->jenis_kelamin,
        'instagram' => $request->instagram
    ]);

    return redirect('/');
    }
    public function destroy($id)
    {
        Friends::find($id)->delete();
        return redirect('/');
    }

}