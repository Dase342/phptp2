<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrdersQuantity $ordersQuantity
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
    
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List articles'), ['controller' => 'Quantities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Add article'), ['controller' => 'Quantities', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ordersQuantities form large-9 medium-8 columns content">
    <?= $this->Form->create($ordersQuantity) ?>
    <fieldset>
        <legend><?= __('Add Orders Quantity') ?></legend>
        <?php
        
            echo $this->Form->control('order_id', ['default' => $orders->last()]);
            echo $this->Form->control('quantity_id', ['default' => $quantities->last()]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Confirm')) ?>
    <?= $this->Form->end() ?>
</div>
