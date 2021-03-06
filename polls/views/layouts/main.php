<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

    <header id="header">
        <?php
            NavBar::begin([
                'brandLabel' => Yii::$app->name,
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-static-top',
                ],
            ]);

            $navItems = [
                ['label' => 'Обратная связь', 'url' => ['/site/contact']],
                ['label' => 'О сайте', 'url' => ['/site/about']]
            ];

            if (Yii::$app->user->isGuest) {
                $navItems[] = ['label' => 'Регистрация', 'url' => ['/site/signup']];
                $navItems[] = ['label' => 'Вход', 'url' => ['/site/login']];
            } else {
                if (Yii::$app->user->can('viewAdminPanel')) {
                    $navItems[] = ['label' => 'Администрирование', 'url' => ['/admin/index'], 'active' => Yii::$app->controller->id === 'admin'];
                }

                $navItems[] = [
                    'label' => Yii::$app->user->identity->email,
                    'items' => [
                        ['label' => 'Изменить профиль', 'url' => ['/user/profile']],
                        ['label' => 'Выход', 'url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post']]
                    ]
                ];
            }

            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'activateParents' => true,
                'items' => $navItems
            ]);
            NavBar::end();
        ?>
    </header>

    <div class="container">
        <?= $content ?>
    </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
