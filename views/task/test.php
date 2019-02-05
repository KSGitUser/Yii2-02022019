<h1><?=$title?></h1>
<p><?=$content?></p>
<p><?=$creationDate?></p>
<?php foreach ($participants as $key => $value): ?>
  <p> Имя участника: <strong><?=$value['name']?></strong>, email участника 
  <strong><?=$value['email']?></strong> </p>
<?php endforeach ?>