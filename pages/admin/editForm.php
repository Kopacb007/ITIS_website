<?php

$id = $_GET['id'];
$type = $_GET['type'];
if ($type === 'news') {
    $cond = 'news';
} else {
    $cond = 'circolari';
}

if (isset($_POST['save'])) {

	$header = $_POST['header'];
	$body = $_POST['body'];

	$q = "UPDATE `$cond` SET `header` = '$header', `image` = NULL, `body` = '$body', `link` = NULL WHERE `$cond`.`id` = $id";
	$r = mysqli_query($dbc,$q);
} else if (isset($_POST['delete'])) {
	$q = "DELETE FROM `$cond` WHERE `$cond`.`id` = $id";
	$r = mysqli_query($dbc,$q);
	
}

$data = get_page($dbc, $id, $type);

?>

<div class="col-md-6 col-md-offset-3 animated fadeInRight">

	<div class="box box-solid box-info">
		<div class="box-header with-border text-center">
		  <h3 class="box-title">Edit Form</h3>
		</div><!-- /.box-header -->
		<div class="box-body">
			<form method="post" action="">
			  <div class="form-group">
			    <label for="header">Header</label>
			    <input type="text" name="header" class="form-control" id="header" value=<?php echo "\"". $data['header'] ."\"" ?> >
			  </div>
			  <div class="form-group">
			    <label for="body">Body</label>
			    <textarea class="form-control" name="body" id="body" rows="10"><?php echo $data['body'] ?></textarea>
			  </div>
			  <div class="row">
			  	<div class="col-xs-6">
			  		<a href="#" onclick="goTo('maincontent.php')" class="btn btn-danger"><span><i class="fa fa-chevron-left"></i></span> Back</a>
			  	</div>
			  	<div class="col-xs-6">
			  		<button type="submit" name="save" class="btn btn-success pull-right"><span><i class="fa fa-floppy-o"></i></span> Save</button>
			  		<button type="submit" name="delete" class="btn btn-warning pull-right"><span><i class="fa fa-close"></i></span> Delete</button>
			  	</div>
			  </div>
			  
			  
			</form>
		</div><!-- /.box-body -->
	</div>
</div>
