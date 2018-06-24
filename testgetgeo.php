<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

<body>
    <div id="showperson">Loading...</div>
</body>
</html>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#showperson").load("https://www.uttaraditmart.com/getgeo.php?action=loadgeo");
    });
</script>
