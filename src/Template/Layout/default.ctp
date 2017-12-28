<?php

$cakeDescription = 'Plugin de Autenticação - Desenvolvido por Felipe Panegalli';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href=""><?= $this->fetch('title') ?></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
                <li><a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'logout']) ?>"><?= __('Logout') ?></a></li>
            </ul>
            <ul class="menu">
                <li><a href="#"><?= __('IDIOMAS >>') ?></a></li>
                <li><a href="<?= $this->Url->build(['controller' => 'locales', 'action' => 'changeLanguage', 'pt_BR']) ?>">BR</a></li>
                <li><a href="<?= $this->Url->build(['controller' => 'locales', 'action' => 'changeLanguage', 'en_US']) ?>">EN</a></li>
                <li><a href="<?= $this->Url->build(['controller' => 'locales', 'action' => 'changeLanguage', 'es']) ?>">ES</a></li>
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
