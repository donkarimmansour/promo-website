<footer id="Footer">
		<div class="upper">
			<div class="links">
				<ul>
				     <li>
						<a href="mailto:don.karimmansour@gmail.com" >Contact</a>
					</li><li>
						<a href="/info.php#about" >About</a>
					</li>

				</ul>
			</div>
			<div class="social">
				<ul>
					<li>
						<a href="https://www.facebook.com/unidays" class="facebook" target="_blank"
							data-segment-label="facebook"><i class="fab fa-facebook-f"></i></a>
					</li>
					<li>
						<a href="https://twitter.com/unidays_us" class="twitter" target="_blank"
							data-segment-label="twitter"><i class="fab fa-twitter"></i></a>
					</li>
					<li>
						<a href="https://www.pinterest.com/unidays" class="pinterest" target="_blank"
							data-segment-label="pinterest"><i class="fab fa-pinterest"></i></a>
					</li>
					<li>
						<a href="https://www.instagram.com/UNiDAYS_us" class="instagram" target="_blank"
							data-segment-label="instagram"><i class="fab fa-instagram"></i></a>
					</li>
					<li class="social__snapchat">
						<a href="https://www.snapchat.com/add/unidays_us" class="snapchat" target="_blank"
						><i class="fab fa-snapchat"></i></a>
					</li>
				</ul>
			</div>
		</div>
		<div class="lower">
			<div class="links">
				<ul>

					<li>
						<a  href="info.php#terms">Terms of Service</a>
					</li>
					<li>
						<a  href="info.php#cookie">Cookie Policy</a>
					</li>
					<li>
						<a  href="info.php#privacy">Privacy Policy</a>
					</li>
					<li>
						<a  href="info.php#accessibility">Accessibility</a>
					</li>
			      
					<?php
						if(isset($_SESSION['user_u_id']))
						{ 
							?> <li><a  href="logout.php">Log out</a></li> <?php

						}else{
							?> <li><a  href="login.php">Log In</a></li> <?php
						}
					?>
					


				</ul>
			</div>
			<div class="copyright">
				Copyright © Beta. All rights reserved.
			</div>
		</div>
	</footer>


<script src="<?php echo $jsDir ; ?>jquery.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>
<script src="<?php echo $jsDir ; ?>main.js"></script>
</body>

</html>