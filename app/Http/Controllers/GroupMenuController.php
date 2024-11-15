<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GroupMenuModel;
use App\Models\SidebarMenuModel;
use App\Models\GroupModel;
use Yajra\DataTables\Facades\DataTables;

class GroupMenuController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Daftar Group Menu',
            'list' => ['Home', 'Group Menu']
        ];

        $page = (object)[
            'title' => 'Daftar Group Menu',
        ];

        $menus = SidebarMenuModel::orderBy('level', 'asc')
        ->orderBy('parent_id', 'asc')
        ->get();

        $activeMenu = 'groupmenu';

        return view('admin.group_menu.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'menus' => $menus]);
    }

    public function list(Request $request)
    {
        $groupmenus = GroupMenuModel::select('id_group_menu', 'id_group', 'id_menu')
                    ->with('group', 'menu');

        if ($request->id_group) {
             $groupmenus->where('id_group', $request->id_group);
        }

        if ($request->id_menu) {
            $groupmenus->where('id_menu', $request->id_menu);
       }

        return DataTables::of($groupmenus)
            ->addIndexColumn() // menambahkan kolom index / no urut (default name kolom: DT_RowIndex)
            ->addColumn('aksi', function ($groupmenu) { // menambahkan kolom aksi
                $btn = '<a href="' . url('/admin/group_menu/' . $groupmenu->id_group_menu . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/admin/group_menu/' . $groupmenu->id_group_menu) . '">' . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger btn-sm"onclick="return confirm(\'Apakah Anda yakit menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
            ->make(true);
    }

    public function create(){
        $breadcrumb = (object)[
            'title' => 'Tambah Group Menu',
            'list' => ['Home', 'Group Menu', 'Tambah']
        ];

        $page = (object)[
            'title' => 'Tambah Group Menu Baru',
        ];

        $menus = SidebarMenuModel::orderBy('level', 'asc')
        ->orderBy('parent_id', 'asc')
        ->get();

        $activeMenu = 'groupmenu';
        $group = GroupModel::all();
        $menu = SidebarMenuModel::all();

        return view('admin.group_menu.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'menus' => $menus, 'group' => $group, 'menu' => $menu]);
    }

    public function store(Request $request){
        $request->validate([
            'id_group' => 'required | integer',
            'id_menu' => 'required | integer',
        ]);

        GroupMenuModel::create([
            'id_group' => $request->id_group,
            'id_menu' => $request->id_menu,
        ]);

        return redirect('/admin/group_menu')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(string $id){
        $groupmenu = GroupMenuModel::find($id);

        $breadcrumb = (object)[
            'title' => 'Edit Group Menu',
            'list' => ['Home', 'Group Menu', 'Edit']
        ];

        $page = (object)[
            'title' => 'Edit Group Menu',
        ];

        $menus = SidebarMenuModel::orderBy('level', 'asc')
        ->orderBy('parent_id', 'asc')
        ->get();

        $activeMenu = 'groupmenu';
        $group = GroupModel::all();
        $menu = SidebarMenuModel::all();

        return view('admin.group_menu.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'groupmenu' => $groupmenu, 'activeMenu' => $activeMenu, 'menus' => $menus, 'group' => $group, 'menu' => $menu]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'id_group' => 'required | integer',
            'id_menu' => 'required | integer',
        ]);

        GroupMenuModel::find($id)->update([
            'id_group' => $request->id_group,
            'id_menu' => $request->id_menu,
        ]);

        return redirect('/admin/group_menu')->with('success', 'Data berhasil diubah!');;
    }

    public function destroy($id)
    {
        $check = GroupMenuModel::find($id);
        if(!$check){
            return redirect('/admin/group_menu')->with('error', 'Data tidak ditemukan!');
        }

        try{
            GroupMenuModel::destroy($id);
            return redirect('/admin/group_menu')->with('success', 'Data berhasil dihapus!');
        }catch(\Illuminate\Database\QueryException $e){
            return redirect('/admin/group_menu')->with('error', 'Data gagal dihapus! masih terdapat tabel lain yang terikat dengan data ini!');
        }
    }
}
