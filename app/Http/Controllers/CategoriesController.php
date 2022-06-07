<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public Function __construct(Request $request)
    {
        /**
         * Nếu là trang danh sách chuyên mục => hiển thị ra dòng chữ: Xin chào 
         * Christ Nguyễn
         */
        // if($request->is('category')){
        //     echo '<h3>Xin chào Christ Nguyễn </h3>';
        // }
    }
    
    //hiển thị danh sách chuyên mục ( phương thức GET )
    public function index(Request $request){

        // if(isset($_GET['id'])){
        //     return $_GET['id'];
        // }
        // $path = $request->path();
        // echo $path;
        //$url = $request->url();
        // $fullurl = $request->fullUrl();
        // echo $fullurl;
        //echo $request->method();

        // echo 'IP là '.$request->ip();

        // if($request->isMethod('GET')){
        //     echo ' Phương thức GET';
        // }
    //    $server =  $request->server();
    //    dd($server);
        //$id = $request->input('id.0.name');
    //     $id = $request->id;
    //     $name = $request->name;
    //    dd($name);
        // $id = request('name','Unicode');
        //$id = $request->query('id');
        //$query = $request->query();//query chỉ lấy giá trị trên url
        

        return view('clients/categories/list');
        // $allData = $request->all();
        // echo $request->all()['name'];
        // dd($allData);
    }

    //Lấy ra 1 chuyên mục theo id (phương thức GET)
    public function getCategories($id){
        return view('clients/categories/edit');
    }

    //Sửa 1 chuyên mục (phương thức POST)
    public function updateCategory($id){
        return 'Hành động sửa chuyên mục: '.$id;
    }

    //show form thêm dữ liệu (phương thức GET)
    public function addCategory(Request $request){
        // $path = $request->path();
        // echo $path;
        //$cateName = $request->old('category_name');

        return view('clients/categories/add');//,compact('cateName'));
    }

    //Thêm dữ liệu vào chuyên mục (phương thức POST)
    public function handleAddCategory(Request $request){
        // $allData = $request->all();
        // dd($allData);
        // if($request->isMethod('POST')){
        //     echo 'Phương thức POST';
        // }
        //return redirect(route('categories.add'));
        if($request->has('category_name')){
            $cateName = $request->category_name;
            $request->flash();//set session flash
            return redirect(route('categories.add'));
        }else{
            return 'Không có category_name';
        }
    }

    //Xóa dữ liệu chuyên mục ( phương thức DELETE)
    public function deleteCategory($id){
        return 'Submit xóa chuyên mục';
    }

    public function getFIle(){
        return view('clients/categories/file');
    }

    //Xử lý thông tin file
    public function handleFile(Request $request){
        //$file = $request->file('photo');
        if($request->hasfile('photo')){
            if($request->photo->isValid()){
                $file = $request->photo;
                //$path = $file->path();
                //$ext = $file->extension();
                //$path = $file->store('file-txt','local');
                //local là địa chỉ mặc định trong storage/app với folder là tham số đầu tiên 'file-txt'
                //có thể chuyển lên lưu trữ ở các dịch vụ đám mây thay cho local
                //$path = $file->storeAs('file-txt','Khoa-hoc.txt','local');//giúp tạo được tên file
                //dd($file);
                //$fileName = $file->getClientOriginalName();
                //Đổi tên 
                //$fileName = md5(uniqid()).'.'.$ext;
            }

        }else{
            return 'Vui lòng chọn file';
        }
    }
}
