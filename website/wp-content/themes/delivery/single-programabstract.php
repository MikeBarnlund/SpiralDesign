<?php

get_header();

the_post();

?>

<div class="program-abstract content">
	<h1><?php the_title(); ?></h1>
	<h2>Program General Details</h2>
	
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
		</tbody>
	</table>

</div>

<?php

get_footer();

?>