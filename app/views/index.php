<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" /> 
  <title>Application | Home</title>
  <link rel="icon" type="image/x-icon" href="/portal/apps/mvc-base/public/img/favicon.ico">
  <link rel="stylesheet" href="/portal/apps/mvc-base/public/css/style.css">
  <!-- Source Sans Pro Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/portal/apps/mvc-base/public/css/vendor/font-awesome/css/all.min.css">
  <!-- AdminLTE App -->
  <link rel="stylesheet" href="/portal/apps/mvc-base/public/css/vendor/adminlte/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <?php include("app/partials/navbar.php"); ?>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <?php include("app/partials/menu.php"); ?>
    </aside>
    
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <header class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Page Title</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Page Title</li>
              </ol>
            </div>
          </div>
        </div>
      </header>
    
      <div class="content">
        <main class="container-fluid">
          <div>
            <article class="card card-primary">
              <header class="card-header">
                <h3 class="card-title">Card Title</h3>
              </header>
              <div class="card-body">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Obcaecati asperiores accusantium eveniet fugiat sunt perferendis, ad eaque deserunt voluptatem voluptatibus delectus laborum suscipit voluptates assumenda neque ab! Voluptates, atque vero.</p>
              </div>
            </article>
          </div>
        </main>
      </div>
    </div>

    <footer class="main-footer">
      <?php include("app/partials/footer.php"); ?>
    </footer>
    
    <aside class="control-sidebar control-sidebar-dark">
      <?php include("app/partials/control-sidebar.php"); ?>
    </aside>
  </div>
  <!-- ./wrapper -->

  <div class="scripts" style="display: none;">
    <!-- jQuery -->
    <script src="/portal/apps/mvc-base/public/js/vendor/jquery/jquery.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/portal/apps/mvc-base/public/js/vendor/adminlte/adminlte.min.js"></script>
  </div>
</body>
</html>
