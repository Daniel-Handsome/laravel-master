<?php

namespace App\Http\Controllers;

use App\BlogPost;
use App\Http\Requests\StorePost;
use App\Jobs\SendJob;
use Illuminate\Http\Request;

class PostsController extends Controller
{


    // tinker的 關聯

//   建立關聯

// User::find(1)->roles()->save($role);
// 上面的例子裡，新的 Role 模型物件被儲存，
// 同時附加關聯到 user 模型。也可以傳入屬性陣列，
// 把資料加到關聯資料表：
    //
//  這邊是子連父  不一樣
    // hasOne $profile->author()->associate($author)->save();
    // belognto 原本是 $author->profile()->save($profile);
    // 當然你可以直接賦值去 反正是測試



    // 查詢關聯

    // 不用with的方法
    // 可以直接調用 ex  $profile->author
    //另外沒有關聯前 不會顯示出來 ex
    // $profile = Profile::find(1); 不會跑出來關聯
    // $profile->author();
    // $profile; 這時才回跑出來 因為有呼叫了

        // with用法
        // $author = Author::with('Profile')->whereKey(1)->first();
        // 一次with多個
        // $author = Author::with(['Profile','comment'])->whereKey(1)->first();










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

        return view('posts.index', ['posts' => BlogPost::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(1);
        // SendJob::dispatch();
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

        $validated =  $request->validated();

        $post = BlogPost::create($validated);
        // $post = new BlogPost; 跟create 插在create要白名單
        //其實也可以用物件 然後用 create make fill 的方法

        // // 記住驗證過的 跑過規則是array

        // 有時你可能希望暫存一些資料，並只在下次請求有效。你可以使用 Session::flash 方法來達成目的：
        //可以在不同地方存入同名不同內容的 這樣模板一樣判斷名存在 就不用很多判斷了
        $request->session()->flash('status', 'The Blog post was created!');

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

        // dd(BlogPost::find($id));
        return view('posts.show', ['post' => BlogPost::find($id)]);

        // dd(BlogPost::find('id'));
        // return view('contact.show', ['contact' => BlogPost::find('id')]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd(1);
        return view('posts.edit', ['post' => BlogPost::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePost $request, $id)
    {
        $post = BlogPost::find($id);
        $validated =  $request->validated();
        // fill vs update
        // 1
        //此時，用戶對象仍然僅在具有更新值的內存中，但是不執行實際的更新查詢。
        //這樣我們可以在這裡有更多的邏輯
        // 2
        // 更新方法是愚蠢的，即使沒有更改任何值也可以查詢數據庫。
        // 但是save方法是智能的，它可以計算出您是否確實進行了更改，
        // 例如，如果沒有任何更改，則不執行查詢。
        $post->fill($validated);
        $post->save();

        $request->session()->flash('status', 'Blog post was updated');

        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = BlogPost::findOrFail($id);
        $post->delete();

        //重點了 你要放session 要有requser 請求 你在上面寫
        // Requser $requesr 跟下面寫requser基本一定 這是輔助方法
        //當然也可以直接抓session
        session()->flash('status', 'Blog Delete!!!!!');

        return redirect()->route('posts.index');
    }
}
