<?php 
   $system_name = $this->db->get_where('settings' , array('type'=>'system_name'))->row()->description;
   $system_title = $this->db->get_where('settings' , array('type'=>'system_title'))->row()->description;
	$account_type = $this->session->userdata('login_type'); 
?>
<!DOCTYPE html>
<html lang="en">
   <head>
		<title><?= $page_title; ?> | <?= $system_name; ?></title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta content="ie=edge" http-equiv="x-ua-compatible">
      <meta content="<?php echo $system_name ." ".$system_title;?>" name="description">
		<?php include 'topcss.php';?>
      <?php include 'script.php';?>
   </head>
   <body class="hold-transition sidebar-mini">
      <div class="wrapper">
			<?php include $account_type.'/navigation.php';?>
			<?php include $account_type.'/header.php';?>
			<?php include $account_type.'/'.$page_name.'.php';?>
      </div>
		<?php include 'modal.php';?>
   </body>
</html>