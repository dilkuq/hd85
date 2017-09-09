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
                    <li class="active"><a href="index.php?s=admin/grade/lists" role="tab" data-toggle="tab">grade list</a>
                    </li>
                    <li><a href="index.php?s=admin/grade/post" role="tab" data-toggle="tab">add/update</a></li>
                </ul>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>number of people</th>
                        <th>action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($data as $v){ ?>
                        <tr>
                            <th><?php echo $v['id'] ?></th>
                            <th><?php echo $v['gname'] ?></th>
                            <th>10人</th>
                            <th>
                                <div class="btn-group">
                                    <a href="index.php?s=admin/grade/edit&id=<?php echo $v['id'] ?>" class="btn btn-primary btn-sm">edit</a>
                                    <a href="javascript:;" onclick="del(<?php echo $v['id'] ?>)" class="btn btn-danger btn-sm">delete</a>
                                </div>
                            </th>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>

            </div>

        </div>

    </div>

    <script>
        function del(id){
            if(confirm("确定要删除吗")){
               return location.href='index.php?s=admin/grade/delete&id='+id;
            }
        }
    </script>


	<?php include './view/footer.php' ?>

    </body>
</html>