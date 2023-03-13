<?php
foreach($products as $product){
    $print = false;
    $filter='';
    if(isset($_GET['f'])){
        $filter = $_GET['f'];
        if($filter == ''){
            $print =true;
        }
    } else {
        $print = true;
    }
    if($product['insCategory'] == $filter || $print){
        if($product['imageId'] != null) {
            $image = '<img class ="card-img-top image-index" src="data:'.$product['imgType'].';base64,'.base64_encode($product['imgContent']).'" alt="image" >';
        } else {
            $image = '<img class ="card-img-top image-index" src="data:'.$defaultImage['imgType'].';base64,'.base64_encode($defaultImage['imgContent']).'" alt="image" >';
        }
        echo '
     <div class="col-sm-3">
     <div class="card" style="width: 18rem;">';
        echo $image;
        echo '<div class="card-body">
                    <h5 class="card-title">'.$product['insName'].'</h5>
                    <p class="card-text">'.$product['insDesc'].'</p>
                    <div class="d-flex justify-content-center">
                    <a href="instrument.php?id='.$product['insId'].'" class="btn btn-primary">Details</a>
                    </div>
                </div>
            </div>
            </div>';
    }
}
