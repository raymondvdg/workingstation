<!-- begin tmpl_header -->

<html>
    <head>
<script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />


<title><?=$title?> | <?=$version?></title>
    <link rel="stylesheet" type="text/css" href="<?=$path?>/tmpl/stylingIndex.css" />

<script type="text/javascript">
    $(function(){
        var pickerOpts = {
            dateFormat:"dd-mm-yy"
        };  
        $(".datepicker").datepicker(pickerOpts);
        $(".datepicker2").datepicker(pickerOpts);
        $(".datepicker3").datepicker(pickerOpts);
        $(".datepicker4").datepicker(pickerOpts);
        $(".datepicker5").datepicker(pickerOpts);

    });
</script>


</head>
    <body>
    <div id="main">
    <div class="topbar"><img src="<?=$path?>/images/logo.jpg"></img>

    </div>
        
    <!-- Register / Login-->
        <div class="playBar">
         </div>
    <!-- Register / Login end -->
    
