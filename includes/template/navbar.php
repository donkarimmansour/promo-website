<!-- <a href="#MainContent" class="visually-hidden">Skip to main content</a>
	<a href="#Footer" class="visually-hidden">Skip to footer</a> -->

<header>
	<div class="top">
		<button class="menu-icon-container " aria-expanded="False" aria-label="Menu">
			<div class="menu-btn-icon"></div>
		</button>


		<nav class="menu hidden notactive">
			<div class="catcher"></div>
			<div class="scroll">
		    	<?php if(!isset($_SESSION['user_u_id'])){ ?> 
					<div class="primary loginRegister">
					<a href="signup.php" class="button medium register"><span><span>Join now</span></span></a>
					<a href="login.php"  class="button secondary medium"><span>Log in</span></a>
					</div>
				<?php }?>
				
				<ul class="tertiary nav-perks hidden">

					<?php
					$categories = $db->prepare("SELECT * FROM tbl_categories WHERE  clm_id != 0 AND clm_status = 'publish' AND clm_place = 'website' AND clm_parent = '0'");
					$categories->execute();
					$categories = $categories->fetchall();


					if (!empty($categories)) {
						foreach ($categories as $categorty) {

					?>
							<li class="sub-menu">
								<button class="sub-menu-button"><?php echo $categorty["clm_name"]; ?><span class="ud-icon pull-right">Carousel:Next</span></button>

								<?php
								$subcaty = $db->prepare("SELECT * FROM tbl_categories WHERE  clm_id != 0 AND clm_status = 'publish' AND clm_place = 'website' AND clm_parent = ?");
								$subcaty->execute(array($categorty["clm_id"]));
								$subcaty = $subcaty->fetchall();

								echo '<ul class="sub-nav">';
								echo '<li><button class="back"><span class="ud-icon">Carousel:Previous</span> Back</button></li>';
								if (!empty($subcaty)) {

									foreach ($subcaty as $sub) {

								?>

							<li><a href="category.php?id=<?php echo $sub["clm_id"]; ?>"><span><?php echo $sub["clm_name"]; ?></span></a></li>

					<?php
									}
								}
								echo '</ul>';

					?>

					</li>
			<?php
						}
					}

			?>

                    <li><a href="all.php"><span >All</span></a></li>
				</ul>

				<ul class="tertiary nav-blog hidden">


					<?php
					$categories = $db->prepare("SELECT * FROM tbl_categories WHERE  clm_status = 'publish' AND clm_place = 'blog'");
					$categories->execute();
					$caty = $categories->fetchall();


					if (!empty($caty)) {
						foreach ($caty as $c) {

					?>
					  	<li><a href="index.php/<?php echo $c["clm_id"]; ?>"><span><?php echo $c["clm_name"]; ?></span></a></li>


					<?php
						}
					}

					?>



				</ul>

				<ul class="secondary">

				<?php if(isset($_SESSION['user_u_id'])){ ?> 
					<li class="sub-menu">
						<button class="sub-menu-button">Account <i class="fas fa-chevron-right pull-right"></i></button>
						<ul>
							<li><button class="back"><i class="fas fa-arrow-left"></i> Back</button></li>
							<li><a href="profile.php" >Profile</a></li>
							<li><a href="logout.php" >LogOut</a></li>
						</ul>
					</li>
				<?php }?>
				
					


					<li><a href="/info.php#about" >About us</a></li>
					<li class="nav-perks"><a href="mailto:don.karimmansour@gmail.com" >Contact Us</a></li>
					<li class="nav-blog"><a href="blog/index.php" target="_blank" >Blog</a></li>
				</ul>








			</div>
		</nav>

		<div class="search" id="js-headerSearch">
			<form action="#" >
				<div>
					<input type="search" id="search-focus" placeholder="Search" />
					<div class="search-icon"><i class="fas fa-search"></i></div>
					<button type="button" class="search-close hidden">Close</button>
				</div>



				<div class="searchOverlay hidden">
			

					<div class="search_results"  style="width: 100%; top: 0px; left: 0px;">
					
					</div>




				</div>
			</form>
		</div>
		<a href="index.php" class="title logo">Home</a>
	</div>
	<nav  class="perks">
		<ul class="nav">
		<li><a href="index.php"><span>Home</span></a>

			<?php
			$categories = $db->prepare("SELECT * FROM tbl_categories WHERE  clm_id != 0 AND clm_status = 'publish' AND clm_place = 'website' AND clm_parent = '0'");
			$categories->execute();
			$categories = $categories->fetchall();


			if (!empty($categories)) {
				foreach ($categories as $categorty) {

			?>
					<li>
						<a href="<?php if($categorty["clm_type"] == "link"){ echo $categorty["clm_link"]; }else{ echo  "category.php?id={$categorty["clm_id"]}"; }?>"><span><?php echo $categorty["clm_name"]; ?></span></a>

						<?php
						$subcaty = $db->prepare("SELECT * FROM tbl_categories WHERE  clm_id != 0 AND clm_status = 'publish' AND clm_place = 'website' AND clm_parent = ?");
						$subcaty->execute(array($categorty["clm_id"]));
						$subcaty = $subcaty->fetchall();


						if (!empty($subcaty)) {
							
							echo '<ul class="sub-nav">';
							?>
				           	<li><a href="sub.php?id=<?php echo $categorty["clm_id"]; ?>"> <span>All</span></a></li>

							<?php
							foreach ($subcaty as $sub) {

						?>
                    
					<li><a href="<?php if($sub["clm_type"] == "link"){ echo $sub["clm_link"]; }else{ echo  "category.php?id={$sub["clm_id"]}"; }?>">
					<span><?php echo $sub["clm_name"]; ?></span></a></li>

			<?php
							}
							echo '</ul>';
						}

			?>

			</li>
	<?php
				}
			}

	?>


	<li><a href="all.php"><span >All</span></a></li>
		</ul>
	</nav>


	<nav  class="blog hidden">
		<div class="l-blog-container">
			<ul class="nav c-blog-nav">


			<li><a href="index.php"><span>Home</span></a></li>


				<?php
				$categories = $db->prepare("SELECT * FROM tbl_categories WHERE  clm_status = 'publish' AND clm_place = 'blog'");
				$categories->execute();
				$arr = $categories->fetchall();
				$caty = array_slice($arr, 0, 3);
				$more = array_splice($arr, 3);


				if (!empty($caty)) {
					foreach ($caty as $c) {

				?>

						<li><a 
						href="<?php if($c["clm_type"] == "link"){ echo $c["clm_link"]; } else { echo "index.php?id=" . $c["clm_id"]; }  ?>"
						><span><?php echo $c["clm_name"]; ?></span></a></li>


				<?php
					}
				}

				?>



				<li class="more">
					<a href="#" class="blog-more-nav" ><span>More <svg viewBox="12.5 12.5 75 75"><path d="M25,45L50,65L75,45"></path></svg></span></a>
					<ul class="sub-nav">
						<?php
						if (!empty($more)) {
							foreach ($more as $m) {

						?>
								<li><a href="index.php?id=<?php echo $m["clm_id"]; ?>"><span><?php echo $m["clm_name"]; ?></span></a></li>


						<?php
							}
						}
						?>

						<li><a href="/info.php#about" ><span>About us</span></a></li>
						</li>
					</ul>
				</li>


			</ul>
		</div>
	</nav>
</header>

<!--  -->