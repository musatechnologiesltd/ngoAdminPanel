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
            abort(403, 'Sorry !! You are Unauthorized to View !');
               }

        return view('admin.setting.setting');
    }


    public function store(Request $request){

        if (is_null($this->user) || !$this->user->can('profile.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to View !');
               }

        $time_dy = time().date("Ymd");
        $admin =  Admin::find($request->id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->position = $request->position;
        $admin->phone = $request->phone;
         if ($request->hasfile('image')) {


            $productImage = $request->file('image');
            $imageName = $time_dy.$productImage->getClientOriginalName();
            $directory = 'public/uploads/';
            $imageUrl = $directory.$imageName;

            $img=Image::make($productImage)->resize(100,100);
            $img->save($imageUrl);

             $admin->image =  'public/uploads/'.$imageName;

        }
        $admin->save();

        return redirect()->back()->with('success','Updated Succesfully');
    }


}
