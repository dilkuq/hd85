<link rel="stylesheet" href="./static/bootstrap-3.3.7-dist/css/bootstrap.min.css">
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse" style="border-radius: 0">
    <div class="container">
        <a class="navbar-brand" href="">Student Manager</a>
        <ul class="nav navbar-nav" style="float: right;">
            <li class="active">
                <a href="index.php">homepage</a>
            </li>


<!--            <li class="active">-->
<!--                <a href="">backend</a>-->
<!--            </li>-->

            <li>
                <?php if(isset($_SESSION['username'])){ ?>
                <a href="javascript:;" onclick="loginout()"><span style="color: red"><?php echo $_SESSION['username']; ?></span>&nbsp;&nbsp;logout</a>
                <?php }else{ ?>
                <a href="index.php?s=admin/user/login">login</a>
                <?php } ?>
            </li>
        </ul>

    </div>
</nav>
<script>
    function loginout() {
        if(confirm('确定退出吗?')){
            location.href = 'index.php?s=admin/user/loginout';
        }
    }
</script>