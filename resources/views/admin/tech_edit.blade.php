@extends('layouts.admin')

@section('breadcrumbs', Breadcrumbs::render('admin.catalog.edit', $tech))
@section('title', 'Редактировать технику')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Форма редактирования техники</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <form method="get" class="form-horizontal" id="add_new">

                            <div class="form-group"><label class="col-sm-2 control-label">Название модели</label>
                                <div class="col-sm-10"><input type="text" class="form-control" name="name" value="{{ $tech['name'] }}"></div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group"><label class="col-sm-2 control-label">Производитель</label>
                                <div class="col-sm-10"><input type="text" class="form-control" name="maker" value="{{ $tech['maker'] }}"></div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group"><label class="col-sm-2 control-label">Описание</label>
                                <div class="col-sm-10">
                                    <div class="ibox-content no-padding">
                                        <div class="summernote">{!! $tech['description'] !!}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Цена почасавая</label>
                                <div class="col-sm-4"><input type="text" class="form-control" name="price_hourly" value="{{ $tech['price_hourly'] }}"></div>
                                {{--<label class="col-sm-2 control-label">Цена за смену</label>
                                <div class="col-sm-4"><input type="text" class="form-control" name="price_shift" value="{{ $tech['price_shift'] }}"></div>--}}
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Год выпуска</label>
                                <div class="col-sm-4"><input type="text" class="form-control" name="year" value="{{ $tech['year'] }}"></div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group"><label class="col-sm-2 control-label">Тип техники</label>
                                <div class="col-sm-10">
                                    <select class="form-control m-b" name="type" id="tech_type">
                                        <option value="0">Выбрать...</option>
                                        @foreach ($types as $type => $name)
                                            <option value="{{ $type }}" {{ $type == str_replace('App\\', '', $tech['tech_type']) ? 'selected="selected"' : '' }}>{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Изображения</label>
                                <div class="col-sm-10 dropzone">
                                    <div class="dropzone-previews"></div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            @if (!empty($tech['photos']))
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Загруженное изображение</label>
                                    <div class="col-md-10">
                                        @foreach($tech['photos'] as $img)
                                            <div class="preview-photo">
                                                <img src="/s/m/photo/{{ $img['file'] }}"/>
                                                <button class="btn btn-primary" type="button" data-id="{{ $img['id'] }}" data-selected="1"><i class="fa fa-check"></i></button>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                            @endif

                            <div id="custom_fields">
                                <div class="custom_fields hide" id="Bus">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Кол-во мест</label>
                                        <div class="col-sm-4"><input type="text" class="form-control" name="t[bus][capacity]" value="{{ $tech['t']['bus']['capacity'] or '' }}"></div>
                                        <label class="col-sm-2 control-label">Цена за 1 км</label>
                                        <div class="col-sm-4"><input type="text" class="form-control" name="t[bus][price_mileage]" value="{{ $tech['t']['bus']['price_mileage'] or '' }}"></div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                </div>
                                <div class="custom_fields hide" id="TruckBackhoeLoader">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">{{ $options['truck_backhoe_loader']['front_bucket']['name'] }}</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                @if( $options['truck_backhoe_loader']['front_bucket']['prefix'])
                                                    <span class="input-group-addon">{{ $options['truck_backhoe_loader']['front_bucket']['prefix'] }}</span>
                                                @endif
                                                <input type="text" class="form-control" name="t[truck_backhoe_loader][front_bucket]" value="{{ $tech['t']['truck_backhoe_loader']['front_bucket'] or '' }}">
                                                @if( $options['truck_backhoe_loader']['front_bucket']['suffix'])
                                                    <span class="input-group-addon">{{ $options['truck_backhoe_loader']['front_bucket']['suffix'] }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <label class="col-sm-2 control-label">{{ $options['truck_backhoe_loader']['back_bucket']['name'] }}</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                @if( $options['truck_backhoe_loader']['front_bucket']['prefix'])
                                                    <span class="input-group-addon">{{ $options['truck_backhoe_loader']['back_bucket']['prefix'] }}</span>
                                                @endif
                                                <input type="text" class="form-control" name="t[truck_backhoe_loader][back_bucket]" value="{{ $tech['t']['truck_backhoe_loader']['back_bucket'] or '' }}">
                                                @if( $options['truck_backhoe_loader']['front_bucket']['suffix'])
                                                    <span class="input-group-addon">{{ $options['truck_backhoe_loader']['back_bucket']['suffix'] }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">{{ $options['truck_backhoe_loader']['multi_bucket']['name'] }}</label>
                                        <div class="col-sm-4"><input type="checkbox" class="js-switch" value="1" name="t[truck_backhoe_loader][multi_bucket]" {{ !empty($tech['t']['truck_backhoe_loader']['multi_bucket']) ? 'checked="checked"' : '' }}/></div>
                                        <label class="col-sm-2 control-label">{{ $options['truck_backhoe_loader']['crab']['name'] }}</label>
                                        <div class="col-sm-4"><input type="checkbox" class="js-switch" value="1" name="t[truck_backhoe_loader][crab]" {{ !empty($tech['t']['truck_backhoe_loader']['crab']) ? 'checked="checked"' : '' }}/></div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">{{ $options['truck_backhoe_loader']['depth']['name'] }}</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                @if( $options['truck_backhoe_loader']['front_bucket']['prefix'])
                                                    <span class="input-group-addon">{{ $options['truck_backhoe_loader']['depth']['prefix'] }}</span>
                                                @endif
                                                    <input type="text" class="form-control" name="t[truck_backhoe_loader][depth]" value="{{ $tech['t']['truck_backhoe_loader']['depth'] or '' }}"/>
                                                @if( $options['truck_backhoe_loader']['front_bucket']['suffix'])
                                                    <span class="input-group-addon">{{ $options['truck_backhoe_loader']['depth']['suffix'] }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <label class="col-sm-2 control-label">{{ $options['truck_backhoe_loader']['ripper']['name'] }}</label>
                                        <div class="col-sm-4"><input type="checkbox" class="js-switch" value="1" name="t[truck_backhoe_loader][ripper]" {{ !empty($tech['t']['truck_backhoe_loader']['ripper']) ? 'checked="checked"' : '' }}/></div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                </div>
                                <div class="custom_fields hide" id="TruckTip">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">{{ $options['truck_tip']['body_space']['name'] }}</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                @if( $options['truck_tip']['body_space']['prefix'])
                                                    <span class="input-group-addon">{{ $options['truck_tip']['body_space']['prefix'] }}</span>
                                                @endif
                                                <input type="text" class="form-control" name="t[truck_tip][body_space]" value="{{ $tech['t']['truck_tip']['body_space'] or '' }}">
                                                @if( $options['truck_tip']['body_space']['suffix'])
                                                    <span class="input-group-addon">{{ $options['truck_tip']['body_space']['suffix'] }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <label class="col-sm-2 control-label">{{ $options['truck_tip']['carrying']['name'] }}</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                @if( $options['truck_tip']['carrying']['prefix'])
                                                    <span class="input-group-addon">{{ $options['truck_tip']['carrying']['prefix'] }}</span>
                                                @endif
                                                <input type="text" class="form-control" name="t[truck_tip][carrying]" value="{{ $tech['t']['truck_tip']['carrying'] or '' }}">
                                                @if( $options['truck_tip']['carrying']['suffix'])
                                                    <span class="input-group-addon">{{ $options['truck_tip']['carrying']['suffix'] }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                </div>
                                <div class="custom_fields hide" id="TruckHammer">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">{{ $options['truck_hammer']['force']['name'] }}</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                @if( $options['truck_hammer']['force']['prefix'])
                                                    <span class="input-group-addon">{{ $options['truck_hammer']['force']['prefix'] }}</span>
                                                @endif
                                                <input type="text" class="form-control" name="t[truck_hammer][force]" value="{{ $tech['t']['truck_hammer']['force'] or '' }}">
                                                @if( $options['truck_hammer']['force']['suffix'])
                                                    <span class="input-group-addon">{{ $options['truck_hammer']['force']['suffix'] }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <label class="col-sm-2 control-label">{{ $options['truck_hammer']['frequency']['name'] }}</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                @if( $options['truck_hammer']['frequency']['prefix'])
                                                    <span class="input-group-addon">{{ $options['truck_hammer']['frequency']['prefix'] }}</span>
                                                @endif
                                                    <input type="text" class="form-control" name="t[truck_hammer][frequency]" value="{{ $tech['t']['truck_hammer']['frequency'] or '' }}">
                                                @if( $options['truck_hammer']['frequency']['suffix'])
                                                    <span class="input-group-addon">{{ $options['truck_hammer']['frequency']['suffix'] }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                </div>
                                <div class="custom_fields hide" id="TruckAerialPlatform">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">{{ $options['truck_aerial_platform']['type']['name'] }}</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="t[truck_aerial_platform][type]" value="{{ $tech['t']['truck_aerial_platform']['type'] or '' }}">
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">{{ $options['truck_aerial_platform']['height']['name'] }}</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                @if( $options['truck_aerial_platform']['height']['prefix'])
                                                    <span class="input-group-addon">{{ $options['truck_aerial_platform']['height']['prefix'] }}</span>
                                                @endif
                                                <input type="text" class="form-control" name="t[truck_aerial_platform][height]" value="{{ $tech['t']['truck_aerial_platform']['height'] or '' }}">
                                                @if( $options['truck_aerial_platform']['height']['suffix'])
                                                    <span class="input-group-addon">{{ $options['truck_aerial_platform']['height']['suffix'] }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <label class="col-sm-2 control-label">{{ $options['truck_aerial_platform']['carrying']['name'] }}</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                @if( $options['truck_aerial_platform']['carrying']['prefix'])
                                                    <span class="input-group-addon">{{ $options['truck_aerial_platform']['carrying']['prefix'] }}</span>
                                                @endif
                                                    <input type="text" class="form-control" name="t[truck_aerial_platform][carrying]" value="{{ $tech['t']['truck_aerial_platform']['carrying'] or '' }}">
                                                @if( $options['truck_aerial_platform']['carrying']['suffix'])
                                                    <span class="input-group-addon">{{ $options['truck_aerial_platform']['carrying']['suffix'] }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                </div>
                                <div class="custom_fields hide" id="TruckLoader">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">{{ $options['truck_loader']['body_space']['name'] }}</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                @if( $options['truck_loader']['body_space']['prefix'])
                                                    <span class="input-group-addon">{{ $options['truck_loader']['body_space']['prefix'] }}</span>
                                                @endif
                                                    <input type="text" class="form-control" name="t[truck_loader][body_space]" value="{{ $tech['t']['truck_loader']['body_space'] or '' }}">
                                                @if( $options['truck_loader']['body_space']['suffix'])
                                                    <span class="input-group-addon">{{ $options['truck_loader']['body_space']['suffix'] }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <label class="col-sm-2 control-label">{{ $options['truck_loader']['carrying']['name'] }}</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                @if( $options['truck_loader']['carrying']['prefix'])
                                                    <span class="input-group-addon">{{ $options['truck_loader']['carrying']['prefix'] }}</span>
                                                @endif
                                                    <input type="text" class="form-control" name="t[truck_loader][carrying]" value="{{ $tech['t']['truck_loader']['carrying'] or '' }}">
                                                @if( $options['truck_loader']['carrying']['suffix'])
                                                    <span class="input-group-addon">{{ $options['truck_loader']['carrying']['suffix'] }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">{{ $options['truck_loader']['height']['name'] }}</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                @if( $options['truck_loader']['height']['prefix'])
                                                    <span class="input-group-addon">{{ $options['truck_loader']['height']['prefix'] }}</span>
                                                @endif
                                                    <input type="text" class="form-control" name="t[truck_loader][height]" value="{{ $tech['t']['truck_loader']['height'] or '' }}">
                                                @if( $options['truck_loader']['height']['suffix'])
                                                    <span class="input-group-addon">{{ $options['truck_loader']['height']['suffix'] }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                </div>
                                <div class="custom_fields hide" id="TruckUtility">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">{{ $options['truck_utility']['brusk']['name'] }}</label>
                                        <div class="col-sm-4"><input type="checkbox" class="js-switch" value="1" name="t[truck_utility][brusk]" {{ !empty($tech['t']['truck_utility']['brusk']) ? 'checked="checked"' : '' }}/></div>
                                        <label class="col-sm-2 control-label">{{ $options['truck_utility']['gritter']['name'] }}</label>
                                        <div class="col-sm-4"><input type="checkbox" class="js-switch" value="1" name="t[truck_utility][gritter]" {{ !empty($tech['t']['truck_utility']['gritter']) ? 'checked="checked"' : '' }}/></div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">{{ $options['truck_utility']['watering']['name'] }}</label>
                                        <div class="col-sm-4"><input type="checkbox" class="js-switch" value="1" name="t[truck_utility][watering]" {{ !empty($tech['t']['truck_utility']['watering']) ? 'checked="checked"' : '' }}/></div>
                                        <label class="col-sm-2 control-label">{{ $options['truck_utility']['dump']['name'] }}</label>
                                        <div class="col-sm-4"><input type="checkbox" class="js-switch" value="1" name="t[truck_utility][dump]" {{ !empty($tech['t']['truck_utility']['dump']) ? 'checked="checked"' : '' }}/></div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                </div>
                                <div class="custom_fields hide" id="TruckExcavator">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">{{ $options['truck_excavator']['depth']['name'] }}</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                @if( $options['truck_excavator']['depth']['prefix'])
                                                    <span class="input-group-addon">{{ $options['truck_excavator']['depth']['prefix'] }}</span>
                                                @endif
                                                <input type="text" class="form-control" name="t[truck_excavator][depth]" value="{{ $tech['t']['truck_excavator']['depth'] or '' }}">
                                                @if( $options['truck_excavator']['depth']['suffix'])
                                                    <span class="input-group-addon">{{ $options['truck_excavator']['depth']['suffix'] }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <label class="col-sm-2 control-label">{{ $options['truck_excavator']['width_bucket']['name'] }}</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                @if( $options['truck_excavator']['width_bucket']['prefix'])
                                                    <span class="input-group-addon">{{ $options['truck_excavator']['width_bucket']['prefix'] }}</span>
                                                @endif
                                                    <input type="text" class="form-control" name="t[truck_excavator][width_bucket]" value="{{ $tech['t']['truck_excavator']['width_bucket'] or '' }}">
                                                @if( $options['truck_excavator']['width_bucket']['suffix'])
                                                    <span class="input-group-addon">{{ $options['truck_excavator']['width_bucket']['suffix'] }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                </div>
                                <div class="custom_fields hide" id="TruckManipulator">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">{{ $options['truck_manipulator']['carrying_min']['name'] }}</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                @if( $options['truck_manipulator']['carrying_min']['prefix'])
                                                    <span class="input-group-addon">{{ $options['truck_manipulator']['carrying_min']['prefix'] }}</span>
                                                @endif
                                                    <input type="text" class="form-control" name="t[truck_manipulator][carrying_min]" value="{{ $tech['t']['truck_manipulator']['carrying_min'] or '' }}">
                                                @if( $options['truck_manipulator']['carrying_min']['suffix'])
                                                    <span class="input-group-addon">{{ $options['truck_manipulator']['carrying_min']['suffix'] }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <label class="col-sm-2 control-label">{{ $options['truck_manipulator']['carrying_max']['name'] }}</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                @if( $options['truck_manipulator']['carrying_max']['prefix'])
                                                    <span class="input-group-addon">{{ $options['truck_manipulator']['carrying_max']['prefix'] }}</span>
                                                @endif
                                                    <input type="text" class="form-control" name="t[truck_manipulator][carrying_max]" value="{{ $tech['t']['truck_manipulator']['carrying_max'] or '' }}">
                                                @if( $options['truck_manipulator']['carrying_max']['suffix'])
                                                    <span class="input-group-addon">{{ $options['truck_manipulator']['carrying_max']['suffix'] }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">{{ $options['truck_manipulator']['carrying_platform']['name'] }}</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                @if( $options['truck_manipulator']['carrying_platform']['prefix'])
                                                    <span class="input-group-addon">{{ $options['truck_manipulator']['carrying_platform']['prefix'] }}</span>
                                                @endif
                                                    <input type="text" class="form-control" name="t[truck_manipulator][carrying_platform]" value="{{ $tech['t']['truck_manipulator']['carrying_platform'] or '' }}">
                                                @if( $options['truck_manipulator']['carrying_platform']['suffix'])
                                                    <span class="input-group-addon">{{ $options['truck_manipulator']['carrying_platform']['suffix'] }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <label class="col-sm-2 control-label">{{ $options['truck_manipulator']['length_body']['name'] }}</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                @if( $options['truck_manipulator']['length_body']['prefix'])
                                                    <span class="input-group-addon">{{ $options['truck_manipulator']['length_body']['prefix'] }}</span>
                                                @endif
                                                    <input type="text" class="form-control" name="t[truck_manipulator][length_body]" value="{{ $tech['t']['truck_manipulator']['length_body'] or '' }}">
                                                @if( $options['truck_manipulator']['length_body']['suffix'])
                                                    <span class="input-group-addon">{{ $options['truck_manipulator']['length_body']['suffix'] }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">{{ $options['truck_manipulator']['length_arrow']['name'] }}</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                @if( $options['truck_manipulator']['length_arrow']['prefix'])
                                                    <span class="input-group-addon">{{ $options['truck_manipulator']['length_arrow']['prefix'] }}</span>
                                                @endif
                                                    <input type="text" class="form-control" name="t[truck_manipulator][length_arrow]" value="{{ $tech['t']['truck_manipulator']['length_arrow'] or '' }}">
                                                @if( $options['truck_manipulator']['length_arrow']['suffix'])
                                                    <span class="input-group-addon">{{ $options['truck_manipulator']['length_arrow']['suffix'] }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                </div>
                                <div class="custom_fields hide" id="TruckCrane">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">{{ $options['truck_crane']['carrying_min']['name'] }}</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                @if( $options['truck_crane']['carrying_min']['prefix'])
                                                    <span class="input-group-addon">{{ $options['truck_crane']['carrying_min']['prefix'] }}</span>
                                                @endif
                                                    <input type="text" class="form-control" name="t[truck_crane][carrying_min]" value="{{ $tech['t']['truck_crane']['carrying_min'] or '' }}">
                                                @if( $options['truck_crane']['carrying_min']['suffix'])
                                                    <span class="input-group-addon">{{ $options['truck_crane']['carrying_min']['suffix'] }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <label class="col-sm-2 control-label">{{ $options['truck_crane']['carrying_max']['name'] }}</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                @if( $options['truck_crane']['carrying_max']['prefix'])
                                                    <span class="input-group-addon">{{ $options['truck_crane']['carrying_max']['prefix'] }}</span>
                                                @endif
                                                    <input type="text" class="form-control" name="t[truck_crane][carrying_max]" value="{{ $tech['t']['truck_crane']['carrying_max'] or '' }}">
                                                @if( $options['truck_crane']['carrying_max']['suffix'])
                                                    <span class="input-group-addon">{{ $options['truck_crane']['carrying_max']['suffix'] }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">{{ $options['truck_crane']['formula']['name'] }}</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="t[truck_crane][formula]" value="{{ $tech['t']['truck_crane']['formula'] or '' }}">
                                        </div>
                                        <label class="col-sm-2 control-label">{{ $options['truck_crane']['length_arrow']['name'] }}</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                @if( $options['truck_crane']['length_arrow']['prefix'])
                                                    <span class="input-group-addon">{{ $options['truck_crane']['length_arrow']['prefix'] }}</span>
                                                @endif
                                                    <input type="text" class="form-control" name="t[truck_crane][length_arrow]" value="{{ $tech['t']['truck_crane']['length_arrow'] or '' }}">
                                                @if( $options['truck_crane']['length_arrow']['suffix'])
                                                    <span class="input-group-addon">{{ $options['truck_crane']['length_arrow']['suffix'] }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                </div>
                                <div class="custom_fields hide" id="TruckExcavatorWheeled">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">{{ $options['truck_excavator_wheeled']['weight']['name'] }}</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                @if( $options['truck_excavator_wheeled']['weight']['prefix'])
                                                    <span class="input-group-addon">{{ $options['truck_excavator_wheeled']['weight']['prefix'] }}</span>
                                                @endif
                                                    <input type="text" class="form-control" name="t[truck_excavator_wheeled][weight]" value="{{ $tech['t']['truck_excavator_wheeled']['weight'] or '' }}">
                                                @if( $options['truck_excavator_wheeled']['weight']['suffix'])
                                                    <span class="input-group-addon">{{ $options['truck_excavator_wheeled']['weight']['suffix'] }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <label class="col-sm-2 control-label">{{ $options['truck_excavator_wheeled']['capacity']['name'] }}</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                @if( $options['truck_excavator_wheeled']['capacity']['prefix'])
                                                    <span class="input-group-addon">{{ $options['truck_excavator_wheeled']['capacity']['prefix'] }}</span>
                                                @endif
                                                    <input type="text" class="form-control" name="t[truck_excavator_wheeled][capacity]" value="{{ $tech['t']['truck_excavator_wheeled']['capacity'] or '' }}">
                                                @if( $options['truck_excavator_wheeled']['capacity']['suffix'])
                                                    <span class="input-group-addon">{{ $options['truck_excavator_wheeled']['capacity']['suffix'] }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                </div>
                                <div class="custom_fields hide" id="TruckNightman">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">{{ $options['truck_nightman']['volume_barrel']['name'] }}</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                @if( $options['truck_nightman']['volume_barrel']['prefix'])
                                                    <span class="input-group-addon">{{ $options['truck_nightman']['volume_barrel']['prefix'] }}</span>
                                                @endif
                                                    <input type="text" class="form-control" name="t[truck_nightman][volume_barrel]" value="{{ $tech['t']['truck_nightman']['volume_barrel'] or '' }}">
                                                @if( $options['truck_nightman']['volume_barrel']['suffix'])
                                                    <span class="input-group-addon">{{ $options['truck_nightman']['volume_barrel']['suffix'] }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                </div>
                                <div class="custom_fields hide" id="TruckHelp">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">{{ $options['truck_help']['formula']['name'] }}</label>
                                        <div class="col-sm-4"><input type="text" class="form-control" name="t[truck_help][formula]" value="{{ $tech['t']['truck_help']['formula'] or '' }}"></div>
                                        <label class="col-sm-2 control-label">{{ $options['truck_help']['winch']['name'] }}</label>
                                        <div class="col-sm-4"><input type="checkbox" class="js-switch" value="1" name="t[truck_help][winch]" {{ !empty($tech['t']['truck_help']['winch']) ? 'checked="checked"' : '' }}/></div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Цена за 1 км</label>
                                        <div class="col-sm-4"><input type="text" class="form-control" name="t[truck_help][price_mileage]" value="{{ $tech['t']['truck_help']['price_mileage'] or '' }}"></div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                </div>
                                <div class="custom_fields hide" id="TruckHydrodrill">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">{{ $options['truck_hydrodrill']['depth']['name'] }}</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                @if( $options['truck_hydrodrill']['depth']['prefix'])
                                                    <span class="input-group-addon">{{ $options['truck_hydrodrill']['depth']['prefix'] }}</span>
                                                @endif
                                                    <input type="text" class="form-control" name="t[truck_hydrodrill][depth]" value="{{ $tech['t']['truck_hydrodrill']['depth'] or '' }}">
                                                @if( $options['truck_hydrodrill']['depth']['suffix'])
                                                    <span class="input-group-addon">{{ $options['truck_hydrodrill']['depth']['suffix'] }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <label class="col-sm-2 control-label">{{ $options['truck_hydrodrill']['screw']['name'] }}</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                @if( $options['truck_hydrodrill']['screw']['prefix'])
                                                    <span class="input-group-addon">{{ $options['truck_hydrodrill']['screw']['prefix'] }}</span>
                                                @endif
                                                    <input type="text" class="form-control" name="t[truck_hydrodrill][screw]" value="{{ $tech['t']['truck_hydrodrill']['screw'] or '' }}">
                                                @if( $options['truck_hydrodrill']['screw']['suffix'])
                                                    <span class="input-group-addon">{{ $options['truck_hydrodrill']['screw']['suffix'] }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary" type="submit">Сохранить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- Notification js --}}
@push('postjs')
<script src="/admin_static/js/plugins/toastr/toastr.min.js"></script>
<script type="text/javascript">
    $(function () {
        toastr.options = {
            "closeButton": true,
            "debug": true,
            "progressBar": true,
            "positionClass": "toast-bottom-right",
            "onclick": null,
            "showDuration": "400",
            "hideDuration": "1000",
            "timeOut": "7000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    })
</script>
@endpush

{{-- Notification css --}}
@push('precss')
<link href="/admin_static/css/plugins/toastr/toastr.min.css" rel="stylesheet">
@endpush


{{-- Text editor js --}}
@push('postjs')
<script src="/admin_static/js/plugins/summernote/summernote.min.js"></script>
<script>
    $(document).ready(function(){
        $('.summernote').summernote({
            height:200
        });
    });
</script>
@endpush

{{-- Text editor css --}}
@push('precss')
<link href="/admin_static/css/plugins/summernote/summernote.css" rel="stylesheet">
<link href="/admin_static/css/plugins/summernote/summernote-bs3.css" rel="stylesheet">
@endpush


{{-- Form js --}}
@push('postjs')
<script>
    $(document).ready(function() {
        $('.preview-photo button').click(function(){
            var $id, $selected;
            $id = $(this).attr('data-id');
            $selected = Number($(this).attr('data-selected'));
            if($selected){
                $(this).attr('data-selected', 0);
                $(this).find('i').removeClass('fa-check');
                $(this).find('i').addClass('fa-times');
                $(this).removeClass('btn-primary');
                $(this).addClass('btn-danger');
            } else{
                $(this).attr('data-selected', 1);
                $(this).find('i').removeClass('fa-times');
                $(this).find('i').addClass('fa-check');
                $(this).removeClass('btn-danger');
                $(this).addClass('btn-primary');
            }
        });

        $("#add_new").submit(function (event) {
            event.preventDefault();
            var form_ser = $(this).serializeArray();
            form_ser.push({
                name: "description",
                value: $('.summernote').code()
            });

            var data = {};
            $.each(form_ser, function (index, obj) {
                data[obj.name] = obj.value;
            });
            data['files'] = [];
            if (Dropzone._var) {
                data['files'] = Dropzone._var.slice();
            }
            $list = $('.preview-photo button');
            if($list.size()){
                $list.each(function(){
                    var $selected;
                    console.log($(this).attr('data-selected'));
                    $selected = Number($(this).attr('data-selected'));
                    if($selected){
                        var $id = $(this).attr('data-id');
                        data['files'].push($id);
                    }
                });
            }

            $.ajax({
                        method: "POST",
                        url: "{{ route('admin.catalog.edit.json', $tech['id']) }}",
                        data: data
                    })
                    .done(function (data) {
                        toastr.success('Техника была сохранена');
                    })
                    .error(function (msg) {
                        console.log(msg);
                        toastr.error('Ошибка получения данных сервера');
                    });
        });

        $("#tech_type").change(function () {
            var id = $("#tech_type option:selected").attr('value');
            $('.custom_fields').addClass('hide');
            $("#" + id).removeClass('hide');
        }).trigger('change');
    });

</script>
@endpush

{{-- Switchery js --}}
@push('postjs')
<script src="/admin_static/js/plugins/switchery/switchery.js"></script>
<script>
    $(document).ready(function() {
        $('.js-switch').each(function(){
            new Switchery(this, {color: '#1AB394'});
        });
    });
</script>
@endpush

{{-- Switchery css --}}
@push('precss')
<link href="/admin_static/css/plugins/switchery/switchery.css" rel="stylesheet">
@endpush

{{-- Dropzone js --}}
@push('postjs')
<script src="/admin_static/js/plugins/dropzone/dropzone.js"></script>


<script>
    Dropzone.autoDiscover = false;
    Dropzone._var = [];
    $(document).ready(function(){
        $('.dropzone').dropzone({
            paramName: "file",
            uploadMultiple: true,
            parallelUploads: 2,
            maxFiles: 10,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('admin.photo.add') }}",
            init: function() {
                this.on("sendingmultiple", function() {
                });
                this.on("successmultiple", function(files, response) {
                    console.log(response);
                    if(response instanceof Array){
                        Dropzone._var = Dropzone._var.concat(response);
                        console.log(Dropzone._var);
                    }
                });
                this.on("errormultiple", function(files, response) {
                    console.log(response);
                });
            }
        });
    });
</script>
@endpush

{{-- Dropzone css --}}
@push('precss')
<link href="/admin_static/css/plugins/dropzone/basic.css" rel="stylesheet">
<link href="/admin_static/css/plugins/dropzone/dropzone.css" rel="stylesheet">
@endpush