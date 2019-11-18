<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order[]|\Cake\Collection\CollectionInterface $orders
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        
        <li><?= $this->Html->link(__('New order'), ['action' => 'add']) ?></li>
        
        <li><?= $this->Html->link(__('View last order'), ['action' => 'viewLast']) ?></li>
    </ul>
</nav>
<div class="orders index large-9 medium-8 columns content">
    <h3><?= __('Orders') ?></h3>
    <p><?= __('An order must be created first to add an article')?></p>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('order id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order): ?>

           <?php
     
                
                echo "<tr>";
                echo "<td>".$this->Number->format($order->id)."</td>";
                echo "<td>". h($order->created). "</td>";
                echo "<td> ". h($order->modified). "</td>";
                echo "<td class=\"actions\">";
                echo     $this->Html->link(__('View'), ['action' => 'view', $order->id]). " " ;
                echo $this->Html->link('(pdf)', ['action' => 'view', $order->id . '.pdf']);
                echo     $this->Html->link(__('Edit'), ['action' => 'edit', $order->id]). " " ;
                echo     $this->Form->postLink(__('Delete'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id)]); 
                echo "</td>";
                echo"<tr>";
            
                
            ?> 
            
            
            
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
