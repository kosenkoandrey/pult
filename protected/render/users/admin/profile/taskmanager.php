<?
if ($data['taskmanager']) {
    ?>
    <div role="tabpanel" class="tab-pane" id="tab-taskmanager">
        <div class="pmb-block">
            <div class="pmbb-header">
                <h2><i class="zmdi zmdi-labels m-r-5"></i> Всего <?= count($data['taskmanager']) ?> задач</h2>
            </div>
        </div>
        <table class="table table-hover table-vmiddle">
            <tbody>
                <?
                foreach ($data['taskmanager'] as $item) {
                    $task_icon = false;

                    switch ($item['state']) {
                        case 'complete': $task_icon = ['Teal-400', 'check']; break;
                        case 'wait': $task_icon = ['Orange-400', 'time']; break;
                    }
                    ?>
                    <tr>
                        <td style="width: 60px;">
                            <span style="display: inline-block" class="avatar-char palette-<?= $task_icon[0] ?> bg"><i class="zmdi zmdi-<?= $task_icon[1] ?>"></i></span>
                        </td>
                        <td style="font-size: 16px;">
                            <a class="taskmanager" data-id="<?= $item['id'] ?>" style="color: #4C4C4C" href="javascript:void(0)">
                                <?
                                switch ($item['module'] . $item['method']) {
                                    case 'BillingExecMembersAccessTask': echo 'Открытие доступа к мемберке'; break;
                                    case 'BillingExecSecondaryProductsTask': echo 'Привязка вторичного продукта к счету'; break;
                                    case 'MailSend': echo 'Отправка письма'; break;
                                    case 'UsersActivateUserTask': echo 'Восстановление подписки (активация пользователя)'; break;
                                    default: echo $item['module'] . $item['method']; break;
                                }
                                ?>
                            </a>
                            <div style="font-size: 11px;"><?= $item['exec_date'] ?></div>
                        </td>
                        <!--
                        <td>
                            <a target="_blank" href="#" class="btn btn-sm btn-default btn-icon waves-effect waves-circle"><span class="zmdi zmdi-code-setting"></span></a>
                            <a target="_blank" href="#" class="btn btn-sm btn-default btn-icon waves-effect waves-circle"><span class="zmdi zmdi-text-format"></span></a>
                            <a target="_blank" href="#" class="btn btn-sm btn-default btn-icon waves-effect waves-circle"><span class="zmdi zmdi-text-format"></span></a>
                        </td>
                        -->
                    </tr>
                    <?
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="taskmanager-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Детали задачи</h4>
                </div>
                <div class="details">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td>ID задачи</td>
                                <td class="taskmanager_id"></td>
                            </tr>
                            <tr>
                                <td>Токен</td>
                                <td class="taskmanager_token"></td>
                            </tr>
                            <tr>
                                <td>Модуль</td>
                                <td class="taskmanager_module"></td>
                            </tr>
                            <tr>
                                <td>Метод</td>
                                <td class="taskmanager_method"></td>
                            </tr>
                            <tr>
                                <td>Аргументы</td>
                                <td class="taskmanager_args">
                                    <pre style="white-space: pre-wrap"></pre>
                                </td>
                            </tr>
                            <tr>
                                <td>Состояние</td>
                                <td class="taskmanager_state"></td>
                            </tr>
                            <tr>
                                <td>Дата создания</td>
                                <td class="taskmanager_cr_date"></td>
                            </tr>
                            <tr>
                                <td>Запланированная дата выполнения</td>
                                <td class="taskmanager_exec_date"></td>
                            </tr>
                            <tr>
                                <td>Фактическая дата выполнения</td>
                                <td class="taskmanager_complete_date"></td>
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
    <?
}