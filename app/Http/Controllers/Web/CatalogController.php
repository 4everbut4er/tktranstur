<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests;
use Illuminate\Http\Request;

class CatalogController extends BaseController
{
    private $capacity = [
        'less20' => 'до 20 мест',
        'between20-40' => '20-40 мест',
        'more40' => 'более 40 мест',
    ];

    private $year = [
        'less2005' => 'до 2005 года',
        'between2005-2010' => '2005-2010 года',
        'more2010' => 'после 2010 года',
    ];

    private $types = [
        'less2005' => 'до 2005 года',
        'between2005-2010' => '2005-2010 года',
        'more2010' => 'после 2010 года',
    ];

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function bus()
    {
        $buses = \App\Tech::with('photos')->where('tech_type', '=', 'App\\Bus')->get();
        $buses_array = [];
        if(!empty($buses)){
            foreach($buses as $bus){
                $el = $bus->toArray();
                $el['t'] = $bus->tech()->getResults()->toArray();
                if($el['t']['capacity'] < 20){
                    $el['tag_capacity'] = 'less20';
                } elseif($el['t']['capacity'] >= 20 && $el['t']['capacity'] <= 40){
                    $el['tag_capacity'] = 'between20-40';
                } else{
                    $el['tag_capacity'] = 'more40';
                }

                if($el['year'] < 2005){
                    $el['tag_year'] = 'less2005';
                } elseif($el['year'] >= 2005 && $el['year'] <= 2010){
                    $el['tag_year'] = 'between2005-2010';
                } else{
                    $el['tag_year'] = 'more2010';
                }

                $buses_array[] = $el;
            }
        }

        return view('page.catalog_bus', [
            'buses' => $buses_array,
            'capacity' => $this->capacity,
            'year' => $this->year
        ]);
    }

    public function busDetail($id){
        $bus = \App\Tech::with('photos')->find($id);
        if(!empty($bus)){
            $el = $bus->toArray();
            $el['t'] = $bus->tech()->getResults()->toArray();
            $bus = $el;
        } else{
            abort(404);
        }


        return view('page.catalog_bus_detail', [
            'bus' => $bus
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function truck()
    {
        $techs = \App\Tech::with('photos')->where('tech_type', '!=', 'App\\Bus')->get();
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
        return view('page.catalog_truck', [
            'techs' => $techs_array,
            'types' => $types
        ]);
    }

    public function truckDetail($id){
        /** @var \App\Tech $truck */
        $truck = \App\Tech::with('photos')->find($id);
        $t = [];
        if(!empty($truck)){
            $el = $truck->toArray();
            $el['t'] = $truck->tech()->getQuery()->first($truck->tech()->getRelated()->getFillable())->toArray();
            $t = $el;
        } else{
            abort(404);
        }

        return view('page.catalog_truck_detail', [
            'tech' => $t,
            'options' => $truck->tech()->getRelated()->getOptions()
        ]);
    }
}
