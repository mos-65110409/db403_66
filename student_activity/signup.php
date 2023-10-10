<?php
    require 'connect.php';
    if (isset($_POST['submit'])) {
      $studentID = $_POST['studentID'];
      $studentName = $_POST['studentName'];
      $majorID = $_POST['major'];
      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
      $sql = "insert into student(studentID ,studentName , majorID , password)
       values('$studentID', '$studentName', '$majorID', '$password')";
       
       $conn->query($sql);
    }
    
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>student activity > Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
      html,
      body {
        height: 100%;
      }

      .form-signin {
        max-width: 330px;
        padding: 1rem;
      }

      .form-signin .form-floating:focus-within {
        z-index: 2;
      }

    </style>
    <script>
      function validate() {
        let p1 = document.querySelector('#password').value;
        let p2 = document.querySelector('#re-password').value;
        if (p1 != p2) {
          alert('Passwords are not identical.')
          event.preventDefault();
        }
      }
    </script>
  </head>
  <body class="d-flex align-items-center py-4 bg-body-tertiary">
    <main class="form-signin w-100 m-auto">
      <form action="signup.php" method="post" onsubmit="validate()">
        <img class="mb-4" src="img/one piece.png" alt="" width="200" height="">
        <!-- <img src="..." class="card-img" alt="...">         -->
        <h1 class="h3 mb-3 fw-normal">Please sign up</h1>
        <div class="form-floating mb-2">
          <input required name="studentID" type="text" class="form-control" id="student_id" placeholder="">
          <label for="student_id">Student ID</label>
        </div>
        <div class="form-floating mb-1">
          <input require name="studentName" type="text" class="form-control" id="student_name" placeholder="">
          <label for="student_name">Student Name</label>
        </div>
        <div class="form-floating mb-2">
          <select name="major" class="form-control" id="major">
        <?php 
            $sql = 'select * from major order by faculty';
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<option value ='{$row['majorID']}'>
                {$row['faculty']}-{$row['majorName']}
                </option>";
            }
            $conn->close();
        ?>
        </select>
          <label for="major">majorID</label>
        </div>
        <div class="form-floating mb-2">
          <input require name="password" type="password" class="form-control" id="password" placeholder="">
          <label for="password">Password</label>
        </div>
        <div class="form-floating mb-2">
          <input require type="password" class="form-control" id="re-password" placeholder="">
          <label for="re-password">Retype-Password</label>
        </div>
        
        <button name="submit" class="btn btn-primary w-100 py-2" type="submit">Sign up</button>
        <p class="mt-5 mb-3 text-body-secondary">© 2017–2023</p>
      </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
