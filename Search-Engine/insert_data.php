<?php

   $con=mysqli_connect("localhost","root","","my_search_engine");
    if(isset($_POST['submit'])){
        $w_title=$_POST['web_title'];
        $w_link=$_POST['web_link'];
        $w_Key=$_POST['web_keyword'];
        $w_desc=$_POST['web_desc'];
        $w_img=$_FILES['web_img']['name'];
        $w_img_temp=$_FILES['web_img']['tmp_name'];

        $insert_result=mysqli_query($con,"INSERT INTO website VALUES('','$w_title','$w_link','$w_Key',' $w_desc',' $w_img')");

        move_uploaded_file($w_img_temp,"assets/images/{$w_img}"); /*function moves the image file into images folder given in the path*/ 
        if($insert_result=='true'){

            echo "<script>alert('Data got inserted into Database')</script>";
        }
        else{
            echo "<script>alert('Some error occurs')</script>";
            exit();
        }

    }


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Insertion Page</title>
        <link rel="icon" href="assets/icons/data.png"/>
        <link rel="stylesheet"type="text/css" href="assets/css/insert.css"/>
    </head>
    <body>
        <form action="insert_data.php" method="POST" enctype="multipart/form-data">   <!--The enctype attribute specifies how the form-data should be encoded when submitting it to the server.-->
              <table align="center">
                <tr>
                    <td colspan="2"><h2>Inserting into new Website</h2> </td>
                </tr>
                <tr>
                    <td>Site Title:</td>
                    <td><input type="text" id="insert"name="web_title"autocomplete='off'required/></td>
                </tr>
                <tr>
                    <td>Site Link:</td>
                    <td><input type="text" id="insert"name="web_link"autocomplete='off'required/></td>
                </tr>
                <tr>
                    <td>Site Keyword:</td>
                    <td><input type="text" id="insert"name="web_keyword"autocomplete='off'required/></td>
                </tr>
                <tr>
                    <td>Site Description:</td>
                    <td ><textarea id="insert"name="web_desc"autocomplete='off'required/></textarea></td>
                </tr>
                <tr>
                    <td >Site Image:</td>
                    <td ><input type="file" id="insert"name="web_img"autocomplete='off'required/></td>
                </tr>
                <tr>
                
                    <td colspan="2"><input type="submit"id="add"name="submit"value="Add Data"/></td>
                </tr>
            </table>    
        </form>
    </body>
</html>