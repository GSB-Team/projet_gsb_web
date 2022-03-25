
  <!-- Vue pour lister les fleurs
    ================================================== -->

<div class="container">

    <table class="table table-bordered table-striped table-condensed">
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <thead>
        <tr>
          <th>Id</th>
          <th>Marque</th>
          <th>Dimension</th>
          <th>Modele</th>
        </tr>
      </thead>
      <tbody>  
<?php
    $i = 0;
    while($i < count($lemateriel))
    { 
 ?>     
        <tr>
            <td ><?php echo $lemateriel[$i]['Id']?></td>
            <td><?php echo $lemateriel[$i]['Marque']?></td>
            <td><?php echo $lemateriel[$i]["Dimension"]?></td>
            <td ><?php echo $lemateriel[$i]["Modele"]?></td>
        </tr>
<?php
        $i = $i + 1;
     }
?>       
       </tbody>       
     </table>    
  </div>

 
