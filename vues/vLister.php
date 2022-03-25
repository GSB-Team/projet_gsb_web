
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
          <th>Matricule</th>
          <th>Nom</th>
          <th>Prenom</th>
          <th>Adresse</th>
          <th>code postal</th>
          <th>ville</th>

        </tr>
      </thead>
      <tbody>  
<?php
    $i = 0;
    while($i < count($levisiteur))
    { 
 ?>     
        <tr>
            <td ><?php echo $levisiteur[$i]['vis_matricule']?></td>
            <td><?php echo $levisiteur[$i]['vis_nom']?></td>
            <td><?php echo $levisiteur[$i]["vis_prenom"]?></td>
            <td ><?php echo $levisiteur[$i]["vis_adresse"]?></td>
            <td><?php echo $levisiteur[$i]["vis_cp"]?></td>
            <td ><?php echo $levisiteur[$i]["vis_ville"]?></td>
        </tr>
<?php
        $i = $i + 1;
     }
?>       
       </tbody>       
     </table>    
  </div>

 
