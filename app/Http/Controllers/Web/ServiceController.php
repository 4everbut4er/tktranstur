<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests;
use App\Services;
use Illuminate\Http\Request;

class ServiceController extends BaseController
{
    public function category($id){
        /** @var \App\Services $service */
        $service = \App\Services::find($id);
        if(empty($service)){
            abort(404);
        }

        $data = $this->getStructureServices();
        $service_array = $service->toArray();
        if($data){
            foreach($data as &$row){
                if(isset($row['li_attr']['model_id']) && $row['li_attr']['model_id'] == $id){
                    $service_array['parent_id'] = $row['parent'];
                    break;
                }
            }
        }

        $news = \App\News::orderBy('created_at')->take(2)->get();
//        dd($service_array);
        return view('page.service_detail', [
            'service' => $service_array,
            'last_news' => $news->toArray()
        ]);
    }

    private function getStructureServices(){
        $data = json_decode(file_get_contents(base_path('structure.json')), 1);
        return $data;
    }

}
