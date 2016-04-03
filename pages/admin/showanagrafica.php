<div class="animated fadeInUp">
	<div class="col-xs-6 col-xs-offset-3">
        <h3 class="text-center">Dati anagrafici studente: <?php echo data_user($dbc, $user_id)['fullname'] ?></h3>
		<div class="table-responsive">
			<table class="table table-striped table-bordered">
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