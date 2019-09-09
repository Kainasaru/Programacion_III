<!--Aplicación Nº 30 (Generar Tabla III)
Utilizando tags de Html (<table>, <tr> y <td>) se pide generar en forma dinámica una tabla.
Dicha tabla se formará a partir de los valores de dos controles de tipo <select>. Cada uno de
estos controles contendrá valores desde el 1 hasta el 50.
Al pulsar el control <input> (type=”button”) con la leyenda “Generar Tabla”, se invocará a un
procedimiento que creará la tabla a partir de la cantidad seleccionada de filas y columnas.-->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <script type="text/javascript" src="submit.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tabla III</title>
</head>

<body>
    <h1>Web de generación dinámica de tablas:</h1>
    <form id="tableForm" action="./table.php" method="POST">
        Filas:<br />
        <select name="rows">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
            <option>8</option>
            <option>9</option>
            <option>10</option>
            <option>11</option>
            <option>12</option>
            <option>13</option>
            <option>14</option>
            <option>15</option>
            <option>16</option>
            <option>17</option>
            <option>18</option>
            <option>19</option>
            <option>20</option>
            <option>21</option>
            <option>22</option>
            <option>23</option>
            <option>24</option>
            <option>25</option>
            <option>26</option>
            <option>27</option>
            <option>28</option>
            <option>29</option>
            <option>30</option>
            <option>31</option>
            <option>32</option>
            <option>33</option>
            <option>34</option>
            <option>35</option>
            <option>36</option>
            <option>37</option>
            <option>38</option>
            <option>39</option>
            <option>40</option>
            <option>41</option>
            <option>42</option>
            <option>43</option>
            <option>44</option>
            <option>45</option>
            <option>46</option>
            <option>47</option>
            <option>48</option>
            <option>49</option>
            <option>50</option>
        </select><br />
        <hr />
        Columnas:<br />
        <select name="cols">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
            <option>8</option>
            <option>9</option>
            <option>10</option>
            <option>11</option>
            <option>12</option>
            <option>13</option>
            <option>14</option>
            <option>15</option>
            <option>16</option>
            <option>17</option>
            <option>18</option>
            <option>19</option>
            <option>20</option>
            <option>21</option>
            <option>22</option>
            <option>23</option>
            <option>24</option>
            <option>25</option>
            <option>26</option>
            <option>27</option>
            <option>28</option>
            <option>29</option>
            <option>30</option>
            <option>31</option>
            <option>32</option>
            <option>33</option>
            <option>34</option>
            <option>35</option>
            <option>36</option>
            <option>37</option>
            <option>38</option>
            <option>39</option>
            <option>40</option>
            <option>41</option>
            <option>42</option>
            <option>43</option>
            <option>44</option>
            <option>45</option>
            <option>46</option>
            <option>47</option>
            <option>48</option>
            <option>49</option>
            <option>50</option>
        </select><br />
        <hr/>
        <input type="button" onclick="submitForm('tableForm')" value="Generar tabla">
    </form>
</body>

</html>