
<body>
<h2>Lista Boleias Criadas</h2>

<!-- Barra de procura-->
<br \>


<!-- tabela de boleias -->



<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <br>

                        <h3 class="box-title">Boleias Criadas</h3>
                    </div>
                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Procure uma boleia...">


                    <div class="bt">

                        <!-- /.box-header -->
                        <table id="table" class="table table-striped table-bordered nowrap" >
                            <tr>
                            <tr>
                                <th>Origem</th>
                                <th>Destino</th>
                                <th>Data e Hora de partida</th>
                                <th>Data e Hora de chegada</th>
                                <th>Matricula</th>
                                <th>Lugares Disponiveis</th>
                                <th>Economato</th>
                            </tr>
                            <tbody>
                            <?php foreach($boleias as $boleia)  {  ?>
                                <tr>

                                    <td><?php echo $boleia->origem;?></td>
                                    <td><?php echo $boleia->destino;?></td>
                                    <td><?php echo $boleia->hora_inicio;?></td>
                                    <td><?php echo $boleia->hora_fim;?></td>
                                    <td><?php echo $boleia->matricula;?></td>
                                    <td><?php echo $boleia->lugares;?></td>
                                    <td><?php echo $boleia->economato;?></td>

                                </tr>
                            <?php }?>
                        </table>

                        <!-- /.box-body -->
                    </div>

                    <br><br><br><br><br><br>

                    <script>
                        function myFunction() {
                            // Declare variables
                            var input, filter, table , tbody, tr, td, i;
                            input = document.getElementById("myInput");
                            filter = input.value.toUpperCase();
                            table = document.getElementById("table");
                            tr = table.getElementsByTagName("tr");

                            // Loop through all table rows, and hide those who don't match the search query
                            for (i = 0; i < tr.length; i++) {
                                td = tr[i].getElementsByTagName("td")[0];
                                if (td) {
                                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                                        tr[i].style.display = "";
                                    } else {
                                        tr[i].style.display = "none";
                                    }
                                }
                            }
                        }
                    </script>

                    <style >

                        th,td,h3{
                            text-align:center;
                        }

                        div.bt{
                            margin-right: 10%;
                            margin-left: 10%;
                            border-style: solid;
                        }
                        form.example input[type=text] {
                            padding: 10px;
                            font-size: 17px;
                            border: 1px solid grey;
                            float: left;
                            width: 80%;
                            background: #f1f1f1;
                        }

                        form.example button {
                            float: left;
                            width: 20%;
                            padding: 10px;
                            background: #2196F3;
                            color: white;
                            font-size: 17px;
                            border: 1px solid grey;
                            border-left: none;
                            cursor: pointer;
                        }

                        form.example button:hover {
                            background: #0b7dda;
                        }

                        form.example::after {
                            content: "";
                            clear: both;
                            display: table;
                        }
                        #myInput {
                            background-position: 10px 12px; /* Position the search icon */
                            background-repeat: no-repeat; /* Do not repeat the icon image */
                            width: 80%; /* Full-width */
                            font-size: 16px; /* Increase font-size */
                            padding: 12px 20px 12px 40px; /* Add some padding */
                            border: 1px solid #ddd; /* Add a grey border */
                            margin-bottom: 12px; /* Add some space below the input */
                            text-align:center;
                            margin-left: 10%;
                            margin-right: 20%;
                        }
                    </style>
