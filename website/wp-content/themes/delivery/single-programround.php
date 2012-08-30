<?php

get_header();

the_post();

?>

<div class="program-round content">
	<h1><?php the_title(); ?></h1>
	
	<section id="details">
		
		<h2>Round Details</h2>
		
		<div class="row">
			<div class="span12">
	
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>
							<td class="field_label">Introduction Text</td>
							<td><?php the_field('introduction_text');?></td>
						</tr>
						<tr>
							<td class="field_label">Quick Questions</td>
							<td>
								<table class="table table-condensed subtable">
									<thead>
										<tr>
											<th>Content File</th>
											<th>Language</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$qq_files = get_field( 'quick_questions_content' );
										if ( $qq_files !== false ) {
											foreach ( $qq_files as $qq_file ) {
											?>
												<tr>
													<td>
														<a target="_blank" href="<?php echo $qq_file['quick_questions_content_file']; ?>"><?php echo $qq_file['quick_question_content_file_name']; ?></a>
													</td>
													<td><?php echo $qq_file['language']; ?></td>
												</tr>
											<?php } 
										} else { ?>
											<tr><td colspan="2">No Quick Question Content Available</td></tr>
										<?php } ?>
									</tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td class="field_label">Additional Round Instructions</td>
							<td><?php the_field('additional_round_instructions');?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</section>
	
	<section id="topics">
		<h2>Topics</h2>
		
		<?php
		$topics = get_field( 'topics' );
		foreach ( $topics as $topic ) {
		?>
		<div class="row">
			<div class="span12">
				
				<h3><?php echo $topic['topic_title'];?></h3>
	
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>
							<td class="field_label">Description</td>
							<td><?php echo $topic['topic_description'];?></td>
						</tr>
						<tr>
							<td class="field_label">Submission Title Field Label</td>
							<td><?php echo $topic['submission_title_field_label'];?></td>
						</tr>
						<tr>
							<td class="field_label">Submission Description Field Label</td>
							<td><?php echo $topic['submission_description_field_label'];?></td>
						</tr>
						<?php
						$additional_submission_fields = $topic['additional_submission_fields'];
						if ( $additional_submoission_fields != false ) { ?>
							<tr>
								<td class="field_label">Additional Submission Fields</td>
								<td>
									<table class="table table-condensed subtable">
										<thead>
											<tr>
												<th>Label</th>
												<th>Type</th>
												<th>Notes</th>
											</tr>
										</thead>
										<tbody>
											<?php
											foreach ( $additional_submission_fields as $additional_submission_field ) {
											?>
												<tr>
													<td><?php echo $additional_submission_field['field_label']; ?></td>
													<td><?php echo $additional_submission_field['field_type']; ?></td>
													<td><?php echo $additional_submission_field['field_notes']; ?></td>
												</tr>
											<?php } ?>
										</tbody>
									</table>
								</td>
							</tr>
						<?php } ?>
						
						<tr>
							<td class="field_label">Voting Type</td>
							<td><?php echo $topic['voting_type'];?></td>
						</tr>
						<tr>
							<td class="field_label">Voting Type Notes</td>
							<td><?php echo $topic['voting_type_notes'];?></td>
						</tr>
						<tr>
							<td class="field_label">Voting Instructions</td>
							<td><?php echo $topic['voting_instructions'];?></td>
						</tr>
						<tr>
							<td class="field_label">Show Scores?</td>
							<td><?php echo $topic['show_scores'];?></td>
						</tr>
						<tr>
							<td class="field_label">Show Idea Title?</td>
							<td><?php echo $topic['show_idea_title'];?></td>
						</tr>
						<tr>
							<td class="field_label">Show Idea Content?</td>
							<td><?php echo $topic['show_idea_content'];?></td>
						</tr>
						<tr>
							<td class="field_label">Allow Facebook/Twitter Sharing?</td>
							<td><?php echo $topic['allow_facebook_twitter_sharing'];?></td>
						</tr>
						<tr>
							<td class="field_label">Submission Guidelines</td>
							<td><?php echo $topic['submission_guidelines'];?></td>
						</tr>
						<tr>
							<td class="field_label">Additional Topic Instructions</td>
							<td><?php echo $topic['additional_topic_instructions'];?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<?php } ?>

	</section>
</div>

<?php

get_footer();

?>