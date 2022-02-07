<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */?>
<html>
<head>
    <style type="text/css">
        body{
            
            width:100%;
                height:100%; 
        }
        .header h1{
            float:left;
            font-size:55px;
            margin-left:5px;
            margin-top:-5px;
            float:left;
            color:#4e4e4e;
            
        }
        .header p{
            font-size: 25px;
            margin-top:25px;
            margin-left:20px;
            float:left;
            color:#535353;
        }
        .header{
            margin-top:10px;
            font-family:'Verdana';
            width:100%;
            height:50px;
            margin-left:150px;
            color:#2e2e2e;
        }
        .header img{
            float:left;
        }
        .container{
          width:80%;
          margin-left:10%;
          margin-top:12%;
   
          
        }
        .container p{
            font-size: 80px;
            color:#616161;
            
        }
        .field{
            width:50%;
            height:70px;
            float:left;
           font-size: 50px;
           color:#f15500;
            
        }
        .submit{
            background-color: green;
            color:white;
            width:25%;
            font-size: 40px;
                height:71px;
            margin-top:-1px;
            float:left;
        }
    </style>
    <title>NAMEZARD-Create Your Brand Name With a click </title>
</head>
<body>
    <div class="header"><img src="LOGO.png"/><h1>namezard</h1><p>Create Brand names with a click</p></div>
    <div class="container">
    <form method="GET" action="get_names.php">
        
        <p> What is your Brand about?</p><input class="field" name="hint" type="text"> 
        <input class="submit" value="Create Name" type="submit">
    </form>
    
    </div>
    
</body>

</html>
<?php 

?>
