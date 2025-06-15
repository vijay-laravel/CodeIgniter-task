<!-- app/Views/dashboard.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        .profile-img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #0d6efd; /* Bootstrap primary color */
            margin-bottom: 20px;
        }
        .nav-links a {
            margin-right: 15px;
            text-decoration: none;
            color: #0d6efd;
            font-weight: 500;
        }
        .nav-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container text-center mt-5">

    <a href="/profile" ><img src="/uploads/<?= esc($user['profile_picture']) ?>" alt="Profile Picture" title="edit" class="profile-img" /></a>
    
    <h1>Welcome, <?= esc($user['name']) ?></h1>

    <div class="nav-links mt-4">
        <!-- <a href="/profile" class="btn btn-outline-primary btn-sm">Edit Profile</a> -->
        <a href="/search" class="btn btn-outline-success btn-sm">Search Images</a>
        <a href="/auth/logout" class="btn btn-outline-danger btn-sm">Logout</a>
    </div>

</div>
</body>
</html>
