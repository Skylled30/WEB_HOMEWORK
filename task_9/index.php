<?php
include_once "Graduate.php";
$student = new Graduate;
echo $student->name.'<br>';
echo $student->group.'<br>';
print_r ($student->diplom());
