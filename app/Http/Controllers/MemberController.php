<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SidebarMenuModel;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Member Dashboard',
            'list' => ['Home', 'Member']
        ];

        $page = (object) [
            'title' => 'Member Dashboard'
        ];

        $activeMenu = 'dashboard'; // set menu yang sedang aktif
        $user = Auth::user(); // Get the logged-in user
        $menus = SidebarMenuModel::where('id_group', $user->id_group)
                    ->orderBy('level', 'asc')
                    ->orderBy('parent_id', 'asc')
                    ->get();

        return view('Dashboard.member', [
            'breadcrumb' => $breadcrumb, 
            'page' => $page, 
            'menus' => $menus,
            'activeMenu' => $activeMenu]);
    }
}
