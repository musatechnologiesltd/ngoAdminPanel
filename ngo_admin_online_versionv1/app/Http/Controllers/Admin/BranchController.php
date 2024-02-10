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
use App\Models\ForwardingLetterOnulipi;
class BranchController extends Controller
{
    public $user;


    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

   public function checkBranch(Request $request){

    $branchStep = $request->branchStep;

    $designationCount = Branch::where('branch_step',$branchStep )
    //->where('designation_serial',$designationSerial )
    ->count();


return $designationCount;

   }


   public function showBranchStep(Request $request){

    $branchId = $request->branchId;
    $branchStep = Branch::where('id',$branchId)->value('branch_step');

    return $branchStep;

   }

    public function index(){


        if (is_null($this->user) || !$this->user->can('branchAdd')) {
            //abort(403, 'Sorry !! You are Unauthorized to View !');
            return redirect()->route('mainLogin');
               }


               \LogActivity::addToLog('branch list ');


          $branchLists = Branch::where('id','!=',1)->orderBy('branch_step','asc')->get();

          $stepValue = Branch::orderBy('id','desc')->max('branch_step');

          //dd($stepValue);

               return view('admin.branchList.index',compact('branchLists','stepValue'));
           }


           public function store(Request $request){

            if (is_null($this->user) || !$this->user->can('branchAdd')) {
                //abort(403, 'Sorry !! You are Unauthorized to Add !');
                return redirect()->route('mainLogin');
            }

            $request->validate([
                'branch_name' => 'required',
                'branch_code' => 'required',
              ]);


              \LogActivity::addToLog('branch store ');




             $input = $request->all();

             Branch::create($input);




    return redirect()->route('branchList.index')->with('success','Added successfully!');



        }





        public function update(Request $request,$id){

            if (is_null($this->user) || !$this->user->can('branchUpdate')) {
                //abort(403, 'Sorry !! You are Unauthorized to Update !');
                return redirect()->route('mainLogin');
            }

            \LogActivity::addToLog('branch update ');

            $medicine = Branch::findOrFail($id);

            $input = $request->all();

            $medicine->fill($input)->save();

    return redirect()->route('branchList.index')->with('success','Updated successfully!');



        }


        public function destroy($id)
    {

        if (is_null($this->user) || !$this->user->can('branchDelete')) {
           // abort(403, 'Sorry !! You are Unauthorized to Delete !');
           return redirect()->route('mainLogin');
        }

        \LogActivity::addToLog('branch delete ');


        Branch::destroy($id);
        return redirect()->route('branchList.index')->with('error','Deleted successfully!');
    }
}
