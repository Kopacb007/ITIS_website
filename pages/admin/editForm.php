<?php 
session_start();
include('config/setup.php');

$id = $_POST['id'];

$data = get_page($dbc, $id);
?>

<form>
  <div class="form-group">
    <label for="header">Header</label>
    <input type="text" class="form-control" id="header" value=<?php echo "\"". $data['header'] ."\"" ?> >
  </div>
  <div class="form-group">
    <label for="body">Body</label>
    <textarea class="form-control" id="body" rows="10"><?php echo $data['body'] ?></textarea>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>