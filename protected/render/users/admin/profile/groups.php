<style>
    .groups-column-cr-date {
        width: 250px;
    }
</style>

<div role="tabpanel" class="tab-pane" id="tab-groups">
    <div class="pmb-block">
        <div class="pmbb-header">
            <h2><i class="zmdi zmdi-folder-person m-r-5"></i> Всего <?= count($data['groups']) ?> групп</h2>
        </div>
    </div>
    <table class="table table-hover table-vmiddle">
        <thead>
            <tr>
                <th>Группа</th>
                <th class="groups-column-cr-date">Дата</th>
            </tr>
        </thead>
        <tbody>
            <?
            foreach ($data['groups'] as $group) {
                ?>
                <tr>
                    <td>
                        <a href="<?= APP::Module('Routing')->root ?>admin/groups/users/<?= APP::Module('Crypt')->Encode($group['id']) ?>" target="_blank"><?= $group['name'] ?></a>
                    </td>
                    <td>
                        <?= $group['cr_date'] ?>
                    </td>
                </tr>
                <?
            }
            ?>
        </tbody>
    </table>
</div>