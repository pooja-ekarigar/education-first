<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

global $current_user;
if ( !( $current_user instanceof WP_User ) || !current_user_can( 'manage_options' ) ) {
	?>
	<div style="text-align: center; width: 90%; height: 75%; display: flex; position: fixed; align-items: center; justify-content: center;">
		<h1><?php echo __( 'Oops! Looks like you are not the site administrator.<br><br>Only the site administrator can export subscriber list.', 'email-subscribers' ); ?>
			<br><br>
			<a style="line-height: 30px; height: 35px;" class="button-primary" href="<?php echo ES_ADMINURL; ?>?page=es-view-subscribers"><?php echo __( 'Go back to Subscribers dashboard', 'email-subscribers' ); ?></a>
		</h1>
	</div>
	<?php
	return;
}

$home_url = home_url('/');

// All Subscribers
$cnt_all_subscribers = 0;
$cnt_all_subscribers = es_cls_dbquery::es_view_subscriber_count(0);

// Total Active Subscribers (Confirmed & Single Opt In)
$cnt_active_subscribers = 0;
$cnt_active_subscribers = es_cls_dbquery::es_active_subscribers();

// Inactive Subscribers (unconfirmed & Unsubscribed)
$cnt_inactive_subscribers = 0;
$cnt_inactive_subscribers = es_cls_dbquery::es_inactive_subscribers();

// WordPress Registered Users
$cnt_users = 0;
$get_wp_registered_users = $wpdb->prepare( "SELECT count(DISTINCT user_email) FROM {$wpdb->prefix}users WHERE 1=%d", 1 );
$cnt_users = $wpdb->get_var( $get_wp_registered_users );

// Users who comments on blog posts
$cnt_comment_author = 0;
$wp_comment_author_email = '';
$get_wp_commented_users_on_blog = $wpdb->prepare( "SELECT count(DISTINCT comment_author_email) FROM {$wpdb->prefix}comments WHERE comment_author_email != %s", $wp_comment_author_email );
$cnt_comment_author = $wpdb->get_var( $get_wp_commented_users_on_blog );

?>

<div class="wrap">
	<h2 style="margin-bottom:1em;">
		<?php echo __( 'Export Email Addresses', 'email-subscribers' ); ?>
		<a class="add-new-h2" href="<?php echo ES_ADMINURL; ?>?page=es-view-subscribers&amp;ac=add"><?php echo __( 'Add New Subscriber', 'email-subscribers' ); ?></a>
		<a class="add-new-h2" href="<?php echo ES_ADMINURL; ?>?page=es-view-subscribers&amp;ac=import"><?php echo __( 'Import', 'email-subscribers' ); ?></a>
		<a class="add-new-h2" href="<?php echo ES_ADMINURL; ?>?page=es-view-subscribers&amp;ac=sync"><?php echo __( 'Sync', 'email-subscribers' ); ?></a>
		<a class="add-new-h2" target="_blank" href="<?php echo ES_FAV; ?>"><?php echo __( 'Help', 'email-subscribers' ); ?></a>
	</h2>
	<div class="tool-box">
		<form name="frm_es_subscriberexport" method="post">
			<table width="100%" class="widefat" id="straymanage">
				<thead>
					<tr>
						<th scope="col"><?php echo __( 'Sno', 'email-subscribers' ); ?></th>
						<th scope="col"><?php echo __( 'Type of List to Export', 'email-subscribers' ); ?></th>
						<th scope="col"><?php echo __( 'Total Emails Count', 'email-subscribers' ); ?></th>
						<th scope="col"><?php echo __( 'Action', 'email-subscribers' ); ?></th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th scope="col"><?php echo __( 'Sno', 'email-subscribers' ); ?></th>
						<th scope="col"><?php echo __( 'Type of List to Export', 'email-subscribers' ); ?></th>
						<th scope="col"><?php echo __( 'Total Emails Count', 'email-subscribers' ); ?></th>
						<th scope="col"><?php echo __( 'Action', 'email-subscribers' ); ?></th>
					</tr>
				</tfoot>
				<tbody>
					<tr>
						<td><?php echo __( '1', 'email-subscribers' ); ?></td>
						<td><?php echo __( 'All Subscribers', 'email-subscribers' ); ?></td>
						<td><?php echo $cnt_all_subscribers; ?></td>
						<td><a onClick="javascript:_es_exportcsv('<?php echo $home_url. "?es=export"; ?>', 'view_all_subscribers')" href="javascript:void(0);"><?php echo __( 'Click to Export in CSV', 'email-subscribers' ); ?></a></td>
					</tr>
					<tr class="alternate">
						<td><?php echo __( '2', 'email-subscribers' ); ?></td>
						<td><?php echo __( 'Active Subscribers (Status: Confirmed & Single Opt In)', 'email-subscribers' ); ?></td>
						<td><?php echo $cnt_active_subscribers; ?></td>
						<td><a onClick="javascript:_es_exportcsv('<?php echo $home_url. "?es=export"; ?>', 'view_active_subscribers')" href="javascript:void(0);"><?php echo __( 'Click to Export in CSV', 'email-subscribers' ); ?></a></td>
					</tr>
					<tr>
						<td><?php echo __( '3', 'email-subscribers' ); ?></td>
						<td><?php echo __( 'Inactive Subscribers (Status: Unconfirmed & Unsubscribed)', 'email-subscribers' ); ?></td>
						<td><?php echo $cnt_inactive_subscribers; ?></td>
						<td><a onClick="javascript:_es_exportcsv('<?php echo $home_url. "?es=export"; ?>', 'view_inactive_subscribers')" href="javascript:void(0);"><?php echo __( 'Click to Export in CSV', 'email-subscribers' ); ?></a></td>
					</tr>
					<tr class="alternate">
						<td><?php echo __( '4', 'email-subscribers' ); ?></td>
						<td><?php echo __( 'WordPress Registered Users', 'email-subscribers' ); ?></td>
						<td><?php echo $cnt_users; ?></td>
						<td><a onClick="javascript:_es_exportcsv('<?php echo $home_url. "?es=export"; ?>', 'registered_user')" href="javascript:void(0);"><?php echo __( 'Click to Export in CSV', 'email-subscribers' ); ?></a></td>
					</tr>
					<tr>
						<td><?php echo __( '5', 'email-subscribers' ); ?></td>
						<td><?php echo __( 'Commented Authors', 'email-subscribers' ); ?></td>
						<td><?php echo $cnt_comment_author; ?></td>
						<td><a onClick="javascript:_es_exportcsv('<?php echo $home_url. "?es=export"; ?>', 'commentposed_user')" href="javascript:void(0);"><?php echo __( 'Click to Export in CSV', 'email-subscribers' ); ?></a></td>
					</tr>
				</tbody>
			</table>
		</form>
	</div>
</div>