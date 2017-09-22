<?php



var_dump($_FILES); 

move_uploaded_file($_FILES['logo']['tmp_name'], './upup.jpg');