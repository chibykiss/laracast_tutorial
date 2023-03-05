<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/header.php') ?>
<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div>
            <ol class="">
                <?php foreach($posts as $post): ?>
                    <li class="text-blue-500 hover:underline mt-2">
                      <a href="/note?id=<?=$post['id']?>"><?= htmlspecialchars($post['body'])?></a>
                    </li>
                <?php endforeach; ?>
            </ol>
        </div>
        <div class="mt-6">
            <a class="bg-blue-600 p-2 text-white" href="/note/create">Create Note</a>
        </div>
    </div>
</main>
<?php require base_path('views/partials/footer.php') ?>