<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BerandaModel;
use App\Models\SidebarMenuModel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class BerandaController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Daftar Beranda',
            'list' => ['Home', 'beranda']
        ];

        $page = (object)[
            'title' => 'Daftar beranda',
        ];

        $user = Auth::user(); // Get the logged-in user
        $menus = SidebarMenuModel::where('id_group', $user->id_group)
            ->orderBy('level', 'asc')
            ->orderBy('parent_id', 'asc')
            ->get();

        $activeMenu = 'beranda';

        return view('member.beranda.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'menus' => $menus]);
    }

    public function list(Request $request)
    {
        $beranda = BerandaModel::select('id_beranda', 'judul', 'judul_eng', 'deskripsi', 'deskripsi_eng');

        return DataTables::of($beranda)
            ->addIndexColumn() // Adds the index/row number column (DT_RowIndex)
            ->addColumn('aksi', function ($beranda) {
                $btn = '<a href="' . url('/member/beranda/' . $beranda->id_beranda) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/member/beranda/' . $beranda->id_beranda  . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/member/beranda/' . $beranda->id_beranda) . '">' . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })

            ->rawColumns(['aksi']) // Specify that 'gambar', 'gambar_eng', and 'aksi' columns contain raw HTML
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object)[
            'title' => 'Tambah beranda',
            'list' => ['Home', 'Beranda', 'Tambah']
        ];

        $page = (object)[
            'title' => 'Tambah Beranda Baru',
        ];

        $user = Auth::user(); // Get the logged-in user
        $menus = SidebarMenuModel::where('id_group', $user->id_group)
            ->orderBy('level', 'asc')
            ->orderBy('parent_id', 'asc')
            ->get();

        $activeMenu = 'beranda';

        return view('member.beranda.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'menus' => $menus]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required | string | max:255',
            'judul_eng' => 'required | string | max:255',
            'deskripsi' => 'required | string | max:255',
            'deskripsi_eng' => 'required | string | max:255',

        ]);

        berandaModel::create([
            'judul' => $request->judul,
            'judul_eng' => $request->judul_eng,
            'deskripsi' => $request->deskripsi,
            'deskripsi_eng' => $request->deskripsi_eng,

        ]);

        return redirect('/member/beranda')->with('success', 'Data berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $beranda = BerandaModel::find($id);

        $breadcrumb = (object)[
            'title' => 'Detail beranda',
            'list' => ['Home', 'beranda', 'Detail']
        ];

        $page = (object)[
            'title' => 'Detail Beranda',
        ];

        $user = Auth::user(); // Get the logged-in user
        $menus = SidebarMenuModel::where('id_group', $user->id_group)
            ->orderBy('level', 'asc')
            ->orderBy('parent_id', 'asc')
            ->get();

        $activeMenu = 'beranda';

        return view('member.beranda.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'beranda' => $beranda, 'activeMenu' => $activeMenu, 'menus' => $menus]);
    }

    public function edit(string $id)
    {
        $beranda = BerandaModel::find($id);

        $breadcrumb = (object)[
            'title' => 'Edit Beranda',
            'list' => ['Home', 'Beranda', 'Edit']
        ];

        $page = (object)[
            'title' => 'Edit Beranda',
        ];

        $user = Auth::user(); // Get the logged-in user
        $menus = SidebarMenuModel::where('id_group', $user->id_group)
            ->orderBy('level', 'asc')
            ->orderBy('parent_id', 'asc')
            ->get();

        $activeMenu = 'beranda';

        return view('member.beranda.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'beranda' => $beranda, 'activeMenu' => $activeMenu, 'menus' => $menus]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required | string | max:255',
            'judul_eng' => 'required | string | max:255',
            'deskripsi' => 'required | string | max:255',
            'deskripsi_eng' => 'required | string | max:255',
        ]);

        BerandaModel::find($id)->update([
            'judul' => $request->judul,
            'judul_eng' => $request->judul_eng,
            'deskripsi' => $request->deskripsi,
            'deskripsi_eng' => $request->deskripsi_eng,
        ]);

        return redirect('/member/beranda')->with('success', 'Data berhasil diubah!');;
    }

    public function destroy($id)
    {
        $check = BerandaModel::find($id);
        if (!$check) {
            return redirect('/member/beranda')->with('error', 'Data tidak ditemukan!');
        }

        try {
            BerandaModel::destroy($id);
            return redirect('/member/beranda')->with('success', 'Data berhasil dihapus!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/member/beranda')->with('error', 'Data gagal dihapus! masih terdapat tabel lain yang terikat dengan data ini!');
        }
    }
}
