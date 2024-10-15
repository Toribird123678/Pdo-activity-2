<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		body {
			font-family: "Arial";
		}
		input {
			font-size: 1.5em;
			height: 50px;
			width: 200px;
		}
		table, th, td {
		  border:1px solid black;
		}
	</style>
</head>
<body>
	<h1>Are you sure you want to delete this Agent?</h1>
	<?php $getAgentById = getAgentById($pdo, $_GET['AgentID']); ?>
	<form action="core/handleForms.php?AgentID=<?php echo $_GET['AgentID']; ?>" method="POST">

			<p>FullName: <?php echo $getAgentById['FullName']; ?></p>
			<p>LicenseNumber: <?php echo $getAgentById['LicenseNumber']; ?></p>
			<p>LicenseExpiryDate: <?php echo $getAgentById['LicenseExpiryDate']; ?></p>
			<p>Specialization: <?php echo $getAgentById['Specialization']; ?></p>
			<p>ContactInfo: <?php echo $getAgentById['ContactInfo']; ?></p>
			<p>YearsOfExperience: <?php echo $getAgentById['YearsOfExperience']; ?></p>
			<p>ServiceArea: <?php echo $getAgentById['ServiceAreas']; ?></p>

			<input type="submit" name="deleteAgentBtn" value="Delete">
		</div>
	</form>
</body>
</html>