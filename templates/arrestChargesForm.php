<div class="container mb-5 pb-5">
	<h1 class="my-3">Arrest Report - Charges</h1>
	<form action="index.php?page=arrestReport" method="POST">

		<h4><i class="fas fa-receipt fa-fw"></i> Charges</h4>
		<div class="form-row chargeGroup">
			<div class="form-group col-6">
				<label>Crime ID, Title, & Classification</label>
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-fw fa-gavel"></i></span>
					</div>
					<select
					class="form-control"
					id="inputCrime"
					name="inputCrime[]"
					required>
					<?php
						$ar->chargeChooser();
					?>
					</select>
				</div>
			</div>
			<div class="form-group col-2">
				<label>Crime Type</label>
				<select
				id="inputCrimeType"
				name="inputCrimeType[]"
				class="form-control"
				required>
				<?php
					$ar->crimeTypeChooser();
				?>
				</select>
			</div>
			<div class="form-group col-2">
				<label>Crime Offence</label>
				<select
				id="inputCrimeOffence"
				name="inputCrimeOffence[]"
				class="form-control"
				required>
				<?php
					$ar->offenceChooser();
				?>
				</select>
			</div>
			<div class="form-group col-2">
				<label>Options</label>
				<div class="input-group-addon"> 
					<a href="javascript:void(0)" class="btn btn-success w-100 addCharge"><i class="fas fa-plus-square fa-fw"></i> Add Charge</a>
				</div>
			</div>
		</div>
		<div class="container my-5 text-center">
		<button id="submit" type="submit" name="submit" class="btn btn-primary px-5"><i class="fas fa-plus-square fa-fw"></i>Calculate Arrest</button>
	</div>
	</form>

	<div class="container fieldChargeCopy" style="display: none;">
		<div class="form-group col-6">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-fw fa-gavel"></i></span>
				</div>
				<select
				class="form-control"
				id="inputCrime"
				name="inputCrime[]"
				required>
				<?php
					$ar->chargeChooser();
				?>
				</select>
			</div>
		</div>
		<div class="form-group col-2">
			<select
			id="inputCrimeType"
			name="inputCrimeType[]"
			class="form-control"
			required>
			<?php
				$tr->crimeTypeChooser();
			?>
			</select>
		</div>
		<div class="form-group col-2">
			<select
			id="inputCrimeOffence"
			name="inputCrimeOffence[]"
			class="form-control"
			required>
			<?php
				$ar->offenceChooser();
			?>
			</select>
		</div>
		<div class="form-group col-2">
			<div class="input-group-addon"> 
				<button class="btn btn-danger w-100 removeCharge" type="button" id="button-addon2"><i class="fas fa-minus-square"></i> Remove Charge</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		var maxCharges = 10;
		$(".addCharge").click(function(){
			if($('body').find('.chargeGroup').length < maxCharges){
				var fieldHTML = '<div class="form-row chargeGroup">'+$(".fieldChargeCopy").html()+'</div>';
				$('body').find('.chargeGroup:last').after(fieldHTML);
			}else{
				alert('Maximum '+maxCharges+' charges are allowed.');
			}
		});

		$("body").on("click",".removeCharge",function(){ 
			$(this).parents(".chargeGroup").remove();
		});
	});
</script>

<script>
	$(document).ready(function(){
		$('input').tooltip();
	});
</script>