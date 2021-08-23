<?php session_start();

if(!(isset($_SESSION["kullanici_id"])))  header('Location: ../uyegiris.php'); ?>

<!----------------HEADER------------------>
<?php include "includes/admin_header.php" ?>  


    <main>
    </main>    


<!----------------ASIDE------------------>
<?php include "includes/admin_aside.php" ?>  
    
</body>
</html>