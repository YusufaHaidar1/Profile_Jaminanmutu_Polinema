<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfileModel;
use App\Models\ProfiledetailModel;
use App\Models\SidebarMenuModel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfiledetailController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Daftar profile Detail',
            'list' => ['Home', 'profiledetail']
        ];

        $page = (object)[
            'title' => 'Daftar profile',
        ];

        $user = Auth::user(); // Get the logged-in user
        $menus = SidebarMenuModel::where('id_group', $user->id_group)
            ->orderBy('level', 'asc')
            ->orderBy('parent_id', 'asc')
            ->get();

        $activeMenu = 'profiledetail';
        $group = ProfileModel::all();

        return view('member.profiledetail.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'menus' => $menus]);
    }

    public function list(Request $request)
    {
        $groups = ProfiledetailModel::select('id_detail_profile', 'id_profile', 'jenis', 'jenis_eng', 'detail_profile', 'detail_profile_eng')
            ->with('group');

        if ($request->id_profile) {
            $groups->where('id_profile', $request->id_profile);
        }

        return DataTables::of($groups)
            ->addIndexColumn() // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addColumn('aksi', function ($profiledetail) { // menambahkan kolom aksi
                $btn = '<a href="' . url('/member/profiledetail/' . $profiledetail->id_detail_profile) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/member/profiledetail/' . $profiledetail->id_detail_profile . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/member/profiledetail/' . $profiledetail->id_detail_profile) . '">' . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger btn-sm"onclick="return confirm(\'Apakah Anda yakit menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object)[
            'title' => 'Tambah Profile detail',
            'list' => ['Home', 'Profile detail', 'Tambah']
        ];

        $page = (object)[
            'title' => 'Tambah Profile detail Baru',
        ];

        $user = Auth::user(); // Get the logged-in user
        $menus = SidebarMenuModel::where('id_group', $user->id_group)
            ->orderBy('level', 'asc')
            ->orderBy('parent_id', 'asc')
            ->get();

        $activeMenu = 'profiledetail';

        return view('member.profiledetail.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'menus' => $menus]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis' => 'required | string | max:255',
            'jenis_eng' => 'required | string | max:255',
            'detail_profile' => 'required | string | max:255',
            'detail_profile_eng' => 'required | string | max:255',

        ]);

        ProfileModel::create([
            'jenis' => $request->jenis,
            'jenis_eng' => $request->jenis_eng,
            'detail_profile' => $request->detail_profile,
            'detail_profile_eng' => $request->detail_profile_eng,

        ]);

        return redirect('/member/profiledetail')->with('success', 'Data berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $group = ProfileModel::find($id);

        $breadcrumb = (object)[
            'title' => 'Detail profile detail',
            'list' => ['Home', 'Profiledetail', 'Detail']
        ];

        $page = (object)[
            'title' => 'Detail Profile detail',
        ];

        $user = Auth::user(); // Get the logged-in user
        $menus = SidebarMenuModel::where('id_group', $user->id_group)
            ->orderBy('level', 'asc')
            ->orderBy('parent_id', 'asc')
            ->get();

        $activeMenu = 'profiledetail';

        return view('member.profiledetail.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'group' => $group, 'activeMenu' => $activeMenu, 'menus' => $menus]);
    }

    public function edit(string $id)
    {
        $profiledetail = ProfiledetailModel::find($id);

        $breadcrumb = (object)[
            'title' => 'Edit Profile detail',
            'list' => ['Home', 'Profile detail', 'Edit']
        ];

        $page = (object)[
            'title' => 'Edit Profile detail',
        ];

        $user = Auth::user(); // Get the logged-in user
        $menus = SidebarMenuModel::where('id_group', $user->id_group)
            ->orderBy('level', 'asc')
            ->orderBy('parent_id', 'asc')
            ->get();

        $activeMenu = 'profiledetail';

        return view('member.profiledetail.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'profile' => $profile, 'activeMenu' => $activeMenu, 'menus' => $menus]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gambar_eng' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'judul' => 'required | string | max:255',
            'judul_eng' => 'required | string | max:255',
            'deskripsi' => 'required | string | max:255',
            'deskripsi_eng' => 'required | string | max:255',
        ]);

        $profile = ProfileModel::findOrFail($id);

        ProfileModel::find($id)->update([
            'gambar' =>  $gambarPath,
            'gambar_eng' =>  $gambar_eng_Path,
            'judul' => $request->judul,
            'judul_eng' => $request->judul_eng,
            'deskripsi' => $request->deskripsi,
            'deskripsi_eng' => $request->deskripsi_eng,
        ]);

        return redirect('/member/profile')->with('success', 'Data berhasil diubah!');;
    }

    public function destroy($id)
    {
        $check = ProfiledetailModel::find($id);
        if (!$check) {
            return redirect('/member/profiledetail')->with('error', 'Data tidak ditemukan!');
        }

        try {
            ProfiledetailModel::destroy($id);
            return redirect('/member/profiledetail')->with('success', 'Data berhasil dihapus!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/member/profiledetail')->with('error', 'Data gagal dihapus! masih terdapat tabel lain yang terikat dengan data ini!');
        }
    }
}
