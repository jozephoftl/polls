<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\PollVoteCheckbox;

$this->title = 'Опрос "' . $pollVote->title . '""';
?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="well well-sm">
            <h1 class="text-center"><?= Html::encode($pollVote->title) ?></h1>

            <hr>

            <?php $form = ActiveForm::begin(['id' => 'vote-poll']) ?>

                <?php if ($pollVote instanceof PollVoteCheckbox): ?>
                    <?= $form->field($pollVote, 'voteResults')->checkboxList($pollVote->formattedOptions, ['item' => function ($index, $label, $name, $checked, $value) {
                        return '<div class="checkbox">' . Html::checkbox($name, $checked, ['label' => Html::encode($label), 'value' => $value]) . '</div>';
                    }])->label(false) ?>
                <?php else: ?>
                    <?= $form->field($pollVote, 'voteResults')->radioList($pollVote->formattedOptions, ['item' => function ($index, $label, $name, $checked, $value) {
                        return '<div class="radio">' . Html::radio($name, $checked, ['label' => Html::encode($label), 'value' => $value]) . '</div>';
                    }])->label(false) ?>
                <?php endif ?>

                <div class="form-group">
                    <?= Html::submitButton('Проголосовать', ['class' => 'btn btn-sm btn-success']) ?>
                    <?= Html::a('Перейти к результатам', ['poll/view', 'id' => $pollVote->id], ['class' => 'btn btn-sm btn-primary']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
