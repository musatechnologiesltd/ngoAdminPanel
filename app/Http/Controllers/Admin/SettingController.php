<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Image;
use Auth;
use Hash;
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


    public function passwordEdit(){

        if (is_null($this->user) || !$this->user->can('profile.edit')) {
            //abort(403, 'Sorry !! You are Unauthorized to View !');
            return redirect()->route('mainLogin');
               }

        return view('admin.setting.passwordEdit');
    }


    public function profilePictureEdit(){

        if (is_null($this->user) || !$this->user->can('profile.edit')) {
            //abort(403, 'Sorry !! You are Unauthorized to View !');
            return redirect()->route('mainLogin');
               }

        return view('admin.setting.profilePictureEdit');

    }

    public function store(Request $request){

        if (is_null($this->user) || !$this->user->can('profile.edit')) {
            //abort(403, 'Sorry !! You are Unauthorized to View !');
            return redirect()->route('mainLogin');
               }
               try{
                DB::beginTransaction();

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

    } catch (\Exception $e) {
        DB::rollBack();
        return redirect('/admin')->with('error','some thing went wrong ,this is why you redirect to dashboard');
    }

    }


    public function profilePictureUpdate(Request $request){

        $time_dy = time().date("Ymd");

        if (is_null($this->user) || !$this->user->can('profile.edit')) {
            //abort(403, 'Sorry !! You are Unauthorized to View !');
            return redirect()->route('mainLogin');
               }
               try{
                DB::beginTransaction();

               \LogActivity::addToLog('Profile Update.');


        $admin =  Admin::find($request->id);



            $productImage = $request->file('admin_image');
            $imageName = $time_dy.$productImage->getClientOriginalName();
            $directory = 'public/uploads/';
            $imageUrl = $directory.$imageName;

            $img=Image::make($productImage)->resize(300,300);
            $img->save($imageUrl);

             $admin->admin_image =  'public/uploads/'.$imageName;


        $admin->save();
        DB::commit();
        return redirect()->back()->with('success','Updated Succesfully');

    } catch (\Exception $e) {
        DB::rollBack();
        return redirect('/admin')->with('error','some thing went wrong ,this is why you redirect to dashboard');
    }

    }




    public function passwordUpdate(Request $request){

        $this->validate($request,[
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        try{
            DB::beginTransaction();
        $hashedPassword = Auth::guard('admin')->user()->password;
        if (Hash::check($request->old_password,$hashedPassword))
        {
            if (!Hash::check($request->password,$hashedPassword))
            {
                $user = Admin::find($request->id);
                $user->password = Hash::make($request->password);
                $user->save();
                // Toastr::success('Password Successfully Changed','Success');
                DB::commit();
                \LogActivity::addToLog('Logged Out.');
                Auth::guard('admin')->logout();
                return redirect()->route('login.index')->with('success','Updated Succesfully');
            } else {

                return redirect()->back()->with('error','New password cannot be the same as old password');
            }
        } else {

            return redirect()->back()->with('error','Current password not match');
        }

    } catch (\Exception $e) {
        DB::rollBack();
        return redirect('/admin')->with('error','some thing went wrong ,this is why you redirect to dashboard');
    }




    }



    public function digitalSignatureUpdate(Request $request){

        try{
            DB::beginTransaction();
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
        DB::commit();
        return redirect()->back()->with('success','Updated Succesfully');

    } catch (\Exception $e) {
        DB::rollBack();
        return redirect('/admin')->with('error','some thing went wrong ,this is why you redirect to dashboard');
    }



    }


}
