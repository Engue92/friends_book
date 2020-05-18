<!DOCTYPE html>
<html>

<head>
  <title>Friends book</title>
</head>

<body> 
    
  <?php
    include("header.html"); 
  ?>

  <h1>My Best Friends !</h1>

    <form action="friends_book.php" method="post">
       Nom : <input type="text" name="name2" >
       <input type="submit" name="envoi">
       <input type="text" name="nameFilter" value="<?php if(empty($_POST['nameFilter'])) $nameFilter = NULL;?>" >
       <input type="submit" name="envoi2">
    </form>
    <br>

    <div>
    <?php
    $filename = 'friends_list.txt';
      if(isset($_POST['envoi2']))
      {
        echo "THE FILTOR IS:".$_POST['nameFilter']."<br/><br/><br/>";
        echo "\n";
      }
    
    $name = $_POST['name2'];
    $file = fopen( $filename, "a" );
      if ("$name" != NULL) 
      {      
        fwrite( $file, "$name\n");
      }

    $file = fopen( $filename, "r" );
    $nameFilter = $_POST['nameFilter'];
    $file2 = fopen($filename, "r");

      while (!feof($file))
      {
          // reading file
        if ($nameFilter != NULL)
        {        

          if (strstr(fgets($file),"$nameFilter",false) != NULL)
          {
              $ligne =fgets($file2)."<br/>";
              echo $ligne;
          }
          else
          {
            fgets($file2);
          }
        }
        else
        {
          echo fgets($file)."<br/>";
        }
      }
      
    ?>
</div>

  <?php
    include("footer.html"); 
  ?>

</body>
</html>
