@extends('layouts.admin')

@section('breadcrumbs', Breadcrumbs::render('admin.news.add'))
@section('title', 'Добавить новость')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Форма создания новости</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <form method="get" class="form-horizontal" id="add_new">
                            <div class="form-group"><label class="col-sm-2 control-label">Название</label>
                                <div class="col-sm-10"><input type="text" class="form-control" name="title"></div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Автор</label>
                                <div class="col-sm-10"><input type="text" class="form-control" name="author"></div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Краткое описание</label>
                                <div class="col-sm-10">
                                    <div class="ibox-content no-padding">
                                        <div class="summernote"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Текст</label>
                                <div class="col-sm-10">
                                    <div class="ibox-content no-padding">
                                        <div class="summernote2"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Изображение</label>
                                <div class="col-sm-10">
                                    <div class="ibox-content">
                                        <div class="col-md-6">
                                            <div class="btn-group">
                                                <label title="Upload image file" for="inputImage" class="btn btn-primary">
                                                    <input type="file" accept="image/*" name="file" id="inputImage" class="hide">
                                                    Выбрать изображение
                                                </label>
                                            </div>
                                            <div class="img-preview img-preview-sm"></div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="image-crop">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary" type="submit">Создать новость</button>
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
        $('.summernote2').summernote({
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

{{-- Image cropper js --}}
@push('postjs')
<script src="/admin_static/js/plugins/cropper/cropper.min.js"></script>
<script>
    $(document).ready(function() {

        var $inputImage = $("#inputImage");
        if (window.FileReader) {
            $inputImage.change(function () {
                var fileReader = new FileReader(),
                        files = this.files,
                        file;

                if (!files.length) {
                    return;
                }

                file = files[0];

                if (/^image\/\w+$/.test(file.type)) {
                    fileReader.readAsDataURL(file);
                    fileReader.onload = function () {

                        $(".image-crop").html("<img/>");
                        var $image = $(".image-crop > img");
                        $($image).cropper({
                            aspectRatio: 1.54,
                            preview: ".img-preview",
                        });

                        $inputImage.val("");
                        $image.cropper("reset", true).cropper("replace", this.result);
                    };
                } else {
                    showMessage("Please choose an image file.");
                }
            });
        } else {
            $inputImage.addClass("hide");
        }
    });


</script>
@endpush

{{-- css --}}
@push('precss')
<link href="/admin_static/css/plugins/cropper/cropper.min.css" rel="stylesheet">
@endpush

@push('postjs')
<script>
    $("#add_new").submit(function( event ) {
        event.preventDefault();
        var form_ser = $(this).serializeArray();
        form_ser.push({
            name: "description",
            value:  $('.summernote').code()
        });
        form_ser.push({
            name: "text",
            value:  $('.summernote2').code()
        });
        var $image = $(".image-crop > img");
        if($($image).is('img')){
            $($image).cropper("getDataURL", "image/jpeg");
            form_ser.push({
                name: "img",
                value:  $($image).cropper("getDataURL", "image/jpeg")
            });
        }

        var data = {};
        $.each(form_ser, function(index, obj){
            data[obj.name] = obj.value;
        });

        $.ajax({
            method: "POST",
            url: "{{ route('admin.news.add.json') }}",
            data: data
        })
        .done(function( data ) {
            toastr.success('Новость была добавлена');
            setTimeout(function(){
                window.location.replace("{{ route('admin.news') }}")
            }, 800)
        })
        .error(function( msg ) {
            console.log(msg);
            toastr.error('Ошибка получения данных сервера');
        });
    });
</script>
@endpush