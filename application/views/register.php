<div class="container">
  <form id="register" name="register" method="POST" action="<?= $baseUrl.'/application/controllers/ctrProduct.php' ?>">
    <h1 class="text-center pb-4 mb-4 border-bottom">Registro de productos</h1>
    <div class="row">
      <div class="form-group col-md-6">
        <label for="inputName">Nombre</label>
        <input required type="text" class="form-control" id="inputName" name="name" placeholder="Nombre">
      </div>
      <div class="form-group col-md-6">
        <label for="inputCategory">Categoria</label>
        <select required id="inputCategory" class="form-control" name="category" placeholder="">
          <option value="" selected>Seleccione una categoria</option>
          <option value="Cafe">Café</option>
          <option value="Lacteos">Lacteos</option>
          <option value="Te">Té</option>
          <option value="Chocolate">Chocolate</option>
          <option value="Endulzante">Endulzante</option>
          <option value="Panaderia">Panaderia</option>
          <option value="Fritos">Fritos</option>
          <option value="Mecato">Mecato</option>
          <option value="Bebidas">Bebidas</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        <label for="inputPrice">Precio</label>
        <input required type="number" class="form-control" id="inputPrice" name="price" placeholder="Precio">
      </div>
      <div class="form-group col-md-6">
        <label for="inputWeight">Peso</label>
        <input required type="number" class="form-control" id="inputWeight" name="weight" placeholder="Peso">
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        <label for="inputRef">Referencia</label>
        <input required type="text" class="form-control" id="inputRef" name="reference" placeholder="#" style="text-transform:uppercase">
      </div>
      <div class="form-group col-md-6">
        <label for="inputStock">Stock</label>
        <input required type="number" class="form-control" id="inputStock" name="stock" placeholder="Stock">
      </div>
    </div>
    <div class="row">
      <div class="col-md-8"></div>
      <div class="col-md-12">
        <input type="hidden" name="baseUrl" value="<?= $baseUrl ?>">
        <input type="hidden" name="btnRegister" value="true">
        <button type="submit" class="btn btn-success mt-3 w-100">Send</button>
      </div>
    </div>
  </form>
</div>