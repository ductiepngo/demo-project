<?php  

	if (isset($_POST['search'])) {
		$key = $_POST['key'];
		$rs = searchMember($key);
	}else{
		$rs = getMember();
	}
?>

<form action="" method="POST" role="form" style="margin: 20px 0px;">

	<div class="row">
	  <div class="col-lg-12 col-xs-12 col-md-12">
	    <div class="input-group">
	      <input type="number" value="<?php if(isset($key)) { echo $key; } ?>" name="key" class="form-control" placeholder="Nhập số điện thoại cần tìm...">
	      <span class="input-group-btn">
	        <button class="btn btn-default" name="search" type="submit">Tìm kiếm</button>
	      </span>
	    </div><!-- /input-group -->
	  </div><!-- /.col-lg-6 -->
	</div><!-- /.row -->

</form>

<h4>DANH SÁCH HỌC VIÊN IT-PLUS</h4>

<?php  
	if (isset($_SESSION['noti']) && $_SESSION['noti'] == 1) {
?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Thông báo!</strong> Thêm mới thành công!
	</div>
<?php
	
	}else if(isset($_SESSION['noti']) && $_SESSION['noti'] == 2){
?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Thông báo!</strong> Cập nhật thành công!
	</div>
<?php
	}

	unset($_SESSION['noti']);
?>


<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>STT</th>
				<th>Name</th>
				<th>Faculty</th>
				<th>Phone</th>
				<th>Email</th>
				<th>Addres</th>
					<th>Description</th>
				<th>Action</th>
			
			</tr>
		</thead>
		<tbody>
			<?php  
				foreach ($rs as $key => $value) {
			?>
				<tr>
					<td><?php echo $value['idHV']; ?></td>
					<td><?php echo $value['name']; ?></td>
					<td><?php echo $value['title']; ?></td>
					<td><?php echo $value['phone']; ?></td>
					<td><?php echo $value['email']; ?></td>
					<td><?php echo $value['addres']; ?></td>
					<td><?php echo $value['description']; ?></td>
					<td>
						<a href="index.php?page=update_member&id=<?php echo $value['idHV']; ?>">
							<button class="btn btn-primary">Sửa</button>
						</a>
						<a href="#">
							<button class="btn btn-danger">Xóa</button>
						</a>
					</td>
				</tr>
			<?php
				}
			?>
			
		</tbody>
	</table>
</div>