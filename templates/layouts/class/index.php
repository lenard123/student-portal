<?php
function active($page)
{
    global $active;
    return $page === $active ? 'bordered' : ''; 
}
?>
<div class="container py-8">
    <div class="bg-base-100 overflow-hidden rounded-lg">
        <div class="h-52 w-full relative">
            <img class="absolute w-full h-full inset-0 object-cover" src="<?= $class->cover ?>"/>
            <div class="absolute text-base-100 bottom-4 left-4">
                <div class="text-3xl font-bold"><?= $class->name ?></div>
                <div><?= $class->section ?></div>
            </div>
        </div>
    </div>

    <div class="flex gap-4  mt-4 w-full">
        <div class=" hidden md:flex flex-col min-w-[256px] gap-4">
            <div class="bg-base-100 p-4 rounded-lg border border-gray-300">
                <div class="font-semibold">Class Code</div>
                <div class="font-bold text-lg text-primary mt-2"><?= $class->code ?></div>
            </div>

            <ul class="menu bg-base-100 w-full rounded-lg border border-gray-300">
              <li class="<?= active('stream') ?>">
                <a href="<?= url(Auth::role() . '/class.php?code=' . $class->code) ?>">Stream</a>
              </li>
              <li class="<?= active('work') ?>">
                <a href="<?= url(Auth::role() . '/work.php?code=' . $class->code) ?>">Classwork</a>
              </li>
              <li class="<?= active('people') ?>">
                <a href="<?= url(Auth::role() . '/people.php?code=' . $class->code) ?>">People</a>
              </li>
            </ul>

        </div>

        <div class="flex-grow">
            <?= $slot ?>
        </div>
    </div>
</div>