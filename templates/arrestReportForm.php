<div class="container mb-5 pb-5">
	<?php include 'templates/arrestChargeTable.php'; ?>
	<h1 class="my-3">Arrest Report - Form</h1>
	<form action="controllers/arrestReportFormProcessor.inc.php" method="POST">

		<h4><i class="fas fa-archive fa-fw"></i> General Details</h4>
		<div class="form-row">
			<div class="form-group col-2">
				<label>Date</label>
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-fw fa-calendar"></i></span>
					</div>
					<input
					class="form-control"
					type="text"
					id="inputDate"
					name="inputDate"
					placeholder="DD/MMM/YYYY"
					value="<?php echo $g->getDate(); ?>"
					style="text-transform: uppercase;"
					required
					data-placement="bottom" title="DD/MMM/YYYY Format">
				</div>
			</div>
			<div class="form-group col-2">
				<label>Time</label>
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-fw fa-clock"></i></span>
					</div>
					<input
					class="form-control"
					type="text"
					id="inputTime"
					name="inputTime"
					placeholder="00:00 - 24:00"
					value="<?php echo $g->getTime(); ?>"
					required
					data-placement="bottom" title="24-Hour Format - 00:00">
				</div>
			</div>
			<div class="form-group col-2">
				<label>Time of Arrest</label>
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-fw fa-clock"></i></span>
					</div>
					<input
					class="form-control"
					type="text"
					id="inputTimeOfArrest"
					name="inputTimeOfArrest"
					placeholder="00:00 - 24:00"
					value="<?php echo $g->getTimeArrest(); ?>"
					required
					data-placement="bottom" title="24-Hour Format - 00:00">
				</div>
			</div>
			<div class="form-group col-2">
				<label>Call Sign</label>
				<input
				class="form-control"
				type="text"
				id="inputCallsign"
				name="inputCallsign"
				placeholder="Call Sign"
				value="<?php echo $g->cookieCallSign(); ?>"
				required
				data-placement="bottom" title="Example: 2-ADAM-1, 2A1">
			</div>
		</div>

		<h4><i class="fas fa-user-shield fa-fw"></i> Officer Details</h4>
		<div class="form-row officerGroup">
			<div class="form-group col-4">
				<label>Full Name</label>
				<input
				class="form-control"
				type="text"
				id="inputName"
				name="inputName[]"
				placeholder="Firstname Lastname"
				value="<?php echo $g->cookieName(); ?>"
				required
				data-placement="bottom" title="Officer - Full Name">
			</div>
			<div class="form-group col-3">
				<label>Rank</label>
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-fw fa-user-shield"></i></span>
					</div>
					<select
					class="form-control"
					id="inputRank"
					name="inputRank[]"
					required>
					<option value="<?php echo $g->cookieRank(); ?>"><?php echo $g->getRank($g->cookieRank());?></option>
					<?php
						$g->rankChooser();
					?>
					</select>
				</div>
			</div>
			<div class="form-group col-2">
				<label>Badge</label>
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-fw fa-hashtag"></i></span>
					</div>
					<input
					class="form-control" 
					type="number"
					id="inputBadge"
					name="inputBadge[]"
					placeholder="####"
					value="<?php echo $g->cookieBadge(); ?>"
					required
					data-placement="bottom" title="Officer - Badge">
				</div>
			</div>
			<div class="form-group col-1">
				<label>Options</label>
				<div class="input-group-addon"> 
					<a href="javascript:void(0)" class="btn btn-success w-100 addOfficer"><i class="fas fa-plus-square"></i> Slot</a>
				</div>
			</div>
		</div>

		<h4><i class="fas fa-map-marked-alt fa-fw"></i> Location of Arrest Details</h4>
		<div class="form-row">
			<div class="form-group col-4">
				<label>District</label>
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-fw fa-map-marked-alt"></i></span>
					</div>
					<input
					class="form-control"
					type="text"
					id="inputDistrict"
					name="inputDistrict"
					placeholder="District"
					list="district_list"
					required
					data-placement="bottom" title="Location - District">
					<datalist id="district_list">
					<?php
						$ar->districtChooser();
					?>
					</datalist>
				</div>
			</div>
			<div class="form-group col-4">
				<label>Street Name</label>
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-fw fa-road"></i></span>
					</div>
					<input
					class="form-control"
					type="text"
					id="inputStreet"
					name="inputStreet"
					placeholder="Street Name"
					list="street_list"
					required
					data-placement="bottom" title="Location - Street Name">
					<datalist id="street_list">
					<?php
						$ar->streetChooser();
					?>
					</datalist>
				</div>
			</div>
		</div>

		<h4><i class="fas fa-clipboard fa-fw"></i> Defendant & Narrative</h4>
		<div class="form-row">
			<div class="form-group col-4">
				<label>Full Name</label>
				<input
				type="text"
				class="form-control"
				id="inputDefName"
				name="inputDefName"
				placeholder="Firstname Lastname"
				required
				data-placement="bottom" title="Defendant - Full Name">
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-12">
				<label>Narrative & Notes</label>
				<textarea
				class="form-control"
				id="inputNarrative"
				name="inputNarrative"
				rows="4"
				placeholder="Witnessed the defendant to be X on the X street.
The defendant was found to be X."
				required></textarea>
				<small id="helpDashcam" class="form-text text-muted">Enter as much detail as possible in regards to the arrest, what was witnessed by the officer. Include as much information as possible of the events leading up to the arrest.</small>
			</div>
		</div>
		
		<h4><i class="fas fa-clipboard fa-fw"></i> Evidence</h4>
		<div class="form-row">
			<div class="form-group col-6">
				<label>Evidence</label>
				<textarea
				class="form-control"
				id="inputEvidence"
				name="inputEvidence"
				rows="4"
				placeholder="Any evidence in conjunction with the arrest."
				></textarea>
				<small id="helpDashcam" class="form-text text-muted">Enter any evidence which will support the arrest ((Streamable included)) <strong>Essential if suspect pleads no contest or not guilty</strong></small>
			</div>
			<div class="form-group col-6">
				<label>OPTIONAL: Dashboard Camera</label>
				<textarea
				class="form-control"
				id="inputDashcam"
				name="inputDashcam"
				rows="4"
				placeholder="Start with: Dashcam footage shows ((Only fill this section in with roleplay dashcam if needed, Streamables must go in evidence section))"></textarea>
				<small id="helpDashcam" class="form-text text-muted">(( Dashboard camera roleplay. - Do not include "/do" or " * ". - <b style="color: darkred;">Lying in this section will lead to punishments</b>. Enter as much detail as possible in regards to what the dashboard camera would capture on video and audio. ))</small>
			</div>
		</div>
		
		<h4><i class="fas fa-landmark fa-fw"></i> Writband/Bracelet & Plea</h4>
		<div class="form-row">
			
			<div class="form-group col-4">
				<label>Wristband (Leave blank if MRS)</label>
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-fw fa-microchip"></i></span>
					</div>
					<input
					class="form-control"
					type="text"
					id="inputWristband"
					name="inputWristband"
					placeholder="Red / Blue or Yellow"
					list="wristband_list"
					data-placement="bottom" title="Inmates Wristband">
					<datalist id="wristband_list">
					<?php
						$ar->wristbandChooser();
					?>
					</datalist>
					<small id="helpWristband" class="form-text text-muted">
						<strong>Red Wristband:</strong> Any and all violent charges. <br />
						<strong>Blue Wristband:</strong> Any and all non-violent charges. <br />
						<strong>Yellow Wristband:</strong> Any and all medical related concerns.
					</small>
				</div>
			</div>
			<div class="form-group col-4">
				<label>Bracelet (Leave blank if MRS)</label>
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-fw fa-microchip"></i></span>
					</div>
					<input
					class="form-control"
					type="text"
					id="inputBracelet"
					name="inputBracelet"
					placeholder="White or Orange"
					list="bracelet_list"
					data-placement="bottom" title="Inmates Bracelet">
					<datalist id="bracelet_list">
					<?php
						$ar->braceletChooser();
					?>
					</datalist>
					<small id="helpBracelet" class="form-text text-muted">
						<strong>White Bracelet:</strong> Any and all violent charges. <br />
						<strong>Orange Bracelet:</strong> Any and all non-violent charges. <br />
						<strong style="opacity: 0;">=============================================</strong>
					</small>
				</div>
			</div>
			<div class="form-group col-4">
				<label>Plea</label>
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-fw fa-gavel"></i></span>
					</div>
					<input
					class="form-control"
					type="text"
					id="inputPlea"
					name="inputPlea"
					placeholder="Guilty / Not Guilty or No Contest"
					list="plea_list"
					required
					data-placement="bottom" title="Inmates Plea">
					<datalist id="plea_list">
					<?php
						$ar->pleaChooser();
					?>
					</datalist>
				</div>
			</div>
		</div>
		
		<div class="container my-5 text-center">
		<button id="submit" type="submit" name="submit" class="btn btn-primary px-5"><i class="fas fa-plus-square fa-fw"></i>Submit</button>
	</div>
	</form>

	<div class="container fieldGroupCopy" style="display: none;">
		<div class="form-group col-4">
			<input
			class="form-control"
			type="text"
			id="inputName"
			name="inputName[]"
			placeholder="Firstname Lastname"
			required>
		</div>
		<div class="form-group col-3">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-fw fa-user-shield"></i></span>
				</div>
				<select
				class="form-control"
				id="inputRank"
				name="inputRank[]"
				required>
				<?php
					$g->rankChooser();
				?>
				</select>
			</div>
		</div>
		<div class="form-group col-2">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-fw fa-hashtag"></i></span>
				</div>
				<input
				class="form-control" 
				type="number"
				id="inputBadge"
				name="inputBadge[]"
				placeholder="####"
				required>
			</div>
		</div>
		<div class="form-group col-1">
			<div class="input-group-addon"> 
				<button class="btn btn-danger w-100 removeOfficer" type="button" id="button-addon2"><i class="fas fa-minus-square"></i> Slot</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		var maxSlots = 4;
		$(".addOfficer").click(function(){
			if($('body').find('.officerGroup').length < maxSlots){
				var fieldHTML = '<div class="form-row officerGroup">'+$(".fieldGroupCopy").html()+'</div>';
				$('body').find('.officerGroup:last').after(fieldHTML);
			}else{
				alert('Maximum '+maxSlots+' officer slots are allowed.');
			}
		});

		$("body").on("click",".removeOfficer",function(){ 
			$(this).parents(".officerGroup").remove();
		});
	});
</script>

<script>
	$(document).ready(function(){
		$('input').tooltip();
	});
</script>