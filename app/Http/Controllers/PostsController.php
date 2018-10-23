<?php

namespace App\Http\Controllers;
use App\User;
use App\Applicant;
use App\ContactPerson;
use App\Designation;
use App\Department;
use App\BusinessPartners;
use App\Role;
use App\Http\Controllers\Controller;
use Yajra\Datatables\DataTables;
use Illuminate\Http\Request;
use \Input as Input;
use Session;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    //
    public function index(){


        $posts = User::orderBy('created', 'desc')->get();
        $roles = Role::orderBy('id', 'asc')->get();
        $pic= User::all();
    	return view('posts.index', ['posts' => $posts, 'roles' => $roles, 'pic' => $pic]);
    }


    public function anyData()
    {

        $posts = User::select('id','employee_id','contact_id','designation_id','department_id','company_id','username','role','user_image')->with("employee")
                ->with('department_user')
                ->with('designation_user')
                ->with('business_partner_user')
                ->get();

        return Datatables::of($posts)->make();
    }

    public function details($id){
    	$posts = User::find($id);

    	return view('posts.details', ['posts' => $posts]);
    }

    public function loadEmployeeDetails($id){
        $employee = ContactPerson::find($id);
        $department = $employee->department_contact_person->dept_name;
        $designation = $employee->designation_contact_person->designation;
        $data =  ["department"=>$department,"designation"=>$designation];
        return json_encode($data);
    }

    public function add(){

        $contactPersons = ContactPerson::all();
        $designation = Designation::all();
        $department = Department::all();
        $businesspartner = BusinessPartners::all();
        $roles = Role::all();

        $designations = Designation::orderBy('designation', 'asc')->get();
        $contactPersons = Contactperson::orderBy('lastname', 'asc')->get();
        $departments = Department::orderBy('dept_name', 'asc')->get();
        $businesspartners = BusinessPartners::orderBy('company_name', 'asc')->get();

        $roles = Role::orderBy('name','asc')->get();
        $last = User::select("employee_id")
                             ->orderBy("id","desc")
                             ->where("deleted_at",null)
                             ->get()                        
                        ->first();
        $last = $last->employee_id;
        $last = explode("-",$last);
        $last = (int) end($last);
        
        $emp_id = date("Y")."-".sprintf("%04d",++$last);

    	return view('posts.add')->with([
            'roles' => $roles,
            'contactPersons' => $contactPersons,
            'designations' => $designations,
            'departments' => $departments,
            'businesspartners' => $businesspartners,
            'employee_id'=>$emp_id,
            ]);
    }


   public function insert(Request $request){
    	$this->validate($request,[
            'employee_id'    => 'required',
    		    'contact_id'     => 'required',
    		    'department_id'  => 'required',
            'designation_id' => 'required',
            'username'       => 'required',
            'password'       => 'required',
            'role'           => 'required',
            'user_image'     => 'required|mimes:jpeg,bmp,png',
    	]);

        if($request->hasFile('user_image'))
        {
            $path = $request->file('user_image')->store("/images/users",'public');
        }

        $designation_id = Designation::where('designation',$request->input('designation_id'))->first()->id;
        $dept_id = Department::where('dept_name',$request->input('department_id'))->first()->id;

        $user = new User();
        $user->employee_id = $request->input('employee_id');
        $user->contact_id = $request->input('contact_id');
        $user->company_id = $request->input('company_id');
        $user->username = $request->input('username');
        $user->password = bcrypt($request->input('password'));
        $user->department_id = $dept_id;
        $user->designation_id = $designation_id;
        $user->role = $request->input('role');
        $user->user_image = $path;
        $user->save();

    	Session::flash('success_msg', 'User added successfully');

    	return redirect()->route('posts.index');

    }

    public function edit($id){

        try{

    	$post = User::find($id);

        return view('posts.edit', ['post' => $post]);

    }catch(\Exception $e){
    	echo $e;
    }
    }

    public function update($id, Request $request){
    	$this->validate($request, [
            'username'       => 'required',
    	]);
        $user = User::find($id);
        $user->username = $request->input('username');
        if($request->input('password') != null ){
            $user->password = bcrypt($request->input('password'));
            $user->remember_token = Str::random(60);
        }  
        $user->save();

    	Session::flash('success_msg', 'Post updated successfully');
        event(new NewApplicant());
        return redirect()->route('posts.index');
    }

    // public function delete($id){
    // 	User::find($id)->delete();

    // 	Session::flash('success_msg', 'Post deleted successfully!');

    // 	return redirect()->route('posts.index');
    // }

    public function delete($id)
    {
    	$posts = User::find($id);
		if($posts->delete()){
			return redirect()->route('posts.index');
		}else{
			return redirect()->back()->with('message_success', 'Sorry please try again');
		}
	}
}
