<?php 




comment_form(array(
	'fields'=> apply_filters('comment_form_default_fields', array(
		'author'=>'
        <div class="form-group">
            <input name="author" type="text" placeholder="Name" class="form-control">
          </div>',
        'email'=>'<div class="form-group last">
            <input name="email" type="text" placeholder="Email" class="form-control">
          </div>', 
        'comment_field'=>'<div class="form-group">
          <textarea name="comment"placeholder="Comment" class="form-control" spellcheck="false"></textarea>
        </div>
                '
	), $fields ),

)); 




wp_list_comments(); ?>