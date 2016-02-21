<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests;
use Illuminate\Http\Request;

class PageController extends BaseController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function mainPage()
    {
        $buses = \App\Tech::with('photos')->where('tech_type', '=', 'App\\Bus')->take(4)->get();
        $buses_array = [];
        if(!empty($buses)){
            foreach($buses as $bus){
                $el = $bus->toArray();
                $el['t'] = $bus->tech()->getResults()->toArray();
                $buses_array[] = $el;
            }
        }

        $techs = \App\Tech::with('photos')->where('tech_type', '!=', 'App\\Bus')->take(4)->get();
        $techs_array = [];
        if(!empty($techs)){
            foreach($techs as $tech){
                $el = $tech->toArray();
                $el['t'] = $tech->tech()->getResults()->toArray();
                $techs_array[] = $el;
            }
        }

        $types = \App\Tech::$type_tech;
        unset($types['Bus']);

        return view('page.main', [
            'buses' => $buses_array,
            'techs' => $techs_array,
            'types' => $types
        ]);
    }

    public function contactPage(){
        return view('page.contact');
    }
}
