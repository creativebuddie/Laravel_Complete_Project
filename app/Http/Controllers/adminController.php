<?php
namespace App\Http\Controllers;
use App\Admin;
use App\Permission;
use Illuminate\Http\Request;
use DB;
use Image;
use File;
class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminLogin(Request $request, Admin $admin)
    {

    $authVerify = Admin::selectRaw('Count(*) as Total')->where('admin_email',$request->authEmail)->first();
    if(intval($authVerify->Total)>0):
        $authReq = Admin::select('*')->where('admin_email',$request->authEmail)->first();
            if(password_verify($request->authPassword, $authReq->admin_password) && $request->_token!=""):
                $request->session()->put('authId', $authReq->id);
                return redirect('/dashboard');
            else:
                return redirect('/admin')->with('error', 'Error, Confirm your login details');
            endif;
    else:
       return redirect('/admin')->with('error', 'Error, Confirm your login details');    
    endif; 
    }    

    public function dashboard(Request $request, Admin $admin)
    {
        $authArray = Admin::select('*')->where('id', session()->get('authId'))->first();
        //$request->session()->push('authName', $authArray->admin_name);
        return view ('admin.dashboard', ['authArray'=>$authArray]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.adminUsers.createUsers');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
        public function store(Request $request)
    {

        $admin = new Admin;
        $permission = new Permission;   
        
        $imgArray  = array();
        foreach ($request->file('picture') as $imgValue) {
            $valImg = time().'-'.$imgValue->getClientOriginalName();
            Image::make($imgValue)->resize(300, 300)->save('resources/images/profile/'. $valImg);
            array_push($imgArray, $valImg);
        }
        
        $admin->file = json_encode($imgArray);
        $admin->admin_name = $request->name;
        $admin->admin_email = $request->email;
        $admin->admin_password = bcrypt($request->password);
        $admin->admin_phone = $request->phone;
        $admin->admin_dob = $request->dob;
        $admin->admin_desgination = $request->desgination;
        $admin->admin_cur_role = $request->assign_role;
        $admin->admin_token = $request->_token;
        $admin->admin_status = 'active';
        
        $managePer = in_array('manage', $request->permission)?true:false;
        if($managePer === true):
            $arrPush = array_merge($request->permission, $request->manage_permission);       
        else: 
            $arrPush = $request->permission;
        endif; 
       
        if($admin->save()):
            $uId = DB::table('admins')->select('id')->latest()->first();
            $permission->user_id =$uId->id;
            $permission->permission = json_encode($arrPush); 
            $permission->save();
            return redirect ('adminUsers/show')->with('success', 'successfully created');
        endif; 
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        $admin = Admin::all();
        $sessionKey = session()->get('authId');
        $getPermission = Permission::select('permission')->where('user_id', $sessionKey)->first();
        //$permission = Permission::all();
        return view ('admin.adminUsers.manageUsers', ['admin'=>$admin, 'permission'=> $getPermission->permission]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Admin $admin)
    {
        $editUser = Admin::find($request->id);
        return view ('admin.adminUsers.editUsers', ['admin'=>$editUser]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        $curDate = date('Y-m-d H:i:s');    
        $adminUserArray = array(
        'admin_name' => $request->name,    
        'admin_email' => $request->email,    
        'admin_phone' => $request->phone,    
        'admin_dob' => $request->dob,    
        'admin_desgination' => $request->desgination,    
        'admin_cur_role'=> $request->assign_role,    
        'admin_token' => $request->_token,
        'updated_at' => $curDate
        );
        $updateUser = Admin::where('id', $request->id)->update($adminUserArray);
        return redirect('adminUsers/show')->with('success', 'successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Admin $admin)
    {
        $getImg = Admin::select('file')->where('id', $request->id)->first();
    
        foreach (json_decode($getImg['file']) as $imgValue) {
            if(FILE::exists('resources/images/profile/'. $imgValue)):
                unlink('resources/images/profile/'. $imgValue);
            endif;
        }

        $admin = Admin::where('id', $request->id)->delete();
        return redirect('adminUsers/show')->with('success', 'successfully deleted');
    }
}
