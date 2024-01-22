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

        \LogActivity::addToLog('forgetPassword');

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
                 return redirect()->route('mainLogin');
               }

               \LogActivity::addToLog('create employee ');
;
        $branchLists = Branch::latest()->get();
        $users = Admin::all();
        $roles  = Role::all();

       return view('admin.user.create', compact('branchLists','users','roles'));
    }


    public function edit($id){
        if (is_null($this->user) || !$this->user->can('userAdd')) {
                   return redirect()->route('mainLogin');
               }

               \LogActivity::addToLog('edit employee list');

               $designationLists = DesignationList::latest()->get();
               $branchLists = Branch::latest()->get();
               $user = Admin::find($id);
               $roles  = Role::all();

       return view('admin.user.edit', compact('designationLists','branchLists','user','roles'));
    }



    public function index()
    {

        if (is_null($this->user) || !$this->user->can('userView')) {
                   return redirect()->route('mainLogin');
               }


               \LogActivity::addToLog('view employee list');

               $users = Admin::where('id','!=',1)->get();
               $roles  = Role::all();

       return view('admin.user.index', compact('users','roles'));
    }


    public function store(Request $request)
    {

        if (is_null($this->user) || !$this->user->can('userAdd')) {
                   return redirect()->route('mainLogin');
               }
               \LogActivity::addToLog(' employee store');


        // Validation Data
        $request->validate([
            'name' => 'required|string|max:150',
            'phone' => 'required|string|size:11',
            'sign' => 'nullable|file|mimes:jpeg,png,jpg',
            'image' => 'nullable|file|mimes:jpeg,png,jpg',
            'email' => 'required|max:100|email|unique:admins',
        ],
        [
            'name.required' => 'Name is required',
            'phone.required' => 'Phone is required',
            'sign.required' => 'Sign is required',
            'image.required' => 'Image is required',
            'email.required' => 'Email is required',
        ]);


        // Create New User
        $admins = new Admin();
        $admins->admin_name = $request->name;
        $admins->admin_name_ban = $request->name_ban;
        $admins->designation_list_id = 1;
        $admins->branch_id = 1;
        $admins->admin_mobile = $request->phone;
        $admins->email = $request->email;
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
                   return redirect()->route('mainLogin');
               }

               \LogActivity::addToLog('update employee list');

               $adminEmail = Admin::where('id',$id)->value('email');


        // Create New User
        $admins = Admin::find($id);
        $admins->admin_name = $request->name;
        $admins->admin_name_ban = $request->name_ban;
        $admins->admin_mobile = $request->phone;
        $admins->email = $request->email;
        $filePath = 'adminImage';
        if ($request->hasfile('image')) {

            $file = $request->file('image');
            $admins->admin_image =  CommonController::imageUpload($request,$file,$filePath);

        }

        if ($request->hasfile('sign')) {

            $file = $request->file('sign');
            $admins->admin_sign =  CommonController::imageUpload($request,$file,$filePath);

        }


        if($adminEmail == $request->email){
        }else{
            Mail::send('emails.passwordChangeEmail', ['id' =>$request->email], function($message) use($request){
                $message->to($request->email);
                $message->subject('NGOAB Password Set');
            });

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
                   return redirect()->route('mainLogin');
               }

               \LogActivity::addToLog('delete employee from list');


        $admins = Admin::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return redirect()->route('user.index')->with('error','Deleted successfully!');
    }



    public function accountPasswordChange($id){

        \LogActivity::addToLog('accountPasswordChange');
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

    \LogActivity::addToLog('employeeEndDatePost');

    $admin_job_end_date = date('Y-m-d', strtotime($request->admin_job_end_date));
    $getTheAdminValue = Admin::where('id',$request->id)->first();

    $admins = Admin::find($request->id);
    $admins->admin_job_end_start_date =$getTheAdminValue->admin_job_start_date;
    $admins->admin_job_end_date = $admin_job_end_date;
    $admins->admin_job_start_date = $request->admin_job_start_date;
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
