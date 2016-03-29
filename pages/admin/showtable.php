<div class="animated fadeInUp">
	<div class="col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<?php
                        if (mysqli_num_rows($r) > 0) {
                            $row = mysqli_fetch_assoc($r);
                            foreach ($row as $key => $value) { ?>
                                <th><?php echo $key; ?></th>
                            <?php } ?>
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
						// mysqli_data_seek(result,offset);
						mysqli_data_seek($r, 0); 
						while ($row = mysqli_fetch_assoc($r)) { ?>
						<tr <?php 
							if (array_key_exists('Voto',$row) and ($row['Voto'] < 6)) {
								echo "class=\"danger\"";
							} else if (array_key_exists('Voto',$row) and ($row['Voto'] >= 8)) {
								echo "class=\"success\"";
							}
							?>
							>
							<?php 
                            
                            if (array_key_exists("Peso",$row)) {
										$row["Peso"] .= "%"; 
									}
                            
                            foreach ($row as $_column) { ?>
								<td>
								<?php echo $_column; ?>
								 </td>
							<?php } ?>
						</tr>
					<?php } ?>
				</tbody>	
			</table>
		</div>
	</div>
</div>