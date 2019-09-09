<!--Aplicación Nº 37 (Solicitud de empleo)
Confeccionar un formulario que permita ingresar en una serie de controles de tipo <input> (type=”text”) el nombre y 
apellido de una persona, su edad, su dirección, su mail y en un control de tipo <textarea> su currículum. Mostrar 
los datos cargados en una nueva página PHP.-->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario</title>
</head>

<body>
    <form action="./mostrar.php" method="POST">
        <h1>Carga de datos</h1>
        <fieldset style="width:10em;">
            <legend>Complete la información</legend>
            <table>
                <tbody>
                    <tr>
                        <td>Nombre:</td>
                        <td><input type="text" name="name" style="width:15em;" placeholder="Ingrese nombre..." required></td>
                    </tr>
                    <tr>
                        <td>Apellido:</td>
                        <td><input type="text" name="surname" style="width:15em;" placeholder="Ingrese apellido..." required>
                        </td>
                    </tr>
                    <tr>
                        <td>Edad:</td>
                        <td><input type="text" name="age" style="width:15em;" placeholder="Ingrese edad..." required></td>
                    </tr>
                    <tr>
                        <td>Dirección:</td>
                        <td><input type="text" name="adress" style="width:15em;" placeholder="Ingrese dirección..." required>
                        </td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><input type="email" name="email" style="width:15em;" placeholder="Ingrese email..." required></td>
                    </tr>
                    <tr>
                        <td>Curriculum Vitae:</td>
                        <td><textarea name="cv" style="width:15.4em;" placeholder="Curriculum..." required></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" value="Enviar" id="envBtn" style="width:21.5em;"></td>
                    </tr>
                </tbody>
            </table>
        </fieldset>
    </form>
</body>

</html>