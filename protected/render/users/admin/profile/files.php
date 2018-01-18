<style>
    .files-column-cr-date {
        width: 170px;
    }
    
    .files-column-ip {
        width: 120px;
    }
</style>
<?
if ($data['files']) {
    ?>
    <div role="tabpanel" class="tab-pane" id="tab-files">
        <div class="pmb-block">
            <div class="pmbb-header">
                <h2><i class="zmdi zmdi-download m-r-5"></i> Всего <?= count($data['files']) ?> закачек</h2>
            </div>
        </div>
        <table class="table table-hover table-vmiddle">
            <tbody>
                <?
                foreach ($data['files'] as $item) {
                    $file_color = '929292';
                                                    
                    if (count($item['protection_log'])) {
                        $file_color = '4CAF50';
                    }
                    ?>
                    <tr>
                        <td style="width: 60px;">
                            <span style="display: inline-block" class="avatar-char palette-Orange-400 bg"><i class="zmdi zmdi-download"></i></span>
                        </td>
                        <td style="font-size: 16px;">
                            <a class="files" data-id="<?= $item['id'] ?>" style="color: #4C4C4C" href="javascript:void(0)"><?= $item['basename'] ?></a>
                            <div style="font-size: 11px;"><?= $item['type'] ?> &middot; <?= $item['protection'] ?></div>
                        </td>
                        <td style="width: 60px;">
                            <span class="badge" style="background: #<?= $file_color ?>"><i class="zmdi zmdi-eye m-r-5"></i><?= count($item['protection_log']) ?></span>
                        </td>
                        <td style="width: 160px;">
                            <?= $item['ip'] ?>
                        </td>
                        <td style="width: 200px;">
                            <?= $item['cr_date'] ?>
                        </td>
                    </tr>
                    <?
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="files-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Открытия файла связанные с закачкой</h4>
                </div>
                <div class="details">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="files-column-cr-date">Дата</th>
                                <th class="files-column-ip">IP</th>
                                <th>Страна</th>
                                <th>Регион</th>
                                <th>Город</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
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