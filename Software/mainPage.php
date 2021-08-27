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
include_once("connection.php");
include_once("html_frame/html_body.html");
print '
<div style="margin: 10px 10px 10px 10px">
<h2> Működési leírás </h2>
<h3> Alapadatok </h3>
<p>Az alapadatok menüpont alatt tudjuk kezelni a termékeket és az ahhoz tartozó csatolmányokat, gépeket és ahhoz tartozó szerszámokat 
és itt van lehetőségünk hiba, illetve telephely feltöltésre is. 
Ugyanezen menüpont alatt van lehetőségünk a dolgozók kezeléséhez is.<br> 
Ahhoz, hogy csatolmányt tudjunk feltölteni szükséges terméket kiválasztani, amennyiben az adott termék még nincs fent a rendszerben úgy először azt szükséges feltölteni. <br>
Ahhoz, hogy szerszámot tudjunk feltölteni, a szükséges gépet kiválasztani, amennyiben az adott gép még nincs fent a rendszerben úgy először azt szükséges feltölteni. <br>
Dolgozó feltöltés: amennyiben a dolgozó nem adminisztrátor az email cím és jelszó mezőt kérlek hagyd üresen.</p>
<h2> Gyártás előkészítése </h2>
<p>Amennyiben új termék került a palettánkra szükség esetén gyártási lépést kell feltölteni a rendszerbe. 
A gyártási lépés feltöltéséhez kategóriát kell választani vagy új kategóriát létrehozni. </p>
<h3> Gyártás </h3>
<p> 
Ahhoz, hogy egy gyártási rendelést hozzunk létre, a következő mezőket kell kitöltenünk:
<li>Gyártási rendelés típusa</li>
<li>Telephely</li>
<li>Termék</li>
<li>Gyártási rendelés státusz</li>
Ahhoz, hogy gyártási rendeléshez tartozó műveleti lépéseket tudjunk társítani a következő mezőket kell minimum kitölteni:
<li>Gyártási rendelés</li>
<li>Gyártási lépés</li>
Műveleti lapot úgy lehet dolgozóhoz társítani, hogy a következő adatokat kell megadni:
<li>Dolgozó</li>
<li>Műveleti lap</li>
Amennyiben az adminisztrátor nem tudja, hogy az adott műveletet ki fogja elvégezni úgy a „Még nem definiált” lehetőséget kell választania. <br>
Műveleti lépéshez dolgozót úgy lehet hozzárendelni, hogy a gyártás menüponton belül a Műveleti lap dolgozói fülön az adott művelethez hozzáadjuk a dolgozót. </p>
</div>
';
}
else{
    print '<img src="./DOC/img/mesterminal.jpg" alt="" width="100%" height="30%" class="d-inline-block align-text-top">';
    print '<div class="input-group-text">Használat előtt jelentkezz be!<br></div>';
    print '<form action="index.php"><button type="submit" class="btn btn-primary">Bejelentkezés</button> </form>';
}
?>