<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Services;
use Illuminate\Http\Request;
use Validator;

class ServicesController extends Controller
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
        return view('admin.services');
    }

    public function structure(){
        return response()->json($this->getStructureServices());
    }

    public function element(Request $request){
        $service = Services::findOrFail($request->get('id'));
        return response()->json($service->toArray());
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request){
        $this->validate($request, [
            'name' => 'required|max:255',
            'parent_id' => 'required',
            'node_id' => 'required',
        ]);

        if(!$this->issetStructureService($request->get('parent_id'))){
            throw new \Exception('Неверно выбран родительский node');
        }

        $service = new Services();
        $service->name = $request->get('name');
        $service->save();

        $id = $service->getQueueableId();

        $data = $this->getStructureServices();
        $data[] = [
            'id' => $request->get('node_id'),
            'text' => $request->get('name'),
            'parent' => $request->get('parent_id'),
            'li_attr' => ['model_id' => $id],
        ];
        $this->saveStructureServices($data);

        return response()->json(['id' => $id]);
    }

    /**
     * @param Request $request
     * @throws \Exception
     */
    public function update(Request $request){
        $this->validate($request, [
            'name' => 'required|max:255',
            'text' => '',
            'id' => 'required',
            'node_id' => 'required',
        ]);

        if(!$this->issetStructureService($request->get('node_id'))){
            throw new \Exception('Неверно выбран node');
        }
        $id = $request->get('id');
        if($service = Services::find($id)){
            $service->name = $request->get('name');
            if($request->exists('text')){
                $service->text = $request->get('text');
            }
            $service->save();

            $data = $this->getStructureServices();
            if($data){
                foreach($data as &$row){
                    if(isset($row['li_attr']['model_id']) && $row['li_attr']['model_id'] == $id){
                        $row['text'] = $request->get('name');
                        break;
                    }
                }
            }
            $this->saveStructureServices($data);
        }
    }

    private function getStructureServices(){
        $data = json_decode(file_get_contents(base_path('structure.json')), 1);
        return $data;
    }

    /**
     * @param int $id
     * @return bool
     */
    private function issetStructureService($id){
        $data = $this->getStructureServices();
        if(!empty($data)){
            foreach($data as $row){
                if($row['id'] == $id){
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * @param int $id
     * @return bool
     */
    private function getStructureService($id){
        $data = $this->getStructureServices();
        if(!empty($data)){
            foreach($data as $row){
                if($row['id'] == $id){
                    return $row;
                }
            }
        }
        return false;
    }

    private function saveStructureServices($data){
        return (bool)file_put_contents(base_path('structure.json'), json_encode($data));
    }

    private function deleteStructureServices($data, $id){
        $c_data = $data;
        if(!empty($data)){
            foreach($data as $i => &$row){
                if($row['id'] == $id){
                    unset($c_data[$i]);
                } elseif($row['parent'] == $id){
                    $c_data = $this->deleteStructureServices($c_data, $row['id']);
                }
            }
        }
        return array_values($c_data);
    }

    /**
     * @param Request $request
     */
    public function remove(Request $request){
        $this->validate($request, [
            'node_id' => 'required',
        ]);


        if($this->issetStructureService($request->get('node_id'))){
            $data = $this->getStructureServices();
            $data = $this->deleteStructureServices($data, $request->get('node_id'));
            $this->saveStructureServices($data);
        }
    }
}
