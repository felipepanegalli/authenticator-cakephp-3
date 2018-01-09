<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $authUsers
 */
?>

<div class="authUsers index large-12 medium-12 columns content">
    <h3><?= __('Auth Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('locale_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('role_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($authUsers as $authUser): ?>
            <tr>
                <td><?= $this->Number->format($authUser->id) ?></td>
                <td><?= h($authUser->username) ?></td>
                <td><?= h($authUser->name) ?></td>
                <td><?= h($authUser->email) ?></td>
                <td><?= h($authUser->phone) ?></td>
                <td><?= $authUser->has('auth_locale') ? $this->Html->link($authUser->auth_locale->title, ['controller' => 'AuthLocales', 'action' => 'view', $authUser->auth_locale->id]) : '' ?></td>
                <td><?= $authUser->has('auth_role') ? $this->Html->link($authUser->auth_role->title, ['controller' => 'AuthRoles', 'action' => 'view', $authUser->auth_role->id]) : '' ?></td>
                <td><?= h($authUser->active) ?></td>
                <td><?= h($authUser->created) ?></td>
                <td><?= h($authUser->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $authUser->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $authUser->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $authUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $authUser->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
