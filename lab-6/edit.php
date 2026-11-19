<?php
require_once "update.php";
/** @var array|null $result  plz, update.php got you bro, you don gotta fill in with this error there's no $results thing (╥﹏╥) */
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
        <h1 class="h3 card-title mb-4">Edit Comment</h1>

            <form method="post" action="update.php">
                <div class="text-start">
                <p>Nama</p>
                <input type="text" class="form-control" id="name" name="name" size="40" required
                value="<?php echo $result["user"]; ?>">

                <p>Email</p>
                <input type="text" class="form-control" id="email" name="email" size="25" required
                value="<?php echo $result["email"]; ?>">

                <p>Comments</p>
                <textarea class="form-control" id="comment" name="comment" cols="30" rows="8" required><?php echo $result["comment"]; ?></textarea>

                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">

                <input class="btn btn-primary me-2 mb-2" type="submit" name="edit_form" value="Modify Comment">
                <input class="btn btn-outline-secondary me-2 mb-2" type="reset">
                <a class="btn btn-outline-secondary mb-2" href="list.php">Cancel</a>

                </div> 
            </form>

        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>