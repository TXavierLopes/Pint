
<!-- Section: intro -->
<div class="container">
    <br/>
    <h1>Perfil</h1>
    <hr>
    <div class="row">
        <!-- left column -->
        <br/>
        <br/>
        <br/>

        <div class="col-md-3">
            <div class="text-center" style="padding-top: 50%;">
                <img src="<?=$usr['image']?>" class="avatar img-circle" alt="avatar" width="150px" height="150px" name="imagem">

            </div>
        </div>

        <!-- edit form column -->
        <div class="col-md-9 personal-info">

            <h3>Informação Pessoal</h3>
            <br/>
            <br/>
            <br/>

            <form class="form-horizontal" role="form">
                <div class="form-group">
                    <label class="col-lg-3 control-label">Username:</label>
                    <span class="col-lg-3" style="padding-top: 7px;"><?=$usr['name']?></span>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Contacto:</label>
                    <span class="col-lg-3" style="padding-top: 7px;"><?=$usr['contact']?></span>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Email:</label>

                    <span class="col-lg-3" style="padding-top: 7px;"><?=$usr['email']?></span>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8">
                        <a href="editarperfil" >   <button type="button" class="btn btn-info">Editar Perfil</button></a>
                    </div>
            </form>
        </div>
    </div>
</div>
