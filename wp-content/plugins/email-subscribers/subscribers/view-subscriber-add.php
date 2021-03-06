<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

?>

<div class="wrap">
	<?php

	$es_errors = array();
	$es_success = '';
	$es_error_found = FALSE;

	// Preset the form fields
	$form = array(
		'es_email_name' => '',
		'es_email_status' => '',
		'es_email_group' => '',
		'es_email_mail' => '',
		'es_nonce' => ''
	);
   
	// Form submitted, check the data
	if ( isset($_POST['es_form_submit']) && $_POST['es_form_submit'] == 'yes' && !empty( $_POST['es-subscribe'] ) ) {

		// Just security thingy that wordpress offers us
		if ( $form['es_nonce'] == '' ) {
			$form['es_nonce'] = $_POST['es-subscribe'];
		}

		$form['es_email_status'] = isset($_POST['es_email_status']) ? $_POST['es_email_status'] : '';
		$form['es_email_name'] = isset($_POST['es_email_name']) ? $_POST['es_email_name'] : '';

		$form['es_email_mail'] = isset($_POST['es_email_mail']) ? $_POST['es_email_mail'] : '';
		if ($form['es_email_mail'] == '') {
			$es_errors[] = __( 'Please enter subscriber email address.', 'email-subscribers' );
			$es_error_found = TRUE;
		}

		$es_email_group = isset($_POST['es_email_group']) ? $_POST['es_email_group'] : '';
		if ( $es_email_group == '' ) {
			$es_email_group = isset($_POST['es_email_group_txt']) ? $_POST['es_email_group_txt'] : '';
			$form['es_email_group'] = $es_email_group;
		} else {
			$form['es_email_group'] = $es_email_group;
		}

		if ( $form['es_email_group'] == '' ) {
			$es_errors[] = __( 'Please select or create your group for this email.', 'email-subscribers' );
			$es_error_found = TRUE;
		}

		if( $form['es_email_group'] != '' ) {
			$special_letters = es_cls_common::es_special_letters();
			if (preg_match($special_letters, $form['es_email_group'])) {
				$es_errors[] = __( 'Error: Special characters ([\'^$%&*()}{@#~?><>,|=_+\"]) are not allowed in the group name.', 'email-subscribers' );
				$es_error_found = TRUE;
			}
		}

		//	No errors found, we can add this Group to the table
		if ($es_error_found == FALSE) {
			$action = "";
			$action = es_cls_dbquery::es_view_subscriber_ins($form, "insert");
			if($action == "sus") {
				$es_success = __( 'Subscriber has been saved.', 'email-subscribers' );
			} elseif($action == "ext") {
				$es_errors[] = __( 'Subscriber already exists.', 'email-subscribers' );
				$es_error_found = TRUE;
			} elseif($action == "invalid") {
				$es_errors[] = __( 'Invalid Email.', 'email-subscribers' );
				$es_error_found = TRUE;
			}

			// Reset the form fields
			$form = array(
				'es_email_name' => '',
				'es_email_status' => '',
				'es_email_group' => '',
				'es_email_mail' => '',
				'es_nonce' => ''
			);
		}
	}

	if ($es_error_found == TRUE && isset($es_errors[0]) == TRUE) {
		?><div class="error fade">
			<p><strong>
				<?php echo $es_errors[0]; ?>
			</strong></p>
		</div><?php
	}
	if ($es_error_found == FALSE && isset($es_success[0]) == TRUE) {
		?><div class="notice notice-success is-dismissible">
			<p><strong>
				<?php echo $es_success; ?>
			</strong></p>
		</div><?php
	}

	?>

	<style type="text/css">
		.form-table th {
			width:260px;
		}
	</style>

	<div class="wrap">
		<h2>
			<?php echo __( 'Add New Subscriber', 'email-subscribers' ); ?>
			<a class="add-new-h2" href="<?php echo ES_ADMINURL; ?>?page=es-view-subscribers&amp;ac=import"><?php echo __( 'Import', 'email-subscribers' ); ?></a>
			<a class="add-new-h2" href="<?php echo ES_ADMINURL; ?>?page=es-view-subscribers&amp;ac=export"><?php echo __( 'Export', 'email-subscribers' ); ?></a>
			<a class="add-new-h2" href="<?php echo ES_ADMINURL; ?>?page=es-view-subscribers&amp;ac=sync"><?php echo __( 'Sync', 'email-subscribers' ); ?></a>
			<a class="add-new-h2" target="_blank" href="<?php echo ES_FAV; ?>"><?php echo __( 'Help', 'email-subscribers' ); ?></a>
		</h2>
		<form name="form_addemail" method="post" action="#" onsubmit="return _es_addemail()">
			<div class="tool-box">
				<table class="form-table">
					<tbody>
						<tr>
							<th scope="row">
								<label for="tag-image">
									<?php echo __( 'Enter Subscriber\'s Full name', 'email-subscribers' ); ?>
								</label>						
							</th>
							<td>
								<input name="es_email_name" type="text" id="es_email_name" value="" maxlength="225" size="30" />
							</td>
						</tr>
						<tr>
							<th>
								<label for="tag-image">
									<?php echo __( 'Enter Subscriber\'s Email Address', 'email-subscribers' ); ?>
								</label>
							</th>
							<td>
								<input name="es_email_mail" type="text" id="es_email_mail" value="" maxlength="225" size="30" />
							</td>
						</tr>
						<tr>
							<th>
								<label for="tag-display-status">
									<?php echo __( 'Select Subscriber\'s Status', 'email-subscribers' ); ?>
								</label>
							</th>
							<td>
								<select name="es_email_status" id="es_email_status">
									<option value='Confirmed' selected="selected"><?php echo __( 'Confirmed', 'email-subscribers' ); ?></option>
									<option value='Unconfirmed'><?php echo __( 'Unconfirmed', 'email-subscribers' ); ?></option>
									<option value='Unsubscribed'><?php echo __( 'Unsubscribed', 'email-subscribers' ); ?></option>
									<option value='Single Opt In'><?php echo __( 'Single Opt In', 'email-subscribers' ); ?></option>
								</select>
							</td>
						</tr>
						<tr>
							<th>
								<label for="tag-display-status">
									<?php echo __( 'Select (or) Create Group for Subscriber', 'email-subscribers' ); ?></label>
							</th>
							<td>
								<select name="es_email_group" id="es_email_group">
									<option value=''><?php echo __( 'Select', 'email-subscribers' ); ?></option>
									<?php
									$groups = array();
									$groups = es_cls_dbquery::es_view_subscriber_group();
									if(count($groups) > 0) {
										$i = 1;
										foreach ($groups as $group) {
											?><option value="<?php echo stripslashes($group["es_email_group"]); ?>"><?php echo stripslashes($group["es_email_group"]); ?></option><?php
										}
									}
									?>
								</select>
								<?php echo __('(or)', 'email-subscribers' );?>
								<input name="es_email_group_txt" type="text" id="es_email_group_txt" value="" maxlength="225" />
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<input type="hidden" name="es_form_submit" value="yes"/>
			<p style="padding-top:5px;">
				<input type="submit" class="button-primary" value="<?php echo __( 'Add Subscriber', 'email-subscribers' ); ?>" />
			</p>
			<?php wp_nonce_field( 'es-subscribe', 'es-subscribe' ); ?>
		</form>
	</div>
</div>