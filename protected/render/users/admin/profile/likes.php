<?
if ($data['likes']) {
    ?>
    <div role="tabpanel" class="tab-pane" id="tab-likes">
        <?
        foreach ($data['likes'] as $like) {
            ?>
            <div class="media p-t-10 p-l-25 p-r-25">
                <div class="pull-left">
                    <a href="<?= $like['url'] ?>" target="_blank" class="btn btn-default btn-icon waves-effect waves-circle waves-float"><i class="zmdi zmdi-favorite"></i></a>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">
                        <p class="m-b-5 f-12 c-gray"><i class="zmdi zmdi-calendar"></i> <?= date('Y-m-d H:i:s', $like['up_date']) ?></p>
                    </h4>
                    <p><a href="<?= $like['url'] ?>" target="_blank" class="btn palette-Teal bg waves-effect btn-xs"><i class="zmdi zmdi-open-in-new"></i> Перейти</a></p>
                </div>
            </div>
            <?
        }
        ?>
    </div>
    <?
}