<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;

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
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => Yii::$app->user->isGuest ? 'navbar-default' : 'navbar-inverse' . ' navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        // ['label' => Yii::t('app', 'Home'), 'url' => ['/site/index']],
        // ['label' => Yii::t('app', 'About'), 'url' => ['/site/about']],
        // ['label' => Yii::t('app', 'Contact'), 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        //$menuItems[] = ['label' => Yii::t('app', 'Signup'), 'url' => ['/site/signup']];
        $menuItems[] = ['label' => Yii::t('app', 'Login'), 'url' => ['/site/login']];
    } else {
        $menuItems[] = ['label' => Yii::t('app', 'Manage'), 'url' => ['/manager']];
        if(\common\components\Auth::isAdmin()) {
            $menuItems[] = ['label' => Yii::t('app', 'Dashboard'), 'url' => ['/admin']];  
        }   
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                Yii::t('app', 'Logout') . '(' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    $currentLang = Yii::$app->language;
    $languages = Yii::$app->params['languages'];
    $listLang = '';
    foreach ($languages as $code => $name) {
        $url = Url::to(['language/set', 'language' => $code]);
        $listLang .= '<li><a onClick="window.location.href=\'' . $url . '\'" href="#"><img src="/backend/web/images/' . $code . '.png"> ' . Yii::t('app', $name) . '</a></li>';
    }
    $menuItems[] = '<li class="dropdown">'
        . '<a class="dropdown-toggle" data-toggle="dropdown" href="#"><img src="/backend/web/images/' . $currentLang . '.png"> ' . Yii::t('app', 'Language') 
        . ' <span class="caret"></span></a>'
        . '<ul class="dropdown-menu">'
        . $listLang
        . '</ul>'
        . '</li>';
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
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

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
