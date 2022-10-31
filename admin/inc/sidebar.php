<div class="grid_2">
            <div class="box sidemenu">
                <div class="block" id="section-menu">
                    <ul class="section menu">
                       
                    <?php
                            if(Session::get('userRole')=='0'){
                    ?>    
                        <li><a class="menuitem">Manage Site</a>
                            <ul class="submenu">
                                <li><a href="titleslogan.php">Title & Slogan</a></li>
                                <li><a href="social.php">Social Media</a></li>
                                <li><a href="copyright.php">Copyright</a></li>
                                
                            </ul>
                        </li>
                        <?php } ?>
						
                        <?php
                            if(Session::get('userRole')=='0' || Session::get('userRole')=='2'){
                        ?>
                         <li><a class="menuitem">Manage Pages</a>
                            <ul class="submenu">
                                <li><a href="addpage.php">Add New Page</a></li>
                                <?php 
                                    $query = "select * from page";
                                    $page = $db->select($query);
                                    if($page){
                                        while($result = $page->fetch_assoc()){
                                 ?>
                                <li><a href="page.php?pageid=<?php echo $result['id'] ?>"><?php echo $result['name'] ?></a></li>
                                <?php } } ?>
                            </ul>
                        </li>
                        <?php } ?>

                        <?php
                            if(Session::get('userRole')=='0'){
                        ?>
                        <li><a class="menuitem">Manage Slider</a>
                            <ul class="submenu">
                                <li><a href="addslider.php">Add Slider</a> </li>
                                <li><a href="sliderlist.php">Slider List</a> </li>
                            </ul>
                        </li>
                        <?php } ?>
                        <li><a class="menuitem">Manage Category</a>
                            <ul class="submenu">
                                <li><a href="addcat.php">Add Category</a> </li>
                                <li><a href="catlist.php">Category List</a> </li>
                            </ul> 
                        </li>
                        <li><a class="menuitem">Manage Posts</a>
                            <ul class="submenu">
                                <li><a href="addpost.php">Add Post</a> </li>
                                <li><a href="postlist.php">Post List</a> </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>