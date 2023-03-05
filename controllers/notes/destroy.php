<?php

use Core\Database;
use Core\Response;

$config = require base_path('config.php');
$db = new Database($config['database']);



$currentUser = 3;


$note = $db->query(
    'select * from notes where id = :id',
    ['id' => $_POST['id']]
)->findorfail();

authorize($note['user_id'] === $currentUser);

$db->query('DELETE FROM notes WHERE id = :id', [
    'id' => $_POST['id']
]);

//after deletion, redirect to notes
header('Location: /notes');
exit;
