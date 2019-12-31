<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
 <link rel="stylesheet" href="Style.css">
 <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
 <?php
                           $query="SELECT * FROM tbl_theme where id= '1' ";
                            $themes= $db->select($query);
                            while($result=$themes->fetch_assoc()){
                                if($result['theme']=='default'){?>
                                   <link rel="stylesheet" href="themes/default.css">
                               <?php }elseif ($result['theme']=='green') {?>
                                            <link rel="stylesheet" href="themes/green.css">
                                      <?php }elseif($result['theme']=='red'){?>
                                           <link rel="stylesheet" href="themes/red.css">
                                     <?php } ?>
                            <?php } ?>
