<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Http\Controllers\Controller as Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::orderBy('order_id', 'DESC')->latest()->get();
        return view('admin.banner.index', compact('banners'));
    }

    // public function store(Request $request)
    // {
    //     $this->validate($request, [
    //         'image' => 'required',
    //         'order_id' => 'required',
    //         'status' => 'required',
    //     ]);

    //     $banner_image = $request->file('image');
    //     $slug = 'Banner';
    //     $banner_image_name = $slug . '-' . uniqid() . '.' . $banner_image->getClientOriginalExtension();
    //     $upload_path = 'public/media/banner/';
    //     $banner_image->move($upload_path, $banner_image_name);

    //     $image_url = $upload_path . $banner_image_name;

    //     Banner::insert([
    //         'image' => $image_url,
    //         'status' => $request->status,
    //         'link' => $request->link,
    //         'order_id' => $request->order_id,
    //         'created_at' => Carbon::now(),
    //     ]);

    //     return redirect()->back()->with('success', 'Banner successfully created');
    // }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'order_id' => 'required',
            'status' => 'required',
        ]);

        $banner_image = $request->file('image');
        $slug = 'banner';
        if (isset($banner_image)) {

            $banner_image_name = $slug . '-' . uniqid() . '.' . $banner_image->getClientOriginalExtension();
            $upload_path = 'public/media/banner/';
            $banner_image->move($upload_path, $banner_image_name);

            $oldbanner = Banner::findOrFail($id);
            if (file_exists($oldbanner->image)) {
                unlink($oldbanner->image);
            }

            $image_url = $upload_path . $banner_image_name;
        } else {

            $oldbanner = Banner::findOrFail($id);
            $image_url = $oldbanner->image;
        }

        Banner::findOrFail($id)->update([
            'image' => $image_url,
            'link' => $request->link,
            'status' => $request->status,
            'order_id' => $request->order_id,
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->back()->with('success', 'Banner successfully update');
    }

    // public function delete($id)
    // {
    //     $banner = Banner::findOrFail($id);
    //     if (file_exists($banner->image)) {
    //         unlink($banner->image);
    //     }

    //     $banner->delete();

    //     return redirect()->back()->with('success', 'Banner successfully delete');
    // }

}
