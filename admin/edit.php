<!----------------- HEADER ------------------> 
<?php
session_start();

if(!(isset($_SESSION["kullanici_id"])))  header('Location: ../uyegiris.php');
 include "includes/admin_header.php" ?>
 
 <!----------------ASIDE------------------>
 <?php include "includes/admin_aside.php" ?> 



    <main>

        <?php 
        $sql_query="SELECT * FROM faaliyetler where faaliyet_id=".$_GET["ID"]." ORDER BY faaliyet_id DESC";
        $select_all_brands = mysqli_query($conn, $sql_query );
        $k=1;                
        while($row = mysqli_fetch_assoc($select_all_brands)) {?>

            <form action="faaliyetKartı.php" method="post" enctype="multipart/form-data">

                <table class="fk-table" style=" padding-left:60px; margin-top:50px; ">
                    <tr style=" background-color: darkblue; color:white;"><td colspan="8">UYGULAMA ADIMI FAALİYET KARTI</td></tr>
                    <tr><td style=" background-color: darkblue; color:white;">Eylem Adı</td><td style=" background-color: darkblue; color:white;" colspan="7" >E1</td></tr>
                    <tr><td style=" background-color: rgb(75, 75, 189); color:white; ">Uygulama Adımı</td><td style=" background-color: rgb(75, 75, 189); color:white;" colspan="7">E1.1.</td></tr>
                    <tr><td style=" background-color: rgb(75, 75, 189); color:white; ">Tamamlanma Tarihi</td><td colspan="7">2023</td></tr>
                    <tr style=" background-color: darkblue; color:white; "><td  rowspan="5" >Gerçekleştirilecek Faaliyetler ve Toplam Gerçekleşmeye Olan Katkısı</td><td>Hedeflenen Faaliyetler</td><td>Toplam Gerçekleşmeye Olan Katkısı(%)</td><td>Planlanan Tamamlanma Tarihi</td><td>Gerçekleşen Çalışmalar</td><td colspan="3">Gerçek Yüzde</td></tr>
                                
                     
                            
                                            
                            
                    <tr>
                        <td style=" background-color: silver;"> 
                            <label for="faaliyet_hedef"></label>
                            <input value="<?php {echo $row["faaliyet_hedef"];} ?>" type="text" name="faaliyet_hedef" >
                        </td>
                        <td style=" background-color: silver;">

                            <label for="faaliyet_percentage"></label>
                            <input value="<?php {echo $row["faaliyet_percentage"];} ?>" type="text" name="faaliyet_percentage" > 
                            
                        %</td>
                        <td style=" background-color: silver;">
                        
                            <label for="faaliyet_tarih"></label>
                            <input value="<?php {echo $row["faaliyet_tarih"];} ?>" type="text" name="faaliyet_tarih" > 
                        
                        </td>
                        <td style=" background-color: silver;">
                            <label for="faaliyet_work"></label>
                            <input value="<?php {echo $row["faaliyet_work"];} ?>" type="text" name="faaliyet_work" > 
                        
                        </td>                                
                                
                            
                                
                                            
                                                                                            

                        <td style=" background-color: silver; padding-right:10px; text-align:right;">
                                
                            <label for="faaliyet_real_percentage"></label>
                            <input value="<?php {echo $row["faaliyet_real_percentage"];} ?>" type="text" name="faaliyet_real_percentage" > 
                            
                        </td>
                                
                        


                       
                        


                                
                    </tr>

                    <input type="hidden" name="faaliyet_id" value="<?php echo $row["faaliyet_id"]; ?>" >                  
                   
                    
                </table>
                <button style=" float:right; margin-right:248px; margin-top: 5px;  height:30px;  width:150px;" type="submit" name="edit_faaliyet" >Faaliyetleri Düzenle</button>

                
                

                     
                
                
            </form>

        <?php } ?>

        
        
      
    </main>

    
</body>
</html>                
