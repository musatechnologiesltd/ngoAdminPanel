<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SystemInformation;
use Image;
use Auth;
class SystemInformationController extends Controller
{

    public $user;


    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }


    public function index(){

        if (is_null($this->user) || !$this->user->can('systemInformationView')) {
            //abort(403, 'Sorry !! You are Unauthorized to View !');
            return redirect()->route('mainLogin');
               }


        $systemInformation = SystemInformation::all();
        return view('admin.systemInformation.index',compact('systemInformation'));
    }



    public function store(Request $request){

        if (is_null($this->user) || !$this->user->can('systemInformationAdd')) {
            //abort(403, 'Sorry !! You are Unauthorized to View !');
            return redirect()->route('mainLogin');
               }

        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'url' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|string',
            'logo' => 'required',
            'icon' => 'required',
        ]);


        $time_dy = time().date("Ymd");


        $systemInformation =  new SystemInformation();
        $systemInformation->system_name = $request->name;
        $systemInformation->system_email = $request->email;
        $systemInformation->system_address = $request->address;
        $systemInformation->system_url = $request->url;
        $systemInformation->system_phone = $request->phone;
         if ($request->hasfile('logo')) {


            $productImage = $request->file('logo');
            $imageName = $time_dy.$productImage->getClientOriginalName();
            $directory = 'public/uploads/';
            $imageUrl = $directory.$imageName;

            $img=Image::make($productImage)->resize(187,32);
            $img->save($imageUrl);

             $systemInformation->system_logo =  'public/uploads/'.$imageName;

        }
        if ($request->hasfile('icon')) {


            $productImage = $request->file('icon');
            $imageName = $time_dy.$productImage->getClientOriginalName();
            $directory = 'public/uploads/';
            $imageUrl = $directory.$imageName;

            $img=Image::make($productImage)->resize(50,50);
            $img->save($imageUrl);

             $systemInformation->system_icon =  'public/uploads/'.$imageName;

        }
        $systemInformation->save();


    return redirect()->back()->with('success','Added Succesfully');



    }


    public function update(Request $request,$id){

        if (is_null($this->user) || !$this->user->can('systemInformationUpdate')) {
            //abort(403, 'Sorry !! You are Unauthorized to View !');
            return redirect()->route('mainLogin');
               }

        $time_dy = time().date("Ymd");


        $systemInformation = SystemInformation::find($id);
        $systemInformation->system_name = $request->name;
        $systemInformation->system_email = $request->email;
        $systemInformation->system_address = $request->address;
        $systemInformation->system_phone = $request->phone;
        $systemInformation->system_url = $request->url;
         if ($request->hasfile('logo')) {


            $productImage = $request->file('logo');
            $imageName = $time_dy.$productImage->getClientOriginalName();
            $directory = 'public/uploads/';
            $imageUrl = $directory.$imageName;

            $img=Image::make($productImage)->resize(187,32);
            $img->save($imageUrl);

             $systemInformation->system_logo =  'public/uploads/'.$imageName;

        }
        if ($request->hasfile('icon')) {


            $productImage = $request->file('icon');
            $imageName = $time_dy.$productImage->getClientOriginalName();
            $directory = 'public/uploads/';
            $imageUrl = $directory.$imageName;

            $img=Image::make($productImage)->resize(50,50);
            $img->save($imageUrl);

             $systemInformation->system_icon =  'public/uploads/'.$imageName;

        }
        $systemInformation->save();


    return redirect()->back()->with('success','Updated Succesfully');

    }
}
