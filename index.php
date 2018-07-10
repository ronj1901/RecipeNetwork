
<?php 
	
	include("includes/header.php");
	include("includes/classes/User.php");
	include("includes/classes/Post.php");

	if(isset($_POST['post']))
	{
		$post = new Post($con, $login_session);
		$post->submitPost($_POST['post_text'], "none");

	}
	
?>

		<div class="container-fluid">
	 
	  		<div class="row">
	   		 		<div class="col-sm-3 user">

	   		 			<a href="#"> <img src="<?php echo $row['profile_pic']; ?>" class="img-circle" ></a>
					  	
					  		<h1><?php echo $row['first_name'] . $row['last_name'] . "<br>" ?></h1>
					  	
					  	 <h5><i class="fa fa-bell-o fa-lg" ></i> <?php echo "Posts : " . $row['num_posts'] . "<br>" ?></h5>
					  	 <h5> <i class="fa fa-user-o fa-lg" ></i> <?php echo "Date joined : " . $row['signup_date'] . "<br>" ?></h5>
					  	 <h5><i class="fa fa-heart"></i> Likes : 190</h5>
					  	  <h5><i class="fa fa-heart"></i> Friends : 45</h5>
					  	  <h5><i class="fa fa-heart"></i> About me : I am a chef</h5>
					  	 <h5></h5>
					  	
	   		 	    </div>
	   		 	    <div class="col-sm-7 status_update">

	   		 	    		<form action="index.php" method="POST">
								    <div class="form-group">
								      <label for="comment">Post Your Status:</label>
								      <textarea class="form-control" rows="5" name="post_text" id="post_text" placeholder="What is on your mind? "></textarea>
								      <input   type="submit" name="post" class="form-control postButton" value="Post">
								    </div>
								 </form>
	   		 	    </div>
	    	 		<div class="col-sm-6 main-content" >
	    	 				<div class="blog-post">
	    	 				  <h4><small>RECENT POSTS</small></h4><hr>
	    	 				   <h2>I Love Food</h2>
						      <h5><span class="glyphicon glyphicon-time"></span> Post by Jane Dane, Sep 27, 2015.</h5>
						      <h5><span class="label label-danger">Food</span> <span class="label label-primary">Ipsum</span></h5><br>
						      <p>Food is my passion. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
						      <br><br>

			
								<div class="posts_area"></div>
								<img id="loading" src="assets/images/icons/loading.gif">
				
							</div>	
	    	 		</div>
	    			
	  		</div>
		</div>
 

 	<script>
			var login_session = '<?php echo $login_session; ?>';

			$(document).ready(function() {

				$('#loading').show();

				//Original ajax request for loading first posts 
				$.ajax({
					url: "includes/handlers/ajax_load_posts.php",
					type: "POST",
					data: "page=1&login_session=" + login_session,
					cache:false,

					success: function(data) {
						$('#loading').hide();
						$('.posts_area').html(data);
					}
				});

				$(window).scroll(function() {
					var height = $('.posts_area').height(); //Div containing posts
					var scroll_top = $(this).scrollTop();
					var page = $('.posts_area').find('.nextPage').val();
					var noMorePosts = $('.posts_area').find('.noMorePosts').val();

					if ((document.body.scrollHeight == document.body.scrollTop + window.innerHeight) && noMorePosts == 'false') {
						$('#loading').show();

						var ajaxReq = $.ajax({
							url: "includes/handlers/ajax_load_posts.php",
							type: "POST",
							data: "page=" + page + "&userLoggedIn=" + userLoggedIn,
							cache:false,

							success: function(response) {
								$('.posts_area').find('.nextPage').remove(); //Removes current .nextpage 
								$('.posts_area').find('.noMorePosts').remove(); //Removes current .nextpage 

								$('#loading').hide();
								$('.posts_area').append(response);
							}
						});

					} //End if 

					return false;

				}); //End (window).scroll(function())


			});

	</script>


	
  	
 





  
</body>
</html>

