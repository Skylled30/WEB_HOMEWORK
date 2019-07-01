<?php
class flash{
	protected $check = false;
    protected function start_session()
    {
        if (!$this->check)
        {
            session_start();
            $this->check = true;
        }
    }
	public function set_data($m){
		$this->start_session();
		$_SESSION['vary']=$m;
	}
	public function get_data(){
		$this->start_session();
		$m = $_SESSION['vary'];
		return $m;
	}
	  public function delete_data(){
        $this->start_session();
        if (!empty($_SESSION['vary'])){
            unset($_SESSION['vary']);
        }
    }
}
