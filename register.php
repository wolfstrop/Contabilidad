<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "contabilidaddb";


    $conn = new mysqli($servername, $username, $password, $dbname);


    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

 
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $isAdmin = isset($_POST['isAdmin']) ? 1 : 0;

    // Preparar la consulta SQL
    $sql = "INSERT INTO userlist (User_Name, User_Pass, User_Tipe) VALUES ('$user', '$pass', '$isAdmin')";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        echo '<script type="text/javascript">';
        echo ' alert("¡Usuario registrado exitosamente!")';  // Mostrando el mensaje
        echo '</script>';
        header("location: ./menuAdmin.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();

?>