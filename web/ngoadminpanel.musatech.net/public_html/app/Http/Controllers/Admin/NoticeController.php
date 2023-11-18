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
use App\Models\Notice;
use App\Models\ForwardingLetterOnulipi;
class NoticeController extends Controller
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


        if (is_null($this->user) || !$this->user->can('noticeAdd')) {
            //abort(403, 'Sorry !! You are Unauthorized to View !');
            return redirect()->route('mainLogin');
               }


               \LogActivity::addToLog('notice list ');

          $noticeLists = Notice::latest()->get();

               return view('admin.noticeLists.index',compact('noticeLists'));
           }



           public function store(Request $request){

            if (is_null($this->user) || !$this->user->can('noticeAdd')) {
                //abort(403, 'Sorry !! You are Unauthorized to view any country !');
                return redirect()->route('mainLogin');
            }


            \LogActivity::addToLog(' create notice ');


            $noticeLists = new Notice();
            $noticeLists->headline = $request->headline;


            if ($request->hasfile('pdf')) {
               $filePath="Notice";
               $file = $request->file('pdf');
               $noticeLists->pdf =CommonController::pdfUpload($request,$file,$filePath);

           }

           $noticeLists->save();

           return redirect()->back()->with('success','Created Successfully');
           }


           public function update(Request $request){

            if (is_null($this->user) || !$this->user->can('noticeUpdate')) {
                //abort(403, 'Sorry !! You are Unauthorized to view any country !');
                return redirect()->route('mainLogin');
            }

            \LogActivity::addToLog(' update notice ');


            $noticeLists =Notice::find($request->id);
            $noticeLists->headline = $request->headline;


            if ($request->hasfile('pdf')) {
               $filePath="Notice";
               $file = $request->file('pdf');
               $noticeLists->pdf =CommonController::pdfUpload($request,$file,$filePath);

           }

           $noticeLists->save();

           return redirect()->back()->with('success','Updated Successfully');
           }


           public function destroy($id)
           {
               //dd(1);
               if (is_null($this->user) || !$this->user->can('noticeDelete')) {
                   //abort(403, 'Sorry !! You are Unauthorized to view any country !');
                   return redirect()->route('mainLogin');
               }

               \LogActivity::addToLog(' delete notice ');


               $admins = Notice::where('id',$id)->delete();



               return back()->with('error','Deleted successfully!');
           }
}
