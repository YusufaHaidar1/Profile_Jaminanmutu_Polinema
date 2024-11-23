<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SpmiModel;
use App\Models\SidebarMenuModel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class SPMIController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Daftar SPMI',
            'list' => ['Home', 'SPMI']
        ];

        $page = (object)[
            'title' => 'Daftar SPMI',
        ];

        $user = Auth::user();
        $menus = SidebarMenuModel::where('id_group', $user->id_group)
                    ->orderBy('level', 'asc')
                    ->orderBy('parent_id', 'asc')
                    ->get();

        $activeMenu = 'spmi';

        return view('member.spmi.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'menus' => $menus]);
    }

    public function list(Request $request)
    {
        $spmi = SpmiModel::select('id_spmi', 'spmi', 'file');

        return DataTables::of($spmi)
            ->addIndexColumn()
            ->addColumn('aksi', function ($spmi) {
                $btn = '<a href="' . url('/member/spmi/' . $spmi->id_spmi) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/member/spmi/' . $spmi->id_spmi . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/member/spmi/' . $spmi->id_spmi) . '">' . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object)[
            'title' => 'Tambah SPMI',
            'list' => ['Home', 'SPMI', 'Tambah']
        ];

        $page = (object)[
            'title' => 'Tambah SPMI Baru',
        ];

        $user = Auth::user();
        $menus = SidebarMenuModel::where('id_group', $user->id_group)
                    ->orderBy('level', 'asc')
                    ->orderBy('parent_id', 'asc')
                    ->get();

        $activeMenu = 'spmi';

        return view('member.spmi.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'menus' => $menus]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'spmi' => 'required|string|max:255',
            'file' => 'required|file|max:2048',
        ]);

        $filePath = $request->file('file')->store('spmi_files', 'public');

        SpmiModel::create([
            'spmi' => $request->spmi,
            'file' => $filePath,
        ]);

        return redirect('/member/spmi')->with('success', 'Data berhasil ditambahkan');
    }

    public function show(string $id_spmi)
    {
        $spmi = SpmiModel::find($id_spmi);

        $breadcrumb = (object)[
            'title' => 'Detail SPMI',
            'list' => ['Home', 'SPMI', 'Detail']
        ];

        $page = (object)[
            'title' => 'Detail SPMI',
        ];

        $user = Auth::user();
        $menus = SidebarMenuModel::where('id_group', $user->id_group)
                    ->orderBy('level', 'asc')
                    ->orderBy('parent_id', 'asc')
                    ->get();

        $activeMenu = 'spmi';

        return view('member.spmi.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'spmi' => $spmi, 'activeMenu' => $activeMenu, 'menus' => $menus]);
    }

    public function edit(string $id)
    {
        $spmi = SpmiModel::find($id);

        $breadcrumb = (object)[
            'title' => 'Edit SPMI',
            'list' => ['Home', 'SPMI', 'Edit']
        ];

        $page = (object)[
            'title' => 'Edit SPMI',
        ];

        $user = Auth::user();
        $menus = SidebarMenuModel::where('id_group', $user->id_group)
                    ->orderBy('level', 'asc')
                    ->orderBy('parent_id', 'asc')
                    ->get();

        $activeMenu = 'spmi';

        return view('member.spmi.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'spmi' => $spmi, 'activeMenu' => $activeMenu, 'menus' => $menus]);
    }

    public function update(Request $request, $id)
    {
        $spmi = SpmiModel::find($id);

        $request->validate([
            'spmi' => 'required|string|max:255',
            'file' => 'nullable|file|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('spmi_files', 'public');
            $spmi->file = $filePath;
        }

        $spmi->spmi = $request->spmi;
        $spmi->save();

        return redirect('/member/spmi')->with('success', 'Data berhasil diubah!');
    }

    public function destroy($id)
    {
        $spmi = SpmiModel::find($id);
        if (!$spmi) {
            return redirect('/member/spmi')->with('error', 'Data tidak ditemukan!');
        }

        try {
            $spmi->delete();
            return redirect('/member/spmi')->with('success', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect('/member/spmi')->with('error', 'Data gagal dihapus!');
        }
    }
}
