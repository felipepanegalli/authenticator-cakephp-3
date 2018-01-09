<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $authUser
 */
?>

<div class="authUsers form large-12 medium-12 columns content">
    <?= $this->Form->create($authUser) ?>
    <fieldset>
        <legend><?= __('Edit Auth User') ?></legend>
        <?php
            echo $this->Form->control('username');
            echo $this->Form->control('password');
            echo $this->Form->control('name');
            echo $this->Form->control('email');
            echo $this->Form->control('phone');
            echo $this->Form->control('locale_id', ['options' => $authLocales]);
            echo $this->Form->control('role_id', ['options' => $authRoles]);
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
