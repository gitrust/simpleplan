<div class="panel panel-default">

   <div class="panel-heading">
      <h3 class="panel-title"><?= $data['form_header'] ?></h3>
   </div>

   <div class="panel-body">

      <?php echo Message::show(); ?>

      <?php
         $product = $data['product'];
         if (isset($product['id'])) :
      ?>

      <form role="form" action="<?= DIR ?>products/insert" method="POST">
         <input class="form-control" type="text" name="name" placeholder="Produkt-Name" value="<?= $product['name'] ?>">
         <input class="form-control" type="url" name="url" placeholder="Produkt-URL" value="<?= $product['url'] ?>">
         <input class="form-control" type="url" name="image" placeholder="Produkt-Bild" value="<?= $product['image'] ?>">
         <div class="row">
            <div class="col-xs-6 input-group">
               <input type="number" class="form-control" name="price" placeholder="Preis" value="<?= $product['price'] ?>">
               <span class="input-group-addon">€</span>
            </div>
            <div class="col-xs-6">
               <button type="submit" class="btn btn-primary btn-block">Aktualisieren</button>
            </div>
         </div>
         <input type="hidden" name="id" value="<?= $product['id'] ?>">
      </form>

      <?php else : ?>

      <form role="form" action="<?= DIR ?>products/insert" method="POST">
         <input class="form-control" type="text" name="name" placeholder="Produkt-Name">
         <input class="form-control" type="url" name="url" placeholder="Produkt-URL">
         <input class="form-control" type="url" name="image" placeholder="Produkt-Bild">
         <div class="row">
            <div class="col-xs-6 input-group">
               <input type="number" class="form-control" name="price" placeholder="Preis">
               <span class="input-group-addon">€</span>
            </div>
            <div class="col-xs-6">
               <button type="submit" class="btn btn-primary btn-block">Anlegen</button>
            </div>
         </div>
      </form>

   <?php endif; ?>

   </div> <!-- / .panel-body -->
</div> <!-- / .panel -->