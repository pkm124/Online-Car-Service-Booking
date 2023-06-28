<?php
require_once("config.php");
if(!empty($_POST["state_id"])) 
{
$query =mysqli_query($conn,"SELECT * FROM model WHERE manu_id = '" . $_POST["state_id"] . "'");
?>
<option value="">Select Model</option>
<?php
while($row=mysqli_fetch_array($query))  
{
?>
<option value="<?php echo $row["id"]; ?>"><?php echo $row["model_name"]; ?></option>
<?php

}
}
?>
