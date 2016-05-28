<?php 
session_start(); 
include_once '../class/Subdireccion.php';
include_once '../class/Pps.php';
$id_proceso = $_POST['valProceso'];

$classPps = new Pps();
$dataPps = $classPps -> showDataProc($id_proceso); 

if($id_proceso != "blank"){
    

?>

<div class="col_full">
 <label for="subdireccion">Dirección y/o Subdirección :</label>
	<select class="form-control btn-block" name="subdireccion" onchange="showAre(this.value)">
        <option value="blank" >Elige tu subdirección</option>

<?php 
        
        while($dataP=$dataPps->fetchObject()){
        if($dataP != NULL){
    $ids=$dataP->ids_pps;
    
    $classSubdireccion = new Subdireccion();
    $dataSubdireccion = $classSubdireccion -> showData($ids);  ?>
    
    
           <?php while($dataS=$dataSubdireccion->fetchObject()){ ?>
		<option value="<?php echo $dataS->id_subdireccion; ?>">
		<?php echo $dataS->nom_subdireccion; ?>
		</option>
			<?php } ?>

    
    <?php }else{ ?>  
            <option value="" >Vacío</option>
       <?php } }?>

	</select>
</div>

<?php 
} else {
    
}
?>



