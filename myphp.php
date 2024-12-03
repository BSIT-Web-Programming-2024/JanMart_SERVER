<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    $message = isset($_POST['message']) ? $_POST['message'] : '';

    
    $response = array(
        'status' => 'success',
        'message' => 'Message received: ' . htmlspecialchars($message)
    );

    
    header('Content-Type: application/json');
    echo json_encode($response);
} else {

    header('HTTP/1.1 405 Method Not Allowed');
    echo json_encode(array('status' => 'error', 'message' => 'Only POST requests are allowed.'));
}
?>