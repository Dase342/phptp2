<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quantity $quantity
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $quantity->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $quantity->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Quantities'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Menu Items'), ['controller' => 'MenuItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Menu Item'), ['controller' => 'MenuItems', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="quantities form large-9 medium-8 columns content">
    <?= $this->Form->create($quantity) ?>
    <fieldset>
        <legend><?= __('Edit Quantity') ?></legend>
        <?php
            echo $this->Form->control('menu_item_id', ['options' => $menuItems]);
            echo $this->Form->control('quantity');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
