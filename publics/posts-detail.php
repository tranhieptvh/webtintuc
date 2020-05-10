<?php
require_once('includes/header.php');
require_once('includes/navbar.php');
require_once('./../models/posts.php');
require_once('./../models/comments.php');
require_once('./../models/tags.php');
?>

<?php
$posts = new Posts();
$cmt = new Comments();
$tags = new Tags();

if (isset($_GET['id'])) {
	$post_id = $_GET['id'];
	$posts->updateViews($post_id);
	$post = $posts->getDetailById($post_id);
}

if (isset($_POST['content'])) {
	if (isset($_SESSION['user'])) {
		$payload['created_by_id'] = $_SESSION['user']['id'];
		$payload['content'] = $_POST['content'];
		$payload['post_id'] = $post_id;

		$count = $cmt->insert($payload);
		if ($count == 1) {
			header('Location:posts-detail.php?id=' . $post_id);
		}
	} else {
		echo '<script>alert("Đăng nhập để comment")</script>';
	}
}

if (isset($_GET['action'])) {
	$action = $_GET['action'];
	switch ($action) {
		case 'delete':
			if (is_numeric($_GET['cmt_id'])) {
				// var_dump($_GET['id']);die();
				$cmt->delete($_GET['cmt_id']);
				header('Location:posts-detail.php?id=' . $post_id);
			}
			break;
		default:
			# code...
			break;
	}
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
								<?php
								$str = $post['tag_id'];
								$tag_id = explode(',', $str);
								foreach ($tag_id as $r) {
									$tag = $tags->getById($r);
								?>

									<a href="posts-list-tag.php?id=<?php echo $r ?>" class="f1-s-12 cl8 hov-link1 m-r-15">
										<?php echo '#' . $tag['name'] ?>
									</a>
								<?php
								}
								?>
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
					<div class="comments">
						<div class="leave-comment">
							<div class="how2 how2-cl4 flex-s-c m-b-30">
								<h3 class="f1-m-2 cl3 tab01-title">
									Leave a Comment
								</h3>
							</div>

							<form action="" method="POST">
								<textarea class="bo-1-rad-3 bocl13 size-a-15 f1-s-13 cl5 plh6 p-rl-18 p-tb-14 m-b-20" name="content" placeholder="Comment..."></textarea>
								<input type="submit" class="size-a-17 bg2 borad-3 f1-s-12 cl0 hov-btn1 trans-03 p-rl-15 m-t-10" value="Post Comment">
							</form>
						</div>

						<hr>

						<div class="show-comments">
							<div class="how2 how2-cl4 flex-s-c m-b-30">
								<h3 class="f1-m-2 cl3 tab01-title">
									Comments
								</h3>
							</div>
							<!-- list comment -->
							<?php
							$list_cmt = $cmt->getByPostId($post_id);
							foreach ($list_cmt as $r) {
							?>
								<div class="single-comment">
									<div class="media">
										<img class="mr-3" style="border-radius: 50%; width: 10%; height: 10%;" src="<?php echo $r['avatar'] ?>" alt="avatar">
										<div class="media-body">
											<h5 class="mt-0"><strong>@<?php echo $r['username'] ?></strong></h5>
											<p><?php echo $r['content'] ?></p>

											<?php
											if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 0) {
											?>
												<a href="?action=delete&id=<?php echo $post_id ?>&cmt_id=<?php echo $r['id'] ?>" onclick="return confirm('Xóa à?')">Xóa</a>
											<?php
											}
											?>

										</div>
									</div>
								</div>
								<hr>
							<?php
							}
							?>
						</div>

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