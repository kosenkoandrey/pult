<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Детали платежа #<?= $data['payment']['id'] ?></title>

        <!-- Vendor CSS -->
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/google-material-color/dist/palette.css" rel="stylesheet">
        
        <style></style>
        
        <? APP::Render('core/widgets/css') ?>
    </head>
    <body data-ma-header="teal">
        <?
        APP::Render('admin/widgets/header', 'include', [
            'Платежи' => 'admin/billing/payments'
        ]);
        ?>
        <section id="main">
            <? APP::Render('admin/widgets/sidebar') ?>

            <section id="content">
                <div class="container">
                    <div class="card">
                        <div class="card-header">
                            <h2>Детали платежа #<?= $data['payment']['id'] ?></h2>
                        </div>
                        
                        <div class="card-body">
                            <table class="table table-hover bootgrid-table">
                                <tbody>
                                    <tr>
                                        <td width="30%">ID платежа</td>
                                        <td><?= $data['payment']['id'] ?></td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Счет</td>
                                        <td><?= $data['payment']['invoice'] ?></td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Оператор</td>
                                        <td><?= $data['payment']['method'] ?></td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Дата платежа</td>
                                        <td><?= $data['payment']['cr_date'] ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <?
                    if (count($data['details'])) {
                        ?>
                        <div class="card">
                            <div class="card-header">
                                <h2>Дополнительная информация</h2>
                            </div>

                            <div class="card-body">
                                <table class="table table-hover bootgrid-table">
                                    <tbody>
                                        <?
                                        foreach ($data['details'] as $details) {
                                            ?>
                                            <tr>
                                                <td width="30%"><?= $details['item'] ?></td>
                                                <td><?= $details['value'] ?></td>
                                            </tr>
                                            <?
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?
                    }
                    ?>
                </div>
            </section>

            <? APP::Render('admin/widgets/footer') ?>
        </section>

        <? APP::Render('core/widgets/page_loader') ?>
        <? APP::Render('core/widgets/ie_warning') ?>

        <!-- Javascript Libraries -->
        <!-- Javascript Libraries -->
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/Waves/dist/waves.min.js"></script>

        <? APP::Render('core/widgets/js') ?>

        <!-- OPTIONAL -->
        <script></script>
    </body>
</html>