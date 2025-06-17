
<?php
session_start();
 include '../admin/db.php'; 
 ?>

<?php
$email=strip_tags($_POST['email']);
$password = strip_tags($_POST['password']);
$q = $conn->prepare("SELECT * from users where email=? ") or die("Error Email");
$q->bind_param("s",$email);
$q->execute();
$res=$q->get_result();
if($res->num_rows > 0){
	$row=$res->fetch_array();
	if($row['password'] !=$password ){
		echo "wrong_password";
		exit();
	}elseif($row['password'] == $password){
		 
		//echo "login_success";
		$_SESSION['secret']=$row['Just_A_Text_By_Me'];
		$_SESSION['num']=$row['id'];
		$_SESSION['email']=$row['email'];
		$_SESSION['password']=$row['password'];
		 

		 
	}
	 
 

}else{
	echo "no_email";
	exit();
}


 
 


?>


<!-- ----------- -->
<style>
.success_login{


box-sizing: border-box;

display: flex;
flex-direction: column;
justify-content: center;
align-items: center;
padding: 10.75px;
position: relative;
max-width: 409.25px;
width: 95%;
max-height: 213.75px;
height: 100%;
background: #FFFFFF;
border: 3px solid #1C5979;
border-radius: 12px;
bottom: -50px;
margin-top: 80px;

}
#m1{
color: #1C5979;

text-align: center;
font-family: Cairo;
font-size: 24px;
font-style: normal;
font-weight: 700;
line-height: normal;
direction: rtl;
}
#m2{
	color: #7ACAB6;
 direction: rtl;
text-align: center;
font-family: Cairo;
font-size: 24px;
font-style: normal;
font-weight: 700;
line-height: normal;
}
#img_check_mark{
	width: 30px;
}

@media (max-width: 600px) {
  .success_login {
    max-width: 90%;
    bottom: -20px;
    height: auto;
    max-height: none;
    padding: 1rem 1rem;
  }

  /* تصغير الخط قليلاً ليلائم الشاشات الضيقة */
  #m1,
  #m2 {
    font-size: 1.25rem; /* حوالي 20px */

  }

  /* تصغير أيقونة الصح */
  #img_check_mark {
    width: 24px;
  }
}

</style>
<body>
	
<center> 
	<div class="success_login"><br><br>
		<div id="m1"> مرحبا بعودتك ! </div>
		<div id='m2'>تم  تسجيل دخولك بنجاح   <img id='img_check_mark' src="../images/CheckMark.png"> </div>
		<div><img src="../images/dots.png"></div>

	</div></center>
</body>

</html>