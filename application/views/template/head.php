<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Bracket Plus">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/bracketplus">
    <meta property="og:title" content="Bracket Plus">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Admin page for exam platform used by AMIKOM Yogyakarta University">
    <meta name="author" content="Lembaga Penelitian Universitas AMIKOM Yogyakarta">

    <title>Amikom Exam Admin: <?php echo ucfirst($this->uri->segment(0))?></title>

    <!-- vendor css -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet"/> -->
    <!-- <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.5.0/css/all.min.css' rel="stylesheet"/> -->
    <link href="<?php echo base_url('assets/lib/fontawesome-pro-5.10.2/css/all.min.css')?>" rel="stylesheet"/>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css' rel="stylesheet"/>
    <!-- <link href='https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/github.min.css' rel="stylesheet"/> -->
    <link href='https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css' rel="stylesheet"/>
    
    <?php
        if (isset($css) && is_array($css) && !empty($css)) {
            foreach ($css as $key => $value) { 
                if (strpos($value, "http") !== false) 
                    echo "<link href=\"".$value."\" rel=\"stylesheet\"/>";
                else if (strpos($value, "../css") !== false) { }
                else
                    echo "<link href=\"".base_url('assets/lib/'.$value)."\" rel=\"stylesheet\"/>";
            }
        }
            echo "<link href=\"".base_url("assets/css/bracket.css")."\" rel=\"stylesheet\"/>";
            echo "<link href=\"".base_url("assets/css/custom.css")."\" rel=\"stylesheet\"/>";
            
        if (isset($css) && is_array($css) && !empty($css)) {
            foreach ($css as $key => $value) { 
                if (strpos($value, "../css") !== false) {
                    echo "<link href=\"".base_url('assets/lib/'.$value)."\" rel=\"stylesheet\"/>";
                }
            }
        }
    ?>
  </head>
