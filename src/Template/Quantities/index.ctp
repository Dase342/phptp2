<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quantity[]|\Cake\Collection\CollectionInterface $quantities
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Add article'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Menu Items'), ['controller' => 'MenuItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Menu Item'), ['controller' => 'MenuItems', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="quantities index large-9 medium-8 columns content">
    <h3><?= __('Quantities') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                
                <th scope="col"><?= $this->Paginator->sort('menu_item_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($quantities as $quantity): ?>
            <tr>
              
                <td><?= $quantity->has('menu_item') ? $this->Html->link($quantity->menu_item->menu_item_name, ['controller' => 'MenuItems', 'action' => 'view', $quantity->menu_item->id]) : '' ?></td>
                <td><?= $this->Number->format($quantity->quantity) ?></td>
                <td><?= h($quantity->created) ?></td>
                <td><?= h($quantity->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $quantity->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $quantity->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $quantity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $quantity->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
