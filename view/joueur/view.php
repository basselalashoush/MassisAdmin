
<?php

 debug($joueur); 
if($joueur <> null) :?>
<ul>
    <?php  foreach($joueur as $k=>$v) :?>
    <li><?= ucfirst($k) .' => '. $v; ?> </li>
</ul>
    <?php endforeach; ?>
<?php endif ; ?>