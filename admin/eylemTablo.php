<?php session_start();

if(!(isset($_SESSION["kullanici_id"])))  header('Location: ../uyegiris.php'); ?>

<!----------------HEADER------------------>
<?php include "includes/admin_header.php" ?>  



    <!----------------ASIDE------------------>
    <?php include "includes/admin_aside.php" ?>  

    <main class="ep-main">

        <form action="" method="post" enctype="multipart/form-data">
            <table class="ep-table" style=" width:800px; height:400px; margin-left:100px; float:left; margin-top:100px; text-align:center;" >
                <tr style=" background-color: darkblue; color:white;"><td colspan="4">EYLEM PLANI</td></tr>
                <tr><td style=" background-color: darkblue; color:white;">Eylem Maddesi</td><td style=" background-color: darkblue; color:white;" >Eylem Amacı</td><td style=" background-color: darkblue; color:white;" colspan="2">Eylem Yüzdesi</td></tr>
                
            
                <tr>
                    <td style=" background-color: silver;">
                        <label for="eylem_kod"></label>
                        <input value="" type="text" name="eylem_kod" >
                    </td>

                    <td style=" background-color: silver;">
                        <label for="eylem_isim"></label>
                        <input value="" type="text" name="eylem_isim" >
                    </td>

                    <td style=" background-color: silver;">
                    %
                    </td>

                    <td style=" background-color: silver;   ">
                        Göster
                    </td>

                </tr>
                
                <tr>
                    <td colspan="2" style=" background-color: rgb(75, 75, 189); ">Genel Yüzde Toplam</td><td colspan="2" style=" background-color: rgb(75, 75, 189); "> %</td> 

                </tr>
                
                

            
                
            

            </table> 
            
            <button style=" float:left; margin-left:720px; margin-top: 5px;  height:30px;  width:150px;" type="submit" name="create_eylem" >Oluştur</button>

        </form>


        <?php

        if(isset($_POST["create_eylem"])){
            $create_eylem_kod = $_POST["eylem_kod"];
            $create_eylem_isim = $_POST["eylem_isim"];
            
            
            $create_sql="INSERT INTO eylemler(eylem_kod,eylem_isim) VALUES ('$create_eylem_kod', '$create_eylem_isim') ";
            $select_table = mysqli_query($conn,$create_sql);
            

            header("Location: eylemPlanı.php");
            

        }


        ?>







    </main>
  



















    
</body>   
</html> 