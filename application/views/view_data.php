<ul>
<?php foreach ($values as $result):?>
<li>
<?php //echo $result->last_name.', '.$result->first_name

  echo $result->id.' - '.$result->last_name;
 ?>
</li>
<?php endforeach ?>
</ul>
