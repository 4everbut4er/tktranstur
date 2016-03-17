@extends('layouts.admin')

@section('breadcrumbs', Breadcrumbs::render('admin.review.edit', $review))
@section('title', 'Редактировать отзыв')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Форма редактирования отзыва</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <form method="get" class="form-horizontal" id="add_review">
                            <div class="form-group"><label class="col-sm-2 control-label">Имя</label>
                                <div class="col-sm-10"><input type="text" class="form-control" name="name" value="{{ $review['name'] }}"></div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Компания</label>
                                <div class="col-sm-10"><input type="text" class="form-control" name="company" value="{{ $review['company'] }}"></div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Текс отзыва</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="text" rows="5">{{ $review['text'] }}</textarea>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary" type="submit">Сохранить отзыв</button>
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

@push('postjs')
<script>
    $("#add_review").submit(function( event ) {
        event.preventDefault();
        var form_ser = $(this).serializeArray();

        var data = {};
        $.each(form_ser, function(index, obj){
            data[obj.name] = obj.value;
        });

        $.ajax({
            method: "POST",
            url: "{{ route('admin.review.edit.json', $review['id']) }}",
            data: data
        })
        .done(function( data ) {
            toastr.success('Отзыв был обновлен');
        })
        .error(function( msg ) {
            console.log(msg);
            toastr.error('Ошибка получения данных сервера');
        });
    });
</script>
@endpush