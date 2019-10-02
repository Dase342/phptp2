<!-- File: src/Template/Articles/index.ctp  (delete links added) -->

<h1>Articles</h1>
<p><?= $this->Html->link("Add Order", ['action' => 'add']) ?></p>
<table>
    <tr>
        <th>Title</th>
        <th>Created</th>
        <th>Action</th>
    </tr>

    <!-- Here's where we iterate through our $articles query object, printing out article info -->

    <?php foreach ($orders as $order): ?>
        <tr>
            <td>
                <?= $this->Html->link($order->id, ['action' => 'view', $order->slug]) ?>
            </td>
            <td>
                <?= $order->created->format(DATE_RFC850) ?>
            </td>
            <td>
                <?= $this->Html->link('Edit', ['action' => 'edit', $order->slug]) ?>
                <?=
                $this->Form->postLink(
                        'Delete',
                        ['action' => 'delete', $order->slug],
                        ['confirm' => 'Are you sure?'])
                ?>
            </td>
        </tr>
<?php endforeach; ?>

</table>