<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="bohdan.parkhomenko">
    <title>bot admin</title>
    <!-- Bootstrap core CSS -->
    <link href="static/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="static/css/style.sidebar.css" rel="stylesheet">
    <!-- Font is awesome-->
    <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>
    <!-- JQuery-->
    <script src="static/js/jquery.min.js"></script>
    <!-- My scripts-->
    <script src="static/js/script.main.js"></script>
</head>
<body>
<div id="wrapper">
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <a href="#">
                    bot admin page
                </a>
            </li>
            <li>
                <a href="./index.php?page=add"><i class="fas fa-plus"></i> Добавить вопрос</a>
            </li>
            <li>
                <a href="./index.php?page=edit"><i class="fas fa-edit"></i> Редактировать вопрос</a>
            </li>
            <li>
                <a href="./index.php?page=nanswered"><i class="fas fa-list-ul"></i> Неотвеченные вопросы</a>
            </li>
            <li>
                <a href="./index.php?page=category"><i class="fas fa-th"></i> Категории</a>
            </li>
            <!--<li>
                <a href="./index.php?page=img"><i class="fas fa-images"></i> Изображения</a>
            </li>-->
            <li>
                <a href="./php/Logout.php"><i class="fas fa-sign-out-alt"></i> Выход</a>
            </li>
        </ul>
    </div>
    <!-- /#sidebar-wrapper -->
    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle" style="margin-bottom: 10px;">
                <i class="fas fa-bars"></i> Меню
            </a>
            [@main-content]
        </div>
    </div>
    <!-- /#page-content-wrapper -->
</div>
<!-- /#wrapper -->
<!-- Bootstrap core JavaScript -->
<script src="static/js/bootstrap.bundle.min.js"></script>
<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

</body>

</html>
