<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Редактрование типа продукта</title>

    <!-- Vendor CSS -->
    <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
    <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
    <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">
    <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/google-material-color/dist/palette.css" rel="stylesheet">
    <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet">
    <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css" rel="stylesheet">

    <? APP::Render('core/widgets/css') ?>
</head>
<body data-ma-header="teal">
    <?
    APP::Render('admin/widgets/header', 'include', [
        'Продукты' => 'admin/billing/products',
        'Типы' => 'admin/billing/products/types'
    ]);
    ?>
    <section id="main">
        <? APP::Render('admin/widgets/sidebar') ?>

        <section id="content">
            <div class="container">
                <div class="card">
                    <form id="update-product-type" class="form-horizontal" role="form">
                        <input type="hidden" name="id" value="<?= APP::Module('Routing')->get['product_type_id_hash'] ?>">

                        <div class="card-header">
                            <h2>Редактрование типа продукта</h2>
                        </div>
                        <div class="card-body card-padding">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Наименование</label>
                                <div class="col-sm-3">
                                    <div class="fg-line">
                                        <input type="text" class="form-control" name="name" id="name">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-5">
                                    <button type="submit" class="btn palette-Teal bg waves-effect btn-lg">Сохранить изменения</button>
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
    <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/autosize/dist/autosize.min.js"></script>

    <? APP::Render('core/widgets/js') ?>

    <script>
        $(document).ready(function() {
            $('#name').val('<?= $data['product-type']['name'] ?>');

            $('#update-product-type').submit(function(event) {
                event.preventDefault();

                var name = $(this).find('#name');
                name.closest('.form-group').removeClass('has-error has-feedback').find('.form-control-feedback, .help-block').remove();
                if (name.val() === '') { name.closest('.form-group').addClass('has-error has-feedback').find('.col-sm-3').append('<span class="zmdi zmdi-close form-control-feedback"></span><small class="help-block">Not specified</small>'); return false; }

                $(this).find('[type="submit"]').html('Подождите...').attr('disabled', true);

                $.ajax({
                    type: 'post',
                    url: '<?= APP::Module('Routing')->root ?>admin/billing/products/types/api/update.json',
                    data: $(this).serialize(),
                    success: function(result) {
                        switch(result.status) {
                            case 'success':
                                swal({
                                    title: 'Готово',
                                    text: 'Тип продукта "' + name.val() + '" успешно обновлен',
                                    type: 'success',
                                    showCancelButton: false,
                                    confirmButtonText: 'OK',
                                    closeOnConfirm: false
                                }, function(){
                                    window.location.href = '<?= APP::Module('Routing')->root ?>admin/billing/products/types';
                                });
                                break;
                            case 'error':
                                $.each(result.errors, function(i, error) {});
                                break;
                        }

                        $('#update-product-type').find('[type="submit"]').html('Сохранить изменения').attr('disabled', false);
                    }
                });
            });
        });
    </script>
</body>
</html>