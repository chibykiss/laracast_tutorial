<?php
$books = [
    [
        'name' => 'Animal Farm',
        'author' => 'andy weir',
        'release_year' => '1968',
        'purchaseUrl' => 'https://animal.purchase.com'
    ],
    [
        'name' => 'Things Fall apart',
        'author' => 'chinua achebe',
        'release_year' => '1998',
        'purchaseUrl' => 'https://animal.purchase.com'
    ],
    [
        'name' =>  'Dracula Untold',
        'author' => 'andy weir',
        'release_year' => '1978',
        'purchaseUrl' => 'https://animal.purchase.com'
    ]
];

//lambda or anonymous functions
// $filterByAuthor = function ($books,$author){
//     $filteredbooks = [];
//     foreach($books as $book){
//         if($book['author'] === $author){
//             $filteredbooks[] = $book;
//         }
//     }
//     return $filteredbooks;
// };

//filter function for author
// function filterByAuthor($books,$author){
//     $filteredbooks = [];
//     foreach($books as $book){
//         if($book['author'] === $author){
//             $filteredbooks[] = $book;
//         }
//     }
//     return $filteredbooks;
// }

//making it more generic
function filter($items, $key, $value)
{
    $filteredItems = [];
    foreach ($items as $item) {
        if ($item[$key] === $value) {
            $filteredItems[] = $item;
        }
    }
    return $filteredItems;
}

//refactoring again
function filter2($items, $fn)
{
    $filteredItems = [];
    foreach ($items as $item) {
        if ($fn($item)) {
            $filteredItems[] = $item;
        }
    }
    return $filteredItems;
}

//$filteredbooks = filter($books,'release_year','1978');
$filteredbooks = array_filter($books, function ($book) {
    return $book['release_year'] >= 1970;
});

require_once 'index.view.php';