<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header with Logo</title>
    <style>
      .footer{
   background: white;
   position: fixed;
   bottom: 0; left:0; right:0;
   text-align: center;
   font-size: 1rem;
   color:black;
   padding:2rem; 
}
.footer span{
   color:black;
}

       
    </style>
</head>
<body>
<div class="footer">
   &copy; copyright @ <?= date('Y'); ?> by <span>Secure Member Portal </span> | all rights reserved!
</div>
      </body>
      </html>