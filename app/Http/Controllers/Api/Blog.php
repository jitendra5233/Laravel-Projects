<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ace\BlogModel;
use App\Models\Ace\BlogCategoryModel;
use App\Models\Ace\MediaModel;

class Blog extends Controller
{
    public function getAllBlogs(){
        $result  = BlogModel::all();

        foreach($result as $row){
            $row['url'] = MediaModel::where('id',$row['image'])->get()[0]->url;
            $row['categoryName'] = BlogCategoryModel::where('id',$row['categoryId'])->get()[0]->name;
        }
        return $result;
    }

    public function getAllBlogsC(){
        $result  = BlogCategoryModel::all();
        foreach($result as $row){
            $row['no'] = BlogModel::where('categoryId',$row['id'])->count();
        }
        return $result;
    }

    public function getAllBlogsSingle(Request $req){
        $result  = BlogModel::where('id',$req->id)->get();
        foreach($result as $row){
            $row['url'] = MediaModel::where('id',$row['image'])->get()[0]->url;
        }
        return $result;
    }
}
