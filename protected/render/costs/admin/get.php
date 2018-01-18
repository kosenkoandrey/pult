<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Получение расходов</title>

        <!-- Vendor CSS -->
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">        
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/google-material-color/dist/palette.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/chosen/chosen.min.css" rel="stylesheet">
        
        <? APP::Render('core/widgets/css') ?>
    </head>
    <body data-ma-header="teal">
        <? 
        APP::Render('admin/widgets/header', 'include', [
            'Расходы' => 'admin/costs'
        ]);
        ?>
        <section id="main">
            <? APP::Render('admin/widgets/sidebar') ?>

            <section id="content">
                <div class="container">
                    <div class="card">
                        <form id="add-cost" class="form-horizontal" role="form">
                            <div class="card-header">
                                <h2>Получение расходов</h2>
                            </div>
                            <div class="card-body card-padding">
                                <div class="form-group">
                                    <label for="date" class="col-sm-2 control-label">Дата</label>
                                    <div class="col-sm-3">
                                        <div class="fg-line">
                                            <input type="text" class="form-control" name="date" id="date" value="<?= date('Y-m-d', strtotime('-1 day')) ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="date" class="col-sm-2 control-label">Источники</label>
                                    <div class="col-sm-3">
                                        <select name="sources[]" id="select-sources" class="chosen" data-placeholder="Выберите источники" multiple>
                                            <option value="yandex_direct" selected>Яндекс Директ</option>
                                            <option value="google_adwords" selected>Google AdWords</option>
                                        </select>
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
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/chosen/chosen.jquery.min.js"></script>
        
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/moment/min/moment.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
        
        <? APP::Render('core/widgets/js') ?>
        
        <script>
            $(document).ready(function() {
                $('#date').datetimepicker({
                    format: 'YYYY-MM-DD'
                });

                $('#add-cost').submit(function(event) {
                    event.preventDefault();

                    var date = $(this).find('#date');
                    date.closest('.form-group').removeClass('has-error has-feedback').find('.form-control-feedback, .help-block').remove();
                    if (date.val() === '') { date.closest('.form-group').addClass('has-error has-feedback').find('.col-sm-3').append('<span class="zmdi zmdi-close form-control-feedback"></span><small class="help-block">Not specified</small>'); return false; }
                    
                    console.log(date.val());
                    
                    $(this).find('[type="submit"]').html('Загрузка...').attr('disabled', true);

                    $.ajax({
                        type: 'post',
                        url: '<?= APP::Module('Routing')->root ?>admin/costs/api/get.json',
                        data: $(this).serialize(),
                        success: function(result) {
                            swal({
                                title: 'Готово',
                                text: 'Расходы за "' + date.val() + '" успешно загружены',
                                type: 'success',
                                showCancelButton: false,
                                confirmButtonText: 'Ok',
                                closeOnConfirm: false
                            }, function(){
                                window.location.href = '<?= APP::Module('Routing')->root ?>admin/costs';
                            });

                            $('#add-cost').find('[type="submit"]').html('Загрузить').attr('disabled', false);
                        }
                    });
                  });
            });
        </script>
    </body>
  </html>