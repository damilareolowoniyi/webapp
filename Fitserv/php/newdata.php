<?php
include "config.php";
$wp = $_POST['wp'];
//$wd = $_POST['wd'];
$en = $_POST['en'];
$st = $_POST['st'];
$wg = $_POST['wg'];
$rp = $_POST['rp'];
$wn = $_POST['wn'];
if($wp != null&& $en != null && $st != null && $wg != null && $rp != null && $wn != null){
//$stmt = $conn->prepare("INSERT INTO workoutplan VALUES ('',?,?,?,?,?,?,?)");
//$stmt->bind_param('sssssss',$wp, $wd, $en, $st, $wg, $rp, $wn);

$stmt = $conn->prepare ("INSERT INTO workoutplan (workout_name,exercise_name, sets, weight_kg, reps, notes) values (?,?,?,?,?,?)");
$stmt->bind_param('ssssss',$wp, $en, $st, $wg, $rp, $wn);
//$stmt->execute(); 

if($stmt->execute()){
?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<strong>You have successfully added your workout plan!</strong>
</div>
<?php
} else{
?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Error!</strong> Please complete your workout plan correctly.
</div>
<?php
}
} else{
?> 
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Please complete the workout out plan to submit it!</strong>.
</div>
<?php
}
?>