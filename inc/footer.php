</div>

	<div class="footersection templete clear">
	  <div class="footermenu clear">
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Contact</a></li>
			<li><a href="#">Privacy</a></li>
		</ul>
	  </div>
	  <?php 
                $query = "select * from footer where id='1'";
                $socialmedia = $db->select($query);
                if($socialmedia){
                    while($result = $socialmedia->fetch_assoc()){
        ?>
	  <p>&copy; Copyright <?php echo $result['copyright']; ?> <?php echo date('Y'); ?></p>
	  <?php } } ?>
	</div>
	<div class="fixedicon clear">
	<?php 
                $query = "select * from social where id='1'";
                $socialmedia = $db->select($query);
                if($socialmedia){
                    while($result = $socialmedia->fetch_assoc()){
    ?>
		<a href="<?php echo $result['facebook']; ?>"><img src="images/fb.png" alt="Facebook"/></a>
		<a href="<?php echo $result['twitter']; ?>"><img src="images/tw.png" alt="Twitter"/></a>
		<a href="<?php echo $result['linkedin']; ?>"><img src="images/in.png" alt="LinkedIn"/></a>
		<a href="<?php echo $result['google']; ?>"><img src="images/gl.png" alt="GooglePlus"/></a>
	<?php } } ?>
	</div>
<script type="text/javascript" src="js/scrolltop.js"></script>
</body>
</html>
