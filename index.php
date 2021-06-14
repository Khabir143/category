<!-- //database connecion// -->


<?php

 $db = mysqli_connect("localhost", "root", "", "jamalpurtoday");

  if($db){
    // echo "The connection is alright";
  }else{
    echo"Connection is error";
  }


?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Ticket</title>
  </head>
  <body>
    <center>
      <h1 class="my-5">CRUD Operation in PHP</h1>
    </center>

    <div class="container">
      <div class="row">

        <!-- //form design// -->
        <div class="col-md-6">
          
           <form method="POST">
             
             <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Add a new Category</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" name="cat_name" placeholder="Category Name">
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Category Descrpion</label>
  <textarea  name ="desc" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>

  <input type="submit" class="btn btn-primary" name="add_cat" value="add Category">
           </form>


        </div>
      <?php

    if(isset($_POST['add_cat'])){
         
         $cat_name=$_POST['cat_name'];
         $cat_desc=$_POST['desc'];

         echo $cat_name ." ". $cat_desc;

                             
         $sql= "INSERT INTO category(c_name,c_desc) VALUES ('$cat_name','$cat_desc')";
         
         $result = mysqli_query($db,$sql);

       if($result){

        echo "value inserted";
       }else{

        echo "error";
       }



}

   

   ?>

        <div class="col-md-6">
          <table class="table">
  <thead>
    <tr>
      <th scope="col">Number</th>
      <th scope="col">Category</th>
      <th scope="col">Description</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>

   <?php

          $count=0;
    $sql2 ="SELECT * FROM category";
    $result = mysqli_query($db,$sql2);
          while($val = mysqli_fetch_assoc($result)){
             $name= $val['c_name'];
            $desc=$val['c_desc'];
            $count++;
       
        ?>
        
       <tr>
      <th scope="row"><?php echo $count; ?></th>
      <td><?php echo $name; ?></td>
      <td><?php echo $desc; ?></td>
     
    </tr>
         <?php  



         }  



   ?>


    
    
  </tbody>
</table>
        </div>
        
      </div>
      
    </div>

   


   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    
  </body>
</html>