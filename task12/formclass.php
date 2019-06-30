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
