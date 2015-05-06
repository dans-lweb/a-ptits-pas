<?php add_action( 'add_meta_boxes', 'add_payment_meta_box' );

if( !function_exists( 'add_payment_meta_box' ) ){
function add_payment_meta_box(){
add_meta_box( 'ale_payment-meta-box', __('PayPal Payment Information', 'aletheme'), 'ale_payment_meta_box', 'causes', 'normal', 'core' );
}
}

if( !function_exists( 'ale_payment_meta_box' ) ){
function ale_payment_meta_box( $post ){ ?>
<table style="width:100%;">
    <thead>
        <td><strong><?php _e('ID','aletheme');?></strong></td>
        <td><strong><?php _e('Date','aletheme');?></strong></td>
        <td><strong><?php _e('Prenom','aletheme');?></strong></td>
        <td><strong><?php _e('Nom','aletheme');?></strong></td>
        <td><strong><?php _e('Email','aletheme');?></strong></td>
        <td><strong><?php _e('Statut','aletheme');?></strong></td>
        <td><strong><?php _e('Montant','aletheme');?></strong></td>
        <td><strong><?php _e('Monnaie','aletheme');?></strong></td>
    </thead>
    <?php $metacust = get_post_meta($post->ID, 'ale_paypal_details', true);

    if($metacust){
        foreach ($metacust as $pp_stat){?>
            <tr>
                <td><?php echo $pp_stat['ale_txn_id']; ?></td>
                <td><?php echo $pp_stat['ale_payment_date'] ?></td>
                <td><?php echo $pp_stat['ale_first_name']; ?></td>
                <td><?php echo $pp_stat['ale_last_name']; ?></td>
                <td><?php echo $pp_stat['ale_payer_email']; ?></td>
                <td><?php echo $pp_stat['ale_payment_status']; ?></td>
                <td><?php echo $pp_stat['ale_payment_gress']; ?></td>
                <td><?php echo $pp_stat['ale_mc_currency']; ?></td>
            </tr>
        <?php }
    }?>
</table>
<?php
}
}