<?php
include_once "model/m_main.php";
class controller
{
    private $model;
    public function __construct(){
      $this->model = new m_main();
    }
    public function index(){
        $reslt = $this->model->getlogin();

        if ($reslt =='login'){
            include_once "view/tampilan.html";
        }
        else {
            include_once "view/login.php";
        }
    }

    public function daftar(){
      include_once "view/daftar.php";
    }

    public function hapus(){
      $this->model->delete();
      header("Location: http://localhost/mvc2/mvc/index.php?controller=controller&fungsi=baca");
    }
    public function tambah(){
        include_once "view/tambah.html";
    }


    public function proses(){
        $reslt = $this->model->getlogin();

        if ($reslt =='login'){
            include_once "view/tampilan.html";
        }
        else {
            include_once "view/login.php";
        }
    }//akhir login

     public function submit(){
        print_r($_POST);
      if (isset($_GET['userid']))
        $this->model->update();

      else
        $this->model->tambah();
      header("Location: http://localhost/mvc2/mvc/index.php?controller=controller&fungsi=baca");
    }
    public function edit(){
        $result = $this->model->readwhere();
        $row = $result->fetch_assoc();
        include_once "view/edit.php";
    }
    public function baca(){
        $result = $this->model->read();
        include_once "view/read.php";
    }
}
$controller = new controller();
if(isset($_GET['fungsi'])) {
    $fungsi     = $_GET['fungsi'];
    $controller->$fungsi();
}
else{
    $controller->index();
}

?>