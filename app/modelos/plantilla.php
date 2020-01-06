      <?php
           $i=1;
                                while ($datos=mysqli_fetch_assoc(($query2))){ 
        ?>
                                <label for="email_address"><?php echo $datos['nombre']; ?></label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <?php ?>
                                        <input type="text" id="resp<?php $i ?>" class="form-control" placeholder="">
                                        <?php ?>
                                    </div>
                                </div>
                                <br>
                                 <script>
                                $(document).ready(function(){
                                           // alert("jei");

                                            var respuesta = $("#resp<?php echo $i ?>");

                                });
                                </script>
      <?php $i++;  } ?>

      <script>
      <script>