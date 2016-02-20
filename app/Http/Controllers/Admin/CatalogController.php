<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Tech;
use Illuminate\Http\Request;
use Storage;

class CatalogController extends Controller
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
        return view('admin.catalog');
    }


    public function table(Request $request){
        $start = (int)$request->get('start', 0);
        $limit = (int)$request->get('length', 10);
        $page = floor($start / $limit) + 1;
        /** @var \Illuminate\Contracts\Pagination\LengthAwarePaginator $result */
        $result = \App\Tech::with('photos')->paginate($request->get('length'), ['*'], 'page', $page);

        return response()->json([
            "data" => $result->items(),
            "draw" => $request->get('draw'),
            "recordsTotal" => $result->total(),
            "recordsFiltered" => $result->total()
        ]);
    }

    public function add(){
        return view('admin.tech_add', [
            'types' => \App\Tech::$type_tech
        ]);
    }

    public function create(Request $request){
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => '',
            'maker' => 'required|max:255',
            'year' => 'numeric',
            'price_hourly' => 'required|numeric',
            'price_shift' => 'required|numeric',
            'type' => 'required|in:' . implode(',', array_keys(\App\Tech::$type_tech)),
            't' => 'array',
            'files' => 'array',
        ]);
        $name_class = "\\App\\" . $request->get('type');
        if(class_exists($name_class)){
            /** @var \App\Bus $tech */
            $tech = new $name_class();
            $tech->fill($request->get('t')[$tech->getTable()]);
//            $tech->fill(['brusk' => 1]);
            $tech->push();
            $_tech = new \App\Tech([
                'name' => $request->get('name'),
                'description' => $request->get('description'),
                'maker' => $request->get('maker'),
                'year' => $request->get('year'),
                'price_hourly' => $request->get('price_hourly'),
                'price_shift' => $request->get('price_shift'),
            ]);
            $_tech->save();
            $_tech->photos()->saveMany(\App\Photo::whereIn('id', $request->get('files'))->get());
            $tech->tech()->save($_tech);
            $id = $tech->getQueueableId();
            return response()->json(['id' => $id]);
        } else{
            throw new \Exception('Выбран несуществующий класс');
        }
    }

    public function remove($id){
        /** @var \App\Tech $tech */
        $tech = \App\Tech::find($id);
        $tech->tech()->getRelated()->delete();
        $tech->delete();
        return response()->redirectToRoute('admin.catalog');
    }

    public function edit($id){
        /** @var Tech $entity */
        $entity = \App\Tech::with('photos')->find($id);
        $result = $entity->toArray();
        $result['t'][$entity->tech()->getRelated()->getTable()] = $entity->tech()->getResults()->toArray();
        return view('admin.tech_edit', [
            'tech' => $result,
            'types' => \App\Tech::$type_tech
        ]);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => '',
            'maker' => 'required|max:255',
            'year' => 'numeric',
            'price_hourly' => 'required|numeric',
            'price_shift' => 'required|numeric',
            'type' => 'required|in:' . implode(',', array_keys(\App\Tech::$type_tech)),
            't' => 'array',
            'files' => 'array',
        ]);
        $name_class = "\\App\\" . $request->get('type');
        if(class_exists($name_class)){
            /** @var \App\Tech $tech */
            $tech = \App\Tech::find($id);
            $tech->update($request->all());
            $files = $request->get('files');
            $tech->photos()->whereNotIn('id', $files)->delete();
            if(!empty($files)){
                $tech->photos()->saveMany(\App\Photo::whereIn('id', $request->get('files'))->get());
            }
            /** @var \App\Bus $_tech */
            $_tech = $tech->tech()->getResults();

            $_tech->update($request->get('t')[$_tech->getTable()]);
            return response()->json(['id' => $id]);
        } else{
            throw new \Exception('Выбран несуществующий класс');
        }
    }
}
