<?php session_start();

if(!(isset($_SESSION["kullanici_id"])))  header('Location: ../uyegiris.php'); ?>

<!----------------HEADER------------------>
<?php include "includes/admin_header.php" ?>  



    <!----------------ASIDE------------------>
    <?php include "includes/admin_aside.php" ?>  

    <main class="ua-main">
        
             
        <?php
        if(!isset($_GET["ID"]) ){
            print "Lütfen Eylem Planından Görmek İstediğiniz 
            Eylem Maddesini Seçin ";

        } 
        else { ?>

            <table class="ua-table" style=" width:800px; height:400px; margin-left:100px; float:left; margin-top:100px; text-align:center;" >
                <tr style=" background-color: darkblue; color:white;"><td colspan="4">UYGULAMA ADIMLARI</td></tr>
                <tr><td style=" background-color: darkblue; color:white;">Uygulama Adımı</td><td style=" background-color: darkblue; color:white;" >Uygulama Amacı</td><td style=" background-color: darkblue; color:white;" colspan="2">Uygulama Yüzdesi</td></tr>

               
              

                <?php             
                $sqql = "SELECT * FROM uygulamalar WHERE fk_eylem_id= '".$_GET['ID']."' ORDER BY uygulama_id ASC";
                $select_all_sqql = mysqli_query($conn,$sqql);
                
                while($row = mysqli_fetch_array($select_all_sqql)){?>              
                  	         


                    <form action=""method="post" enctype="multipart/form-data">               
                    
                        <tr>
                            <td style=" background-color: silver;"><?php echo $row["uygulama_kod"]; ?></td>
                            <td style=" background-color: silver;"><?php echo $row["uygulama_isim"]; ?></td>
                            <td style=" background-color: silver;"><?php echo $row["uygulama_percentage"]; ?>%</td>
                            <td style=" background-color: silver;   "><a style=" text-decoration: none;   color:black; "  href="faaliyetKartı.php?ID=<?php echo $row['uygulama_id'];?>">Göster</a></td>
                        </tr>

                    </form>


                       
                        
                <?php }?>


            

        

            </table>

            
        <?php } ?>

          
    </main>


</body> 
</html>                                                                                                                                                                                                                                                                                                                                    