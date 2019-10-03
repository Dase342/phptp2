<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Menu $menu
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Menu'), ['action' => 'edit', $menu->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Menu'), ['action' => 'delete', $menu->id], ['confirm' => __('Are you sure you want to delete # {0}?', $menu->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Menus'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Menu'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Menu Items'), ['controller' => 'MenuItems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Menu Item'), ['controller' => 'MenuItems', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="menus view large-9 medium-8 columns content">
    <h3><?= h($menu->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Menu Name') ?></th>
            <td><?= h($menu->menu_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($menu->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($menu->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($menu->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Menu Description') ?></h4>
        <?= $this->Text->autoParagraph(h($menu->menu_description)); ?>
    </div>
    <div class="row">
        <h4><?= __('Other Details') ?></h4>
        <?= $this->Text->autoParagraph(h($menu->other_details)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Menu Items') ?></h4>
        <?php if (!empty($menu->menu_items)): ?>
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
            <?php foreach ($menu->menu_items as $menuItems): ?>
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
