<!-- Vue pour lister les fleurs
    ================================================== -->
    <br>
<br>
<br>
<br>
<br>

<br>
<div class="container">

    <table class="table table-bordered table-striped table-condensed">
      <br>
      <thead>
        <tr>
          <th>Id</th>
          <th>Marque</th>
          <th>Modele</th>
          <th>Dimension</th>
     
        </tr>
      </thead>
      <tbody>  
<?php
    $i = 0;
    while($i < count($lemprunt))
    { 
 ?>     
        <tr>
            <td><?php echo $lemprunt[$i]['Id']?></td>
            <td><?php echo $lemprunt[$i]["Marque"]?></td>
            <td ><?php echo $lemprunt[$i]["Modele"]?></td>
            <td ><?php echo $lemprunt[$i]["Dimension"]?></td>
          
        </tr>
<?php
        $i = $i + 1;
     }
?>       
       </tbody>       
     </table>    
  </div>