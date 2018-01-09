<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $authRole
 */
?>

<div class="authRoles form large-12 medium-12 columns content">
    <?= $this->Form->create($authRole) ?>
    <fieldset>
        <legend><?= __('Edit Auth Role') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
