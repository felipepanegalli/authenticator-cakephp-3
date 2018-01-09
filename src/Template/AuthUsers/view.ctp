<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $authUser
 */
?>

<div class="authUsers view large-12 medium-12 columns content">
    <h3><?= h($authUser->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($authUser->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($authUser->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($authUser->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($authUser->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($authUser->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Auth Locale') ?></th>
            <td><?= $authUser->has('auth_locale') ? $this->Html->link($authUser->auth_locale->title, ['controller' => 'AuthLocales', 'action' => 'view', $authUser->auth_locale->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Auth Role') ?></th>
            <td><?= $authUser->has('auth_role') ? $this->Html->link($authUser->auth_role->title, ['controller' => 'AuthRoles', 'action' => 'view', $authUser->auth_role->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($authUser->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($authUser->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($authUser->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $authUser->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
