<?php

require_once 'dbConfig.php'; 
require_once 'models.php';

if (isset($_POST['register'])) {
    $FullName = trim($_POST['FullName']);
    $LicenseNumber  = trim($_POST['LicenseNumber']);
    $LicenseExpiryDate = trim($_POST['LicenseExpiryDate']);
    $Specialization= trim($_POST['Specialization']);
    $ContactInfo = trim($_POST['ContactInfo']);
    $YearsOfExperience = trim($_POST['YearsOfExperience']);
    $ServiceAreas = trim($_POST['ServiceAreas']);

    if (!empty($FullName) && !empty($LicenseNumber) && !empty($LicenseExpiryDate) && !empty($Specialization) && !empty($ContactInfo) && !empty($YearsOfExperience) && !empty($ServiceAreas)) {
        
        $query = insertIntoAgentAccounts($pdo, null, $FullName, $LicenseNumber, $LicenseExpiryDate, $Specialization, $ContactInfo, $YearsOfExperience, $ServiceAreas);

        if ($query) {
            header("Location: ../index.php");
            exit();
        } else {
            echo "Insertion failed";
        }
    } else {
        echo "Make sure that no fields are empty";
    }
}

if (isset($_POST['editAgentBtn'])) {
    $AgentID = $_GET['AgentID'];
    $FullName = trim($_POST['FullName']);
    $LicenseNumber = trim($_POST['LicenseNumber']);
    $LicenseExpiryDate= trim($_POST['LicenseExpiryDate']);
    $Specialization  = trim($_POST['Specialization']);
    $ContactInfo = trim($_POST['ContactInfo']);
    $YearsOfExperience = trim($_POST['YearsOfExperience']);
    $ServiceAreas = trim($_POST['ServiceAreas']);

    if (!empty($AgentID) && !empty($FullName) && !empty($LicenseNumber) && !empty($LicenseExpiryDate) && !empty($Specialization) && !empty($ContactInfo) && !empty($YearsOfExperience) && !empty($ServiceAreas)) {

        $query = updateAAgent($pdo, $AgentID, $FullName, $LicenseNumber, $LicenseExpiryDate, $Specialization, $ContactInfo, $YearsOfExperience, $ServiceAreas);

        if ($query) {
            header("Location: ../index.php");
        }
        else {
            echo "Update failed";
        }
    }
    else {
        echo "Make sure that no fields are empty";
    }
}

if (isset($_POST['deleteAgentBtn'])) {

    $AgentID = $_GET['AgentID'];
    if (!empty($AgentID)) {
        $query = deleteAAgent ($pdo, $AgentID);

        if ($query) {
            header("Location: ../index.php");
            exit();
        }
        else {
            echo "Deletion failed";
        }
    } else {
        echo "Invalid Agent ID";
    }
}

?>