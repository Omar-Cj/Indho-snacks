<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use App\Testimonial;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{

    // slider show list
    public function index()
    {
        $testimonials = Testimonial::latest()->get();
        return view('admin.testimonial.index', compact('testimonials'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required',
            'name' => 'required',
            'details' => 'required|max:250',
            'status' => 'required',
        ]);

        $testimonial_image = $request->file('image');
        $slug = 'testimonial';
        $testimonial_image_name = $slug . '-' . uniqid() . '.' . $testimonial_image->getClientOriginalExtension();
        $upload_path = 'public/media/testimonial/';
        $testimonial_image->move($upload_path, $testimonial_image_name);

        $image_url = $upload_path . $testimonial_image_name;

        Testimonial::insert([
            'image' => $image_url,
            'name' => $request->name,
            'status' => $request->status,
            'details' => $request->details,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->back()->with('success', 'Testimonial successfully created');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'details' => 'required|max:250',
            'status' => 'required',
        ]);

        $testimonial_image = $request->file('image');
        $slug = 'testimonial';
        if (isset($testimonial_image)) {

            $testimonial_image_name = $slug . '-' . uniqid() . '.' . $testimonial_image->getClientOriginalExtension();
            $upload_path = 'public/media/testimonial/';
            $testimonial_image->move($upload_path, $testimonial_image_name);

            $oldtestimonial = Testimonial::findOrFail($id);
            if (file_exists($oldtestimonial->image)) {
                unlink($oldtestimonial->image);
            }

            $image_url = $upload_path . $testimonial_image_name;

        } else {

            $oldtestimonial = Testimonial::findOrFail($id);
            $image_url = $oldtestimonial->image;
        }

        Testimonial::findOrFail($id)->update([
            'image' => $image_url,
            'name' => $request->name,
            'status' => $request->status,
            'details' => $request->details,
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->back()->with('success', 'Testimonial successfully update');
    }

    public function delete($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        if (file_exists($testimonial->image)) {
            unlink($testimonial->image);
        }

        $testimonial->delete();

        return redirect()->back()->with('success', 'Testimonial successfully delete');
    }

}
