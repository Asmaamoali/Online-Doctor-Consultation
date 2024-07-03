<?php

namespace App\Http\Controllers\Admin\Home;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Medicine;
use App\Models\User;

class HomeController extends Controller
{
    public function home()
    {
        $categoriesCount = Category::count();
        $subcategoriesCount = SubCategory::count();
        $usersCount = User::where('role', 'user')
            ->count();
        $medicinesCount = Medicine::count();
        return view('pages.home.index', compact('categoriesCount', 'subcategoriesCount', 'usersCount', 'medicinesCount'));
    }
}