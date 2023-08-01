<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Illuminate\Support\Str;
use Mail;
use DB;
use PDF;
use Carbon\Carbon;
use Response;
use App\Models\Branch;
use App\Models\Admin;
use App\Models\DesignationList;
use App\Models\DesignationStep;
class DesignationStepController extends Controller
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


        if (is_null($this->user) || !$this->user->can('assignedEmployee.view')) {
            //abort(403, 'Sorry !! You are Unauthorized to View !');
            return redirect()->route('mainLogin');
               }

               $branchLists = Branch::where('id','!=',1)->orderBy('branch_step','asc')->get();





               $designationLists = DesignationList::where('id','!=',1)->
               orderBy(
                 Branch::select('branch_step')
                     ->whereColumn('designation_lists.branch_id', 'branches.id'),
                 'asc'
             )->orderBy('designation_serial','asc')->get();

          $designationStepLists = DesignationStep::latest()->get();
          //$designationLists = DesignationList::latest()->get();
          $users = Admin::where('id','!=',1)->get();
          $users_as = Admin::where('id','!=',1)->get();

               return view('admin.designationStepList.index',compact('users_as','users','branchLists','designationLists','designationStepLists'));
           }


           public function store(Request $request){

            if (is_null($this->user) || !$this->user->can('assignedEmployee.edit')) {
                //abort(403, 'Sorry !! You are Unauthorized to Add !');
                return redirect()->route('mainLogin');
            }

//dd($request->all());
//
            $request->validate([
                'designation_list_id' => 'required',
                'adminId' => 'required',
                'admin_job_start_date' => 'required',
              ]);




             $dateFormate = date('Y-m-d', strtotime($request->admin_job_start_date));



                //dd($dateFormate);


                $newData = Admin::find($request->adminId);
                $newData->branch_id = $request->branchId;
                $newData->designation_list_id = $request->designation_list_id;
                $newData->admin_job_start_date = $dateFormate;
                $newData->save();




            //   }


          //  }




    return redirect()->route('assignedEmployee.index')->with('success','Added successfully!');



        }





        public function update(Request $request,$id){

            if (is_null($this->user) || !$this->user->can('designationStepUpdate')) {
                //abort(403, 'Sorry !! You are Unauthorized to Update !');
                return redirect()->route('mainLogin');
            }

            $medicine = DesignationStep::findOrFail($id);

            $input = $request->all();

            $medicine->fill($input)->save();

    return redirect()->route('designationStepList.index')->with('success','Updated successfully!');



        }


        public function destroy($id)
    {

        if (is_null($this->user) || !$this->user->can('designationStepDelete')) {
            //abort(403, 'Sorry !! You are Unauthorized to Delete !');
            return redirect()->route('mainLogin');
        }


        DesignationStep::destroy($id);
        return redirect()->route('designationStepList.index')->with('error','Deleted successfully!');
    }
}
