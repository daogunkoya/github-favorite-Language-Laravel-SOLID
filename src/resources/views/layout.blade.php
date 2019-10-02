<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{config('app.name')}}</title>

    <style>
        h1{
            font-size:19px;
            margin:10px auto;
            text-align:center;
            
            
        }
        body{
            margin:5px auto;
            width:100%;
            background-color:#E6E6FA;
        }
        .table{
            margin:5px auto;
            width:70%;
            border:1px solid #f6f6f6;
        }
        td{
           
            padding:10px;
            border-bottom:1px solid  #f6f6f6;
        }   
        .form-control{
            margin-top:5%;
            margin-left:30%;
            width:100%;
            display:block;
         }
         input{
             padding:10px;
             width:20%;
         }
         input[type="submit"]{
             padding:10px;
             width:15%;
         }
         footer{
             width:100%;
             margin-left:30%;
         }
    </style>
  </head>
<body>
  
      <div class="container">
	        <div class="row">
	        	<div class="col-md-9">
	        		<!-- Main Content -->
					@yield('content')
	        	</div>
			</div>
       </div>
					
    <footer class="footer">
      <div class="container">
        <span class=""> <p>&copy;Copyright <?php //echo date('Y'); ?>, All Rights Reserved <a href="#">Daniel Ogunkoya</a></p>.</span>
      </div>
    </footer>
 </body>
</html>