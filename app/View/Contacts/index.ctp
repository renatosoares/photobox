<!-- View: Views/Contacts/index.ctp -->

<?php 
$main = 'contact';
$title = 'quick contact';
?>
<div style="border-bottom: solid 1px #ccc;">
    <h1 style="position:relative; float:left;"><?php echo $main; ?></h1>
    <h2 style="position:relative;float:left;margin-top:15px; color: #869c38">&nbsp; &bull;&nbsp; <?php echo $title;?></h2>
    <br><br>&nbsp; &nbsp;
</div>
<div class="clear"><br></div>
<div id="interior-page">
    <?php

    $this->Form->create('Contact', array('action' => 'index'));
    echo $this->Form->input('name', array('default' => 'name (required)', 'onfocus' => 'clearDefault(this)'));
    echo $this->Form->input('email', array('default' => 'email (required)', 'onfocus' => 'clearDefault(this)'));
    echo $this->Form->input('message', array('default' => 'message', 'onfocus' => 'clearDefault(this)'));
    echo $this->Form->submit();
    echo $this->Form->end();
    ?>
</div>
