<?php require '../core/connect.php'; ?>
<?php session_start()?>
<?php
 if(!isset($_SESSION['username']) || !isset($_SESSION['password'])){
  header('Location: login.php');
}
?>
<?php include 'includes/head.php'; ?>
<?php include '../helpers.php'; ?>

 <?php
      $fetch_mail =  "SELECT * FROM files WHERE doc_format LIKE '%email%' AND deleted = 0";
      $get_mail = $db->query($fetch_mail);
      $mail = mysqli_num_rows($get_mail);
     ?>

<div class="container">
<?php include 'includes/navigation.php'; ?>
	<div class="row">
		<?php include 'includes/sidebar.php'; ?>
		<div class="col-md-9">
			<div class="panel">
				<div class="panel-heading">
					E-mail
					</div>
					<br>
          <h2 class="text-center">E-mails ---<?=$mail?></h2><hr>
					<br>
                 <div class="panel-body>">
            <table class="table table-striped table-condensed">
     <thead>
       <th>edit</th> 
       <th>Id</th>
       <th>Sender</th>
       <th>S.Division</th>
       <th>Receipient</th>
       <th>R.Division</th>
       <th>date</th>
       <th>view</th>
       <th>remove</th>
     </thead>
     <tbody>
       <?php while($result = mysqli_fetch_assoc($get_mail)): ?>
       <tr class="bg-info">
         <td><a href="edit.php?edit=<?=$result['id'] ?>" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-pencil"></span> </a></td>
         <td><?=$result['doc_id']?></td>
         <td><?=$result['sender_name']?></td>
         <td><?=$result['sender_division']?></td>
         <td><?=$result['receipient_name']?></td>
         <td><?=$result['reciepient_division']?></td>
         <td><?=$result['cur_date']?></td>
         <td><a href="view_document.php?view=<?=$result['id'];?>" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-eye-open"></span></a></td>
         <td><a href="accounts.php?delete=<?=$result['id'];?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove"></span></a></td>
       <?php endwhile ?>
     </tr>
     </tbody>
   </table>    
            </div>
       </div>
     </div>
	</div>
</div>
?>
<?php include 'includes/footer.php'; ?>
