<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfileModel;
use App\Models\SidebarMenuModel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Profiler\Profile;

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
            ->addIndexColumn() // Adds the index/row number column (DT_RowIndex)

            // Add the column for displaying the image for 'gambar'
            ->addColumn('gambar', function ($profile) {
                if ($profile->gambar) {
                    return '<img src="' . asset($profile->gambar) . '" alt="Gambar" style="max-width: 100px;">';
                } else {
                    return 'No Image';
                }
            })
            ->addColumn('gambar_eng', function ($profile) {
                if ($profile->gambar_eng) {
                    return '<img src="' . asset($profile->gambar_eng) . '" alt="Gambar Eng" style="max-width: 100px;">';
                } else {
                    return 'No Image';
                }
            })

            // Add the action column with edit/delete buttons
            ->addColumn('aksi', function ($profile) {
                $btn = '<a href="' . url('/member/profile /' . $profile->id_profile) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/member/profile /' . $profile->id_profile  . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/member/profile /' . $profile->id_profile) . '">' . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })

            ->rawColumns(['gambar', 'gambar_eng', 'aksi']) // Specify that 'gambar', 'gambar_eng', and 'aksi' columns contain raw HTML
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
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gambar_eng' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'judul' => 'required | string | max:255',
            'judul_eng' => 'required | string | max:255',
            'deskripsi' => 'required | string | max:255',
            'deskripsi_eng' => 'required | string | max:255',

        ]);
        if ($request->hasFile('gambar')) {
            $gambarName = time() . '_' . $request->file('gambar')->getClientOriginalName();
            $gambarPath = $request->file('gambar')->move(public_path('assets/img/profile'), $gambarName);
        } else {
            $gambarPath = null;
        }

        if ($request->hasFile('gambar_eng')) {
            $gambar_eng_Name = time() . '_' . $request->file('gambar_eng')->getClientOriginalName();
            $gambar_eng_Path = $request->file('gambar_eng')->move(public_path('assets/img/profile'), $gambar_eng_Name);
        } else {
            $gambar_eng_Path = null;
        }

        ProfileModel::create([
            'gambar' => 'assets/img/profile/' . $gambarName,
            'gambar_eng' => 'assets/img/profile/' . $gambar_eng_Name,
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
        $profile = ProfileModel::find($id);

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

        return view('member.profile.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'profile' => $profile, 'activeMenu' => $activeMenu, 'menus' => $menus]);
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

        // Check and store new 'gambar' if uploaded
        if ($request->hasFile('gambar')) {
            // Delete the old image if exists
            if ($profile->gambar && file_exists(public_path($profile->gambar))) {
                unlink(public_path($profile->gambar));
            }

            // Store the new image in the public/assets/img/berita directory
            $gambarName = time() . '_' . $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('assets/img/profile'), $gambarName);
            $gambarPath = 'assets/img/profile/' . $gambarName;
        } else {
            $gambarPath = $profile->gambar; // Keep the old image if no new one is uploaded
        }

        // Check and store new 'gambar_eng' if uploaded
        if ($request->hasFile('gambar_eng')) {
            // Delete the old image if exists
            if ($profile->gambar_eng && file_exists(public_path($profile->gambar_eng))) {
                unlink(public_path($profile->gambar_eng));
            }

            // Store the new image in the public/assets/img/berita directory
            $gambarEngName = time() . '_' . $request->file('gambar_eng')->getClientOriginalName();
            $request->file('gambar_eng')->move(public_path('assets/img/profile'), $gambarEngName);
            $gambar_eng_Path = 'assets/img/profile/' . $gambarEngName;
        } else {
            $gambar_eng_Path = $profile->gambar_eng; // Keep the old image if no new one is uploaded
        }

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
