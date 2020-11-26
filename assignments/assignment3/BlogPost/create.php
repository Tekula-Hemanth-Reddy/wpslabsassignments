<?php include('addData.php')?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Post It</title>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="./_css/style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="form">
      
      <div class="card-panel">
        <div id="signup">   
          <h1>Start Your Blog</h1>
          
          <form action="create.php" method="post">
          <?php include('errors.php') ?>
          <div class="field-wrap">
            <label>
              Title<span class="req">*</span>
            </label>
            <input type="text"required autocomplete="off" name="title" />
          </div>
          <h1>Body</h1>
          <div class="field-wrap">
            <textarea rows = "5" cols = "60" type="text"required autocomplete="off" name="body">
             </textarea>
          </div>
          
          <button type="submit" class="button button-block"style="color: #fff;" name="preview">Preview</button>
          
          </form>

        </div>
        
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script>
      $('.form').find('input, textarea').on('keyup blur focus', function (e) {
  
  var $this = $(this),
      label = $this.prev('label');

	  if (e.type === 'keyup') {
			if ($this.val() === '') {
          label.removeClass('active highlight');
        } else {
          label.addClass('active highlight');
        }
    } else if (e.type === 'blur') {
    	if( $this.val() === '' ) {
    		label.removeClass('active highlight'); 
			} else {
		    label.removeClass('highlight');   
			}   
    } else if (e.type === 'focus') {
      
      if( $this.val() === '' ) {
    		label.removeClass('highlight'); 
			} 
      else if( $this.val() !== '' ) {
		    label.addClass('highlight');
			}
    }

});

$('.tab a').on('click', function (e) {
  
  e.preventDefault();
  
  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');
  
  target = $(this).attr('href');

  $('.tab-content > div').not(target).hide();
  
  $(target).fadeIn(600);
  
});
  </script>

</body>
</html>
