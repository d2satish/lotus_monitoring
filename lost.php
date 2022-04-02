<!DOCTYPE html>
<html>
<head>
	<title>:: Lotus Login ::</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <meta charset="utf-8" />
    <link rel="stylesheet" href="font.css" />
    <link rel="stylesheet" href="lost.css" />
    <script type="text/javascript" src="time.js"></script>
</head>
<body>
 
 <table id="upperbelt">
 	<tr>
 		<td>
 			<img id="logo" src="http://www.lotusbroadband.com/assets/img/logo.png">
 		</td>
 	</tr>
 </table>

<div id="timeContainer2">
	<div id="timeContainer1">
   		<span id="h-m-container">
       		<span class="inline-block" id="h"></span>
       		<span class="inline-block" id="m"></span>
        </span>
        <span id="s-ap-container">
       		<span class="block" id="s"></span>
       		<span class="block" id="am-pm"></span>
      	</span>
      	<span id="date"></span>
    </div>
</div>

<table id="table" border="0">
	<tr>
		<td width="30%">
			<div class="container">
  <section id="content">
    <form action="lost_result.php" method="post">
      <h1>Enter your details</h1>
      <div>
        <input type="text" placeholder="Username" required="" name="username" id="username" />
      </div>
      <div>
        <input type="email" placeholder="Enter your registered mail id" required="" name="email" id="email" />
      </div>
      <div>
        <input type="submit" name="lost_submit" value="Get my password" />
      </div>
    </form><!-- form -->
    
  </section><!-- content -->
</div><!-- container -->

		</td>
	</tr>
</table>
</body>
</html>

