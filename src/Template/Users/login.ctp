<?php?>

<h1>Login</h1>
<p style="color:red;" > To use this application, you must be logged in as a customer </p>
<?= $this->Form->create() ?>
<?= $this->Form->control('username') ?>
<?= $this->Form->control('password') ?>
<?= $this->Form->button('Login') ?>
<?= $this->Form->end() ?>
