<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
class CountryController extends Controller
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


        if (is_null($this->user) || !$this->user->can('countryView')) {
            //abort(403, 'Sorry !! You are Unauthorized to view !');
            return redirect()->route('mainLogin');
        }

        \LogActivity::addToLog('country list ');


        $country_list = DB::table('countries')->orderBy('id','desc')->get();

        return view('admin.country.index',compact('country_list'));


    }


    public function store(Request $request){

        if (is_null($this->user) || !$this->user->can('countryAdd')) {
            //abort(403, 'Sorry !! You are Unauthorized to view !');
            return redirect()->route('mainLogin');
        }

        \LogActivity::addToLog('country store ');

        DB::table('countries')->insert(
            ['country_name_english' =>$request->name, 'country_name_bangla' =>$request->name_bn,'country_people_english' =>$request->city_eng, 'country_people_bangla' =>$request->city_bangla]
            );



            return redirect()->back()->with('success','Created Successfully');


    }


    public function update(Request $request,$id){
        if (is_null($this->user) || !$this->user->can('countryUpdate')) {
           // abort(403, 'Sorry !! You are Unauthorized to view !');
           return redirect()->route('mainLogin');
        }

        \LogActivity::addToLog('update country ');


        DB::table('countries')
            ->where('id', $id)
            ->update(['country_name_english' =>$request->name, 'country_name_bangla' =>$request->name_bn,'country_people_english' =>$request->city_eng, 'country_people_bangla' =>$request->city_bangla]);

            return redirect()->back()->with('info','Updated Successfully');
    }


    public function destroy($id)
    {
        //dd(1);
        if (is_null($this->user) || !$this->user->can('countryDelete')) {
            //abort(403, 'Sorry !! You are Unauthorized to view any country !');
            return redirect()->route('mainLogin');
        }


        \LogActivity::addToLog('country delete');


        $admins = DB::table('countries')->where('id',$id)->delete();



        return back()->with('error','Deleted successfully!');
    }
}
