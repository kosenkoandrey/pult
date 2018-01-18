<?
$filters = htmlspecialchars(isset(APP::Module('Routing')->get['filters']) ? APP::Module('Crypt')->Decode(APP::Module('Routing')->get['filters']) : '{"logic":"intersect","rules":[{"method":"trigger_id","settings":{"logic":"LIKE","value":"%"}}]}');
?>
<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Управление событиями</title>

        <!-- Vendor CSS -->
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">        
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/google-material-color/dist/palette.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bootgrid/jquery.bootgrid.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/modules/smartlog/rules.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
        
        <style>
            #smartlog-table-header .actionBar .actions > button {
                display: none;
            }
        </style>
        
        <? APP::Render('core/widgets/css') ?>
    </head>
    <body data-ma-header="teal">
        <? 
        APP::Render('admin/widgets/header', 'include', [
            'SmartLog' => 'admin/smartlog'
        ]);
        ?>
        <section id="main">
            <? APP::Render('admin/widgets/sidebar') ?>

            <section id="content">
                <div class="container">
                    <div class="card">
                        <div class="card-header">
                            <h2>Управление событиями</h2>
                        </div>
                        <div class="card-body card-padding">
                            <input type="hidden" name="search" value="<?= $filters ?>" id="search">
                            <div class="btn-group">
                                <button type="button" id="render-table" class="btn btn-default"><i class="zmdi zmdi-check"></i> Сделать выборку</button>
                            
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown" type="button">
                                        Выполнить действие <span class="caret"></span>
                                    </button>
                                    <ul id="search_results_actions" class="dropdown-menu" role="menu">
                                        <li><a data-action="remove" href="javascript:void(0)">Удалить</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-vmiddle" id="smartlog-table">
                                <thead>
                                    <tr>
                                        <th data-column-id="id" data-type="numeric" data-order="desc">ID</th>
                                        <th data-column-id="trigger_id" data-formatter="trigger_id">Триггер</th>
                                        <th data-column-id="object_id" data-formatter="object_id">Объект</th>
                                        <th data-column-id="user_id">Пользователь</th>
                                        <th data-column-id="cr_date">Дата</th>
                                        <th data-column-id="actions" data-formatter="actions" data-sortable="false">Действия</th>
                                    </tr>
                                </thead>
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
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/json/dist/jquery.json.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bootgrid/jquery.bootgrid.updated.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/moment/min/moment.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

        <script src="<?= APP::Module('Routing')->root ?>public/modules/smartlog/rules.js"></script> 
        
        <? APP::Render('core/widgets/js') ?>
        
        <script>
            $(document).ready(function() {
                $('#search').SmartLogRulesEditor({
                    'debug': true
                });
                
                $(document).on('click', '#search_results_actions a', function () {
                    var action = $(this).data('action');
                    
                    swal({
                        title: 'Are you sure?',
                        text: 'You will not be able to recover this action',
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#DD6B55',
                        confirmButtonText: 'Yes',
                        cancelButtonText: 'No',
                        closeOnConfirm: false,
                        closeOnCancel: true
                    }, function(isConfirm){
                        if (isConfirm) {
                            $.post('<?= APP::Module('Routing')->root ?>admin/smartlog/api/action.json', {
                                action: action,
                                rules: $('#search').val()
                            }, function() { 
                                smartlog_table.bootgrid('reload', true);
                                swal('Complete!', 'Action has been completed', 'success');
                            });
                        }
                    });
                });
                
                $(document).on('click', '#render-table', function () {
                    $('#smartlog-table').bootgrid('reload');
                });
                
                var smartlog_table = $("#smartlog-table").bootgrid({
                    requestHandler: function (request) {
                        var model = {
                            search: $('#search').val(),
                            current: request.current,
                            rows: request.rowCount
                        };

                        for (var key in request.sort) {
                            model.sort_by = key;
                            model.sort_direction = request.sort[key];
                        }

                        return JSON.stringify(model);
                    },
                    ajaxSettings: {
                        method: 'POST',
                        cache: false,
                        contentType: 'application/json'
                    },
                    ajax: true,
                    url: '<?= APP::Module('Routing')->root ?>admin/smartlog/api/search.json',
                    css: {
                        icon: 'zmdi icon',
                        iconColumns: 'zmdi-view-module',
                        iconDown: 'zmdi-chevron-down pull-left',
                        iconRefresh: 'zmdi-refresh',
                        iconUp: 'zmdi-chevron-up pull-left'
                    },
                    templates: {
                        search: ""
                    },
                    formatters: {
                        trigger_id: function(column, row) {
                            switch (row.trigger_id) {
                                case 'user_death':
                                    return 'Смерть пользователя';
                                    break;
                                default:
                                    return row.trigger_id;
                            }
                        },
                        object_id: function(column, row) {
                            switch (row.trigger_id) {
                                case 'user_death':
                                    return '<a href="<?= APP::Module('Routing')->root ?>admin/users/profile/' + row.object_email + '" target="_blank">' + row.object_email + '</a>';
                                    break;
                                default:
                                    return row.object_id;
                            }
                        },
                        actions: function(column, row) {
                            return  '<a target="_blank" href="<?= APP::Module('Routing')->root ?>admin/smartlog/view/' + row.smartlog_id_token + '" class="btn btn-sm btn-default btn-icon waves-effect waves-circle"><span class="zmdi zmdi-eye"></span></a> ' + 
                                    '<a href="javascript:void(0)" class="btn btn-sm btn-default btn-icon waves-effect waves-circle remove-smartlog" data-smartlog-id="' + row.id + '"><span class="zmdi zmdi-delete"></span></a>';
                        }
                    }
                }).on('loaded.rs.jquery.bootgrid', function () {
                    smartlog_table.find('.remove-smartlog').on('click', function (e) {
                        var smartlog_id = $(this).data('smartlog-id');

                        swal({
                            title: 'Are you sure?',
                            text: 'You will not be able to recover this smartlog',
                            type: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#DD6B55',
                            confirmButtonText: 'Yes',
                            cancelButtonText: 'No',
                            closeOnConfirm: false,
                            closeOnCancel: true
                        }, function(isConfirm){
                            if (isConfirm) {
                                $.post('<?= APP::Module('Routing')->root ?>admin/smartlog/api/remove.json', {
                                    id: smartlog_id
                                }, function() { 
                                    smartlog_table.bootgrid('reload', true);
                                    swal('Deleted!', 'Cost has been deleted', 'success');
                                });
                            }
                        });
                    });
                });
            });
        </script>
    </body>
</html>