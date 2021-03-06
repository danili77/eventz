<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '<p><img src="/imagenes/logo.png" alt="Logo" title="Logo" width="30" class="logo" /> Eventz </p>',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    /*echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Inicio', 'url' => ['/site/index']],
            ['label' => 'Eventz', 'url' => ['/eventos/index']],
            ['label' => 'Contacto', 'url' => ['/site/contact']],
            ['label' => 'Registro', 'url' => ['/usuarios/create']],

            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->nombre . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            ),
        ],
    ]);*/

    $items = [
        ['label' => 'Inicio', 'url' => ['/site/index']],
        ['label' => 'Eventz', 'url' => ['/eventos/index']],
        ['label' => 'Contacto', 'url' => ['/site/contact']],
        Yii::$app->user->isGuest ?
        [
            'label' => 'Usuarios',
            'items' => [
                ['label' => 'Login', 'url' => ['/site/login']],
                '<li class="divider"></li>',
                ['label' => 'Registro', 'url' => ['usuarios/create']],
            ]
        ] :
        [
            'label' => 'Usuario (' . Html::encode(Yii::$app->user->identity->nombre) . ')',
            'items' => [
                [
                    'label' => 'Logout',
                    'url' => ['site/logout'],
                    'linkOptions' => ['data-method' => 'POST']
                ],
                '<li class="divider"></li>',
                ['label' => 'Mis datos', 'url' => ['/usuarios/view', 'id' => Html::encode(Yii::$app->user->id)]],
            ]
        ]
    ];

    if (Yii::$app->user->esAdmin) {
        end($items);
        $items[key($items)]['items'][] = [
            'label' => 'Gestión de usuarios',
            'url' => ['usuarios/index']
        ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right no-hover'],
        'items' => $items,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Eventz <?= date('Y') ?>/Dani L.I</p>
        <p class="pull-right"><button id="botonR">Player</button></p>


    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
