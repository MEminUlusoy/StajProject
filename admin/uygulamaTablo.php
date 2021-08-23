<?php session_start();

if(!(isset($_SESSION["kullanici_id"])))  header('Location: ../uyegiris.php'); ?>

<!----------------HEADER------------------>
<?php include "includes/admin_header.php" ?>  



    <!----------------ASIDE------------------>
    <?php include "includes/admin_aside.php" ?>  

    <main class="ua-main">
        
    
        <form action=""method="post" enctype="multipart/form-data">  
            <table class="ua-table" style=" width:800px; height:400px; margin-left:100px; float:left; margin-top:100px; text-align:center;" >
                <tr style=" background-color: darkblue; color:white;"><td colspan="5">UYGULAMA ADIMLARI</td></tr>
                <tr><td style=" background-color: darkblue; color:white;">Uygulama Adımı</td><td style=" background-color: darkblue; color:white;" >Uygulama Amacı</td><td style=" background-color: darkblue; color:white;" >Eylem İsmini Yazın</td><td style=" background-color: darkblue; color:white;" colspan="2">Uygulama Yüzdesi</td></tr>                           
                           
                              
                               
                        
                <tr>
                    <td style=" background-color: silver;">
                        <label for="uygulama_kod"></label>
                        <input value="" type="text" name="uygulama_kod" >
                    </td>

                    <td style=" background-color: silver;">
                        <label for="uygulama_isim"></label>
                        <input value="" type="text" name="uygulama_isim" >
                    </td>

                    <td style=" background-color: silver;">
                        <label for="uygulama_sec"></label>
                        <input value="" type="text" name="uygulama_sec" >
                    </td>

                    <td style=" background-color: silver;">
                        %
                    </td>

                    <td style=" background-color: silver;   ">
                        Göster
                    </td>

                </tr>
                    
                
                    

                
                    
                

            </table>
            
            <button style=" float:left; margin-left:730px; margin-top: 5px;  height:30px;  width:150px;" type="submit" name="create_uygulama" >Oluştur</button>
        </form>
        
        

        <?php

        if(isset($_POST["create_uygulama"])){
            $create_uygulama_kod = $_POST["uygulama_kod"];
            $create_uygulama_isim = $_POST["uygulama_isim"];
            $create_uygulama_sec = $_POST["uygulama_sec"];


            $sql_sorgu = "SELECT eylem_kod, eylem_id FROM eylemler";
            $x = mysqli_query($conn, $sql_sorgu);
            while($row = mysqli_fetch_assoc($x)){

               
                if($create_uygulama_sec == $row["eylem_kod"]) {
                    $id = $row["eylem_id"];          
                                 
                
                    $create_sql = "INSERT INTO uygulamalar(uygulama_kod,uygulama_isim,fk_eylem_id) VALUES ('{$create_uygulama_kod}', '{$create_uygulama_isim}', '{$id}' ) ";
                    mysqli_query($conn,$create_sql);
                    
                    

                }                          
                
                 
                

                
                
                                                               
            }
            
            
            
            
            

            
            

        }


        ?>

                 
      
          

     

       
         
       

          
    </main>


</body> 
</html>                                                                                                                                                                                                                                                                                                                                    