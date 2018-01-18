<style>
    .rating-column-rating {
        width: 110px;
    }

    .rating-column-rating-row {
        font-size: 22px;
    }

    .rating-column-rating-row .star {
        color: #ffa500;
    }

    .rating-column-object {
        width: 220px;
    }

    .rating-column-up-date {
        width: 150px;
    }

    .rating-column-comment {
        width: 400px;
    }

    .rating-column-object-row,
    .rating-column-comment-row {
        white-space: normal !important;
    }
</style>

<div role="tabpanel" class="tab-pane" id="tab-rating">
    <div class="pmb-block">
        <div class="pmbb-header">
            <h2><i class="zmdi zmdi-star m-r-5"></i> Всего <?= count($data['rating']) ?> оценок</h2>
        </div>
    </div>
    <table class="table table-hover table-vmiddle">
        <thead>
            <tr>
                <th class="rating-column-rating">Оценка</th>
                <th class="rating-column-object">Объект</th>
                <th class="rating-column-comment">Комментарий</th>
                <th class="rating-column-up-date">Дата</th>
            </tr>
        </thead>
        <tbody>
            <?
            foreach ($data['rating'] as $rating) {
                ?>
                <tr>
                    <td class="rating-column-rating-row">
                        <?
                        for ($i = 1; $i <= $rating['rating']; $i++) {
                            echo '<i class="zmdi zmdi-star star"></i>';
                        }

                        for ($i = ($rating['rating'] + 1); $i <= 5; $i++) {
                            echo '<i class="zmdi zmdi-star-outline"></i>';
                        }
                        ?>
                    </td>
                    <td class="rating-column-object-row">
                        <?
                        if ($rating['object_details']['id_hash']) {
                            switch($rating['item']) {
                                case 'mail': ?><a href="<?= APP::Module('Routing')->root ?>admin/mail/letters/preview/<?= $rating['object_details']['id_hash'] ?>" target="_blank" class="object"><?= $rating['object_details']['subject'] ?></a><? break;
                                default: echo $rating['item'] . '/' . $rating['object'];
                            }
                        } else {
                            echo 'Объект удален';
                        }
                        ?>
                    </td>
                    <td class="rating-column-comment-row">
                        <?= $rating['comment'] ?>
                    </td>
                    <td>
                        <?= $rating['up_date'] ?>
                    </td>
                </tr>
                <?
            }
            ?>
        </tbody>
    </table>
</div>