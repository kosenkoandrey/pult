<?
if ($data['mail']) {
    ?>
    <div role="tabpanel" class="tab-pane" id="tab-mail">
        <div class="pmb-block">
            <div class="pmbb-header">
                <h2><i class="zmdi zmdi-mail-send m-r-5"></i> Всего отправлено <?= count($data['mail']) ?> писем</h2>
            </div>
        </div>
        <table class="table table-hover table-vmiddle">
            <tbody>
                <?
                foreach ($data['mail'] as $item) {
                    $mail_icon = false;

                    switch ($item['log']['state']) {
                        case 'wait': $mail_icon = ['Grey-400', 'time']; break;
                        case 'error': $mail_icon = ['Red-400', 'close']; break;
                        case 'success': $mail_icon = ['Teal-500', 'email']; break;
                        case '': $mail_icon = ['Red-400', 'alert-polygon']; break;
                    }

                    $mail_tags = array_reverse($item['tags']);
                    ?>
                <tr style="height: 93px;">
                        <td style="width: 60px;padding-right: 15px">
                            <span style="display: block" class="avatar-char palette-<?= $mail_icon[0] ?> bg"><i class="zmdi zmdi-<?= $mail_icon[1] ?>"></i></span>
                        </td>
                        <td style="font-size: 16px;">
                            <a class="mail_events" data-id="<?= $item['log']['id'] ?>" style="color: #4C4C4C" href="javascript:void(0)"><?= $item['log']['letter_subject'] ?></a>
                            <div style="font-size: 11px;"><?= $item['log']['cr_date'] ?></div>
                            <div style="font-size: 12px; margin-top: 5px;">
                                <? if(count($mail_tags)){
                                    $mail_events = [];
                                    foreach ($mail_tags as $tag){
                                        switch ($tag) {
                                            case 'processed':
                                            case 'delivered':
                                                $mail_events[$tag] = '';
                                                break;
                                            /*
                                            case 'processed':
                                                $mail_events[$tag] = '<i class="fa fa-paper-plane fa-lg icon-mail-event" data-toggle="tooltip" data-placement="top" title="'.$tag.'"></i>';
                                                break;
                                            case 'delivered':
                                                $mail_events[$tag] = '<i class="fa fa-envelope fa-lg icon-mail-event" data-toggle="tooltip" data-placement="top" title="'.$tag.'"></i>';
                                                break;
                                             */
                                            case 'open':
                                                $mail_events[$tag] = '<i class="fa fa-envelope-open fa-lg  icon-mail-event" data-toggle="tooltip" data-placement="top" title="'.$tag.'"></i>';
                                                break;
                                            case 'click':
                                                $mail_events[$tag] = '<i class="fa fa-hand-pointer-o fa-lg  icon-mail-event" data-toggle="tooltip" data-placement="top" title="'.$tag.'"></i>';
                                                break;
                                            case 'unsubscribe':
                                                $mail_events[$tag] = '<i class="fa fa-times fa-lg  icon-mail-event" data-toggle="tooltip" data-placement="top" title="'.$tag.'"></i>';
                                                break;
                                            case 'unsubscribe_tunnel':
                                                $mail_events[$tag] = '<i class="fa fa-calendar-times-o fa-lg  icon-mail-event" data-toggle="tooltip" data-placement="top" title="'.$tag.'"></i>';
                                                break;
                                            case 'spamreport':
                                                $mail_events[$tag] = '<i class="fa fa-exclamation-triangle fa-lg  icon-mail-event" data-toggle="tooltip" data-placement="top" title="'.$tag.'"></i>';
                                                break;
                                            case 'pause':
                                                $mail_events[$tag] = '<i class="fa fa-pause fa-lg  icon-mail-event" data-toggle="tooltip" data-placement="top" title="'.$tag.'"></i>';
                                                break;
                                            case 'bounce':
                                                $mail_events[$tag] = '<i class="fa fa-share fa-lg  icon-mail-event" data-toggle="tooltip" data-placement="top" title="'.$tag.'"></i>';
                                                break;
                                            default:
                                                $mail_events[] = $tag;
                                                break;
                                        }
                                    }

                                    echo implode('', $mail_events);
                                }else{
                                    echo 'Нет событий';
                                } ?>

                            </div>
                        </td>
                        <td style="width: 130px; text-align: right;">
                            <a target="_blank" href="<?= APP::Module('Routing')->root ?>admin/mail/html/<?= APP::Module('Crypt')->Encode($item['log']['id']) ?>" class="btn btn-sm btn-default btn-icon waves-effect waves-circle"><span class="zmdi zmdi-code-setting"></span></a>
                            <a target="_blank" href="<?= APP::Module('Routing')->root ?>admin/mail/plaintext/<?= APP::Module('Crypt')->Encode($item['log']['id']) ?>" class="btn btn-sm btn-default btn-icon waves-effect waves-circle"><span class="zmdi zmdi-text-format"></span></a>
                        </td>
                    </tr> 
                    <?
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="mail-events-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Подробности отправки письма</h4>
                </div>
                <div class="details">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td>ID отправки</td>
                                <td class="mail_id"></td>
                            </tr>
                            <tr>
                                <td>Состояние</td>
                                <td class="mail_state"></td>
                            </tr>
                            <tr>
                                <td>Ответ</td>
                                <td class="mail_result"></td>
                            </tr>
                            <tr>
                                <td>Кол-во попыток</td>
                                <td class="mail_retries"></td>
                            </tr>
                            <tr>
                                <td>Время ответа</td>
                                <td class="mail_ping"></td>
                            </tr>
                            <tr>
                                <td>Дата отправки</td>
                                <td class="mail_cr_date"></td>
                            </tr>
                            <tr>
                                <td>Тема письма</td>
                                <td class="mail_letter_subject"></td>
                            </tr>
                            <tr>
                                <td>Приоритет</td>
                                <td class="mail_letter_priority"></td>
                            </tr>
                            <tr>
                                <td>Имя отправителя</td>
                                <td class="mail_sender_name"></td>
                            </tr>
                            <tr>
                                <td>E-Mail отправителя</td>
                                <td class="mail_sender_email"></td>
                            </tr>
                            <tr>
                                <td>Модуль транспорта</td>
                                <td class="mail_transport_module"></td>
                            </tr>
                            <tr>
                                <td>Метод транспорта</td>
                                <td class="mail_transport_method"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-header">
                    <h4 class="modal-title">События связанные с письмом</h4>
                </div>
                <div class="modal-body events"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
    <?
}