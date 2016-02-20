@extends('layouts.admin')

@section('breadcrumbs', Breadcrumbs::render('admin.catalog.add'))
@section('title', 'Добавить технику')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Форма добавления техники</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <form method="get" class="form-horizontal" id="add_new">

                            <div class="form-group"><label class="col-sm-2 control-label">Название модели</label>
                                <div class="col-sm-10"><input type="text" class="form-control" name="name"></div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group"><label class="col-sm-2 control-label">Производитель</label>
                                <div class="col-sm-10"><input type="text" class="form-control" name="maker"></div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group"><label class="col-sm-2 control-label">Описание</label>
                                <div class="col-sm-10">
                                    <div class="ibox-content no-padding">
                                        <div class="summernote"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Цена почасавая</label>
                                <div class="col-sm-4"><input type="text" class="form-control" name="price_hourly"></div>
                                <label class="col-sm-2 control-label">Цена за смену</label>
                                <div class="col-sm-4"><input type="text" class="form-control" name="price_shift"></div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Год выпуска</label>
                                <div class="col-sm-4"><input type="text" class="form-control" name="year"></div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group"><label class="col-sm-2 control-label">Тип техники</label>
                                <div class="col-sm-10">
                                    <select class="form-control m-b" name="type" id="tech_type">
                                        <option value="0">Выбрать...</option>
                                        @foreach ($types as $type => $name)
                                            <option value="{{ $type }}">{{ $name }}</option>
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

                            <div id="custom_fields">
                                <div class="custom_fields hide" id="Bus">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Кол-во мест</label>
                                        <div class="col-sm-4"><input type="text" class="form-control" name="t[bus][capacity]"></div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                </div>
                                <div class="custom_fields hide" id="TruckBackhoeLoader">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Объем переднего ковша</label>
                                        <div class="col-sm-4"><input type="text" class="form-control" name="t[truck_backhoe_loader][front_bucket]"></div>
                                        <label class="col-sm-2 control-label">Ширина заднего ковша</label>
                                        <div class="col-sm-4"><input type="text" class="form-control" name="t[truck_backhoe_loader][back_bucket]"></div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Ковш 7 в 1</label>
                                        <div class="col-sm-4"><input type="checkbox" class="js-switch" name="t[truck_backhoe_loader][multi_bucket]" value="1"/></div>
                                        <label class="col-sm-2 control-label">Крабовый ход</label>
                                        <div class="col-sm-4"><input type="checkbox" class="js-switch" name="t[truck_backhoe_loader][crab]" value="1"/></div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Глубина копания</label>
                                        <div class="col-sm-4"><input type="text" class="form-control" name="t[truck_backhoe_loader][depth]" /></div>
                                        <label class="col-sm-2 control-label">Рыхлитель</label>
                                        <div class="col-sm-4"><input type="checkbox" class="js-switch" name="t[truck_backhoe_loader][ripper]" /></div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                </div>
                                <div class="custom_fields hide" id="TruckTip">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Объем кузова</label>
                                        <div class="col-sm-4"><input type="text" class="form-control" name="t[truck_tip][body_space]"></div>
                                        <label class="col-sm-2 control-label">Грузоподъемность</label>
                                        <div class="col-sm-4"><input type="text" class="form-control" name="t[truck_tip][carrying]"></div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                </div>
                                <div class="custom_fields hide" id="TruckHammer">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Сила удара</label>
                                        <div class="col-sm-4"><input type="text" class="form-control" name="t[truck_hammer][force]"></div>
                                        <label class="col-sm-2 control-label">Частота удара</label>
                                        <div class="col-sm-4"><input type="text" class="form-control" name="t[truck_hammer][frequency]"></div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                </div>
                                <div class="custom_fields hide" id="TruckAerialPlatform">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Тип</label>
                                        <div class="col-sm-10"><input type="text" class="form-control" name="t[truck_aerial_platform][type]"></div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Высота подъема</label>
                                        <div class="col-sm-4"><input type="text" class="form-control" name="t[truck_aerial_platform][height]"></div>
                                        <label class="col-sm-2 control-label">Грузоподъемность корзины</label>
                                        <div class="col-sm-4"><input type="text" class="form-control" name="t[truck_aerial_platform][carrying]"></div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                </div>
                                <div class="custom_fields hide" id="TruckLoader">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Объем кузова</label>
                                        <div class="col-sm-4"><input type="text" class="form-control" name="t[truck_loader][body_space]"></div>
                                        <label class="col-sm-2 control-label">Грузоподъемность</label>
                                        <div class="col-sm-4"><input type="text" class="form-control" name="t[truck_loader][carrying]"></div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Высота погрузки</label>
                                        <div class="col-sm-4"><input type="text" class="form-control" name="t[truck_loader][height]"></div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                </div>
                                <div class="custom_fields hide" id="TruckUtility">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Коммунальная щетка</label>
                                        <div class="col-sm-4"><input type="checkbox" class="js-switch" name="t[truck_utility][brusk]" value="1" /></div>
                                        <label class="col-sm-2 control-label">Пескоразбрасыватель</label>
                                        <div class="col-sm-4"><input type="checkbox" class="js-switch" name="t[truck_utility][gritter]" value="1" /></div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Полевальная установка</label>
                                        <div class="col-sm-4"><input type="checkbox" class="js-switch" name="t[truck_utility][watering]" value="1" /></div>
                                        <label class="col-sm-2 control-label">Коммунальный отвал</label>
                                        <div class="col-sm-4"><input type="checkbox" class="js-switch" name="t[truck_utility][dump]" value="1" /></div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                </div>
                                <div class="custom_fields hide" id="TruckExcavator">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Глубина копания</label>
                                        <div class="col-sm-4"><input type="text" class="form-control" name="t[truck_excavator][depth]"></div>
                                        <label class="col-sm-2 control-label">Ширина ковша</label>
                                        <div class="col-sm-4"><input type="text" class="form-control" name="t[truck_excavator][width_bucket]"></div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                </div>
                                <div class="custom_fields hide" id="TruckManipulator">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Грузоподъмность стрелы (min вылет)</label>
                                        <div class="col-sm-4"><input type="text" class="form-control" name="t[truck_manipulator][carrying_min]"></div>
                                        <label class="col-sm-2 control-label">Грузоподъмность стрелы (max вылет)</label>
                                        <div class="col-sm-4"><input type="text" class="form-control" name="t[truck_manipulator][carrying_max]"></div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Грузоподъемность платформы</label>
                                        <div class="col-sm-4"><input type="text" class="form-control" name="t[truck_manipulator][carrying_platform]"></div>
                                        <label class="col-sm-2 control-label">Длина кузова</label>
                                        <div class="col-sm-4"><input type="text" class="form-control" name="t[truck_manipulator][length_body]"></div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Вылет стрелы</label>
                                        <div class="col-sm-4"><input type="text" class="form-control" name="t[truck_manipulator][length_arrow]"></div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                </div>
                                <div class="custom_fields hide" id="TruckCrane">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Грузоподъмность стрелы (min вылет)</label>
                                        <div class="col-sm-4"><input type="text" class="form-control" name="t[truck_crane][carrying_min]"></div>
                                        <label class="col-sm-2 control-label">Грузоподъмность стрелы (max вылет)</label>
                                        <div class="col-sm-4"><input type="text" class="form-control" name="t[truck_crane][carrying_max]"></div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Колесная формула</label>
                                        <div class="col-sm-4"><input type="text" class="form-control" name="t[truck_crane][formula]"></div>
                                        <label class="col-sm-2 control-label">Вылет стрелы</label>
                                        <div class="col-sm-4"><input type="text" class="form-control" name="t[truck_crane][length_arrow]"></div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                </div>
                                <div class="custom_fields hide" id="TruckExcavatorWheeled">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Масса</label>
                                        <div class="col-sm-4"><input type="text" class="form-control" name="t[truck_excavator_wheeled][weight]"></div>
                                        <label class="col-sm-2 control-label">Объем ковша</label>
                                        <div class="col-sm-4"><input type="text" class="form-control" name="t[truck_excavator_wheeled][capacity]"></div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                </div>
                                <div class="custom_fields hide" id="TruckNightman">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Объем бочка</label>
                                        <div class="col-sm-4"><input type="text" class="form-control" name="t[truck_nightman][volume_barrel]"></div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                </div>
                                <div class="custom_fields hide" id="TruckHelp">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Колесная формалу</label>
                                        <div class="col-sm-4"><input type="text" class="form-control" name="t[truck_help][formula]"></div>
                                        <label class="col-sm-2 control-label">Наличие лебедки</label>
                                        <div class="col-sm-4"><input type="checkbox" class="js-switch" name="t[truck_help][winch]" value="1"/></div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                </div>
                                <div class="custom_fields hide" id="TruckHydrodrill">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Глубина бурения</label>
                                        <div class="col-sm-4"><input type="text" class="form-control" name="t[truck_hydrodrill][depth]"></div>
                                        <label class="col-sm-2 control-label">Диаметр шнеков</label>
                                        <div class="col-sm-4"><input type="text" class="form-control" name="t[truck_hydrodrill][screw]"></div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary" type="submit">Добавить</button>
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
    $("#add_new").submit(function( event ) {
        event.preventDefault();
        var form_ser = $(this).serializeArray();
        form_ser.push({
            name: "description",
            value:  $('.summernote').code()
        });

        var data = {};
        $.each(form_ser, function(index, obj){
            data[obj.name] = obj.value;
        });
        if(Dropzone._var){
            data['files'] = Dropzone._var;
        }

        $.ajax({
            method: "POST",
            url: "{{ route('admin.catalog.add.json') }}",
            data: data
        })
        .done(function( data ) {
            toastr.success('Техника была добавлена');
            setTimeout(function(){
                window.location.replace("{{ route('admin.catalog') }}")
            }, 800)
        })
        .error(function( msg ) {
            console.log(msg);
            toastr.error('Ошибка получения данных сервера');
        });
    });

    $( "#tech_type" ).change(function () {
        var id = $( "#tech_type option:selected" ).attr('value');
        $('.custom_fields').addClass('hide');
        $( "#" + id).removeClass('hide');
    })
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