<script>
        var cp = <?php 
        if($connect) {
            echo json_encode($cp);
        } 
        else{
            echo json_encode($cpDefault);
        }
            ?>;
        
        var adress = <?php 
        if($connect) {
            echo json_encode($adress);
        } 
        else{
            echo json_encode($adressDefault);
        }
            ?>;

        var ville = <?php 
        if($connect) {
            echo json_encode($ville);
        } 
        else{
            echo json_encode($villeDefault);
        }
            ?>;
    </script>