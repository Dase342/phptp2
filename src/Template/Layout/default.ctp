<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
	<?= $this->Flash->render() ?>
	
</head>
<body>
        <nav class="top-bar expanded" data-topbar role="navigation">
            <ul class="title-area large-3 medium-4 columns">
                <li class="name">
                    <h1><a href=""><?= $this->fetch('title') ?></a></h1>
                </li>
            </ul>
            <div class="top-bar-section">
                <ul class="right">
                    
                        <?php
                        $loguser = $this->request->session()->read('Auth.User');
                        if ($loguser) {
                            $user = $loguser['username'];
                            echo "<li>";
                            echo $this->Html->link($user, ['controller' => 'Users', 'action' => 'view', $loguser['id']]);
                            echo "</li>";
                            echo "<li>";
                            echo $this->Html->link(__('Logout'), ['controller' => 'Users', 'action' => 'logout']);
                            echo "</li>";
                        } else {
                            echo "<li>";
                            echo $this->Html->link(__('Create account'), ['controller' => 'Users', 'action' => 'add']);
                            echo "</li>";
                            echo "<li>";
                            echo $this->Html->link(__('Login'), ['controller' => 'Users', 'action' => 'login']);
                            echo "</li>";
                        }
                        ?>
                         <li>
                        <?php echo $this->Html->link('Français', ['action' => 'changeLang', 'fr_CA'], ['escape' => false]) ?>
                        </li>
                        <li>
                        <?php echo $this->Html->link('English', ['action' => 'changeLang', 'en_US'], ['escape' => false]) ?>
                        </li>
                        <li>
                        <?php echo $this->Html->link('русский', ['action' => 'changeLang', 'ru_RU'], ['escape' => false]) ?>
                        </li>
                        <li>
                        <?php echo $this->Html->link(__('About'),array('controller'=>'pages','action'=>'display','about')) ?>
                        </li>
                        <li>
                        <?php echo $this->Html->link(__('Home'),array('controller'=>'orders','action'=>'index')) ?>
                        </li>
                    
  
                </ul>
            </div>
        </nav>
        <?= $this->Flash->render() ?>
        <div class="container clearfix">
            <?= $this->fetch('content') ?>
        </div>
        <footer>
		<?= $this->fetch('scriptLibraries') ?>
        <?= $this->fetch('script'); ?>
        <?= $this->fetch('scriptBottom') ?> 
        </footer>
    </body>
</html>
