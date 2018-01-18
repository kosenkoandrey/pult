<form method="post" id="free-text">
    Пожалуйста, напишите какая тема по имиджу и стилю для вас наиболее интересная
    <br><br>
    <textarea class="form-control" name="free-text" placeholder="Напишите Ваш ответ"></textarea>
    <br>
    <button type="submit" class="btn palette-Deep-Orange bg waves-effect btn-lg m-t-25">Отправить</button>
</form>

<style>
    #free-text {
        <?
        if (isset($data['style'])) {
            foreach ($data['style'] as $key => $value) {
                echo $key . ':' . $value . ';';
            }
        }
        ?>
    }
</style>