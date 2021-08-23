<!-- ------------------HEADER ------------------->
<?php include "includes/header.php" ?>



    <main class="uyeGirisMain">
            
        <?php

            if(isset($_POST["GIRIS"])){

                $sql = "select * from kullanici where kullanici_adi = '".$_POST['ad']."' and sifre = '".$_POST['sifre']."'";
                echo $sql;
                $sql_get = mysqli_query($conn,$sql);

                if($row = mysqli_fetch_assoc($sql_get)){

                    echo "giriş yaptınız";
                    session_start();
                    $_SESSION["kullanici_id"] = $row["kid"];
                    $_SESSION["kullanici_adi"] = $row["kullanici_adi"];
                    echo $_SESSION["kullanici_id"];
                    header('Location: admin/adminMenu.php');

                }
                else{
                    echo "kayıtlı değilsiniz";
                }

            }
            else{





        ?>




        
        <form action="" method="post">
            <div>
                    
                <div class="uyeGirisMenu">

                    <h1 class="baslık">Giriş Yap</h1>
                    <br>
                    <hr>
                    <br><br>
                    <p>E-Posta</p>
                    <br>
                    <input type="text" name="ad" id="" placeholder="Kullanıcı Adınızı Giriniz">
                    <br><br>
                    <p>Şifre</p>
                    <br>
                    <input type="password" name="sifre" id="" placeholder="Şifrenizi Giriniz">
                    <br><br><br>
                    <input type="submit" name="GIRIS" value="Giriş Yap">




                </div>           
                    
            </div>

        </form>
        
        <?php }  ?>
        



    </main>









</body>
</html>