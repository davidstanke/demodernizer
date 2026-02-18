<%@ page contentType="text/html; charset=UTF-8" %>
<%@ taglib prefix="s" uri="/struts-tags" %>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Legacy Bakery</title>
    <!-- Bootstrap 3 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        body { padding-top: 50px; }
        .starter-template { padding: 40px 15px; text-align: center; }
        .menu-item { margin-bottom: 20px; }
    </style>
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Legacy Bakery</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#menu">Menu</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">
      <div class="starter-template">
        <h1><s:property value="message" /></h1>
        <p class="lead">Serving the community with traditional recipes.</p>
      </div>

      <div class="row" id="menu">
        <div class="col-md-12">
            <h2>Our Menu</h2>
            <hr>
        </div>
        <div class="col-sm-6 col-md-4 menu-item">
            <div class="thumbnail">
                <div class="caption">
                    <h3>Classic Croissant</h3>
                    <p>Buttery and flaky.</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 menu-item">
            <div class="thumbnail">
                <div class="caption">
                    <h3>Sourdough Loaf</h3>
                    <p>Tangy and crusty perfection.</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 menu-item">
            <div class="thumbnail">
                <div class="caption">
                    <h3>Pain au Chocolat</h3>
                    <p>Rich chocolate in flaked pastry.</p>
                </div>
            </div>
        </div>
      </div>

      <div class="row" id="contact">
        <div class="col-md-6">
            <h2>Find Us</h2>
            <p>123 Bakery Lane</p>
            <p>Jersey City, NJ 07302</p>
        </div>
        <div class="col-md-6">
            <h2>Hours</h2>
            <p>Monday - Friday:</p>
            <p>6:00 AM - 6:00 PM</p>
        </div>
      </div>

      <hr>

      <footer>
        <p>&copy; 2026 Legacy Bakery. All rights reserved.</p>
      </footer>
    </div>
</body>
</html>
