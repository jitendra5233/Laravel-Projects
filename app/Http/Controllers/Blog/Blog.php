<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ace\BlogModel;
use App\Models\Ace\BlogCategoryModel;
use App\Models\Ace\MediaModel;
use App\Models\Ace\RoleModel;
use App\Models\Ace\UserModel;
class Blog extends Controller
{
      public function index(){
        $blog = BlogCategoryModel::orderBy('id', 'DESC')->get();
        $media = MediaModel::orderBy('id', 'DESC')->get();
        return view('content.Blog.addblog')->with('blogcat',$blog)->with('media',$media);
    }

    public  function addblogcategory(Request $req)
    {
        $data = new BlogCategoryModel;
        $data->name = $req->Category;
        $result = $data->save();
        return $result;
    }

 public function Deleteblogcategory(Request $req)
    {

        $result = BlogCategoryModel::where('id',$req->id)->delete();
        return $result;
    }

    public function blogcategory()
    {
        $blog = BlogCategoryModel::orderBy('id', 'DESC')->get();

        return view('content.Blog.blogcat')->with('blogcat',$blog);


    }

    public function addnewblog(Request $req)
    {
        
        $userId = $req->session()->get('id');
        $data = new BlogModel;
        $data->userId = $userId;
        $data->title = $req->title;
        $data->categoryId = $req->category;
        $data->postContent = $req->htmlcode;
        $data->image=$req->imgArr;
        $data->status=$req->status;
        $result = $data->save();
        return redirect('/blog-newblog');
       
    }

    public function allblogview(Request $req)
    {

         $userId = $req->session()->get('id');
         $role = session('role');
         $user = UserModel::where('id', $userId)->get()[0];
         $roleaccess = RoleModel::where('name',$role)->get()[0]->access;
         $roleId = json_decode($roleaccess);
         $Agentname= $user->first_name .' '. $user->last_name;
         $Agentnid= $user->id;
            $blogs= BlogModel::orderBy('id', 'DESC')->get();
            $imgUrl = [];
            foreach($blogs as $row)
            {     
                $media = MediaModel::where('id',$row->image)->get()[0];
                $imgUrl[]=$media;
                $row['blogcategory']=BlogCategoryModel::where('id',$row->categoryId)->get()[0]->name;
            }
            $blogImages =  $imgUrl;
            
            return view('content.Blog.allblogview')->with('blogs',$blogs)->with('blogImages',$blogImages)->with('roleId',$roleId)->with('Agentname',$Agentname)->with('Agentnid',$Agentnid); 
        

    }

    public function Deleteblog(Request $req)
    {
        $result = BlogModel::where('id',$req->id)->delete();
        return $result;
    }

    public function Editblog($id)
    {

        $blog = BlogModel::where('id',$id)->get();
        $media = MediaModel::all();
        $blogcat = BlogCategoryModel::all();
        return view('content.Blog.editblog')->with('media',$media)->with('blogcat',$blogcat)->with('blog',$blog[0]); 
    }

    public function updateblog(Request $req)
    {
        $userId = $req->session()->get('id');
        $result = BlogModel::where("id",$req->blogid)->update([
            "title" => $req->title,
            "userId" => $userId,
            "postContent" => $req->description,
            "categoryId" => $req->category,
            "image"=>$req->imgArr,
            "status"=>$req->status

            ]); 
         return redirect('/blog-allblogs');

    }
    

}
