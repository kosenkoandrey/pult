<?
$total_invoices = 0;
$total_profit = 0;

foreach($data as $value) {
    $total_invoices += $value['invoices'];
    $total_profit += $value['profit'];
}
?>
<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Анализ UTM-content меток</title>

        <!-- Vendor CSS -->
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">        
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/google-material-color/dist/palette.css" rel="stylesheet">
        
        <? APP::Render('core/widgets/css') ?>
    </head>
    <body data-ma-header="teal">
        <? 
        APP::Render('admin/widgets/header', 'include', [
            'Анализ UTM-content меток' => 'admin/analytics/utm/content'
        ]);
        ?>
        <section id="main">
            <? APP::Render('admin/widgets/sidebar') ?>

            <section id="content">
                <div class="container">
                    <div class="card">
			<div class="card-header">
                            <h2>Всего <?= $total_invoices ?> счетов на сумму <?= number_format($total_profit, 2, '.', ' ') ?> руб.</h2>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover">
				<thead>
				    <tr>
                                        <th width="40%">UTM-content</td>
                                        <th width="15%">Пользователи (активные)</td>
                                        <th width="15%">Пользователи (все)</td>
                                        <th width="15%">Продажи</td>
                                        <th width="15%">Выручка</td>
                                    </tr>
				</thead>
                                <tbody>
                                    <?
                                    foreach ($data as $utm_content => $stat) {
                                        ?>
                                        <tr>
                                            <td><?= $utm_content ?></td>
					    <td><?= $stat['active_users'] ?></td>
					    <td><?= $stat['users'] ?></td>
					    <td><?= $stat['invoices'] ?></td>
					    <td><?= number_format($stat['profit'], 2, '.', ' ') ?> руб.</td>
                                        </tr>
                                        <?
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
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

        <? APP::Render('core/widgets/js') ?>
    </body>
  </html>
