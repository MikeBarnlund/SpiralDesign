<?php

get_header();

the_post();

?>

<div class="program-abstract content">
	
	<h1><?php the_title(); ?></h1>
	
	<section id="general">
		
		<h2>Program General Details</h2>
		
		<div class="row">
			<div class="span12">
	
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>
							<td class="field_label">Program Name</td>
							<td><?php the_field('program_name');?></td>
						</tr>
						<tr>
							<td class="field_label">Program URL</td>
							<td><?php the_field('program_url');?></td>
						</tr>
						<tr>
							<td class="field_label">Description</td>
							<td><?php the_field('description');?></td>
						</tr>
						<tr>
							<td class="field_label">Supported Languages</td>
							<td><?php the_field('supported_languages');?></td>
						</tr>
						<tr>
							<td class="field_label">Program Type</td>
							<td><?php the_field('program_type');?></td>
						</tr>
						<tr>
							<td class="field_label">Program Type Notes</td>
							<td><?php the_field('program_type_notes');?></td>
						</tr>
						<tr>
							<td class="field_label">Member Score Type</td>
							<td><?php the_field('member_score_type');?></td>
						</tr>
						<tr>
							<td class="field_label">Profile Fields</td>
							<td>
								<table class="table table-condensed subtable">
									<thead>
										<tr>
											<th>Label</th>
											<th>Input Type</th>
											<th>Notes</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$profile_fields = get_field( 'profile_fields' );
										foreach ( $profile_fields as $profile_field ) {
										?>
											<tr>
												<td><?php echo $profile_field['profile_field_label']; ?></td>
												<td><?php echo $profile_field['profile_field_input_type']; ?></td>
												<td><?php echo $profile_field['profile_field_notes']; ?></td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td class="field_label">Leaderboard</td>
							<td><?php the_field('leaderboard');?></td>
						</tr>
						<tr>
							<td class="field_label">Allow Searching?</td>
							<td><?php the_field('allow_searching');?></td>
						</tr>
						<tr>
							<td class="field_label">Invite Others?</td>
							<td><?php the_field('invite_others');?></td>
						</tr>
						<tr>
							<td class="field_label">"Invite Others" Email Content</td>
							<td><?php the_field('invite_others_email_content');?></td>
						</tr>
						<tr>
							<td class="field_label">Blog?</td>
							<td><?php the_field('blog');?></td>
						</tr>
						<tr>
							<td class="field_label">Forum?</td>
							<td><?php the_field('forum');?></td>
						</tr>
						<tr>
							<td class="field_label">Email Signature</td>
							<td><?php the_field('email_signature');?></td>
						</tr>
						<tr>
							<td class="field_label">Excluded Badges</td>
							<td><?php the_field('excluded_badges');?></td>
						</tr>
						<tr>
							<td class="field_label">Additional Program Instructions</td>
							<td><?php the_field('additional_program_instructions');?></td>
						</tr>
			
					</tbody>
				</table>
			</div>
		</div>
	</section>
	
	<section id="join_process">
	
		<h2>Join Process Details</h2>
		<div class="row">
			<div class="span12">
				
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>
							<td class="field_label">Join Process</td>
							<td><?php the_field('join_process');?></td>
						</tr>
						<tr>
							<td class="field_label">Additional Join Fields</td>
							<td>
								<table class="table table-condensed subtable">
									<thead>
										<tr>
											<th>Label</th>
											<th>Input Type</th>
											<th>Notes</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$join_fields = get_field( 'additional_join_fields' );
										foreach ( $join_fields as $join_field ) {
										?>
											<tr>
												<td><?php echo $join_field['field_label']; ?></td>
												<td><?php echo $join_field['input_type']; ?></td>
												<td><?php echo $join_field['notes']; ?></td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</section>
	
	<section id="assets">
		<div class="row">
			<div class="span12">
				
				<h2>Assets</h2>
			
				<ul class="thumbnails">
					<?php
					$mockups = get_field( 'mockups' );
					
					$url = wp_get_attachment_image_src( $image['image'] );
					$url_full = wp_get_attachment_image_src( $image['image'], 'full' );
					
					foreach ( $mockups as $mockup ) {
						$mockup_thumb_url = wp_get_attachment_image_src( $mockup['image'] );
						$mockup_full_url = wp_get_attachment_image_src( $mockup['image'], 'full' );
						?>
						<li class="span6">
							<div class="thumbnail">
								<a target="_blank" href="<?php echo $mockup_full_url[0]; ?>"><img src="<?php echo $mockup_full_url[0]; ?>" /></a>
								<div class="caption"><h5>Notes</h5><?php echo $mockup['description']; ?></div>
							</div>
						</li>
					<?php } ?>
				</ul>
			</div>
		</div>
		
		<div class="row">
			
			<?php
			$content_files = get_field( 'static_page_content' );
			$file_count = count( $content_files );
			$column_cutoff = $file_count / 2;
			$column_file_count = 0;
			foreach ( $content_files as $content_file ) {
				if ( $column_file_count == 0 ) { ?>
					<div class="span6">
						<table class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Content File</th>
									<th>Lang</th>
								</tr>
							</thead>
							<tbody>
				<?php } ?>
				<tr>
					<td>
						<?php
						$content_file_attachment = $content_file['content'];
						if ( $content_file_attachment != false ) { ?>
							<a href="<?php echo $content_file_attachment; ?>"><?php echo $content_file['page_name']; ?></a>
						<?php } else echo $content_file['page_name']; ?>
					</td>
					<td><?php echo $content_file['language']; ?></td>
				</tr>
				<?php
				$column_file_count++;
				if ( $column_file_count == $column_cutoff ) {
					?>
								</tbody>
							</table>
						</div>
					<?php
					$column_file_count = 0;
				}
			}
			?>
		</div>
	</section>
	
	<section id="navigation">
		<div class="row"><div class="span12"><h2>Navigation</h2></div></div>
		<div class="row">
			<div class="span6">
				<h3>Header</h3>
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>
							<td class="field_label">Logged Out</td>
							<td><?php the_field('header_navigation_logged_out')?></td>
						</tr>
						<tr>
							<td class="field_label">Logged In</td>
							<td><?php the_field('header_navigation_logged_in')?></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="span6">
				<h3>Footer</h3>
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>
							<td class="field_label">Logged Out</td>
							<td><?php the_field('footer_navigation_logged_out')?></td>
						</tr>
						<tr>
							<td class="field_label">Logged In</td>
							<td><?php the_field('footer_navigation_logged_in')?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</section>
	
	<section id="community">
		<h2>Community Setup</h2>
		<div class="row">
			<div class="span12">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>
							<td class="field_label">Email Addresses</td>
							<td><?php the_field('email_addresses_to_set_up');?></td>
						</tr>
						<tr>
							<td class="field_label">Moderators</td>
							<td>
								<table class="table table-condensed subtable">
									<thead>
										<tr>
											<th>Name</th>
											<th>Email</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$moderators = get_field( 'moderators' );
										foreach ( $moderators as $moderator ) {
										?>
											<tr>
												<td><?php echo $moderator['moderator_name']; ?></td>
												<td><?php echo $moderator['moderator_email']; ?></td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</section>
	
</div>

<?php

get_footer();

?>