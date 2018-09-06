<?php

session_start();

// -- Link -- //
include "assets/layout/link.php";

?>

<style>

    #datepicker {
        background-color: white;
        color: #676767;
        font-family:Verdana, Geneva, sans-serif;
        cursor:pointer;
    }
    #r_datepicker {
        background-color: white;
        color:#676767;
        font-family:Verdana, Geneva, sans-serif;
        cursor:pointer;
    }
</style>

<title>Syria Travel</title>
</head>

<?php

// Header -- //
if(isset($_SESSION['a_id'])) {
    include "assets/layout/admin-header.php";
}
elseif(isset($_SESSION['c_id'])) {
    include "assets/layout/company-header.php";
}
elseif(isset($_SESSION['e_id'])) {
    include "assets/layout/employee-header.php";
}
elseif(isset($_SESSION['client_id'])) {
    include "assets/layout/client-header.php";
}
else{
include "assets/layout/header.php";
}
//-- Home -- //

include "home.php";

// Footer -- //

include "assets/layout/footer.php";


?>


