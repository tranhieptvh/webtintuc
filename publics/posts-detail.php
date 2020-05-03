<?php
require_once('includes/header.php');
require_once('includes/navbar.php');
require_once('./../models/posts.php');
?>

<?php
$posts = new Posts();

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$posts->updateViews($id);
	$post = $posts->getDetailById($id);
}
?>

<!-- Breadcrumb -->
<div class="container">
	<div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8">
		<div class="f2-s-1 p-r-30 m-tb-6">
			<a href="index.php" class="breadcrumb-item f1-s-3 cl9">
				Home
			</a>
			<span class="breadcrumb-item f1-s-3 cl9">
				<?php echo 'Tin tức: ' . $post['title'] ?>
			</span>
		</div>
	</div>
</div>

<!-- Content -->
<section class="bg0 p-b-140 p-t-10">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-10 col-lg-8 p-b-30">
				<div class="p-r-10 p-r-0-sr991">
					<!-- Blog Detail -->
					<div class="p-b-70">
						<a href="posts-list-category.php?id=<?php echo $post['cate_id'] ?>" class="f1-s-10 cl2 hov-cl10 trans-03 text-uppercase">
							<?php echo $post['cate_name'] ?>
						</a>

						<h3 class="f1-l-3 cl2 p-b-16 p-t-33 respon2">
							<?php echo $post['title'] ?>
						</h3>

						<div class="flex-wr-s-s p-b-40">
							<span class="f1-s-3 cl8 m-r-15">
								<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
									by <?php echo $post['fullname'] ?>
								</a>

								<span class="m-rl-3">-</span>

								<span>
									<?php echo $post['date_created'] ?>
								</span>
							</span>

							<span class="f1-s-3 cl8 m-r-15">
								<?php echo $post['views'] ?> Views
							</span>

							<span class="f1-s-3 cl8 m-r-15">
								<?php echo $post['likes'] ?> Likes
							</span>
						</div>

						<h4 class="f1-m-2 cl3 tab01-title">
							<?php echo $post['description'] . '<br><br>' ?>
						</h4>

						<div class="wrap-pic-max-w p-b-30">
							<img src="<?php echo $post['avatar'] ?>" alt="IMG">
						</div>

						<div>
							<?php echo $post['content'] ?>
						</div>

						<!-- Tag -->
						<div class="flex-s-s p-t-12 p-b-15">
							<span class="f1-s-12 cl5 m-r-8">
								Tags:
							</span>

							<div class="flex-wr-s-s size-w-0">
								<a href="#" class="f1-s-12 cl8 hov-link1 m-r-15">
									Streetstyle
								</a>

								<a href="#" class="f1-s-12 cl8 hov-link1 m-r-15">
									Crafts
								</a>
							</div>
						</div>

						<!-- Share -->
						<div class="flex-s-s">
							<span class="f1-s-12 cl5 p-t-1 m-r-15">
								Share:
							</span>

							<div class="flex-wr-s-s size-w-0">
								<a href="#" class="dis-block f1-s-13 cl0 bg-facebook borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
									<i class="fab fa-facebook-f m-r-7"></i>
									Facebook
								</a>

								<a href="#" class="dis-block f1-s-13 cl0 bg-twitter borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
									<i class="fab fa-twitter m-r-7"></i>
									Twitter
								</a>

								<a href="#" class="dis-block f1-s-13 cl0 bg-google borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
									<i class="fab fa-google-plus-g m-r-7"></i>
									Google+
								</a>

								<a href="#" class="dis-block f1-s-13 cl0 bg-pinterest borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
									<i class="fab fa-pinterest-p m-r-7"></i>
									Pinterest
								</a>
							</div>
						</div>
					</div>

					<!-- Leave a comment -->
					<div>
						<h4 class="f1-l-4 cl3 p-b-12">
							Leave a Comment
						</h4>

						<p class="f1-s-13 cl8 p-b-40">
							Your email address will not be published. Required fields are marked *
						</p>

						<form>
							<textarea class="bo-1-rad-3 bocl13 size-a-15 f1-s-13 cl5 plh6 p-rl-18 p-tb-14 m-b-20" name="msg" placeholder="Comment..."></textarea>

							<input class="bo-1-rad-3 bocl13 size-a-16 f1-s-13 cl5 plh6 p-rl-18 m-b-20" type="text" name="name" placeholder="Name*">

							<input class="bo-1-rad-3 bocl13 size-a-16 f1-s-13 cl5 plh6 p-rl-18 m-b-20" type="text" name="email" placeholder="Email*">

							<input class="bo-1-rad-3 bocl13 size-a-16 f1-s-13 cl5 plh6 p-rl-18 m-b-20" type="text" name="website" placeholder="Website">

							<button class="size-a-17 bg2 borad-3 f1-s-12 cl0 hov-btn1 trans-03 p-rl-15 m-t-10">
								Post Comment
							</button>
						</form>
					</div>
				</div>
			</div>

			<!-- Sidebar -->
			<div class="col-md-10 col-lg-4 p-b-30">
				<div class="p-l-10 p-rl-0-sr991 p-t-70">
					<?php
					require_once('right-col.php');
					?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
require_once('includes/footer.php');
?>