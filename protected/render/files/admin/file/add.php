<?
$nav = [];

foreach ($data['path'] as $key => $value) {
    $nav[$key ? $value : 'Файлы'] = 'admin/files/file/' . APP::Module('Crypt')->Encode($key);
}
?>
<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Загрузка файла</title>

        <!-- Vendor CSS -->
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/google-material-color/dist/palette.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css" rel="stylesheet">

        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/codemirror/lib/codemirror.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/codemirror/addon/display/fullscreen.css" rel="stylesheet">

        <? APP::Render('core/widgets/css') ?>
    </head>
    <body data-ma-header="teal">
        <? APP::Render('admin/widgets/header', 'include', $nav) ?>

        <section id="main">
            <? APP::Render('admin/widgets/sidebar') ?>

            <section id="content">
                <div class="container">
                    <div class="card">
                        <form id="add-file" class="form-horizontal" role="form" enctype="multipart/form-data">
                            <input type="hidden" name="group_id" value="<?= APP::Module('Crypt')->Encode($data['group_sub_id']) ?>">

                            <div class="card-header">
                                <h2>Загрузка файла</h2>
                            </div>

                            <div class="card-body card-padding">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Защита</label>
                                    <div class="col-md-3">
                                        <select name="protection" class="selectpicker">
                                            <option value="none">нет</option>
                                            <option value="pdf2htmlEX_fb">pdf2htmlEX_fb</option>
                                            <option value="mp4_ap_fb">mp4_ap_fb</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="file" class="col-sm-2 control-label">Файл</label>
                                    <div class="col-sm-10">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <span class="btn palette-Teal bg waves-effect btn-file m-r-10">
                                                <span class="fileinput-new">Выбрать</span>
                                                <span class="fileinput-exists">Изменить</span>
                                                <input type="file" id="file" value="Выберите файл" name="file">
                                            </span>
                                            <span class="fileinput-filename"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <div id="upload-demo"></div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-5">
                                        <button type="submit" class="btn palette-Teal bg waves-effect btn-lg">Загрузить</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>

            <? APP::Render('admin/widgets/footer') ?>
        </section>

        <? APP::Render('core/widgets/page_loader') ?>
        <? APP::Render('core/widgets/ie_warning') ?>

        <!-- Javascript Libraries -->
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/Waves/dist/waves.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/fileinput/fileinput.min.js"></script>
        <? APP::Render('core/widgets/js') ?>

        <script>
            $(document).ready(function() {

                $('#file').on('change', function() {
                    if (this.files && this.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            $('#file-demo').addClass('ready');
                        };

                        reader.readAsDataURL(this.files[0]);
                    } else {
                        swal('Sorry - you\'re browser doesn\'t support the FileReader API');
                    }
                });

                $('#add-file').submit(function(event) {
                    event.preventDefault();

                    var file = $(this).find('#file');
                    var data = new FormData($(this).get(0));
                    
                    console.log(data);

                    if (file.val() === '') {
                        file.closest('.form-group').addClass('has-error has-feedback');
                        swal({
                            title: 'Ошибка',
                            text: 'Файл не выбран',
                            type: 'error',
                            showCancelButton: false,
                            confirmButtonText: 'Ok',
                            closeOnConfirm: false
                        });
                        return false;
                    }

                    $(this).find('[type="submit"]').html('Подождите...').attr('disabled', true);

                    $.ajax({
                        type: 'post',
                        url: '<?= APP::Module('Routing')->root ?>admin/files/api/file/add.json',
                        data: data,
                        processData: false,
                        contentType: false,
                        success: function(result) {
                            switch(result.status) {
                                case 'success':
                                    swal({
                                        title: 'Готово',
                                        text: 'Файл успешно загружен',
                                        type: 'success',
                                        showCancelButton: false,
                                        confirmButtonText: 'Ok',
                                        closeOnConfirm: false
                                    }, function(){
                                        window.location.href = '<?= APP::Module('Routing')->root ?>admin/files/file/<?= APP::Module('Crypt')->Encode($data['group_sub_id']) ?>';
                                    });
                                    break;
                                case 'error':
                                    $.each(result.errors, function(i, error) {
                                        switch(error) {
                                            case 1 :

                                                break;
                                            case 2 :
                                                swal({
                                                    title: 'Ошибка',
                                                    text: 'Недопустимый тип файла',
                                                    type: 'error',
                                                    showCancelButton: false,
                                                    confirmButtonText: 'Ok',
                                                    closeOnConfirm: false
                                                });
                                                return false;
                                                break;
                                        }
                                    });
                                    break;
                            }

                            $('#add-file').find('[type="submit"]').html('Загрузить').attr('disabled', false);
                        }
                    });
                  });
            });
        </script>
    </body>
</html>