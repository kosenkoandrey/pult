<style>
    .product-column-id {
        width: 100px;
    }
    
    .product-column-amount,
    .product-column-pay
    .product-column-invoice,
    .product-column-cr-date {
        width: 200px;
    }
    
    .product-column-name-row {
        white-space: normal !important;
    }
</style>
<div role="tabpanel" class="tab-pane" id="tab-products">
    <ul class="tab-nav" data-tab-color="teal">
        <li class="active waves-effect"><a href="#tab-products-invoices" aria-controls="tab-products-invoices" role="tab" data-toggle="tab">Привязанные</a></li>
        <li class="waves-effect"><a href="#tab-products-available" aria-controls="tab-products-available" role="tab" data-toggle="tab">Доступные</a></li>
    </ul>
    <div class="tab-content" style="padding: 0;">
        <div role="tabpanel" class="tab-pane active" id="tab-products-invoices">
            <?
            if (count($data['products']['invoices'])) {
                ?>
                <table class="table table-hover table-vmiddle">
                    <thead>
                        <tr>
                            <th class="product-column-id">ID</th>
                            <th>Продукт</th>
                            <th class="product-column-amount">Цена</th>
                            <th class="product-column-pay">Оплачен</th>
                            <th class="product-column-invoice">Счет</th>
                            <th class="product-column-cr-date">Дата</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?
                        foreach ($data['products']['invoices'] as $product_id => $product) {
                            ?>
                            <tr>
                                <td>
                                    <?= $product_id ?>
                                </td>
                                <td class="product-column-name-row">
                                    <?= $product['name'] ?>
                                </td>
                                <td>
                                    <?= $product['amount'] ? $product['amount'] : 'открытие доступа' ?>
                                </td>
                                <td>
                                    <?
                                    switch ($product['state']) {
                                        case 'success': echo 'Да'; break;
                                        default: echo 'Нет'; break;
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="<?= APP::Module('Routing')->root ?>admin/billing/invoices/details/<?= $product['invoice'] ?>" target="_blank"><?= $product['invoice'] ?></a>
                                </td>
                                <td>
                                    <?= $product['cr_date'] ?>
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
                <div class="alert alert-warning" role="alert" style="margin: 15px">Нет продуктов</div>
                <?
            }
            ?>
        </div>
        <div role="tabpanel" class="tab-pane" id="tab-products-available">
            <?
            if (count($data['products']['available'])) {
                ?>
                <table class="table table-hover table-vmiddle">
                    <thead>
                        <tr>
                            <th class="product-column-id">ID</th>
                            <th>Продукт</th>
                            <th class="product-column-amount">Цена</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?
                        foreach ($data['products']['available'] as $product) {
                            ?>
                            <tr>
                                <td>
                                    <?= $product['id'] ?>
                                </td>
                                <td class="product-column-name-row">
                                    <?= $product['name'] ?>
                                </td>
                                <td>
                                    <?= $product['amount'] ?>
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
                <div class="alert alert-warning" role="alert" style="margin: 15px">Нет продуктов</div>
                <?
            }
            ?>
        </div>
    </div>
</div>