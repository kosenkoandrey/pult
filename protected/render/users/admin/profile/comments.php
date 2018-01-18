<?
if ($data['comments']) {
    ?>
    <div role="tabpanel" class="tab-pane" id="tab-comments">
        <?
        foreach ($data['comments'] as $comment) {
            ?>
            <div class="media p-t-10 p-l-25 p-r-25">
                <div class="pull-left">
                    <a href="<?= $comment['url'] ?>#comment-<?= APP::Module('Crypt')->Encode($comment['id']) ?>" target="_blank" class="btn btn-default btn-icon waves-effect waves-circle waves-float"><i class="zmdi zmdi-comment-text"></i></a>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">
                        <p class="m-b-5 f-12 c-gray"><i class="zmdi zmdi-calendar"></i> <?= date('Y-m-d H:i:s', $comment['up_date']) ?></p>
                    </h4>
                    <p style="white-space: pre-wrap" class="m-b-10"><?= $comment['message'] ?></p>
                    <p><a href="<?= $comment['url'] ?>#comment-<?= APP::Module('Crypt')->Encode($comment['id']) ?>" target="_blank" class="btn palette-Teal bg waves-effect btn-xs"><i class="zmdi zmdi-open-in-new"></i> Перейти</a></p>
                </div>
            </div>
            <?
        }
        ?>
    </div>
    <?
}