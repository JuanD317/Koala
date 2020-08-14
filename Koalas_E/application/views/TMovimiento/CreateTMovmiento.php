<div class="container-fluid text-light">
  <div class="row">
    <div class="col-lg-12 text-center">
      <h1>Tipo Servicio</h1>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <form action="<?= base_url() ?>index.php/TMovimientos/newTMovimientos" method="POST" id="formTMovimientos">
        <input type="hidden" id="txtIdTMovimientos" name="txtIdTMovimientos">
        <div class="row mb-3">
          <div class="col-md-12">
            <div class="form-group">
              <label for="txtTMovimientos">Tipo Servicio</label>
              <input type="text" id="txtTMovimientos" name="txtTMovimientos" class="form-control">
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-12">
            <div class="form-group text-left" id="btnAdd">
              <button class="btn btn-outline-success btn-lg" type="submit">Agregar</button>
            </div>
            <div class="form-group text-left" id="btnEdit" style="display: none;">
              <button class="btn btn-outline-info btn-lg" type="button" onclick="UpdateTMovimientos()">Editar</button>
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
                <th>Nombre</th>
                <th>Accion</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($listTMovimientos as $key_TMovimientos => $TMovimientos): ?>
                <tr>
                  <td><?= $TMovimientos->Movimiento ?></td>
                  <td>
			        <button class="btn btn-outline-warning btn-lg" type="button" onclick="ChargeTMovimientos('<?= $TMovimientos->ID_TipoMovimiento ?>','<?= $TMovimientos->Movimiento ?>')">Editar</button>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
  </div>



  <script>
    function ChargeTMovimientos(id_TMovimientos, nombre){
      $("#txtIdTMovimientos").val(id_TMovimientos);
      $("#txtTMovimientos").val(nombre);

      $("#btnAdd").hide();
      $("#btnEdit").show();
    }

    function UpdateTMovimientos(){

      $.ajax({
        type: "POST",
        url: "<?= base_url() ?>index.php/TMovimientos/updateTMovimientos",
        data: $("#formTMovimientos").serialize(),
        success: function(){
          location.reload();
        }
      })

    }
  </script>