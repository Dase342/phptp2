<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MenuItem $menuItem
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Menu Items'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Menus'), ['controller' => 'Menus', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Menu'), ['controller' => 'Menus', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Quantities'), ['controller' => 'Quantities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Quantity'), ['controller' => 'Quantities', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="menuItems form large-9 medium-8 columns content">
    <?= $this->Form->create($menuItem) ?>
    <fieldset>
        <legend><?= __('Add Menu Item') ?></legend>
        <?php
            echo $this->Form->control('menu_id', ['options' => $menus]);
            echo $this->Form->control('menu_item_name');
            echo $this->Form->control('menu_item_price');
            echo $this->Form->control('menu_item_description');
            echo $this->Form->control('other_details');
       
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
