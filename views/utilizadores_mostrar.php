<!DOCTYPE html>
<html>
<head>
	<title>utilizadores</title>
</head>
<body>
<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
	  <div class="box">
            <div class="box-header">
              <h3 class="box-title">utilizadores</h3>
            </div>
            <!-- /.box-header -->
            <button class="btn btn-success" style="float: right;" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><i class="glyphicon glyphicon-plus"></i> Adicionar</button>
            <table id="table" class="table table-striped table-hover table-responsive" >
          
              <tr>
              <th>#</th>
              <th>Nome</th>
              <th>Tipo utilizador</th>
              <th>Email</th>
              <th>Contacto</th>
              <th>Pass</th>

              <th colspan="2" style="text-align:center">Acção</th>
             </tr>
                <tbody>
                <?php foreach($users as $user) { ?>
                    <tr>
                        <td><?php echo $user->id;?></td>
                        <td><?php echo $user->name;?></td>
                        <td><?php echo $user->type;?></td>
                        <td><?php echo $user->email;?></td>
                        <td><?php echo $user->contact;?></td>
                        <td><?php echo $user->password;?></td>
                        <td><button class="btn btn-success" style="float: right;" data-toggle="modal" data-target="#editModal"  ><i class="glyphicon glyphicon-plus"></i> Editar</button></td>

                        <td><button class="btn btn-warning" style="float: right;"><a style="color:white;" href="<?php echo base_url().'index.php/Administrador_controller/user_delete?id='.$user->id;?>"><i class="glyphicon glyphicon-minus"></i> Apagar</a></td>

                        <?php } ?>
            </table>
          <!-- /.box-body -->
      </div>
           <!-- MODAL PARA BOTAO ADICIONAR-->   
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adicionar Utilizador</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data" action="inserir_utilizador" method="POST" role="form" method="post">
          <div class="form-group">
            <label for="name" class="col-form-label">Nome:</label>
            <input type="text" class="form-control" name="name" id="name">
          </div>
          <div class="form-group">
            <label for="type" class="col-form-label">Tipo de utilzador:</label>
            <input type="text" class="form-control" name="type" id="type">
          </div>
          <div class="form-group">
            <label for="email" class="col-form-label">Email</label>
            <input type="text" class="form-control" name="email" id="email">
          </div>
          <div class="form-group">
            <label for="contact" class="col-form-label">contact:</label>
            <input type="text" class="form-control" name="contact" id="contact">
          </div>
          <div class="form-group">
            <label for="password" class="col-form-label">Password</label>
            <input type="text" class="form-control" name="password" id="password">
          </div>
          <div class="form-group">
            <label for="image" class="col-form-label">Image:</label>
            <input type="file" class="form-control" name="file" id="image">
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