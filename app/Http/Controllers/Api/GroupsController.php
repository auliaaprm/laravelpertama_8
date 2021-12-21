<?php

namespace App\Http\Controllers;

use App\Models\Groups;
use App\Models\Friends;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Groups::orderBy('id', 'desc')->paginate(3);
        return response()->json([
            'success' => true,
            'message' => 'Daftar Groups',
            'data' => $groups,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:groups|max:255',
            'description' => 'required',
        ]);
        
        $groups = Groups::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        if($groups)
        {
            return response()->json([
                'success' => true,
                'message' => 'Group berhasil ditambahkan',
                'data' => $groups,
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Group gagal ditambahkan',
                'data' => $groups,
            ], 409);
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
        $group = Groups::where('id', $id)->first();

        return response()->json([
            'success' => true,
            'message' => 'Detail Group',
            'data' => $group,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $group = Groups::find($id)
        ->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Data group berhasil diubah',
            'data' => $group,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Groups::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data group berhasil dihapus',
            'data' => $friend,
        ], 200);
    }

    public function addmember($id)
    {
        $friend = Friends::where('groups_id', '=', 0)->get();
        $group = Groups::where('id', $id)->first();
        return response()->json([
            'success' => true,
            'message' => 'Anggota berhasil ditambahkan',
            'data' => $friend,
        ], 200);
    }

    public function updateaddmember(Request $request, $id)
    {
        $friend = Friends::where('id', $request->friend_id)->first();
        Friends::find($friend->id)->update([
            'groups_id' => $id,
        ]);
    
        return response()->json([
            'success' => true,
            'message' => 'Data group berhasil dihapus',
            'data' => $friend,
        ], 200);
    }

    public function deleteaddmember(Request $request, $id)
    {
        Friends::find($id)->update([
            'groups_id' => 0
        ]);
    
        return response()->json([
            'success' => true,
            'message' => 'Data Teman Berhasil Dihapus',
            'data' => $friend,
        ], 200);
    }
}
