<?php 

include 'Basket.php';
include 'connect.php';
if($_SESSION['login']!="Logged in"){
	header("Location: login.php");
	die();
}
?> 

<html>
	<head>
		 <title>Basket</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<?php include 'scripts.html'?>
		<link rel="stylesheet" type="text/css" href="style.css" />
		
	</head>
	<body>
		
				
				
		<div id="container">
						
			<div id="nav">
 				<?php include 'navigation.php'; ?>
			</div>
			
			
			<div id="content">
				
				
				<div id="main">
				</br>
				</br>
				<div id="bubbleText">
				<table>
		<thead>
			<td>Name</td>
			<td>Quantity</td>
			<td>Price</td>
		</thead>
		
		<tbody?>
			<?php if(isset($_SESSION['Basket'])){ for($i=0; $i<$_SESSION['Basket']->index; $i++){ ?>
			<tr>
				<?php $query = "SELECT Name, OnlinePrice FROM product WHERE ID = ".$_SESSION['Basket']->ID[$i];
					  $stmt = $mysql->prepare($query);
					  $stmt->execute();
				?>
				<?php foreach($stmt->fetchAll() as $result): ?>
				<td><?php echo $result['Name']; ?></td>
				<td><?php echo $_SESSION['Basket']->amount[$i]; ?></td>
				<td><?php echo $result['OnlinePrice']; ?></td>
			</tr>
			<?php endforeach; ?>
			<?php } } ?>
			</tbody>
			</table>
				</div>
				</div>
			</div>
			<form method="post" action="searchTable.php">
				<input type="submit" value="Back">
			</form>
			
			<div id="footer">
				Created in 2017 by Team 7
			</div>
		</div>
	</body>
	</html>