<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Yii::$app->name?> | <?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Html::img(Yii::$app->params['logo'], ['width' => '125px']),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => '<span class="glyphicon glyphicon-home"></span> ' . Yii::t('app', 'Home'), 'url' => ['/site']],
        ['label' => '<span class="glyphicon glyphicon-tasks"></span> ' . Yii::t('app', 'Task'), 'url' => ['/task']],
        ['label' => '<span class="glyphicon glyphicon-flash"></span> ' . Yii::t('app', 'Accessories'), 'url' => ['/accessories']],
        ['label' => '<span class="glyphicon glyphicon-stats"></span> ' . Yii::t('app', 'Statistic'), 'url' => ['/statistic']],
    ];
    if (Yii::$app->user->isGuest) {
        $rightItems[] = ['label' => '<span class="glyphicon glyphicon-log-in"></span> ' . Yii::t('app', 'Login'), 'url' => ['/site/login']];
    } else {
        $rightItems[] = ['label' => '<span class="glyphicon glyphicon-user"></span> ' . Yii::t('app', 'User'), 'url' => ['/user/index']];
        $rightItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                '<span class="glyphicon glyphicon-log-out"></span> ' . Yii::t('app', 'Logout') . ' (' . Yii::$app->user->identity->name . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
        $currentLang = Yii::$app->language;
        $languages = Yii::$app->params['languages'];
        $listLang = '';
        foreach ($languages as $code => $name) {
            $url = Url::to(['language/set', 'language' => $code]);
            $listLang .= '<li><a onClick="window.location.href=\'' . $url . '\'" href="#"><img src="/backend/web/images/' . $code . '.png"> ' . Yii::t('app', $name) . '</a></li>';
        }
        $rightItems[] = '<li class="dropdown">'
            . '<a class="dropdown-toggle" data-toggle="dropdown" href="#"><img src="/backend/web/images/' . $currentLang . '.png"> ' . Yii::t('app', 'Language') 
            . ' <span class="caret"></span></a>'
            . '<ul class="dropdown-menu">'
            . $listLang
            . '</ul>'
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => $menuItems,
        'encodeLabels' => false,
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $rightItems,
        'encodeLabels' => false,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>
<?= $this->render('_js') ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
