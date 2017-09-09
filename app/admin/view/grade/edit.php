<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<?php include './view/header.php' ?>
    <div class="container">
        <div class="row">
			<?php include './view/left.php' ?>
        <div class="col-lg-9">
            <!-- TAB NAVIGATION -->
            <ul class="nav nav-tabs" role="tablist">
                <li ><a href="index.php?s=admin/grade/lists" role="tab" data-toggle="tab">grade list</a></li>
                <li class="active"><a href="index.php?s=admin/grade/post" role="tab" data-toggle="tab">add/update</a></li>
            </ul>
            <form action="" method="post" role="form" style="margin-top: 20px;">

                <div class="form-group">
                     <input type="text" class="form-control" name="gname" id="" placeholder="grade name" value="<?php echo $data['id'] ?>">
                </div>
                <button type="submit" class="btn btn-primary">save</button>
            </form>
        </div>

    </div>

</div>
	<?php include './view/footer.php' ?>


</body>
</html>