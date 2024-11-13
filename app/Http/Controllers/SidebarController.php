<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SidebarMenuModel;
use Yajra\DataTables\Facades\DataTables;

class SidebarController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Daftar Menu',
            'list' => ['Home', 'Sidebar Menu']
        ];

        $page = (object)[
            'title' => 'Daftar Menu',
        ];

        $activeMenu = 'sidebar';

        $menus = SidebarMenuModel::orderBy('level', 'asc')
                            ->orderBy('parent_id', 'asc')
                            ->get();
 
        return view('admin.sidebar_menu.index', ['breadcrumb' => $breadcrumb, 'menus' => $menus, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

    public function list(Request $request)
    {
        $sidebars = SidebarMenuModel::select('id_menu', 'level', 'parent_id', 'label', 'link');

        return DataTables::of($sidebars)
            ->addIndexColumn() // menambahkan kolom index / no urut (default name kolom: DT_RowIndex)
            ->addColumn('aksi', function ($sidebar) { // menambahkan kolom aksi
                $btn = '<a href="' . url('/admin/sidebar/' . $sidebar->id_menu) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/admin/sidebar/' . $sidebar->id_menu . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/admin/sidebar/' . $sidebar->id_menu) . '">' . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger btn-sm"onclick="return confirm(\'Apakah Anda yakit menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
            ->make(true);
    }

    public function create(){
        $breadcrumb = (object)[
            'title' => 'Tambah Menu',
            'list' => ['Home', 'Sidebar Menu', 'Tambah']
        ];

        $page = (object)[
            'title' => 'Tambah Menu Baru',
        ];

        $menus = SidebarMenuModel::orderBy('level', 'asc')
        ->orderBy('parent_id', 'asc')
        ->get();

        $menuss = SidebarMenuModel::whereNull('parent_id')->get();

        $activeMenu = 'sidebar';

        return view('admin.sidebar_menu.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'menuss' => $menuss, 'menus' => $menus]);
    }

    public function store(Request $request){
        $request->validate([
            'parent_id' => 'nullable | int',
            'label' => 'required | string',
            'link' => 'nullable | string',
        ]);

        $level = $request->parent_id ? 2 : 1;

        SidebarMenuModel::create([
            'level' => $level,
            'parent_id' => $request->parent_id ? $request->parent_id : null, // Set to NULL if empty
            'label' => $request->label,
            'link' => $request->link ? $request->link : null, // Set to NULL if empty
        ]);

        return redirect('/admin/sidebar')->with('success', 'Data berhasil ditambahkan');
    }

    public function show(string $id){
        $sidebar = SidebarMenuModel::find($id);

        $breadcrumb = (object)[
            'title' => 'Detail Menu',
            'list' => ['Home', 'Sidebar Menu', 'Detail']
        ];

        $page = (object)[
            'title' => 'Detail Menu',
        ];

        $menus = SidebarMenuModel::orderBy('level', 'asc')
                            ->orderBy('parent_id', 'asc')
                            ->get();

        $activeMenu = 'sidebar';

        return view('admin.sidebar_menu.show', ['breadcrumb' => $breadcrumb, 'menus' => $menus,'page' => $page, 'sidebar' => $sidebar, 'activeMenu' => $activeMenu]);
    }

    public function edit(string $id){
        $sidebar = SidebarMenuModel::find($id);

        $breadcrumb = (object)[
            'title' => 'Edit Menu',
            'list' => ['Home', 'Sidebar Menu', 'Edit']
        ];

        $page = (object)[
            'title' => 'Edit Menu',
        ];

        $menus = SidebarMenuModel::orderBy('level', 'asc')
                                ->orderBy('parent_id', 'asc')
                                ->get();

        $menuss = SidebarMenuModel::whereNull('parent_id')->get();

        $activeMenu = 'sidebar';

        return view('admin.sidebar_menu.edit', ['breadcrumb' => $breadcrumb, 'menus' => $menus, 'menuss' => $menuss, 'page' => $page, 'sidebar' => $sidebar, 'activeMenu' => $activeMenu]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'parent_id' => 'nullable | int',
            'label' => 'required | string',
            'link' => 'nullable | string',
        ]);

        $level = $request->parent_id ? 2 : 1;

        SidebarMenuModel::find($id)->update([
            'level' => $level,
            'parent_id' => $request->parent_id,
            'label' => $request->label,
            'link' => $request->link,
        ]);

        return redirect('/admin/sidebar')->with('success', 'Data berhasil diubah!');;
    }

    public function destroy($id)
    {
        $check = SidebarMenuModel::find($id);
        if(!$check){
            return redirect('/admin/sidebar')->with('error', 'Data tidak ditemukan!');
        }

        try{
            SidebarMenuModel::destroy($id);
            return redirect('/admin/sidebar')->with('success', 'Data berhasil dihapus!');
        }catch(\Illuminate\Database\QueryException $e){
            return redirect('/admin/sidebar')->with('error', 'Data gagal dihapus! masih terdapat tabel lain yang terikat dengan data ini!');
        }
    }

    // public function getSidebarData(){
    //     // Fetch all menus sorted by level and parent_id
    //     $menus = SidebarMenuModel::orderBy('level', 'asc')
    //                             ->orderBy('parent_id', 'asc')
    //                             ->get();
    //     return $menus;  // Return the menus so it can be used in the views
    // }
}
