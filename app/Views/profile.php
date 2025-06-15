<!-- app/Views/profile.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Update Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: #f8f9fa;
        }
        .profile-update-form {
            max-width: 500px;
            margin: 50px auto;
            background: #fff;
            padding: 30px 40px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        .profile-img-preview {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid #0d6efd;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="profile-update-form">
    <h3 class="mb-4 text-center">Update Your Profile</h3>

    <!-- Show current profile picture -->
    <?php if (!empty($user['profile_picture'])): ?>
        <div class="text-center">
            <img src="/uploads/<?= esc($user['profile_picture']) ?>" alt="Profile Picture" class="profile-img-preview">
        </div>
    <?php endif; ?>

    <form action="/profile/update" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input
                type="text"
                class="form-control"
                id="name"
                name="name"
                value="<?= esc($user['name']) ?>"
                required
            >
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input
                type="email"
                class="form-control"
                name="email"
                value="<?= esc($user['email']) ?>"
                required
            >
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">New Password (leave blank to keep current)</label>
            <input
                type="password"
                class="form-control"
                name="password"
                placeholder="Enter new password"
            >
        </div>

        <div class="mb-4">
            <label for="profile_picture" class="form-label">Change Profile Picture</label>
            <input
                class="form-control"
                type="file"
                name="profile_picture"
                accept="image/*"
            >
        </div>

        <button type="submit" class="btn btn-primary w-100">Update Profile</button>
    </form>
</div>

</body>
</html>
