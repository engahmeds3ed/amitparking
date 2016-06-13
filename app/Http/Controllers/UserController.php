<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Userdata;

class UserController extends Controller{

	public $api_link = "http://amit-learning.com/parkForMe/index.php";
    
    //function to list all user data
	public function index(){
		$userdata = Userdata::all();
		return view('user.home')->withuserdata($userdata);
	}

	//function to sync with online API
	function sync(){
		$api_data = json_decode(file_get_contents("http://amit-learning.com/parkForMe/index.php"));
		foreach($api_data->data as $userdata){
			Userdata::create((array)$userdata);
		}
		return redirect()->back();
	}

	public function create(){
		return view('user.create');
	}

	public function store(Request $request){
		$input = $request->all();
		$this->validate($request, [
			'id' => 'required',
			'langtitude' => 'required',
			'latitude' => 'required'
		]);
	    Userdata::create($input);
	    Session::flash('flash_message', 'User data successfully added!');
	    return redirect()->back();
	}

	public function edit($id){
		$userdata = Userdata::one($id);
	    return view('user.edit')->with("userdata",$userdata);
	}

	public function delete($id){
	    
	}

}
