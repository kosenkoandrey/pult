<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Личная карточка - <?= $data['user']['email'] ?></title>

        <!-- Vendor CSS -->
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">        
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/google-material-color/dist/palette.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <? APP::Render('core/widgets/css') ?>
        
        <style>
            #header-user-state {
                text-transform: uppercase;
            }
            
            .user-nav > .list-group-item {
                padding: 15px 25px;
                font-size: 13px;
            }
            .user-nav > .list-group-item.active {
                font-weight: 600;
            }
            #tab-tunnels .table > thead > tr:first-child > th, 
            #tab-tunnels .table > tbody > tr:first-child > th, 
            #tab-tunnels .table > tfoot > tr:first-child > th, 
            #tab-tunnels .table > thead > tr:first-child > td, 
            #tab-tunnels .table > tbody > tr:first-child > td, 
            #tab-tunnels .table > tfoot > tr:first-child > td {
                    border-top: none;
            }
            .table .table {
                background-color: #f5f5f5;
            }
            
            .icon-mail-event{
                margin-right: 10px;
                margin-top: 5px;
            }
        </style>
    </head>
    <body data-ma-header="teal">
        <? 
        APP::Render('admin/widgets/header', 'include', [
            'Личная карточка' => 'admin/users'
        ]);
        ?>
        <section id="main">
            <? APP::Render('admin/widgets/sidebar') ?>

            <section id="content">
                <div class="container">
                    <div class="c-header">
                        <h2><?= $data['user']['email'] ?>
                            <small>
                                <?
                                switch ($data['user']['role']) {
                                    case 'new':
                                    case 'user': 
                                        echo 'ПОДПИСЧИК'; break;
                                    case 'admin': echo 'АДМИНИСТРАТОР'; break;
                                    case 'tech-admin': echo 'ТЕХНИЧЕСКИЙ АДМИНИСТРАТОР'; break;
                                    default: echo $data['user']['role']; break;
                                }
                                ?> (<span id="header-user-state"><?
                                if (isset($data['about']['state'])) {
                                    switch ($data['about']['state']) {
                                        case 'inactive': echo 'ожидает активации'; break;
                                        case 'active': echo 'активный'; break;
                                        case 'pause': echo 'временно отписан'; break;
                                        case 'unsubscribe': echo 'отписан'; break;
                                        case 'blacklist': echo 'в черном списке'; break;
                                        case 'dropped': echo 'невозможно доставить почту'; break;
                                        case 'unknown': echo 'состояние неизвестно'; break;
                                        default: echo $data['about']['state']; break;
                                    }
                                } else {
                                    echo 'СОСТОЯНИЕ НЕИЗВЕСТНО';
                                }
                                ?></span>)
                            </small>
                        </h2>
                    </div>

                    <div class="card" id="profile-main">
                        <div class="pm-overview c-overflow">
                            <div class="pmo-pic m-b-20">
                                <div class="p-relative">
                                    <img class="img-responsive " src="<?= APP::$conf['location'][0] ?>://www.gravatar.com/avatar/<?= md5($data['user']['email']) ?>?s=180&d=<?= urlencode(APP::Module('Routing')->root . APP::Module('Users')->settings['module_users_profile_picture']) ?>&t=<?= time() ?>">
                                </div>
                            </div>

                            <div class="user-nav list-group">
                                <a href="#tab-about" role="tab" data-toggle="tab" class="list-group-item active">Основное</a>
                                <a href="#tab-smartlog" aria-controls="tab-smartlog" role="tab" data-toggle="tab" class="list-group-item"><span class="badge bgm-teal" data-toggle="tooltip" data-placement="top" title="События" style="margin: 0 3px"><?= count($data['smartlog']) ?></span>Таймлайн</a>
                                <? if ($data['mail']) { ?><a href="#tab-mail" aria-controls="tab-mail" role="tab" data-toggle="tab" class="list-group-item"><span class="badge bgm-teal" style="margin: 0 3px"><?= count($data['mail']) ?></span>Письма</a><? } ?>
                                <a href="#tab-tunnels" aria-controls="tab-tunnels" role="tab" data-toggle="tab" class="list-group-item"><span class="badge bgm-teal" data-toggle="tooltip" data-placement="top" title="Доступные" style="margin: 0 3px"><?= count($data['tunnels']['allow']) ?></span> <span class="badge bgm-teal" data-toggle="tooltip" data-placement="top" title="Очередь" style="margin: 0 3px"><?= count($data['tunnels']['queue']) ?></span> <span class="badge bgm-teal" data-toggle="tooltip" data-placement="top" title="Подписки" style="margin: 0 3px"><?= count($data['tunnels']['subscriptions']) ?></span> Туннели</a>
                                <? if ($data['tags']) { ?><a href="#tab-tags" aria-controls="tab-tags" role="tab" data-toggle="tab" class="list-group-item"><span class="badge bgm-teal" style="margin: 0 3px"><?= count($data['tags']) ?></span>Теги</a><? } ?>
                                <? if ($data['utm']) { ?><a href="#tab-utm" aria-controls="tab-utm" role="tab" data-toggle="tab" class="list-group-item"><span class="badge bgm-teal" data-toggle="tooltip" data-placement="top" title="Серии" style="margin: 0 3px"><?= count($data['utm']) ?></span>UTM-метки</a><? } ?>
                                <!--<? if ($data['comments']) { ?><a href="#tab-comments" aria-controls="tab-comments" role="tab" data-toggle="tab" class="list-group-item"><span class="badge bgm-teal" style="margin: 0 3px"><?= count($data['comments']) ?></span>Комментарии</a><? } ?>-->
                                <!--<? if ($data['likes']) { ?><a href="#tab-likes" aria-controls="tab-likes" role="tab" data-toggle="tab" class="list-group-item"><span class="badge bgm-teal" style="margin: 0 3px"><?= count($data['likes']) ?></span>Оценки</a><? } ?>-->
                                <!--<? if ($data['premium']) { ?><a href="#tab-premium" aria-controls="tab-premium" role="tab" data-toggle="tab" class="list-group-item">Платные материалы</a><? } ?>-->
                                <? if ($data['invoices']) { ?><a href="#tab-invoices" aria-controls="tab-invoices" role="tab" data-toggle="tab" class="list-group-item"><span class="badge bgm-teal" style="margin: 0 3px"><?= array_sum($data['invoices_stat']['count']) ?></span>Счета</a><? } ?>
                                <a href="#tab-products" aria-controls="tab-products" role="tab" data-toggle="tab" class="list-group-item"><span class="badge bgm-teal" data-toggle="tooltip" data-placement="top" title="Доступные" style="margin: 0 3px"><?= count($data['products']['available']) ?></span> <span class="badge bgm-teal" data-toggle="tooltip" data-placement="top" title="Привязанные" style="margin: 0 3px"><?= count($data['products']['invoices']) ?></span>Продукты</a>
                                <? if ($data['polls']) { ?><a href="#tab-polls" aria-controls="tab-polls" role="tab" data-toggle="tab" class="list-group-item"><span class="badge bgm-teal" style="margin: 0 3px"><?= count($data['polls']) ?></span>Опросы</a><? } ?>
                                <? if ($data['rating']) { ?><a href="#tab-rating" aria-controls="tab-rating" role="tab" data-toggle="tab" class="list-group-item"><span class="badge bgm-teal" style="margin: 0 3px"><?= count($data['rating']) ?></span>Рейтинг</a><? } ?>
                                <? if ($data['files']) { ?><a href="#tab-files" aria-controls="tab-files" role="tab" data-toggle="tab" class="list-group-item"><span class="badge bgm-teal" style="margin: 0 3px"><?= count($data['files']) ?></span>Файлы</a><? } ?>
                                <? if ($data['groups']) { ?><a href="#tab-groups" aria-controls="tab-groups" role="tab" data-toggle="tab" class="list-group-item"><span class="badge bgm-teal" style="margin: 0 3px"><?= count($data['groups']) ?></span>Группы</a><? } ?>
                                <? if ($data['quiz']) { ?><a href="#tab-quiz" aria-controls="tab-quiz" role="tab" data-toggle="tab" class="list-group-item"><span class="badge bgm-teal" style="margin: 0 3px"><?= count($data['quiz']) ?></span>Викторина</a><? } ?>
                            </div>
                        </div>

                        <div class="pm-body clearfix">
                            <div class="tab-content" style="padding: 0;">
                                <?
                                foreach ([
                                    'about',
                                    'smartlog',
                                    'mail',
                                    'tunnels',
                                    'tags',
                                    'utm',
                                    //'comments',
                                    //'likes',
                                    //'premium',
                                    'invoices',
                                    'polls',
                                    'taskmanager',
                                    'rating',
                                    'files',
                                    'groups',
                                    'quiz',
                                    'products'
                                ] as $item) {
                                    APP::Render('users/admin/profile/' . $item, 'include', $data);
                                }
                                ?>
                            </div>
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
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bootstrap-growl/bootstrap-growl.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/moment/min/moment.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/input-mask/input-mask.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.js"></script>
        
        <? APP::Render('core/widgets/js') ?>
        
        <script>
            var user = <?= json_encode($data['user']) ?>;
            var mail_subjects = <?= json_encode($data['mail_subjects']) ?>;
            var tunnel_names = <?= json_encode($data['tunnel_names']) ?>;

            $(document).ready(function() {
                $('body').on('click', '.user-nav > a', function() {
                    $('.user-nav > a').removeClass('active');
                    $(this).addClass('active');
                });
                
                $('#about_username').val('<?= isset($data['about']['username']) ? $data['about']['username'] : '' ?>');
                $('#about_state').val('<?= $data['about']['state'] ?>');

                <?
                foreach ($data['about'] as $key => $value) {
                    if (array_search($key, [
                        'username',
                        'state'
                    ]) !== false) {
                        continue;
                    }
                    ?>
                    $('#about_<?= $key ?>').val('<?= addslashes($value) ?>');
                    <?
                }
                ?>

                $('body').on('click', '.toggle-basic', function() {
                    $('#view-basic').toggle();
                    $('#form-basic').toggle();
                });
                
                $('body').on('click', '.toggle-contact', function() {
                    $('#view-contact').toggle();
                    $('#form-contact').toggle();
                });
                
                $('body').on('click', '.toggle-assignment', function() {
                    $('#view-assignment').toggle();
                    $('#form-assignment').toggle();
                });
                
                $('body').on('click', '.toggle-alt-email', function() {
                    $('#view-alt-email').toggle();
                    $('#form-alt-email').toggle();
                });

                $('#form-basic').submit(function(event) {
                    event.preventDefault();

                    $(this).find('[type="submit"]').html('Подождите...').attr('disabled', true);
                    $(this).find('.toggle-basic').hide();

                    $.ajax({
                        type: 'post',
                        url: '<?= APP::Module('Routing')->root ?>admin/users/api/about/update.json',
                        data: $(this).serialize(),
                        success: function() {
                            swal({
                                title: 'Основная информация была обновлена',
                                type: 'success',
                                timer: 2500,
                                showConfirmButton: false
                            });

                            $('#form-basic').find('[type="submit"]').html('Сохранить').attr('disabled', false);
                            $('#form-basic').find('.toggle-basic').show();
                            
                            var about_username = $('#about_username').val();
                            var about_state = $('#about_state').val();
                            
                            switch ($('#about_state').val()) {
                                case 'inactive': about_state = 'ожидает активации'; break;
                                case 'active': about_state = 'активный'; break;
                                case 'pause': about_state = 'временно отписан'; break;
                                case 'unsubscribe': about_state = 'отписан'; break;
                                case 'blacklist': about_state = 'в черном списке'; break;
                                case 'dropped': about_state = 'невозможно доставить почту'; break;
                                case 'unknown': about_state = 'неизвестно'; break;
                            }
                            
                            $('#about-username-value').html(about_username ? about_username : 'user<?= $data['user']['id'] ?>');
                            $('#about-state-value').html(about_state);
                            $('#header-user-state').html(about_state);
                            
                            $('#view-basic').toggle();
                            $('#form-basic').toggle();
                        }
                    });
                });
                
                $('#form-assignment').submit(function(event) {
                    event.preventDefault();

                    $(this).find('[type="submit"]').html('Подождите...').attr('disabled', true);
                    $(this).find('.toggle-assignment').hide();
                    
                    $.ajax({
                        type: 'post',
                        url: '<?= APP::Module('Routing')->root ?>admin/users/api/about/update.json',
                        data: $(this).serialize(),
                        success: function() {
                            swal({
                                title: 'Дополнительная информация была обновлена',
                                type: 'success',
                                timer: 2500,
                                showConfirmButton: false
                            });

                            $('#form-assignment').find('[type="submit"]').html('Сохранить').attr('disabled', false);
                            $('#form-assignment').find('.toggle-assignment').show();

                            <?
                            foreach ($data['about'] as $key => $value) {
                                if (array_search($key, [
                                    'username',
                                    'state'
                                ]) !== false) {
                                    continue;
                                }
                                ?>
                                var about_<?= $key ?> = $('#about_<?= $key ?>').val();
                                $('#about-<?= $key ?>-value').html(about_<?= $key ?> ? about_<?= $key ?> : 'нет');
                                <?
                            }
                            ?>

                            $('#view-assignment').toggle();
                            $('#form-assignment').toggle();
                        }
                    });
                });
                
                $('#form-alt-email').submit(function(event) {
                    event.preventDefault();

                    $(this).find('[type="submit"]').html('Подождите...').attr('disabled', true);
                    $(this).find('.toggle-alt-email').hide();

                    $.ajax({
                        type: 'post',
                        url: '<?= APP::Module('Routing')->root ?>admin/users/api/email/alt/add.json',
                        data: $(this).serialize(),
                        success: function(response) {
                            $('#form-alt-email').find('[type="submit"]').html('Добавить').attr('disabled', false);
                            $('#form-alt-email').find('.toggle-form-alt-email').show();
                                    
                            switch(response.status) {
                                case 'success':
                                    swal({
                                        title: 'Альтернативный E-Mail успешно добавлен',
                                        type: 'success',
                                        timer: 2500,
                                        showConfirmButton: false
                                    });

                                    $('#view-alt-email > .not_found').remove();

                                    $('#view-alt-email').append([
                                        '<dl class="dl-horizontal">',
                                            '<dt>' + $('#alt_email').val() + '</dt>',
                                            '<dd><a href="javascript:void(0)" class="remove-email" data-id="' + response.id + '">удалить</a></dd>',
                                        '</dl>'
                                    ].join(''));

                                    $('#view-alt-email').toggle();
                                    $('#form-alt-email').toggle();
                                    break;
                                case 'error':
                                    swal({
                                        title: 'E-Mail введен некорректно',
                                        type: 'error',
                                        timer: 2500,
                                        showConfirmButton: false
                                    });
                                    break;
                                case 'exist':
                                    swal({
                                        title: 'E-Mail уже существует',
                                        type: 'error',
                                        timer: 2500,
                                        showConfirmButton: false
                                    });
                                    break;
                            }
                        }
                    });
                });
                
                $('body').on('click', '#view-alt-email .remove-email', function() {
                    var link = $(this);
                    var id = $(this).data('id');
                    
                    swal({
                        title: 'Вы действительно хотите удалить альтернативный E-Mail?',
                        text: 'Отменить это действие будет невозможно',
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#DD6B55',
                        confirmButtonText: 'Да',
                        cancelButtonText: 'Отменить',
                        closeOnConfirm: true,
                        closeOnCancel: true
                    }, function(isConfirm){
                        if (isConfirm) {
                            $.post('<?= APP::Module('Routing')->root ?>admin/users/api/email/alt/remove.json', {
                                id: id
                            }, function() {
                                link.closest('.dl-horizontal').slideUp(300, function() { 
                                    $(this).remove(); 
                                });
                                
                                swal({
                                    title: 'Готово',
                                    text: 'Выбранный альтернативный E-Mail был успешно удален',
                                    type: 'success',
                                    showCancelButton: false,
                                    confirmButtonText: 'OK',
                                    closeOnConfirm: false
                                });
                            });
                        }
                    });
                });
                
                var mail_events = <?= json_encode($data['mail']) ?>;
                
                $('body').on('click', '.mail_events', function() {
                    var id = $(this).data('id');
                    
                    $('#mail-events-modal .details .mail_id').html(mail_events[id].log.id);
                    $('#mail-events-modal .details .mail_state').html(mail_events[id].log.state);
                    $('#mail-events-modal .details .mail_result').html(mail_events[id].log.result);
                    $('#mail-events-modal .details .mail_retries').html(mail_events[id].log.retries);
                    $('#mail-events-modal .details .mail_ping').html(mail_events[id].log.ping);
                    $('#mail-events-modal .details .mail_cr_date').html(mail_events[id].log.cr_date);
                    $('#mail-events-modal .details .mail_letter_subject').html(mail_events[id].log.letter_subject);
                    $('#mail-events-modal .details .mail_letter_priority').html(mail_events[id].log.letter_priority);
                    $('#mail-events-modal .details .mail_sender_name').html(mail_events[id].log.sender_name);
                    $('#mail-events-modal .details .mail_sender_email').html(mail_events[id].log.sender_email);
                    $('#mail-events-modal .details .mail_transport_module').html(mail_events[id].log.transport_module);
                    $('#mail-events-modal .details .mail_transport_method').html(mail_events[id].log.transport_method);
                    
                    $('#mail-events-modal .events').empty();
                    
                    if (mail_events[id].events.length) {
                        $.each(mail_events[id].events, function(key, event) {
                            var details = event.details !== 'NULL' ? JSON.stringify(JSON.parse(event.details), undefined, 4) : 'Details not found';

                            $('#mail-events-modal .events').append([
                                '<div class="panel panel-collapse">',
                                    '<div class="panel-heading" role="tab" id="heading-mail-event-' + event.id + '">',
                                        '<h4 class="panel-title">',
                                            '<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse-mail-event-' + event.id + '" aria-expanded="false" aria-controls="collapse-mail-event-' + event.id + '"><span class="pull-right">' + event.cr_date + '</span>' + event.event + '</a>',
                                        '</h4>',
                                    '</div>',
                                    '<div id="collapse-mail-event-' + event.id + '" class="collapse" role="tabpanel" aria-labelledby="collapse-mail-event-' + event.id + '">',
                                        '<div class="panel-body"><pre style="white-space: pre-wrap">' + details + '</pre></div>',
                                    '</div>',
                                '</div>'
                            ].join(''));
                        });
                    } else {
                        $('#mail-events-modal .events').html('<div class="alert alert-warning" role="alert">События не найдены</div>');
                    }
                    
                    $('#mail-events-modal').modal('show');
                });
                
                var tunnel_tags = <?= json_encode($data['tunnels']['subscriptions']) ?>;

                $('body').on('click', '.tunnel_tags', function() {
                    var id = $(this).data('id');
                    
                    $('#tunnel-tags-modal .details .tunnel_uid').html(tunnel_tags[id].info.id);
                    $('#tunnel-tags-modal .details .tunnel_state').html(tunnel_tags[id].info.state);
                    $('#tunnel-tags-modal .details .tunnel_type').html(tunnel_tags[id].info.tunnel_type);
                    $('#tunnel-tags-modal .details .tunnel_id').html(tunnel_tags[id].info.tunnel_id);
                    $('#tunnel-tags-modal .details .tunnel_name').html(tunnel_tags[id].info.tunnel_name);
                    
                    $('#tunnel-tags-modal .tunnel-tags-list').empty();

                    if (tunnel_tags[id].tags.length) {
                        $.each(tunnel_tags[id].tags, function(key, tag) {
                            var tag_details_label = [];
                            
                            switch (tag.label_id) {
                                case 'subscribe':
                                case 'run':
                                    tag_details_label.push('Подписка');
                                    break;
                                case 'sendmail':
                                    tag_details_label.push('Отправка письма');
                                    break;
                                case 'timeout':
                                    tag_details_label.push('Пауза');
                                    break;
                                case 'condition':
                                    tag_details_label.push('Проверка условия');
                                    break;
                                case 'spamreport':
                                    tag_details_label.push('Жалоба на спам');
                                    break;
                                case 'complete':
                                    tag_details_label.push('Завершение туннеля');
                                    break;
                                case 'terminate':
                                    tag_details_label.push('Обрыв туннеля');
                                    break;
                                case 'complete_tunnel_child':
                                    tag_details_label.push('Автозавершение туннеля из');
                                    break;
                                case 'complete_tunnel_parent':
                                    tag_details_label.push('Автозавершение туннеля');
                                    break;
                                default:
                                    tag_details_label.push(tag.label_id);
                            }
                            
                            try {
                               var json_info = JSON.parse(tag.info);
                               var info = JSON.stringify(json_info, undefined, 4);
                               
                               switch (tag.label_id) {
                                    case 'subscribe':
                                    case 'run':
                                        if (json_info.source !== undefined) {
                                            tag_details_label.push(json_info.source);
                                        } else {
                                            tag_details_label.push(json_info.params.source);
                                        }
                                        break;
                                    case 'sendmail':
                                        tag_details_label.push(mail_subjects[json_info.settings.letter]);
                                        break;
                                    case 'timeout':
                                        var timeout_label = new String();
                                        
                                        switch (json_info.timeout_type) {
                                            case 'min': timeout_label = 'мин.'; break;
                                            case 'hours': timeout_label = 'час.'; break;
                                            case 'days': timeout_label = 'дн.'; break;
                                        }
                                        
                                        tag_details_label.push(json_info.timeout + ' ' + timeout_label);
                                        break;
                                    case 'complete_tunnel_parent':
                                        tag_details_label.push(tunnel_names[json_info.settings.tunnel_id]);
                                        break;
                                    case 'complete_tunnel_child':
                                        tag_details_label.push(tunnel_names[json_info.tunnel.tunnel_id]);
                                        break;
                                }
                            } catch(e) {
                               var info = tag.info;
                            }
                            
                            switch (tag.label_id) {
                                case 'sendmail':
                                    $('#tunnel-tags-modal .tunnel-tags-list').append([
                                        '<div class="panel panel-collapse">',
                                            '<div class="panel-heading" role="tab" id="heading-tunnel-tag-' + tag.id + '">',
                                                '<h4 class="panel-title">',
                                                    '<a target="_blank" class="collapsed" href="<?= APP::Module('Routing')->root ?>admin/mail/html/' + json_info.result.id + '"><span class="pull-right">' + tag.cr_date + '</span>' + tag_details_label.join('&nbsp;&middot;&nbsp;') + '</a>',
                                                '</h4>',
                                            '</div>',
                                        '</div>'
                                    ].join(''));
                                    break;
                                default:
                                    $('#tunnel-tags-modal .tunnel-tags-list').append([
                                        '<div class="panel panel-collapse">',
                                            '<div class="panel-heading" role="tab" id="heading-tunnel-tag-' + tag.id + '">',
                                                '<h4 class="panel-title">',
                                                    '<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse-tunnel-tag-' + tag.id + '" aria-expanded="false" aria-controls="collapse-tunnel-tag-' + tag.id + '"><span class="pull-right">' + tag.cr_date + '</span>' + tag_details_label.join('&nbsp;&middot;&nbsp;') + '</a>',
                                                '</h4>',
                                            '</div>',
                                            '<div id="collapse-tunnel-tag-' + tag.id + '" class="collapse" role="tabpanel" aria-labelledby="collapse-tunnel-tag-' + tag.id + '">',
                                                '<div class="panel-body"><pre style="white-space: pre-wrap">' + info + '</pre></div>',
                                            '</div>',
                                        '</div>'
                                    ].join(''));
                            }

                            
                        });
                    } else {
                        $('#tunnel-tags-modal .tunnel-tags-list').html('<div class="alert alert-warning" role="alert">События не найдены</div>');
                    }
                    
                    $('#tunnel-tags-modal').modal('show');
                });
                
                $('body').on('click', '.tunnel_actions', function() {
                    var id = $(this).data('id');
                    var action = $(this).data('action');
                    
                    switch (action) {
                        case 'play':
                            $('.tunnel_actions.play').addClass('disabled');
                            $('.tunnel_actions.pause').removeClass('disabled');
                            $('.tunnel_actions.stop').removeClass('disabled');
                            
                            $('#tunnel_icon_' + id + ' span')
                            .removeClass('palette-Grey-400')
                            .removeClass('palette-Teal-400')
                            .addClass('palette-Orange-400');
                    
                            $('#tunnel_icon_' + id + ' i')
                            .removeClass('zmdi-time')
                            .removeClass('zmdi-check')
                            .addClass('zmdi-arrow-split');
                    
                            $.post('<?= APP::Module('Routing')->root ?>admin/tunnels/api/users/state.json', {
                                action: 'play',
                                tunnel: id
                            }, function() { 
                                swal({
                                    title: 'Готово!',
                                    text: 'Подписка на туннель успешно возобновлена',
                                    type: 'success',
                                    showCancelButton: false,
                                    confirmButtonText: 'Ok',
                                    closeOnConfirm: false
                                });
                            });
                            break;
                        case 'pause':
                            $('.tunnel_actions.play').removeClass('disabled');
                            $('.tunnel_actions.pause').addClass('disabled');
                            $('.tunnel_actions.stop').removeClass('disabled');
                            
                            $('#tunnel_icon_' + id + ' span')
                            .addClass('palette-Grey-400')
                            .removeClass('palette-Teal-400')
                            .removeClass('palette-Orange-400');
                    
                            $('#tunnel_icon_' + id + ' i')
                            .addClass('zmdi-time')
                            .removeClass('zmdi-check')
                            .removeClass('zmdi-arrow-split');
                    
                            $.post('<?= APP::Module('Routing')->root ?>admin/tunnels/api/users/state.json', {
                                action: 'pause',
                                tunnel: id
                            }, function() { 
                                swal({
                                    title: 'Готово!',
                                    text: 'Подписка на туннель успешно поставлена на паузу',
                                    type: 'success',
                                    showCancelButton: false,
                                    confirmButtonText: 'Ok',
                                    closeOnConfirm: false
                                });
                            });
                            break;
                        case 'stop':
                            swal({
                                title: 'Вы действительно хотите остановить туннель?',
                                text: 'Возобновить подписку на туннель будет невозможно',
                                type: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#DD6B55',
                                confirmButtonText: 'Да',
                                cancelButtonText: 'Отмена',
                                closeOnConfirm: false,
                                closeOnCancel: true
                            }, function(isConfirm){
                                if (isConfirm) {
                                    $('.tunnel_actions.play').addClass('disabled');
                                    $('.tunnel_actions.pause').addClass('disabled');
                                    $('.tunnel_actions.stop').addClass('disabled');
                                    
                                    $('#tunnel_icon_' + id + ' span')
                                    .removeClass('palette-Grey-400')
                                    .addClass('palette-Teal-400')
                                    .removeClass('palette-Orange-400');

                                    $('#tunnel_icon_' + id + ' i')
                                    .removeClass('zmdi-time')
                                    .addClass('zmdi-check')
                                    .removeClass('zmdi-arrow-split');
                                    
                                    $.post('<?= APP::Module('Routing')->root ?>admin/tunnels/api/users/state.json', {
                                        action: 'stop',
                                        tunnel: id
                                    }, function() { 
                                        swal({
                                            title: 'Готово!',
                                            text: 'Подписка на туннель успешно остановлена',
                                            type: 'success',
                                            showCancelButton: false,
                                            confirmButtonText: 'Ok',
                                            closeOnConfirm: false
                                        });
                                    });
                                }
                            });
                            break;
                        case 'move_on':
                            var now = new Date();
                            var object = $(this).data('object');
                            
                            swal({
                                title: 'Вы уверены?',
                                text: 'Продвинуть туннель до ' + object,
                                type: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#DD6B55',
                                confirmButtonText: 'Да',
                                cancelButtonText: 'Отменить',
                                closeOnConfirm: true,
                                closeOnCancel: true
                            }, function(isConfirm){
                                if (isConfirm) {
                                    $.post('<?= APP::Module('Routing')->root ?>admin/tunnels/api/users/state.json', {
                                        action: 'move_on',
                                        tunnel: id
                                    }, function() { 
                                        swal({
                                            title: 'Готово',
                                            text: 'Туннель успешно продвинут',
                                            type: 'success',
                                            showCancelButton: false,
                                            confirmButtonText: 'Ok',
                                            closeOnConfirm: false
                                        });
                                    });
                                }
                            });
                            break;
                    }
                });

                var tunnel_queue = <?= json_encode($data['tunnels']['queue']) ?>;
                
                $('body').on('click', '.tunnel_queue', function() {
                    var id = $(this).data('id');
                    
                    $('#tunnel-queue-modal .details .tunnel_queue_id').html(tunnel_queue[id].id);
                    $('#tunnel-queue-modal .details .tunnel_queue_tunnel_id').html(tunnel_queue[id].tunnel_id);
                    $('#tunnel-queue-modal .details .tunnel_queue_object_id').html(tunnel_queue[id].object_id);
                    $('#tunnel-queue-modal .details .tunnel_queue_timeout').html(tunnel_queue[id].timeout);
                    $('#tunnel-queue-modal .details .tunnel_queue_settings').html(tunnel_queue[id].settings);
                    $('#tunnel-queue-modal .details .tunnel_queue_cr_date').html(tunnel_queue[id].cr_date);
                    $('#tunnel-queue-modal .details .tunnel_queue_tunnel_type').html(tunnel_queue[id].tunnel_type);
                    $('#tunnel-queue-modal .details .tunnel_queue_tunnel_name').html(tunnel_queue[id].tunnel_name);
                    
                    $('#tunnel-queue-modal').modal('show');
                });

                var tags = <?= json_encode($data['tags']) ?>;
                
                $('body').on('click', '.tags', function() {
                    var id = $(this).data('id');
                    //var value = tags[id].value !== 'NULL' ? JSON.stringify(JSON.parse(tags[id].value), undefined, 4) : 'Подробная информация отсутствует';
                    
                    
                    $('#tags-modal .details .tag_id').html(tags[id].id);
                    $('#tags-modal .details .tag_item').html(tags[id].item);
                    $('#tags-modal .details .tag_value pre').html(tags[id].value);
                    $('#tags-modal .details .tag_cr_date').html(tags[id].cr_date);

                    $('#tags-modal').modal('show');
                });
                
                var taskmanager = <?= json_encode($data['taskmanager']) ?>;
                
                $('body').on('click', '.taskmanager', function() {
                    var id = $(this).data('id');
                    var args = taskmanager[id].args !== 'NULL' ? JSON.stringify(JSON.parse(taskmanager[id].args), undefined, 4) : 'Аргументы отсутствуют';
                    
                    $('#taskmanager-modal .details .taskmanager_id').html(taskmanager[id].id);
                    $('#taskmanager-modal .details .taskmanager_token').html(taskmanager[id].token);
                    $('#taskmanager-modal .details .taskmanager_module').html(taskmanager[id].module);
                    $('#taskmanager-modal .details .taskmanager_method').html(taskmanager[id].method);
                    $('#taskmanager-modal .details .taskmanager_args > pre').html(args);
                    $('#taskmanager-modal .details .taskmanager_state').html(taskmanager[id].state);
                    $('#taskmanager-modal .details .taskmanager_cr_date').html(taskmanager[id].cr_date);
                    $('#taskmanager-modal .details .taskmanager_exec_date').html(taskmanager[id].exec_date);
                    $('#taskmanager-modal .details .taskmanager_complete_date').html(taskmanager[id].complete_date);

                    $('#taskmanager-modal').modal('show');
                });
                
                $('body').on('click', '#remove_reminder_payment_task', function() {
                    var id = $(this).data('id');
                    
                    swal({
                        title: 'Вы уверены?',
                        text: 'Отменить задание на отправку напоминания об оплате?',
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#DD6B55',
                        confirmButtonText: 'Да',
                        cancelButtonText: 'Отменить',
                        closeOnConfirm: true,
                        closeOnCancel: true
                    }, function(isConfirm){
                        if (isConfirm) {
                            $.post('<?= APP::Module('Routing')->root ?>admin/taskmanager/api/remove.json', {
                                id: id
                            }, function() {
                                $('#remove_reminder_payment_alert').slideUp(300);
                                
                                swal({
                                    title: 'Готово',
                                    text: 'Задание на отправку напоминания об оплате успешно удалено',
                                    type: 'success',
                                    showCancelButton: false,
                                    confirmButtonText: 'OK',
                                    closeOnConfirm: false
                                });
                            });
                        }
                    });
                });
                
                $('body').on('click', '#change-email-start', function() {
                    $('#change-email-modal .modal-body').html([
                        '<div class="form-group" style="margin-bottom: 0">',
                            '<div class="fg-line">',
                                '<input id="new-email" type="text" class="form-control input-lg" placeholder="введите новый E-Mail адрес...">',
                            '</div>',
                        '</div>'
                    ].join(''));
                    
                    $('#change-email-action').html('Продолжить').addClass('check-email').show();
                    $('#change-email-modal').modal('show');
                });
                
                $('body').on('click', '#change-email-action.check-email', function() {
                    var check_email = $('#new-email').val();
                    
                    if (user.email === check_email) {
                        swal({
                            title: 'Ошибка',
                            text: 'Введенный E-Mail адрес не отличается от текущего',
                            type: 'error',
                            showCancelButton: false,
                            confirmButtonText: 'OK',
                            closeOnConfirm: true
                        });
                        
                        return false;
                    }
                
                    $(this).removeClass('check-email').hide();
                
                    $('#change-email-modal .modal-body').html([
                        '<div class="text-center">',
                            '<div class="preloader pl-xxl">',
                                '<svg class="pl-circular" viewBox="25 25 50 50">',
                                    '<circle class="plc-path" cx="50" cy="50" r="20">',
                                '</svg>',
                            '</div>',
                        '</div>'
                    ].join(''));
                    
                    $.post('<?= APP::Module('Routing')->root ?>admin/users/api/email/change/check.json', {
                        email: check_email
                    }, function(result) {
                        switch(result.status) {
                            case 'error':
                                swal({
                                    title: 'Ошибка',
                                    text: 'E-Mail введен некорректно',
                                    type: 'error',
                                    showCancelButton: false,
                                    confirmButtonText: 'OK',
                                    closeOnConfirm: true
                                }, function() {
                                    $('#change-email-modal .modal-body').html([
                                        '<div class="form-group" style="margin-bottom: 0">',
                                            '<div class="fg-line">',
                                                '<input id="new-email" type="text" class="form-control input-lg" placeholder="введите новый E-Mail адрес..." value="' + check_email + '">',
                                            '</div>',
                                        '</div>'
                                    ].join(''));

                                    $('#change-email-action').html('Продолжить').addClass('check-email').show();
                                    $('#change-email-modal').modal('show');
                                });
                                break;
                            case 'success':
                                $('#change-email-modal .modal-body').html([
                                    'Введенный вами E-Mail адрес не зарегистрирован в системе. После подтверждения изменения E-Mail адреса текущий адрес будет заменен на новый.'
                                ].join(''));

                                $('#change-email-action').html('Изменить E-Mail адрес').addClass('change-email').data('email', check_email).show();
                                break;
                            case 'exist':
                                var change_email_role = new String();
                                var change_email_state = new String();
                                
                                switch (result.user.role) {
                                    case 'new':
                                    case 'user': 
                                        change_email_role = 'Подписчик'; break;
                                    case 'admin': 
                                        change_email_role = 'Администратор'; break;
                                    case 'tech-admin': 
                                        change_email_role = 'Технический администратор'; break;
                                    default: 
                                        change_email_role = result.user.role;
                                }
                                
                                switch (result.user.state) {
                                    case 'inactive': change_email_state = 'ожидает активации'; break;
                                    case 'active': change_email_state = 'активный'; break;
                                    case 'pause': change_email_state = 'временно отписан'; break;
                                    case 'unsubscribe': change_email_state = 'отписан'; break;
                                    case 'blacklist': change_email_state = 'в черном списке'; break;
                                    case 'dropped': change_email_state = 'невозможно доставить почту'; break;
                                    case 'unknown': change_email_state = 'неизвестно'; break;
                                }
                                
                                $('#change-email-modal .modal-body').html([
                                    'Учетная запись с указанным E-Mail адресом уже зарегистрированна в системе. При объединении учетных записей все данные аккаунта ' + user.email + ' будут перенесены на аккаунт указанный ниже. Выполняйте это действие осознанно, так как откатить внесенные изменения будет невозможно.',
                                    '<hr>',
                                    '<div class="media">',
                                        '<div class="pull-left">',
                                            '<a href="<?= APP::Module('Routing')->root ?>admin/users/profile/' + result.user.id + '" target="_blank">',
                                                '<img style="width: 60px" class="media-object" src="<?= APP::$conf['location'][0] ?>://www.gravatar.com/avatar/' + result.user.md5_email + '?s=180&d=<?= urlencode(APP::Module('Routing')->root . APP::Module('Users')->settings['module_users_profile_picture']) ?>&t=<?= time() ?>" alt="">',
                                            '</a>',
                                        '</div>',
                                        '<div class="media-body">',
                                            '<h4 class="media-heading"><a href="<?= APP::Module('Routing')->root ?>admin/users/profile/' + result.user.id + '" target="_blank" style="text-decoration: none; color: #000000;">' + result.user.email + '</a></h4>',
                                            change_email_role + ' (' + change_email_state + ')',
                                            '<br>',
                                            'Дата регистрации: ' + result.user.reg_date,
                                        '</div>',
                                    '</div>'
                                ].join(''));

                                $('#change-email-action').html('Объединить учетные записи').addClass('combine-email').data('user', result.user.id).show();
                                break;
                        }
                    });
                });
                
                $('body').on('click', '#change-email-action.change-email', function() {
                    var new_email = $(this).data('email');
                    
                    $(this).removeClass('change-email').hide();
                
                    $('#change-email-modal .modal-body').html([
                        '<div class="text-center">',
                            '<div class="preloader pl-xxl">',
                                '<svg class="pl-circular" viewBox="25 25 50 50">',
                                    '<circle class="plc-path" cx="50" cy="50" r="20">',
                                '</svg>',
                            '</div>',
                        '</div>'
                    ].join(''));

                    $.post('<?= APP::Module('Routing')->root ?>admin/users/api/email/change.json', {
                        user: user.id,
                        email: new_email
                    }, function() {
                        swal({
                            title: 'Готово',
                            text: 'E-Mail учетной записи был успешно изменен',
                            type: 'success',
                            showCancelButton: false,
                            confirmButtonText: 'OK',
                            closeOnConfirm: false
                        }, function() {
                            location.reload();
                        });
                    });
                });
    
                $('body').on('click', '#change-email-action.combine-email', function() {
                    var new_user = $(this).data('user');
                    
                    $(this).removeClass('combine-email').hide();
                
                    $('#change-email-modal .modal-body').html([
                        '<div class="text-center">',
                            '<div class="preloader pl-xxl">',
                                '<svg class="pl-circular" viewBox="25 25 50 50">',
                                    '<circle class="plc-path" cx="50" cy="50" r="20">',
                                '</svg>',
                            '</div>',
                        '</div>'
                    ].join(''));
 
                    $.post('<?= APP::Module('Routing')->root ?>admin/users/api/email/change/combine.json', {
                        user: user.id,
                        target: new_user
                    }, function() {
                        swal({
                            title: 'Готово',
                            text: 'Учетные записи были успешно объединены',
                            type: 'success',
                            showCancelButton: false,
                            confirmButtonText: 'OK',
                            closeOnConfirm: false
                        }, function() {
                            window.location.href = '<?= APP::Module('Routing')->root ?>admin/users/profile/' + new_user;
                        });
                    });
                });
                
                var files = <?= json_encode($data['files']) ?>;
                
                $('body').on('click', '.files', function() {
                    var file_id = $(this).data('id');
                    
                    $('#files-modal .details table tbody').empty();

                    $.each(files[file_id].protection_log, function() {
                        $('#files-modal .details table tbody').append([
                            '<tr>',
                                '<td>' + this.cr_date + '</td>',
                                '<td>' + this.ip + '</td>',
                                '<td>' + this.country + '</td>',
                                '<td>' + this.region + '</td>',
                                '<td>' + this.city + '</td>',
                            '</tr>'
                        ].join(''));
                    });

                    $('#files-modal').modal('show');
                });
                
                /*
                var smartlog = <?= json_encode($data['smartlog']) ?>;
                
                $('body').on('click', '.smartlog', function() {
                    var id = $(this).data('id');
                    var action_data = smartlog[id].action_data !== 'NULL' ? JSON.stringify(JSON.parse(smartlog[id].action_data), undefined, 4) : 'Подробная информация отсутствует';
                    var extra = smartlog[id].extra !== 'NULL' ? JSON.stringify(JSON.parse(smartlog[id].extra), undefined, 4) : 'Подробная информация отсутствует';
                    
                    $('#smartlog-modal .details .smartlog_id').html(smartlog[id].id);
                    $('#smartlog-modal .details .smartlog_trigger_id').html(smartlog[id].trigger_id);
                    $('#smartlog-modal .details .smartlog_object_id').html(smartlog[id].object_id);
                    $('#smartlog-modal .details .smartlog_action_data pre').html(action_data);
                    $('#smartlog-modal .details .smartlog_extra pre').html(extra);
                    $('#smartlog-modal .details .smartlog_cr_date').html(smartlog[id].cr_date);

                    $('#smartlog-modal').modal('show');
                });
                */
                   
                $('#tab-invoices > .tab-nav > li:first').addClass('active');
                $('#tab-invoices > .tab-content > .tab-pane:first').addClass('active');
            });
        </script>
    </body>
</html>
