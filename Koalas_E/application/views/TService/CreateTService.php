<div class="container-fluid text-light">
  <div class="row">
    <div class="col-lg-12 text-center">
      <h1>Tipo Servicio</h1>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <form action="<?= base_url() ?>index.php/Tservice/newTService" method="POST" id="formTService">
        <input type="hidden" id="txtIdTService" name="txtIdTService">
        <div class="row mb-3">
          <div class="col-md-12">
            <div class="form-group">
              <label for="txtTService">Tipo Servicio</label>
              <input type="text" id="txtTService" name="txtTService" class="form-control">
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-12">
            <div class="form-group text-left" id="btnAdd">
              <button class="btn btn-outline-success btn-lg" type="submit">Agregar</button>
            </div>
            <div class="form-group text-left" id="btnEdit" style="display: none;">
              <button class="btn btn-outline-info btn-lg" type="button" onclick="UpdateTService()">Editar</button>
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
              <?php foreach ($listTService as $key_TService => $TService): ?>
                <tr>
                  <td><?= $TService->TipoServicio ?></td>
                  <td>
			        	<button class="btn btn-outline-warning btn-lg" type="button" onclick="ChargeTService('<?= $TService->ID_TipoServicio ?>','<?= $TService->TipoServicio ?>')">Editar</button>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
  </div>



  <script>
    function ChargeTService(id_TService, nombre){
      $("#txtIdTService").val(id_TService);
      $("#txtTService").val(nombre);

      $("#btnAdd").hide();
      $("#btnEdit").show();
    }

    function UpdateTService(){

      $.ajax({
        type: "POST",
        url: "<?= base_url() ?>index.php/Tservice/updateTService",
        data: $("#formTService").serialize(),
        success: function(){
          location.reload();
        }
      })

    }
  </script>