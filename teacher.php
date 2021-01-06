<?php
include "inc/header.php";

spl_autoload_register(function ($class){
    include "classes/".$class.".php";
});
// Read Data
$tcher = new Teacher();
$stdData = $tcher->readAll();

?>
<section class="subject">
	<p>Teacher Data<span style="float:right"><a href="index.php">Student Info</a> || <a href="teacher.php">Teacher Info</a></span><p>
</section>

<section class="mainleft">
	<?php
	// Insert Data
	if(isset($_POST['create'])){
		$name = $_POST['name'];
		$dep  = $_POST['dep'];
		$age  = $_POST['age'];

		$tcher->setName($name);
		$tcher->setDep($dep);
		$tcher->setAge($age);

		if($tcher->insertData()){
			echo "<span class='insert'>Data Inserted Successfully...</span>";
		}
	}

	// Update Data
	if(isset($_POST['update'])){
		$id   = $_POST['id'];
		$name = $_POST['name'];
		$dep  = $_POST['dep'];
		$age  = $_POST['age'];

		$tcher->setName($name);
		$tcher->setDep($dep);
		$tcher->setAge($age);
		if($tcher->updateData($id)){
			echo "<span class='insert'>Data Update Successfully...</span>";
		}
	}

	?>
	<?php
	// Delete Data
	if(isset($_GET['action']) && $_GET['action']=='delete') {
		$id = $_GET['id'];
		if($tcher->deleteData($id)){
			echo "<span class='delete'>Data Deleted Successfully...</span>";
		}
	}
	?>

	<?php
	// Update Data
	if(isset($_GET['action']) && $_GET['action']=='update'){
		$id = $_GET['id'];
		$result = $tcher->readById($id);
		?>
		<form action="" method="post">
			<table>
				<input type="hidden" name="id" value="<?php echo $result['id'];?>"/>
				<tr>
					<td>Name: </td>
					<td><input type="text" name="name" value="<?php echo $result['name'];?>" required="1"/></td>
				</tr>

				<tr>
					<td>Department: </td>
					<td><input type="text" name="dep" value="<?php echo $result['dep'];?>" required="1"/></td>
				</tr>

				<tr>
					<td>Age: </td>
					<td><input type="text" name="age" value="<?php echo $result['age'];?>" required="1"/></td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input class="btn1" type="submit" name="update" value="Update"/>

					</td>
				</tr>
			</table>
		</form>
	<?php }else{ ?>


		<form action="" method="post">
			<table>
				<tr>
					<td>Name: </td>
					<td><input type="text" name="name" placeholder="Your Name" required="1"/></td>
				</tr>

				<tr>
					<td>Department: </td>
					<td><input type="text" name="dep" placeholder="Your Department" required="1"/></td>
				</tr>

				<tr>
					<td>Age: </td>
					<td><input type="text" name="age" placeholder="Your Age" required="1"/></td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input class="btn1" type="submit" name="create" value="Submit"/>
						<input class="btn2" type="reset" value="Clear"/>
					</td>
				</tr>
			</table>
		</form>
	<?php } ?>
</section>



<section class="mainright">
	<table class="tblone">
		<tr>
			<th>No</th>
			<th>Name</th>
			<th>Department</th>
			<th>Age</th>
			<th>Action</th>
		</tr>
		<?php
		$i = 0;
		foreach($stdData as $value){
			$i++;
			?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $value['name'];?></td>
				<td><?php echo $value['dep'];?></td>
				<td><?php echo $value['age'];?></td>
				<td>
					<?php echo "<a href='teacher.php?action=update&id=".$value['id']."' >Edit</a>"; ?>
					||
					<?php echo "<a href='teacher.php?action=delete&id=".$value['id']."' onclick='return confirm(\"Are you sure to delete data\")'>Delete</a>"; ?>
				</td>
			</tr>
		<?php }?>

	</table>
</section>


<?php include "inc/footer.php"; ?>