<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Добавление группы продуктов</title>

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
        'Группы' => 'admin/billing/products/groups'
    ]);
    ?>
    <section id="main">
        <? APP::Render('admin/widgets/sidebar') ?>

        <section id="content">
            <div class="container">
                <div class="card">
                    <form id="add-product-group" class="form-horizontal" role="form">
                        <div class="card-header">
                            <h2>Добавление группы продуктов</h2>
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
                                <label for="descr" class="col-sm-2 control-label">Описание</label>
                                <div class="col-sm-6">
                                    <div class="fg-line">
                                        <input type="text" class="form-control" name="descr" id="descr">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ignore_group" class="col-sm-2 control-label">Исключить группы если куплен</label>
                                <div class="col-sm-6">
                                    <div class="fg-line">
                                        <input type="text" class="form-control" name="ignore_group" id="ignore_group">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ignore_products" class="col-sm-2 control-label">Исключить продукты если куплен</label>
                                <div class="col-sm-6">
                                    <div class="fg-line">
                                        <input type="text" class="form-control" name="ignore_products" id="ignore_products">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ignore_group_sell" class="col-sm-2 control-label">Исключить группы при продаже</label>
                                <div class="col-sm-6">
                                    <div class="fg-line">
                                        <input type="text" class="form-control" name="ignore_group_sell" id="ignore_group_sell">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ignore_products_sell" class="col-sm-2 control-label">Исключить продукты при продаже</label>
                                <div class="col-sm-6">
                                    <div class="fg-line">
                                        <input type="text" class="form-control" name="ignore_products_sell" id="ignore_products_sell">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="type_id" class="col-sm-2 control-label">Тип продуктов</label>
                                <div class="col-sm-3">
                                    <div class="fg-line">
                                        <input type="text" class="form-control" name="type_id" id="type_id">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-5">
                                    <button type="submit" class="btn palette-Teal bg waves-effect btn-lg">Добавить</button>
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
            $('#add-product-group').submit(function(event) {
                event.preventDefault();

                var name = $(this).find('#name');
                name.closest('.form-group').removeClass('has-error has-feedback').find('.form-control-feedback, .help-block').remove();
                if (name.val() === '') { name.closest('.form-group').addClass('has-error has-feedback').find('.col-sm-3').append('<span class="zmdi zmdi-close form-control-feedback"></span><small class="help-block">Not specified</small>'); return false; }
  
                $(this).find('[type="submit"]').html('Подождите...').attr('disabled', true);

                $.ajax({
                    type: 'post',
                    url: '<?= APP::Module('Routing')->root ?>admin/billing/products/groups/api/add.json',
                    data: $(this).serialize(),
                    success: function(result) {
                        switch(result.status) {
                            case 'success':
                                swal({
                                    title: 'Готово',
                                    text: 'Группа продукта "' + name.val() + '" успешно добавлена',
                                    type: 'success',
                                    showCancelButton: false,
                                    confirmButtonText: 'OK',
                                    closeOnConfirm: false
                                }, function(){
                                    window.location.href = '<?= APP::Module('Routing')->root ?>admin/billing/products/groups';
                                });
                                break;
                            case 'error':
                                $.each(result.errors, function(i, error) {});
                                break;
                        }

                        $('#add-product-group').find('[type="submit"]').html('Добавить').attr('disabled', false);
                    }
                });
            });
        });
    </script>
</body>
</html>