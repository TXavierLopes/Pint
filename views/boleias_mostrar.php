<!DOCTYPE html>
<html>
<head>
    <title>Boleias</title>
</head>
<body>
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Boleias Disponiveis</h3>
                    </div>
                    <!-- /.box-header -->
                    <button class="btn btn-success" style="float: right;" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><i class="glyphicon glyphicon-plus"></i> Adicionar</button>
                    <table id="table" class="table table-striped table-hover table-responsive" >

                        <tr>
                            <th>#</th>
                            <th>Veiculo</th>
                            <th>Funcionario</th>
                            <th>Origem</th>
                            <th>Destino</th>
                            <th>Data e Hora de partida</th>
                            <th>Data e Hora de chegada</th>
                            <th>Lugares Disponíveis</th>
                            <th colspan="2" style="text-align: center">Ação</th>
                        </tr>
                        <tbody>
                        <?php foreach($boleias as $boleia) { ?>
                            <tr>
                                <td><?php echo $boleia->id;?></td>
                                <td><?php echo $boleia->matricula;?></td>
                                <td><?php echo $boleia->name;?></td>
                                <td><?php echo $boleia->origem;?></td>
                                <td><?php echo $boleia->destino;?></td>
                                <td><?php echo $boleia->hora_inicio;?></td>
                                <td><?php echo $boleia->hora_fim;?></td>
                                <td><?php echo $boleia->lugares;?></td>
                                <td><button class="btn btn-success" style="float: right;" data-toggle="modal" data-target=""  ><i class="glyphicon glyphicon-plus"></i> Editar</button></td>
                                <td><button class="btn btn-warning" style="float: right;"><i class="glyphicon glyphicon-minus"><a style="color:white;" href="">Apagar</a></td>

                            </tr>
                        <?php } ?>
                    </table>
                    <!-- /.box-body -->
                </div>
                <!-- MODAL PARA BOTAO ADICIONAR-->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Adicionar Boleia</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="inserir_boleia" method="POST">
                                    <div class="form-group">
                                        <label for="matricula" class="col-form-label">Veiculo (Matrícula):</label>
                                        <input type="text" class="form-control" name="matricula" id="matricula" placeholder="XX-XX-XX">
                                    </div>
                                    <div class="form-group">
                                        <label for="func" class="col-form-label"> Funcionario:</label>

                                        <select name="func" id="func" class="form-control">

                                            <?php
                                            foreach($users as $row){
                                                ?>
                                                <option value='<?=$row->id?>'><?=$row->id."-".$row->name?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="origem" class="col-form-label">Origem:</label>
                                        <select  name="origem" id="origem" class="form-control">

                                            <?php
                                            foreach($new_boleias as $row){
                                                ?>
                                                <option value='<?=$row->id?>'><?=$row->name?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>                                    </div>

                                    <div class="form-group">
                                        <label for="destino" class="col-form-label">Destino:</label>
                                        <select name="destino" id="destino" class="form-control">

                                            <?php
                                            foreach($new_boleias as $row){
                                                ?>
                                                <option value='<?=$row->id?>'><?=$row->name?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="hora_inicio" class="col-form-label">Data e Hora Partida:</label>
                                        <input type="datetime-local" class="form-control" name="hora_inicio" id="hora_inicio">
                                    </div>
                                    <div class="form-group">
                                        <label for="hora_fim" class="col-form-label">Data e Hora Chegada:</label>
                                        <input type="datetime-local" class="form-control" name="hora_fim" id="hora_fim">

                                    </div>

                                    <div class="form-group">
                                        <label for="lugares" class="col-form-label">Lugares Disponíveis:</label>
                                        <input type="number" min="1" value="1" class="form-control" name="lugares" id="lugares">

                                    </div>

                                    <div class="form-group">
                                        <label for="economato" class="col-form-label">Deseja levar Economato</label>
                                        <div>
                                            <input type="radio" name="economato" id="economato_sim" value="1">
                                            <label for="economato_sim">Sim</label>
                                        </div>

                                        <div>
                                            <input type="radio" name="economato" id="economato_nao" value="2">
                                            <label for="economato_nao">Não</label>
                                        </div>
                                    </div>


                            </div>

                            <div class="modal-footer">

                                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                                <button type="submit" name="submit" class="btn btn-success">Gravar</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                $('#exampleModal').on('show.bs.modal', function (event) {
                    var button = $(event.relatedTarget) // Button that triggered the modal
                    var recipient = button.data('whatever') // Extract info from data-* attributes
                    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                    var modal = $(this)
                    modal.find('.modal-title').text('Nova Boleia')
                    modal.find('.modal-body input').val(recipient)
                })
            </script>
            <!-- /. MODAL PARA BOTAO ADICIONAR-->


            <!-- MODAL PARA BOTAO ADICIONAR-->
            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Adicionar Boleia</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="inserir_boleia" method="POST">
                                <div class="form-group">
                                    <label for="matricula" class="col-form-label">Veiculo (Matrícula):</label>
                                    <input type="text" class="form-control" name="matricula" id="matricula" placeholder="XX-XX-XX">
                                </div>
                                <div class="form-group">
                                    <label for="func" class="col-form-label"> Funcionario:</label>

                                    <select name="func" id="func" class="form-control">

                                        <?php
                                        foreach($users as $row){
                                            ?>
                                            <option value='<?=$row->id?>'><?=$row->id."-".$row->name?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="origem" class="col-form-label">Origem:</label>
                                    <select  name="origem" id="origem" class="form-control">

                                        <?php
                                        foreach($new_boleias as $row){
                                            ?>
                                            <option value='<?=$row->id?>'><?=$row->name?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>                                    </div>

                                <div class="form-group">
                                    <label for="destino" class="col-form-label">Destino:</label>
                                    <select name="destino" id="destino" class="form-control">

                                        <?php
                                        foreach($new_boleias as $row){
                                            ?>
                                            <option value='<?=$row->id?>'><?=$row->name?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="hora_inicio" class="col-form-label">Data e Hora Partida:</label>
                                    <input type="datetime-local" class="form-control" name="hora_inicio" id="hora_inicio">
                                </div>
                                <div class="form-group">
                                    <label for="hora_fim" class="col-form-label">Data e Hora Chegada:</label>
                                    <input type="datetime-local" class="form-control" name="hora_fim" id="hora_fim">

                                </div>

                                <div class="form-group">
                                    <label for="lugares" class="col-form-label">Lugares Disponíveis:</label>
                                    <input type="number" min="1" value="1" class="form-control" name="lugares" id="lugares">

                                </div>

                                <div class="form-control required">
                                    <label for="economato" class="col-form-label">Deseja levar Economato</label>
                                    <div>
                                        <input type="radio" name="economato" id="economato_sim" value="1">
                                        <label for="economato_sim">Sim</label>
                                    </div>

                                    <div>
                                        <input  type="radio" name="economato" id="economato_nao" value="2">
                                        <label for="economato_nao">Não</label>
                                    </div>
                                </div>


                        </div>

                        <div class="modal-footer">

                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                            <button type="submit" name="submit" class="btn btn-success">Gravar</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $('#exampleModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var recipient = button.data('whatever') // Extract info from data-* attributes
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                modal.find('.modal-title').text('Nova Boleia')
                modal.find('.modal-body input').val(recipient)
            })
        </script>