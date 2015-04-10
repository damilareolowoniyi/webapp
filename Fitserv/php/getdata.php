<table class="table table-bordered table-hover">
	<thead>
	  <tr>
	    <th>Workout Name</th>
	    <th>Exercise Name</th>
	    <th>Sets</th>
	    <th>Weights</th>
		<th>Reps</th>
		<th>Workout Notes</th>
	    <th>Action</th>
	  </tr>
	</thead>
	<tbody>
<?php
include "config.php";
$res = $conn->query("select * from workoutplan");
while ($row = $res->fetch_assoc()) {
?>
    
	  <tr>
	    <td><?php echo $row['workout_name']; ?></td>
	    <td><?php echo $row['exercise_name']; ?></td>
	    <td><?php echo $row['sets']; ?></td>
	    <td><?php echo $row['weight_kg']; ?></td>
	    <td><?php echo $row['reps']; ?></td>
	    <td><?php echo $row['notes']; ?></td>		
	    <td>
	    <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal<?php echo $row['wid']; ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
	    <a class="btn btn-danger btn-sm"  onclick="deletedata('<?php echo $row['wid']; ?>')" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>

<!-- Modal -->
<div class="modal fade" id="myModal<?php echo $row['wid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $row['wid']; ?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel<?php echo $row['wid']; ?>">Edit Workout Plan</h4>
      </div>
      <div class="modal-body">

<form>
  <div class="form-group">
    <label for="wd">Workout Name</label>
    <input type="text" class="form-control" id="wd<?php echo $row['wid']; ?>" value="<?php echo $row['workout_name']; ?>">
  </div>
  <div class="form-group">
    <label for="en">Exercise Name</label>
    <input type="text" class="form-control" id="en<?php echo $row['wid']; ?>" value="<?php echo $row['exercise_name']; ?>">
  </div>
  <div class="form-group">
    <label for="st">Sets</label>
    <input type="text" class="form-control" id="st<?php echo $row['wid']; ?>" value="<?php echo $row['sets']; ?>">
  </div>
  <div class="form-group">
    <label for="wg">Weights</label>
    <input type="text" class="form-control" id="wg<?php echo $row['wid']; ?>" value="<?php echo $row['weight_kg']; ?>">
  </div>
  <div class="form-group">
    <label for="rp">Reps</label>
    <input type="text" class="form-control" id="rp<?php echo $row['wid']; ?>" value="<?php echo $row['reps']; ?>">
  </div>
  <div class="form-group">
    <label for="wn">Workout Notes</label>
    <input type="text" class="form-control" id="wn<?php echo $row['wid']; ?>" value="<?php echo $row['notes']; ?>">
  </div>
</form>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" onclick="updatedata('<?php echo $row['wid']; ?>')" class="btn btn-primary">Edit this workout plan</button>
      </div>
    </div>
  </div>
</div>
	    
	    </td>
	  </tr>
<?php
}
?>
	</tbody>
      </table>