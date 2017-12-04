<?php
include "model.php";
class m_main extends model
{
    public function __construct(){
      parent::__construct();

    }


    public function getlogin(){
      if (isset ($_REQUEST['username']) && isset($_REQUEST['password'])){
        //kondisi jika berhasil
        if ($_REQUEST['username']=='admin' && $_REQUEST['password']=='admin'){
          return 'login';
        }
        else{
          return'invalid user';
        }
      }
    }
    public function tambah(){

        $nama = $_POST['nama'];
        $nim  = $_POST['nim'];
        $umur = $_POST['umur'];
        $keluhan = $_POST['keluhan'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $solusi  = $_POST['solusi'];
        $username = stripcslashes($username);
        $password = stripcslashes($password);
        $username = mysql_real_escape_string($username);
        $password = mysql_real_escape_string($password);


        $target_dir = "gambar/";
        $target_file = $target_dir . basename($_FILES["foto"]["name"]);
        if(move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)){


       
        $this->conn->query("INSERT INTO datamahasiswa(nama, nim, umur,gambar,keluhan,jenis_kelamin,solusi)
                            VALUES('$nama', '$nim', '$umur','$target_file','$keluhan','$jenis_kelamin','$solusi')");

        $this->conn->query("INSERT INTO user(username,password,email)
                                    VALUES('$username','$password','$email')");
        $this->conn->query("SELECT * FROM user WHERE username = '$username' AND password = '$password'")or die ("Failed input kedatabase ".mysql_error());



//koneksi
//mysql_connect("localhost","root","");
//mysql_select_db("db_ganteng");

//$result =  mysql_query("SELECT * FROM user WHERE username = '$username' AND password = '$password'")or die ("Failed input kedatabase ".mysql_error());


$row = mysql_fetch_array($this->conn);
if ($row['username']== $username && $row['password'] == $password) {
  echo "Login Sukses ".$row['username'];
  header("Location: http://localhost/mvc2/mvc/index.php?controller=controller&fungsi=baca");
}else{
  echo "Gagal login";
}
      }
    }
  
    public function read(){
      return $this->conn->query(
        "SELECT * FROM datamahasiswa"
      );
    }
    public function readwhere(){
      $id = $_GET['userid'];
      return $this->conn->query(
        "SELECT * FROM datamahasiswa
        WHERE id= $id"
      );
    }
    public function delete(){
      $id = $_GET['userid'];
      return $this->conn->query(
        "DELETE FROM datamahasiswa
        WHERE id= $id"
      );
    }
    public function update(){
      $id = $_GET['userid'];
      $nama = $_POST['nama'];
      $nim  = $_POST['nim'];
      $umur = $_POST['umur'];
      $target_dir = "gambar/";
      $jenis_kelamin = $_POST['jenis_kelamin'];
      $keluhan = $_POST['keluhan'];
      $solusi = $_POST['solusi'];
      
      $target_file = $target_dir . basename($_FILES["foto"]["name"]);
      if(move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)){

      return $this->conn->query(
        "UPDATE datamahasiswa
        SET nama = '$nama',
            nim = '$nim',
            umur = '$umur',
            jenis_kelamin = '$jenis_kelamin',
            gambar= '$target_file',
            keluhan = '$keluhan',
            solusi  = '$solusi'
        WHERE id= '$id'" );
        }
    }
}
?>