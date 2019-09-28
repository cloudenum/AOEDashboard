
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.4.0/perfect-scrollbar.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/peity/3.3.0/jquery.peity.min.js'></script>
    <!-- <link href='https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.pack.min.js' rel="stylesheet"/> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.2.1/js.cookie.min.js"></script>

    <?php
        if (isset($js) && is_array($js) && !empty($js)) {
            foreach ($js as $key => $value) { 
                if (strpos($value, "http") !== false) 
                    echo "<script src=\"".$value."\"></script>";
                else if (strpos($value, "../js") !== false) { }
                else
                    echo "<script src=\"".base_url('assets/lib/'.$value)."\"></script>";
            }

            echo "<script src=\"".base_url("assets/js/bracket.js")."\"></script>";
            echo "<script src=\"".base_url('assets/js/main.js')."\"></script>";
            
            foreach ($js as $key => $value) { 
                if (strpos($value, "../js") !== false) {
                    echo "<script src=\"".base_url('assets/lib/'.$value)."\"></script>";
                }
            }
        }
    ?>

    
    
