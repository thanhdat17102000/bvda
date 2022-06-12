<?php

namespace App\Http\Controllers;
use App\Models\CategoryModel;


use Illuminate\Http\Request;

class CategoryController extends Controller
{   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function index()
    {
        $data = [
            'title' => 'Danh Mục',
            'action'=> 'category'
        ];
        return view('admin.category',compact('data'));
    }

    public function add()
    {
        $Category= new CategoryModel();
        $result = [
            'status' => 'OK',
            'msg' => 'Tải danh mục thành công',
            'data' => [],
        ];

        $Category->insert(array(
            $Category::FIELD_TITLE => $_POST['categoryTitle'],
            $Category::FIELD_ID_PARENT => $_POST['categoryIdParent']
            
        ));
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }
    public function loadlist(){
        $Category= new CategoryModel();
        $result = [
            'status' => 'OK',
            'msg' => 'Tải danh sách category thành công',
            'data' => [],
        ];
        $listCategory = $Category->getAllCategory();
        if (!empty($listCategory)) {
            $result['data'] = $listCategory;
        }
        else{
            $result = [
                'status' => 'NG',
                'msg' => 'Tải danh sách category không thành công',
                'data' => [],
            ];
        }
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }
    public function delete(){
        $Category= new CategoryModel();
        $result = [
            'status' => 'OK',
            'msg' => 'Xóa category thành công',
            'data' => [],
        ];
        $Category->where($Category::FIELD_ID,$_POST['idCategory'])->delete();
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }
    public function loadDetail(){
        $Category= new CategoryModel();
        $result = [
            'status' => 'OK',
            'msg' => 'Tải Form category thành công',
            'data' => [],
        ];

        $result['data']=$Category->find($_POST['idCategory']);

        
            // $result = [
            //     'status' => 'NG',
            //     'msg' => 'Tải Form category không thành công',
            //     'data' => [],
            // ];
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
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
        //
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