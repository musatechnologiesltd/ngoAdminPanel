<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Image;
use Auth;
class SettingController extends Controller
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

        if (is_null($this->user) || !$this->user->can('profile.edit')) {
            //abort(403, 'Sorry !! You are Unauthorized to View !');
            return redirect()->route('mainLogin');
               }

        return view('admin.setting.setting');
    }


    public function store(Request $request){

        if (is_null($this->user) || !$this->user->can('profile.edit')) {
            //abort(403, 'Sorry !! You are Unauthorized to View !');
            return redirect()->route('mainLogin');
               }

        $time_dy = time().date("Ymd");
        $admin =  Admin::find($request->id);
        $admin->admin_name = $request->admin_name;
        $admin->email = $request->email;
        $admin->admin_mobile = $request->admin_mobile;
         if ($request->hasfile('admin_image')) {


            $productImage = $request->file('admin_image');
            $imageName = $time_dy.$productImage->getClientOriginalName();
            $directory = 'public/uploads/';
            $imageUrl = $directory.$imageName;

            $img=Image::make($productImage)->resize(100,100);
            $img->save($imageUrl);

             $admin->admin_image =  'public/uploads/'.$imageName;

        }

        if ($request->hasfile('admin_sign')) {


            $productImage = $request->file('admin_sign');
            $imageName = $time_dy.$productImage->getClientOriginalName();
            $directory = 'public/uploads/';
            $imageUrl = $directory.$imageName;

            $img=Image::make($productImage)->resize(100,100);
            $img->save($imageUrl);

             $admin->admin_sign =  'public/uploads/'.$imageName;

        }
        $admin->save();

        return redirect()->back()->with('success','Updated Succesfully');
    }


}
