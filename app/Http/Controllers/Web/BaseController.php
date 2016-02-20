<?php
/**
 * Created by PhpStorm.
 * User: Костя
 * Date: 16.02.2016
 * Time: 16:57
 */

namespace App\Http\Controllers\Web;

use App\Http\Requests;
use Illuminate\Http\Request;

class BaseController extends \App\Http\Controllers\Controller{
    public function __construct()
    {
        \View::share('service_menu', $this->getStructureMenu());
        $news = \App\News::orderBy('created_at')->take(2)->get();
        \View::share('last_news', $news);
    }

    private function getStructureMenu(){
        $menu = json_decode(file_get_contents(base_path('structure.json')), 1);
        $result = $this->getTreeMenu($menu, 1);
        return $result;
    }

    private function getTreeMenu(&$menu, $id){
        $result = [];
        if(!empty($menu)){
            foreach($menu as $row){
                if($row['parent'] == $id){
                    $el = [
                        'id' => $row['id'],
                        'text' => $row['text'],
                    ];
                    $children = $this->getTreeMenu($menu, $row['id']);
                    if($children){
                        $el['items'] = $children;
                    }
                    if(isset($row['li_attr']['model_id'])){
                        $el['model_id'] = $row['li_attr']['model_id'];
                    }
                    $result[] = $el;
                }
            }
        }
        return $result;
    }
}