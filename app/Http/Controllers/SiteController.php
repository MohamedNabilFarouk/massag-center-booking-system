<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Slide;
use App\Models\Review;
use App\Models\Prices;
use App\Models\Subscriber;
use App\Models\Package;
use App\Models\Service;
use App\Models\Team;
use App\Models\Product;
use App\Models\News;
use App\Http\Controllers\Controller;


use Carbon\Carbon;
use Illuminate\Http\Request;


class SiteController extends Controller
{
    //return all data in home page

    public function getHomePage(){
    $slider = Slide::where('published','1')->get();
     $services = Service::limit(8)->get();
     $products = Product::orderBy('id','DESC')->limit(10)->get();
     $plan = Package::where('home_page','1')->orderBy('id','DESC')->limit(3)->get();
    $news = News::where('published','1')->orderBy('id','Desc')->limit(3)->get();
    $reviews = Review::all();




// google reviews




// $cid = 194604053573767737; //CID of a place can be genrated from https://pleper.com/index.php?do=tools&sdo=cid_converter
// //execute curl
// $url = 'https://maps.googleapis.com/maps/api/place/details/json?cid='.$cid.'&key=<API-KEY>';
// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_HEADER, 1);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_HEADER, false);
// $data = curl_exec($ch);
// curl_close($ch);

// $arrayData = json_decode($data, true); // json object to array conversion
// $result = $arrayData['result'];

// $total_users    = $result['user_ratings_total']; // display total number of users who rated
// $overall_rating = $result['rating']; // display total average rating
// $reviews        = $result['reviews'];   //holds information like author_name, author_url, language, profile_photo_url, rating, relative_time_description, text, time

// //display on view
// // dd($total_users);
// // dd($overall_ratings);
// dd($reviews);




// end google reviews







//    dd( $news  );
        // dd($slider);
        return view('site.index',compact('slider','reviews','news','services','products','plan'));
    }


     //get contact page
    public function contact(){
        return view('site.contact');
    }
    public function about(){
        $team= Team::all();
        return view('site.about',compact('team'));
    }

    // send message from contact page
    public function set_contactus(Request $request){
        $data = $request -> validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string',
            'message' => 'required',
        ]);
        $data = $request->all();
        Contact::create($data);
        session() -> flash('success', trans('Sent Successfully'));
        return redirect()->back();
    }
    public function getServices(){
        $services = Service::paginate(5);
        return view('site.services',compact('services'));
    }
    public function getAllNews(){
        $news = News::where('published','1')->paginate(5);
        return view('site.allnews',compact('news'));
    }

    public function getOurReviews(){
        $reviews = Review::where('published','1')->paginate(5);
        return view('site.our_reviews',compact('reviews'));
    }
    public function getNews($slug){
        $news = News::where('slug',$slug)->first();
        $all =News::where('id','!=',$news->id)->get();
        // dd($news);
        return view('site.news',compact('news','all'));
    }

    public function getPackages(){
        $Packages = Package::paginate(6);
        return view('site.packages',compact('Packages'));
    }
    public function addSubscriber(Request $request){
        $data = $request -> validate([
            'email' => 'required|unique:subscribers,email',
        ]);
        $data = $request->all();
        Subscriber::create($data);
        session() -> flash('success', trans('Sent Successfully'));
        return redirect()->back();
    }


    public function productDetails($slug){
        $product = Product::where('slug',$slug)->with('gallery')->first();
        $related = Product::where('id','!=',$product->id)->orderBy('id','DESC')->limit(8)->get();
        return view('site.product_details',compact('product','related'));
    }
    public function serviceDetails($id){
        $service = Service::where('id',$id)->first();
        $related = service::where('id','!=',$service->id)->orderBy('id','DESC')->limit(8)->get();
        return view('site.service_details',compact('service','related'));
    }
    public function shop(){
        $products = Product::paginate(6);
        return view('site.shop',compact('products'));
    }
}
