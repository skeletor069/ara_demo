<?php

$spans = array(
    array(
        "row" => 2,
        "col" =>1
    ),
    array(
        "row" => 1,
        "col" =>1
    ),
    array(
        "row" => 1,
        "col" =>1
    ),
    array(
        "row" => 1,
        "col" =>2
    ),
    array(
        "row" => 1,
        "col" =>1
    ),
    array(
        "row" => 1,
        "col" =>1
    )
);
$indices = [];
for($i = 0 ; $i < sizeof($all_news); $i++){
    $indices[] = $i % sizeof($spans);
}
shuffle($indices);

?>

<div class="row page_content pre-scrollable" style="min-height: 400px;height: 400px;">
    <div class="grid">
        <?php
        $index = 0;
        foreach ($all_news as $news){?>

            <div class="grid-item" data-colspan="<?php echo $spans[$indices[$index]]["col"];?>" data-rowspan="<?php echo $spans[$indices[$index]]["row"];?>">

                <img src="<?php echo base_url().$news["images"][0]["image_path"];?>">

            </div>

        <?php
            $index++;
        }
        ?>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.grid').responsivegrid({
            column : 6,
            gutter : '10px',
            itemHeight : '100%',
            itemSelector : '.grid-item',
            breakpoints : {
                'desktop' : {
                    'range' : '1200-',
                    'options' : {
                        'column' : 6,
                    }
                },

                'tablet-landscape' : {
                    'range' : '1000-1200',
                    'options' : {
                        'column' : 5,
                    }
                },

                'tablet-portrate' : {
                    'range' : '767-1000',
                    'options' : {
                        'column' : 4,
                    }
                },

                'mobile' : {
                    'range' : '-767',
                    'options' : {
                        'column' : 3,
                    }
                },
            }
        });


    });
</script>