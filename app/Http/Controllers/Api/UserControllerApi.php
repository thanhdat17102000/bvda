<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Symfony\Component\HttpKernel\Exception\HttpException;

class UserControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return response()->json([
            'status'=> true,
            'user'=> $user
        ]);
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
     * @param  \App\Models\UserModel  $userModel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return User::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $userModel
     * @return \Illuminate\Http\Response
     */
    public function edit(User $userModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserModel  $userModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->m_address = $request->m_address;
            $user->m_role = $request->m_role;
            // $user->m_status = $request->m_status;
            // if ($request->file('m_avatar')) {
            //     $get_image = $request->file('m_avatar');
            //     $get_name_image = $get_image->getClientOriginalName();
            //     $name_image = current(explode('.', $get_name_image));
            //     $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            //     $get_image->move('uploads/avatar', $new_image);
            //     $user->m_avatar = $new_image;
            // }
            $user->save();
            return ['data' => $user, 'isError' => false, 'message' => "cập nhật tài khoản thành công!"];
        } catch (\Exception $exception) {
            throw new HttpException(400, "Invalid data - {$exception->getMessage()}");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserModel  $userModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $userModel)
    {
        //
    }
}
