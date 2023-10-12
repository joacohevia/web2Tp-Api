<?php 
require_once 'dataBBDD.php';


$pdo = connectToDatabase();
$databaseName = DB_NAME;

// Verificar si la base de datos existe y crearla si no
$checkDatabase = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = ?";
$stmt = $pdo->prepare($checkDatabase);
$stmt->execute([$databaseName]);
$databaseExists = $stmt->fetchColumn();

if (!$databaseExists) {
    $createDatabaseQuery = "CREATE DATABASE $databaseName";
    $pdo->exec($createDatabaseQuery);
}

// Ejecutar un archivo SQL para llenar la base de datos con datos iniciales
$sqlFile = './database/pagina_ropa.sql';
$sqlCommands = file_get_contents($sqlFile);

$pdo->exec($sqlCommands);
