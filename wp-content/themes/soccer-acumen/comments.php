<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package Soccer Acumen
 */
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
    return;
}

/* ----------------------------------------------------------------------- */
/* 	Display Comments
  /*----------------------------------------------------------------------- */

if (!function_exists('soccer_acumen_comments')) {

    function soccer_acumen_comments($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;
        $args['reply_text'] = 'Reply';

        $user_id = get_the_author_meta('ID');
        $user_url = get_author_posts_url($user_id);
        $author_photo = get_the_author_meta('author_photo', $user_id);
        ?>

        <li <?php echo str_replace('comment', '', comment_class('comment-entry clearfix', '', '', false)); ?> id="comment-<?php comment_ID(); ?>">
            <div class="tg-comment">
                <figure>
                    <a href="<?php echo esc_url($user_url); ?>">
                        <?php
                        if (!empty($author_photo)) {
                            echo '<img src="' . esc_url($author_photo) . '" alt="' . esc_attr__('Author Avatar', 'soccer-acumen') . '">';
                        } else {
                            echo get_avatar($user_id, 92);
                        }
                        ?>
                    </a>
                </figure>
                <div class="tg-commentdata">
                    <span class="tg-theme-tag"><time datetime="2016-12-20"><?php comment_date('F d, Y'); ?></time></span>
                    <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
                    <div class="tg-section-heading">
                        <h3><a href="javascript:;"><?php the_author(); ?></a></h3>
                    </div>
                    <div class="tg-description">
                        <p>
                            <?php
                            $comment_text = get_comment_text();
                            echo wp_kses(
                                    $comment_text,
                                    // Only allow <a>, <strong>, and <em> tags
                                    array(
                                'a' => array(
                                    // Here, we whitelist 'href' and 'title' attributes - nothing else allowed!
                                    'href' => array(),
                                    'title' => array()
                                ),
                                'br' => array(),
                                'em' => array(),
                                'strong' => array()
                                    )
                            );
                            ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php
        }

    }
    ?>

    <?php if (have_comments()) : ?>
        <div id="tg-comments" class="tg-comments tg-haslayout">
            <div class="tg-section-heading">
                <h2><?php comments_number(('0  Comments'), ('1  Comment'), ('% Comments')); ?></h2>
            </div>
            <ul class="comment-list">
                <?php wp_list_comments(array('callback' => 'soccer_acumen_comments')); ?>
            </ul>
            <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
                <?php previous_comments_link(esc_html__('&larr; Older Comments', 'soccer-acumen')); ?>
                <?php next_comments_link(esc_html__('Newer Comments &rarr;', 'soccer-acumen')); ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <div class="tg-leavecomment tg-haslayout">
        <?php
        global $aria_req, $user_identity, $commenter;
        ob_start();
        comment_form(array(
            'fields' => apply_filters(
                    'comment_form_default_fields', array(
                'first_name' => '
					<div class="form-group">' . '<input class="form-control" placeholder="' . esc_attr__('Name', 'soccer-acumen') . '" name="author" type="text" value="' .
                esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . ' />' .
                '</div>'
                ,
                'email' => '<div class="form-group">' . '<input class="form-control" placeholder="' . esc_attr__('Email', 'soccer-acumen') . '" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) .
                '" size="30"' . $aria_req . ' />' .
                '</div>',
                    )
            ),
            'comment_field' => '<div class="form-group">' .
            '<textarea class="form-control" name="comment" placeholder="' . esc_attr__('Your Comment', 'soccer-acumen') . '" rows="4"></textarea>' .
            '</div>',
            'logged_in_as' => '<div class="col-sm-12 comment-logout"><div class="row"><div class="form-group">' . sprintf('Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">' . esc_html__('Log out', 'soccer-acumen') . '?</a>', admin_url('profile.php'), $user_identity, wp_logout_url(apply_filters('the_permalink', get_permalink()))) . '</div></div></div>',
            'notes' => '',
            'comment_notes_before' => '',
            'comment_notes_after' => '',
            'id_form' => 'tg-commentform',
            'id_submit' => 'tg-btn',
            'class_form' => 'tg-commentform',
            'class_submit' => 'tg-btn',
            'name_submit' => 'submit',
            'title_reply' => esc_html__(' ', 'soccer-acumen'),
            'title_reply_before' => '<div class="tg-section-heading"><h2>Leave a  comments',
            'title_reply_after' => '</h2></div>',
            'cancel_reply_before' => '<span>',
            'cancel_reply_after' => '</span>',
            'cancel_reply_link' => esc_html__('Cancel reply', 'soccer-acumen'),
            'label_submit' => esc_html__('Send', 'soccer-acumen'),
            'submit_button' => '<input name="%1$s" type="submit" id="%2$s" class="tg-btn" value="%4$s" />',
            'submit_field' => '<div class="form-group">%1$s %2$s</div>',
            'format' => 'xhtml',
        ));

        echo ob_get_clean();
        ?>
    </div>
