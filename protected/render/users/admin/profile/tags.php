<?
if ($data['tags']) {
    ?>
    <div role="tabpanel" class="tab-pane" id="tab-tags">
        <div class="pmb-block">
            <div class="pmbb-header">
                <h2><i class="zmdi zmdi-labels m-r-5"></i> Всего <?= count($data['tags']) ?> тег</h2>
            </div>
        </div>
        <table class="table table-hover table-vmiddle">
            <tbody>
                <?
                foreach ($data['tags'] as $item) {
                    ?>
                    <tr>
                        <td style="width: 60px;">
                            <span style="display: inline-block" class="avatar-char palette-Orange-400 bg"><i class="zmdi zmdi-label"></i></span>
                        </td>
                        <td style="font-size: 16px;">
                            <a class="tags" data-id="<?= $item['id'] ?>" style="color: #4C4C4C" href="javascript:void(0)"><?= $item['item'] ?></a>
                            <div style="font-size: 11px;"><?= $item['cr_date'] ?></div>
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

    <div class="modal fade" id="tags-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Детали тега</h4>
                </div>
                <div class="details">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td>ID тега</td>
                                <td class="tag_id"></td>
                            </tr>
                            <tr>
                                <td>Наименование</td>
                                <td class="tag_item"></td>
                            </tr>
                            <tr>
                                <td>Значение</td>
                                <td class="tag_value">
                                    <pre style="white-space: pre-wrap"></pre>
                                </td>
                            </tr>
                            <tr>
                                <td>Дата создания</td>
                                <td class="tag_cr_date"></td>
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