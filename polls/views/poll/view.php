<?php
use yii\helpers\Html;

$this->title = 'Результаты опроса "' . $poll->title . '"';
?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="well well-sm" id="vote-poll-results">
            <h3 class="text-center poll-title"><?= Html::encode($poll->title) ?></h3>

            <hr>

            <ul class="list-group">
                <?php foreach ($poll->pollOptions as $option): ?>
                    <li class="list-group-item<?= ($canViewPollResults && $option->people_count === $maxPeopleCount && $option->people_count !== 0) ? ' list-group-item-success' : '' ?>">
                        <span class="badge"><?= $canViewPollResults ? $option->people_count : '?' ?></span>
                        <span class="poll-option-name"><?= Html::encode($option->name) ?></span>
                    </li>
                <?php endforeach ?>
            </ul>

            <div class="poll-control">
                <?php if (Yii::$app->user->can('votePoll', ['pollVote' => $pollVote])): ?>
                    <?= Html::a('Перейти к голосованию', ['poll/vote', 'id' => $poll->id], ['class' => 'btn btn-sm btn-primary vote-btn']) ?>
                <?php else: ?>
                    <span class="btn btn-sm btn-primary disabled">Вы уже голосовали</span>
                <?php endif ?>

                <?php if (Yii::$app->user->can('changePollVisibility', ['poll' => $poll])): ?>
                    <?= Html::a($poll->is_results_visible ? 'Результаты видны всем' : 'Результаты видны только вам', ['poll/toggle-visibility', 'id' => $poll->id], ['class' => 'btn btn-sm btn-primary', 'data-method' => 'post']) ?>
                <?php endif ?>

                <?php if (Yii::$app->user->can('deletePoll', ['poll' => $poll])): ?>
                    <?= Html::a('Удалить', ['poll/delete', 'id' => $poll->id], ['class' => 'btn btn-sm btn-danger', 'data-method' => 'post', 'data-confirm' => 'Вы уверены, что хотите удалить этот опрос?']) ?>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>
