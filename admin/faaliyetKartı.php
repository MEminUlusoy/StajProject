<?php session_start();

if(!(isset($_SESSION["kullanici_id"])))  header('Location: ../uyegiris.php'); ?>

<!----------------HEADER------------------>
<?php include "includes/admin_header.php" ?>  



    <!----------------ASIDE------------------>
    <?php include "includes/admin_aside.php" ?>  


    <main class="fk-main">
        <?php
        if(isset($_POST["edit_faaliyet"])){
            $faaliyet_id= $_POST["faaliyet_id"];

            $edit_faaliyet_hedef = $_POST["faaliyet_hedef"];
            $edit_faaliyet_work = $_POST["faaliyet_work"];
                        
            $edit_faaliyet_tarih = $_POST["faaliyet_tarih"];
            
            $edit_faaliyet_percentage = $_POST["faaliyet_percentage"];
            $edit_faaliyet_real_percentage = $_POST["faaliyet_real_percentage"];
            $edit_faaliyet_calculate_percentage = $_POST["faaliyet_calculate_percentage"];

           
            $sql_query2 = "UPDATE faaliyetler SET faaliyet_hedef = '$edit_faaliyet_hedef' , faaliyet_work = '$edit_faaliyet_work' , faaliyet_tarih = '$edit_faaliyet_tarih' , faaliyet_percentage = '$edit_faaliyet_percentage', faaliyet_real_percentage = '$edit_faaliyet_real_percentage', faaliyet_calculate_percentage = '$edit_faaliyet_calculate_percentage'  WHERE faaliyet_id = '$faaliyet_id'";

            $edit_faaliyet_query = mysqli_query($conn, $sql_query2);


           

            
            $page = "SELECT fk_uygulama_id,fk_eylem_id FROM faaliyetler where faaliyet_id = ".$faaliyet_id;
            $select_page = mysqli_query($conn,$page);

            while($row = mysqli_fetch_array($select_page)){

            
            $page_uygulama_id =$row["fk_uygulama_id"];
            $page_eylem_id =$row["fk_eylem_id"];


            $page = "SELECT avg(f.faaliyet_real_percentage) ortalama,COUNT(*) sayi FROM  faaliyetler f WHERE  f.fk_uygulama_id= ".$page_uygulama_id;

            $select_page = mysqli_query($conn,$page);
            $row = mysqli_fetch_array($select_page);
                $ortalama=$row["ortalama"];
                
                $ortalama=(double) number_format($ortalama, 2, '.', '');

                $sql_query2 = "UPDATE uygulamalar SET uygulama_percentage = $ortalama  WHERE uygulama_id = $page_uygulama_id";

                 mysqli_query($conn, $sql_query2);





    
                $page = "SELECT avg (uygulama_percentage) ortalama,COUNT(*) sayi FROM  uygulamalar u WHERE  u.fk_eylem_id= ".$page_eylem_id;
                
                $select_page = mysqli_query($conn,$page);
                $row = mysqli_fetch_array($select_page);
                    $ortalama=$row["ortalama"];

                    $ortalama=(double) number_format($ortalama, 2, '.', '');

                    $sql_query2 = "UPDATE eylemler SET eylem_percentage = $ortalama  WHERE eylem_id = $page_eylem_id";

                     mysqli_query($conn, $sql_query2); 


                        



            

            header("Location: faaliyetKartı.php?ID=$page_uygulama_id");
            
            }




            
            

               
               

                
            
              

            
            
            





        }
        ?> 
        
        
        
     



        <?php
        if(!isset($_GET["ID"]) ){
            echo "Lütfen Uygulama Adımından Görmek İstediğiniz 
            Faaliyet Kartını Seçin ";

        } 
        else { ?>
            <table class="fk-table" >

                <?php

                $sql_id = "SELECT * FROM `eylemler`e,uygulamalar u WHERE e.`eylem_id`=u.fk_eylem_id  and u.uygulama_id=". $_GET['ID'] ;
                $select_sql_id = mysqli_query($conn,$sql_id);
                $row= mysqli_fetch_assoc($select_sql_id);

                ?>


                <tr style=" background-color: darkblue; color:white;"><td colspan="8">UYGULAMA ADIMI FAALİYET KARTI</td></tr>
                <tr><td style=" background-color: darkblue; color:white;">Eylem Adı</td><td style=" background-color: darkblue; color:white;" colspan="7" ><?php echo $row["eylem_kod"]; ?></td></tr>
                <tr><td style=" background-color: rgb(75, 75, 189); color:white; ">Uygulama Adımı</td><td style=" background-color: rgb(75, 75, 189); color:white;" colspan="7"><?php echo $row["uygulama_kod"]; ?> </td></tr>
                <tr><td style=" background-color: rgb(75, 75, 189); color:white; ">Tamamlanma Tarihi</td><td colspan="7"> 2023 </td></tr>
                <tr style=" background-color: darkblue; color:white; "><td  rowspan="50" >Gerçekleştirilecek Faaliyetler ve Toplam Gerçekleşmeye Olan Katkısı</td><td>Hedeflenen Faaliyetler</td><td>Toplam Gerçekleşmeye Olan Katkısı(%)</td><td>Planlanan Tamamlanma Tarihi</td><td>Gerçekleşen Çalışmalar</td><td colspan="3">Gerçek Yüzde</td></tr>
                            
                <?php
                $sql_query = "SELECT * FROM faaliyetler WHERE fk_uygulama_id= '".$_GET['ID']."' ORDER BY faaliyet_id ";
                $select_all_brands = mysqli_query($conn,$sql_query);
                $sum= 0;
                $say= 0 ;
                while($row = mysqli_fetch_assoc($select_all_brands)){ ?>

                   
                        
                    
                    <form action=""method="post" role="form">

                        
                            
                            
                                            
                            
                        <tr>
                            <td style=" background-color: silver;"><?php echo $row["faaliyet_hedef"]; ?></td><td style=" background-color: silver;"><?php echo $row["faaliyet_percentage"]; ?>%</td>
                            <td style=" background-color: silver;"><?php echo $row["faaliyet_tarih"]; ?></td><td style=" background-color: silver;"><?php echo $row["faaliyet_work"];?></td> 
                                
                                
                            
                                
                                            
                                                                                            

                            <td style=" background-color: silver; padding-right:10px; text-align:right;">
                                
                                <?php echo $row["faaliyet_real_percentage"]; ?>%
                            
                            </td>
                                
                            <td style=" background-color: silver;   "><a style=" text-decoration: none;   color:black; "  href="edit.php?ID=<?php echo $row['faaliyet_id'];?>">Düzenle</a></td>


                                
                                
                        </tr> 
                            
                            
                        <?php 
                                    
                        $sum = $sum +  $row["faaliyet_real_percentage"];

                        ?>                   
                                    
                                         
                            

                            
                    </form>
                    
                <?php } ?>

                
                <tr><td colspan="4" style=" background-color: rgb(75, 75, 189); ">Toplam</td>
                <td colspan="2" style=" background-color: rgb(75, 75, 189); ">
                    
                    <?php echo $sum;?>%
                </td></tr>

                
            </table>
        <?php } ?>    
        

    </main> 


        
</body>
</html>