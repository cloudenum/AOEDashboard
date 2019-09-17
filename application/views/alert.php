<?php 
// var_dump($type);    
    if (!isset($type)) {
        $type = 'error';
    }

    // switch ($type) {
    //     case 'success':
    //         $icon = 'ion-ios-checkmark-outline';
    //         break;
    //     case 'info':
    //         $icon = 'ion-ios-information';
    //         break;
    //     case 'warning':
    //         $icon = 'ion-ios-alert';
    //         break;
    //     case 'danger':
    //         $icon = 'ion-ios-close-outline';
    //         break;
    //     default:
    //         break;
    // }
?>
<!-- MODAL ALERT MESSAGE -->
<!-- <div id="alert" class="modal fade effect-sign">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content tx-size-sm">
        <div class="modal-body tx-center pd-y-20 pd-x-20">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <i class="icon <?php //echo $icon?> tx-100 tx-<?php //echo $type?> lh-1 mg-t-20 d-inline-block"></i>
            <h4 class="tx-<?php //echo $type?> tx-semibold mg-b-20"><?php //echo $title?></h4>
            <p class="mg-b-20 mg-x-20"><?php //echo $message?></p>
            <button type="button" class="btn btn-<?php //echo $type?> tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20" data-dismiss="modal" aria-label="Close">
            Close
            </button>
        </div>modal-body
        </div>modal-content
    </div>modal-dialog
    </div>modal -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
    // showing modal with effect
    // $('.modal-effect').on('click', function(e){
    //     e.preventDefault();

    //     var effect = $(this).attr('data-effect');
    //     $('#alert').addClass(effect);
        // $('#alert').modal('show');
    // });
        Swal.fire('<?php echo $title?>', '<?php echo $message?>', '<?php echo $type?>');
    // hide modal with effect
    // $('#alert').on('hidden.bs.modal', function (e) {
    //     $(this).removeClass (function (index, className) {
    //         return (className.match (/(^|\s)effect-\S+/g) || []).join(' ');
    //     });
    // });

</script>
