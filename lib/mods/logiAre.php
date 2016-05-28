<?php 
session_start(); 
include_once '../class/Area.php';
include_once '../class/Spa.php';
$id_subdir = $_POST['valSubdir'];

$classSpa = new Spa();
$dataSpa = $classSpa -> showDataSub($id_subdir); 

if($id_subdir != "blank"){
    

?>

<div class="col_full">
 <label for="subdireccion">Área:</label>
	<select class="form-control btn-block" name="area" onchange="showNo()">
        <option value="blank" >Elige tu subdirección</option>

<?php 
        
        while($dataS=$dataSpa->fetchObject()){
        if($dataS != NULL){
    $ida=$dataS->ida_spa;
    
    $classArea = new Area();
    $dataArea = $classArea -> showData($ida);  ?>
    
    
            <?php while($dataA=$dataArea->fetchObject()){ ?>
                <option value="<?php echo $dataA->id_area; ?>">
				<?php echo $dataA->nom_area; ?>
				</option>
			<?php } }else{ ?>  
            <option value="" >Vacío</option>
       <?php } }?>

	</select>
</div>

<?php 
} else {
    
}
?>
									