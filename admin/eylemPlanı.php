<?php session_start();

if(!(isset($_SESSION["kullanici_id"])))  header('Location: ../uyegiris.php'); ?>

<!----------------HEADER------------------>
<?php include "includes/admin_header.php" ?>  



    <!----------------ASIDE------------------>
    <?php include "includes/admin_aside.php" ?>  

    <main class="ep-main">
        <table class="ep-table" style=" width:800px; height:400px; margin-left:100px; float:left; margin-top:100px; text-align:center;" >
            <tr style=" background-color: darkblue; color:white;"><td colspan="4">EYLEM PLANI</td></tr>
            <tr><td style=" background-color: darkblue; color:white;">Eylem Maddesi</td><td style=" background-color: darkblue; color:white;" >Eylem Amacı</td><td style=" background-color: darkblue; color:white;" colspan="2">Eylem Yüzdesi</td></tr>
             
            <?php
            $sqql = "SELECT * FROM eylemler ORDER BY eylem_id ";
            $select_all_sqql = mysqli_query($conn,$sqql);
            $summ=0;
            $sayi=0;
            while($row = mysqli_fetch_assoc($select_all_sqql)){?>

                <form action=""method="post" role="form">   
                    <tr>
                        <td style=" background-color: silver;"><?php echo $row["eylem_kod"]; ?></td>
                        <td style=" background-color: silver;"><?php echo $row["eylem_isim"]; ?></td>
                        <td style=" background-color: silver;"><?php echo $row["eylem_percentage"]; ?>%</td>
                        <td style=" background-color: silver;   "><a style=" text-decoration: none;   color:black; "  href="uygulamaAdımı.php?ID=<?php echo $row['eylem_id'];?>">Göster</a></td>
                    </tr>

                    <?php
                    $summ += $row["eylem_percentage"]; 
                    $sayi++;
                    
                    ?>


                </form>
                 
            <?php } ?>
           
            <?php

            $sonucc = $summ/$sayi;
            $sonucc=(double) number_format($sonucc, 2, '.', '');
            
            ?>
            <tr><td colspan="2" style=" background-color: rgb(75, 75, 189); ">Genel Yüzde Toplam</td><td colspan="2" style=" background-color: rgb(75, 75, 189); "><?php echo $sonucc;?> %</td></tr>  

            

        </table>    
    </main>
  



















    
</body>   
</html> 