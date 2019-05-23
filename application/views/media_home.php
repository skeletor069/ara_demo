<?php
$images = [];

for($i = 0; $i < 14; $i++){
    $images[] = $all_news[$i%sizeof($all_news)]["images"][0]["image_path"];
}
//print_r($images);
?>


<div class="row page_content pre-scrollable" style="min-height: 400px;height: 400px;">
    <div class="col-md-12 bg-faded p-a-0" id="media_grid" style="height: 100%;">
        <div class="col-md-3 temp_fill_height p-a-0">
            <div class="temp_height_70">

                <div class="temp_block">
                    <div>
                        <img src="<?php echo base_url().$images[0];?>">
                    </div>
                </div>

            </div>
            <div class="temp_height_30">

                <div class="temp_block">
                    <div>
                        <img src="<?php echo base_url().$images[1];?>">
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-3 temp_fill_height p-a-0">
            <div class="col-md-12 temp_height_40 p-a-0">

                <div class="temp_block">
                    <div>
                        <img src="<?php echo base_url().$images[2];?>">
                    </div>
                </div>

            </div>
            <div class="col-md-12 temp_height_60 p-a-0">
                <div class="col-md-5 temp_fill_height p-a-0">
                    <div class="temp_height_66">

                        <div class="temp_block">
                            <div>
                                <img src="<?php echo base_url().$images[3];?>">
                            </div>
                        </div>

                    </div>
                    <div class="temp_height_34">

                        <div class="temp_block">
                            <div>
                                <img src="<?php echo base_url().$images[4];?>">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-7 temp_fill_height p-a-0">
                    <div class="temp_height_34">

                        <div class="temp_block">
                            <div>
                                <img src="<?php echo base_url().$images[5];?>">
                            </div>
                        </div>

                    </div>
                    <div class="temp_height_66">

                        <div class="temp_block">
                            <div>
                                <img src="<?php echo base_url().$images[6];?>">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2 temp_fill_height p-a-0">
            <div class="col-md-12 temp_height_30 p-a-0">

                <div class="temp_block">
                    <div>
                        <img src="<?php echo base_url().$images[7];?>">
                    </div>
                </div>

            </div>
            <div class="col-md-12 temp_height_50 p-a-0">

                <div class="temp_block">
                    <div>
                        <img src="<?php echo base_url().$images[8];?>">
                    </div>
                </div>

            </div>
            <div class="col-md-12 temp_height_20 p-a-0">

                <div class="temp_block">
                    <div>
                        <img src="<?php echo base_url().$images[9];?>">
                    </div>
                </div>

            </div>

        </div>
        <div class="col-md-4 temp_fill_height p-a-0">
            <div class="col-md-12 temp_height_45 p-a-0">

                <div class="temp_block">
                    <div>
                        <img src="<?php echo base_url().$images[10];?>">
                    </div>
                </div>

            </div>
            <div class="col-md-12 temp_height_40 p-a-0">
                <div class="col-md-6 temp_fill_height p-a-0">

                    <div class="temp_block">
                        <div>
                            <img src="<?php echo base_url().$images[11];?>">
                        </div>
                    </div>

                </div>
                <div class="col-md-6 temp_fill_height p-a-0">

                    <div class="temp_block">
                        <div>
                            <img src="<?php echo base_url().$images[12];?>">
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-12 temp_height_15 p-a-0">

                <div class="temp_block">
                    <div>
                        <img src="<?php echo base_url().$images[13];?>">
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
