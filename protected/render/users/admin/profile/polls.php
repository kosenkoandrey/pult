<?
if ($data['polls']) {
    ?>
    <div role="tabpanel" class="tab-pane" id="tab-polls">
        <?
        foreach ($data['polls'] as $poll) {
            ?>
            <div class="pmb-block">
                <div class="pmbb-header">
                    <h2><i class="zmdi zmdi-check-all m-r-5"></i> <?= $poll['poll']['name'] ?></h2>
                </div>
            </div>
            <table class="table table-hover table-vmiddle">
                <tbody>
                    <?
                    foreach ($poll['answers'] as $answer) {
                        ?>
                        <tr>
                            <td style="width: 40%;"><?= $answer['question'] ?></td>
                            <td style="width: 40%;"><?= $answer['answer'] ?></td>
                            <td style="width: 20%;"><?= $answer['date'] ?></td>
                        </tr>
                        <?
                    }
                    ?>
                </tbody>
            </table>
            <?
        }
        ?>
    </div>
    <?
}