<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>UTM-анализ ROI</title>

        <!-- Vendor CSS -->
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/google-material-color/dist/palette.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bootgrid/jquery.bootgrid.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet"> 

        <style>
            #utm-list .item {
                font-size: 15px;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                border-top: 1px dotted #e3e3e3;
                padding: 15px 0 0 30px;
            }
            #utm-list .item:hover {
                background-color: rgba(245, 245, 245, 0.90);
            }
            #utm-list .item > .control {
                display: inline-block;
                margin-bottom: 15px;
            }
            #utm-list .item > .control > i {
                margin-right: 8px;
                cursor: pointer;
            }
            #utm-list .item > .control > i:hover {
                color: #2e6da4;
            }
            #utm-list .item > .control > span {
                cursor: pointer;
                margin-right: 10px;
            }
            #utm-list .item > .control > span:hover {
                color: #2e6da4;
            }
            
            .utm-source {
                margin-left: 0px;
            }
            .utm-medium,
            .utm-campaign,
            .utm-term,
            .utm-content {
                margin-left: 20px;
            }
            
            #table-header {
                margin-bottom: 10px;
            }
            .item-value {
                width: 170px;
                padding-left: 15px;
            }
            
            .item-value.item-header:first-child{
                padding-left:30px;
            }
            
            .item-value.item-header:last-child{
                padding-right:30px;
            }
            
            .item-value.item-header {
                padding: 15px;
                font-weight: 500;
                color: #333;
                text-transform: uppercase;
            }
            .item-value.item-utm-header {
                display: inline-block;
            }
        </style>
        
        <? APP::Render('core/widgets/css') ?>
        <style>
            .item-links {
                height: 20px;
                margin-bottom: 10px;
                width: 184px;
                margin-right: 10px;
                float: right;
                display: none;
            }
        </style>
            
        
    </head>
    <body data-ma-header="teal">
        <?
        APP::Render('admin/widgets/header', 'include', [
            'Аналитика' => 'admin/analytics/utm/roi'
        ]);
        ?>
        <section id="main">
            <? APP::Render('admin/widgets/sidebar') ?>

            <section id="content">
                <div class="container">
                    <div class="card">
                        <div class="card-header">
                            <h2>UTM-анализ ROI</h2>
                            <ul class="actions">
                                <li class="dropdown">
                                    <a href="javascript:void(0)" data-toggle="dropdown">
                                        <i class="zmdi zmdi-more-vert"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="#" data-target="#utm-roi-sort-modal" data-toggle="modal" data-mode="root" data-sort-field="default" data-sort-mode="asc"> Сортировка "source" меток</a></li>
                                        <li><a href="#" data-target="#utm-roi-date-modal" data-toggle="modal"> Фильтр по дате</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="card-body">
                            <div id="table-header">
                                <div class="item-value item-header item-utm-header">UTM-метки</div>
                                <div class="item-value item-header pull-right">ROI</div>
                                <div class="item-value item-header pull-right">Прибыль</div>
                                <div class="item-value item-header pull-right">Доходы</div>
                                <div class="item-value item-header pull-right">Расходы</div>
                            </div>
                            <div id="utm-list">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <? APP::Render('admin/widgets/footer') ?>
        </section>
        
        <div id="utm-roi-sort-modal" role="dialog" class="modal fade bootbox" tabindex="-1">
            <div class="modal-dialog" style="z-index:999;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal"><span>&times;</span></button>
                        <h4 class="modal-title">Настройки сортировки</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-horizontal form-padding">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Поле</label>
                                <div class="col-md-9">
                                    <select id="sort-field" class="selectpicker">
                                        <option value="default">Название</option>
                                        <option value="cost">Расходы</option>
                                        <option value="revenue">Доходы</option>
                                        <option value="profit">Прибыль</option>
                                        <option value="roi">ROI</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Направление</label>
                                <div class="col-md-9">
                                    <select id="sort-mode" class="selectpicker">
                                        <option value="asc">Возрастание</option>
                                        <option value="desc">Убывание</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect save">Применить</button>
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Отмена</button>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="utm-roi-date-modal" role="dialog" class="modal fade bootbox" tabindex="-1">
            <div class="modal-dialog" style="z-index:999;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal"><span>&times;</span></button>
                        <h4 class="modal-title">Фильтр по дате</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-horizontal form-padding">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Дата</label>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <input id="utm-roi-date-from" type="text" class="form-control">
                                        </div>
                                        <div class="col-xs-6">
                                            <input id="utm-roi-date-to" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect save_date">Применить</button>
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Отмена</button>
                    </div>
                </div>
            </div>
        </div>
        
        <form id="analytics_cohorts" target="_blank" method="post" action="<?= APP::Module('Routing')->root ?>admin/analytics/cohorts">
            <input type="hidden" name="rules" value="">
            <input type="hidden" name="group" value="month">
            <input type="hidden" name="indicators[]" value="total_subscribers_active">
            <input type="hidden" name="indicators[]" value="total_subscribers_unsubscribe">
            <input type="hidden" name="indicators[]" value="total_subscribers_dropped">
            <input type="hidden" name="indicators[]" value="total_clients">
            <input type="hidden" name="indicators[]" value="total_orders">
            <input type="hidden" name="indicators[]" value="total_revenue">
            <input type="hidden" name="indicators[]" value="ltv_client">
            <input type="hidden" name="indicators[]" value="cost">
            <input type="hidden" name="indicators[]" value="subscriber_cost">
            <input type="hidden" name="indicators[]" value="client_cost">
            <input type="hidden" name="indicators[]" value="roi">
        </form>
        
        <form id="ref" target="_blank" method="get" action="<?= APP::Module('Routing')->root ?>admin/users">
            <input type="hidden" name="filters" value="">
        </form>
        
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

        <!-- OPTIONAL -->
        <script>
            var filter_date = <?= isset(APP::Module('Routing')->get['date']) ? json_encode(APP::Module('Routing')->get['date']) : 'false' ?>; 
            
            function formatAmount(nStr) {
                nStr += '';
                x = nStr.split('.');
                x1 = x[0];
                x2 = x.length > 1 ? '.' + x[1] : '';
                var rgx = /(\d+)(\d{3})/;
                while (rgx.test(x1)) {
                        x1 = x1.replace(rgx, '$1' + ',' + '$2');
                }
                return x1 + x2;
            }
            
            function RenderLabels(res, label, value, item) {
                switch(label) {
                    case 'root':
                        $('#utm-list').html('<div class="utm-source"></div>');
                        
                        var total = {
                            cost: [],
                            revenue: []
                        };

                        $.each(res.sort, function(source_index, source_value) {
                            var utm_value = res.labels[source_value].name ? res.labels[source_value].name : '<Не определено>';
                            $('#utm-list > .utm-source').append('<div class="item source" data-state="inactive" id="' + source_value + '"><div class="control"><i class="zmdi zmdi-plus-square zmdi-hc-fw"></i><span data-target="#utm-roi-sort-modal" data-toggle="modal" data-mode="source" data-value="' + res.labels[source_value].name + '" data-sort-field="default" data-sort-mode="asc">' + utm_value + '</span></div><div class="item-value pull-right">' + formatAmount(res.labels[source_value].stat.roi) + ' %</div><div class="item-value pull-right">' + formatAmount(res.labels[source_value].stat.profit) + ' <i class="fa fa-rub" aria-hidden="true"></i></div><div class="item-value pull-right">' + formatAmount(res.labels[source_value].stat.revenue) + ' <i class="fa fa-rub" aria-hidden="true"></i></div><div class="item-value pull-right">' + formatAmount(res.labels[source_value].stat.cost) + ' <i class="fa fa-rub" aria-hidden="true"></i></div><div class="btn-group item-links"><button data-filters="' + res.labels[source_value].ref + '" class="btn btn-default btn-xs ref">справочник</button><button data-rules="' + res.labels[source_value].rules + '" class="btn btn-default btn-xs analytics-cohorts">когортный анализ</button></div></div>');
                        
                            total.cost.push(res.labels[source_value].stat.cost);
                            total.revenue.push(res.labels[source_value].stat.revenue);
                        });
                        
                        var total_cost = total.cost.reduce(function(a, b) { return a + b; }, 0);
                        var total_revenue = total.revenue.reduce(function(a, b) { return a + b; }, 0);
                        var total_profit = total_revenue - total_cost;
                        var total_roi = ((total_revenue - total_cost) / total_cost) * 100;

                        $('#utm-list').append('<div class="item"><div class="control">Итого</div><div class="item-value pull-right">' + formatAmount(total_roi.toFixed(2)) + ' %</div><div class="item-value pull-right">' + formatAmount(total_profit) + ' <i class="fa fa-rub" aria-hidden="true"></i></div><div class="item-value pull-right">' + formatAmount(total_revenue) + ' <i class="fa fa-rub" aria-hidden="true"></i></div><div class="item-value pull-right">' + formatAmount(total_cost) + ' <i class="fa fa-rub" aria-hidden="true"></i></div><div class="btn-group item-links"></div></div>');
                        break;
                    case 'source':
                        $('#' + item + ' > .utm-medium').empty();

                        $.each(res.sort, function(medium_index, medium_value) {
                            var utm_value = res.labels[medium_value].name ? res.labels[medium_value].name : '<Не определено>';
                            $('#' + item + ' > .utm-medium').append('<div class="item medium" data-state="inactive" id="' + medium_value + '"><div class="control"><i class="zmdi zmdi-plus-square zmdi-hc-fw"></i><span data-target="#utm-roi-sort-modal" data-toggle="modal" data-mode="medium" data-value="' + res.labels[medium_value].name + '" data-sort-field="default" data-sort-mode="asc">' + utm_value + '</span></div><div class="item-value pull-right">' + formatAmount(res.labels[medium_value].stat.roi) + ' %</div><div class="item-value pull-right">' + formatAmount(res.labels[medium_value].stat.profit) + ' <i class="fa fa-rub" aria-hidden="true"></i></div><div class="item-value pull-right">' + formatAmount(res.labels[medium_value].stat.revenue) + ' <i class="fa fa-rub" aria-hidden="true"></i></div><div class="item-value pull-right">' + formatAmount(res.labels[medium_value].stat.cost) + ' <i class="fa fa-rub" aria-hidden="true"></i></div><div class="btn-group item-links"><button data-filters="' + res.labels[medium_value].ref + '" class="btn btn-default btn-xs ref">справочник</button><button data-rules="' + res.labels[medium_value].rules + '" class="btn btn-default btn-xs analytics-cohorts">когортный анализ</button></div></div>');
                        });
                        break;
                    case 'medium':
                        $('#' + item + ' > .utm-campaign').empty();

                        $.each(res.sort, function(campaign_index, campaign_value) {
                            var utm_value = res.labels[campaign_value].name ? res.labels[campaign_value].name : '<Не определено>';
                            $('#' + item + ' > .utm-campaign').append('<div class="item campaign" data-state="inactive" id="' + campaign_value + '"><div class="control"><i class="zmdi zmdi-plus-square zmdi-hc-fw"></i><span data-target="#utm-roi-sort-modal" data-toggle="modal" data-mode="campaign" data-value="' + res.labels[campaign_value].name + '" data-sort-field="default" data-sort-mode="asc">' + utm_value + '</span></div><div class="item-value pull-right">' + formatAmount(res.labels[campaign_value].stat.roi) + ' %</div><div class="item-value pull-right">' + formatAmount(res.labels[campaign_value].stat.profit) + ' <i class="fa fa-rub" aria-hidden="true"></i></div><div class="item-value pull-right">' + formatAmount(res.labels[campaign_value].stat.revenue) + ' <i class="fa fa-rub" aria-hidden="true"></i></div><div class="item-value pull-right">' + formatAmount(res.labels[campaign_value].stat.cost) + ' <i class="fa fa-rub" aria-hidden="true"></i></div><div class="btn-group item-links"><button data-filters="' + res.labels[campaign_value].ref + '" class="btn btn-default btn-xs ref">справочник</button><button data-rules="' + res.labels[campaign_value].rules + '" class="btn btn-default btn-xs analytics-cohorts">когортный анализ</button></div></div>');
                        });
                        break;
                    case 'campaign':
                        $('#' + item + ' > .utm-term').empty();

                        $.each(res.sort, function(term_index, term_value) {
                            var utm_value = res.labels[term_value].name ? res.labels[term_value].name : '<Не определено>';
                            $('#' + item + ' > .utm-term').append('<div class="item term" data-state="inactive" id="' + term_value + '"><div class="control"><i class="zmdi zmdi-plus-square zmdi-hc-fw"></i><span data-target="#utm-roi-sort-modal" data-toggle="modal" data-mode="term" data-value="' + res.labels[term_value].name + '" data-sort-field="default" data-sort-mode="asc">' + utm_value + '</span></div><div class="item-value pull-right">' + formatAmount(res.labels[term_value].stat.roi) + ' %</div><div class="item-value pull-right">' + formatAmount(res.labels[term_value].stat.profit) + ' <i class="fa fa-rub" aria-hidden="true"></i></div><div class="item-value pull-right">' + formatAmount(res.labels[term_value].stat.revenue) + ' <i class="fa fa-rub" aria-hidden="true"></i></div><div class="item-value pull-right">' + formatAmount(res.labels[term_value].stat.cost) + ' <i class="fa fa-rub" aria-hidden="true"></i></div><div class="btn-group item-links"><button data-filters="' + res.labels[term_value].ref + '" class="btn btn-default btn-xs ref">справочник</button><button data-rules="' + res.labels[term_value].rules + '" class="btn btn-default btn-xs analytics-cohorts">когортный анализ</button></div></div>');
                        });
                        break;
                    case 'term':
                        $('#' + item + ' > .utm-content').empty();

                        $.each(res.sort, function(content_index, content_value) {
                            var utm_value = res.labels[content_value].name ? res.labels[content_value].name : '<Не определено>';
                            $('#' + item + ' > .utm-content').append('<div class="item content" data-state="inactive" id="' + content_value + '"><div class="control"><i class="fa fa-angle-right"></i><span data-target="#utm-roi-sort-modal" data-toggle="modal" data-mode="content" data-value="' + res.labels[content_value].name + '" data-sort-field="default" data-sort-mode="asc">' + utm_value + '</span></div><div class="item-value pull-right">' + formatAmount(res.labels[content_value].stat.roi) + ' %</div><div class="item-value pull-right">' + formatAmount(res.labels[content_value].stat.profit) + ' <i class="fa fa-rub" aria-hidden="true"></i></div><div class="item-value pull-right">' + formatAmount(res.labels[content_value].stat.revenue) + ' <i class="fa fa-rub" aria-hidden="true"></i></div><div class="item-value pull-right">' + formatAmount(res.labels[content_value].stat.cost) + ' <i class="fa fa-rub" aria-hidden="true"></i></div><div class="btn-group item-links"><button data-filters="' + res.labels[content_value].ref + '" class="btn btn-default btn-xs ref">справочник</button><button data-rules="' + res.labels[content_value].rules + '" class="btn btn-default btn-xs analytics-cohorts">когортный анализ</button></div></div>');
                        });
                        break;
                }
            }
            
            function GetLabels(label, value, item) {
                if(label == 'root'){
                    $('#utm-list').html('<center><div class="preloader pl-xxl"><svg class="pl-circular" viewBox="25 25 50 50"><circle class="plc-path" cx="50" cy="50" r="20" /></svg></div></center>');
                }
                
                $.ajax({
                    type: 'post',
                    url: '<?= APP::Module('Routing')->root ?>admin/analytics/utm/roi',
                    data: {
                        api: 'labels',
                        settings: {
                            label: label,
                            value: value
                        },
                        filters: {
                            date: filter_date
                        },
                        rules: '<?= json_encode($data["rules"]) ?>'
                    },
                    success: function(res) {
                        RenderLabels(res, label, value, item);
                    }
                });
            }

            $('#utm-roi-sort-modal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var modal = $(this);
                var mode = button.data('mode');
                
                var sort_field = button.attr('data-sort-field');
                var sort_mode = button.attr('data-sort-mode');

                var source_item = button.closest('.item.source');
                var medium_item = button.closest('.item.medium');
                var campaign_item = button.closest('.item.campaign');
                var term_item = button.closest('.item.term');
                var content_item = button.closest('.item.content');

                var source_value = $('.control > span', source_item).data('value');
                var medium_value = $('.control > span', medium_item).data('value');
                var campaign_value = $('.control > span', campaign_item).data('value');
                var term_value = $('.control > span', term_item).data('value');
                var content_value = $('.control > span', content_item).data('value');

                var label = mode;
                var value = new String();
                var item = {};

                $('.selectpicker', modal)
                .selectpicker({
                    width: '100%'
                });

                $('#sort-field').val(sort_field);
                $('#sort-mode').val(sort_mode);
                
                $('#sort-field').selectpicker('refresh');
                $('#sort-mode').selectpicker('refresh');
  
                $('.save', modal).off('click').on('click', function(e){
                    //$('#utm-list').html('<center><div class="preloader pl-xxl"><svg class="pl-circular" viewBox="25 25 50 50"><circle class="plc-path" cx="50" cy="50" r="20" /></svg></div></center>');
                
                    modal.modal('hide');
                    
                    var sort = [
                        $('#sort-field').val(),
                        $('#sort-mode').val()
                    ];

                    button.attr('data-sort-field', sort[0]);
                    button.attr('data-sort-mode', sort[1]);
                    
                    switch(mode) {
                        case 'root':
                            $('#utm-list > .utm-source').html('<div class="preloader pl-xs"><svg class="pl-circular" viewBox="25 25 50 50"><circle class="plc-path" cx="50" cy="50" r="20"></circle></svg></div> Сортировка "source" меток...');
                            break;
                        case 'source':
                            value = source_value;
                            item = source_item.attr('id');
                            $('#' + item + ' > .utm-medium').html('<div class="preloader pl-xs"><svg class="pl-circular" viewBox="25 25 50 50"><circle class="plc-path" cx="50" cy="50" r="20"></circle></svg></div> Сортировка "medium" меток...');
                            break;
                        case 'medium':
                            value = {
                                source: source_value,
                                medium: medium_value
                            };
                            item = medium_item.attr('id');
                            $('#' + item + ' > .utm-campaign').html('<div class="preloader pl-xs"><svg class="pl-circular" viewBox="25 25 50 50"><circle class="plc-path" cx="50" cy="50" r="20"></circle></svg></div> Сортировка "campaign" меток...');
                            break;
                        case 'campaign':
                            value = {
                                source: source_value,
                                medium: medium_value,
                                campaign: campaign_value
                            };
                            item = campaign_item.attr('id');
                            $('#' + item + ' > .utm-term').html('<div class="preloader pl-xs"><svg class="pl-circular" viewBox="25 25 50 50"><circle class="plc-path" cx="50" cy="50" r="20"></circle></svg></div> Сортировка "term" меток...');
                            break;
                        case 'term':
                            value = {
                                source: source_value,
                                medium: medium_value,
                                campaign: campaign_value,
                                term: term_value
                            };
                            item = term_item.attr('id');
                            $('#' + item + ' > .utm-campaign').html('<div class="preloader pl-xs"><svg class="pl-circular" viewBox="25 25 50 50"><circle class="plc-path" cx="50" cy="50" r="20"></circle></svg></div> Сортировка "content" меток...');
                            break;
                    }
                
                    $.ajax({
                        type: 'post',
                        url: '<?= APP::Module('Routing')->root ?>admin/analytics/utm/roi',
                        data: {
                            api: 'labels',
                            settings: {
                                label: label,
                                value: value,
                                sort: sort
                            },
                            filters: {
                                date: filter_date
                            },
                            rules: '<?= json_encode($data["rules"]) ?>'
                        },
                        success: function(res) {
                            RenderLabels(res, label, value, item);
                        }
                    });
                });
            });

            $(document).ready(function() {
                //$('#utm-list').html('<center><div class="preloader pl-xxl"><svg class="pl-circular" viewBox="25 25 50 50"><circle class="plc-path" cx="50" cy="50" r="20" /></svg></div></center>');
                
                $('#utm-roi-date-from').datetimepicker({
                    format: 'YYYY-MM-DD',
                    defaultDate: filter_date ? filter_date.from : new Date()
                });
                
                $('#utm-roi-date-to').datetimepicker({
                    format: 'YYYY-MM-DD',
                    defaultDate: filter_date ? filter_date.to : new Date()
                });
                
                $('.save_date').on('click', function(e) {
                    document.location.href = '<?= APP::Module('Routing')->root ?>admin/analytics/utm/roi?date[from]=' + $('#utm-roi-date-from').val() + '&date[to]=' + $('#utm-roi-date-to').val();
                
                    $('#utm-roi-date-modal .modal-footer').remove();
                    $('#utm-roi-date-modal .modal-body').html('<center><div class="preloader pl-xxl"><svg class="pl-circular" viewBox="25 25 50 50"><circle class="plc-path" cx="50" cy="50" r="20" /></svg></div></center>');
                });
                
                GetLabels('root', null, null);

                $(document).on('click', '#utm-list > .utm-source > .item  > .control > .zmdi', function () {
                    var hide = $(this).hasClass('zmdi-plus-square');
                    
                    if (hide) {
                        $(this).removeClass('zmdi-plus-square');
                        $(this).addClass('zmdi-minus-square');
                    } else {
                        $(this).removeClass('zmdi-minus-square');
                        $(this).addClass('zmdi-plus-square');
                    }
                    
                    var item = $(this).closest('.item.source');

                    switch(item.data('state')) {
                        case 'inactive':
                            var source_value = $('.control > span', item).data('value');
                            
                            item.append('<div class="utm-medium"><div class="preloader pl-xs"><svg class="pl-circular" viewBox="25 25 50 50"><circle class="plc-path" cx="50" cy="50" r="20"></circle></svg></div> Загрузка "medium" меток...</div>');
                            item.data('state','active');

                            GetLabels('source', source_value, item.attr('id'));
                            break;
                        case 'active':
                            $('.utm-medium', item).slideToggle(300);
                            break;
                    }
                });
                
                $(document).on('click', '#utm-list > .utm-source > .item  > .utm-medium > .item > .control > .zmdi', function () {
                    var hide = $(this).hasClass('zmdi-plus-square');
                    
                    if (hide) {
                        $(this).removeClass('zmdi-plus-square');
                        $(this).addClass('zmdi-minus-square');
                    } else {
                        $(this).removeClass('zmdi-minus-square');
                        $(this).addClass('zmdi-plus-square');
                    }
                    
                    var item_medium = $(this).closest('.item.medium');
                    var item_source = $(this).closest('.item.source');

                    switch(item_medium.data('state')) {
                        case 'inactive':
                            var medium_value = $('.control > span', item_medium).data('value');
                            var source_value = $('.control > span', item_source).data('value');
                            
                            item_medium.append('<div class="utm-campaign"><div class="preloader pl-xs"><svg class="pl-circular" viewBox="25 25 50 50"><circle class="plc-path" cx="50" cy="50" r="20"></circle></svg></div> Загрузка "campaign" меток...</div>');
                            item_medium.data('state','active');

                            GetLabels(
                                'medium', 
                                {
                                    source: source_value,
                                    medium: medium_value
                                }, 
                                item_medium.attr('id')
                            );
                            break;
                        case 'active':
                            $('.utm-campaign', item_medium).slideToggle(300);
                            break;
                    }
                });
                
                $(document).on('click', '#utm-list > .utm-source > .item  > .utm-medium > .item > .utm-campaign > .item > .control > .zmdi', function () {
                    var hide = $(this).hasClass('zmdi-plus-square');
                    
                    if (hide) {
                        $(this).removeClass('zmdi-plus-square');
                        $(this).addClass('zmdi-minus-square');
                    } else {
                        $(this).removeClass('zmdi-minus-square');
                        $(this).addClass('zmdi-plus-square');
                    }
                    
                    var item_campaign = $(this).closest('.item.campaign');
                    var item_medium = $(this).closest('.item.medium');
                    var item_source = $(this).closest('.item.source');

                    switch(item_campaign.data('state')) {
                        case 'inactive':
                            var campaign_value = $('.control > span', item_campaign).data('value');
                            var medium_value = $('.control > span', item_medium).data('value');
                            var source_value = $('.control > span', item_source).data('value');
                            
                            item_campaign.append('<div class="utm-term"><div class="preloader pl-xs"><svg class="pl-circular" viewBox="25 25 50 50"><circle class="plc-path" cx="50" cy="50" r="20"></circle></svg></div> Загрузка "term" меток...</div>');
                            item_campaign.data('state','active');

                            GetLabels(
                                'campaign', 
                                {
                                    source: source_value,
                                    medium: medium_value,
                                    campaign: campaign_value
                                }, 
                                item_campaign.attr('id')
                            );
                            break;
                        case 'active':
                            $('.utm-term', item_campaign).slideToggle(300);
                            break;
                    }
                });
                
                $(document).on('click', '#utm-list > .utm-source > .item  > .utm-medium > .item > .utm-campaign > .item > .utm-term > .item > .control > .zmdi', function () {
                    var hide = $(this).hasClass('zmdi-plus-square');
                    
                    if (hide) {
                        $(this).removeClass('zmdi-plus-square');
                        $(this).addClass('zmdi-minus-square');
                    } else {
                        $(this).removeClass('zmdi-minus-square');
                        $(this).addClass('zmdi-plus-square');
                    }
                    
                    var item_term = $(this).closest('.item.term');
                    var item_campaign = $(this).closest('.item.campaign');
                    var item_medium = $(this).closest('.item.medium');
                    var item_source = $(this).closest('.item.source');

                    switch(item_term.data('state')) {
                        case 'inactive':
                            var term_value = $('.control > span', item_term).data('value');
                            var campaign_value = $('.control > span', item_campaign).data('value');
                            var medium_value = $('.control > span', item_medium).data('value');
                            var source_value = $('.control > span', item_source).data('value');
                            
                            item_term.append('<div class="utm-content"><div class="preloader pl-xs"><svg class="pl-circular" viewBox="25 25 50 50"><circle class="plc-path" cx="50" cy="50" r="20"></circle></svg></div> Загрузка "content" меток...</div>');
                            item_term.data('state','active');

                            GetLabels(
                                'term', 
                                {
                                    source: source_value,
                                    medium: medium_value,
                                    campaign: campaign_value,
                                    term: term_value
                                }, 
                                item_term.attr('id')
                            );
                            break;
                        case 'active':
                            $('.utm-content', item_term).slideToggle(300);
                            break;
                    }
                });
                
                $('#utm-list')
                .on('mouseenter', '.item', function(event){
                    $('> .item-links', this).show();
                })
                .on('mouseleave', '.item', function(event){
                    $('> .item-links', this).hide();
                });
                
                $(document).on('click', '.analytics-cohorts', function () {
                    var rules = $(this).attr('data-rules');
                    
                    $('#analytics_cohorts > input[name="rules"]').val(rules);
                    $('#analytics_cohorts').submit();
                });
                
                $(document).on('click', '.ref', function () {
                    var filters = $(this).attr('data-filters');
                    
                    $('#ref > input[name="filters"]').val(filters);
                    $('#ref').submit();
                });
            });
        </script>
    </body>
</html>