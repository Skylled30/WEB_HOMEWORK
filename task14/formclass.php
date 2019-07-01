<?php
include "flash.php";

class formclass{
    public $fname;
    public $sname; 
    public $email;
    public $phone;
    public $topic;
    public $payment;
    public $getMail;
    public $errors = [];
    protected $_pdo;
    public $table='participants';

    public $topic_list = [
    1 => 'Бизнес_и_коммуникации',
    2 => 'Технологии',
    3 => 'Реклама',
  ];
   public $payment_list = [
    1 => 'WebMoney',
    2 => 'Яндекс.Деньги',
    3 => 'PayPal',
    4 => 'Кредитная_карта',
  ];

    public function data_insert(){
        if(!empty($_POST)){
            $this->fname = isset($_POST['fname']) ? trim($_POST['fname']) : null;
            $this->sname = isset($_POST['sname']) ? trim($_POST['sname']) : null;
            $this->email = isset($_POST['email']) ? trim($_POST['email']) : null;
            $this->phone = isset($_POST['phone']) ? trim($_POST['phone']) : null;
            $this->topic = isset($_POST['topic']) ? trim($_POST['topic']) : null;
            $this->payment = isset($_POST['payment']) ? trim($_POST['payment']) : null;
            $this->getMail = isset($_POST['getMail']) ? 1 : 0;
        }
    }

    public function validate(){
        if (!empty($_POST)){

            if(empty($_POST['fname'])){
                $this->errors['fname']='Введите имя!';
                echo $this->errors['fname']."<br>";
            } elseif (preg_match("/^[А-Я][а-я]+$/u", $this->fname) == 0) {
                $this->errors['reg_fname']='Не корректно введено имя';
                echo $this->errors['reg_fname'].'<br>';
            }
            if(empty($_POST['sname'])){
                $this->$errors['sname']='Введите фамилию!';
                echo $this->errors['sname']."<br>";
            } elseif (preg_match("/^[А-Я][а-я]+$/u", $this->sname) == 0) {
                $this->errors['reg_sname']='Не корректно введена фамилия';
                echo $this->errors['reg_sname'].'<br>';
            } 
            if(empty($_POST['email'])){
                $this->$errors['email']='Введите email!';
                echo $this->errors['email']."<br>";
            } elseif (preg_match("/^[a-zA-Zа-яА-Я0-9]+\@[a-z]+\.[a-zа-я]+$/u", $this->email) == 0) {
                $this->errors['reg_email']='Не корректно введен email';
                echo $this->errors['reg_email'].'<br>';
            }
            if (empty($this->phone))
            {
                $this->errors['phone'] = 'Не введен телефон';
                echo $this->errors['phone']."<br>";
            }
            elseif(!preg_match("/^8\d{10}$/",$this->phone)){
                $this->errors['reg_phone']='Не корректно введен телефон';
                echo $this->errors['reg_phone'].'<br>';
            }
        }
        return empty($this->errors);
    }

    public function save(){
        if($this->validate()){
            $dir = "logs"; 
            if(!is_dir($dir)) { 
                mkdir($dir, 0777, true); 
            }
            $put_data = fopen('logs/form1.txt', 'a+');
            $file="logs/form1.txt";
            $i=sizeof(file($file));
            $i+=1;
            $contents = $i.")".$this->fname."|".$this->sname."|".$this->email."|".$this->phone."|".$this->topic."|".$this->payment."|".date('Y-m-d-H-i-s')."|".$this->getMail."|".$_SERVER['REMOTE_ADDR']."|1";
            $cont=$contents.PHP_EOL;
            fwrite($put_data, $cont);
            fclose($put_data);
            #header('Location: form1.php');

        }
    }

    public function data_read(){
        $output_list_fies = '';
        $prefix_path = "logs/";
        #$filelist = glob($prefix_path . '*');
        $i = 0;
        $fp = fopen($prefix_path . "/form1.txt", "r");
        if($fp){
                while (!feof($fp)){
                    $str = fgets($fp, 999);
                    if(substr($str,-3,1)==1){
                        $str1=substr($str,0,-3);
                        $output_list_fies .= "<input type='checkbox' name='f[]' value=".$str.">" . $str1 . " <br>";
                    }
                }
            } else {
                echo "Ошибка при открытии файла";
            }
            echo $output_list_fies; 
    }

    public function data_del(){
        if(empty($_POST['f'])){ 
            echo "<h2>Вы ничего не выбрали</h2>";
        } 
        else{
            echo "<h2>Данные файлы были успешно отмечены как удалённые</h2>";
            $file=file("logs/form1.txt");
            $af=$_POST['f'];
            $n=count($af);
            for($i=0;$i<$n;$i++){
            if(substr($af[$i],-1)==1){
                for($j=0;$j<sizeof($file);$j++){
                    if(substr($file[$j], 0,1)==substr($af[$i], 0,1)){
                        $file[$j]=substr($af[$i],0,-1)."0".PHP_EOL;
                        echo substr($file[$j],0,-3)."<br>";
                        }
                    }
                }
            }
            file_put_contents("logs/form1.txt", $file); 
        }
    }

    public function get_pdo(){
        if (empty($this->_pdo))
        {
            try {
                $this->_pdo = new PDO('mysql:host=localhost;dbname=participants','root','');
                foreach($this->_pdo->query('SELECT * from participants') as $row) {
                    print_r($row);
                }
                $this->_pdo = null;
            } catch (PDOException $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            } 
        }
        return $this->_pdo;
    }

    public function db_save()
    {
        if ($this->validate())
        {
            $sql = $this->get_pdo()->prepare('INSERT INTO `'.$this->table.'` (`fname`,`sname`,`email`,`phone`,`topic_list`,`payment_list`,`getMail`, `created_at`) VALUES (?,?,?,?,?,?,?,?);');
            $sql->execute(array($this->fname,$this->sname,$this->email,$this->phone,$this->topic,$this->payment,$this->getMail,date('Y-m-d-H-i-s')));
            $fl = new flash;
            $fl->set('registered');
            echo $fl->get();
            $fl->del();
            return $sql->rowCount() === 1;
        }
        return false;
    }

    public function db_get(){
        $sql = $this->get_pdo()->prepare('SELECT * FROM `'.$this->table.'` WHERE `deleted_at` is ?;');
        $sql->execute(array(NULL));
        $objects = [];
        while ($object = $sql->fetchObject(static::class))
        {
            $str=$object->id."|".$object->fname."|".$object->sname."|".$object->email."|".$object->phone."|".$this->topic_list[$object->topic]."|".$this->payment_list[$object->paym]."|".$object->soglras."|".$object->created_at;
            $res = preg_replace("/ /","", $str);
            echo "<input type='checkbox' name='f[]' value=".$res.">".$str."<br>";
        }
    }

    public function db_delete(){
        if(empty($_POST['f'])){ 
                echo "<h2>Вы ничего не выбрали!</h2>";
        } 
        else{
            $af=$_POST['f'];
            $arr=array();
            foreach ($af as $key) {
                $res=explode('|', $key);
                array_push($arr, $res[0]);
            }
            echo "<h2>Данные файлы были успешно отмечены как удалённые</h2>";
            $n=count($af);
            for($i=0;$i<$n;$i++){
                echo $af[$i]."<br>"; 
            }
            foreach ($arr as $k ) { 
                $sql = $this->get_pdo()->prepare('UPDATE `'.$this->table.'` SET `deleted_at` = ? WHERE `id` = ?;');
                $sql->execute(array(date('Y-m-d-H-i-s'),$k)); 
            }
        }
    }

}


