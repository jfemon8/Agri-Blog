<div class="slidersection templete clear">
        <div id="slider">
            <?php
                $query = "SELECT * FROM slider order by id limit 10";
                $slider = $db->select($query);
                if($slider){
                    while($result = $slider->fetch_assoc()){
            ?>
            <a href="#"><img src="admin/<?php echo $result['image'] ?>" alt="Slider" title="<?php echo $result['title'] ?>" /></a>
            
        <?php } } ?>
        </div>
</div>

