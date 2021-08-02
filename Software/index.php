<?php include_once("html_frame/html_head.html"); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous" async>
</script>
<img src="./DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">
<form action="feldolgozok/login.php" method="POST">
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Email cím:</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" name="email" required>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Jelszó:</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" name="jelszo" required>
    </div>
  </div> 
  <button type="submit" class="btn btn-primary">Bejelentkezés</button>
</form>