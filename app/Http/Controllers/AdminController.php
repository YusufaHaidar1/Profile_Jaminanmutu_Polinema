<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SidebarMenuModel;

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
        $menus = SidebarMenuModel::orderBy('level', 'asc')
                            ->orderBy('parent_id', 'asc')
                            ->get();

        return view('Dashboard.admin', [
            'breadcrumb' => $breadcrumb, 
            'page' => $page, 
            'menus' => $menus,
            'activeMenu' => $activeMenu]);
    }
}
