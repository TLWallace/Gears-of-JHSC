<?php include ('include/header.php'); ?>
<a href="http://www.companywebsite.com/grouppage/modepage.aspx"><img height="88px" width="87px" src="images/companylogo.png" alt="Company Name"/></a>
<script>
function goBack()
	{
    window.history.back();
	}
</script>
</head>
<body>

    <div>Your data has been submitted. Redirecting in:</div>
    
    <div id="counter">3</div>
        <script>
            setInterval(function() {
                var div = document.querySelector("#counter");
                var count = div.textContent * 1 - 1;
                div.textContent = count;
                if (count <= 0) {
                    location.href="admin.php";
					//goBack();
                }
            }, 1000);
        </script>
    <!--<button onclick="goBack()">Success!</button>-->
    <button onclick="location.href='admin.php'" class="button2 buttonh" >Go Now</button>
<?php include ('include/footer.php'); ?>