<?
$filters = htmlspecialchars(isset(APP::Module('Routing')->get['filters']) ? APP::Module('Crypt')->Decode(APP::Module('Routing')->get['filters']) : '{"logic":"intersect","rules":[{"method":"item","settings":{"logic":"LIKE","value":"%"}}]}');
?>
<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Рейтинг</title>

        <!-- Vendor CSS -->
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">        
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/google-material-color/dist/palette.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bootgrid/jquery.bootgrid.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/modules/rating/rules.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
        
        <style>
            #rating-table-header .actionBar .actions > button {
                display: none;
            }
            
            .rating-column-id {
                width: 60px;
            }
            
            .rating-column-rating {
                width: 110px;
            }
            
            .rating-column-rating-row {
                font-size: 22px;
            }
            
            .rating-column-rating-row .star {
                color: #ffa500;
            }
            
            .rating-column-object {
                width: 220px;
            }
            
            .rating-column-user {
                width: 150px;
            }
            
            .rating-column-up-date {
                width: 150px;
            }
            
            .rating-column-comment {
                width: 400px;
            }
            
            .rating-column-object-row,
            .rating-column-comment-row {
                white-space: normal !important;
            }
        </style>
        
        <? APP::Render('core/widgets/css') ?>
    </head>
    <body data-ma-header="teal">
        <? 
        APP::Render('admin/widgets/header', 'include', [
            'Рейтинг' => 'admin/rating'
        ]);
        ?>
        <section id="main">
            <? APP::Render('admin/widgets/sidebar') ?>

            <section id="content">
                <div class="container">
                    <div class="card">
                        <div class="card-header">
                            <h2>Управление рейтингом</h2>
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
                            <table class="table table-hover table-vmiddle" id="rating-table">
                                <thead>
                                    <tr>
                                        <th data-column-id="id" data-type="numeric" data-order="desc" data-header-css-class="rating-column-id">ID</th>
                                        <th data-column-id="user" data-formatter="user" data-sortable="false" data-header-css-class="rating-column-user">Пользователь</th>
                                        <th data-column-id="rating" data-formatter="rating" data-sortable="false" data-header-css-class="rating-column-rating" data-css-class="rating-column-rating-row">Оценка</th>
                                        <th data-column-id="object" data-formatter="object" data-sortable="false" data-header-css-class="rating-column-object" data-css-class="rating-column-object-row">Объект</th>
                                        <th data-column-id="comment" data-sortable="false" data-formatter="comment" data-header-css-class="rating-column-comment" data-css-class="rating-column-comment-row">Комментарий</th>
                                        <th data-column-id="up_date" data-sortable="false" data-header-css-class="rating-column-up-date">Дата</th>
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

        <script src="<?= APP::Module('Routing')->root ?>public/modules/rating/rules.js"></script> 
        
        <? APP::Render('core/widgets/js') ?>
        
        <script>
            $(document).ready(function() {
                $('#search').RefRulesEditor({
                    'debug': true
                });

                $(document).on('click', '#render-table', function () {
                    $('#rating-table').bootgrid('reload');
                });
                
                $("#rating-table").bootgrid({
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
                    url: '<?= APP::Module('Routing')->root ?>admin/rating/api/search.json',
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
                        object: function(column, row) {
                            if (row.object_details.id_hash) {
                                switch(row.item) {
                                    case 'mail': return '<a href="<?= APP::Module('Routing')->root ?>admin/mail/letters/preview/' + row.object_details.id_hash + '" target="_blank" class="object">' + row.object_details.subject + '</a>'; break;
                                    default: return row.item + '/' + row.object;
                                }
                            } else {
                                return 'Объект удален';
                            }
                        },
                        user: function(column, row) {
                            return '<a href="<?= APP::Module('Routing')->root ?>admin/users/profile/' + row.user + '" target="_blank" class="user">' + row.user_email + '</a>';
                        },
                        rating: function(column, row) {
                            var rating = [];
                            
                            for (var i = 1; i <= parseInt(row.rating); i++) {
                                rating.push('<i class="zmdi zmdi-star star"></i>');
                            }
                            
                            for (var i = (parseInt(row.rating) + 1); i <= 5; i++) {
                                rating.push('<i class="zmdi zmdi-star-outline"></i>');
                            }
                            
                            return rating.join('');
                        }
                    }
                });
            });
        </script>
    </body>
</html>