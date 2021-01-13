<?php include('db_connect.php');?>
<style>
	input[type=checkbox]
{
  /* Double-sized Checkboxes */
  -ms-transform: scale(1.3); /* IE */
  -moz-transform: scale(1.3); /* FF */
  -webkit-transform: scale(1.3); /* Safari and Chrome */
  -o-transform: scale(1.3); /* Opera */
  transform: scale(1.3);
  padding: 10px;
  cursor:pointer;
}
</style>



<div class="container-fluid">
	
	<div class="col-lg-12">
		<div class="row mb-4 mt-4">
			<div class="col-md-12">
				
			</div>
		</div>
		<div class="row">
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<b>List of Student fees </b>
						
					</div>
					<div class="card-body">
						<table class="table table-condensed table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="">Admission No.</th>
									<th class="">NEMIS</th>
									<th class="">Name</th>
									<th class="">Payable Fee</th>
									<th class="">Paid</th>
									<th class="">Balance</th>
								
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
$fees = $conn->query("SELECT ef.*,s.name as sname,s.id_no FROM student_ef_list ef inner join student s on s.id = ef.student_id order by s.name asc ");
								while($row=$fees->fetch_assoc()):
									$paid = $conn->query("SELECT sum(amount) as paid FROM payments where ef_id=".$row['id']);
									$paid = $paid->num_rows > 0 ? $paid->fetch_array()['paid']:'';
									$balance = $row['total_fee'] - $paid;
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td>
										<p> <b><?php echo $row['id_no'] ?></b></p>
									</td>
									<td>
										<p> <b><?php echo $row['ef_no'] ?></b></p>
									</td>
									<td>
										<p> <b><?php echo ucwords($row['sname']) ?></b></p>
									</td>
									<td class="text-right">
										<p> <b><?php echo number_format($row['total_fee'],2) ?></b></p>
									</td>
									<td class="text-right">
										<p> <b><?php echo number_format($paid,2) ?></b></p>

									<td class="text-right">
										<p> <b><?php echo number_format($balance,2) ?></b></p>
									</td>
									
								</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>	

</div>
<style>
	
	td{
		vertical-align: middle !important;
	}
	td p{
		margin: unset
	}
	img{
		max-width:100px;
		max-height: :150px;
	}
</style>












