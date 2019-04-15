<?php 
	require "config.php";

?>
<html>
	<head>
		<style>
			table {
			  font-family: arial, sans-serif;
			  border-collapse: collapse;
			  width: 100%;
			}

			td, th {
			  border: 1px solid #dddddd;
			  text-align: left;
			  padding: 8px;
			}

			tr:nth-child(even) {
			  background-color: #dddddd;
			}
		</style>
	</head>
	<body>
		<hr>
		<center>	
		<div>
		<h1> Sample Shop </h1>
		<form action="inject-sample.php" method="POST">
			<input type="text" name="name" value="<?=$_POST['name']?>">
			<input type="submit">
		</form>
		<div>
		</center>	
		<hr>


		<center>
			<div>
				<h1> Results </h1>
		<?php 

			if(isset($_POST['name'])){
			$name = $_POST['name'];
			$sql = "SELECT * from items where name like '%$name%'";
			
			
			if($name ==""){
				$sql = "SELECT * from items";
			
			}
			
			$res = mysqli_fetch_all(mysqli_query($conn,$sql),MYSQLI_ASSOC);
			

		?>
				<table style="border: 5px">
					<thead>
						<th> Name </th>
						<th> Qty </th>
					</thead>
					<tbody>
					<?php 

					foreach ($res as $key => $value) {
					?>
						<tr>
							<td><?=$value['name']?></td>
							<td><?=$value['qty']?></td>
						</tr>
					<?php
					}

					?>
					</tbody>
				</table>
			</div>
		<?php 
			}else{
		?>

		<h1>Use search</h1>

		<?php 
			}
		?>
		</center>
	</body>
</html>