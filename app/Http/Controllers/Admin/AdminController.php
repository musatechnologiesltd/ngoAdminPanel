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
use Mail;
use App\Models\JobHistory;
use App\Models\AdminDesignationHistory;
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


    public function forgetPassword(){

        return view('admin.user.forgetPassword');
    }


    public function checkMailForPassword(Request $request){

        $email = $request->mainId;

        $checkMail = Admin::where('email',$email)->count();

        return $checkMail;
    }


    public function checkMailPost(Request $request){



        Mail::send('emails.passwordChangeEmail', ['id' =>$request->email], function($message) use($request){
            $message->to($request->email);
            $message->subject('NGOAB Password Set');
        });


        return redirect()->route('newEmailNotify')->with('success','Email Send successfully!');


    }

    public function newEmailNotify(){

        return view('admin.user.newEmailNotify');
    }

    public function create(){
        if (is_null($this->user) || !$this->user->can('userAdd')) {
           // abort(403, 'Sorry !! You are Unauthorized to Add !');

           return redirect()->route('mainLogin');
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
           // abort(403, 'Sorry !! You are Unauthorized to Add !');
           return redirect()->route('mainLogin');
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
           // abort(403, 'Sorry !! You are Unauthorized to View !');

           return redirect()->route('mainLogin');
               }



              // dd($path);

              // dd(public_path().'\images');

        $users = Admin::where('id','!=',1)->get();
        $roles  = Role::all();

       return view('admin.user.index', compact('users','roles'));
    }


    public function store(Request $request)
    {

        if (is_null($this->user) || !$this->user->can('userAdd')) {
           // abort(403, 'Sorry !! You are Unauthorized to View !');
           return redirect()->route('mainLogin');
               }

               //dd($request->all());

        // Validation Data
        $request->validate([
            'name' => 'required|string|max:150',
            //'designation_list_id' => 'required|string|max:200',
            'phone' => 'required|string|size:11',
           // 'branch_id' => 'required|string|max:200',
           // 'admin_job_start_date' => 'required|date',
            // 'admin_job_end_date' => 'required|date',
            'sign' => 'required|file|mimes:jpeg,png,jpg',
            'image' => 'required|file|mimes:jpeg,png,jpg',
            'email' => 'required|max:100|email|unique:admins',
            // 'password' => 'required|min:8|confirmed',
        ],
        [
            'name.required' => 'Name is required',
           // 'designation_list_id.required' => 'designation is required',
            'phone.required' => 'Phone is required',
             // 'branch_id.required' => 'branch is required',
            //'admin_job_start_date.required' => 'Admin_job_start_date is required',
            // 'admin_job_end_date.required' => 'Admin_job_end_dateis required',
            'sign.required' => 'Sign is required',
            'image.required' => 'Image is required',
            'email.required' => 'Email is required',
            // 'password.required' => 'Password is required',
        ]);

        // $result = CommonController::imageUpload($request);

        // dd($result);




        // Create New User
        $admins = new Admin();
        $admins->admin_name = $request->name;
        $admins->admin_name_ban = $request->name_ban;
        $admins->designation_list_id = 1;
        $admins->branch_id = 1;
        //$admins->admin_job_start_date = $request->admin_job_start_date;
        // $admins->admin_job_end_date = $request->admin_job_end_date;
        $admins->admin_mobile = $request->phone;
        $admins->email = $request->email;
       // $admins->password = Hash::make(12345678);
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



        Mail::send('emails.passwordChangeEmail', ['id' =>$request->email], function($message) use($request){
            $message->to($request->email);
            $message->subject('NGOAB Password Set');
        });


        return redirect()->route('user.index')->with('success','Created successfully!');
    }


    public function update(Request $request,$id)
    {

        if (is_null($this->user) || !$this->user->can('userUpdate')) {
            //abort(403, 'Sorry !! You are Unauthorized to View !');
            return redirect()->route('mainLogin');
               }

        // Create New User
        $admins = Admin::find($id);
        $admins->admin_name = $request->name;
        $admins->admin_name_ban = $request->name_ban;
        $admins->designation_list_id = 1;
        $admins->branch_id = 1;
        //$admins->admin_job_start_date = $request->admin_job_start_date;
        // $admins->admin_job_end_date = $request->admin_job_end_date;
        $admins->admin_mobile = $request->phone;
        $admins->email = $request->email;
        if ($request->password) {
            // $admins->password = Hash::make($request->password);
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
            //abort(403, 'Sorry !! You are Unauthorized to View !');
            return redirect()->route('mainLogin');
               }

        $admins = Admin::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return redirect()->route('user.index')->with('error','Deleted successfully!');
    }



    public function accountPasswordChange($id){
       $email = $id;
       return view('admin.user.accountPasswordChange',compact('email'));

    }


  public function employeeEndDate(){
      $users = Admin::where('id','!=',1)->latest()->get();
      return view('admin.user.employeeEndDate',compact('users'));
  }

  public function getAdminDetail(Request $request){
    $user = Admin::where('id',$request->mainId)->first();
    $data = view('admin.user.getAdminDetail',compact('user'))->render();
    return response()->json($data);
  }


  public function employeeEndDatePost(request $request){

//dd($request->all());

$admin_job_end_date = date('Y-m-d', strtotime($request->admin_job_end_date));


    $getTheAdminValue = Admin::where('id',$request->id)->first();

 $admins = Admin::find($request->id);
 $admins->admin_job_end_start_date =$getTheAdminValue->admin_job_start_date;
 $admins->admin_job_end_date = $admin_job_end_date;
 $admins->admin_job_start_date = $request->admin_job_start_date;
//  $admins->designation_list_id = $request->designation_list_id;
//  $admins->branch_id = $request->branch_id;
 $admins->save();


 $jobHistory = new JobHistory();
 $jobHistory->admin_id  = $request->id;
 $jobHistory->designation_list_id  =$getTheAdminValue->designation_list_id;
 $jobHistory->start_date  = $getTheAdminValue->admin_job_start_date;
 $jobHistory->end_date  = $admin_job_end_date;


AdminDesignationHistory::where('id',$request->desi_id)->delete();




 return redirect()->back()->with('info','Added successfully!');
  }


    public function postPasswordChange(Request $request){

        $request->validate([

             'password' => 'required|min:8|confirmed',
        ],
        [

             'password.required' => 'Password is required',
        ]);


        $adminId = Admin::where('email',$request->mainEmail)->value('id');

        DB::table('admins')
        ->where('id', $adminId)

        ->update(array('password' =>Hash::make($request->password)));


        return redirect()->route('mainLogin')->with('success','Successfully Changed!');

    }
}
