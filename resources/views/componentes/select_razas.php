 <?php
 $listaRazas = \DB::table("razas")->pluck("nombre","id")->all();  

 ?>
{!! Form::select('idraza1', ['L' => 'Large', 'S' => 'Small'], null, ['placeholder' => 'Pick a size...']) !!}
<!--
        <div class="col-md-1">
            <select max="3"> 
              <?php foreach($listaRazas as  $key => $value){ 
                echo "<option value=".$key."> ".$value."</option>";
                 } ?>
            </select>
        </div>
-->