<?php

namespace App\Http\Controllers;
use App\Models\CategoryModel;
use App\Http\Requests\PostCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;


use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $data = [
            'title' => 'Danh Mục',
            'action'=> 'category'
        ];
        return view('admin.category.index',compact('data'));
    }

    public function loadlist() {
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
                'status' => 'OK',
                'msg' => 'Tải danh sách category không thành công',
                'data' => [],
            ];
        }
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }

    public function delete() {
        $Category= new CategoryModel();
        $result = [
            'status' => 'OK',
            'msg' => 'Xóa category thành công',
            'data' => [],
        ];
        $Category->where($Category::FIELD_ID,$_POST['idCategory'])->delete();
        $Category->where($Category::FIELD_ID_PARENT,$_POST['idCategory'])->delete();
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }

    public function getAddCategory() {
        $data = [
            'title' => 'Danh mục',
            'action'=> 'category'
        ];
        $categorySelect = CategoryModel::all();
        return view('admin.category.add', compact('data', 'categorySelect'));
    }

    public function postAddCategory(PostCategoryRequest $request) {
        $request->validated();
        CategoryModel::insert([
            'm_title' => $request->name,
            'm_id_parent' => $request->parent,
            'm_index' => $request->index,
        ]);
        return redirect()->route('category-admin')->with('alert_success', 'Thêm mới danh mục thành công.');
    }

    public function getEditCategory($id) {
        $category = CategoryModel::where('id', $id)->first();
        $categorySelect = CategoryModel::all();
        $data = [
            'title' => 'Danh mục',
            'action'=> 'category'
        ];
        return view('admin.category.edit', compact('category', 'data', 'categorySelect'));
    }

    public function postEditCategory(UpdateCategoryRequest $request, $id) {
        CategoryModel::where('id', $id)->update([
            'm_title' => $request->name,
            'm_id_parent' => $request->parent,
            'm_index' => $request->index,
        ]);
        return redirect()->route('category-admin')->with('alert_success', 'Sửa danh mục thành công.');
    }
}
