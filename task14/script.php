<?php
include 'index.php';
include 'formclass.php';

$formclass = new formclass;
$formclass->data_insert();
$formclass->save();
$formclass->db_save();


