<?php
if (!defined('FW'))
    die('Forbidden');
/**
 * @var $atts
 */
?>
<div class="sc-contatform">
    <div class="contact_wrap_pg">
        <div class="message_contact"></div>
        <form class="tg-form-contact tg-haslayout contact_form tg-commentform">
            <fieldset>
                <?php wp_nonce_field('soccer_acumen_submit_contact', 'contact_security'); ?>
                <div class="form-group">
                    <input  type="text" name="username" placeholder="<?php esc_html_e('Name*', 'soccer-acumen'); ?>" class="form-control">
                </div>
                <div class="form-group">
                    <input type="email" name="useremail" placeholder="<?php esc_html_e('Email*', 'soccer-acumen'); ?>" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" name="subject" placeholder="<?php esc_html_e('Subject*', 'soccer-acumen'); ?>" class="form-control">
                </div>
                <div class="form-group">
                    <textarea  name="description" placeholder="<?php esc_html_e('Message*', 'soccer-acumen'); ?>" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <button class="tg-btn contact_now_pg"><?php esc_html_e('Send', 'soccer-acumen'); ?></button>
                </div>
            </fieldset>
        </form>
    </div>
</div>
