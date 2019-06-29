<?php
include_once "Student.php";
class Graduate extends Student {
    protected $semestr=[];
    protected function get_prev_marks()
  {

  $this->semestr=
  [
    "Английский язык"=>4.5.'<br>',
    "Физическая культура"=>'зачет'.'<br>',
    "Русский язык"=>'зачет'.'<br>',
  ];

  }
  public function diplom(){
    $this->get_diploma();
    $this->get_prev_marks();
    foreach ($this->semestr as $s=>$value)
    $this->array_marks[$s]=$value;
    return $this->array_marks;
  }
}