<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use App\Slider;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class SliderController extends Controller
{

    public function index()
    {
        $sliders = Slider::orderBy('order_id', 'DESC')->latest()->get();
        return view('admin.slider.index')->with("sliders", $sliders);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required',
            'order_id' => 'required',
            'status' => 'required',
        ]);

        $slider_image = $request->file('image');
        $slug = 'slider';
        $slider_image_name = $slug . '-' . uniqid() . '.' . $slider_image->getClientOriginalExtension();
        $upload_path = 'public/media/slider/';
        $slider_image->move($upload_path, $slider_image_name);

        $image_url = $upload_path . $slider_image_name;

        Slider::insert([
            'image' => $image_url,
            'status' => $request->status,
            'order_id' => $request->order_id,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->back()->with('success', 'Slider successfully created');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'order_id' => 'required',
            'status' => 'required',
        ]);

        $slider_image = $request->file('image');
        $slug = 'slider';
        if (isset($slider_image)) {

            $slider_image_name = $slug . '-' . uniqid() . '.' . $slider_image->getClientOriginalExtension();
            $upload_path = 'public/media/slider/';
            $slider_image->move($upload_path, $slider_image_name);

            $oldslider = Slider::findOrFail($id);
            if (file_exists($oldslider->image)) {
                unlink($oldslider->image);
            }

            $image_url = $upload_path . $slider_image_name;
        } else {

            $oldslider = Slider::findOrFail($id);
            $image_url = $oldslider->image;
        }

        Slider::findOrFail($id)->update([
            'image' => $image_url,
            'status' => $request->status,
            'order_id' => $request->order_id,
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->back()->with('success', 'Slider successfully update');
    }

    public function delete($id)
    {
        $slider = Slider::findOrFail($id);
        if (file_exists($slider->image)) {
            unlink($slider->image);
        }

        $slider->delete();

        return redirect()->back()->with('success', 'Slider successfully delete');
    }
}
