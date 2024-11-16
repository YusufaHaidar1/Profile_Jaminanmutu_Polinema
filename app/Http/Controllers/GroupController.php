<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GroupModel;
use App\Models\SidebarMenuModel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Daftar Group',
            'list' => ['Home', 'Group']
        ];

        $page = (object)[
            'title' => 'Daftar Group',
        ];

        $user = Auth::user(); // Get the logged-in user
        $menus = SidebarMenuModel::where('id_group', $user->id_group)
                    ->orderBy('level', 'asc')
                    ->orderBy('parent_id', 'asc')
                    ->get();

        $activeMenu = 'group';

        return view('admin.group.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'menus' => $menus]);
    }

    public function list(Request $request)
    {
        $groups = GroupModel::select('id_group', 'name', 'description'); 
        return DataTables::of($groups)
            ->addIndexColumn() // menambahkan kolom index / no urut (default name kolom: DT_RowIndex)
            ->addColumn('aksi', function ($group) { // menambahkan kolom aksi
                $btn = '<a href="' . url('/admin/group/' . $group->id_group) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/admin/group/' . $group->id_group . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/admin/group/' . $group->id_group) . '">' . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger btn-sm"onclick="return confirm(\'Apakah Anda yakit menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
            ->make(true);
    }

    public function create(){
        $breadcrumb = (object)[
            'title' => 'Tambah Group',
            'list' => ['Home', 'Group', 'Tambah']
        ];

        $page = (object)[
            'title' => 'Tambah Group Baru',
        ];

        $user = Auth::user(); // Get the logged-in user
        $menus = SidebarMenuModel::where('id_group', $user->id_group)
                    ->orderBy('level', 'asc')
                    ->orderBy('parent_id', 'asc')
                    ->get();

        $activeMenu = 'group';

        return view('admin.group.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'menus' => $menus]);
    }

    public function store(Request $request){
        $request->validate([
            'name' =>'required | string | max:150',
            'description' => 'required | string | max:255',
        ]);

        GroupModel::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect('/admin/group')->with('success', 'Data berhasil ditambahkan');
    }

    public function show(string $id){
        $group = GroupModel::find($id);

        $breadcrumb = (object)[
            'title' => 'Detail Group',
            'list' => ['Home', 'Group', 'Detail']
        ];

        $page = (object)[
            'title' => 'Detail Group',
        ];

        $user = Auth::user(); // Get the logged-in user
        $menus = SidebarMenuModel::where('id_group', $user->id_group)
                    ->orderBy('level', 'asc')
                    ->orderBy('parent_id', 'asc')
                    ->get();

        $activeMenu = 'group';

        return view('admin.group.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'group' => $group, 'activeMenu' => $activeMenu, 'menus' => $menus]);
    }

    public function edit(string $id){
        $group = GroupModel::find($id);

        $breadcrumb = (object)[
            'title' => 'Edit Group',
            'list' => ['Home', 'Group', 'Edit']
        ];

        $page = (object)[
            'title' => 'Edit Group',
        ];

        $user = Auth::user(); // Get the logged-in user
        $menus = SidebarMenuModel::where('id_group', $user->id_group)
                    ->orderBy('level', 'asc')
                    ->orderBy('parent_id', 'asc')
                    ->get();

        $activeMenu = 'group';

        return view('admin.group.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'group' => $group, 'activeMenu' => $activeMenu, 'menus' => $menus]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'required|string|max:255',
        ]);

        GroupModel::find($id)->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect('/admin/group')->with('success', 'Data berhasil diubah!');;
    }

    public function destroy($id)
    {
        $check = GroupModel::find($id);
        if(!$check){
            return redirect('/admin/group')->with('error', 'Data tidak ditemukan!');
        }

        try{
            GroupModel::destroy($id);
            return redirect('/admin/group')->with('success', 'Data berhasil dihapus!');
        }catch(\Illuminate\Database\QueryException $e){
            return redirect('/admin/group')->with('error', 'Data gagal dihapus! masih terdapat tabel lain yang terikat dengan data ini!');
        }
    }
}
