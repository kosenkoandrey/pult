<div role="tabpanel" class="tab-pane" id="tab-tunnels">
    <ul class="tab-nav" data-tab-color="teal">
        <li class="active waves-effect"><a href="#tab-tunnels-subscriptions" aria-controls="tab-about" role="tab" data-toggle="tab">Подписки</a></li>
        <li class="waves-effect"><a href="#tab-tunnels-queue" aria-controls="tab-mail" role="tab" data-toggle="tab">Очередь</a></li>
        <li class="waves-effect"><a href="#tab-tunnels-allow" aria-controls="tab-mail" role="tab" data-toggle="tab">Доступные</a></li>
    </ul>
    <div class="tab-content" style="padding: 0;">
        <div role="tabpanel" class="tab-pane active" id="tab-tunnels-subscriptions">
            <?
            if ($data['tunnels']['subscriptions']) {
                ?>
                <table class="table table-hover table-vmiddle">
                    <tbody>
                        <?
                        foreach ($data['tunnels']['subscriptions'] as $item) {

                            $tunnel_icon = false;
                            $tunnel_actions = [
                                'play' => true,
                                'pause' => true,
                                'stop' => true
                            ];

                            switch ($item['info']['state']) {
                                case 'pause': 
                                    $tunnel_icon = ['Grey-400', 'time']; 
                                    $tunnel_actions = [
                                        'play' => true,
                                        'pause' => false,
                                        'stop' => true
                                    ];
                                    break;
                                case 'complete': 
                                    $tunnel_icon = ['Teal-400', 'check']; 
                                    $tunnel_actions = [
                                        'play' => false,
                                        'pause' => false,
                                        'stop' => false
                                    ];
                                    break;
                                case 'active': 
                                    $tunnel_icon = ['Orange-400', 'arrow-split']; 
                                    $tunnel_actions = [
                                        'play' => false,
                                        'pause' => true,
                                        'stop' => true
                                    ];
                                    break;
                            }
                            ?>
                            <tr>
                                <td id="tunnel_icon_<?= $item['info']['id'] ?>" style="width: 60px;">
                                    <span style="display: inline-block" class="avatar-char palette-<?= $tunnel_icon[0] ?> bg"><i class="zmdi zmdi-<?= $tunnel_icon[1] ?>"></i></span>
                                </td>
                                <td style="font-size: 16px;">
                                    <a class="tunnel_tags" data-id="<?= $item['info']['id'] ?>" style="color: #4C4C4C" href="javascript:void(0)"><?= $item['info']['tunnel_name'] ?></a>
                                    <div style="font-size: 11px;"><?= count($item['tags']) ?> событий</div>
                                </td>
                                <td style="width: 300px;">
                                    <a data-toggle="tooltip" data-placement="top" data-object="<?= $item['info']['object'] ?>" data-original-title="Продвинуть" data-id="<?= $item['info']['id'] ?>" data-action="move_on" href="javascript:void(0)" class="tunnel_actions move_on btn btn-sm btn-default btn-icon waves-effect waves-circle pull-right m-l-5"><span class="zmdi zmdi-redo"></span></a>
                                    <a data-toggle="tooltip" data-placement="top" data-original-title="Остановить" data-id="<?= $item['info']['id'] ?>" data-action="stop" href="javascript:void(0)" class="tunnel_actions stop btn btn-sm btn-default btn-icon waves-effect waves-circle pull-right m-l-5 <? if (!$tunnel_actions['stop']) { ?>disabled<? } ?>"><span class="zmdi zmdi-close-circle"></span></a>
                                    <a data-toggle="tooltip" data-placement="top" data-original-title="На паузу" data-id="<?= $item['info']['id'] ?>" data-action="pause" href="javascript:void(0)" class="tunnel_actions pause btn btn-sm btn-default btn-icon waves-effect waves-circle pull-right m-l-5 <? if (!$tunnel_actions['pause']) { ?>disabled<? } ?>"><span class="zmdi zmdi-hourglass-alt"></span></a>
                                    <a data-toggle="tooltip" data-placement="top" data-original-title="Возобновить" data-id="<?= $item['info']['id'] ?>" data-action="play" href="javascript:void(0)" class="tunnel_actions play btn btn-sm btn-default btn-icon waves-effect waves-circle pull-right m-l-5 <? if (!$tunnel_actions['play']) { ?>disabled<? } ?>"><span class="zmdi zmdi-power"></span></a>
                                </td>
                            </tr>
                            <?
                        }
                        ?>
                    </tbody>
                </table>
                <?
            } else {
                ?>
                <table class="table table-vmiddle">
                    <tbody>
                        <tr>
                            <td style="width: 60px;">
                                <span style="display: inline-block" class="avatar-char avatar-char palette-Teal-200 bg"><i class="zmdi zmdi-close"></i></span>
                            </td>
                            <td style="font-size: 16px; color: #4C4C4C">
                                Нет подписок на туннели
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?
            }
            ?>
        </div>
        <div role="tabpanel" class="tab-pane" id="tab-tunnels-queue">
            <?
            if ($data['tunnels']['queue']) {
                ?>
                <table class="table table-hover table-vmiddle">
                    <tbody>
                        <?
                        foreach ($data['tunnels']['queue'] as $item) {
                            ?>
                            <tr>
                                <td style="width: 60px;">
                                    <span style="display: inline-block" class="avatar-char palette-Teal-400 bg"><i class="zmdi zmdi-time"></i></span>
                                </td>
                                <td style="font-size: 16px;">
                                    <a class="tunnel_queue" data-id="<?= $item['id'] ?>" style="color: #4C4C4C" href="javascript:void(0)"><?= $item['tunnel_name'] ?></a>
                                    <div style="font-size: 11px;"><?= $item['object_id'] ?></div>
                                </td>
                            </tr>
                            <?
                        }
                        ?>
                    </tbody>
                </table>
                <?
            } else {
                ?>
                <table class="table table-vmiddle">
                    <tbody>
                        <tr>
                            <td style="width: 60px;">
                                <span style="display: inline-block" class="avatar-char avatar-char palette-Teal-200 bg"><i class="zmdi zmdi-close"></i></span>
                            </td>
                            <td style="font-size: 16px; color: #4C4C4C">
                                Нет туннелей в очереди
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?
            }
            ?>
        </div>
        <div role="tabpanel" class="tab-pane" id="tab-tunnels-allow">
            <?
            if ($data['tunnels']['allow']) {
                ?>
                <table class="table table-hover table-vmiddle">
                    <tbody>
                        <?
                        foreach ($data['tunnels']['allow'] as $item) {
                            ?>
                            <tr>
                                <td style="width: 60px;">
                                    <span style="display: inline-block" class="avatar-char palette-Teal-400 bg"><i class="zmdi zmdi-check"></i></span>
                                </td>
                                <td style="font-size: 16px; color: #4C4C4C">
                                    <?= $item['name'] ?>
                                    <div style="font-size: 11px;">
                                        <?
                                        switch ($item['type']) {
                                            case 'static': echo 'статический'; break;
                                            case 'dynamic': echo 'динамический'; break;
                                        }
                                        ?>
                                    </div>
                                </td>
                            </tr>
                            <?
                        }
                        ?>
                    </tbody>
                </table>
                <?
            } else {
                ?>
                <table class="table table-vmiddle">
                    <tbody>
                        <tr>
                            <td style="width: 60px;">
                                <span style="display: inline-block" class="avatar-char avatar-char palette-Teal-200 bg"><i class="zmdi zmdi-close"></i></span>
                            </td>
                            <td style="font-size: 16px; color: #4C4C4C">
                                Нет доступных туннелей
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?
            }
            ?>
        </div>
    </div>
</div>
<div class="modal fade" id="tunnel-tags-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Подробности подписки на туннель</h4>
            </div>
            <div class="details">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td>ID подписки</td>
                            <td class="tunnel_uid"></td>
                        </tr>
                        <tr>
                            <td>Состояние</td>
                            <td class="tunnel_state"></td>
                        </tr>
                        <tr>
                            <td>Тип туннеля</td>
                            <td class="tunnel_type"></td>
                        </tr>
                        <tr>
                            <td>ID туннеля</td>
                            <td class="tunnel_id"></td>
                        </tr>
                        <tr>
                            <td>Наименование туннеля</td>
                            <td class="tunnel_name"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-header">
                <h4 class="modal-title">События связанные с туннелем</h4>
            </div>
            <div class="modal-body tunnel-tags-list"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="tunnel-queue-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Подробности туннеля в очереди</h4>
            </div>
            <div class="details">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td>ID очереди</td>
                            <td class="tunnel_queue_id"></td>
                        </tr>
                        <tr>
                            <td>Дата добавления в очередь</td>
                            <td class="tunnel_queue_cr_date"></td>
                        </tr>
                        <tr>
                            <td>ID туннеля</td>
                            <td class="tunnel_queue_tunnel_id"></td>
                        </tr>
                        <tr>
                            <td>Тип туннеля</td>
                            <td class="tunnel_queue_tunnel_type"></td>
                        </tr>
                        <tr>
                            <td>Наименование туннеля</td>
                            <td class="tunnel_queue_tunnel_name"></td>
                        </tr>
                        <tr>
                            <td>Объект туннеля</td>
                            <td class="tunnel_queue_object_id"></td>
                        </tr>
                        <tr>
                            <td>Таймаут подписки</td>
                            <td class="tunnel_queue_timeout"></td>
                        </tr>
                        <tr>
                            <td>Параметры</td>
                            <td class="tunnel_queue_settings"></td>
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