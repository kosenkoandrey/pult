<?
if ($data['premium']) {
    ?>
    <div role="tabpanel" class="tab-pane" id="tab-premium">
        <div class="pmb-block">
            <div class="pmbb-header">
                <h2><i class="zmdi zmdi-lock-open m-r-5"></i> У вас есть доступ к следующим материалам</h2>
            </div>
        </div>
        <table class="table table-hover table-vmiddle">
            <tbody>
                <?
                foreach ($data['premium'] as $item) {
                    switch ($item['type']) {
                        case 'g':
                            ?>
                            <tr>
                                <td style="font-size: 16px"><span style="display: inline-block" class="avatar-char palette-Teal bg m-r-5"><i class="zmdi zmdi-folder"></i></span> <a style="color: #4C4C4C" href="<?= APP::Module('Routing')->root ?>admin/members/pages/<?= APP::Module('Crypt')->Encode($item['id']) ?>" target="_blank"><?= $item['title'] ?></a></td>
                            </tr>
                            <?
                            break;
                        case 'p':
                            ?>
                            <tr>
                                <td style="font-size: 16px;"><span style="display: inline-block" class="avatar-char palette-Orange-400 bg m-r-5"><i class="zmdi zmdi-file"></i></span> <a style="color: #4C4C4C" href="<?= APP::Module('Routing')->root ?>admin/members/page/<?= APP::Module('Crypt')->Encode($item['id']) ?>" target="_blank"><?= $item['title'] ?></a></td>
                            </tr>
                            <?
                            break;
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    <?
}