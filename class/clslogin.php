<?php
class Login
{
    function connect()
    {
        $con = mysql_connect('localhost', 'root', '');
        if (!$con){
            die("Khong the ket noi co so du lieu");
            exit();	
        }else{
            mysql_select_db('phone_db');
            mysql_query('SET NAMES UTF8');
            return $con;
        }
    }
    function dangnhap($user, $pass)
    {
		$pass = sha1($pass);
		$sql = "SELECT id, username, password, email FROM taikhoan WHERE username = '$user' AND password = '$pass' LIMIT 1";
        $link = $this->connect();
        $ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		if($i == 1)
		{
			while($row = mysql_fetch_array($ketqua))
			{
					$id = $row['id'];
					$user = $row['username'];
					$pass = $row['password'];
					$email = $row['email'];
					session_start();
					$_SESSION['myid'] = $id;
					$_SESSION['myuser'] = $user;
					$_SESSION['mypass'] = $pass;
					$_SESSION['myemail'] = $email;
					header("location:index-admin.php");
			}
		}
		else
		{
			return 0;
			//echo 'Bạn đã nhập sai username hoặc password. Đăng nhập không thành công.';
		}
        if($user != 'admin' &&  $pass != 'admin')
        {
            session_start();
            $_SESSION['myuser'] = $user;
            $_SESSION['mypass'] = $pass;
            header("location:index-guest.php");
		}
    }
    function fconfin($id, $user, $pass, $email)
    {
        $sql = "SELECT id FROM taikhoan WHERE id = '$id' AND username = '$user' AND password = '$pass' AND email = '$email' limit 1";
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		if($i != 1)
		{
			header("location:index.php");
		}
		//if($user != 'admin' || $user != 'admin')
        //{
            //header("location:index.php");
        //}
    }
}
?>