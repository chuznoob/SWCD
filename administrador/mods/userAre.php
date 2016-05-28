<?php 
session_start(); 
include_once '../../lib/class/Area.php';
include_once '../../lib/class/Spa.php';
$id_subdir = $_POST['valSubdir'];
$area_usuario = $_POST['valAreUser'];

$classSpa = new Spa();
$dataSpa = $classSpa -> showDataSub($id_subdir); 

if($id_subdir != "blank"){
    

?>


 <label for="subdireccion">Área:</label>
	<select class="form-control btn-block" name="area_usuario">
        <option value="blank" >Elige tu área</option>

<?php 
        
        while($dataS=$dataSpa->fetchObject()){
        if($dataS != NULL){
    $ida=$dataS->ida_spa;
    
    $classArea = new Area();
    $dataArea = $classArea -> showData($ida);  ?>
    
    
            <?php while($dataA=$dataArea->fetchObject()){ ?>
                <option value="<?php echo $dataA->id_area; ?>"<?php if($dataA->id_area==$area_usuario){ echo "selected";} ?> >
				<?php echo $dataA->nom_area; ?>
				</option>
			<?php } }else{ ?>  
            <option value="blank" >Vacío</option>
       <?php } }?>

	</select>

<?php 
} else {
    
}
?>
									