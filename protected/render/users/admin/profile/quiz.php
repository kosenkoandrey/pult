<style>
    .quiz-column-correct {
        width: 80px;
    }
    .quiz-column-rating {
        width: 80px;
    }
    .quiz-column-cr-date {
        width: 250px;
    }
    
    .quiz-column-correct-row {
        font-size: 22px;
    }
    
    .quiz-column-question-text-row,
    .quiz-column-answer-text-row {
        white-space: normal !important;
    }
</style>

<div role="tabpanel" class="tab-pane" id="tab-quiz">
    <div class="pmb-block">
        <div class="pmbb-header">
            <h2><i class="zmdi zmdi-assignment-check m-r-5"></i> Всего <?= count($data['quiz']) ?> ответов</h2>
        </div>
    </div>
    <table class="table table-hover table-vmiddle">
        <thead>
            <tr>
                <th>Вопрос</th>
                <th>Ответ</th>
                <th class="quiz-column-correct">Правильный</th>
                <th class="quiz-column-rating">Баллы</th>
                <th class="quiz-column-cr-date">Дата</th>
            </tr>
        </thead>
        <tbody>
            <?
            foreach ($data['quiz'] as $quiz) {
                ?>
                <tr>
                    <td class="quiz-column-question-text-row">
                        <?= $quiz['question_text'] ?>
                    </td>
                    <td class="quiz-column-answer-text-row">
                        <?= $quiz['answer_text'] ?>
                    </td>
                    <td class="quiz-column-correct-row">
                        <?
                        switch($quiz['correct']) {
                            case '0': ?><i class="zmdi zmdi-square-o"></i><? break;
                            case '1': ?><i class="zmdi zmdi-check-square"></i><? break;
                        }
                        ?>
                    </td>
                    <td>
                        <?= $quiz['rating'] ?>
                    </td>
                    <td>
                        <?= $quiz['cr_date'] ?>
                    </td>
                </tr>
                <?
            }
            ?>
        </tbody>
    </table>
</div>