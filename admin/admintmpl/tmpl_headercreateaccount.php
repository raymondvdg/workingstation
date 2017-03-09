<!-- begin tmpl_headercreateaccount -->

<html>
    <head><title><?=$title?> | <?=$version?>    </title>
    <script type="text/javascript" src="<?=$path?>/js/jquery-1.5.2.min.js"></script>
<script type="text/javascript" src="<?=$path?>/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?=$path?>/js/additional-methods.min.js"></script>
 
<style type="text/css">
label {
    float: left;
    padding-right:10px;
    color: black;
}
label.error {
    float: none;
    font-family: "Arial";
    size: 10px;
    color: red;
    padding-left: .5em;
    vertical-align: top;
}



</style>
 <script type="text/javascript">
 function checkPasswordMatch() {
    var password = $("#password").val();
    var confirmPassword = $("#passwordConfirm").val();

    if (password != confirmPassword)
        $("#divCheckPasswordMatch").html("<font color=red>Wachtwoord komt nog niet overeen</font>");
    else
        $("#divCheckPasswordMatch").html("<font color=green>Password komt overeen!</font>");
}

$(document).ready(function () {
   $("#passwordConfirm").keyup(checkPasswordMatch);
});
 </script>
 
<script type="text/javascript">
$(document).ready(function(){
    // validate signup form on keyup and submit
    $("#createForm").validate({
        rules: {
            username: "required",
            password: "required",
            gebruikerslevel: "required",

            email: {
                required: true,
                email: true
            },
            
        },
        messages: {
            username: "Vul alstublieft een gebruikersnaam in (13 characters).",
            password: "Vul alstublieft een wachtwoord in.",
            gebruikerslevel: "Vul alstublieft een gebruikerslevel in.",

        }
    });
     
});
</script>

    
    

    <link rel="stylesheet" type="text/css" href="<?=$path?>/tmpl/stylingIndex.css" /> 
</head>
    <body>
    <div id="main">
    <div class="topbar"><img src="<?=$path?>/images/logo.jpg"></img></div>
        
    <!-- Middlebar Menu-->
        <div class="middleBar">

        </div>
    <!-- Middlebar Menu end -->
    
