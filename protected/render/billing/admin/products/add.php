<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Добавление продукта</title>

    <!-- Vendor CSS -->
    <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
    <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
    <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">
    <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/google-material-color/dist/palette.css" rel="stylesheet">
    <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet">
    <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css" rel="stylesheet">
    <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/chosen/chosen.min.css" rel="stylesheet">

    <? APP::Render('core/widgets/css') ?>
</head>
<body data-ma-header="teal">
    <?
    APP::Render('admin/widgets/header', 'include', [
        'Продукты' => 'admin/billing/products'
    ]);
    ?>
    <section id="main">
        <? APP::Render('admin/widgets/sidebar') ?>

        <section id="content">
            <div class="container">
                <div class="card">
                    <form id="add-product" class="form-horizontal" role="form">
                        <div class="card-header">
                            <h2>Добавление продукта</h2>
                        </div>
                        <div class="card-body card-padding">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Наименование</label>
                                <div class="col-sm-10">
                                    <div class="fg-line">
                                        <input type="text" class="form-control" name="name" id="name">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="group_id" class="col-sm-2 control-label">Группа</label>
                                <div class="col-sm-10">
                                    <div class="fg-line">
                                        <input type="text" class="form-control" name="group_id" id="group_id">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="alt_id" class="col-sm-2 control-label">Альт. ID</label>
                                <div class="col-sm-10">
                                    <div class="fg-line">
                                        <input type="text" class="form-control" name="alt_id" id="alt_id">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-sm-2 control-label">Описание</label>
                                <div class="col-sm-10">
                                    <div class="fg-line">
                                        <input type="text" class="form-control" name="description" id="description">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="amount" class="col-sm-2 control-label">Цена</label>
                                <div class="col-sm-3">
                                    <div class="fg-line">
                                        <input type="text" class="form-control" name="amount" id="amount">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ignore_group" class="col-sm-2 control-label">Исключить группы если куплен</label>
                                <div class="col-sm-3">
                                    <div class="fg-line">
                                        <input type="text" class="form-control" name="ignore_group" id="ignore_group">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ignore_products" class="col-sm-2 control-label">Исключить продукты если куплен</label>
                                <div class="col-sm-3">
                                    <div class="fg-line">
                                        <input type="text" class="form-control" name="ignore_products" id="ignore_products">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ignore_group_sell" class="col-sm-2 control-label">Исключить группы при продаже</label>
                                <div class="col-sm-3">
                                    <div class="fg-line">
                                        <input type="text" class="form-control" name="ignore_group_sell" id="ignore_group_sell">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ignore_products_sell" class="col-sm-2 control-label">Исключить продукты при продаже</label>
                                <div class="col-sm-3">
                                    <div class="fg-line">
                                        <input type="text" class="form-control" name="ignore_products_sell" id="ignore_products_sell">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="related_products" class="col-sm-2 control-label">Связанные продукты</label>
                                <div class="col-sm-10">
                                    <div class="fg-line">
                                        <input type="text" class="form-control" name="related_products" id="related_products">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="members_access" class="col-sm-2 control-label">Доступ к мемберке</label>
                                <div class="col-md-10">
                                    <div id="members-access"></div>
                                    <button id="add-members-access" type="button" class="btn btn-default">Добавить объект</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Дополнительные продукты</label>
                                <div class="col-md-10">
                                    <div id="secondary-products"></div>
                                    <button id="add-secondary-product" type="button" class="btn btn-default">Добавить продукт</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="stop_tunnels" class="col-sm-2 control-label">Останавливать туннели при покупке</label>
                                <div class="col-sm-3">
                                    <div class="fg-line">
                                        <input type="text" class="form-control" name="stop_tunnels" id="stop_tunnels">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="state" class="col-sm-2 control-label">Состояние</label>
                                <div class="col-sm-3">
                                    <div class="fg-line">
                                        <input type="text" class="form-control" name="state" id="state" value="active">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="multi_sale" class="col-sm-2 control-label">Мультипродажа</label>
                                <div class="col-sm-3">
                                    <div class="fg-line">
                                        <input type="text" class="form-control" name="multi_sale" id="multi_sale" value="yes">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="descr_link" class="col-sm-2 control-label">Ссылка на описание</label>
                                <div class="col-sm-10">
                                    <div class="fg-line">
                                        <input type="text" class="form-control" name="descr_link" id="descr_link">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="access_link" class="col-sm-2 control-label">Ссылка для доступа</label>
                                <div class="col-sm-10">
                                    <div class="fg-line">
                                        <input type="text" class="form-control" name="access_link" id="access_link">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sort_index" class="col-sm-2 control-label">Индекс сортировки</label>
                                <div class="col-sm-3">
                                    <div class="fg-line">
                                        <input type="text" class="form-control" name="sort_index" id="sort_index" value="10000">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sale_notify_email" class="col-sm-2 control-label">Уведомление о покупке (E-Mail)</label>
                                <div class="col-sm-3">
                                    <div class="fg-line">
                                        <input type="text" class="form-control" name="sale_notify_email" id="sale_notify_email">
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
    <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/chosen/chosen.jquery.min.js"></script>

    <? APP::Render('core/widgets/js') ?>

    <script>
        $(document).ready(function() {
            var members_access_counter = 0;
            var secondary_products_counter = 0;

            $('#add-members-access').click(function() {
                members_access_counter ++;

                $('#members-access').append([
                    '<div class="row m-b-10">',
                        '<div class="col-md-6">',
                            '<input class="form-control" id="members-access-id-' + members_access_counter + '" name="members_access[' + members_access_counter + '][id]" placeholder="Object" type="text">',
                        '</div>',
                        '<div class="col-md-5">',
                            '<input class="form-control" id="members-access-time-' + members_access_counter + '" name="members_access[' + members_access_counter + '][timeout]" placeholder="Timeout" type="text" value="+0 days">',
                        '</div>',
                        '<div class="col-md-1">',
                            '<button type="button" class="remove-members-access btn palette-Teal btn-icon bg waves-effect waves-circle waves-float zmdi zmdi-close"></button>',
                        '</div>',
                    '</div>'
                ].join(''));
            });
            
            $('#add-secondary-product').click(function() {
                var counter = ++secondary_products_counter; 

                var product_item = [
                    '<div class="row m-b-10">',
                        '<div class="col-md-6">',
                            '<select class="form-control" id="secondary-products-' + counter + '" name="secondary_products[' + counter + '][id]" data-placeholder="Выберите продукт"></select>',
                        '</div>',
                        '<div class="col-md-5">',
                            '<div class="input-group">',
                                '<span class="input-group-addon" style="font-size: 14px;">открытие через</span>',
                                '<input class="m-l-20 form-control" id="secondary-products-time-' + counter + '" name="secondary_products[' + counter + '][timeout]" placeholder="timeout" type="text" value="+0 days">',
                            '</div>',
                        '</div>',
                        '<div class="col-md-1 mar-btm">',
                            '<button type="button" class="remove-secondary-products btn palette-Teal btn-icon bg waves-effect waves-circle waves-float zmdi zmdi-close"></button>',
                        '</div>',
                    '</div>'
                ];

                $('#secondary-products').append(product_item.join(''));

                var products_items = [];

                $.each(<?= json_encode($data['products_list']) ?>, function(group, products) {
                    products_items.push('<optgroup label="' + group + '">');
                    
                    $.each(products, function() {
                        products_items.push('<option value="' + this.id + '">' + this.name + ' (' + this.amount + ' руб.)</option>');
                    });
                    
                    products_items.push('</optgroup>');
                });

                $('#secondary-products-' + counter)
                .append(products_items.join(''))
                .chosen({
                    width: '100%',
                    allow_single_deselect: true
                });
            });

            $(document).on('click', '.remove-members-access', function () {
                $(this).closest('.row').remove();
            });
            
            $(document).on('click', '.remove-secondary-products', function () {
                $(this).closest('.row').remove();
            });

            $('#add-product').submit(function(event) {
                event.preventDefault();

                var name = $(this).find('#name');
                var amount = $(this).find('#amount');
                
                name.closest('.form-group').removeClass('has-error has-feedback').find('.form-control-feedback, .help-block').remove();
                amount.closest('.form-group').removeClass('has-error has-feedback').find('.form-control-feedback, .help-block').remove();

                if (name.val() === '') { name.closest('.form-group').addClass('has-error has-feedback').find('.col-sm-3').append('<span class="zmdi zmdi-close form-control-feedback"></span><small class="help-block">Not specified</small>'); return false; }
                if (amount.val() === '') { amount.closest('.form-group').addClass('has-error has-feedback').find('.col-sm-3').append('<span class="zmdi zmdi-close form-control-feedback"></span><small class="help-block">Not specified</small>'); return false; }                                                                                                                                      //if (members_access.val() === '') { members_access.closest('.form-group').addClass('has-error has-feedback').find('.col-sm-3').append('<span class="zmdi zmdi-close form-control-feedback"></span><small class="help-block">Not specified</small>'); return false; }

                $(this).find('[type="submit"]').html('Подождите...').attr('disabled', true);

                $.ajax({
                    type: 'post',
                    url: '<?= APP::Module('Routing')->root ?>admin/billing/products/api/add.json',
                    data: $(this).serialize(),
                    success: function(result) {
                        switch(result.status) {
                            case 'success':
                                swal({
                                    title: 'Готово',
                                    text: 'Продукт "' + name.val() + '" был успешно добавлен',
                                    type: 'success',
                                    showCancelButton: false,
                                    confirmButtonText: 'Ok',
                                    closeOnConfirm: false
                                }, function(){
                                    window.location.href = '<?= APP::Module('Routing')->root ?>admin/billing/products';
                                });
                                break;
                            case 'error':
                                $.each(result.errors, function(i, error) {});
                                break;
                        }

                        $('#add-product').find('[type="submit"]').html('Добавить').attr('disabled', false);
                    }
                });
            });
        });
    </script>
</body>
</html>