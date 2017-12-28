<div class="login large-6 medium-6 large-offset-3 medium-offset-3 columns content">
    <fieldset>
        <legend><h3><?= __('Sign in to Authenticator') ?></h3></legend>
        <?= $this->Form->create() ?>
        <?= $this->Form->Control('username') ?>
        <?= $this->Form->Control('password') ?>
        <?= $this->Form->Button(__('Login'), ["class" => "button expand"]) ?>
        <?= $this->Form->end ?>
    </fieldset>
</div>