<?php
    require_once './incs/utils.class.php';

    $fileName = filter_input(INPUT_GET, 'filename', FILTER_SANITIZE_SPECIAL_CHARS);
    
    Utils::GetPdfPreview($fileName);

?>