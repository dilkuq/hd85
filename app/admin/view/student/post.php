<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script type="application/javascript" src="./static/js/jquery-2.1.0.js"></script>
	<?php include './view/header.php' ?>
    <div class="container">
        <div class="row">
			<?php include './view/left.php' ?>
            <div class="col-lg-9">
                <!-- TAB NAVIGATION -->
                <ul class="nav nav-tabs" role="tablist">
                    <li><a href="index.php?s=admin/student/lists" role="tab" data-toggle="tab">student list</a></li>
                    <li class="active"><a href="" role="tab" data-toggle="tab">add/update</a>
                    </li>
                </ul>
                <form action="" method="post" role="form" style="margin-top: 20px;" enctype="multipart/form-data">
                    <div class="form-group">
                        name: <input type="text" class="form-control" name="name" id="" placeholder="name" value="" required>
                    </div>
                    <div class="form-group">
                        grade: <input type="text" class="form-control" name="grade" id="" placeholder="name"
                               value="" required>
                    </div>
                    <div class="form-group">
                        <div class="radio ">
                            sex:
                            <label class="radio-inline">
                                <input type="radio" name="sex" value="男" checked>
                                男
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="sex" value="女"  >
                                女
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        birthday: <input type="date" name="birthday" class="form-control" value="" required>
                    </div>
                    <div class="form-group">
                        introduction:
                        <textarea name="introduction" placeholder="introduce yourself" cols="30" rows="6" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">save</button>
                </form>
            </div>

        </div>

    </div>
	<?php include './view/footer.php' ?>


    </body>
</html>