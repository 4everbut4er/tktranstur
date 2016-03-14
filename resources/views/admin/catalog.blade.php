@extends('layouts.admin')

@section('breadcrumbs', Breadcrumbs::render('admin.catalog'))
@section('title', 'Каталог')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Список техники</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="">
                            <a href="{{ route('admin.catalog.add') }}" class="btn btn-primary ">Добавить технику</a>
                        </div>
                        <table class="table table-striped table-bordered table-hover " id="table_catalog" >
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Производитель</th>
                                <th>Изображение</th>
                                <th>Время редактирования</th>
                                <th>Действие</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Производитель</th>
                                <th>Изображение</th>
                                <th>Время редактирования</th>
                                <th>Действие</th>
                            </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="blueimp-gallery" class="blueimp-gallery">
        <div class="slides"></div>
        <h3 class="title"></h3>
        <a class="prev">‹</a>
        <a class="next">›</a>
        <a class="close">×</a>
        <a class="play-pause"></a>
        <ol class="indicator"></ol>
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

{{-- Data table js --}}
@push('postjs')
<script src="/admin_static/js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="/admin_static/js/plugins/dataTables/dataTables.bootstrap.js"></script>
<script src="/admin_static/js/plugins/dataTables/dataTables.responsive.js"></script>
<script src="/admin_static/js/plugins/dataTables/dataTables.tableTools.min.js"></script>
<script>
    $(document).ready(function() {
        /* Init DataTables */
        var oTable = $('#table_catalog').dataTable({
            "processing": true,
            "serverSide": true,
            "searching": false,
            ajax: {
                "url": '{{ route('admin.catalog.table.json') }}',
                "type": 'POST'
            },
            "columns": [
                { "data": "id", width: "40" },
                { "data": "name" },
                { "data": "maker" },
                {
                    "data": "photos",
                    "render": function ( photos, type, full, meta ) {
                        if(photos){
                            var index;
                            var result = '<div class="lightBoxGallery">';
                            var i = photos.length;
                            if(i > 4){
                                i = 4;
                            }
                            for (index = 0; index < i; ++index) {
                                result += '<a href="/s/origin/photo/'+photos[index].file+'" title="'+photos[index].name+'" data-gallery="tech_'+photos[index].imageable_id+'"><img src="/s/m/photo/'+photos[index].file+'"></a>';
                            }
                            result += '</div>'
                            return result;
                        } else{
                            return '<p>Изображение отсутствует</p>'
                        }
                    },
                    width: "200"
                },
                { "data": "updated_at", width: "150" },
                {
                    "render": function ( data, type, full, meta ) {
                        var html = '';
                        html += '<div class="float-e-margins">';
                        html += '<a href="/admin/catalog/' + full.id + '/delete" onclick="return confirm(\'Вы уверены что хотите удалить технику?\')" class="btn btn-danger btn-circle" type="button"><i class="fa fa-times"></i></a> ';
                        html += '<a href="/admin/catalog/' + full.id + '/edit" class="btn btn-warning btn-circle" type="button"><i class="fa fa-edit"></i></a> ';
                        html += '</div>';
                        return html;
                    },
                    width: "100"
                }
            ]
        });
    });
</script>
@endpush

{{-- Data table css --}}
@push('precss')
<link href="/admin_static/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
<link href="/admin_static/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
<link href="/admin_static/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">
@endpush

{{-- Data table js --}}
@push('postjs')
<script src="/admin_static/js/plugins/blueimp/jquery.blueimp-gallery.min.js"></script>
@endpush

{{-- Gallery css --}}
@push('precss')
<link href="/admin_static/css/plugins/blueimp/css/blueimp-gallery.min.css" rel="stylesheet">
@endpush