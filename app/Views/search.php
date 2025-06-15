<?php if (!empty($error)): ?>
    <div class="alert alert-danger"><?= esc($error) ?></div>
<?php endif; ?>

<form action="/search/fetch" method="post">
    <?= csrf_field() ?>
    <input type="text" name="query" placeholder="Search for images/videos">
    <button type="submit">Search</button>
</form>
