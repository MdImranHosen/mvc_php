<!DOCTYPE HTML>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Advanced PHP OOP MVC</title>
<style>
body {font-family: arial;font-size: 15px;line-height: 18px;margin: 0 auto;width: 850px;background:#EEEEEE}
a{color:#3399FF;}
.headeroption {background: #3399ff url("<?php echo BASE_URL; ?>/img/php.png") no-repeat scroll 25px 12px;height: 74px;overflow: hidden;padding-left: 140px;}
.headeroption h2{color: #000;font-size: 30px;padding-top: 2px;text-shadow: 0 1px 1px #fff;}
.content{background: #fff;border: 6px solid #3399ff;font-size: 16px;line-height: 22px;margin-bottom: 3px;margin-top: 3px;min-height: 380px;overflow: hidden;padding: 10px;}

.subject {border-bottom: 1px solid #3399ff;font-size: 20px;margin-bottom: 10px;padding-bottom: 10px;}
.subject p{margin:0;}

.insert{color:#06960E;font-weight:bold;}
.delete{color:#DE5A24;font-weight:bold;}

.mainleft{border-right: 1px dotted #999;float:left;margin-right:16px;width: 350px;}
.mainright{float:right;width:450px;}

.tblone{width:100%;border:1px solid #fff;}
.tblone td{padding:5px 10px;text-align:center;}

table.tblone tr:nth-child(2n+1){background:#fff;height:30px;}
table.tblone tr:nth-child(2n){background:#fdf0f1;height:30px;}

input[type="text"], input[type="password"] {border:1px solid #ddd;margin-bottom:5px;padding:5px;width:228px;font-size:16px}
input[type="submit"]{cursor: pointer;padding: 5px 8px;}

.loginfrom{width: 320px; margin: 50px auto; border: 1px solid #ddd;border-radius: 5px;box-shadow: 5px 5px 5px #999;padding: 20px;}

.footeroption{height:90px;background:#177de3;overflow:hidden;padding-top:10px;}
.footerone {background: #3aa0ff;border-radius: 5px;float: left;font-size:18px;line-height:23px;margin-left: 10px;padding:6px 10px;text-align:center;text-shadow: 1px 0 2px #fff;width:390px;overflow: hidden;}
.footerone p{margin:0;}
</style>
</head>
<body>
  <header class="headeroption">
    <h2>Advanced PHP OOP [MVC Framework]</h2>
	
  </header>
<div class="content">
     <h1>Login</h1><hr>
        <div class="loginfrom">
           <form action="<?php echo BASE_URL; ?>/Login/loginAuth" method="post">
             <table>
               <tr>
                 <th>UserName</th>
                 <td><input type="text" name="username" placeholder="Enter UserName"></td>
               </tr>
               <tr>
                 <th>Password</th>
                 <td><input type="password" name="password" placeholder="Enter Password"></td>
               </tr>
               <tr>
                 <th></th>
                 <td><input type="submit" value="Submit" name=""></td>
               </tr>
             </table>
           </form>
        </div>
	</div>

  <footer class="footeroption">
	  <section class="footerone">
	  <p>Md Imran Hosen</p>
	  <p>Web Developer</p>
	  
	  </section>
	  <section class="footerone">
		  <p>Like us: facebook.com/Md.ImranHosen.up</p>
		  <p>Github: www.github.com/MdImranHosen</p>
	  </section>
  </footer>

</body>
</html>