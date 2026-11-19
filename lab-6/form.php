<?php
require_once "insert.php";
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My Guestbook</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
  <div class="row">
    <div class="col-12 col-md-8 col-lg-6 mx-auto">
      <div class="card border-0 shadow-sm">
        <div class="card-body p-4 p-md-5 text-center">
          <h1 class="h3 card-title mb-4">Add a comment</h1>
          <form method="post" action="#">
            <div class="text-start">
            <p>Nama</p>
            <input class="form-control mb-2" type="text" id="name" name="name" size="40" required>
            <p>Email</p>
            <input class="form-control mb-2" type="text" id="email" name="email" size="25" required>
            <p>Comments</p>
            <textarea class="form-control mb-2" id="comment" name="comment" cols="30" rows="8" required></textarea>
            <hr style="border: none">
            </div>

            <div class="text-start">
                <input class="btn btn-primary me-2 mb-2" type="submit" name="add_form" value="Add a New Comment">
                <input class="btn btn-outline-secondary me-2 mb-2" type="reset">
                <a class="btn btn-outline-secondary me-2 mb-2" href="index.php">Home</a>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>

</body>
</html>