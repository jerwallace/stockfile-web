<?php render('_header',array('title'=>$title,'caption'=>$caption))?>

<?php // If not logged in...?>
<?php render('_loginform');?>

<?php render('_footer')?>