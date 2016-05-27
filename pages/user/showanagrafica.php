<?php 
if (mysqli_num_rows($r) <= 0) {
    $message = "No data";
    include('popup.php');
    die();
} ?>
<div class="animated fadeInUp">
	<div class="col-xs-10 col-xs-offset-1">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">
                    Dati anagrafici studente: <?php echo data_user($dbc, $user_id)['fullname'] ?>
                </h3>
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <?php
                            if (mysqli_num_rows($r) > 0) { ?>
                                    <th>Campo</th>
                                    <th>Valore</th>
                            <?php } else {
                                $message = "No data";
                                include('popup.php');
                                die();
                            }
                            ?> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            // mysqli_data_seek(result,offset); => put the index pointer to the offset
                            mysqli_data_seek($r, 0);
                            while ($row = mysqli_fetch_assoc($r)) {
                                foreach ($row as $key => $value) { ?>
                                     <tr>
                                         <td>
                                         <?php echo $key; ?>
                                         </td>
                                         <td>
                                         <?php echo $value; ?>
                                         </td>
                                     </tr>
                                <?php } ?>
                            <?php } ?>
                    </tbody>    
                </table>
            </div>
        </div>
    </div>
</div>