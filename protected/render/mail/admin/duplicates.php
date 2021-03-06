<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Статистика по дубликатам отправленных писем</title>

        <!-- Vendor CSS -->
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/google-material-color/dist/palette.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bootgrid/jquery.bootgrid.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet"> 

        <? APP::Render('core/widgets/css') ?>
    </head>
    <body data-ma-header="teal">
        <? 
        APP::Render('admin/widgets/header', 'include', [
            'Почта' => 'admin/mail'
        ]);
        ?>
        <section id="main">
            <? APP::Render('admin/widgets/sidebar') ?>

            <section id="content">
                <div class="container">
                    <div class="card">
                        <div class="card-header">
                            <h2>Статистика по дубликатам отправленных писем</h2>
                            <ul class="actions">
                                <li class="dropdown">
                                    <a href="javascript:void(0)" data-toggle="dropdown">
                                        <i class="zmdi zmdi-more-vert"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="#" data-target="#duplicates-settings-modal" data-toggle="modal"> Фильтр</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-vmiddle" id="users-table">
                                <thead>
                                    <tr>
                                        <th width="20%">Пользователь</th>
                                        <th width="80%">Письма</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?
                                    foreach ($data['users'] as $user => $letters) {
                                        ?>
                                        <tr>
                                            <td><a target="_blank" href="<?= APP::Module('Routing')->root ?>admin/users/profile/<?= $user ?>"><?= $user ?></a></td>
                                            <td>
                                                <?
                                                foreach ($letters as $value) {
                                                    echo '#' . $value . ' <a target="_blank" href="' . APP::Module('Routing')->root . 'admin/mail/letters/preview/' . APP::Module('Crypt')->Encode($value) . '">' . $data['letters'][$value]; ?></a><br><?
                                                }
                                                ?>
                                            </td>
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

        <div id="duplicates-settings-modal" role="dialog" class="modal fade bootbox" tabindex="-1">
            <div class="modal-dialog" style="z-index:999;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal"><span>&times;</span></button>
                        <h4 class="modal-title">Фильтр</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-horizontal form-padding">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Дата</label>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <input id="date-from" type="text" class="form-control">
                                        </div>
                                        <div class="col-xs-6">
                                            <input id="date-to" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Кол-во копий больше</label>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <input id="max_count_duplicates" type="text" class="form-control" value="<?= isset(APP::Module('Routing')->get['max_count_duplicates']) ? (int) APP::Module('Routing')->get['max_count_duplicates'] : 1 ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect apply_settings">Применить</button>
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Отмена</button>
                    </div>
                </div>
            </div>
        </div>
        
        <? APP::Render('core/widgets/page_loader') ?>
        <? APP::Render('core/widgets/ie_warning') ?>

        <!-- Javascript Libraries -->
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/Waves/dist/waves.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/json/dist/jquery.json.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bootgrid/jquery.bootgrid.updated.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/moment/min/moment.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

        <? APP::Render('core/widgets/js') ?>
        
        <script>
            var filter_date = <?= isset(APP::Module('Routing')->get['date']) ? json_encode(APP::Module('Routing')->get['date']) : json_encode(['from' => date('Y-m-d', strtotime('-7 days')), 'to' => date('Y-m-d')]) ?>; 
            
            $('#date-from').datetimepicker({
                format: 'YYYY-MM-DD',
                defaultDate: filter_date ? filter_date.from : new Date()
            });

            $('#date-to').datetimepicker({
                format: 'YYYY-MM-DD',
                defaultDate: filter_date ? filter_date.to : new Date()
            });
            
            $('.apply_settings').on('click', function(e) {
                document.location.href = '<?= APP::Module('Routing')->root ?>admin/mail/duplicates?date[from]=' + $('#date-from').val() + '&date[to]=' + $('#date-to').val() + '&max_count_duplicates=' + $('#max_count_duplicates').val() + '';
            
                $('#duplicates-settings-modal .modal-footer').remove();
                $('#duplicates-settings-modal .modal-body').html('<center><div class="preloader pl-xxl"><svg class="pl-circular" viewBox="25 25 50 50"><circle class="plc-path" cx="50" cy="50" r="20" /></svg></div></center>');
            });
        </script>
    </body>
</html>