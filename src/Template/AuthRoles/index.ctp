<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $authRoles
 */
?>

<div class="authRoles index large-12 medium-12 columns content">
    <h3><?= __('Auth Roles') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($authRoles as $authRole): ?>
            <tr>
                <td><?= $this->Number->format($authRole->id) ?></td>
                <td><?= h($authRole->title) ?></td>
                <td><?= h($authRole->description) ?></td>
                <td><?= h($authRole->created) ?></td>
                <td><?= h($authRole->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $authRole->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $authRole->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $authRole->id], ['confirm' => __('Are you sure you want to delete # {0}?', $authRole->id)]) ?>
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
