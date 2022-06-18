<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\CategoryModel;

class productController extends Controller
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
            'action'=> 'Sản phẩm'
        ];
        $datas = product::orderBy('id','asc')->search()->paginate(10);
        return view('admin.product.index', compact('datas','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Sản phẩm',
            'action'=> 'Thêm sản phẩm'
        ];
        $showcategory = CategoryModel::orderBy('id','asc')->get();
        return view('admin.product.create', compact('data','showcategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'm_product_name' => 'required|unique:t_product',
            'm_short_description' => 'required|max:255',
            'm_description' => 'required',
            'file_upload' => 'required|max:2048',
            'm_price' => 'required',
            'm_original_price' => 'required',
            'm_buy' => 'required',
        ],
        [
            'm_product_name.required' => 'Tên sản phẩm không để trống',
            'm_short_description.required' => 'mô tả ngắn không để trống',
            'm_short_description.max' => 'mô tả ngắn tối đa 255 ký tự',
            'm_description.required' => 'mô tả không để trống',
            'file_upload.required' => 'hình ảnh không để trống',
            'file_upload.max' => 'hình ảnh tối đa là 2000kb',
            'm_price.required' => 'giá gốc không được để trống',
            'm_original_price.required' => 'giá khuyến mãi không được để trống',
            'm_buy.required' => 'số lượng tồn kho không được để trống',
            'm_product_name.unique' => 'Tên sản phẩm này đã có trong CSDL',
        ]);
        $create = new product();
        $create->m_product_name = $request->m_product_name;
        $create->m_id_category = $request->m_id_category;
        $create->m_product_slug = Str::slug($request->m_product_name).'.html';
        $create->m_short_description = $request->m_short_description;
        $create->m_description = $request->m_description;
        $create->m_price = $request->m_price;
        $create->m_original_price = $request->m_original_price;
        $create->m_buy = $request->m_buy;
        $create->m_status = $request->m_status;
        $file_upload = array();
        if($files = $request->file('file_upload'))
        {
            // $file = $request->file_upload;
            // $ext[] = $request->file_upload->extension();
            // $file_name = random(8).'-'.'sanpham.'.$ext;
            // $file->move(public_path('uploads'), $file_name);
            foreach ($files as $file) {
                $name=$file->getClientOriginalName();
                $uploadname = time().'-'.'sanpham.'.$name;
                $file->move('uploads',$uploadname);
                $file_name[]=$uploadname;
            }
            $layhinh = implode(", ",$file_name);
            $chuyenhinh = explode(", ", $layhinh);
            $luuhinh = json_encode($chuyenhinh, JSON_UNESCAPED_SLASHES);
        }
        $create->m_picture = $luuhinh;
        $create->save();
        return redirect()->route('product.index')->with('alert_success', 'Thêm mới sản phẩm thành công.');
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
        $data = [
            'title' => 'Sản phẩm',
            'action'=> 'sửa sản phẩm'
        ];
        $updated = product::find($id);
        $showcategory = CategoryModel::orderBy('id','asc')->get();
        return view('admin.product.edit', compact('data','updated','showcategory'));
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
        $validated = $request->validate([
            'm_product_name' => 'required',
            'm_short_description' => 'required|max:255',
            'm_description' => 'required',
            'file_upload' => 'max:2048',
            'm_price' => 'required',
            'm_original_price' => 'required',
            'm_buy' => 'required',
        ],
        [
            'm_product_name.required' => 'Tên sản phẩm không để trống',
            'm_short_description.required' => 'mô tả ngắn không để trống',
            'm_short_description.max' => 'mô tả ngắn tối đa 255 ký tự',
            'm_description.required' => 'mô tả không để trống',
            'file_upload.max' => 'hình ảnh tối đa là 2000kb',
            'm_price.required' => 'giá gốc không được để trống',
            'm_original_price.required' => 'giá khuyến mãi không được để trống',
            'm_buy.required' => 'số lượng tồn kho không được để trống',
        ]);
        $updated = product::find($id);
        $updated->m_product_name = $request->m_product_name;
        $updated->m_id_category = $request->m_id_category;
        $updated->m_product_slug = \Str::slug($request->m_product_name).'.html';
        $updated->m_short_description = $request->m_short_description;
        $updated->m_description = $request->m_description;
        $updated->m_price = $request->m_price;
        $updated->m_original_price = $request->m_original_price;
        $updated->m_buy = $request->m_buy;
        $updated->m_status = $request->m_status;
        $file_upload = array();
        if($files = $request->file('file_upload'))
        {
            if($request->file('file_upload') == null){
                
            }elseif($request->file('file_upload')){
                $deleteimg = json_decode($updated->m_picture);
                $length = count($deleteimg);
                for ($i = 0; $i < $length; $i++) {
                $path = public_path("uploads/".$deleteimg[$i]);
                    if(file_exists($path)){
                        unlink($path);
                    }
                }
                foreach ($files as $file) {
                    $name=$file->getClientOriginalName();
                    $uploadname = time().'-'.'sanpham.'.$name;
                    $file->move('uploads',$uploadname);
                    $file_name[]=$uploadname;
                }
                $layhinh = implode(", ",$file_name);
                $chuyenhinh = explode(", ", $layhinh);
                $luuhinh = json_encode($chuyenhinh, JSON_UNESCAPED_SLASHES);
                $updated->m_picture = $luuhinh;
            }
        }
        $updated->save();
        return redirect()->route('product.index')->with('alert_success', 'sửa sản phẩm thành công.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = product::find($id);
        $deleteimg = json_decode($delete->m_picture);
        $length = count($deleteimg);
        for ($i = 0; $i < $length; $i++) {
           $path = public_path("uploads/".$deleteimg[$i]);
            if(file_exists($path)){
                unlink($path);
            }
        }
        $delete->delete();
        return redirect()->back()->with('alert_success', 'Xóa sản phẩm thành công.');

    }
}
