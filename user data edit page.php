<?php
    require 'database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    $pdo = Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "SELECT * FROM data_warga where no_rfid = ?";
	$q = $pdo->prepare($sql);
	$q->execute(array($id));
	$data = $q->fetch(PDO::FETCH_ASSOC);
	Database::disconnect();
?>

<!DOCTYPE html>
<html lang="en">
<html>
<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="js/bootstrap.min.js"></script>
		<style>
		html {
			font-family: Arial;
			display: inline-block;
			margin: 0px auto;
			text-align: center;
		}

		ul.topnav {
			list-style-type: none;
			margin: auto;
			padding: 0;
			overflow: hidden;
			background-color: #3333FF;
			width: 90%;
		}

		ul.topnav li {float: left;}

		ul.topnav li a {
			display: block;
			color: white;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
		}

		ul.topnav li a:hover:not(.active) {background-color: #000099;}

		ul.topnav li a.active {background-color: #333;}

		ul.topnav li.right {float: right;}

		@media screen and (max-width: 600px) {
			ul.topnav li.right, 
			ul.topnav li {float: none;}
		}
		
		.table {
			margin: auto;
			width: 90%; 
		}
		
		thead {
			color: #FFFFFF;
		}
		</style>
		
		<title>Hata Data | Edit Informasi User</title>
		
	</head>
	
	<body>
		
		<div class="container">
     
			<div class="center" style="margin: 0 auto; width:495px; border-style: solid; border-color: #f2f2f2;">
				<div class="row">
					<h3 align="center">Edit User Data</h3>
				</div>
		 
				<form class="form-horizontal" action="user data edit tb.php?id=<?php echo $id?>" method="post">
					<div class="control-group">
						<label class="control-label">Nomor RFID</label>
						<div class="controls">
							<input name="id" type="text"  placeholder="" value="<?php echo $data['no_rfid'];?>" readonly>
						</div>
					</div>
					
					
					<div class="control-group">
						<label class="control-label">Nama</label>
						<div class="controls">
							<input id="div_refresh" name="nama" type="text" placeholder="" value="<?php echo $data['nama'];?>" required>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label">Desa</label>
						<div class="controls">
							<select name="desa">
								<option value="Klumutan">Klumutan</option>
								<option value="Sumbersari">Sumbersari</option>
							</select>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label">Dukuh</label>
						<div class="controls">
							<input id="div_refresh" name="dukuh" type="text"  placeholder="" value="<?php echo $data['dukuh'];?>" required>
							</select>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label">RT</label>
						<div class="controls">
							<input id="div_refresh" name="rt" type="text"  placeholder="" value="<?php echo $data['rt'];?>" required>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label">RW</label>
						<div class="controls">
							<input id="div_refresh" name="rw" type="text"  placeholder=""value="<?php echo $data['rw'];?>"  required>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label">Saldo</label>
						<div class="controls">
							<input id="div_refresh" name="saldo" type="text"  placeholder="" value="<?php echo $data['saldo'];?>" required>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Status Pencairan</label>
						<div class="controls">
							<select name="status">
								<option value="Belum Pencairan">Belum Pencairan</option>
								<option value="Sudah Pencairan">Sudah Pencairan</option>
							</select>
						</div>
					</div>
					
					<div class="form-actions">
						<button type="submit" class="btn btn-success">Update</button>
						<a class="btn" href="home.php">Back</a>
					</div>
				</form>
			</div>               
		</div> <!-- /container -->	
		
		<script>
			var g = document.getElementById("defaultGender").innerHTML;
			if(g=="Male") {
				document.getElementById("mySelect").selectedIndex = "0";
			} else {
				document.getElementById("mySelect").selectedIndex = "1";
			}
		</script>
	</body>
</html>