<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfileModel;
use App\Models\SidebarMenuModel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Daftar profile',
            'list' => ['Home', 'profile']
        ];

        $page = (object)[
            'title' => 'Daftar profile',
        ];

        $user = Auth::user(); // Get the logged-in user
        $menus = SidebarMenuModel::where('id_group', $user->id_group)
            ->orderBy('level', 'asc')
            ->orderBy('parent_id', 'asc')
            ->get();

        $activeMenu = 'profile';

        return view('member.profile.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'menus' => $menus]);
    }

    public function list(Request $request)
    {
        $groups = ProfileModel::select('id_profile', 'gambar', 'gambar_eng', 'judul', 'judul_eng', 'deskripsi', 'deskripsi_eng');

        return DataTables::of($groups)
            ->addIndexColumn() // menambahkan kolom index / no urut (default name kolom: DT_RowIndex)
            ->addColumn('aksi', function ($profile) { // menambahkan kolom aksi
                $btn = '<a href="' . url('/member/profile/' . $profile->id_profile) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/member/profile/' . $profile->id_profile . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/member/profile/' . $profile->id_profile) . '">' . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger btn-sm"onclick="return confirm(\'Apakah Anda yakit menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object)[
            'title' => 'Tambah Profile',
            'list' => ['Home', 'Profile', 'Tambah']
        ];

        $page = (object)[
            'title' => 'Tambah Profile Baru',
        ];

        $user = Auth::user(); // Get the logged-in user
        $menus = SidebarMenuModel::where('id_group', $user->id_group)
            ->orderBy('level', 'asc')
            ->orderBy('parent_id', 'asc')
            ->get();

        $activeMenu = 'profile';

        return view('member.profile.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'menus' => $menus]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required | string | max:150',
            'gambar_eng' => 'required | string | max:255',
            'judul' => 'required | string | max:255',
            'judul_eng' => 'required | string | max:255',
            'deskripsi' => 'required | string | max:255',
            'deskripsi_eng' => 'required | string | max:255',

        ]);

        ProfileModel::create([
            'gambar' => $request->gambar,
            'gambar_eng' => $request->gambar_eng,
            'judul' => $request->judul,
            'judul_eng' => $request->judul_eng,
            'deskripsi' => $request->deskripsi,
            'deskripsi_eng' => $request->deskripsi_eng,

        ]);

        return redirect('/member/profile')->with('success', 'Data berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $group = ProfileModel::find($id);

        $breadcrumb = (object)[
            'title' => 'Detail profile',
            'list' => ['Home', 'Profile', 'Detail']
        ];

        $page = (object)[
            'title' => 'Detail Profile',
        ];

        $user = Auth::user(); // Get the logged-in user
        $menus = SidebarMenuModel::where('id_group', $user->id_group)
            ->orderBy('level', 'asc')
            ->orderBy('parent_id', 'asc')
            ->get();

        $activeMenu = 'profile';

        return view('member.profile.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'group' => $group, 'activeMenu' => $activeMenu, 'menus' => $menus]);
    }

    public function edit(string $id)
    {
        $group = ProfileModel::find($id);

        $breadcrumb = (object)[
            'title' => 'Edit Profile',
            'list' => ['Home', 'Profile', 'Edit']
        ];

        $page = (object)[
            'title' => 'Edit Profile',
        ];

        $user = Auth::user(); // Get the logged-in user
        $menus = SidebarMenuModel::where('id_group', $user->id_group)
            ->orderBy('level', 'asc')
            ->orderBy('parent_id', 'asc')
            ->get();

        $activeMenu = 'profile';

        return view('member.profile.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'group' => $group, 'activeMenu' => $activeMenu, 'menus' => $menus]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'gambar' => 'required | string | max:150',
            'gambar_eng' => 'required | string | max:255',
            'judul' => 'required | string | max:255',
            'judul_eng' => 'required | string | max:255',
            'deskripsi' => 'required | string | max:255',
            'deskripsi_eng' => 'required | string | max:255',
        ]);

        ProfileModel::find($id)->update([
            'gambar' => $request->gambar,
            'gambar_eng' => $request->gambar_eng,
            'judul' => $request->judul,
            'judul_eng' => $request->judul_eng,
            'deskripsi' => $request->deskripsi,
            'deskripsi_eng' => $request->deskripsi_eng,
        ]);

        return redirect('/member/profile')->with('success', 'Data berhasil diubah!');;
    }

    public function destroy($id)
    {
        $check = ProfileModel::find($id);
        if (!$check) {
            return redirect('/member/profile')->with('error', 'Data tidak ditemukan!');
        }

        try {
            ProfileModel::destroy($id);
            return redirect('/member/profile')->with('success', 'Data berhasil dihapus!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/member/profile')->with('error', 'Data gagal dihapus! masih terdapat tabel lain yang terikat dengan data ini!');
        }
    }
}
