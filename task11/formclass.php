<?php
class formclass{
    public $fname;
    public $sname; 
    public $email;
    public $phone;
    public $topic;
    public $payment;
    public $getMail;
    public $errors = [];

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
            }
            if(empty($_POST['sname'])){
                $this->$errors['sname']='Введите фамилию!';
                echo $this->errors['sname']."<br>";
            }
            if(empty($_POST['email'])){
                $this->$errors['email']='Введите email!';
                echo $this->errors['email']."<br>";
            }
            if(empty($_POST['phone'])){
                $this->$errors['phone']='Введите номер телефона!';
                echo $this->errors['phone']."<br>";
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
}


