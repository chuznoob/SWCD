<?php 
session_start(); 
include_once '../../lib/class/Subdireccion.php';
include_once '../../lib/class/Pps.php';
$id_proceso = $_POST['valProceso'];
$subdir_usuario = $_POST['valSubdirUser'];
$area_usuario = $_POST['valAreaUser'];

$classPps = new Pps();
$dataPps = $classPps -> showDataProc($id_proceso); 

if($id_proceso != "blank"){
    
?>

<label for="subdir_usuario">Subdirección y/o Dirección del usuario:</label>
	<select name="subdir_usuario" class="form-control" 
	onchange="showAre(this.value , '<?php echo $area_usuario; ?>')">
		<option value="blank" >Elige tu subdirección</option>						
<?php 
        
        while($dataP=$dataPps->fetchObject()){
        if($dataP != NULL){
    $ids=$dataP->ids_pps;
    
    $classSubdireccion = new Subdireccion();
    $dataSubdireccion = $classSubdireccion -> showData($ids);  ?>
    
    
           <?php while($dataS=$dataSubdireccion->fetchObject()){ ?>
		<option value="<?php echo $dataS->id_subdireccion; ?>" <?php if($dataS->id_subdireccion==$subdir_usuario){ echo "selected"; } ?>>
		<?php echo $dataS->nom_subdireccion; ?>
		</option>
		
			<?php } ?>

    
    <?php }else{ ?>  
            <option value="blank" >Vacío</option>
       <?php } }?>
       </select>
<?php 
} else {
    
}
?>



