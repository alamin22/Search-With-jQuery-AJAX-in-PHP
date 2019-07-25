<?php
include"connection.php";
?>

<!DOCTYPE html>
<html>
<head>
	   <title>Search With Ajax</title>
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<style type="text/css">
	#search{
		width: 380px;
		border: none;
	}


</style>

<script type="text/javascript">
	
     $(document).ready(function(){
       $('#search').click(function(){
          $(this).css("border-bottom","2px solid blue");
       });

   $('#search_icon').click(function(){
   	  var searchValue=$('#search').val();
          if(searchValue){
          	$.ajax({
          		type:"post",
          		url:"ajaxPage.php",
          		data:"searchValue="+searchValue,
          		success:function(data)
          		{        
                    $('#search_section').html(data);          
          		}
          	});
          }

   });


     });

</script>


</head>
<body>
	<?php
      $sql="select * from thana";
      $statement=$conn->prepare($sql);
      $statement->execute();
      $data=$statement->fetchAll();
	?>
<center><br>
	<div id="search_section">
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
		foreach($data as $row){
     	?>
		<tr>
			<td><?php echo $row['thana_id']?></td>
			<td><?php echo"<--> " .$row['thana_name']?></td>
		</tr>
	
        <?php
	}
	?>
</table>
</center>

</div>
		
	
</body>
</html>   