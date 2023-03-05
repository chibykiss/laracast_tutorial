<?php

use Core\Database;
use Core\Validator;

require base_path('Core/Validator.php');
$config = require base_path('config.php');
$db = new Database($config['database']);

$error = [];


if (!Validator::string($_POST['body'], 1, 1000)) {
    $error['body'] = 'a body of no more than 1000 characters is required';
}

if (!empty($error)) {
   return view('notes/create.view.php', [
        'page' => 'Create Note',
        'error' => $error
    ]);
}


if (empty($error)) {
    $db->query('INSERT INTO notes(body,user_id) VALUES (:body, :user_id)', [
        'body' => $_POST['body'],
        'user_id' => 3
    ]);
}

header('Location: /notes');
exit;
