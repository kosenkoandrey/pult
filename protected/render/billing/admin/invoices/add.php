<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Создание счета</title>

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
        'Счета' => 'admin/billing/invoices'
    ]);
    ?>
    <section id="main">
        <? APP::Render('admin/widgets/sidebar') ?>

        <section id="content">
            <div class="container">
                <div class="card">
                    <form id="add-invoice" class="form-horizontal" role="form">
                        <div class="card-header">
                            <h2>Создание счета</h2>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="date" class="col-md-2 control-label">Дата</label>
                                <div class="col-md-3">
                                    <input id="date" name="date" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="user_id" class="col-sm-2 control-label">Пользователи</label>
                                <div class="col-md-3">
                                    <textarea id="users" name="users" class="form-control"><?= $data['email'] ?></textarea>
                                    <div class="alert alert-success m-t-10" role="alert" style="padding: 15px">Перечислите E-Mail адреса, каждый с новой строки. Пользователи которых нет в БД будут проигнорированы.</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="state" class="col-md-2 control-label">Состояние</label>
                                <div class="col-md-3">
                                    <select id="state" name="state" class="selectpicker form-control" data-width="100%">
                                        <option value="new">новый</option>
                                        <option value="processed">в работе</option>
                                        <option value="success">оплачен</option>
                                    </select>
                                </div>
                            </div>
                            <div id="notification-holder" class="form-group" style="display: none">
                                <label for="notification" class="col-sm-2 control-label">Уведомление об открытии</label>
                                <div class="col-sm-1">
                                    <div class="toggle-switch m-t-10">
                                        <input id="notification" name="notification" type="checkbox" hidden="hidden">
                                        <label for="notification" class="ts-helper"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Продукты</label>
                                <div class="col-md-8">
                                    <div id="products"></div>
                                    <button id="add-product" type="button" class="btn btn-default btn-labeled fa fa-plus">Добавить продукт</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="comment" class="col-md-2 control-label">Комментарий</label>
                                <div class="col-md-6">
                                    <textarea id="comment" name="comment" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="reminder_payment" class="col-sm-2 control-label">Напоминание об оплате</label>
                                <div class="col-sm-1">
                                    <div class="toggle-switch m-t-10">
                                        <input id="reminder_payment" name="reminder_payment" type="checkbox" hidden="hidden">
                                        <label for="reminder_payment" class="ts-helper"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Сумма</label>
                                <div class="col-sm-10">
                                    <p class="form-control-static"><span id="amount">0</span> руб.</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-5">
                                    <button type="submit" class="btn palette-Teal bg waves-effect btn-lg">Создать</button>
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
    <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/moment/min/moment.min.js"></script>
    <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/chosen/chosen.jquery.min.js"></script>

    <? APP::Render('core/widgets/js') ?>

    <script>
        var products_counter = 0;

        $(document).ready(function () {
            autosize($('#users'));
            autosize($('#comment'));
            
            $('#state').on('change', function(){
                switch(this.value) {
                    case 'success': $('#notification-holder').slideDown(300); break;
                    default: $('#notification-holder').slideUp(300); break;
                }
            });

            $('#date').datetimepicker({
                format: 'YYYY-MM-DD H:mm:ss',
                defaultDate: new Date()
            });

            $('#add-invoice').submit(function (event) {
                event.preventDefault();

                var users = $(this).find('#users');
                users.closest('.form-group').removeClass('has-error has-feedback').find('.form-control-feedback, .help-block').remove();

                if (users.val() === '') {
                    users.closest('.form-group').addClass('has-error has-feedback').find('.col-md-3').append('<span class="zmdi zmdi-close form-control-feedback"></span><small class="help-block">Не введен E-Mail или ID пользователя</small>');
                    return false;
                }

                $(this).find('[type="submit"]').html('Подождите...').attr('disabled', true);

                $.ajax({
                    type: 'post',
                    url: '<?= APP::Module('Routing')->root ?>billing/invoices/api/add.json',
                    data: $(this).serialize(),
                    success: function (result) {
                        switch (result.status) {
                            case 'success':
                                swal({
                                    title: 'Готово',
                                    text: 'Счета для указанных пользователей были успешно созданы',
                                    type: 'success',
                                    showCancelButton: false,
                                    confirmButtonText: 'OK',
                                    closeOnConfirm: false
                                }, function () {
                                    window.location.href = '<?= APP::Module('Routing')->root ?>admin/billing/invoices';
                                });
                                break;
                            case 'error':
                                $.each(result.errors, function(i, error) {
                                    switch(error) {
                                        case 1: users.closest('.form-group').addClass('has-error has-feedback').find('.col-md-3').append('<span class="zmdi zmdi-close form-control-feedback"></span><small class="help-block">Пользователи не определены</small>'); break;
                                    }
                                });
                                break;
                        }

                        $('#add-invoice').find('[type="submit"]').html('Создать').attr('disabled', false);
                    }
                });
            });

            // ADD PRODUCT
            $('#add-product').click(function () {
                var counter = ++products_counter; 

                var product_item = [
                    '<div class="row m-b-10">',
                        '<div class="col-md-6">',
                            '<select class="form-control" id="inv-prod-id-' + counter + '" name="products[' + counter + '][id]" data-placeholder="Выберите продукт"></select>',
                        '</div>',
                        '<div class="col-md-4">',
                            '<div class="input-group">',
                                '<input id="inv-prod-amount-' + counter + '" name="products[' + counter + '][amount]" type="number" class="inv-prod-amount form-control">',
                                '<span class="input-group-addon" style="font-size: 14px;">руб.</span>',
                            '</div>',
                        '</div>',
                        '<div class="col-md-2 mar-btm">',
                            '<button type="button" class="remove-invoice-product btn palette-Teal btn-icon bg waves-effect waves-circle waves-float zmdi zmdi-close"></button>',
                        '</div>',
                    '</div>'
                ];

                $('#products').append(product_item.join(''));

                var products_items = [];

                $.each(<?= json_encode($data['products_list']) ?>, function(group, products) {
                    products_items.push('<optgroup label="' + group + '">');
                    
                    $.each(products, function() {
                        products_items.push('<option data-amount="' + this.amount + '" value="' + this.id + '">' + this.name + ' (' + this.amount + ' руб.)</option>');
                    });
                    
                    products_items.push('</optgroup>');
                });

                $('#inv-prod-id-' + counter).append(products_items.join(''));
                
                $('#inv-prod-id-' + counter).chosen({
                    width: '100%',
                    allow_single_deselect: true
                }).change(function() {
                    $('#inv-prod-amount-' + counter)
                    .val($(this).find('option:selected').data('amount'))
                    .trigger('change');
                }).trigger('change');
                
                CalcInvoiceAmount();
            });
            
            // REMOVE PRODUCT
            $(document).on('click', '.remove-invoice-product', function () {
                $(this).closest('.row').remove();
                CalcInvoiceAmount();
            });

            // CHANGE PRODUCT PRICE
            $(document).on('propertychange change click keyup input paste', '.inv-prod-amount', function () {
                CalcInvoiceAmount();
            });


            // CALCULATE INVOICE AMOUNT
            function CalcInvoiceAmount() {
                var total = 0;

                $('.inv-prod-amount').each(function() {
                    var pp = parseInt($(this).val(), 10);
                    if ((pp ^ 0) === pp) total += pp;
                });

                $('#amount').html(total.toString());
            }
        });
    </script>
</body>
</html>