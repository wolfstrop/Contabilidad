<?php

    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "contabilidaddb";


    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    if (mysqli_connect_errno()) {
        die("error de conexion: ". mysqli_connect_error());

    }

    $nombre = $_POST["usuario"];
    $pass = $_POST["contrasena"];

    $query = mysqli_query($conn,"SELECT * FROM userlist WHERE User_Name = '".$nombre."' AND User_Pass = '".$pass."'");

    if($query){
        $nr = mysqli_num_rows($query);
    }
    else{
        echo "Error: " . mysqli_error($conn);
    }

    if($nr){
        
        $result = mysqli_query($conn, "SELECT User_Tipe FROM userlist WHERE User_Name ='".$nombre."'");
        
        if($result){
            
            $row = mysqli_fetch_assoc( $result );
            $isAdmin = $row['User_Tipe'];

            if($isAdmin == 1){
                header("location: ./Admin/menuAdmin.html");
            }

            else if ($isAdmin == 0){
                header("location: ./User/menuUser.html");
            }

        }
        
        else{
            echo "Error: " . mysqli_error($conn);
        }
    
    }
    else{

        echo "El Usuario y/o la contraseña estan incorrectos";

    }
?>