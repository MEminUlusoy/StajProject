<?php session_start();

if(!(isset($_SESSION["kullanici_id"])))  header('Location: ../uyegiris.php'); ?>

<!----------------HEADER------------------>
<?php include "includes/admin_header.php" ?>  



    <!----------------ASIDE------------------>
    <?php include "includes/admin_aside.php" ?>  


    <main class="fk-main">
       

        <form action=""method="post"  enctype="multipart/form-data">
        
               
            <table class="fk-table" >

                <tr style=" background-color: darkblue; color:white;"><td colspan="8">UYGULAMA ADIMI FAALİYET KARTI</td></tr>
                <tr>
                    <td style=" background-color: darkblue; color:white;">Eylem Adı</td>

                    <td style=" background-color: darkblue; color:white;" colspan="7" >
                    
                        <label for="faaliyet_eylem_kod"></label>
                        <input value="" type="text" name="faaliyet_eylem_kod" >
                   
                    </td>
                </tr>

                <tr>
                    <td style=" background-color: rgb(75, 75, 189); color:white; ">Uygulama Adımı</td>
                    <td style=" background-color: rgb(75, 75, 189); color:white;" colspan="7">
                        <label for="faaliyet_uygulama_kod"></label>
                        <input value="" type="text" name="faaliyet_uygulama_kod" >
                   
                    </td>
                </tr>

                <tr>
                    <td style=" background-color: rgb(75, 75, 189); color:white; ">Tamamlanma Tarihi</td>
                    <td colspan="7">
                        2023
                   
                    </td>
                </tr>

                <tr style=" background-color: darkblue; color:white; "><td  rowspan="50" >Gerçekleştirilecek Faaliyetler ve Toplam Gerçekleşmeye Olan Katkısı</td><td>Hedeflenen Faaliyetler</td><td>Toplam Gerçekleşmeye Olan Katkısı(%)</td><td>Planlanan Tamamlanma Tarihi</td><td>Gerçekleşen Çalışmalar</td><td colspan="3">Gerçek Yüzde</td></tr>                           
                                  
                   
                                                    
                            
                         
                                            
                            
                <tr>
                    <td style=" background-color: silver;">
                        <label for="faaliyet_hedef"></label>
                        <input value="" type="text" name="faaliyet_hedef" >
                    
                    </td>

                    <td style=" background-color: silver;">
                        <label for="faaliyet_percentage"></label>
                        <input value="" type="text" name="faaliyet_percentage" > %
                               
                    </td>

                    <td style=" background-color: silver;">
                        <label for="faaliyet_tarih"></label>
                        <input value="" type="text" name="faaliyet_tarih" > 
                    </td>

                    <td style=" background-color: silver;">
                        <label for="faaliyet_work"></label>
                        <input value="" type="text" name="faaliyet_work" > 
                    </td>                      
                                
                            
                                
                                            
                                                                                            

                    <td style=" background-color: silver; padding-right:10px; text-align:right;">
                                
                        %
                            
                    </td>
                                
                    <td style=" background-color: silver;   ">
                        Düzenle
                    </td>


                                
                                
                </tr> 
                            
                            
                       
                                         
                            

                            
                    
                    
               

                
                <tr><td colspan="4" style=" background-color: rgb(75, 75, 189); ">Toplam</td><td colspan="2" style=" background-color: rgb(75, 75, 189); ">%</td></tr>

                
            </table>

            <button style=" float:left; margin-left:730px; margin-top: 5px;  height:30px;  width:150px;" type="submit" name="create_faaliyet" >Oluştur</button>

        </form>



        <?php

        if(isset($_POST["create_faaliyet"])){
            $create_faaliyet_eylem_kod = $_POST["faaliyet_eylem_kod"];
            $create_faaliyet_uygulama_kod = $_POST["faaliyet_uygulama_kod"];
            $create_faaliyet_hedef = $_POST["faaliyet_hedef"];
            $create_faaliyet_percentage = $_POST["faaliyet_percentage"];
            $create_faaliyet_tarih = $_POST["faaliyet_tarih"];
            $create_faaliyet_work = $_POST["faaliyet_work"];



            $sql_faaliyet_sorgu = "SELECT e.eylem_kod, e.eylem_id, u.uygulama_kod, u.uygulama_id FROM `eylemler`e,uygulamalar u WHERE e.`eylem_id`=u.fk_eylem_id" ;
            
            
            $x = mysqli_query($conn, $sql_faaliyet_sorgu);
            while($row = mysqli_fetch_assoc($x)){

               
                if($create_faaliyet_eylem_kod == $row["eylem_kod"] && $create_faaliyet_uygulama_kod == $row["uygulama_kod"] ) {
                    $id_eylem = $row["eylem_id"];
                    $id_uygulama = $row["uygulama_id"];            
                                 
                
                    $create_sql = "INSERT INTO faaliyetler(faaliyet_hedef,faaliyet_percentage,faaliyet_tarih, faaliyet_work, fk_eylem_id, fk_uygulama_id) VALUES ('{$create_faaliyet_hedef}', '{$create_faaliyet_percentage}', '{$create_faaliyet_tarih}', '{$create_faaliyet_work}', '{$id_eylem}', '{$id_uygulama}' ) ";
                    mysqli_query($conn,$create_sql);
                    echo "başarılı";
                    
                    

                }
                else{

                    echo "hata verdi";
                }                          
                
                 
                

                
                
                                                               
            }
            
            
            
            
            

            
            

        }


        ?>
    
           
        

    </main> 


        
</body>
</html>