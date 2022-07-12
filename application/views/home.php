<script src="<?= $baseUrl.'/js/products.js' ?>"></script>
<table id="tblAllProducts" class="display" style="width:100%">
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Categoria</th>
      <th>Precio</th>
      <th>Peso</th>
      <th>Referencia</th>
      <th>Stock</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
  </tbody>
  <tfoot>
    <tr>
      <th>Nombre</th>
      <th>Categoria</th>
      <th>Precio</th>
      <th>Peso</th>
      <th>Referencia</th>
      <th>Stock</th>
      <th>Acciones</th>
    </tr>
  </tfoot>
</table>

<div class="modal fade" id="modalEditProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar producto</h5>
        <button onclick="closeModal()" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="edit" name="edit"method="POST" action="<?= $baseUrl.'/application/controllers/ctrProduct.php' ?>">
        <div class="modal-body">
          <input type="hidden" name="idEdit" id="idEdit">
          <input type="hidden" name="baseUrl" id="baseUrl">
          <div class="row">
            <div class="form-group col-md-12">
              <label for="inputName">Nombre</label>
              <input required type="text" class="form-control" id="inputName" name="name" placeholder="Nombre">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-12">
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
            <div class="form-group col-md-12">
              <label for="inputPrice">Precio</label>
              <input required type="number" class="form-control" id="inputPrice" name="price" placeholder="Precio">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-12">
              <label for="inputWeight">Peso</label>
              <input required type="number" class="form-control" id="inputWeight" name="weight" placeholder="Peso">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-12">
              <label for="inputRef">Referencia</label>
              <input required type="text" class="form-control" id="inputRef" name="reference" placeholder="#" style="text-transform:uppercase">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-12">
              <label for="inputStock">Stock</label>
              <input required type="number" class="form-control" id="inputStock" name="stock" placeholder="Stock">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button onclick="closeModal()" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modalSellProduct" tabindex="-1" role="dialog" aria-labelledby="modalSellProduct" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalSellProductTitle">Vender <span id="nameProduct"></span></h5>
        <button onclick="closeModal()" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="edit" name="edit"method="POST" action="<?= $baseUrl.'/application/controllers/ctrSell.php' ?>">
        <div class="modal-body">
          <input type="hidden" name="id" id="idSell">
          <input type="hidden" name="price" id="price">
          <input type="hidden" name="baseUrl" id="baseUrlShell">
          <div class="row">
            <div class="form-group col-md-12">
              <label for="inputWeight">Cantidad</label>
              <input required type="number" class="form-control" id="inputCant" name="cant" min="0" placeholder="Cantidad">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-12">
              <label for="inputStock">Valor Total</label>
              <input readonly="true" type="number" class="form-control" id="inputTotal" name="total" placeholder="Total">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button onclick="closeModal()" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>