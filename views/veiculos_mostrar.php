<!DOCTYPE html>
<html>
<head>
    <title>Veiculos</title>
</head>
<body>
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Veiculos</h3>
                    </div>
                    <!-- /.box-header -->
                    <table id="table" class="table table-striped table-hover table-responsive" >
                        <tr>
                            <th>#</th>
                            <th class="col-xs-3">Proprietario</th>
                            <th class="col-xs-3">Matricula</th>
                            <th class="col-xs-3">Lugares</th >
                            <th colspan="2"  style="text-align:center">Acção</th>

                        </tr>
                        <tbody>
                        <?php foreach($veiculos as $veiculo) { ?>
                            <tr>
                                <td><?php echo $veiculo->id;?></td>
                                <td><?php echo $veiculo->name;?></td>
                                <td><?php echo $veiculo->matricula;?></td>
                                <td><?php echo $veiculo->lugares;?></td>

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
                                <h5 class="modal-title" id="exampleModalLabel">Adicionar Veiculo</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="inserir_veiculo" method="POST">
                                    <div class="form-group">
                                        <label for="id_user" class="col-form-label">Proprietario:</label>
                                        <label>Proprietario</label>
                                        <select  name="proprietario" id="proprietario" class="form-control">
                                            <?php
                                            foreach($users as $row){
                                                ?>
                                                <option value='<?=$row->id?>'><?=$row->name?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label for="matricula" class="col-form-label">Matricula</label>
                                        <input type="text" class="form-control" name="matricula" id="matricula">
                                    </div>
                                    <div class="form-group">
                                        <label for="lugares" class="col-form-label">Lugares:</label>
                                        <input type="text" class="form-control" name="lugares" id="lugares">
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
                        modal.find('.modal-title').text('New message to ' + recipient)
                        modal.find('.modal-body input').val(recipient)
                    })
                </script>
                <!-- /. MODAL PARA BOTAO ADICIONAR-->