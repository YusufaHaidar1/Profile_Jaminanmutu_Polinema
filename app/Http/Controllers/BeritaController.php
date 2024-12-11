<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BeritaModel;
use App\Models\SidebarMenuModel;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class BeritaController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Daftar Berita',
            'list' => ['Home', 'Berita']
        ];

        $page = (object)[
            'title' => 'Daftar Berita',
        ];

        $user = Auth::user(); // Get the logged-in user
        $menus = SidebarMenuModel::where('id_group', $user->id_group)
            ->orderBy('level', 'asc')
            ->orderBy('parent_id', 'asc')
            ->get();

        $activeMenu = 'berita';

        return view('member.berita.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'menus' => $menus]);
    }

    public function list(Request $request)
    {
        $news = BeritaModel::select('id_berita', 'penulis', 'tanggal', 'judul', 'judul_eng', 'deskripsi', 'deskripsi_eng', 'gambar', 'gambar_eng');

        return DataTables::of($news)
            ->addIndexColumn() // Adds the index/row number column (DT_RowIndex)

            // Add the column for displaying the image for 'gambar'
            ->addColumn('gambar', function ($berita) {
                if ($berita->gambar) {
                    return '<img src="' . asset($berita->gambar) . '" alt="Gambar" style="max-width: 100px;">';
                } else {
                    return 'No Image';
                }
            })
            ->addColumn('gambar_eng', function ($berita) {
                if ($berita->gambar_eng) {
                    return '<img src="' . asset($berita->gambar_eng) . '" alt="Gambar Eng" style="max-width: 100px;">';
                } else {
                    return 'No Image';
                }
            })

            // Add the action column with edit/delete buttons
            ->addColumn('aksi', function ($berita) {
                $btn = '<a href="' . url('/member/berita/' . $berita->id_berita) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/member/berita/' . $berita->id_berita . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/member/berita/' . $berita->id_berita) . '">' . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })

            ->rawColumns(['gambar', 'gambar_eng', 'aksi']) // Specify that 'gambar', 'gambar_eng', and 'aksi' columns contain raw HTML
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object)[
            'title' => 'Tambah Berita',
            'list' => ['Home', 'Berita', 'Tambah']
        ];

        $page = (object)[
            'title' => 'Tambah Berita Baru',
        ];

        $user = Auth::user(); // Get the logged-in user
        $menus = SidebarMenuModel::where('id_group', $user->id_group)
            ->orderBy('level', 'asc')
            ->orderBy('parent_id', 'asc')
            ->get();

        $activeMenu = 'berita';
        request()->validate([
            'gambar' => 'max:2048', // 2MB limit
            'gambar_eng' => 'max:2048' // 2MB limit
        ], [
            'gambar.max' => 'Ukuran gambar tidak boleh melebihi 2 MB.',
            'gambar_eng.max' => 'Ukuran gambar tidak boleh melebihi 2 MB.'
        ]);
    
        // Rest of your create method logic
        
        return view('member.berita.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'menus' => $menus]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'penulis' => 'required',
            'tanggal' => 'required|date',
            'judul' => 'required',
            'judul_eng' => 'required',
            'deskripsi' => 'required',
            'deskripsi_eng' => 'required',
            'gambar' => ['required', 'image', 'max_file_size:2048'], // 2MB limit
            'gambar_eng' => ['required', 'image', 'max_file_size:2048'] // 2MB limit
        ], [
            'gambar.max_file_size' => 'Ukuran gambar tidak boleh melebihi 2 MB.',
            'gambar_eng.max_file_size' => 'Ukuran gambar tidak boleh melebihi 2 MB.'
        ]);

        if ($request->hasFile('gambar')) {
            $gambarName = time() . '_' . $request->file('gambar')->getClientOriginalName();
            $gambarPath = $request->file('gambar')->move(public_path('assets/img/berita'), $gambarName);
        } else {
            $gambarPath = null;
        }

        if ($request->hasFile('gambar_eng')) {
            $gambar_eng_Name = time() . '_' . $request->file('gambar_eng')->getClientOriginalName();
            $gambar_eng_Path = $request->file('gambar_eng')->move(public_path('assets/img/berita'), $gambar_eng_Name);
        } else {
            $gambar_eng_Path = null;
        }

        BeritaModel::create([
            'penulis' => $request->penulis,
            'tanggal' => $request->tanggal,
            'judul' => $request->judul,
            'judul_eng' => $request->judul_eng,
            'deskripsi' => $request->deskripsi,
            'deskripsi_eng' => $request->deskripsi_eng,
            'gambar' => 'assets/img/berita/' . $gambarName,
            'gambar_eng' => 'assets/img/berita/' . $gambar_eng_Name,
        ]);

        return redirect('/member/berita')->with('success', 'Data berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $berita = BeritaModel::find($id);

        $breadcrumb = (object)[
            'title' => 'Detail Berita',
            'list' => ['Home', 'Berita', 'Detail']
        ];

        $page = (object)[
            'title' => 'Detail Berita',
        ];

        $user = Auth::user(); // Get the logged-in user
        $menus = SidebarMenuModel::where('id_group', $user->id_group)
            ->orderBy('level', 'asc')
            ->orderBy('parent_id', 'asc')
            ->get();

        $activeMenu = 'berita';

        return view('member.berita.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'berita' => $berita, 'activeMenu' => $activeMenu, 'menus' => $menus]);
    }

    public function edit(string $id)
    {
        $berita = BeritaModel::find($id);

        $breadcrumb = (object)[
            'title' => 'Edit Berita',
            'list' => ['Home', 'Berita', 'Edit']
        ];

        $page = (object)[
            'title' => 'Edit Berita',
        ];

        $user = Auth::user(); // Get the logged-in user
        $menus = SidebarMenuModel::where('id_group', $user->id_group)
            ->orderBy('level', 'asc')
            ->orderBy('parent_id', 'asc')
            ->get();

        $activeMenu = 'berita';

        return view('member.berita.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'berita' => $berita, 'activeMenu' => $activeMenu, 'menus' => $menus]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'penulis' => 'required | string',
            'tanggal' => 'required | date',
            'judul' => 'required | string',
            'judul_eng' => 'required | string',
            'deskripsi' => 'required | string',
            'deskripsi_eng' => 'required | string',
            'gambar' => 'nullable | image | mimes:jpeg,png,jpg,gif | max:2048',
            'gambar_eng' => 'nullable | image |  mimes:jpeg,png,jpg,gif,svg | max:2048',
        ]);

        $berita = BeritaModel::findOrFail($id);

        // Check and store new 'gambar' if uploaded
        if ($request->hasFile('gambar')) {
            // Delete the old image if exists
            if ($berita->gambar && file_exists(public_path($berita->gambar))) {
                unlink(public_path($berita->gambar));
            }

            // Store the new image in the public/assets/img/berita directory
            $gambarName = time() . '_' . $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('assets/img/berita'), $gambarName);
            $gambarPath = 'assets/img/berita/' . $gambarName;
        } else {
            $gambarPath = $berita->gambar; // Keep the old image if no new one is uploaded
        }

        // Check and store new 'gambar_eng' if uploaded
        if ($request->hasFile('gambar_eng')) {
            // Delete the old image if exists
            if ($berita->gambar_eng && file_exists(public_path($berita->gambar_eng))) {
                unlink(public_path($berita->gambar_eng));
            }

            // Store the new image in the public/assets/img/berita directory
            $gambarEngName = time() . '_' . $request->file('gambar_eng')->getClientOriginalName();
            $request->file('gambar_eng')->move(public_path('assets/img/berita'), $gambarEngName);
            $gambar_eng_Path = 'assets/img/berita/' . $gambarEngName;
        } else {
            $gambar_eng_Path = $berita->gambar_eng; // Keep the old image if no new one is uploaded
        }

        BeritaModel::find($id)->update([
            'penulis' => $request->penulis,
            'tanggal' => $request->tanggal,
            'judul' => $request->judul,
            'judul_eng' => $request->judul_eng,
            'deskripsi' => $request->deskripsi,
            'deskripsi_eng' => $request->deskripsi_eng,
            'gambar' => $gambarPath,
            'gambar_eng' => $gambar_eng_Path,
        ]);

        return redirect('/member/berita')->with('success', 'Data berhasil diubah!');;
    }

    public function destroy($id)
    {
        $check = BeritaModel::find($id);
        if (!$check) {
            return redirect('/member/berita')->with('error', 'Data tidak ditemukan!');
        }

        try {
            // First, delete the image files if they exist
            $gambarPath = public_path($check->gambar); // Get the path for gambar
            if (file_exists($gambarPath)) {
                unlink($gambarPath); // Delete the gambar file
            }

            $gambarEngPath = public_path($check->gambar_eng); // Get the path for gambar_eng
            if (file_exists($gambarEngPath)) {
                unlink($gambarEngPath); // Delete the gambar_eng file
            }

            // Now delete the record from the database
            BeritaModel::destroy($id);

            return redirect('/member/berita')->with('success', 'Data berhasil dihapus!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/member/berita')->with('error', 'Data gagal dihapus! Masih terdapat tabel lain yang terikat dengan data ini!');
        }
    }
}
