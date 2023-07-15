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

    public function index(){


        if (is_null($this->user) || !$this->user->can('designationAdd')) {
            abort(403, 'Sorry !! You are Unauthorized to View !');
               }

          $medicineLists = DesignationList::latest()->get();



               return view('admin.designationList.index',compact('medicineLists'));
           }


           public function store(Request $request){

            if (is_null($this->user) || !$this->user->can('designationAdd')) {
                abort(403, 'Sorry !! You are Unauthorized to Add !');
            }

            $request->validate([
                'branch_id' => 'required',
                'designation_name' => 'required',
              ]);




             $input = $request->all();

             DesignationList::create($input);




    return redirect()->route('designationList.index')->with('success','Added successfully!');



        }





        public function update(Request $request,$id){

            if (is_null($this->user) || !$this->user->can('designationUpdate')) {
                abort(403, 'Sorry !! You are Unauthorized to Update !');
            }

            $medicine = DesignationList::findOrFail($id);

            $input = $request->all();

            $medicine->fill($input)->save();

    return redirect()->route('designationList.index')->with('success','Updated successfully!');



        }


        public function destroy($id)
    {

        if (is_null($this->user) || !$this->user->can('designationDelete')) {
            abort(403, 'Sorry !! You are Unauthorized to Delete !');
        }


        DesignationList::destroy($id);
        return redirect()->route('designationList.index')->with('error','Deleted successfully!');
    }
}
