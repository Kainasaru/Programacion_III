<?php

$queHago = isset($_POST['queHago']) ? $_POST['queHago'] : NULL;

$host = "localhost";
$user = "root";
$pass = "";
$base = "productos";

switch($queHago){

    case "establecerConexion":

        $con = @mysqli_connect($host, $user, $pass);

        echo "<pre>con = mysqli_connect(host, user, pass)</pre>";

        if(!$con)
        {
            echo "<pre>Error: No se pudo conectar a MySQL." . PHP_EOL;
            echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
            echo "error: " . mysqli_connect_error() . PHP_EOL . "</pre>";
            return;
        }

        echo "<pre>Éxito: Se realizó una conexión a MySQL!!!." . PHP_EOL;
        echo "Información del host: " . mysqli_get_host_info($con) . PHP_EOL . "</pre>";
        
        mysqli_close($con);

        echo "<pre>mysqli_close(con);</pre>";

    break;
    
    case "ejecutarConsulta":

        $con = @mysqli_connect($host, $user, $pass, $base);
        
        $sql = "SELECT * FROM producto";

        $rs = $con->query($sql);

        echo "<pre>
            con = mysqli_connect(host, user, pass, base); 
            sql = 'SELECT * FROM producto';
            rs = con->query(sql);
        </pre>";
        
        echo "<pre>";

        var_dump($rs);
        
        echo "</pre>";

        echo "<pre>Cantidad de filas: " . mysqli_num_rows($rs) . "<br>mysqli_num_rows(rs)</pre>";  

        mysqli_close($con);
        
        echo "<pre>mysqli_close(con);</pre>";
        
    break;
   
    case "mostrarConsulta":
    
        $con = @mysqli_connect($host, $user, $pass, $base);
        
        $sql = "SELECT * FROM producto";

        $rs = $con->query($sql);

        echo "<pre>
            con = mysqli_connect(host, user, pass, base); 
            sql = 'SELECT * FROM producto';
            rs = con->query(sql);
            </pre>";
        
        echo "<pre>
            while (row = rs->fetch_object()){
                user_arr[] = row;
            }                        
            </pre>";

        while ($row = $rs->fetch_object()){ //fetch_all / fetch_assoc / fetch_array([MYSQLI_NUM | MYSQLI_ASSOC | MYSQLI_BOTH])
            $user_arr[] = $row;
        }        
      
        echo "<pre>";
        
        var_dump($user_arr); 
            
        echo "</pre>";

        mysqli_close($con);
        
        echo "<pre>mysqli_close(con);</pre>";
        
    break;

    case "ejecutarInsert":
    
        $con = @mysqli_connect($host, $user, $pass, $base);
        
        $sql = "INSERT INTO producto (codigo_barra, nombre, path_foto)
                VALUES(1112, 'nombre_producto', 'fake.jpg')";

        $rs = $con->query($sql);

        echo "<pre>
            con = mysqli_connect(host, user, pass, base); 
            sql = 'INSERT INTO producto (codigo_barra, nombre, path_foto)';
            VALUES(1112, 'nombre_producto', 'fake.jpg')'
            rs = con->query(sql);
        </pre>";
        
        echo "<pre>Filas afectadas: " . mysqli_affected_rows($con) . "<br>mysqli_affected_rows(con)</pre>";  

        mysqli_close($con);
        
        echo "<pre>mysqli_close(con);</pre>";

        break;

    case "ejecutarUpdate":
    
        $con = @mysqli_connect($host, $user, $pass, $base);
        
        $sql = "UPDATE producto SET codigo_barra=555, nombre='otro_nombre', path_foto='otroFake.jpg'
                WHERE id = 2";

        $rs = $con->query($sql);

        echo "<pre>
            con = mysqli_connect(host, user, pass, base); 
            sql = 'UPDATE producto SET codigo_barra=555, nombre='otro_nombre', path_foto='otroFake.jpg'
            WHERE id = 2';
            rs = con->query(sql);
        </pre>";
        
        echo "<pre>Filas afectadas: " . mysqli_affected_rows($con) . "<br>mysqli_affected_rows(con)</pre>";  

        mysqli_close($con);
        
        echo "<pre>mysqli_close(con);</pre>";
        
    break;

    case "ejecutarDelete":
    
        $con = @mysqli_connect($host, $user, $pass, $base);
        
        $sql = "DELETE FROM producto WHERE id=2";

        $rs = $con->query($sql);

        echo "<pre>
            con = mysqli_connect(host, user, pass, base); 
            sql = 'DELETE FROM producto WHERE id=2';
            rs = con->query(sql);
        </pre>";
        
        echo "<pre>Filas afectadas: " . mysqli_affected_rows($con) . "<br>mysqli_affected_rows(con)</pre>";  

        mysqli_close($con);
        
        echo "<pre>mysqli_close(con);</pre>";
        
    break;

    default:
        echo ":(";

}