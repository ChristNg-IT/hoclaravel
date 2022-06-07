<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;//hoặc use DB;

use App\Rules\Uppercase;

class HomeController extends Controller
{
    public $data = [];
    // Action index
    public function index(){
        //return 'Home';
        //$title = 'Học lập trình web tại Unicode';
        //$content = 'Học lập trình laravel 8.x tại unicode';
        //hàm compact giúp các biến trong hàm thành mảng
        /**
         * [
         *      'title'=>$title,
         *      'content'=>$content
         * ]
         * return view('home',compact('title','content'));
         */
        //key title sẽ chuyển thành biến khi sang view
        //return view('home',$dataview); // load view home.php
        //return view('home')->with(['title'=>$title,'content'=>$content]);
        $this->data['content']='<h3>Chương 1: Nhập môn laravel</h3>
        <p>Kiến thức 1 </p>
        <p>Kiến thức 2 </p>
        <p>Kiến thức 3 </p>
        ';
        $this->data['index']= 1;
        $this->data['title'] = 'Đào tạo lập trình web';
        $this->data['message'] = 'Đăng ký tài khoản thành công';

        //$users = DB::select('SELECT * from users WHERE ID > ?',[1]);  
        $users = DB::select('SELECT * from users WHERE email =:email',['email'=>'tuannguyenhuu7874@gmail.com']);

        dd($users);
        return View::make('clients.home',$this->data);//,compact('title','content'));
        //$contentView = view('home')->render();
        //dd($contentView);
        
    }
    
    public function products(){
        $this->data['title'] = 'Sản phẩm';
        return view('clients.products',$this->data);
    }

    public function getAdd(){
        $this->data['title'] = 'Thêm sản phẩm';
        $this->data['errorMessage'] = 'Vui lòng kiểm tra lại dữ liệu';
        return view('clients.add',$this->data);
    }

    public function postAdd(Request $request){
        $rule = [
            // 'product_name'=>['required','min:6',new Uppercase],
            // 'product_price'=>['required','integer',new Uppercase]
            'product_name'=>['required','min:6'],//,function($attribute,$value,$fail){
                //isUppercase($value,'Trường :attribute không hợp lệ 1',$fail);
            //}],
            'product_price'=>['required','integer',new Uppercase]
        ];
        // $message = [
        //     'product_name.required' => 'Tên sản phẩm bắt buộc phải nhập',
        //     'product_name.min' => 'Tên sản phẩm không được nhỏ hơn :min ký tự',
        //     'product_price.required' => 'Giá sản phẩm không được để trống',
        //     'product_price.integer' =>'Giá sản phẩm phải là số',
        // ];
        $attribute = [
            'product_name' =>'Tên sản phẩm',
            'product_price' =>'Giá sản phẩm'
        ];

        $message = [
            'required'=>':attribute không dược để trống',
            'min'=>':attribute không được nhỏ hơn :min ký tự',
            'integer'=>':attribute phải là số'
        ];
        // $request->validate($rule,$message);
        $validator = Validator::make($request->all(),$rule,$message,$attribute);

        $validator->validate();
        return response()->json(['status' =>'success']);
        // if($validator->fails()){
        //     $validator->errors()->add('msg','Vui lòng kiểm tra lại dữ liệu');
        //     //return 'Validate thất bại';
        // }else{
        //    // return 'Validate thành công';
        //    return redirect()->route('products')->with('msg','Validate thành công');
        // }
        // return back()->withErrors($validator);
        // //$validator->validate();
    }

    public function putAdd(Request $request){
        return 'Phương thức PUT';
        dd($request);
    }

    public function downloadImage(Request $request){
        if(!empty($request->image)){
            $image = trim($request->image);
            
            //$fileName = 'image_'.uniqid().'.jpg';
            $fileName = basename($image);//lấy tên gốc của ảnh
            return response()->streamDownload(function() use($image){
                $imageContent = file_get_contents($image);
            },$fileName);
        };
    }

    //Action GetNews
    public function GetNews(){
        return 'Danh sách tin tức';
    }

    //Action getCategory
    public function getCategory($id){
        return 'Chuyên mục: '.$id;
    }

    public function getProductDetail($id){
        return view('clients.products.detail',compact('id'));
    }
}
