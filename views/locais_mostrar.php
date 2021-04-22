<!DOCTYPE html>
<html>
<head>
    <title>Locais</title>
</head>
<body>
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Locais</h3>
                    </div>
                    <!-- /.box-header -->
                    <button class="btn btn-success" style="float: right;" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><i class="glyphicon glyphicon-plus"></i> Adicionar</button>
                    <table id="table" class="table table-striped table-hover table-responsive" >

                        <tr>
                            <th>#</th>
                            <th>Local</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Endereço</th>
                            <th colspan="2" style="text-align:center">Acção</th>
                        </tr>
                        <tbody>
                        <?php foreach($locais as $local) { ?>
                            <tr>
                                <td><?php echo $local->id;?></td>
                                <td><?php echo $local->name;?></td>
                                <td><?php echo $local->latitude;?></td>
                                <td><?php echo $local->longitude;?></td>
                                <td><?php echo $local->endereço;?></td>
                                <td><button class="btn btn-success" style="float: right;" data-toggle="modal" data-target="#editModal"  ><i class="glyphicon glyphicon-plus"></i> Editar</button></td>
                                <td><button class="btn btn-warning" style="float: right;"><i class="glyphicon glyphicon-minus"><a style="color:white;" href="<?php echo base_url().'index.php/Administrador_controller/local_delete?id='.$local->id;?>">Apagar</a></td>
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
                                <h5 class="modal-title" id="exampleModalLabel">Adicionar Local</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="inserir_local" method="POST">

                                    <div class="form-group">
                                        <label for="name" class="col-form-label">Nome do polo:</label>
                                        <input type="text" class="form-control" name="name" id="name">
                                    </div>

                                    <div class="form-group">
                                        <label for="latitude" class="col-form-label">Latitude</label>
                                        <input type="text" class="form-control" name="latitude" id="latitude">
                                    </div>

                                    <div class="form-group">
                                        <label for="longitude" class="col-form-label">Longitude</label>
                                        <input type="text" class="form-control" name="longitude" id="longitude">
                                    </div>

                                    <div class="form-group">
                                        <label for="endereço" class="col-form-label">Endereço</label>
                                        <input type="text" class="form-control" name="endereço" id="endereço">
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
                    modal.find('.modal-title').text('New message to ' + recipient)
                    modal.find('.modal-body input').val(recipient)
                })
            </script>
            <!-- /. MODAL PARA BOTAO ADICIONAR-->

            <!-- MODAL PARA BOTAO EDITAR-->
            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Adicionar Local</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="edit_local" method="POST">

                                <div class="form-group">
                                    <label for="name" class="col-form-label" value="<?=$local->name?>">Nome do polo:</label>
                                    <input type="text" class="form-control" name="name" id="name">
                                </div>

                                <div class="form-group">
                                    <label for="latitude" class="col-form-label">Latitude</label>
                                    <input type="text" class="form-control" name="latitude" id="latitude">
                                </div>

                                <div class="form-group">
                                    <label for="longitude" class="col-form-label">Longitude</label>
                                    <input type="text" class="form-control" name="longitude" id="longitude">
                                </div>

                                <div class="form-group">
                                    <label for="endereço" class="col-form-label">Endereço</label>
                                    <input type="text" class="form-control" name="endereço" id="endereço">
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
            $('#editModal').on('show.bs.modal', function (event) {

                var button = $(event.relatedTarget) // Button that triggered the modal
                var recipient = button.data('whatever') // Extract info from data-* attributes
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                modal.find('.modal-title').text('Editar Local' )
                modal.find('.modal-body input').val(recipient)
                modal.find('$local')
            })
        </script>
        <!-- /. MODAL PARA BOTAO EDITAR-->


