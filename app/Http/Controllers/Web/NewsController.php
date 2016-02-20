<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests;
use Illuminate\Http\Request;

class NewsController extends BaseController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function news()
    {
//        $news = \App\News::all()->toArray();
        $news = \App\News::paginate()->toArray();
        return view('page.news', ['news' => $news]);
    }

    public function newsDetail($id){
        /** @var \App\News $news */
        $news = \App\News::find($id);
        if(empty($news)){
            abort(404);
        }
        return view('page.news_detail', [
            'news' => $news->toArray()
        ]);
    }
}
