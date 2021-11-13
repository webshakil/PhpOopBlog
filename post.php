<?php include'inc/header.php';?>
<?php
	if(!isset($_GET['id'])||$_GET['id']==NULL){
		header("Location:404.php");
	}else{
		$id=$_GET['id'];
		}
		?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<?php 
					$query ="select * from tbl_post where id=$id";//Here id is the tbl_post id
						$post= $db->select($query);
						if($post){
						while($result = $post->fetch_assoc()){
					?>
				
				<h2><?php echo $result['title'];?></h2>
				<h4><?php echo $fm->formatDate($result['date']);?>, By <a href="#"><?php echo $result['author'];?></a></h4>
				<img src="admin/upload/<?php echo $result['image'];?>" alt="MyImage"/>
				<?php echo $result['body'];?>
				
				
				
				<div class="relatedpost clear">
					<h2>Related articles</h2>
					<?php 
						$catid= $result['cat'];
						$queryrelated ="select * from tbl_post where cat='$catid' order by rand() limit 6";
					      $relatedpost= $db->select($queryrelated);
                      if($relatedpost){
                    		while($rresult = $relatedpost->fetch_assoc()){
						
							?>
					<a href="post.php?id=<?php echo $rresult['id'];?>">
					<p><?php echo $rresult['title'];?></p>
					<img src="admin/upload/<?php echo $rresult['image'];?>" alt="post image"/></a>
					<?php } } else {echo "No related posts";}?>
				</div>
				<?php }} else {header(Location:"404.php");}?>
	</div>

		</div>
		<div class="sidebar clear">
			<div class="samesidebar clear">
				<h2>Latest articles</h2>
					<ul>
						<li><a href="#">Category One</a></li>
						<li><a href="#">Category Two</a></li>
						<li><a href="#">Category Three</a></li>
						<li><a href="#">Category Four</a></li>
						<li><a href="#">Category Five</a></li>						
					</ul>
			</div>
			<?php include'inc/sidebar.php'?>
			<?php include'inc/footer.php'?>