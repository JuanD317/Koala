<div class="container-fluid text-light">
  <div class="row">
    <div class="col-lg-12">
      <h1>Marca</h1>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <form action="<?= base_url() ?>index.php/Marca/newMarca" method="POST" id="formMarca">
        <input type="hidden" id="txtIdMarca" name="txtIdMarca">
        <div class="row mb-3">
          <div class="col-12">
            <div class="form-group">
              <label for="txtMarca">Marca</label>
              <input type="text" id="txtMarca" name="txtMarca" class="form-control">
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-12">
            <div class="form-group text-left" id="btnAdd">
              <button class="btn btn-success btn-lg" type="submit">Agregar</button>
            </div>
            <div class="form-group text-left" id="btnEdit" style="display: none;">
              <button class="btn btn-info btn-lg" type="button" onclick="UpdateMarca()">Editar</button>
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
                <th>Marca</th>
                <th>Accion</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($listMarca as $key_Marca => $Marca): ?>
                <tr>
                  <td><?= $Marca->Marca ?></td>
                  <td>
                    <button class="btn btn-outline-warning btn-lg" type="button" onclick="ChargeMarca('<?= $Marca->ID_Marca ?>', '<?= $Marca->Marca ?>')">Editar</button>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
  </div>



  <script>
    function ChargeMarca(id_Marca, Marca){
      $("#txtIdMarca").val(id_Marca);
      $("#txtMarca").val(Marca);

      $("#btnAdd").hide();
      $("#btnEdit").show();
    }

    function UpdateMarca(){

      $.ajax({
        type: "POST",
        url: "<?= base_url() ?>index.php/Marca/updateMarca",
        data: $("#formMarca").serialize(),
        success: function(){
          location.reload();
        }
      })

    }
  </script>