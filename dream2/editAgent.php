<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	
</head>

<body>
	<?php $getAgentById = getAgentById($pdo, $_GET['AgentID']); ?>
	<form action="core/handleForms.php?AgentID=<?php echo $_GET['AgentID']; ?>" method="POST">
		<p>
			<label for="FullName">FullName</label> 
			<input type="text" name="FullName" value="<?php echo $getAgentById['FullName']; ?>">
		</p>
		<p>
			<label for="LicenseNumber">LicenseNumber</label> 
			<input type="text" name="LicenseNumber" value="<?php echo $getAgentById['LicenseNumber']; ?>">
		</p>
		<p>
			<label for="LicenseExpiryDate">LicenseExpiryDate</label>
			<input type="text" name="LicenseExpiryDate" value="<?php echo $getAgentById['LicenseExpiryDate']; ?>">
		</p>
		<p>
			<label for="Specialization">Specialization</label>
			<input type="text" name="Specialization" value="<?php echo $getAgentById['Specialization']; ?>">
		</p>
		<p>
			<label for="ContactInfo">ContactInfo</label>
			<input type="text" name="ContactInfo" value="<?php echo $getAgentById['ContactInfo']; ?>">
			</p>
		<p>
			<label for="YearsOfExperience">YearsOfExperience</label>
			<input type="text" name="YearsOfExperience" value="<?php echo $getAgentById['YearsOfExperience']; ?>">
		</p>
		<p>
			<label for="ServiceAreas">ServiceArea</label>
			<input type="text" name="ServiceAreas" value="<?php echo $getAgentById['ServiceAreas']; ?>">

			<input type="submit" name="editAgentBtn">
		</p>
	</form>
</body>
</html>