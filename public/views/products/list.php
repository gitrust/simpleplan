<div class="row list-group products">

   <?php echo Message::show(); ?>

   <?php
      if (!sizeof($data['products'])) {
         echo '<div class="alert alert-info">Derzeit gibt es keine Produkte. <a href="' . DIR . 'products/add">Leg gleich welche an</a>!</div>';
      }
      else {
         foreach ($data['products'] as $product) {
            echo
            '<div class="item col-xs-4">
               <div class="thumbnail">
                  <a href="' . $product['url'] . '" title="' . $product['name'] . '"><img src="' . $product['image'] . '" alt="' . $product['name'] . '"></a>
                  <div class="buttons-edit">
                     <a class="btn btn-default btn-sm" href="' . DIR . 'products/edit/' . $product['id'] . '">Edit</a>
                     <a class="btn btn-default btn-sm" href="' . DIR . 'products/delete/' . $product['id'] . '">Delete</a>
                  </div>
                  <div class="caption">
                     <h4><a href="' . $product['url'] . '" title="' . $product['name'] . '">' . $product['name'] . '</a></h4>
                     <span class="lead">' . $product['price'] . '€</span>
                  </div>
               </div>
            </div>';
         }
      }
   ?>

</div> <!-- / .products -->