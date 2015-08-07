Hello World
<?php foreach ($output as $row): ?>
<h1>ID: </h1>
<? echo $row->id; ?>
<h1>Title: </h1>
<? echo $row->title; ?>
<?php endforeach ?>
