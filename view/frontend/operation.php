<!--page operation-->
<?php $title = "Operation"?>

<?php ob_start();
  
?>

<?php
    include('body/topbar.php')

?>


                <nav>
                    <ul>
                        <li><a href="index.php?page=menu">Menu</a></li>
                        <li><a href="display_add_operation.php"> Opération</a></li>
                        <li><a href="display_search_promo.php">Réservation</a></li>
                        <li><a href="display_commande_choice.php">Commande</a></li>
                    </ul>
                </nav>
            </header>
  
	<body>


		<h1> Nouvelle opération</h1> 
    <?php
      if(isset($_POST['submit'])){
        $opName=htmlspecialchars($_POST['operation_name']);
        $opStartDate=htmlspecialchars($_POST['operation_start_date']);
        $opEndDate=htmlspecialchars($_POST['operation_end_date']);
        $opReqDate=htmlspecialchars($_POST['operation_available_request_date']);
        $opcommitStartDate=htmlspecialchars($_POST['operation_commitment_start_date']);
        $opCommitEndDate=htmlspecialchars($_POST['operation_commitment_end_date']);
        $prio=htmlspecialchars($_POST['prio']);
        $client=htmlspecialchars($_POST['client']);

        Get_Op($opName,$opStartDate,$opEndDate,$opReqDate,$opcommitStartDate,$opCommitEndDate,$prio);
        Session_Op();
        
         $cli=Client_Id($client);
         $numb=$cli[1];
        $clientId=$cli[0];
        $opId=$_SESSION['opId'];
        Client_Op($opId,$clientId,$numb);  
      }
    ?>
  <form method="post">
  <fieldset>
    <legend>Entrer les informations de l'opération</legend>
    <fieldset>  
    <input type="text" placeholder="client" name="client" id="client" class="ui-autocomplete-input" autocomplete="off" />
    <input type="text" placeholder="stat1" name="stat1" id="stat1" class="ui-autocomplete-input" autocomplete="off" />
    <input type="text" placeholder="stat2" name="stat2" id="stat2" class="ui-autocomplete-input" autocomplete="off" />
    <input type="text" placeholder="stat3" name="stat3" id="stat3" class="ui-autocomplete-input" autocomplete="off" />
   </fieldset> 
  
                
                
   <SELECT type="text" name="enseigne2" required />
      <?php 
                
        foreach ($recup1 as $row){
          echo '<OPTION>'. $row['name'] . '</OPTION>';
        }
                
      ?>      
            
           </SELECT>
   
    <p><label for="operation_name">Nom ou de l'opération :</label><br>
    <input type="text" name="operation_name" /></p>

 
   
    <p><label for="operation_start_date">Date de début de l'opération (aaaa-mm-jj) :</label><br>
    <input type="Date" name="operation_start_date" /></p>
    
    <p><label for="operation_end_date">Date de fin de l'opération (aaaa-mm-jj) :</label><br>
    <input type="date" name="operation_end_date" /></p>

    <p><label for="operation_available_request_date">Date de disponibilité demandée (aaaa-mm-jj):</label><br>
    <input type="date" name="operation_available_request_date" /></p>

    <p><label for="operation_commitment_start_date">Date de début d'engagement (aaaa-mm-jj):</label><br>
    <input type="date" name="operation_commitment_start_date" /></p>

    <p><label for="operation_commitment_end_date">Date de fin d'engagement(aaaa-mm-jj) :</label><br>
    <input type="date" name="operation_commitment_end_date" /></p>
    
               
  <p>  Prioritaire
<input type="radio" name="prio" value="oui" id="oui" checked="checked" /> <label for="oui">Oui</label>
<input type="radio" name="prio" value="non" id="non" /> <label for="non">Non</label>   </p>               
  <p></p>
<button type=submit name=submit class=" btn btn-success">Valider</button>
</form>

     
  </body>


<?php $content = ob_get_clean(); ?>
<?php require('view/frontend/template.php'); ?>
