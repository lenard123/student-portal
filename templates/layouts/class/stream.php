<div class="flex flex-col gap-4">

    <?php if(Auth::role('teacher')) : ?>
    <div class="bg-base-100 p-4 w-full rounded-lg shadow-lg">
        <div class="flex gap-4">
            <div class="avatar self-start">
                <div class="w-12 rounded-full">
                    <img src="<?= Auth::user()->avatar ?>">
                </div>
            </div>
            <form class="flex-grow flex flex-col gap-4" method="POST">
                <textarea 
                    required 
                    class="textarea textarea-bordered w-full" 
                    placeholder="Announce something to your class"
                    name="content" 
                ></textarea>

                <button name="action" value="post" class="btn btn-sm text-xs self-end">Post</button>
            </form>
        </div>
    </div>
    <?php endif ?>

    <?php if ($posts->isEmpty()) : ?>
        <div class="hero bg-base-100 border border-gray-300 rounded-lg">
            <div class="hero-content text-center">
                <div class="max-w-md">
                    <p class="py-24">Nothing has been posted yet</p>
                </div>
            </div>
        </div>
    <?php else : ?>
        <?php foreach($posts as $post) : ?>
            <?= component('components/post', compact('post', 'teacher')) ?>
        <?php endforeach ?>
    <?php endif ?>
</div>