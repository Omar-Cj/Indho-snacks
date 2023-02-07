<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Sentinel;
use Session;
use DataTables;
use App\User;
use Artisan;
use App\Category;
use App\Item;
use App\Ingredient;
use Hash;
use Cart;
use App\Setting;
use App\Order;
use App\Contact;
use App\City;
use App\OrderResponse;
use App\Slider;
use App\Testimonial;
use Share;
use DB;
use App\Review;

class frontController extends Controller
{

    public function __construct()
    {
        $store = Setting::find(1);
        Session::put("webcolor", $store->web_color);
        Session::put("current_year", date("Y"));
        Session::put("facebook", $store->facebook_id);
        Session::put("twitter", $store->twitter_id);
        Session::put("linkedin", $store->linkedin_id);
        //Session::put("google_plus_id",$store->google_plus_id);
        Session::put("whatsapp", $store->whatsapp);
        Session::put("address", $store->address);
        Session::put("email", $store->email);
        Session::put("phone", $store->phone);
        Session::put("playstore", $store->play_store_url);
        Session::put("appstore", $store->app_store_url);
        Session::put("stripe_key", $store->stripe_key);
        Session::put("stripe_secret", $store->stripe_secret);
        Session::put("paypal_client_id", $store->paypal_client_id);
        Session::put("paypal_client_secret", $store->paypal_client_secret);
        Session::put("paypal_mode", $store->paypal_mode);
        Session::put("orderstatus", $store->order_status);
        Session::put("logo", asset("public/upload/web/") . '/' . $store->logo);
        Session::put("main_banner", asset("public/upload/web/") . '/' . $store->main_banner);
        Session::put("second_sec_img", asset("public/upload/web/") . '/' . $store->second_sec_img);
        Session::put("secong_icon_img", asset("public/upload/web/") . '/' . $store->secong_icon_img);
        Session::put("footer_up_img", asset("public/upload/web/") . '/' . $store->footer_up_img);
        Session::put("footer_img", asset("public/upload/web/") . '/' . $store->footer_img);
    }

    public function index()
    {
        $image_path = __DIR__ . "/bootstrap/cache/config.php";
        if (file_exists($image_path)) {
            try {
                unlink($image_path);
                Artisan::call('config:cache');
            } catch (Exception $e) {
            }
        }
        $store = Setting::find(1);
        Session::put("webcolor", $store->web_color);
        $getcurrency = User::find(1);
        $arr = explode("-", $getcurrency->currency);
        Session::put("usercurrency", $arr[1]);
        $category = Category::where("is_deleted", '0')->get();
        $item = Item::with('categoryitem')->where("is_deleted", '0')->get();
        foreach ($item as $k) {
            $menu_name = substr($k->menu_name, 0, 20);
            if ($menu_name != "") {
                $k->menu_name = $menu_name;
            }
        }
        $inter = Ingredient::all();
        $allmenu = Item::all();
        Session::put("current_year", date("Y"));
        $store = Setting::find(1);
        Session::put("facebook", $store->facebook_id);
        Session::put("twitter", $store->twitter_id);
        Session::put("linkedin", $store->linkedin_id);
        //Session::put("google_plus_id",$store->google_plus_id);
        Session::put("whatsapp", $store->whatsapp);
        Session::put("address", $store->address);
        Session::put("email", $store->email);
        Session::put("phone", $store->phone);
        Session::put("playstore", $store->play_store_url);
        Session::put("appstore", $store->app_store_url);
        Session::put("stripe_key", $store->stripe_key);
        Session::put("stripe_secret", $store->stripe_secret);
        Session::put("paypal_client_id", $store->paypal_client_id);
        Session::put("paypal_client_secret", $store->paypal_client_secret);
        Session::put("paypal_mode", $store->paypal_mode);
        Session::put("logo", asset("public/upload/web/") . '/' . $store->logo);
        Session::put("main_banner", asset("public/upload/web/") . '/' . $store->main_banner);
        Session::put("second_sec_img", asset("public/upload/web/") . '/' . $store->second_sec_img);
        Session::put("secong_icon_img", asset("public/upload/web/") . '/' . $store->secong_icon_img);
        Session::put("footer_up_img", asset("public/upload/web/") . '/' . $store->footer_up_img);
        Session::put("footer_img", asset("public/upload/web/") . '/' . $store->footer_img);
        $setting = Setting::find(1);
        Session::put("orderstatus", $setting->order_status);

        $popular_item = Item::inRandomOrder()->with('categoryitem')->where("is_deleted", '0')->take(16)->get();
        $popular_snacks_item = Item::latest()->with('categoryitem')->where('category', 8)->where("is_deleted", '0')->take(3)->get();

        $sliders = Slider::where('status', 1)->orderBy('order_id', 'DESC')->get();
        $banners = Banner::where('status', 1)->get();
        $bannersone = Banner::where('id', 1)->where('status', 1)->first();
        $bannerstwo = Banner::where('id', 2)->where('status', 1)->first();
        $bannersthree = Banner::where('id', 3)->where('status', 1)->first();
        $testimonials = Testimonial::where('status', 1)->get();
        return view("user.index")->with('testimonials', $testimonials)->with('bannersone', $bannersone)->with('bannerstwo', $bannerstwo)->with('bannersthree', $bannersthree)->with('banners', $banners)->with('sliders', $sliders)->with("category", $category)->with("items", $item)->with("ingredient", $inter)->with("allmenu", $allmenu)->with("setting", $setting)->with('popular_item', $popular_item)->with('popular_snacks_item', $popular_snacks_item);
    }

    public function detailitem($item_id)
    {
        $category = Category::where("is_deleted", '0')->get();
        $itemdetails = Item::find($item_id);
        // dd($itemdetails);
        $item = Item::with('categoryitem')->where("category", $itemdetails->category)->where("is_deleted", '0')->get();
        $interfi = Ingredient::where("menu_id", $item_id)->where("is_deleted", '0')->where('type', 0)->get();
        $interpi = Ingredient::where("menu_id", $item_id)->where("is_deleted", '0')->where('type', 1)->get();
        $allmenu = Item::all();
        $inter1 = Ingredient::all();
        $itemdata = Item::with('categoryitem')->where("is_deleted", '0')->get();
        $reviews = Review::where('item_id', $item_id)->where('status', 1)->get();
        return view("user.detailitem")->with('reviews', $reviews)->with("category", $category)->with("itemdetails", $itemdetails)->with("related_item", $item)->with("menu_interdientfi", $interfi)->with("menu_interdientpi", $interpi)->with("allmenu", $allmenu)->with("items", $itemdata)->with("menu_interdient", $inter1);
    }

    public function itemReview(Request $request)
    {
        $this->validate($request, [
            'item_id' =>  'required',
            'stars' =>  'required',
            'title' =>  'required',
            'comment' =>  'required',
        ]);

        $review = Review::where('item_id', $request->item_id)->where('user_id', Session::get('login_user'))->get();

        if($review->count() > 0) {

            Session::flash('message', __('You already review this item.'));
            return redirect()->back();

        }else {

            Review::insert([
                'user_id' => Session::get('login_user'),
                'item_id' => $request->item_id,
                'stars' => $request->stars,
                'title' => $request->title,
                'status' => 0,
                'comment' => $request->comment,
            ]);

            Session::flash('message', __('Your review successfully done. Please wait for admin approved.'));
            return redirect()->back();

        }

    }

    public function savecontact(Request $request)
    {
        $store = new Contact();
        $store->name = strip_tags(preg_replace('#<script(.*?)>(.*?)</script>#is', '', $request->get("name")));
        $store->email = strip_tags(preg_replace('#<script(.*?)>(.*?)</script>#is', '', $request->get("email")));
        $store->phone = strip_tags(preg_replace('#<script(.*?)>(.*?)</script>#is', '', $request->get("phone")));
        $store->message = strip_tags(preg_replace('#<script(.*?)>(.*?)</script>#is', '', $request->get("message")));
        $store->save();
        Session::flash('message', __('messages.contact_success'));
        Session::flash('alert-class', 'alert-success');
        return redirect("contactus");
    }
    public function category_list($id)
    {
        $category = Category::all();
        $item = Item::with('categoryitem')->where("category", $id)->where("is_deleted", '0')->get();
        foreach ($item as $k) {
            $k->menu_name = $k->menu_name;
            $k->description = $k->description;
        }
        $data = array("category" => $category, "item" => $item);
        return json_encode($data);
    }
    public function readMoreHelper($story_desc, $chars)
    {
        $story_desc = substr($story_desc, 0, $chars);
        $story_desc = substr($story_desc, 0, strrpos($story_desc, ' '));
        $story_desc = $story_desc . "...";
        return $story_desc;
    }
    function headreadMoreHelper($story_desc, $chars = 75)
    {
        $story_desc = substr($story_desc, 0, $chars);
        $story_desc = substr($story_desc, 0, strrpos($story_desc, ' '));
        $story_desc = $story_desc;
        return $story_desc;
    }
    public function sharesoicalmedia($media_id, $item_id)
    {
        $itemget = Item::find($item_id);
        if ($media_id == 1) {
            $itemget->facebook_share = (int)$itemget->facebook_share + 1;
            $itemget->save();
            return $itemget->facebook_share;
        }
        if ($media_id == 2) { //twitter
            $itemget->twitter_share = (int)$itemget->twitter_share + 1;
            $itemget->save();
            return $itemget->twitter_share;
        }
    }
    public function cartdetails()
    {
        $cartCollection = Cart::getContent();
        if ($cartCollection->count()) {
            foreach ($cartCollection  as $item) {
                $item_id = $item->id;
            }

            $setting = Setting::find(1);
            $category = Category::where("is_deleted", '0')->get();
            $itemdetails = Item::find($item_id);
            $item = Item::with('categoryitem')->where("is_deleted", '0')->get();
            $inter = Ingredient::all();
            $allmenu = Item::all();

            $itemdata = Item::with('categoryitem')->where("is_deleted", '0')->get();
            return view("user.cartdetails")->with("category", $category)->with("itemdetails", $itemdetails)->with("related_item", $item)->with("menu_interdient", $inter)->with("allmenu", $allmenu)->with("delivery_charges", $setting->delivery_charges)->with("items", $itemdata);
        } else {
            return redirect("/");
        }
    }


    public function showaboutus()
    {
        $category = Category::where("is_deleted", '0')->get();
        $allmenu = Item::all();
        $inter = Ingredient::all();
        $item = Item::with('categoryitem')->where("is_deleted", '0')->get();
        $aboutpage = DB::table('pages')->where('id', 1)->first();
        return view("user.about")->with("category", $category)->with("allmenu", $allmenu)->with("menu_interdient", $inter)->with("items", $item)->with('aboutpage', $aboutpage);
    }

    public function shop()
    {
        $category = Category::where("is_deleted", '0')->get();
        $allmenu = Item::all();
        $inter = Ingredient::all();
        $item = Item::with('categoryitem')->where("is_deleted", '0')->paginate(16);
        return view("user.shop")->with("category", $category)->with("allmenu", $allmenu)->with("menu_interdient", $inter)->with("items", $item);
    }

    public function shopCategory($id, $name)
    {
        $category = Category::where("is_deleted", '0')->get();
        $allmenu = Item::all();
        $inter = Ingredient::all();
        $item = Item::where('category', $id)->where("is_deleted", '0')->paginate(16);
        return view("user.shop")->with("category", $category)->with("allmenu", $allmenu)->with("menu_interdient", $inter)->with("items", $item);
    }

    public function viewdetails($id)
    {
        if (!Session::get("login_user")) {
            return redirect("/");
        }
        $order = Order::where("id", $id)->where("user_id", Session::get("login_user"))->first();
        if (empty($order)) {
            return redirect('myaccount');
        }
        $itemls = OrderResponse::with('itemdata')->where("set_order_id", $id)->get();
        $category = Category::where("is_deleted", '0')->get();
        $allmenu = Item::all();
        $inter = Ingredient::all();
        $item = Item::with('categoryitem')->where("is_deleted", '0')->get();
        return view("user.viewdetails")->with("category", $category)->with("allmenu", $allmenu)->with("menu_interdient", $inter)->with("items", $item)->with("order", $order)->with("itemlist", $itemls);
    }
    public function checkout(Request $request)
    {

        if ($request->get("delivery_option") == 0 || $request->get("delivery_option") == 1) {
            $category = Category::where("is_deleted", '0')->get();
            $allmenu = Item::all();
            $inter = Ingredient::all();
            $setting = Setting::find(1);
            $city = City::where("is_deleted", '0')->get();
            $ip = $_SERVER['REMOTE_ADDR'];

            $lat = 21.2284231;
            $long = 72.896816;
            $item = Item::with('categoryitem')->where("is_deleted", '0')->get();
            return view("user.checkout")->with("category", $category)->with("allmenu", $allmenu)->with("menu_interdient", $inter)->with("items", $item)->with("shipping", $request->get("delivery_option"))->with("delivery_charges", $setting->delivery_charges)->with("city", $city)->with('latitude', $lat)->with("longtitude", $long)->with("setting", $setting);
        } else {
            Session::flash('message', __('messages.shipping_error'));
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back();
        }
    }
    public function showcontactus()
    {
        $category = Category::where("is_deleted", '0')->get();
        $allmenu = Item::all();
        $inter = Ingredient::all();
        $item = Item::with('categoryitem')->where("is_deleted", '0')->get();
        return view("user.contact")->with("category", $category)->with("allmenu", $allmenu)->with("menu_interdient", $inter)->with("items", $item);
    }
    public function showservice()
    {
        $category = Category::where("is_deleted", '0')->get();
        $allmenu = Item::all();
        $inter = Ingredient::all();
        $item = Item::with('categoryitem')->where("is_deleted", '0')->get();
        return view("user.service")->with("category", $category)->with("allmenu", $allmenu)->with("menu_interdient", $inter)->with("items", $item);
    }

    public function termofuse()
    {
        $category = Category::where("is_deleted", '0')->get();
        $allmenu = Item::all();
        $inter = Ingredient::all();
        $item = Item::with('categoryitem')->where("is_deleted", '0')->get();
        $termofuse = DB::table('pages')->where('id', 2)->first();
        return view("user.term")->with("category", $category)->with("allmenu", $allmenu)->with("menu_interdient", $inter)->with("items", $item)->with('termofuse', $termofuse);
    }

    public function myaccount()
    {
        if (!Session::get("login_user")) {
            return redirect("/");
        }
        $category = Category::where("is_deleted", '0')->get();
        $allmenu = Item::all();
        $inter = Ingredient::all();
        $item = Item::with('categoryitem')->where("is_deleted", '0')->get();
        $myorder = Order::where("user_id", Session::get("login_user"))->orderby('id', 'DESC')->get();
        return view("user.myaccount")->with("category", $category)->with("allmenu", $allmenu)->with("menu_interdient", $inter)->with("items", $item)->with("myorder", $myorder);
    }
}
