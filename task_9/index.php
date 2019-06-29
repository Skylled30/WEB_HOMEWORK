<?php
include_once "graduate.php";
$student = new Graduate;
echo $student->name.'<br>';
echo $student->group.'<br>';
print_r ($student->diplom());
