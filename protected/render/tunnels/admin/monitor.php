<?
$runtime = [];
$tunnels = [];

foreach ($data['runtime_log'] as $value) {
    $runtime[] = [$value['cr_date'] * 1000, round($value['runtime'], 2)];
    $tunnels[] = [$value['cr_date'] * 1000, $value['tunnels']];
}
?>
<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Мониторинг туннелей</title>

        <!-- Vendor CSS -->
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">        
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/google-material-color/dist/palette.css" rel="stylesheet">
        
        <? APP::Render('core/widgets/css') ?>
        
        <style>
            .chart {
                width: 100%;
                height: 300px;
                font-size: 14px;
                line-height: 1.2em;
            }

            .legend {
                background-color: #fff;
                margin-bottom:8px;
                margin:0 auto;
                display:inline-block;
                border-radius: 3px 3px 3px 3px;
                border: 1px solid #E6E6E6;
            }

            .legend td{
                padding: 5px;
            }
        </style>
    </head>
    <body data-ma-header="teal">
        <? 
        APP::Render('admin/widgets/header', 'include', [
            'Туннели' => 'admin/tunnels'
        ]);
        ?>
        <section id="main">
            <? APP::Render('admin/widgets/sidebar') ?>

            <section id="content">
                <div class="container">
                    <div class="card">
                        <div class="card-header">
                            <h2>Время обработки подписок на туннели</h2>
                        </div>
                        <div class="card-body card-padding">
                            <div id="runtime-chart" class="chart">
                                <div class="text-center">
                                    <div class="preloader pl-xxl">
                                        <svg class="pl-circular" viewBox="25 25 50 50">
                                            <circle class="plc-path" cx="50" cy="50" r="20" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div id="runtime-legend" class="legend"></div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h2>Обработанные подписки на туннели</h2>
                        </div>
                        <div class="card-body card-padding">
                            <div id="tunnels-chart" class="chart">
                                <div class="text-center">
                                    <div class="preloader pl-xxl">
                                        <svg class="pl-circular" viewBox="25 25 50 50">
                                            <circle class="plc-path" cx="50" cy="50" r="20" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div id="tunnels-legend" class="legend"></div>
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
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/flot/jquery.flot.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/flot/jquery.flot.resize.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/flot/jquery.flot.time.js"></script>
        
        <? APP::Render('core/widgets/js') ?>
        
        <script>
            $(document).ready(function() {
                $.plot('#runtime-chart', [
                    { data: <?= json_encode($runtime) ?>, label: 'сек.' }
                ], {
                    series: {
                        lines: {
                            show: true
                        },
                        points: {
                            show: true
                        }
                    },
                    legend : {
                        show : true,
                        noColumns:0,
                        container: $('#runtime-legend')
                    },
                    grid : {
                        borderWidth: 1,
                        borderColor: '#eee',
                        show : true,
                        hoverable : true,
                        clickable : true
                    },
                    yaxis: { 
                        tickColor: '#eee',
                        tickDecimals: 0,
                        font :{
                            lineHeight: 13,
                            style: "normal",
                            color: "#9f9f9f"
                        },
                        shadowSize: 0
                    },
                    xaxis: {
                        mode: 'time',
                        tickColor: '#fff',
                        tickDecimals: 0,
                        timezone: "browser",
                        font :{
                            lineHeight: 13,
                            style: 'normal',
                            color: '#9f9f9f'
                        },
                        shadowSize: 0
                    }
                });
                
                $('<div id="card-runtime-tooltip"></div>').css({
                    position: "absolute",
                    display: "none",
                    border: "1px solid #fdd",
                    padding: "2px",
                    "background-color": "#fee",
                    opacity: 0.80
                }).appendTo("body");
                
                $("#runtime-chart").bind("plothover", function (event, pos, item) {
                    if (item) {
                        var date = new Date(item.datapoint[0] + 10800);

                        $("#card-runtime-tooltip")
                        .html(item.datapoint[1] + ' ' + item.series.label + ' ' + ('0' + date.getHours()).slice(-2) + ':' + ('0' + date.getMinutes()).slice(-2) + ':' + ('0' + date.getSeconds()).slice(-2) + ' ' + ('0' + date.getDate()).slice(-2) + '-' + (date.getMonth() + 1) + '-' + date.getFullYear())
                        .css({
                            top: item.pageY+5, 
                            left: item.pageX+5
                        })
                        .fadeIn(200);
                    } else {
                        $("#card-runtime-tooltip").hide();
                    }
                });
                
                $.plot('#tunnels-chart', [
                    { data: <?= json_encode($tunnels) ?>, label: 'туннелей' }
                ], {
                    series: {
                        lines: {
                            show: true
                        },
                        points: {
                            show: true
                        }
                    },
                    legend : {
                        show : true,
                        noColumns:0,
                        container: $('#tunnels-legend')
                    },
                    grid : {
                        borderWidth: 1,
                        borderColor: '#eee',
                        show : true,
                        hoverable : true,
                        clickable : true
                    },
                    yaxis: { 
                        tickColor: '#eee',
                        tickDecimals: 0,
                        font :{
                            lineHeight: 13,
                            style: "normal",
                            color: "#9f9f9f"
                        },
                        shadowSize: 0
                    },
                    xaxis: {
                        mode: 'time',
                        tickColor: '#fff',
                        tickDecimals: 0,
                        timezone: "browser",
                        font :{
                            lineHeight: 13,
                            style: 'normal',
                            color: '#9f9f9f'
                        },
                        shadowSize: 0
                    }
                });
                
                $('<div id="card-tunnels-tooltip"></div>').css({
                    position: "absolute",
                    display: "none",
                    border: "1px solid #fdd",
                    padding: "2px",
                    "background-color": "#fee",
                    opacity: 0.80
                }).appendTo("body");
                
                $("#tunnels-chart").bind("plothover", function (event, pos, item) {
                    if (item) {
                        var date = new Date(item.datapoint[0] + 10800);

                        $("#card-tunnels-tooltip")
                        .html(item.datapoint[1] + ' ' + item.series.label + ' ' + ('0' + date.getHours()).slice(-2) + ':' + ('0' + date.getMinutes()).slice(-2) + ':' + ('0' + date.getSeconds()).slice(-2) + ' ' + ('0' + date.getDate()).slice(-2) + '-' + (date.getMonth() + 1) + '-' + date.getFullYear())
                        .css({
                            top: item.pageY+5, 
                            left: item.pageX+5
                        })
                        .fadeIn(200);
                    } else {
                        $("#card-tunnels-tooltip").hide();
                    }
                });
            });
        </script>
    </body>
</html>