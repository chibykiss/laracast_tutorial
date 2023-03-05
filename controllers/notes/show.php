<?php

use Core\Database;
use Core\Response;

$config = require base_path('config.php');
$db = new Database($config['database']);

$currentUser = 3;


//check if post exists
$id = $_GET['id'];
$query = "select * from notes where id = :id";
$note = $db->query($query, ['id' => $id])->findorfail();

//check if note was created by the authorized user
authorize($note['user_id'] === $currentUser);

// if($note['user_id'] !== 3){
//     abort(Response::FORBIDDEN);
// }
// $page = 'Notes';
// require 'views/note.view.php';

view('notes/show.view.php', [
    'page' => 'Note',
    'note' => $note
]);
