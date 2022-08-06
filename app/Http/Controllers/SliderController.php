<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderAddRequest;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SliderController extends Controller
{
    //
    use StorageImageTrait;
    private $slider;

    function index()
    {
        $data = [
            'title' => 'List slider',
            'action'=> 'List slider'
        ]; 
        $sliders = DB::table('t_slider')->paginate(10);
        return view('Admin.slider.index', compact('data', 'sliders'));
    }
    function add()
    {
        $data = [
            'title' => 'Add slider',
            'action'=> 'Add slider'
        ]; 
        return view('Admin.slider.add', compact('data'));
    }
    public function store(Request $request){
        try{
            $dataInsert = [
                'm_name' => $request->name,
                'm_description' => $request->description,
            ];
            $dataImageSlider = $this->storageTraitUpload($request, 'image_path', 'slider');
            if(!empty($dataImageSlider)){
                $dataInsert['m_image_name'] = $dataImageSlider['file_name'];
                $dataInsert['m_image_path'] = $dataImageSlider['file_path'];
            }
            $slider = DB::table('t_slider')->insert($dataInsert);
            return redirect()->route('slider');
        }catch(\Exception $exception){
            Log::error('Lỗi: ' . $exception->getMessage() . '---Line: ' . $exception->getLine());
        }
        
    }
    function edit($id)
    {
        $slider = DB::table('t_slider')->where('id', $id)->first();
        $data = [
            'title' => 'Edit slider',
            'action'=> 'Edit slider'
        ]; 
        return view('Admin.slider.edit', compact('data', 'slider'));
    }
    function update(Request $request, $id)
    {
        try{
            $dataInsert = [
                'm_name' => $request->name,
                'm_description' => $request->description,
            ];
            $dataImageSlider = $this->storageTraitUpload($request, 'image_path', 'slider');
            if(!empty($dataImageSlider)){
                $dataInsert['m_image_name'] = $dataImageSlider['file_name'];
                $dataInsert['m_image_path'] = $dataImageSlider['file_path'];
            }
            $slider = DB::table('t_slider')->where('id', $id)->update($dataInsert);
            return redirect()->route('slider');
        }catch(\Exception $exception){
            Log::error('Lỗi: ' . $exception->getMessage() . '---Line: ' . $exception->getLine());
        }
    }
    function delete($id)
    {
        $slider = DB::table('t_slider')->where('id', $id)->delete();
        return redirect()->route('slider');
    }
}
