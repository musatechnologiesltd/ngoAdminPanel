<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use File;
use App\Models\Branch;
use App\Models\DesignationList;
use App\Models\DesignationStep;
class AdminController extends Controller
{


    public $user;


    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }


    public function create(){
        if (is_null($this->user) || !$this->user->can('userAdd')) {
            abort(403, 'Sorry !! You are Unauthorized to Add !');
               }



              // dd($path);

              // dd(public_path().'\images');
        $branchLists = Branch::latest()->get();
        $users = Admin::all();
        $roles  = Role::all();

       return view('admin.user.create', compact('branchLists','users','roles'));
    }


    public function edit($id){
        if (is_null($this->user) || !$this->user->can('userAdd')) {
            abort(403, 'Sorry !! You are Unauthorized to Add !');
               }

               $designationLists = DesignationList::latest()->get();

              // dd($path);

              // dd(public_path().'\images');
        $branchLists = Branch::latest()->get();
        $user = Admin::find($id);
        $roles  = Role::all();

       return view('admin.user.edit', compact('designationLists','branchLists','user','roles'));
    }



    public function index()
    {

        if (is_null($this->user) || !$this->user->can('userView')) {
            abort(403, 'Sorry !! You are Unauthorized to View !');
               }



              // dd($path);

              // dd(public_path().'\images');

        $users = Admin::all();
        $roles  = Role::all();

       return view('admin.user.index', compact('users','roles'));
    }


    public function store(Request $request)
    {

        if (is_null($this->user) || !$this->user->can('userAdd')) {
            abort(403, 'Sorry !! You are Unauthorized to View !');
               }

               //dd($request->all());

        // Validation Data
        $request->validate([
            'name' => 'required|string|max:150',
            'designation_list_id' => 'required|string|max:200',
            'phone' => 'required|string|size:11',
            'branch_id' => 'required|string|max:200',
            'admin_job_start_date' => 'required|date',
            'admin_job_end_date' => 'required|date',
            'sign' => 'required|file|mimes:jpeg,png,jpg',
            'image' => 'required|file|mimes:jpeg,png,jpg',
            'email' => 'required|max:100|email|unique:admins',
            'password' => 'required|min:8|confirmed',
        ],
        [
            'name.required' => 'Name is required',
            'designation_list_id.required' => 'designation is required',
            'phone.required' => 'Phone is required',
            'branch_id.required' => 'branch is required',
            'admin_job_start_date.required' => 'Admin_job_start_date is required',
            'admin_job_end_date.required' => 'Admin_job_end_dateis required',
            'sign.required' => 'Sign is required',
            'image.required' => 'Image is required',
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
        ]);

        // $result = CommonController::imageUpload($request);

        // dd($result);




        // Create New User
        $admins = new Admin();
        $admins->admin_name = $request->name;
        $admins->admin_name_ban = $request->name_ban;
        $admins->designation_list_id = $request->designation_list_id;
        $admins->branch_id = $request->branch_id;
        $admins->admin_job_start_date = $request->admin_job_start_date;
        $admins->admin_job_end_date = $request->admin_job_end_date;
        $admins->admin_mobile = $request->phone;
        $admins->email = $request->email;
        $admins->password = Hash::make($request->password);
        $filePath = 'adminImage';
        if ($request->hasfile('image')) {


            $file = $request->file('image');
            $admins->admin_image =  CommonController::imageUpload($request,$file,$filePath);

        }

        if ($request->hasfile('sign')) {

            $file = $request->file('sign');
            $admins->admin_sign =  CommonController::imageUpload($request,$file,$filePath);

        }


        $admins->save();

        if ($request->roles) {
            $admins->assignRole($request->roles);
        }


        return redirect()->route('user.index')->with('success','Created successfully!');
    }


    public function update(Request $request,$id)
    {

        if (is_null($this->user) || !$this->user->can('userUpdate')) {
            abort(403, 'Sorry !! You are Unauthorized to View !');
               }

        // Create New User
        $admins = Admin::find($id);
        $admins->admin_name = $request->name;
        $admins->admin_name_ban = $request->name_ban;
        $admins->designation_list_id = $request->designation_list_id;
        $admins->branch_id = $request->branch_id;
        $admins->admin_job_start_date = $request->admin_job_start_date;
        $admins->admin_job_end_date = $request->admin_job_end_date;
        $admins->admin_mobile = $request->phone;
        $admins->email = $request->email;
        if ($request->password) {
            $admins->password = Hash::make($request->password);
        }
        $filePath = 'adminImage';
        if ($request->hasfile('image')) {


            $file = $request->file('image');
            $admins->admin_image =  CommonController::imageUpload($request,$file,$filePath);

        }

        if ($request->hasfile('sign')) {

            $file = $request->file('sign');
            $admins->admin_sign =  CommonController::imageUpload($request,$file,$filePath);

        }

        $admins->save();

        $admins->roles()->detach();
        if ($request->roles) {
            $admins->assignRole($request->roles);
        }


        return redirect()->route('user.index')->with('success','Updated successfully!');;
    }


    public function destroy($id)
    {

        if (is_null($this->user) || !$this->user->can('userDelete')) {
            abort(403, 'Sorry !! You are Unauthorized to View !');
               }

        $admins = Admin::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return redirect()->route('user.index')->with('error','Deleted successfully!');
    }
}
