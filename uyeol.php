<!-- ------------------HEADER ------------------->
<?php include "includes/header.php" ?>

<?php 
if(isset($_POST["kayit"])){
    $sqll= "insert into kullanici(kullanici_adi,sifre) values('".$_POST["adi"]."','".$_POST["sifre"]."')";

    $sql_query = mysqli_query($conn,$sqll);

    session_start();
    $_SESSION["kullanici_id"] = mysqli_insert_id($conn);
    $_SESSION["kullanici_adi"] = $_POST["adi"];
    echo $_SESSION["kullanici_id"];
    header('Location: index.php');


}

?>


    <main class="uyeOlArkaPlan">
        <form action="" method="post">
            <div>
                
                <div class="uyeOlMenu">

                    <h1 class="baslık">Üye Ol</h1>
                    <br>
                    <hr>
                    <br><br>
                    <p>E-Posta</p>
                    <br>
                    <input type="text" name="adi" id="" placeholder="E-Posta Gir">
                    <br><br>
                    <p>Şifre</p>
                    <br>
                    <input type="password" name="sifre" id="" placeholder="Şifre Oluştur">
                    <br><br><br>
                    <input type="submit" name="kayit" value="Üye Ol">




                </div>              


            </div>

        </form>
    </main>      
    
</body>
</html>