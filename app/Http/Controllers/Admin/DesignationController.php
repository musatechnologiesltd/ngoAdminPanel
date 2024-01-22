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
use App\Models\DesignationList;
use App\Models\DesignationStep;
class DesignationController extends Controller
{
    public $user;


    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function getDesignationFromBranch(Request $request){

        $designationLists = DesignationList::where('branch_id',$request->branch_id)
        ->latest()->get();

        $data = view('admin.designationList.getDesignationFromBranch',compact('designationLists'))->render();
        return response()->json($data);

    }

    public function index(){


        if (is_null($this->user) || !$this->user->can('designationAdd')) {
                      return redirect()->route('mainLogin');
               }


               \LogActivity::addToLog('designation  list ');

          $branchLists = Branch::where('id','!=',1)->get();
          $designationLists = DesignationList::where('id','!=',1)->
          orderBy(
            Branch::select('branch_step')
                ->whereColumn('designation_lists.branch_id', 'branches.id'),
            'asc'
        )->orderBy('designation_serial','asc')->get();

        return view('admin.designationList.index',compact('branchLists','designationLists'));
           }


           public function checkDesignation(Request $request){

            \LogActivity::addToLog('designation check ');

            $branchId = $request->branchId;
            $designationName = $request->designationName;
            $designationStep = $request->designationStep;
            $designationSerial = $request->designationSerial;

            $designationCount = DesignationList::where('branch_id',$branchId)
            ->where('designation_serial',$designationSerial )->count();

            return $designationCount;

           }


           public function store(Request $request){

            if (is_null($this->user) || !$this->user->can('designationAdd')) {
                   return redirect()->route('mainLogin');
            }

            $request->validate([
                'branch_id' => 'required',
                'designation_name' => 'required',
              ]);

              \LogActivity::addToLog('designation store ');

            $input = $request->all();
            $dataInsert = new DesignationList();
            $dataInsert->branch_id = $request->branch_id;
            $dataInsert->designation_name = $request->designation_name;
            $dataInsert->designation_serial = $request->serial_part_one.'.'.$request->serial_pert_two;
            $dataInsert->save();

            return redirect()->route('designationList.index')->with('success','Added successfully!');


        }


        public function update(Request $request,$id){

            if (is_null($this->user) || !$this->user->can('designationUpdate')) {
               return redirect()->route('mainLogin');
            }

            \LogActivity::addToLog('designation update ');


            $designationLists = DesignationList::findOrFail($id);

            $input = $request->all();

            $designationLists->fill($input)->save();

    return redirect()->route('designationList.index')->with('success','Updated successfully!');

}


        public function destroy($id)
    {

        if (is_null($this->user) || !$this->user->can('designationDelete')) {
            //abort(403, 'Sorry !! You are Unauthorized to Delete !');
            return redirect()->route('mainLogin');
        }

        \LogActivity::addToLog('designation delete ');
        DesignationList::destroy($id);
        return redirect()->route('designationList.index')->with('error','Deleted successfully!');
    }
}
