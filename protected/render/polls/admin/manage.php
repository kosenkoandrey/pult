<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Опросы</title>

        <!-- Vendor CSS -->
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">        
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/google-material-color/dist/palette.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bootgrid/jquery.bootgrid.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet">

        <style>
            #questions-table-header .actionBar .actions > button {
                display: none;
            }
        </style>
        
        <? APP::Render('core/widgets/css') ?>
    </head>
    <body data-ma-header="teal">
        <? 
        APP::Render('admin/widgets/header', 'include', [
            'Опросы' => 'admin/polls'
        ]);
        ?>
        <section id="main">
            <? APP::Render('admin/widgets/sidebar') ?>

            <section id="content">
                <div class="container">
                    <div class="card">
                        <div class="card-header">
                            <h2>Просмотр ответов на опросы</h2>
                        </div>
                        <div class="card-body card-padding">
                            <select id="poll" class="selectpicker">
                                <option value="0" selected>Выберите опрос</option>
                                <?
                                foreach ($data as $value) {
                                    ?><option value="<?= $value['id'] ?>"><?= $value['name'] ?></option><?
                                }
                                ?>
                            </select>
                            <div id="answers"></div>
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
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bootgrid/jquery.bootgrid.updated.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.js"></script>

        <? APP::Render('core/widgets/js') ?>
        
        <script>
            $(document).ready(function() {
                $('#poll').on('change', function() { 
                    var poll_id = parseInt($(this).val());
                    
                    $('#answers').html('<center><div class="preloader pl-xxl"><svg class="pl-circular" viewBox="25 25 50 50"><circle class="plc-path" cx="50" cy="50" r="20"></circle></svg></div></center>');
                    
                    if (poll_id) {
                        $.ajax({
                            type: 'post',
                            url: '<?= APP::Module('Routing')->root ?>admin/polls/api/data.json',
                            data: {
                                poll: poll_id
                            },
                            success: function (result) {
                                $('#answers').html([
                                    '<table class="table table-hover table-vmiddle m-t-20" id="answers-table">',
                                        '<thead>',
                                            '<tr>',
                                                '<th>Пользователь</th>',
                                            '</tr>',
                                        '</thead>',
                                        '<tbody></tbody>',
                                    '</table>'
                                ].join(''));

                                $.each(result.questions, function(question_id, question_name) {
                                    $('#answers-table > thead > tr').append('<th>' + question_name + '</th>');
                                });
                                
                                $('#answers-table > thead > tr').append('<th>Дата</th>');
                                
                                $.each(result.answers_users, function(user, user_data) {
                                    $('#answers-table > tbody').append([
                                        '<tr id="u' + user + '">',
                                            '<td><a href="<?= APP::Module('Routing')->root ?>admin/users/profile/' + user_data.email + '" target="_blank">' + user_data.email + '</a></td>',
                                        '</tr>',
                                    ].join(''));

                                    $.each(user_data.questions, function(question_id, question_answer) {
                                        $('#u' + user).append('<td>' + question_answer + '</td>');
                                    });
                                    
                                    $('#u' + user).append('<td>' + user_data.date + '</td>');
                                });
                            }
                        });
                    }
                });
            });
        </script>
    </body>
</html>