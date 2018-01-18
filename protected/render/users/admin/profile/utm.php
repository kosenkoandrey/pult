<?
if ($data['utm']) {
    ?>
    <div role="tabpanel" class="tab-pane" id="tab-utm">
        <div class="pmb-block">
            <div class="pmbb-header">
                <h2><i class="zmdi zmdi-labels m-r-5"></i> Всего <?= count($data['utm'][1]) ?> первичных UTM-меток</h2>
            </div>
        </div>
        <table class="table table-hover table-vmiddle">
            <tbody>
                <?
                foreach ($data['utm'][1] as $label => $label_data) {
                    ?>
                    <tr>
                        <td style="width: 30%; font-size: 14px;"><?= $label ?></td>
                        <td style="width: 35%;font-size: 14px;"><?= $label_data[0] ?></td>
                        <td style="width: 35%;font-size: 14px;"><?= $label_data[1] ?></td>
                    </tr>
                    <?
                }
                ?>
            </tbody>
        </table>
        <?
        if (count($data['utm']) > 1) {
            foreach ($data['utm'] as $index => $item) {
                if ($index == 1) continue; 
                ?>
                <div class="pmb-block">
                    <div class="pmbb-header">
                        <h2>Серия #<?= $index ?></h2>
                    </div>
                </div>
                <table class="table table-hover table-vmiddle">
                    <tbody>
                        <?
                        foreach ($item as $label => $label_data) {
                            ?>
                            <tr>
                                <td style="width: 30%; font-size: 14px;"><?= $label ?></td>
                                <td style="width: 35%;font-size: 14px;"><?= $label_data[0] ?></td>
                                <td style="width: 35%;font-size: 14px;"><?= $label_data[1] ?></td>
                            </tr>
                            <?
                        }
                        ?>
                    </tbody>
                </table>
                <?
            }
        }
        ?>
    </div>
    <?
}