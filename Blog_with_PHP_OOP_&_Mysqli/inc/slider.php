<div class="slidersection templete clear">
           <div id="slider">
               <?php
               $query="SELECT * FROM tbl_slider order by id limit 5";
                                $slider= $db->select($query);
                                if($slider){
                                    while ($result=$slider->fetch_assoc()){
                                        ?>`
               <a href="#"><img src="admin_pannel/<?php echo str_replace('../../../','',$result['image']) ?>" alt="<?php echo $result['title'] ?>" title="<?php echo $result['title'] ?>" /></a>
                                <?php }} ?>
        </div> 
        </div>