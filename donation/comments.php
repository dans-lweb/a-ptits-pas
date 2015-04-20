<?php
// Do not delete these lines for security reasons
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) {
    die ('Please do not load this page directly. Thanks!');
}
?>

<?php if (ale_get_option('comments_style') == 'off') : ?>
    <?php
    // comments are disabled
    return;
    ?>
<?php elseif (ale_get_option('comments_style') == 'wp') : ?>

    <h2 class="title"><?php _e('Comments','aletheme'); ?></h2>
    <!-- Comments -->
    <div class="comments">

    <?php if (!comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments')) : ?>
        <p class="comments-closed"><?php _e('Comments are closed.', 'aletheme'); ?></p>
        <div class="cf"></div>
    <?php endif; ?>

    <?php if (comments_open()) : ?>

        <a name="comments"></a>
        <?php if (post_password_required()) : ?>
            <p class="comments-protected"><?php _e('This post is password protected. Enter the password to view comments.', 'aletheme'); ?></p>
            <?php
            return; endif; ?>
        <?php if (have_comments()) : ?>
            <?php $comments = get_comments(array('post_id' => $post->ID, 'order' => 'ASC'));
            foreach($comments as $comment) : ?>
                <div class="comment cf">
                    <div class="avatar">
                        <?php echo get_avatar( get_the_author_meta( 'ID' ), 110 ); ?>
                    </div>
                    <div class="text">
                        <div class="top">
                            <h4><?php echo($comment->comment_author); ?></h4>
                            <h4 class="date"><?php _e('Date:','aletheme'); ?> <?php the_time('j M, Y');?></h4>
                        </div>
                        <div class="dotted-line"></div>
                        <div class="text-box">
                            <?php echo get_comment_text() ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // are there comments to navigate through ?>
                <nav class="comments-nav" class="pager">
                    <div class="previous"><?php previous_comments_link(__('&larr; Older comments', 'aletheme')); ?></div>
                    <div class="next"><?php next_comments_link(__('Newer comments &rarr;', 'aletheme')); ?></div>
                </nav>
            <?php endif; // check for comment navigation ?>
        <?php endif; ?>
    <?php endif; ?>


    <!-- Comment Form -->
    <?php if (comments_open()) : ?>
        <?php if (get_option('comment_registration') && !is_user_logged_in()) : ?>
            <p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.', 'aletheme'), wp_login_url(get_permalink())); ?></p>
        <?php else : ?>
            <div class="respond">
                <div class="top"> <h2><?php _e('Respond','aletheme'); ?></h2> </div>
                <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" id="comment-form" method="post" class="cf">
                    <?php if (!is_user_logged_in()) : ?>
                        <div class="col-6 left">
                            <input type="text" class="name" placeholder="<?php _e('Type your name', 'aletheme'); ?>" name="author" id="author" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> required="required">
                            <input type="email" placeholder="<?php _e('Type your email', 'aletheme'); ?>" class="email" name="email" id="email" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> required="required" email="true">
                        </div>
                        <div class="col-6 right">
                            <input type="url" placeholder="<?php _e('Type your website', 'aletheme'); ?>" class="site" name="url" id="url" tabindex="3" >
                            <textarea name="comment" placeholder="<?php _e('Type your comment', 'aletheme'); ?>" id="comment" class="message" required="required"></textarea>
                    <?php else : ?>
                        <textarea name="comment" placeholder="<?php _e('Type your comment', 'aletheme'); ?>" id="comment" class="message full" required="required"></textarea>
                    <?php endif; ?>
                    <div class="message-submit">
                        <input name="submit" class="submit" type="submit" value="<?php _e('SUBMIT', 'aletheme'); ?>" />
                    </div>

                    <?php comment_id_fields(); ?>
                    <?php do_action('comment_form', $post->ID); ?>
                </form>
            </div>
            </div>
        <?php endif; // if registration required and not logged in ?>
    <?php endif; ?>


<?php elseif(ale_get_option('comments_style') == 'fb') : ?>
    <section class="facebook-comments">
        <div id="fb-comments<?php the_ID()?>" class="fb-comments" data-href="<?php the_permalink()?>" data-num-posts="5"></div>
    </section>
<?php elseif(ale_get_option('comments_style') == 'dq') : ?>
    <section class="disqus-comments">
        <?php _e('Please download the DISQUS plugin from Wordpress Repository and install it.', 'aletheme'); ?>
    </section>
<?php elseif(ale_get_option('comments_style') == 'lf') : ?>
    <section class="disqus-comments">
        <?php _e('Please download the Livefyre Realtime Comments plugin from Wordpress Repository and install it.', 'aletheme'); ?>
    </section>
<?php elseif(ale_get_option('comments_style') == 'ws') : ?>
    <section class="defaultwp">
        <?php if (!comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments')) : ?>
            <p class="comments-closed"><?php _e('Comments are closed.', 'aletheme'); ?></p>
        <?php endif; ?>
        <div id="comments">
            <?php //wp_list_comments()
            wp_list_comments(array('callback' => 'aletheme_comment_default', 'max_depth' => 2,'avatar_size' => 80,));
            ?>

            <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
                <nav id="comment-nav-below" class="navigation" role="navigation">
                    <h1 class="assistive-text section-heading"><?php _e( 'Comment navigation', 'aletheme' ); ?></h1>
                    <div class="nav-previous"><?php previous_comments_link( __( 'Older Comments', 'aletheme' ) ); ?></div>
                    <div class="nav-next"><?php next_comments_link( __( 'Newer Comments', 'aletheme' ) ); ?></div>
                </nav>
            <?php endif; // check for comment navigation ?>
        </div>
        <div class="respondbox">
            <?php comment_form(); ?>
        </div>
    </section>
<?php endif; ?>
