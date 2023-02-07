<?php

namespace App\Http\Controllers;
use App\Page;

use Illuminate\Http\Request;
use Str;
use File;
use Illuminate\Support\Facades\Session;

class PagesController extends Controller
{
    public function index(){


        $data=Page::latest()->get();
        return view('admin.page',compact('data'));
    }

    public function savewebpage(Request $request, $id){

        $pages= Page::where('id', $id)->first();

        $pages->page_title=$request->page_title;
        $pages->page_desc=$request->page_desc;

        $pageimage = $request->file('page_img');
        $slug = "pagesimage";

        if(isset($pageimage)) {
            $page_image_name = $slug.'-'.uniqid().'.'.$pageimage->getClientOriginalExtension();
            $upload_path = 'public/media/pagesimage/';
            $pageimage->move($upload_path, $page_image_name);

            $oldImage= Page::where('id', $id)->first();
            if(file_exists($oldImage->page_img)) {
                unlink($oldImage->page_img);
            }

            $pages->page_img  = $upload_path.$page_image_name;

        }else {
            $oldImage= Page::where('id', $id)->first();
            $pages->page_img  = $oldImage->page_img;
        }

        $pages->update();

        Session::flash("message",__('successerr.data_save'));
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();

      }
}
