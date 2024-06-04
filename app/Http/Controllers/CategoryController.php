<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function index(){
        //mengakses record tabel kategori semua record
        $rsetCategory = Kategori::all();
        
        
        echo $rsetCategory[0]->deskripsi();
        return $rsetCategory[0]->deskripsi():
    }
}
