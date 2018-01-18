<script>
    var tunnels = <?= json_encode($data['tunnels']) ?>;
</script>

Я могу рассказать много тем по имиджу. Но мне важно, чтобы эти темы были интересны и полезны прежде всего вам.
<br>
Поэтому выберите в списке ниже, что вам интереснее всего в данный момент:
<hr>
<form method="post" id="subscribe">
    <?
    foreach ($data['tunnels'] as $tunnel_id => $tunnel) {
        ?>
        <div class="radio m-b-15">
            <label>
                <input type="radio" name="tunnel" value="<?= $tunnel_id ?>">
                <i class="input-helper"></i>
                <?= $tunnel['name'] ?>
            </label>
        </div>
        <?
    }
    
    if (count($data['tunnels']) === 1) {
        ?>
        <div class="radio m-b-15">
            <label>
                <input type="radio" name="tunnel" value="0">
                <i class="input-helper"></i>
                свой вариант
            </label>
        </div>
        <?
    }
    ?>
</form>
<?
if (count($data['tunnels']) === 1) {
    APP::Render(
        'tunnels/next/free', 
        'include', 
        [
            'style' => [
                'display' => 'none'
            ]
        ]
    );
}
?>