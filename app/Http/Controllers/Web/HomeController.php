<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\District;
use App\Models\Post;
use App\Models\Province;
use App\Models\SetCalendar;
use App\Models\User;
use App\Models\Ward;
use Auth;
use Illuminate\Http\Request;
use Session;

class HomeController extends Controller
{
    protected $customer;
    protected $set_calendar;

    public function __construct(
        User $customer,
        SetCalendar $set_calendar
    ) {
        $this->customer = $customer;
        $this->set_calendar = $set_calendar;
    }

    public function changeLang($lang)
    {
        Session::put('website_language', $lang);
        return redirect()->back();
    }

    public function change_lang($lang)
    {
        Session::put('website_language', $lang);

        return redirect()->back();
    }

    public function getIndex()
    {
        $province = Province::all()->pluck('name', 'id');
        $districts = District::all()->pluck('name', 'id');
        $ward = Ward::all()->pluck('name', 'id');
        $apartment_acreage = Apartment::getApartments()->get()->pluck('acreage', 'id');
        $allApartment = Apartment::getApartments()->paginate(10);
        $posts = Post::where('status', 1)->orderBy('id', 'DESC')->take(2)->get();
        return view('layout.listProducts', compact('province', 'districts', 'ward', 'apartment_acreage', 'allApartment', 'posts'));
    }

    public function searchApartment(Request $request)
    {
        $province_search = Province::all()->pluck('name', 'id');
        $districts_search = District::all()->pluck('name', 'id');
        $ward_search = Ward::all()->pluck('name', 'id');
        $apartment_acreage_search = Apartment::getApartments()->get()->pluck('acreage', 'id');

        $province = $request->province;
        $districts = $request->districts;
        $ward = $request->ward;
        $bedrooms = $request->bedrooms;
        $Toilet = $request->Toilet;
        $apartment_acreage = $request->apartment_acreage;
        $min_price = $request->min_price;
        $max_price = $request->max_price;
        $search = Apartment::getApartments()->where('address', 'like', '%' . $province . '%')->orWhere('address', 'like', '%' . $districts . '%')->orWhere('address', 'like', '%' . $ward . '%')->orWhere('bedrooms', 'like', '%' . $bedrooms . '%')->orWhere('Toilet', 'like', '%' . $Toilet . '%')->orWhere('acreage', '<=', $apartment_acreage)->orWhere('price', 'like', '%' . $min_price . '%')->orWhere('price', 'like', '%' . $max_price . '%')->take(50)->paginate(10);
        return view('layout.result_search', compact(
            'province',
            'districts',
            'ward',
            'bedrooms',
            'Toilet',
            'apartment_acreage',
            'search',
            'min_price',
            'max_price',
            'province_search',
            'districts_search',
            'ward_search',
            'apartment_acreage_search'
        ));
    }

    public function apartmentDetail($slug)
    {
        $province = Province::all()->pluck('name', 'id');
        $districts = District::all()->pluck('name', 'id');
        $ward = Ward::all()->pluck('name', 'id');
        // $apartment_acreage = Apartment::getApartments()->get()->pluck('acreage', 'id');
        $apartmentDetail = Apartment::getApartments()->where('slug', $slug)->first();
        $newsAprtment = Apartment::getApartments()->take(3)->get();
        $posts = Post::where('status', 1)->get();
        return view('layout.product_detail', compact('apartmentDetail', 'province', 'districts', 'ward', 'apartment_acreage', 'newsAprtment', 'posts'));
    }

    public function register()
    {
        return view('layout.register');
    }

    public function registerLogin(Request $request)
    {
        $request->merge(['password' => bcrypt($request->password)]);
        $request->merge(['role' => 2]);
        $this->customer->create($request->all());
        return redirect()->route('home');
    }

    public function logincustomers(Request $request)
    {
        $customerLogin = ['email' => $request->email, 'password' => $request->password, 'role' => 2];
        if (Auth::attempt($customerLogin)) {
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    public function logOutCustomer()
    {
        Auth::logout();
        return redirect()->back();
    }

    public function set_calendars_view($id)
    {
        $apartmentOrder = Apartment::find($id);
        return view('layout.set_calendars', compact('apartmentOrder'));
    }
    public function set_calendars(Request $request)
    {
        $this->set_calendar->create($request->all());
        return redirect()->route('thong-bao');
    }

    public function message()
    {
        return view('layout.message_set_calendar');
    }

    public function post($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $posts = Post::where('status', 1)->take(3)->get();
        $newsAprtment = Apartment::getApartments()->take(3)->get();
        return view('layout.post_detail', compact('post', 'newsAprtment', 'posts'));
    }

    public function searchPost(Request $request)
    {
        $key_post = $request->key_post;
        $check_key = Post::where('status', 1)->where('title', 'like', '%' . $key_post . '%')->get();

        return view('layout.search_post', compact('check_key', 'key_post'));
    }
}
