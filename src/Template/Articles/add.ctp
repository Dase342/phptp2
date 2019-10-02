<!-- Fichier : src/Template/Articles/add.ctp -->

<h1>Ajouter une commande</h1>
<?php
    echo $this->Form->create($order);
    echo $this->Form->control('title');
    echo $this->Form->control('body', ['rows' => '3']);
    echo $this->Form->button(__('Sauvegarder la commande'));
    echo $this->Form->end();
?>