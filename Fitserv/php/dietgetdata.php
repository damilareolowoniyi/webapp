<table class="table table-bordered table-hover">
	<thead>
	  <tr>
	    <th>Food Name</th>
	    <th>Size (g)</th>
	    <th>Total Cal</th>
	    <th>Protein (g)</th>
  		<th>Carbs (g)</th>
  		<th>Fat (g)</th>
      <th>Meal Time</th>
      <th>Notes</th>
	    <th>Action</th>
	  </tr>
	</thead>
	<tbody>
<?php
include "config.php";
$res = $conn->query("select * from dietplan");
while ($row = $res->fetch_assoc()) {
?>
    
	  <tr>
	    <td><?php echo $row['food_name']; ?></td>
	    <td><?php echo $row['size']; ?></td>
	    <td><?php echo $row['total_cal']; ?></td>
	    <td><?php echo $row['protein']; ?></td>
	    <td><?php echo $row['carbs']; ?></td>
      <td><?php echo $row['fat']; ?></td>
      <td><?php echo $row['meal_time']; ?></td>
	    <td><?php echo $row['notes']; ?></td>		
	    <td>
	    <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal<?php echo $row['id']; ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
	    <a class="btn btn-danger btn-sm"  onclick="deletedata('<?php echo $row['id']; ?>')" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>

<!-- Modal -->
<div class="modal fade" id="myModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $row['id']; ?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel<?php echo $row['id']; ?>">Edit Workout Plan</h4>
      </div>
      <div class="modal-body">

<form>
  <div class="form-group">
    <label for="fn">Food Name</label>
    <input type="text" class="form-control" id="wd<?php echo $row['id']; ?>" value="<?php echo $row['food_name']; ?>">
  </div>
  <div class="form-group">
    <label for="sz">Size</label>
    <input type="text" class="form-control" id="en<?php echo $row['id']; ?>" value="<?php echo $row['size']; ?>">
  </div>
  <div class="form-group">
    <label for="tc">Total Cal</label>
    <input type="text" class="form-control" id="st<?php echo $row['id']; ?>" value="<?php echo $row['total_cal']; ?>">
  </div>
  <div class="form-group">
    <label for="pn">Protein (g)</label>
    <input type="text" class="form-control" id="wg<?php echo $row['id']; ?>" value="<?php echo $row['protein']; ?>">
  </div>
  <div class="form-group">
    <label for="cb">Carbs (g)</label>
    <input type="text" class="form-control" id="rp<?php echo $row['id']; ?>" value="<?php echo $row['carbs']; ?>">
  </div>
  <div class="form-group">
    <label for="ft">Fat (g)</label>
    <input type="text" class="form-control" id="rp<?php echo $row['id']; ?>" value="<?php echo $row['fat']; ?>">
  </div>
  <div class="form-group">
    <label for="mt">Meal Time</label>
    <input type="text" class="form-control" id="rp<?php echo $row['id']; ?>" value="<?php echo $row['meal_time']; ?>">
  </div>
  <div class="form-group">
    <label for="dn">Diet Notes</label>
    <input type="text" class="form-control" id="wn<?php echo $row['id']; ?>" value="<?php echo $row['notes']; ?>">
  </div>
</form>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" onclick="updatedata('<?php echo $row['id']; ?>')" class="btn btn-primary">Edit this workout plan</button>
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