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


        if (is_null($this->user) || !$this->user->can('designationStepAdd')) {
            //abort(403, 'Sorry !! You are Unauthorized to View !');
            return redirect()->route('mainLogin');
               }

          $designationStepLists = DesignationStep::latest()->get();
          $designationLists = DesignationList::latest()->get();


               return view('admin.designationStepList.index',compact('designationLists','designationStepLists'));
           }


           public function store(Request $request){

            if (is_null($this->user) || !$this->user->can('designationStepAdd')) {
                //abort(403, 'Sorry !! You are Unauthorized to Add !');
                return redirect()->route('mainLogin');
            }


//dd($request->all());
            $request->validate([
                'designation_list_id' => 'required',
                'designation_step' => 'required',
                'designation_serial' => 'required',
              ]);




             $input = $request->all();

             DesignationStep::create($input);




    return redirect()->route('designationStepList.index')->with('success','Added successfully!');



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
