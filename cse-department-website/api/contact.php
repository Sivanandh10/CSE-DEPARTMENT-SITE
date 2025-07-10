<?php
header('Content-Type: application/json');
require_once '../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    
    // Add logic to store or email the contact message
    echo json_encode(['message' => 'Message sent successfully']);
} else {
    echo json_encode(['message' => 'Invalid request']);
}
?> 
