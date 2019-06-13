<?php
session_start();

include("bm_funcs.php");
$pdo = db_con();

$lid = $_POST["lid"];
$lpw = $_POST["lpw"];
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE lid=:lid AND lpw=:lpw AND life_flg=0");
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
$status = $stmt->execute();

if($status==false){
    sqlError($stmt);
}

$val = $stmt->fetch();

if($val["id"] != ""){
    $_SESSION["chk_ssid"] = session_id();
    $_SESSION["kanri_flg"] = $val['kanri_flg'];
    $_SESSION["name"] = $val['name'];
    header("Location: bm_select.php");
}else{
    header("Location: bm_logout.php");
}
exit();
?>