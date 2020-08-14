<div class="container-fluid text-light">
    <div class="row">
        <div class="col-md-12">
            <h1>País</h1>
        </div>
    </div>
    <div class="row h-100 align-items-center">
        <div class="col-12">
            <form action="<?= base_url() ?>index.php/Pais/newPais" method="POST" id="formPais">
                <input type="hidden" id="txtIdPais">
                <div class="row mb-3">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="txtPais">Pais</label>
                            <input type="text" id="txtPais" name="txtPais" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="txtNacionalidad">Nacionalidad</label>
                            <input type="text" id="txtNacionalidad" name="txtNacionalidad" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="form-group text-left" id="btnGuardar">
                            <button class="btn btn-outline-success btn-lg" type="submit">Guardar Pais</button>
                        </div>
                        <div class="form-group text-left" style="display: none;" id="btnEditar">
                            <button class="btn btn-outline-primary btn-lg" type="button" onclick="UpdatePais()">Editar Pais</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row mb-5 mt-5">
        <div class="col-md-12">
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <h2>Reporte de paises</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table nowrap">
                <thead>
                    <tr>
                        <th>Pais</th>
                        <th>Nacionalidad</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listPaises as $key_pais => $pais): ?>
                        <tr>
                            <td><?= $pais->Pais ?></td>
                            <td><?= $pais->Nacionalidad ?></td>
                            <td>
                                <button class="btn btn-outline-warning btn-lg" type="button" onclick="ChargePais('<?= $pais->ID_Pais ?>', '<?= $pais->Pais ?>', '<?= $pais->Nacionalidad ?>')">Editar</button>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){


    });

    function ChargePais(ID_Pais, Pais, Nacionalidad){
        $("#txtIdPais").val(ID_Pais);
        $("#txtPais").val(Pais);
        $("#txtNacionalidad").val(Nacionalidad);

        $("#btnGuardar").hide();
        $("#btnEditar").show();

    }

    function UpdatePais(){

        $.ajax({
            type: "POST",
            url: "<?= base_url() ?>index.php/Pais/updatePais",
            data: {txtPais: $("#txtPais").val(), txtNacionalidad: $("#txtNacionalidad").val(), txtIdPais: $("#txtIdPais").val()},
            success: function(){
                location.reload();
            }
        });

    }
</script>