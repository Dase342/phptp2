<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quantity $quantity
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
      
        <li><?= $this->Form->postLink(__('Delete article'), ['action' => 'delete', $quantity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $quantity->id)]) ?> </li>
        <li><?= $this->Html->link(__('List article'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New article'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Menu Items'), ['controller' => 'MenuItems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Menu Item'), ['controller' => 'MenuItems', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="quantities view large-9 medium-8 columns content">
    <h3><?= h($quantity->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Menu Item') ?></th>
            <td><?= $quantity->has('menu_item') ? $this->Html->link($quantity->menu_item->menu_item_name, ['controller' => 'MenuItems', 'action' => 'view', $quantity->menu_item->id]) : '' ?></td>
        </tr>
        
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($quantity->quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($quantity->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($quantity->modified) ?></td>
        </tr>
    </table>
</div>
