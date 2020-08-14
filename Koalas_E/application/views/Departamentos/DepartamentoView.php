<div class="container-fluid text-light">
  <div class="row">
    <div class="col-lg-12">
      <h1>Departamento</h1>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <form action="<?= base_url() ?>index.php/Departamento/newDepartamento" method="POST" id="formDepartamento">
        <input type="hidden" id="txtIdDepartamento" name="txtIdDepartamento">
        <div class="row mb-3">
          <div class="col-6">
            <div class="form-group">
              <label for="slcPais">Pais</label>
              <select name="slcPais" id="slcPais" class="select2 form-control">
                <option value="-1">Seleccione</option>
                <?php foreach ($listPaises as $key_pais => $pais): ?>
                  <option value="<?= $pais->ID_Pais ?>"><?= $pais->Pais ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label for="txtDepartamento">Departamento</label>
              <input type="text" id="txtDepartamento" name="txtDepartamento" class="form-control">
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-12">
            <div class="form-group text-left" id="btnAdd">
              <button class="btn btn-outline-success btn-lg" type="submit">Agregar</button>
            </div>
            <div class="form-group text-left" id="btnEdit" style="display: none;">
              <button class="btn btn-outline-info btn-lg" type="button" onclick="UpdateDepartamento()">Editar</button>
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
                <th>Pais</th>
                <th>Departamento</th>
                <th>Accion</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($listDepartamento as $key_departamento => $departamento): ?>
                <tr>
                  <td><?= $departamento->Pais ?></td>
                  <td><?= $departamento->Departamento ?></td>
                  <td>
                    <button class="btn btn-outline-warning btn-lg" type="button" onclick="ChargeDepartamento('<?= $departamento->ID_Departamento ?>','<?= $departamento->ID_Pais ?>', '<?= $departamento->Departamento ?>')">Editar</button>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
  </div>



  <script>
    function ChargeDepartamento(id_departamento, id_pais, departamento){
      $("#txtIdDepartamento").val(id_departamento);
      $("#slcPais").val(id_pais).trigger("change");
      $("#txtDepartamento").val(departamento);

      $("#btnAdd").hide();
      $("#btnEdit").show();
    }

    function UpdateDepartamento(){

      $.ajax({
        type: "POST",
        url: "<?= base_url() ?>index.php/Departamento/updateDepartamento",
        data: $("#formDepartamento").serialize(),
        success: function(){
          location.reload();
        }
      })

    }
  </script>