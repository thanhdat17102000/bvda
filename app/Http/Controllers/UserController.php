<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\accountModel;
use Auth;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Người dùng',
            'action'=> 'Người dùng'
        ];
        $thanhvien = accountModel::orderBy('id','asc')->whereIn('role',[1,2])->get();
        return view('admin.user.index', compact('data','thanhvien'));

    }
    public function doimatkhauadmin(Request $request){
        $id = $request->id;
        $data = $request->all();
        $passold = $data['matkhaucu'];
        if(Hash::check($passold, Auth::user()->password)){
            if($data['matkhaumoi'] == $data['xacnhanmatkhau']){
                $updated = accountModel::find($id);
                $updated->password = Hash::make($data['matkhaumoi']);
                if($updated->save()){
                    echo 'thanhcong';
                }
            }
        }
    }
    public function doithongtinadmin(Request $request){
        $id = $request->id;
        $data = $request->all();
        $updated = accountModel::find($id);
        if($file = $request->file('avatar')){
            $ext= $request->avatar->getClientOriginalName();
            $data['avatar'] = time().'-'.'avatar.'.$ext;
            $file->move('uploads', $data['avatar']);
            $updated->m_avatar = $data['avatar'];
        }
        $updated->email = $data['email'];
        $updated->phone = $data['phone'];
        $updated->m_address = $data['address'];
        if($updated->save()){
            echo 'luuthongtinthanhcong';
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updated = accountModel::find($id);
        if($file = $request->file('avatar')){
            $ext= $request->avatar->getClientOriginalName();
            $file_name = time().'-'.'avatar.'.$ext;
            $file->move('uploads/avatar', $file_name);
            $updated->m_avatar = $file_name;
        }
        $updated->email = $request->email;
        $updated->phone = $request->phone;
        $updated->m_address = $request->m_address;
        if($updated->save()){
            return redirect()->back()->with('alert_success', 'update thông tin thành công.');}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
