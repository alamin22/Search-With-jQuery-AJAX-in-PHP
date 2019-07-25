<?php

include"connection.php";
    
  if(isset($_POST['searchValue'])){
  	$sql="select * from thana where thana_name LIKE '%".$_POST['searchValue']."%'";
  	$stmt=$conn->prepare($sql);
  	$stmt->execute();
  	$data=$stmt->fetchAll();

  	$count=count($data);

?>
<form method="post">
			<table>
				<tr>
					<td><input type="text" name="search" id="search" placeholder="Search By Upozela Name"><span id="search_icon"><i class="fa fa-search" ></i></span>
					</td>
				</tr>
			</table>
		</form><br>
	<table>

		<tr>
			<th>ID</th>
			<th>Upozela Name</th>
		</tr>

		<?php
		if($count>0){
		foreach($data as $row){
     	?>
		<tr>
			<td><?php echo $row['thana_id']?></td>
			<td><?php echo"<--> " .$row['thana_name']?></td>
		</tr>
	
        <?php
	}
}else{
	echo"<b class=text-danger>Search Data Not Found</b>";
}
	?>

</table>



<?php
     
  }

?>