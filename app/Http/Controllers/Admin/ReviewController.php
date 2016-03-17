<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Services;
use Illuminate\Http\Request;
use Validator;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.review');
    }

    public function table(Request $request){
        $start = (int)$request->get('start', 0);
        $limit = (int)$request->get('length', 10);
        $page = floor($start / $limit) + 1;
        /** @var \Illuminate\Contracts\Pagination\LengthAwarePaginator $result */
        $result = \App\Review::paginate($request->get('length'), ['*'], 'page', $page);

        return response()->json([
            "data" => $result->items(),
            "draw" => $request->get('draw'),
            "recordsTotal" => $result->total(),
            "recordsFiltered" => $result->total()
        ]);
    }

    public function add(){
        return view('admin.review_add');
    }

    public function create(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'company' => 'required',
            'text' => 'required'
        ]);

        $news = new \App\Review();
        $news->name = $request->get('name');
        $news->company = $request->get('company');
        $news->text = $request->get('text');
        $news->save();
        $id = $news->getQueueableId();

        return response()->json(['id' => $id]);
    }

    public function edit($id){
        $obj = \App\Review::find($id);
        return view('admin.review_edit', ['review' => $obj->toArray()]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'company' => 'required',
            'text' => 'required'
        ]);

        $news = \App\Review::findOrFail($id);
        $news->name = $request->get('name');
        $news->company = $request->get('company');
        $news->text = $request->get('text');
        $news->save();

        return response()->json(['id' => $id]);
    }

    public function remove($id){
        \App\Review::find($id)->delete();
        return response()->redirectToRoute('admin.review');
    }
}
