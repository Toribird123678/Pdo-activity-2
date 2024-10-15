<?php

require_once 'dbConfig.php' ;

function insertIntoAgentAccounts($pdo,$AgentID, $FullName, $LicenseNumber, $LicenseExpiryDate,$Specialization, $ContactInfo, $YearsOfExperience, $ServiceAreas) {

    $sql = "INSERT INTO agent_accounts (AgentID, FullName, LicenseNumber,LicenseExpiryDate,Specialization,  ContactInfo, YearsOfExperience, ServiceAreas) VALUES (?,?,?,?,?,?,?,?)";

    $stmt = $pdo->prepare($sql);

    $executeQuery = $stmt->execute([$AgentID, $FullName,$LicenseNumber,$LicenseExpiryDate,$Specialization, $ContactInfo, $YearsOfExperience, $ServiceAreas]) ;

    if ($executeQuery) {
        return true;
    }
}

function seeAllAgentAccounts($pdo){
    $sql = "SELECT * FROM agent_accounts";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute();
    
    if($executeQuery) {
        return $stmt->fetchAll();
    }
}

function getAgentById($pdo, $AgentID,){
    $sql = "SELECT * FROM agent_accounts WHERE AgentID = ?";
    $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$AgentID,])) {
            return $stmt->fetch();
    }
}

function updateAAgent($pdo, $AgentID, $FullName, $LicenseNumber, $LicenseExpiryDate, $Specialization, $ContactInfo, $YearsOfExperience, $ServiceAreas){
    
    $sql = "UPDATE agent_accounts
    SET FullName = ?,
        LicenseNumber = ?,
        LicenseExpiryDate = ?,
        Specialization = ?,
        ContactInfo = ?,
        YearsOfExperience = ?,
        ServiceAreas = ?
    WHERE AgentID = ?";
    $stmt = $pdo->prepare($sql);
    
    return $stmt->execute([$FullName, $LicenseNumber, $LicenseExpiryDate, $Specialization, $ContactInfo, $YearsOfExperience, $ServiceAreas, $AgentID]);

    if($executeQuery){
        return true;
    }
}

function deleteAAgent($pdo, $AgentID) {
    $stmt = $pdo->prepare("DELETE FROM agent_accounts WHERE AgentID = ?");

    $executeQuery = $stmt->execute([$AgentID]);

    if ($executeQuery) {
        return true;
    }
}

?>