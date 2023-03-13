<?php
if(empty($title)){
    $title = 'My Website';
}
echo '   <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>'.$title.'</title>
    <!-- Bootstrap core CSS -->
<link href="./css/myCss.css" rel="stylesheet">
<link href="css/bootstrap.min.css"  rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="mystyle.css" rel="stylesheet">
    <script src="jquery-3.6.3.min.js"></script>
  </head>';
