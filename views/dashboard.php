<?php

if (isset($_POST['find'])) {
	$data = new ArticleController();
	$Articles = $data->findArticle();
} else {
	$data = new ArticleController();
	$Articles = $data->getAdminArticle();
}
include('views/includes/navbar.php');
 $yourArticles = 0;
?>

<!-- <style>
	.my-custom-scrollbar {
position: relative;
height: 700px;
overflow: auto;
}
.table-wrapper-scroll-y {
display: block;
}
</style>  -->

<div class="mt-5" id="Dashcontent">


	<ul class="breadcrumb p-4 h6 d-flex justify-content-between align-items-center ">
		<div class="breadcrumb  ">
		<li class="breadcrumb-item  "><a class="text-decoration-none text-dark" href="<?php echo BASE_URL; ?>home">home</a></li>
		<li class="breadcrumb-item active">Dashboard</li>
		</div>

		<h1>
			Planet.Dev <span class="h5 text-secondary">makes your knowlege richer</span> 
		</h1>
		
		<div class="d-flex">
		<li class="h6 text-secondary"><span class="text-dark">ADMIN :</span>  <?= $_SESSION['fullname']; ?></li>
		</div>
	</ul>

	<h1 class="Weclome ps-3 p-5 text-secondary">Weclome back<span class="text-white ">

			<?= $_SESSION['fullname']; ?></span> !! </h1>

	<h3 class=" ps-3 p-3 text-decoration-underline ">Statistics</h3>


	<section>

		<div class="part2 text-center text-secondary " >

			<section  class="carts container-fluid  justify-content-center   ">
				<h3 class><span class="h1">👤</span> Admins:<span><?php echo  Article::rowCount('user'); ?></h3>
			</section>

			<section class="carts container-fluid  justify-content-center ">
				<h3></span><span class="h1">📰</span> All Articles:<span><?php echo  Article::rowCount('article'); ?></h3>
			</section>

			<section class="carts container-fluid  justify-content-center ">
				<h3></span><span class="h1">📊</span> Categiries:<span><?php echo  Article::rowCount('category'); ?></h3>
			</section>

		</div>

		
</div>



<div class="container mt-3">
<h3 class=" ps-3 p-5 text-decoration-underline ">YOUR ARTICLE POSTES </h3>
	<div class="row">
		<?php include('./views/includes/alerts.php') ?>
		<div class="card bg-info">
			<div class="card-body bg-light ">
				<div class=" card-header d-flex justify-content-between ">
					<div>
						<a href="<?php echo BASE_URL; ?>add" class="btn btn-sm btn-info mr-2 mb-2">
							<i class="fa fa-plus "></i>
						</a>
						<a href="<?php echo BASE_URL; ?>home" class="btn btn-sm btn-info mr-2 mb-2">
							<i class="fa fa-home"></i>
						</a>

					</div>
					<div>
					<p class="h6 text-secondary"><span class="text-dark">ADMIN :</span>  <?= $_SESSION['fullname']; ?></p>
					</div>
				</div>
				<div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar">
				<table id="myTable" class="table table-striped table-borderless mb-0 scroll">
                    <thead>

							<tr>
								<th scope="col" class="h5 text-center">title</th>
								<th scope="col" class="h5 text-center">content</th>
								<th scope="col" class="h5 text-center">authore</th>
								<th scope="col" class="h5 text-center">categorie</th>
								<th scope="col" class="h5 text-center">date</th>
								<th scope="col" class="h5 text-center">admins</th>
								<th scope="col" class="h5 text-center">action</th>
							</tr>
						</thead>
						<tbody>

							<?php foreach ($Articles as $Article) : ?>

								<tr>
									<td><?php echo  $Article['title']; ?></td>
									<td><?php echo  $Article['content']; ?></td>
									<td><?php echo  $Article['author']; ?></td>
									<td><?php echo  $Article['name']; ?></td>
									<td><?php echo  $Article['date_created']; ?></td>
									<td><?php echo  $Article['fullname']; ?></td>

									<td class="d-flex ">
										<form action="update" method="post" >
											<input type="hidden" name="id" value="<?php echo $Article['article_id']; ?>">
											<button class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>
										</form>
										<form action="delete" method="post" >
											<input type="hidden" name="delete_id" value="<?php echo $Article['article_id']; ?>">
											<button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
										</form>
									</td>
								</tr>
								<?php  $yourArticles++;?>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<h3 class=" card-footer p-2"> Your Articles:<span> <?php echo $yourArticles; ?></span></h3>
			</div>
		</div>
	</div>
</div>
<footer><div class="text-center p-5"> MADE with 💖 by <span class="text-secondary" > Mohamed ABRACHE </span></div></footer>


    

