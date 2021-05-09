<?php

namespace App\Http\Controllers;

use App\BlogPost;
use App\Http\Requests\StorePost;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    // private $contact = [
    //     1 => [
    //         'title' => '1111',
    //         'content' => 'bbb',
    //         'new_b' => true,
    //         'has_true' => true,
    //     ],
    //     2 => [
    //         'title' => '222w',
    //         'content' => 'c',
    //         'new_b' => false,
    //     ],
    // ];

    //這邊用this去接自己產的
    // public function index()
    // {
    //     return view('contact.index', ['contact' => $this->contact]);
    // }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contact.index', ['contact' => BlogPost::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */



    public function store(StorePost $request)
    {


        //    注意不需要在GET路由綁定錯誤訊息至視圖因為Laravel會自動檢查 session內的錯誤資料，如果錯誤存在的話，會自動綁定這些錯誤訊息到視圖
        //    。所以，請注意到 $errors 變數在每次請求的所有視圖中都將可以使用，讓你可以方便假設 $errors 變數已被定義且可以安全地使用
        // $errors 變數是 Illuminate\Support\MessageBag 的實例
        //  在我們的範例中，當驗證失敗，使用者將被重導到我們的控制器 create 方法

        $validate =  $request->validate();

        $post = new BlogPost;
        //$request->input('title') 錯 要改驗證過的
        // 記住驗證過的 跑過規則是array
        $post->title = $validate['title'] ;
        $post->content = $validate['content'];
        $post->save();

        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // abort_if(!isset($this->contact[$id]), 404);
        // Fail就不用404了 直接掛
        return view('contact.show', ['contact' => BlogPost::findOrFail('id')]);
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
