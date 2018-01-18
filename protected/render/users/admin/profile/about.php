<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<div role="tabpanel" class="tab-pane active" id="tab-about">
    <ul class="tab-nav" data-tab-color="teal">
        <li class="active waves-effect"><a href="#tab-about-main" aria-controls="tab-about-main" role="tab" data-toggle="tab">Основное</a></li>
        <li class="waves-effect"><a href="#tab-about-other" aria-controls="tab-about-other" role="tab" data-toggle="tab">Разное</a></li>
        <li class="waves-effect"><a href="#tab-about-alt-email" aria-controls="tab-about-alt-email" role="tab" data-toggle="tab">Альтернативные E-Mail</a></li>
        <li class="waves-effect"><a href="#tab-about-comments" aria-controls="tab-about-comments" role="tab" data-toggle="tab">Комментарии</a></li>
        <? if (count($data['social_profiles'])) { ?><li class="waves-effect"><a href="#tab-about-social-profiles" aria-controls="tab-about-social-profiles" role="tab" data-toggle="tab">Социальные сети</a></li><? } ?>
    </ul>
    <div class="tab-content" style="padding: 0;">
        <div role="tabpanel" class="tab-pane active" id="tab-about-main">
            <div class="row p-l-30 p-r-30 p-t-30">
                <div class="col-xs-3">
                    <div class="brd-1 p-15" style="border: 1px solid #888888; border-radius: 2px">
                        <div class="m-b-5">Новые счета</div>
                        <h2 class="m-0 f-300"><?= $data['invoices_stat']['count']['new'] ?></h2>
                    </div>
                </div>

                <div class="col-xs-3">
                    <div class="brd-1 p-15" style="border: 1px solid #888888; border-radius: 2px">
                        <div class="m-b-5">Аннулированные счета</div>
                        <h2 class="m-0 f-300"><?= $data['invoices_stat']['count']['revoked'] ?></h2>
                    </div>
                </div>

                <div class="col-xs-3">
                    <div class="brd-1 p-15" style="border: 1px solid #888888; border-radius: 2px">
                        <div class="m-b-5">Оплаченные счета</div>
                        <h2 class="m-0 f-300"><?= $data['invoices_stat']['count']['success'] ?></h2>
                    </div>
                </div>

                <div class="col-xs-3">
                    <div class="brd-1 p-15" style="border: 1px solid #888888; border-radius: 2px">
                        <div class="m-b-5">Сумма счетов</div>
                        <h2 class="m-0 f-300"><?= number_format($data['invoices_stat']['success_amount'], 0, ' ', ' ') ?></h2>
                    </div>
                </div>
            </div>
            <div class="row p-l-30 p-r-30 p-t-30">
                <div class="col-xs-3">
                    <div class="brd-1 p-15" style="border: 1px solid #888888; border-radius: 2px">
                        <div class="m-b-5">Отправлено писем</div>
                        <h2 class="m-0 f-300"><?= number_format(count($data['mail_overview']['processed']), 0, ' ', ' ') ?></h2>
                    </div>
                </div>

                <div class="col-xs-3">
                    <div class="brd-1 p-15" style="border: 1px solid #888888; border-radius: 2px">
                        <div class="m-b-5">Доставлено писем</div>
                        <h2 class="m-0 f-300"><?= number_format(count($data['mail_overview']['delivered']), 0, ' ', ' ') ?><sup class="f-12 m-l-5"><?= count($data['mail_overview']['processed']) ? round(count($data['mail_overview']['delivered']) / (count($data['mail_overview']['processed']) / 100), 2) : 0 ?>%</sup></h2>
                    </div>
                </div>

                <div class="col-xs-3">
                    <div class="brd-1 p-15" style="border: 1px solid #888888; border-radius: 2px">
                        <div class="m-b-5">Открыто писем</div>
                        <h2 class="m-0 f-300"><?= number_format(count($data['mail_overview']['open']), 0, ' ', ' ') ?><sup class="f-12 m-l-5"><?= count($data['mail_overview']['delivered']) ? round(count($data['mail_overview']['open']) / (count($data['mail_overview']['delivered']) / 100), 2) : 0 ?>%</sup></h2>
                    </div>
                </div>

                <div class="col-xs-3">
                    <div class="brd-1 p-15" style="border: 1px solid #888888; border-radius: 2px">
                        <div class="m-b-5">Кликнули в письме</div>
                        <h2 class="m-0 f-300"><?= number_format(count($data['mail_overview']['click']), 0, ' ', ' ') ?><sup class="f-12 m-l-5"><?= count($data['mail_overview']['delivered']) ? round(count($data['mail_overview']['click']) / (count($data['mail_overview']['delivered']) / 100), 2) : 0 ?>%</sup></h2>
                    </div>
                </div>
            </div>
            <div class="row p-l-30 p-r-30 p-t-30">
                <div class="col-xs-3">
                    <div class="brd-1 p-15" style="border: 1px solid #888888; border-radius: 2px">
                        <div class="m-b-5">RFM покупки</div>
                        <h2 class="m-0 f-300"><?= $data['rfm']['invoices'] ?></h2>
                    </div>
                </div>

                <div class="col-xs-3">
                    <div class="brd-1 p-15" style="border: 1px solid #888888; border-radius: 2px">
                        <div class="m-b-5">RFM клики</div>
                        <h2 class="m-0 f-300"><?= $data['rfm']['clicks'] ?></h2>
                    </div>
                </div>

                <div class="col-xs-3">
                    <div class="brd-1 p-15" style="border: 1px solid #888888; border-radius: 2px">
                        <div class="m-b-5">RFM открытия</div>
                        <h2 class="m-0 f-300"><?= $data['rfm']['opens'] ?></h2>
                    </div>
                </div>
            </div>
            
            <div class="pmb-block">
                <div class="pmbb-header">
                    <h2><i class="zmdi zmdi-account m-r-5"></i> Основное</h2>

                    <ul class="actions">
                        <li class="dropdown">
                            <a href="javascript:void(0)" data-toggle="dropdown"><i class="zmdi zmdi-more-vert"></i></a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a class="toggle-basic" href="javascript:void(0)">Редактировать</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="p-l-25">
                    <div id="view-basic" class="pmbb-view">
                        <dl class="dl-horizontal">
                            <dt>ID</dt>
                            <dd><?= $data['user']['id'] ?></dd>
                        </dl>
                        <dl class="dl-horizontal">
                            <dt>E-Mail</dt>
                            <dd id="about-email-value"><?= $data['user']['email'] ?> | <a href="javascript:void(0)" id="change-email-start">изменить</a></dd>
                        </dl>
                        <dl class="dl-horizontal">
                            <dt>Имя пользователя</dt>
                            <dd id="about-username-value">
                                <?
                                if (isset($data['about']['username'])) {
                                    if ($data['about']['username']) {
                                        echo $data['about']['username'];
                                    } else {
                                        echo 'user' . $data['user']['id'];
                                    }
                                } else {
                                    echo 'user' . $data['user']['id'];
                                }
                                ?>
                            </dd>
                        </dl>
                        <dl class="dl-horizontal">
                            <dt>Регистрация</dt>
                            <dd><?= $data['user']['reg_date'] ?></dd>
                        </dl>
                        <dl class="dl-horizontal">
                            <dt>Последняя активность</dt>
                            <dd><?= $data['user']['last_visit'] ?></dd>
                        </dl>
                        <dl class="dl-horizontal">
                            <dt>Роль</dt>
                            <dd>
                                <?
                                switch ($data['user']['role']) {
                                    case 'new':
                                    case 'user': 
                                        echo 'подписчик'; break;
                                    case 'admin': echo 'администратор'; break;
                                    case 'tech-admin': echo 'технический администратор'; break;
                                    default: echo $data['user']['role']; break;
                                }
                                ?>
                            </dd>
                        </dl>
                        <dl class="dl-horizontal">
                            <dt>Состояние</dt>
                            <dd id="about-state-value">
                                <?
                                if (isset($data['about']['state'])) {
                                    switch ($data['about']['state']) {
                                        case 'inactive': echo 'ожидает активации'; break;
                                        case 'active': echo 'активный'; break;
                                        case 'pause': echo 'временно отписан'; break;
                                        case 'unsubscribe': echo 'отписан'; break;
                                        case 'blacklist': echo 'в черном списке'; break;
                                        case 'dropped': echo 'невозможно доставить почту'; break;
                                        case 'unknown': echo 'неизвестно'; break;
                                        default: echo $data['about']['state']; break;

                                    }
                                } else {
                                    echo 'неизвестно';
                                }

                                foreach ($data['taskmanager'] as $task) {
                                    if (($task['module'] . $task['method'] == 'UsersActivateUserTask') && ($task['state'] == 'wait')) {
                                        ?>
                                        <span class="m-l-5">(автоматическое восстановление подписки <?= $task['exec_date'] ?>)</span>    
                                        <?
                                    }
                                }
                                ?>
                            </dd>
                        </dl>
                        <dl class="dl-horizontal">
                            <dt>Источник</dt>
                            <dd id="about-source-value"><?= $data['about']['source'] ?></dd>
                        </dl>
                    </div>
                    <form id="form-basic" class="pmbb-edit">
                        <input type="hidden" name="user" value="<?= APP::Module('Crypt')->Encode($data['user']['id']) ?>">

                        <dl class="dl-horizontal">
                            <dt class="p-t-10">Имя пользователя</dt>
                            <dd>
                                <div class="fg-line">
                                    <input type="text" id="about_username" name="about[username]" class="form-control" placeholder="user<?= $data['user']['id'] ?>">
                                </div>
                            </dd>
                        </dl>
                        <dl class="dl-horizontal">
                            <dt class="p-t-10">Состояние</dt>
                            <dd>
                                <div class="fg-line" style="width: 50%;">
                                    <select id="about_state" name="about[state]" class="selectpicker">
                                        <option value="inactive">ожидает активации</option>
                                        <option value="active">активный</option>
                                        <option value="pause">временно отписан</option>
                                        <option value="unsubscribe">отписан</option>
                                        <option value="blacklist">в черном списке</option>
                                        <option value="dropped">невозможно доставить почту</option>
                                        <option value="unknown">неизвестно</option>
                                    </select>
                                </div>
                            </dd>
                        </dl>
                        <div class="m-t-30">
                            <button type="submit" class="btn palette-Teal bg waves-effect">Сохранить</button>
                            <button type="button" class="toggle-basic btn btn-link c-black">Отмена</button>
                        </div>
                    </form>
                </div>
            </div>
            <?
            if (count($data['tunnels_timeline'])) {
                ?>
                <div class="pmb-block">
                    <div class="pmbb-header">
                        <h2><i class="zmdi zmdi-arrow-split m-r-5"></i> Участие в туннелях</h2>
                    </div>
                    <div id="tunnels-timeline" style="height: <?= count($data['tunnels_timeline']) * 55 ?>px"></div>
                </div>
                <script type="text/javascript">
                    google.charts.load('current', { packages:['timeline'], language: 'ru' });
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var container = document.getElementById('tunnels-timeline');
                        var chart = new google.visualization.Timeline(container);
                        var dataTable = new google.visualization.DataTable();

                        dataTable.addColumn({ type: 'string', id: 'Наименование' });
                        dataTable.addColumn({ type: 'string', id: 'Состояние' });
                        dataTable.addColumn({ type: 'date', id: 'Начало' });
                        dataTable.addColumn({ type: 'date', id: 'Конец' });

                        <?
                        $tunnel_states_list = [
                            'active' => 'активный',
                            'pause' => 'на паузе',
                            'complete' => 'завершенный'
                        ];
                        ?>

                        dataTable.addRows([<? foreach ($data['tunnels_timeline'] as $value) { ?>['<?= $value[0] ?>', '<?= $tunnel_states_list[$value[1]] ?>', new Date(<?= $value[2] * 1000 ?>), new Date(<?= $value[3] * 1000 ?>) ],<? } ?>]);

                        var options = {
                            timeline: { singleColor: '#009688' }
                        };

                        chart.draw(dataTable, options);
                    }
                </script>
                <?
            }
            ?>
        </div>
        <div role="tabpanel" class="tab-pane" id="tab-about-other">
            <div class="pmb-block">
                <div class="pmbb-header">
                    <h2><i class="zmdi zmdi-assignment m-r-5"></i> Разное</h2>

                    <ul class="actions">
                        <li class="dropdown">
                            <a href="javascript:void(0)" data-toggle="dropdown"><i class="zmdi zmdi-more-vert"></i></a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a class="toggle-assignment" href="javascript:void(0)">Редактировать</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="p-l-25">
                    <div id="view-assignment" class="pmbb-view">
                        <?
                        foreach ($data['about'] as $key => $value) {
                            if (array_search($key, [
                                'username',
                                'state'
                            ]) !== false) {
                                continue;
                            }
                            ?>
                            <dl class="dl-horizontal">
                                <dt>
                                    <?
                                    switch ($key) {
                                        case 'firstname': echo 'Имя'; break;
                                        case 'lastname': echo 'Фамилия'; break;
                                        case 'country_name_ru': echo 'Страна'; break;
                                        case 'region_name_ru': echo 'Регион'; break;
                                        case 'city_name_ru': echo 'Город'; break;
                                        case 'tel': echo 'Телефон'; break;
                                        case 'source': echo 'Источник'; break;
                                        case 'http_user_agent': echo 'Браузер'; break;
                                        case 'http_referer': echo 'HTTP-реферер'; break;
                                        case 'remote_addr': echo 'IP'; break;
                                        case 'self_url': echo 'Self URL'; break;
                                        case 'skype': echo 'Skype'; break;
                                        case 'mobile_phone': echo 'Мобильный телефон'; break;
                                        default: echo $key; break;
                                    }
                                    ?>
                                </dt>
                                <dd id="about-<?= $key ?>-value"><?= $value ? $value : 'нет' ?></dd>
                            </dl>
                            <?
                        }
                        ?>
                    </div>

                    <form id="form-assignment" class="pmbb-edit">
                        <input type="hidden" name="user" value="<?= APP::Module('Crypt')->Encode($data['user']['id']) ?>">

                        <?
                        foreach ($data['about'] as $key => $value) {
                            if (array_search($key, [
                                'username',
                                'state'
                            ]) !== false) {
                                continue;
                            }
                            ?>
                            <dl class="dl-horizontal">
                                <dt class="p-t-10">
                                    <?
                                    switch ($key) {
                                        case 'firstname': echo 'Имя'; break;
                                        case 'lastname': echo 'Фамилия'; break;
                                        case 'country_name_ru': echo 'Страна'; break;
                                        case 'region_name_ru': echo 'Регион'; break;
                                        case 'city_name_ru': echo 'Город'; break;
                                        case 'tel': echo 'Телефон'; break;
                                        case 'source': echo 'Источник'; break;
                                        case 'http_user_agent': echo 'Браузер'; break;
                                        case 'http_referer': echo 'HTTP-реферер'; break;
                                        case 'remote_addr': echo 'IP'; break;
                                        case 'self_url': echo 'Self URL'; break;
                                        case 'skype': echo 'Skype'; break;
                                        case 'mobile_phone': echo 'Мобильный телефон'; break;
                                        default: echo $key; break;
                                    }
                                    ?>
                                </dt>
                                <dd>
                                    <div class="fg-line">
                                        <input type="text" id="about_<?= $key ?>" name="about[<?= $key ?>]" class="form-control">
                                    </div>
                                </dd>
                            </dl>
                            <?
                        }
                        ?>

                        <div class="m-t-30">
                            <button type="submit" class="btn palette-Teal bg waves-effect">Сохранить</button>
                            <button type="button" class="toggle-assignment btn btn-link c-black">Отмена</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="tab-about-alt-email">
            <div class="pmb-block">
                <div class="pmbb-header">
                    <h2><i class="zmdi zmdi-email m-r-5"></i> Альтернативные E-Mail</h2>

                    <ul class="actions">
                        <li class="dropdown">
                            <a href="javascript:void(0)" data-toggle="dropdown"><i class="zmdi zmdi-more-vert"></i></a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a class="toggle-alt-email" href="javascript:void(0)">Добавить E-Mail</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="p-l-25">
                    <div id="view-alt-email" class="pmbb-view">
                        <?
                        if (count($data['alt_emails'])) {
                            foreach ($data['alt_emails'] as $item) {
                                ?>
                                <dl class="dl-horizontal">
                                    <dt><?= $item['email'] ?></dt>
                                    <dd><a href="javascript:void(0)" class="remove-email" data-id="<?= $item['id'] ?>">удалить</a></dd>
                                </dl>
                                <?
                            }
                        } else {
                            ?>
                            <span class="not_found">Нет данных</span>
                            <?
                        }
                        ?>
                    </div>
                    <form id="form-alt-email" class="pmbb-edit">
                        <input type="hidden" name="user" value="<?= APP::Module('Crypt')->Encode($data['user']['id']) ?>">

                        <dl class="dl-horizontal">
                            <dt class="p-t-10">E-Mail</dt>
                            <dd>
                                <div class="fg-line">
                                    <input type="text" id="alt_email" name="alt_email" class="form-control" placeholder="введите E-Mail">
                                </div>
                            </dd>
                        </dl>
                        <div class="m-t-30">
                            <button type="submit" class="btn palette-Teal bg waves-effect">Добавить</button>
                            <button type="button" class="toggle-alt-email btn btn-link c-black">Отмена</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="tab-about-comments">
            <?
            if (isset(APP::$modules['Comments'])) {
                $comment_object_type = APP::Module('DB')->Select(APP::Module('Comments')->settings['module_comments_db_connection'], ['fetchColumn', 0], ['id'], 'comments_objects', [['name', '=', "UserAdmin", PDO::PARAM_STR]]);

                APP::Render('comments/widgets/default/list', 'include', [
                    'type' => $comment_object_type,
                    'id' => $data['user']['id'],
                    'likes' => true,
                    'class' => [
                        'holder' => 'p-l-10'
                    ]
                ]);

                APP::Render('comments/widgets/default/form', 'include', [
                    'type' => $comment_object_type,
                    'id' => $data['user']['id'],
                    'login' => [],
                    'class' => [
                        'holder' => false,
                        'list' => 'p-l-10'
                    ]
                ]);
            }
            ?>
        </div>
        <div role="tabpanel" class="tab-pane" id="tab-about-social-profiles">
            <div class="pmb-block">
                <div class="pmbb-header">
                    <h2><i class="zmdi zmdi-account-box-o m-r-5"></i> Социальные сети</h2>
                </div>
                <div class="p-l-25">
                    <div id="view-contact" class="pmbb-view">
                        <?
                        foreach ($data['social_profiles'] as $profile) {
                            switch ($profile['service']) {
                                case 'vk': 
                                    ?>
                                    <dl class="dl-horizontal">
                                        <dt>ВКонтакте</dt>
                                        <dd id="social-profile-vk"><a href="https://vk.com/id<?= $profile['extra'] ?>" target="_blank" class="c-teal"><?= $profile['extra'] ?></a></dd>
                                    </dl>
                                    <? 
                                    break;
                                case 'fb': 
                                    ?>
                                    <dl class="dl-horizontal">
                                        <dt>Facebook</dt>
                                        <dd id="social-profile-facebook"><a href="http://facebook.com/profile.php?id=<?= $profile['extra'] ?>" target="_blank"><?= $profile['extra'] ?></a></dd>
                                    </dl>
                                    <? 
                                    break;
                                case 'google': 
                                    ?>
                                    <dl class="dl-horizontal">
                                        <dt>Google+</dt>
                                        <dd id="social-profile-google-plus"><a href="https://plus.google.com/u/0/<?= $profile['extra'] ?>" target="_blank"><?= $profile['extra'] ?></a></dd>
                                    </dl>
                                    <? 
                                    break;
                                case 'ya': 
                                    ?>
                                    <dl class="dl-horizontal">
                                        <dt>Яндекс</dt>
                                        <dd id="social-profile-yandex"><?= $profile['extra'] ?></dd>
                                    </dl>
                                    <? 
                                    break;
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="change-email-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Изменение E-Mail адреса</h4>
                <small></small>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button id="change-email-action" type="button" class="btn btn-link waves-effect pull-left">Продолжить</button>
                <button type="button" class="btn btn-link" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>