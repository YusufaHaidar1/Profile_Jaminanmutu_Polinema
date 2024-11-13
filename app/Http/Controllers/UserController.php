<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\GroupModel;
use App\Models\UserModel;
use App\Models\SidebarMenuModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{

    public function index()
    {

        $breadcrumb = (object)[
            'title' => 'Daftar User',
            'list' => ['Home', 'User']
        ];

        $page = (object)[
            'title' => 'Daftar User dalam sistem',
        ];

        $menus = SidebarMenuModel::orderBy('level', 'asc')
                            ->orderBy('parent_id', 'asc')
                            ->get();

        $activeMenu = 'user';
        $group = GroupModel::all();

        return view('admin.user.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'group' => $group, 'activeMenu' => $activeMenu, 'menus' => $menus]);
    }

    public function list(Request $request)
    {
        $users = UserModel::select('id_user', 'nama', 'email', 'no_hp', 'id_group')
                    ->with('group');

        if ($request->id_group) {
            $users->where('id_group', $request->id_group);
        }
        
        return DataTables::of($users)
            ->addIndexColumn() // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addColumn('aksi', function ($user) { // menambahkan kolom aksi
                $btn = '<a href="'.url('/admin/user/' . $user->id_user).'" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="'.url('/admin/user/' . $user->id_user . '/edit').'" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="'.url('/admin/user/'.$user->id_user).'">'. csrf_field() . method_field('DELETE') .'<button type="submit" class="btn btn-danger btn-sm"onclick="return confirm(\'Apakah Anda yakit menghapus data ini?\');">Hapus</button></form>';
            return $btn;
        })
        ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
        ->make(true);
    }

    public function create(){
        $breadcrumb = (object)[
            'title' => 'Tambah User',
            'list' => ['Home', 'User', 'Tambah']
        ];

        $page = (object)[
            'title' => 'Tambah User Baru',
        ];

        $menus = SidebarMenuModel::orderBy('level', 'asc')
                            ->orderBy('parent_id', 'asc')
                            ->get();

        $activeMenu = 'user';
        $group = GroupModel::all();

        return view('admin.user.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'group' => $group, 'activeMenu' => $activeMenu, 'menus' => $menus]);
    }

    public function store(Request $request){
        $request->validate([
            'nama' =>'required | string | max:100',
            'email' =>'required | string | unique:users,email',
            'no_hp' =>'required | string',
            'password' => 'required | min:5',
            'id_group' =>'required | integer'
        ]);

        UserModel::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'password' => bcrypt($request->password),
            'id_group' => $request->id_group
        ]);

        return redirect('/admin/user')->with('success', 'Data berhasil ditambahkan');
    }

    public function show(string $id){
        $user = UserModel::with('group')->find($id);

        $breadcrumb = (object)[
            'title' => 'Detail User',
            'list' => ['Home', 'User', 'Detail']
        ];

        $page = (object)[
            'title' => 'Detail User',
        ];

        $menus = SidebarMenuModel::orderBy('level', 'asc')
                            ->orderBy('parent_id', 'asc')
                            ->get();

        $activeMenu = 'user';

        return view('admin.user.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'activeMenu' => $activeMenu, 'menus' => $menus]);
    }

    public function edit(string $id){
        $user = UserModel::find($id);
        $group = GroupModel::all();

        $breadcrumb = (object)[
            'title' => 'Edit User',
            'list' => ['Home', 'User', 'Edit']
        ];

        $page = (object)[
            'title' => 'Edit User',
        ];

        $menus = SidebarMenuModel::orderBy('level', 'asc')
                            ->orderBy('parent_id', 'asc')
                            ->get();

        $activeMenu = 'user';

        return view('admin.user.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'group' => $group, 'activeMenu' => $activeMenu, 'menus' => $menus]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'nama' =>'required | string | max:100',
            'email' =>'required | string | unique:users,email,'.$id. ',id_user',
            'no_hp' =>'required | string',
            'password' => 'nullable | min:5',
            'id_group' =>'required | integer'
        ]);

        UserModel::find($id)->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'password' => $request->password? bcrypt($request->password) : UserModel::find($id)->password,
            'id_group' => $request->id_group
        ]);

        return redirect('/admin/user')->with('success', 'Data berhasil diubah!');;
    }

    public function destroy($id)
    {
        $check = UserModel::find($id);
        if(!$check){
            return redirect('/admin/user')->with('error', 'Data tidak ditemukan!');
        }

        try{
            UserModel::destroy($id);
            return redirect('/admin/user')->with('success', 'Data berhasil dihapus!');
        }catch(\Illuminate\Database\QueryException $e){
            return redirect('/admin/user')->with('error', 'Data gagal dihapus! masih terdapat tabel lain yang terikat dengan data ini!');
        }
    }
}

