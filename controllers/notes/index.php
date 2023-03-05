<?php
use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);
$query = "select * from notes where user_id = :id";
$posts = $db->query($query,['id' => 3])->get();
//dd($posts);

$page = 'Notes';
//require 'views/notes/index.view.php';

view('notes/index.view.php',[
    'page' => 'Notes',
    'posts' => $posts
]);
