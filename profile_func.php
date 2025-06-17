<?php session_start(); ?>
<?php
if(!$_SESSION['num'] || !$_SESSION['password']){exit();}
include 'admin/db.php';
 

$id=intval($_GET['id']);
if(!$_SESSION['num'] ){exit();}




/*---------Delete Srv From User----------*/
$del_srv=intval($_GET['del_srv']);
if($_GET['del_srv']){
    mysqli_query($conn,"DELETE from  user_main_srvs where `user_id`=".$_SESSION['num']." and id=$del_srv  ")or die("Er-Del-query");
}

/*---------Delete Work From User----------*/
$del_work=intval($_GET['del_work']);
if($_GET['del_work']){
    mysqli_query($conn,"DELETE from  pr_my_works where `u_id`=".$_SESSION['num']." and id=$del_work  ")or die("Er-Del-query");
}
//-----------------------------------------

/*---------------User_Srvs------------------*/
if($id==1){
    echo "<table id='srvs_list_tbl'>";
    $srv_q =mysqli_query($conn,"SELECT * from user_main_srvs where `user_id`=".$_SESSION['num']." ") or die("E-89");
    while($row_srvs=mysqli_fetch_array($srv_q)){ 
    echo "<tr><td style='padding:3px 0px 3px 15px;'>".srv_name($conn,$row_srvs['srv_id'])."</td><td>  <img class='del_srv' id='".$row_srvs['id']."' style='width:20px;' src='/images/trash.png'>   </td></tr>";
}
echo "</table>";
}
/*---------------User_Works------------------*/
if($id==2){
    echo "<table id='srvs_list_tbl'>";
    $work_q =mysqli_query($conn,"SELECT * from pr_my_works where `u_id`=".$_SESSION['num']." ") or die("E-89");
    while($row_work=mysqli_fetch_array($work_q)){ 
    echo "<tr><td style='padding:3px 0px 3px 15px;'><a href='".$row_work['file_link']."'>".$row_work['file_link']."</a></td><td>  <img class='del_work' id='".$row_work['id']."' style='width:20px;' src='/images/trash.png'>   </td></tr>";
}
echo "</table>";
}
################################################################
/*---------Delete Doc Sjl ----------*/

if($_GET['del_sjl']){
    mysqli_query($conn,"DELETE from  org_docs where `u_id`=".$_SESSION['num']." and doc_type='sjl'  ")or die("Er-Del-Doc-Sjl-query");
}
/*---------Delete Doc Free Lancer ----------*/

if($_GET['del_free_lancer']){
    mysqli_query($conn,"DELETE from  org_docs where `u_id`=".$_SESSION['num']." and doc_type='free_lancer'  ")or die("Er-Del-Doc-Free-Lancer-query");
}
/*---------Delete Doc Tax ----------*/

if($_GET['del_tax']){
    mysqli_query($conn,"DELETE from  org_docs where `u_id`=".$_SESSION['num']." and doc_type='tax'  ")or die("Er-Del-Doc-tax-query");
}
/*---------Delete Doc Maroof ----------*/

if($_GET['del_maroof']){
    mysqli_query($conn,"DELETE from  org_docs where `u_id`=".$_SESSION['num']." and doc_type='maroof'  ")or die("Er-Del-Doc-maroof-query");
}
 
 

###################################
function srv_name($conn,$s_id){
 $q =mysqli_query($conn,"SELECT * from main_srvs where id=$s_id ") or die("Er-124");
 $row =mysqli_fetch_array($q);
 $name=$row['srv_name'];
return $name;
}


?>
