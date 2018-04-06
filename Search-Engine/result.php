

<!DOCTYPE html>
<html lang="en">
<head>
   
    <link rel="icon" href="assets/icons/result.png"/>
    <link rel="stylesheet"type="text/css" href="assets/css/res.css"/>
    <title>Result Page</title>
</head>
<body>
<form action="result.php" method="POST">
	
	
<div class="search_box">
	<input type="text"id="in1"name="Uquery" placeholder="Type here..."autocomplete='off'required/>  <!--autocomplete will clear the input field on reload-->
	<input type="submit" id="btn1" name="search"value="My Search"/>
	</div>
    <a href="search.htm"><button>Go back</button></a>
    <?php

    $con=mysqli_connect("localhost","root","","my_search_engine");
    if(isset($_POST['search'])){
        $user_value=$_POST['Uquery'];

        $search_result=mysqli_query($con,"SELECT * FROM website WHERE keywords LIKE '%$user_value%'");
        
        $row_result=mysqli_fetch_array($search_result);
      
        if(mysqli_num_rows($search_result)<1){
            echo"<center><b>Oops! nothing found in database</b></center>";

        }
            
            $w_title=$row_result['title'];
            $w_link=$row_result['link'];
            $w_description=$row_result['description'];
            $w_image=$row_result['images'];
            $w_image = trim($w_image);

            $name ='<img id="tag" src="assets/images/'.$w_image.'">';
          
           
            echo"<div class='show'><h2>$w_title</h2><br><a href='$w_link'target='_blank'>$w_link</a><p> $w_description</p>$name</div>";
              
    }


    ?>
	
    
</body>
</html>