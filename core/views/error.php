<?php render('_header',array('title'=>'Whoops!',
                             'caption'=>'Sorry, there has been an error loading this page.'))?>

<?php echo $message; ?>

<?php render('_footer')?>