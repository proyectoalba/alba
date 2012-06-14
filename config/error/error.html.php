<html>
<head>
<style>
* { margin:5 auto;}
body { font: 12px/1.5 "Lucida Grande", Verdana, sans-serif; background:#fff; color:#333 }

/* MESSAGE BOXES
/////////////////////////////*/

.message-box { text-align: center; padding: 5px; color:#545454; width:80%;  margin:5px auto; }

.clean { background-color: #efefef; border-top: 2px solid #dedede; border-bottom: 2px solid #dedede; }
.info  { background-color: #f7fafd; border-top: 2px solid #b5d3ff; border-bottom: 2px solid #b5d3ff; }
.ok    { background-color: #d7f7c4; border-top: 2px solid #82cb2f; border-bottom: 2px solid #82cb2f; }
.alert { background-color: #fef5be; border-top: 2px solid #fdd425; border-bottom: 2px solid #fdd425; }
.error { background-color: #ffcdd1; border-top: 2px solid #e10c0c; border-bottom: 2px solid #e10c0c; }
</style>
</head>
<body>
<div align="center">
    <img src="images/alba-chico.jpg" align="center" alt="logo"/>
    <h1>Ops!...error encontrado!</h1>
    <h3>[500 - Internal server error]</h3>

    <div class="message-box error">
        <p><?php echo $exception->getMessage()?></p>
    </div>
    <p class="message-box clean">
        <i>Puede volver hacia atras con su navegador, <br/>
        consulte con el Administrador del sistema.</i>
    </p>
</div>
</body>
