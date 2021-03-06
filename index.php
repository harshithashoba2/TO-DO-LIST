<?php
require 'db_conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
	 <meta name="viewport" content="width=device-width,initial_scale=1.0">
	 <meta http-equiv="X-UA-Compatible" content="ie=edge">
	 <meta http-equiv="Cache-control" content="no-cache">
	 <title>TO-DO LIST</title>
     <link rel="stylesheet" href="s.css">
</head>
<body>
    <div id=""class="main-section">
	     <div class="add-section">
		    <form action="app\add.php" method="POST" id="h" name="h" autocomplete="off">
			         <?php if(isset($_GET['mess']) && $_GET['mess'] == 'error'){ ?>
					<input type="text" 
				           id="title"
						   name="title"
						   placeholder="This field is required" />
					
				    <button type="submit" id="add" name="add">Add &nbsp; <span>&#43;</span></button>
					
					
					<?php }else{ ?>
              <input type="text" 
                     name="title" 
                     placeholder="What do you need to do?" />
              <button type="submit">Add &nbsp; <span>&#43;</span></button>
             <?php } ?>
			</form>
		</div>
		<?php
		  $todos = $conn->query("SELECT * FROM todos ORDER BY id DESC");
		?>
		<div class="show-todo-section">
		     <?php if($todos->rowCount() <= 0){ ?>
			    <div class="todo-item">
				    <div class="empty">
		               <img src="img1.jfif" width="90%"/>
					   <img src="img2.gif" width="80 px"/>		   
				     </div>
			    </div>
			 <?php } ?>
			 <?php while($todo = $todos->fetch(PDO::FETCH_ASSOC)) { ?>
		     <div class="todo-item">
			     <span id="<?php echo $todo['id']; ?>"
				     class="remove-to-do">x</span>
				 <?php if($todo['checked']){ ?> 
                        <input type="checkbox"
                               class="check-box"
                               data-todo-id ="<?php echo $todo['id']; ?>"
                               checked />
                        <h2 class="checked"><?php echo $todo['title'] ?></h2>
                    <?php }else { ?>
                        <input type="checkbox"
                               data-todo-id ="<?php echo $todo['id']; ?>"
                               class="check-box" />
                        <h2><?php echo $todo['title'] ?></h2>
				 <?php } ?>
				 <br>
				 <small>created: <?php echo $todo['date_time'] ?></small> 
		      </div>
			 <?php } ?>
		</div>
			 
	</div>
	
	
	
</body>
</html>	 