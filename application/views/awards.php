<div class="row page_content">
    <div class="col-md-12 m-b-2">
        <h4>Award</h4>
    </div>
    <div class="col-md-6 pre-scrollable" style="max-height: 370px;">
    <?php
    foreach($awards as $year=>$awardList){
        ?>

        <div class="m-b-2">
            <?php echo $year;?>
        </div>

        <?php

        foreach ($awardList as $single){
            ?>

            <div class="m-b-1">
                <?php
                    $html_text = $single["date"] ." ". $single["name"];
                    if($single["location"] != "")
                        $html_text.= "<br/>".$single["location"];
                    if($single["description"] != "")
                        $html_text.= "<br/>".$single["description"];

                    echo $html_text;
                ?>

            </div>


            <?php
        }

        echo '<br/>';

    }
    ?>
    </div>
</div>

<script>
    $(document).ready(function (e) {
        $("#menuaward").css("color", "#000");
        $("#menuaward").css("font-weight", "bold");
    })
</script>