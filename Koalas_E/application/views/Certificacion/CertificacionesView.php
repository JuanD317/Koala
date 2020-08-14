<div class="container-fluid text-light">
  <div class="row">
    <div class="col-lg-12">
      <h1>Certificacion</h1>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <form action="<?= base_url() ?>index.php/Certificaciones/newCertificaciones" method="POST" id="formCertificaciones">
        <input type="hidden" id="txtIdCertificaciones" name="txtIdCertificaciones">
        <div class="row mb-3">
          <div class="col-6">
            <div class="form-group">
              <label for="txtCertificaciones">Certificacion</label>
              <input type="text" id="txtCertificaciones" name="txtCertificaciones" class="form-control">
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label for="txtDescripcion">Descripcion</label>
              <textarea name="txtDescripcion" id="txtDescripcion" cols="30" rows="3" class="form-control"></textarea>
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-12">
            <div class="form-group text-left" id="btnAdd">
              <button class="btn btn-success btn-lg" type="submit">Agregar</button>
            </div>
            <div class="form-group text-left" id="btnEdit" style="display: none;">
              <button class="btn btn-info btn-lg" type="button" onclick="UpdateCertificaciones()">Editar</button>
            </div>
          </div>
        </div>
      </form>
    </div>
    </div>
      <div class="row">
        <div class="col-md-12">
          <table class="table nowrap">
            <thead>
              <tr>
                <th>Certificaciones</th>
                <th>Descripcion</th>
                <th>Accion</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($listCertificaciones as $key_Certificaciones => $Certificaciones): ?>
                <tr>
                  <td><?= $Certificaciones->Nombre ?></td>
                  <td><?= $Certificaciones->Descripcion ?></td>
                  <td>
                    <button class="btn btn-outline-warning btn-lg" type="button" onclick="ChargeCertificaciones('<?= $Certificaciones->ID_Certificacion ?>', '<?= $Certificaciones->Nombre ?>', '<?= $Certificaciones->Descripcion ?>')">Editar</button>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
  </div>



  <script>
    function ChargeCertificaciones(id_Certificaciones, Certificaciones, Descripcion){
      $("#txtIdCertificaciones").val(id_Certificaciones);
      $("#txtCertificaciones").val(Certificaciones);
      $("#txtDescripcion").val(Descripcion);

      $("#btnAdd").hide();
      $("#btnEdit").show();
    }

    function UpdateCertificaciones(){

      $.ajax({
        type: "POST",
        url: "<?= base_url() ?>index.php/Certificaciones/updateCertificaciones",
        data: $("#formCertificaciones").serialize(),
        success: function(){
          location.reload();
        }
      })

    }
  </script>