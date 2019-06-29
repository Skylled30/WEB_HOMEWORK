<?php
class Student
{   
  public $web_marks=
  [
    5,4,4,5,4,3,5,
  ];  
  public $math_marks=
  [
    5,5,5,4,4,5,4,
  ];
  public $multi_marks=
  [
    5,5,5,5,4,5,5,
  ];
  public $usability_marks=
  [
    4,4,5,5,5,5,5,
  ];

  public $group='ПИ 14221';
  public $name="Иван Иванов";
  public $array_marks=[];

  public function get_avg($marks){
    $sum=0;
    foreach ($marks as $m)
    {
      $sum+=$m;
    }
    return $sum/count($marks);
  }

  public function get_diploma(){
    $this->array_marks["Основы веб программирования"]=$this->get_avg($this->web_marks).'<br>';
    $this->array_marks["Юзабилити"]=$this->get_avg($this->usability_marks).'<br>';
    $this->array_marks["Мультимедия"]=$this->get_avg($this->multi_marks).'<br>';
    $this->array_marks["Математический анализ"]=$this->get_avg($this->math_marks).'<br>'; 
    return $this->array_marks;
  }
}