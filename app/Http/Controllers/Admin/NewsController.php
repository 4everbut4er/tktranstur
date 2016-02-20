<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Storage;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.news');
    }


    public function table(Request $request){
        $start = (int)$request->get('start', 0);
        $limit = (int)$request->get('length', 10);
        $page = floor($start / $limit) + 1;
        /** @var \Illuminate\Contracts\Pagination\LengthAwarePaginator $result */
        $result = \App\News::paginate($request->get('length'), ['*'], 'page', $page);

        return response()->json([
            "data" => $result->items(),
            "draw" => $request->get('draw'),
            "recordsTotal" => $result->total(),
            "recordsFiltered" => $result->total()
        ]);
    }

    public function add(){
        return view('admin.news_add');
    }

    public function create(Request $request){
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => '',
            'text' => '',
            'author' => 'max:255',
        ]);

        $news = new \App\News();
        $news->title = $request->get('title');
        $news->description = $request->get('description');
        $news->text = $request->get('text');
        $news->author = $request->get('author');
        $news->save();
        $id = $news->getQueueableId();
        if($request->exists('img')){
            $img_base64 = $request->get('img');
            list($type, $data) = explode(';', $img_base64);
            list(, $type) = explode(':', $type);
            list(, $ext) = explode('/', $type);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);
            $url = '/s/origin/news/' . $id . '_' . md5(time()) . '.' . $ext;
            $path = public_path() . $url;
            file_put_contents($path, $data);
            $news->file_path = $url;
            $news->save();
        }

        return response()->json(['id' => $id]);
    }

    public function edit($id){
        $news = \App\News::find($id);
        return view('admin.news_edit', ['news' => $news->toArray()]);
    }

    public function remove($id){
        \App\News::find($id)->delete();
        return response()->redirectToRoute('admin.news');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => '',
            'text' => '',
            'author' => 'max:255',
        ]);

        $news = \App\News::findOrFail($id);
        $news->title = $request->get('title');
        $news->description = $request->get('description');
        $news->text = $request->get('text');
        $news->author = $request->get('author');
        if($request->exists('img')){
            $img_base64 = $request->get('img');
            list($type, $data) = explode(';', $img_base64);
            list(, $type) = explode(':', $type);
            list(, $ext) = explode('/', $type);
            list(, $data) = explode(',', $data);
            $data = base64_decode($data);
            $url = '/s/origin/news/' . $id . '_' . md5(time()) . '.' . $ext;
            $path = public_path() . $url;
            file_put_contents($path, $data);
            $news->file_path = $url;
        }
        $news->save();

        return response()->json(['id' => $id]);
    }
}
