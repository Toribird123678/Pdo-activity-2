<?php
require_once 'core/dbConfig.php';
require_once 'core/models.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lopez Real estate </title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h3>Lopez Real Estate!</h3>
    <p>Please enter agent's info to register an account:</p>
    <form action="core/handleForms.php" method="POST">
        <p>
            <label for="FullName">FullName:</label>
            <input type="text" name="FullName" id="FullName" required>
        </p>
        <p>
            <label for="LicenseNumber">LicenseNumber:</label>
            <input type="text" name="LicenseNumber" id="LicenseNumber" required>
        </p>
        <p>
            <label for="LicenseExpiryDate">LicenseExpiryDate:</label>
            <input type="text" name="LicenseExpiryDate" id="LicenseExpiryDate" required>
        </p>
        <p>
            <label for="Specialization">Specialization:</label>
            <input type="text" name="Specialization" id="Specialization" required>
        </p>
        <p>
            <label for="ContactInfo">ContactInfo:</label>
            <input type="number" name="ContactInfo" id="ContactInfo" required>
        </p>
        <p> 
            <label for="YearsOfExperience">YearsOfExperience:</label>
            <input type="text" name="YearsOfExperience" id="YearsOfExperience" required>
        </p>
        <p>
            <label for="ServiceAreas">ServiceAreas:</label>
            <input type="text" name="ServiceAreas" id="ServiceAreas" required>
        </p>
        <p>
            <button type="submit" name="register">Register</button>
        </p>
    </form>

    <h3>Agent Record</h3>
    <table> 
        <tr>
            <th>AgentID</th>
            <th>FullName</th>
            <th>LicenseNumber</th>
            <th>LicenseExpiryDate</th>
            <th>Specialization</th>
            <th>ContactInfo</th>
            <th>YearsOfExperience</th>
            <th>ServiceAreas</th>
            <th>Actions</th>
        </tr>
        <?php
        // Corrected function call and variable naming
        $allAgentAccounts = seeAllAgentAccounts($pdo);
        if (!empty($allAgentAccounts)) {
            foreach ($allAgentAccounts as $row) {
        ?>
        <tr>
            <td><?php echo ($row['AgentID']); ?></td>
            <td><?php echo ($row['FullName']); ?></td>
            <td><?php echo ($row['LicenseNumber']); ?></td>
            <td><?php echo ($row['LicenseExpiryDate']); ?></td>
            <td><?php echo ($row['Specialization']); ?></td>
            <td><?php echo ($row['ContactInfo']); ?></td>
            <td><?php echo ($row['YearsOfExperience']); ?></td>
            <td><?php echo ($row['ServiceAreas']); ?></td>
            <td class="action-links">
                <a href="editAgent.php?AgentID=<?php echo urlencode($row['AgentID']); ?>">Edit</a>
                <a href="deleteAgent.php?AgentID=<?php echo urlencode($row['AgentID']); ?>" onclick="return confirm('Are you sure you want to delete this Agent?');">Delete</a>
            </td>
        </tr>
        <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="8">No Records Found!</td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>