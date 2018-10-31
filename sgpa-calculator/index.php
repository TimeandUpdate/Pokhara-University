<!DOCTYPE html>
<html>
<head>
	<title>Pokhara University SGPA Calculator</title>
	<link rel="shortcut icon" type="image/png" href="../image/logo.png"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<br />
	<div class="container" style="max-width: 800px;">
		<h1 align="center">Pokhara University SGPA Calculator</h1>
		<div align="center">
			<div style="max-width: 400px;">
				<form method="post" id="SGPA_form">
					<div class="table-repsonsive">
						<span id="error"></span>
						<table class="table table-bordered" id="sgpa_table">
							<tr>
								<th>Credit Hour</th>
								<th>Grade</th>
								<th><button type="button" name="add" class="btn btn-success btn-sm add"><span class="glyphicon glyphicon-plus"></span></button></th>
							</tr>
							<tr class="datas">
								<td><select name="credit" class="form-control credit"><option value="">Select Credit</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option></select></td>
								<td><select name="grade" class="form-control grade"><option value="">Select Grade</option><option value="4">A</option><option value="3.7">A-</option><option value="3.3">B+</option><option value="3">B</option><option value="2.7">B-</option><option value="2.3">C+</option><option value="2">C</option><option value="1.7">C-</option><option value="1.3">D+</option><option value="1">D</option></select></td>
								<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td>
							</tr>
						</table>
						<span id="sgpa"></span>
						<div align="center">
							<input type="submit" name="submit" class="btn btn-info" value="Calculate SGPA" />
						</div>
					</div>
				</form>
			</div>
			<br/>
			<p>Semester End Grade Point Average is the SGPA. SGPA indicate the weightage of marks secured by a student.<br/><img alt="How to calculate SGPA Pokhara University" src = "../image/how-SGPA-and-CGPA-is-calculated.jpg"/><br/>In the Image above the honor point = credit * obtained grade.</p>
			<p>Select the credit of the subject and the grade obtained in that subject. Do the same for all other subject in that semester. This SGPA calculator is based on credit system of Pokhara University, Nepal</p>
		</div>
	</div>
</body>
</html>
<script>
	var totalcredit = 0;
	var upperval = 0;
</script>
<script>
$(document).ready(function(){
	$(document).on('click', '.add', function(){
		var html = '';
		html += '<tr class="datas">';
		html += '<td><select name="credit" class="form-control credit"><option value="">Select Credit</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option></select></td>';
		html += '<td><select name="grade" class="form-control grade"><option value="">Select Grade</option><option value="4">A</option><option value="3.7">A-</option><option value="3.3">B+</option><option value="3">B</option><option value="2.7">B-</option><option value="2.3">C+</option><option value="2">C</option><option value="1.7">C-</option><option value="1.3">D+</option><option value="1">D</option></select></td>';
		html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td></tr>';
		$('#sgpa_table').append(html);
		
	});

	$(document).on('click', '.remove', function(){
		$(this).closest('tr').remove();

	});

	$('#SGPA_form').on('submit', function(event){
		event.preventDefault();
		totalcredit = 0;
		upperval = 0;
		var error = '';

		var count = 1;
		$('.credit').each(function(index, value){
			if($(this).val() == '')
			{
				error += "<p>Enter Credit at "+count+" Row</p>";
				return false;
			}
			count = count + 1;
		});

		count = 1;
		$('.grade').each(function(index, value){
			if($(this).val() == '')
			{
				error += "<p>Select Grade at "+count+" Row</p>";
				return false;
			}
			count = count + 1;
		});
		
		var form_data = $(this).serialize();
		if(error == '')
		{
			$("#error").find("div").remove();
			
			$('.datas').each(function(index, value){
				var credit;
				var grade;
				credit = $(this).find('.credit').val();
				grade = $(this).find('.grade').val();
			
				credit = credit * 1;
				totalcredit = totalcredit * 1;
			
				totalcredit = totalcredit + credit;
				upperval = upperval + credit * grade;
			});
		
			//n = num.toFixed(2);
			///Display result
			//var totalcredit = 0;
			//var upperval = 0;
			var result = upperval / totalcredit;
			var sgpa = result.toFixed(2);
			$('#sgpa').html('<div class="alert alert-success"><strong>SGPA= '+sgpa+'</strong></div>');
			
		}
		else
		{
			$('#error').html('<div class="alert alert-danger">'+error+'</div>');
		}
	});
});
</script>
