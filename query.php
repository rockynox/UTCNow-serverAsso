<?php
/**
 * Created by PhpStorm.
 * User: alexandreabrantes
 * Date: 6/6/16
 * Time: 8:02 PM
 */

if (isset($_POST['password']) && $_POST['password'] == 'InTheWhiteBoardWeTrust') {
    // Database connection
    try {
        $db = new PDO('mysql:host=sql.mde.utc;dbname=utcnow;charset=utf8', 'utcnow', 'dM9dLe62');
    } catch (Exception $e) {
        die('Err : ' . $e->getMessage());
    }

    // Execute query
    $query = $_GET['query'];
    $response = $db->query($query);
    $data = $response->fetchAll(PDO::FETCH_ASSOC);

    // Return JSON encoded response
    echo json_encode($data);
} else {
    echo 'Error: The password is either undefined or incorrect';
}
