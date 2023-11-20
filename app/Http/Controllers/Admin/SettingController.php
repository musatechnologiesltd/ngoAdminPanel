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


    public function testOne(){

        return view('admin.setting.testOne');
    }

    public function testTwo(Request $request){

        return $data = view('admin.setting.testTwo')->render();
    }


    public function index(){

        if (is_null($this->user) || !$this->user->can('profile.edit')) {
            //abort(403, 'Sorry !! You are Unauthorized to View !');
            return redirect()->route('mainLogin');
               }

        return view('admin.setting.setting');
    }



    public function basicInformationEdit(){
        if (is_null($this->user) || !$this->user->can('profile.edit')) {
            //abort(403, 'Sorry !! You are Unauthorized to View !');
            return redirect()->route('mainLogin');
               }

        return view('admin.setting.setting');

    }


    public function digitalSignatureEdit(){

        if (is_null($this->user) || !$this->user->can('profile.edit')) {
            //abort(403, 'Sorry !! You are Unauthorized to View !');
            return redirect()->route('mainLogin');
               }

        return view('admin.setting.digitalSignatureEdit');

    }

    public function store(Request $request){

        if (is_null($this->user) || !$this->user->can('profile.edit')) {
            //abort(403, 'Sorry !! You are Unauthorized to View !');
            return redirect()->route('mainLogin');
               }


               \LogActivity::addToLog('Profile Update.');

        $time_dy = time().date("Ymd");
        $admin =  Admin::find($request->id);
        $admin->admin_name = $request->admin_name;
        $admin->admin_name_ban = $request->admin_name_ban;
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



    public function digitalSignatureUpdate(Request $request){


        //dd($request->all());

        $time_dy = time().date("Ymd");

        if (is_null($this->user) || !$this->user->can('profile.edit')) {
            //abort(403, 'Sorry !! You are Unauthorized to View !');
            return redirect()->route('mainLogin');
               }


               \LogActivity::addToLog('Profile Update.');


        $admin =  Admin::find($request->id);



            $productImage = $request->file('admin_sign');
            $imageName = $time_dy.$productImage->getClientOriginalName();
            $directory = 'public/uploads/';
            $imageUrl = $directory.$imageName;

            $img=Image::make($productImage)->resize(300,80);
            $img->save($imageUrl);

             $admin->admin_sign =  'public/uploads/'.$imageName;


        $admin->save();

        return redirect()->back()->with('success','Updated Succesfully');




    }


}
