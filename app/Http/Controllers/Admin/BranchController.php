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

    public function index(){


        if (is_null($this->user) || !$this->user->can('branchAdd')) {
            abort(403, 'Sorry !! You are Unauthorized to View !');
               }

          $branchLists = Branch::latest()->get();



               return view('admin.branchList.index',compact('branchLists'));
           }


           public function store(Request $request){

            if (is_null($this->user) || !$this->user->can('branchAdd')) {
                abort(403, 'Sorry !! You are Unauthorized to Add !');
            }

            $request->validate([
                'branch_name' => 'required',
                'branch_code' => 'required',
              ]);




             $input = $request->all();

             Branch::create($input);




    return redirect()->route('branchList.index')->with('success','Added successfully!');



        }





        public function update(Request $request,$id){

            if (is_null($this->user) || !$this->user->can('branchUpdate')) {
                abort(403, 'Sorry !! You are Unauthorized to Update !');
            }

            $medicine = Branch::findOrFail($id);

            $input = $request->all();

            $medicine->fill($input)->save();

    return redirect()->route('branchList.index')->with('success','Updated successfully!');



        }


        public function destroy($id)
    {

        if (is_null($this->user) || !$this->user->can('branchDelete')) {
            abort(403, 'Sorry !! You are Unauthorized to Delete !');
        }


        Branch::destroy($id);
        return redirect()->route('branchList.index')->with('error','Deleted successfully!');
    }
}
