<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AkreditasiModel;
use App\Models\SidebarMenuModel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class AkreditasiController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Daftar Akreditasi',
            'list' => ['Home', 'Akreditasi']
        ];

        $page = (object)[
            'title' => 'Daftar Akreditasi',
        ];

        $user = Auth::user(); // Get the logged-in user
        $menus = SidebarMenuModel::where('id_group', $user->id_group)
                    ->orderBy('level', 'asc')
                    ->orderBy('parent_id', 'asc')
                    ->get();

        $activeMenu = 'akreditasi';

        return view('member.akreditasi.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'menus' => $menus]);
    }

    public function list(Request $request)
    {
        $akreditasi = AkreditasiModel::select('id_akreditasi','jenjang','sk','nama','nama_eng','skor','masa_berlaku_dari','masa_berlaku_sampai','dokumen');

        return DataTables::of($akreditasi)
            ->addIndexColumn() // menambahkan kolom index / no urut (default name kolom: DT_RowIndex)
            ->addColumn('aksi', function ($akreditasi) { // menambahkan kolom aksi
                $btn = '<a href="' . url('/member/akreditasi/' . $akreditasi->id_akreditasi) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/member/akreditasi/' . $akreditasi->id_akreditasi . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/member/akreditasi/' . $akreditasi->id_akreditasi) . '">' . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger btn-sm"onclick="return confirm(\'Apakah Anda yakit menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
            ->make(true);
    }

    public function create(){
        $breadcrumb = (object)[
            'title' => 'Tambah Akreditasi',
            'list' => ['Home', 'Akreditasi', 'Tambah']
        ];

        $page = (object)[
            'title' => 'Tambah Akreditasi Baru',
        ];

        $user = Auth::user(); // Get the logged-in user
        $menus = SidebarMenuModel::where('id_group', $user->id_group)
                    ->orderBy('level', 'asc')
                    ->orderBy('parent_id', 'asc')
                    ->get();

        $activeMenu = 'akreditasi';

        return view('member.akreditasi.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'menus' => $menus]);
    }

    public function store(Request $request){
        $request->validate([
            'jenjang' =>'required | string | max:150',
            'sk' => 'required | string | max:255',
            'nama' => 'required | string | max:255',
            'nama_eng' => 'required | string | max:255',
            'skor' => 'required | string | max:255',
            'masa_berlaku_dari' => 'required | string | max:255',
            'masa_berlaku_sampai' => 'required | string | max:255',
            'dokumen' => 'required | string | max:255',
        ]);

        AkreditasiModel::create([
            'jenjang' => $request-> jenjang,
            'sk' => $request-> sk ,
            'nama' => $request-> nama ,
            'nama_eng' => $request-> nama_eng ,
            'skor' => $request->skor ,
            'masa_berlaku_dari' => $request-> masa_berlaku_dari ,
            'masa_berlaku_sampai' => $request-> masa_berlaku_sampai, 
            'dokumen' => $request-> dokumen 
        ]);

        return redirect('/member/akreditasi')->with('success', 'Data berhasil ditambahkan');
    }

    public function show(string $id_akreditasi){
        $akreditasi = AkreditasiModel::find($id_akreditasi);

        $breadcrumb = (object)[
            'title' => 'Detail Akreditasi',
            'list' => ['Home', 'Akreditasi', 'Detail']
        ];

        $page = (object)[
            'title' => 'Detail Akreditasi',
        ];

        $user = Auth::user(); // Get the logged-in user
        $menus = SidebarMenuModel::where('id_group', $user->id_group)
                    ->orderBy('level', 'asc')
                    ->orderBy('parent_id', 'asc')
                    ->get();

        $activeMenu = 'akreditasi';

        return view('member.akreditasi.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'akreditasi' => $akreditasi, 'activeMenu' => $activeMenu, 'menus' => $menus]);
    }

    public function edit(string $id){
        $akreditasi = AkreditasiModel::find($id);

        $breadcrumb = (object)[
            'title' => 'Edit Group',
            'list' => ['Home', 'Akreditasi', 'Edit']
        ];

        $page = (object)[
            'title' => 'Edit Akreditasi',
        ];

        $user = Auth::user(); // Get the logged-in user
        $menus = SidebarMenuModel::where('id_group', $user->id_group)
                    ->orderBy('level', 'asc')
                    ->orderBy('parent_id', 'asc')
                    ->get();

        $activeMenu = 'akreditasi';

        return view('member.akreditasi.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'akreditasi' => $akreditasi, 'activeMenu' => $activeMenu, 'menus' => $menus]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'jenjang' =>'required | string | max:150',
            'sk' => 'required | string | max:255',
            'nama' => 'required | string | max:255',
            'nama_eng' => 'required | string | max:255',
            'skor' => 'required | string | max:255',
            'masa_berlaku_dari' => 'required | string | max:255',
            'masa_berlaku_sampai' => 'required | string | max:255',
            'dokumen' => 'required | string | max:255',
        ]);

        AkreditasiModel::find($id)->update([
            'jenjang' => $request-> jenjang,
            'sk' => $request-> sk ,
            'nama' => $request-> nama ,
            'nama_eng' => $request-> nama_eng ,
            'skor' => $request->skor ,
            'masa_berlaku_dari' => $request-> masa_berlaku_dari ,
            'masa_berlaku_sampai' => $request-> masa_berlaku_sampai, 
            'dokumen' => $request-> dokumen 
        ]);

        return redirect('/member/akreditasi')->with('success', 'Data berhasil diubah!');;
    }

    public function destroy($id)
    {
        $check = AkreditasiModel::find($id);
        if(!$check){
            return redirect('/member/akreditasi')->with('error', 'Data tidak ditemukan!');
        }

        try{
            AkreditasiModel::destroy($id);
            return redirect('/member/akreditasi')->with('success', 'Data berhasil dihapus!');
        }catch(\Illuminate\Database\QueryException $e){
            return redirect('/member/akreditasi')->with('error', 'Data gagal dihapus! masih terdapat tabel lain yang terikat dengan data ini!');
        }
    }
}
