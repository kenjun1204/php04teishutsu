<!-- 登録処理 -->

<?php

$lid = $_POST["lid"];
$lpw = $_POST["lpw"];
$kanri_flg = $_POST["kanri_flg"];

include "bm_funcs.php";
$pdo = db_con();

$sql = "INSERT INTO gs_bm_table(lid,lpw,kanri_flg)VALUES(:lid,:lpw,:kanri_flg)";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
$stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_STR);

$status = $stmt->execute();

if ($status == false) {
    sqlError($stmt);
} else {
    redirect("bm_login.php");
}
?>