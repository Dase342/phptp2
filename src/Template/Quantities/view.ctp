<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quantity $quantity
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Quantity'), ['action' => 'edit', $quantity->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Quantity'), ['action' => 'delete', $quantity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $quantity->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Quantities'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Quantity'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Menu Items'), ['controller' => 'MenuItems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Menu Item'), ['controller' => 'MenuItems', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="quantities view large-9 medium-8 columns content">
    <h3><?= h($quantity->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($quantity->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Menu Items Id') ?></th>
            <td><?= $this->Number->format($quantity->menu_items_id) ?></td>
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
    <div class="related">
        <h4><?= __('Related Menu Items') ?></h4>
        <?php if (!empty($quantity->menu_items)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Menu Id') ?></th>
                <th scope="col"><?= __('Menu Item Name') ?></th>
                <th scope="col"><?= __('Menu Item Price') ?></th>
                <th scope="col"><?= __('Menu Item Description') ?></th>
                <th scope="col"><?= __('Other Details') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($quantity->menu_items as $menuItems): ?>
            <tr>
                <td><?= h($menuItems->id) ?></td>
                <td><?= h($menuItems->menu_id) ?></td>
                <td><?= h($menuItems->menu_item_name) ?></td>
                <td><?= h($menuItems->menu_item_price) ?></td>
                <td><?= h($menuItems->menu_item_description) ?></td>
                <td><?= h($menuItems->other_details) ?></td>
                <td><?= h($menuItems->created) ?></td>
                <td><?= h($menuItems->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'MenuItems', 'action' => 'view', $menuItems->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'MenuItems', 'action' => 'edit', $menuItems->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'MenuItems', 'action' => 'delete', $menuItems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $menuItems->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
