<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MenuItem $menuItem
 */


?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Menu Item'), ['action' => 'edit', $menuItem->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Menu Item'), ['action' => 'delete', $menuItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $menuItem->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Menu Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Menu Item'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Menus'), ['controller' => 'Menus', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Menu'), ['controller' => 'Menus', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Quantities'), ['controller' => 'Quantities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Quantity'), ['controller' => 'Quantities', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="menuItems view large-9 medium-8 columns content">
    <h3><?= h($menuItem->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Menu') ?></th>
            <td><?= $menuItem->has('menu') ? $this->Html->link($menuItem->menu->menu_name, ['controller' => 'Menus', 'action' => 'view', $menuItem->menu->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Menu Item Name') ?></th>
            <td><?= h($menuItem->menu_item_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($menuItem->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Menu Item Price') ?></th>
            <td><?= $this->Number->format($menuItem->menu_item_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($menuItem->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($menuItem->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td><?= $this->Html->image($menuItem->file->name, ['alt' => 'food', 'width'=>'100px', 'heigth'=>'100px']) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Menu Item Description') ?></h4>
        <?= $this->Text->autoParagraph(h($menuItem->menu_item_description)); ?>
    </div>
    <div class="row">
        <h4><?= __('Other Details') ?></h4>
        <?= $this->Text->autoParagraph(h($menuItem->other_details)); ?>
    </div>
   
</div>
