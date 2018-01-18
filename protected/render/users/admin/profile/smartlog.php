<div role="tabpanel" class="tab-pane" id="tab-smartlog">
    <div class="pmb-block">
        <div class="pmbb-header">
            <h2><i class="zmdi zmdi-calendar m-r-5"></i> Всего <?= count($data['smartlog']) ?> событий</h2>
        </div>
    </div>
    <table class="table table-hover table-vmiddle">
        <tbody>
            <?
            foreach ($data['smartlog'] as $item) {
                $action_data = json_decode($item['action_data'], true);
                $item_data = [];

                switch ($item['trigger_id']) {
                    case 'mail_event_delivered': $item_data = ['Доставка письма', 'email']; break;
                    case 'mail_event_deferred': $item_data = ['Отложенная отправка письма', 'time']; break;
                    case 'mail_event_bounce_hard': $item_data = ['Hard Bounce', 'flash']; break;
                    case 'mail_event_bounce_soft': $item_data = ['Soft Bounce', 'alert-triangle']; break;
                    case 'mail_event_unsubscribe': $item_data = ['Отписка от рассылок', 'close-circle']; break;
                    case 'mail_event_spamreport': $item_data = ['Жалоба на спам', 'fire']; break;
                    case 'mail_event_open': $item_data = ['Открытие письма', 'email-open']; break;
                    case 'mail_event_click': $item_data = ['Клик в письме', 'mouse']; break;
                    case 'user_activate': $item_data = ['Активация пользователя', 'power']; break;
                    case 'user_login': $item_data = ['Вход в систему', 'account-circle']; break;
                    case 'register_user': $item_data = ['Регистрация пользователя', 'account-add']; break;
                    case 'tunnels_update_action': $item_data = ['Обновление действия на схеме туннеля', 'edit']; break;
                    case 'tunnels_update_timeout': $item_data = ['Обновление таймаута на схеме туннеля', 'edit']; break;
                    case 'tunnels_update_condition': $item_data = ['Обновление условия на схеме туннеля', 'edit']; break;
                    case 'tunnels_create_action': $item_data = ['Создание действия на схеме туннеля', 'edit']; break;
                    case 'tunnels_create_timeout': $item_data = ['Создание таймаута на схеме туннеля', 'edit']; break;
                    case 'tunnels_create_condition': $item_data = ['Создание условия на схеме туннеля', 'edit']; break;
                    default: $item_data = [$item['trigger_id'], 'notifications']; break;
                }
                ?>
                <tr>
                    <td style="width: 60px;">
                        <span style="display: inline-block" class="avatar-char palette-Teal-400 bg"><i class="zmdi zmdi-<?= $item_data[1] ?>"></i></span>
                    </td>
                    <td style="font-size: 16px;">
                        <a class="smartlog" data-id="<?= $item['id'] ?>" target="_blank" style="color: #4C4C4C" href="<?= APP::Module('Routing')->root ?>admin/smartlog/view/<?= APP::Module('Crypt')->Encode($item['id']) ?>"><?= $item_data[0] ?></a>
                        <?
                        $extra = json_decode($item['extra'], true);

                        switch ($item['trigger_id']) {
                            case 'mail_event_delivered': 
                                ?>
                                <div style="font-size: 12px; margin: 0 0 2px 0">
                                    <a target="_blank" style="color: #4C4C4C" href="<?= APP::Module('Routing')->root ?>admin/mail/html/<?= APP::Module('Crypt')->Encode($extra['letter']['id']) ?>"><?= $extra['letter']['subject'] ?></a>
                                </div>
                                <div style="font-size: 11px; margin: 0 0 5px 0">
                                    <?= $action_data['task']['response'] ?>
                                </div>
                                <?
                                break;
                            case 'mail_event_deferred':
                            case 'mail_event_bounce_hard':
                            case 'mail_event_bounce_soft':
                            case 'mail_event_open':
                                ?>
                                <div style="font-size: 12px; margin: 0 0 5px 0">
                                    <a target="_blank" style="color: #4C4C4C" href="<?= APP::Module('Routing')->root ?>admin/mail/html/<?= APP::Module('Crypt')->Encode($extra['letter']['id']) ?>"><?= $extra['letter']['subject'] ?></a>
                                </div>
                                <?
                                break;
                            case 'mail_event_click': 
                                ?>
                                <div style="font-size: 12px; margin: 0 0 2px 0">
                                    <a target="_blank" style="color: #4C4C4C" href="<?= APP::Module('Routing')->root ?>admin/mail/html/<?= APP::Module('Crypt')->Encode($extra['letter']['id']) ?>"><?= $extra['letter']['subject'] ?></a>
                                </div>
                                <div style="font-size: 11px; margin: 0 0 5px 0">
                                    <a target="_blank" style="color: #4C4C4C" href="<?= $action_data['task']['url'] ?>">Ссылка</a>
                                </div>
                                <?
                                break;
                        }
                        ?>
                        <div style="font-size: 11px;"><?= $item['cr_date'] ?></div>
                    </td>
                </tr>
                <?
            }
            ?>
        </tbody>
    </table>
</div>
<!--
<div class="modal fade" id="smartlog-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Детали события</h4>
            </div>
            <div class="details">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td>ID события</td>
                            <td class="smartlog_id"></td>
                        </tr>
                        <tr>
                            <td>Триггер</td>
                            <td class="smartlog_trigger_id"></td>
                        </tr>
                        <tr>
                            <td>Объект</td>
                            <td class="smartlog_object_id"></td>
                        </tr>
                        <tr>
                            <td>Данные</td>
                            <td class="smartlog_action_data">
                                <pre style="white-space: pre-wrap"></pre>
                            </td>
                        </tr>
                        <tr>
                            <td>Подробности</td>
                            <td class="smartlog_extra">
                                <pre style="white-space: pre-wrap"></pre>
                            </td>
                        </tr>
                        <tr>
                            <td>Дата создания</td>
                            <td class="smartlog_cr_date"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>
-->