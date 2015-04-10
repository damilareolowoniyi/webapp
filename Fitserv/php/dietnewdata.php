<?php
include "config.php";
$fn = $_POST['fn'];
$sz = $_POST['sz'];
$tc = $_POST['tc'];
$pn = $_POST['pn'];
$cb = $_POST['cb'];
$ft = $_POST['ft'];
$mt = $_POST['mt'];
$dn = $_POST['dn'];
if($fn != null&& $sz != null && $tc != null && $pn != null && $cb != null && $ft != null && $mt != null && $dn != null){
//$stmt = $conn->prepare("INSERT INTO workoutplan VALUES ('',?,?,?,?,?,?,?)");
//$stmt->bind_param('sssssss',$wp, $wd, $en, $st, $wg, $rp, $wn);

$stmt = $conn->prepare ("INSERT INTO dietplan (food_name,size, total_cal, protein, carbs, fat, meal_time, notes) values (?,?,?,?,?,?,?,?)");
$stmt->bind_param('ssssssss',$fn, $sz, $tc, $pn, $cb, $ft, $mt, $dn);
//$stmt->execute(); 

if($stmt->execute()){
?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<strong>You have successfully added your diet plan!</strong>
</div>
<?php
} else{
?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Error!</strong> Please complete your diet plan correctly.
</div>
<?php
}
} else{
?> 
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Please complete the diet plan to submit it!</strong>.
</div>
<?php
}
?>