<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SidebarMenuModel;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Admin Dashboard',
            'list' => ['Home', 'Admin']
        ];

        $page = (object) [
            'title' => 'Admin Dashboard'
        ];

        $activeMenu = 'dashboard'; // set menu yang sedang aktif
        $user = Auth::user(); // Get the logged-in user
        $menus = SidebarMenuModel::where('id_group', $user->id_group)
                    ->orderBy('level', 'asc')
                    ->orderBy('parent_id', 'asc')
                    ->get();

        return view('Dashboard.admin', [
            'breadcrumb' => $breadcrumb, 
            'page' => $page, 
            'menus' => $menus,
            'activeMenu' => $activeMenu]);
    }
}
