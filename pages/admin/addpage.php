<?php 

if (isset($_POST['create'])) {

	$header = $_POST['header'];
	$body = $_POST['body'];
	$table = $_POST['pagetype'];

	$q = "INSERT INTO `$table` (`id`, `header`, `image`, `body`, `link`) VALUES (NULL, '$header', 'Image', '$body', 'Link')";
	$r = mysqli_query($dbc, $q);
	$message = "The page has been created";

}


?>

<?php 
	if (isset($message)) {
		include('popup.php');
	}
?>
<div class="row">
	<div class="col-md-6 col-md-offset-3 animated fadeInRight">
		<div class="box box-solid box-info">
			<div class="box-header with-border text-center">
			  <h3 class="box-title">Create Form</h3>
			</div><!-- /.box-header -->
			<div class="box-body">
				<form method="post" action="">
				<div class="form-group">
					<label>Page type</label>
				    <select name="pagetype">
						<option value="news">News</option>
						<option value="circolari">Circolare</option>
				    </select>
				  </div>
				  <div class="form-group">
				    <label for="header">Header</label>
				    <input type="text" name="header" class="form-control" id="header" placeholder="Insert header here" >
				  </div>
				  <div class="form-group">
				    <label for="body">Body</label>
				    <textarea class="form-control" name="body" id="body" rows="10"></textarea>
				  </div>
				  <div class="row">
				  	<div class="col-xs-6">
				  		<a href="#" onclick="goTo('maincontent.php')" class="btn btn-danger"><span><i class="fa fa-chevron-left"></i></span> Back</a>
				  	</div>
				  	<div class="col-xs-6">
				  		<button type="submit" name="create" class="btn btn-success pull-right"><span><i class="fa fa-plus"></i></span> Create</button>
				  	</div>
				  </div>
				  
				  
				</form>
			</div><!-- /.box-body -->
		</div>
	</div>
</div>