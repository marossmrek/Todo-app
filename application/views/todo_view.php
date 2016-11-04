<html>
<head>
	<title>Todo list</title>
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/main.css">
</head>
<body>
	

	<script>var baseUrl = "<?php echo base_url();?>"</script>

	<div class="container-fluid">

			<h1 class="display-3">TODO APP</h1>


			<ul class="col-md-6 list-group">
				
				<?php 

				foreach ($notes as $obj) {

					echo '<li id="item-'.$obj->ID.'" class="list-group-item">'.auto_typography($obj->text).'<small class="text-muted">'.$obj->time.'</small><a href="todo/edit/'.$obj->ID.'">edit</a><a href="todo/delete/'.$obj->ID.'"class="delete">X</a>

					</li>';
					
				}

				?>

			</ul>

			<div class="col-md-6">

				<?php
				echo validation_errors();
				echo form_open('todo/add',"class='form-group'");
				echo form_textarea('text',"","class='form-control'");
				echo form_submit('submit','add new stuff',"class='btn btn-danger'");
				echo form_close();
				?>

			</div>


	  
	</div>


<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/script.js"></script>
</body>
</html>