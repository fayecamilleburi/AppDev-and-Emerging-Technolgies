<?php 
include('database.php');

$id = $_POST['id'] ?? $_GET['id'] ?? null;

if ($id) {
    $sql = 'DELETE FROM pets WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);

    // Redirect back to record page after deletion
    header('Location: record.php');
    exit;
}
?>