@extends('layouts.admin')

@section('breadcrumbs', Breadcrumbs::render('admin.services'))
@section('title', 'Услуги')

@section('content')
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Структура услуг</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div id="using_json"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Описание услуги <i id="service_selected"></i></h5>
                        <button id="save" class="btn btn-primary m-l-sm btn-xs hide" onclick="save()" type="button">Save</button>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox float-e-margins">
                        <div class="ibox-content no-padding">
                            <div class="summernote"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- Tree service js --}}
@push('postjs')
<script src="/admin_static/js/plugins/jsTree/jstree.min.js"></script>
<script>
    app_select_node = null;
    $(document).ready(function(){;
        $('#using_json')
            .on('changed.jstree', function (e, data) {
                var i, j, r = [];
                for(i = 0, j = data.selected.length; i < j; i++) {
                    r.push(data.instance.get_node(data.selected[i]).text);
                }
                $('#event_result').html('Selected: ' + r.join(', '));
            }).
            on('select_node.jstree', function (e, data) {
                var $node = data.node;
                if($node.parents.length > 2){
                    $.ajax({
                        method: "POST",
                        url: "{{ route('admin.services.structure.element.json') }}",
                        data: { id: $node.li_attr.model_id }
                    })
                    .done(function( data ) {
                        app_select_node = $node;
                        console.log(app_select_node);
                        $('#service_selected').text("(" + data.name + ")");
                        $('#save').removeClass('hide');
                        $('.summernote').code(data.text);
                    })
                    .error(function( msg ) {
                        console.log(msg);
                        toastr.error('Ошибка получения данных сервера');
                    });
                } else{
                    var tree = $("#using_json").jstree(true);
                    tree.deselect_node($node)
                }
            }).
            bind("rename_node.jstree", function (event, data) {
                var $node = data.node;
                $.ajax({
                    method: "POST",
                    url: "{{ route('admin.services.structure.update.json') }}",
                    data: { node_id: $node.id, name: $node.text, id: $node.li_attr.model_id}
                })
                .done(function( data ) {
                    toastr.success('Название услуги было изменено');
                })
                .error(function( msg ) {
                    console.log(msg);
                    toastr.error('Ошибка получения данных сервера');
                });
            }).
            jstree({
                'core' : {
                    'data' : {
                        'url' : '{{ route('admin.services.structure.json') }}',
                    },
                    "check_callback" : function (operation, node, node_parent, node_position, more) {
                        return operation === 'delete_node' && node.parent.toString() === '#' ? false : true;
                    },
                    'multiple': false
                },
                "contextmenu": {
                    "items": function($node) {
                        var tree = $("#using_json").jstree(true);
                        return {
                            "Create": {
                                "separator_before": false,
                                "separator_after": false,
                                "label": "Create",
                                "action": function (obj) {
                                    $node = tree.create_node($node);
                                    $node = tree.get_node($node);
                                    $.ajax({
                                        method: "POST",
                                        url: "{{ route('admin.services.structure.create.json') }}",
                                        data: { node_id: $node.id, name: $node.text, parent_id: $node.parent}
                                    })
                                    .done(function( data ) {
                                        $node.li_attr.model_id = data.id;
                                        tree.edit($node);
                                        toastr.success('Была создана новая услуга');
                                    })
                                    .error(function( msg ) {
                                        console.log(msg);
                                        toastr.error('Ошибка получения данных сервера');
                                    });
                                }
                            },
                            "Rename": {
                                "separator_before": false,
                                "separator_after": false,
                                "label": "Rename",
                                "action": function (obj) {
                                    tree.edit($node);
                                }
                            },
                            "Remove": {
                                "separator_before": false,
                                "separator_after": false,
                                "label": "Remove",
                                "action": function (obj) {
                                    if($node.parents.length > 2){
                                        $.ajax({
                                            method: "POST",
                                            url: "{{ route('admin.services.structure.remove.json') }}",
                                            data: { node_id: $node.id}
                                        })
                                        .done(function( data ) {
                                            toastr.success('Услуга была удалена');
                                        })
                                        .error(function( msg ) {
                                            console.log(msg);
                                            toastr.error('Ошибка получения данных сервера');
                                        });
                                        tree.delete_node($node);
                                    } else{
                                        toastr.error('Нельзя удалять элемент структуры 1 и 2 уровня');
                                    }
                                }
                            }
                        };
                    }
                },
                "plugins" : [
                    "contextmenu", "state", "unique"
                ]
            });
    });
</script>
@endpush

{{-- Tree service css --}}
@push('precss')
<link href="/admin_static/css/plugins/jsTree/style.min.css" rel="stylesheet">
<style>
    .jstree-open > .jstree-anchor > .fa-folder:before {
        content: "\f07c";
    }

    .jstree-default .jstree-icon.none {
        width: 0;
    }
</style>
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
    var save = function() {
        var $node = app_select_node;
        var aHTML = $('.summernote').code(); //save HTML If you need(aHTML: array).
        $.ajax({
            method: "POST",
            url: "{{ route('admin.services.structure.update.json') }}",
            data: { node_id: $node.id, name: $node.text, id: $node.li_attr.model_id, text: aHTML }
        })
        .done(function( data ) {
            toastr.success('Услуга была обновлена');
        })
        .error(function( msg ) {
            console.log(msg);
            toastr.error('Ошибка получения данных сервера');
        });
    };
</script>
@endpush

{{-- Text editor css --}}
@push('precss')
<link href="/admin_static/css/plugins/summernote/summernote.css" rel="stylesheet">
<link href="/admin_static/css/plugins/summernote/summernote-bs3.css" rel="stylesheet">
@endpush


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