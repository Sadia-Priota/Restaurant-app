<?php

namespace App\Http\Controllers;

use App\Models\teacherTable;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $search_string='Glenna';

        $teacher = teacherTable::query()
            ->where('name','like',"%{$search_string}%")
            ->orWhere('course','like',"%{$search_string}%")
            ->orderBy('id','desc')
            ->get();

        return $teacher;
    }
}
