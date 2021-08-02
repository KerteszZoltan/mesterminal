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
include_once("connection.php");
print '<form action="feldolgozok/newUserPost.php" method="POST">
        <div class="input-group mb-3">
        <div class="input-group mb-3">
        <label class="input-group-text" for="workers">Dolgozó</label>
        <select name="workerId" class="form-select" id="workers">
          <option selected>Válassz Dolgozót</option>
';
$selectUser="SELECT * FROM `user`";
$selectPost="SELECT * FROM `post`";
$resultUser = $conn -> query($selectUser);
$resultPost = $conn -> query($selectPost);
if ($resultUser->num_rows > 0) {
    while($row = $resultUser->fetch_assoc()) {
        print '
          <option value="'.$row['ID'].'">'.$row['user_name'].'</option>
        ';
    }
}
print '</select>
<div class="input-group mb-3">
  <div class="input-group mb-3">
  <label class="input-group-text" for="postId">Poszt</label>
  <select name="postId" class="form-select" id="postId">
    <option selected>Válassz Posztot</option>';
    if ($resultPost->num_rows > 0) {
        while($row = $resultPost->fetch_assoc()) {
            print '
              <option value="'.$row['ID'].'">'.$row['post_name'].'</option>
            ';
        }
    }
    print'
  </select>
</div>
  <input type="submit" value="Rögzítés" class="btn btn-primary">
</div>
</form>
';
include_once("lists/listUserPosts.php");

}
else{
    print '<img src="./DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
    print '<div class="input-group-text">Használat előtt jelentkezz be!<br></div>';
    print '<form action="index.php"><button type="submit" class="btn btn-primary">Bejelentkezés</button> </form>';
}

?>