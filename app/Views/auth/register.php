<!-- app/Views/auth/register.php -->
 <?php if (isset($validation)) : ?>
    <div><?= $validation->listErrors(); ?></div>
<?php endif; ?>
<form action="/auth/registerProcess" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <input type="text" name="name" placeholder="Name" value="<?= old('name') ?>">
    <input type="email" name="email" placeholder="Email" value="<?= old('email') ?>">
    <input type="password" name="password" placeholder="Password">
    <input type="file" name="profile_picture" accept="image/*">
    <button type="submit">Register</button>
</form>
