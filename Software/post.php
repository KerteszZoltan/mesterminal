<?php
include_once("html_frame/html_head.html");
if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION['aid'])){
    $adminId='';
}
else{
    $adminId=$_SESSION['aid'];
}

if($adminId != 0){
include_once("html_frame/html_body.html");
print '
<form action="feldolgozok/newPost.php" method="POST">
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Poszt megnevezés</span>
  <input type="text" name="post_name" class="form-control" placeholder="pl. karbantartó " required>
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">A megadott poszt kulcs pozíciónak jelölése</span>
  <input type="checkbox" style="height:40px" name="key_pozition" value="1">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">A megadott poszt támogató poszt</span>
  <input type="checkbox" style="height:40px" name="type" value="1">
</div>
<div class="input-group mb-3">
<input type="submit" value="Rögzítés" class="btn btn-primary">
</div>
</form>
';
include_once("lists/listPosts.php");
}
else{
    print '<img src="./DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
    print '<div class="input-group-text">Használat előtt jelentkezz be!<br></div>';
    print '<form action="index.php"><button type="submit" class="btn btn-primary">Bejelentkezés</button> </form>';
}
?>

