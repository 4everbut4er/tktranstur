@extends('layouts.admin')

@section('breadcrumbs', Breadcrumbs::render('admin.review'))
@section('title', 'Отзывы')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Список отзывов</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="">
                            <a href="{{ route('admin.review.add') }}" class="btn btn-primary ">Добавить отзыв</a>
                        </div>
                        <table class="table table-striped table-bordered table-hover " id="table_review" >
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Имя</th>
                                <th>Компания</th>
                                <th>Описание</th>
                                <th>Время редактирования</th>
                                <th>Действие</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Имя</th>
                                <th>Компания</th>
                                <th>Описание</th>
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
        var oTable = $('#table_review').dataTable({
            "processing": true,
            "serverSide": true,
            "searching": false,
            ajax: {
                "url": '{{ route('admin.review.table.json') }}',
                "type": 'POST'
            },
            "columns": [
                { "data": "id", width: "40" },
                { "data": "name", width: "200" },
                { "data": "company", width: "200" },
                { "data": "text" },
                { "data": "updated_at", width: "150" },
                {
                    "render": function ( data, type, full, meta ) {
                        var html = '';
                        html += '<div class="float-e-margins">';
                        html += '<a href="/admin/review/' + full.id + '/delete" onclick="return confirm(\'Вы уверены что хотите удалить отзыв?\')" class="btn btn-danger btn-circle" type="button"><i class="fa fa-times"></i></a> ';
                        html += '<a href="/admin/review/' + full.id + '/edit" class="btn btn-warning btn-circle" type="button"><i class="fa fa-edit"></i></a> ';
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