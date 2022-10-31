<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.css">	
<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="style.css">

<?php
    $query = "select * from theme where id='1'"; 
    $themes = $db->select($query);
    while($result = $themes->fetch_assoc()){
        if($result['name']=='default'){
?>
            <link rel="stylesheet" href="theme/default.css">

    <?php }
    elseif($result['name']=='selago'){ ?>
            <link rel="stylesheet" href="theme/selago.css">
<?php } 
elseif($result['name']=='purple'){ ?>
            <link rel="stylesheet" href="theme/purple.css">
<?php } } ?>

