<?php
include "config.php";
if(isset($_GET['id'])){
$stmt = $conn->prepare("update workoutplan set workout_name=?, exercise_name=?, sets=?, weight_kg=?, reps=?, notes=? where wid=?");
$stmt->bind_param('sssssss', $wp, $en, $st, $wg, $rp, $wn, $id);

$wp = $_POST['wp'];
$en = $_POST['en'];
$st = $_POST['st'];
$wg = $_POST['wg'];
$rp = $_POST['rp'];
$wn = $_POST['wn'];
$id = $_GET['id'];

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