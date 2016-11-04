<html>
<head>
	<title>Todo list</title>
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/main.css">
</head>
<body>

	<div class="container-fluid">

			<h1 class="display-3">Edit data</h1>

			<div class="col-md-6">



				<?php

					echo validation_errors();

					if(isset($edit_text)){

						$text = $edit_text[0]->text;
						$id = $edit_text[0]->ID;
						echo form_open('todo/update/'.$id.'',"class='form-group'");
						echo form_textarea('text',"$text","class='form-control'");
					}
					
					else{

						echo form_open('todo/update/'.$id.'',"class='form-group'");
						echo form_textarea('text',"","class='form-control'");
					}

					
					echo form_submit('submit','edit me',"class='btn btn-danger'");
					echo anchor('todo', 'Back', 'class="back"');
					echo form_close();
				?>

			</div>


	  
	</div>


</body>
</html>