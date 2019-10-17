<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrdersQuantity $ordersQuantity
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $ordersQuantity->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ordersQuantity->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Orders Quantities'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Quantities'), ['controller' => 'Quantities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Quantity'), ['controller' => 'Quantities', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ordersQuantities form large-9 medium-8 columns content">
    <?= $this->Form->create($ordersQuantity) ?>
    <fieldset>
        <legend><?= __('Edit Orders Quantity') ?></legend>
        <?php
            echo $this->Form->control('order_id', ['options' => $orders]);
            echo $this->Form->control('quantity_id', ['options' => $quantities]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

