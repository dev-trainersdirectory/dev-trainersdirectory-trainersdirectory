<div class="input-group-btn">
    <div class="btn-group" role="group">
        <div class="dropdown dropdown-lg">
            <button type="button" class="btn btn-default dropdown-toggle btn-category" data-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-angle-down"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right card" role="menu">
                <!-- drop down tab form-->
                <form class="form-horizontal" role="form">
                    <ul class="nav nav-tabs" role="tablist">
                    <?php foreach( $arrstrParentTrCategories as $strParentTrCategory ) { ?>
                        <li role="presentation">
                            <a data-toggle="pill" href="#menu<?=$strParentTrCategory->getId()?>"><?=$strParentTrCategory->getName()?>
                            </a>
                        </li>
                    <?php } ?>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content clearfix">
                      <?php foreach( $arrstrParentTrCategories as $strParentTrCategory ) { ?>
                        <div role="tabpanel" class="tab-pane clearfix" id="menu<?=$strParentTrCategory->getId()?>">
                          <?php foreach( $arrstrSubTrCategories as $strSubTrCategory ) { ?>
                          <?php if($strParentTrCategory->getId() == $strSubTrCategory->getParentTrCategoryId()){ ?>
                            <div class="sub-category-box">
                                <p class="sub-category-title"><?=$strSubTrCategory->getName()?></p>
                                <div class="sub-category">
                                   <ul>
                                    <?php foreach( $arrstrTrSubjects as $strTrSubject ) { ?>
                                      <?php if($strSubTrCategory->getId() == $strTrSubject->getTrCategoryId()){ ?>
                                      
                                      <li>
                                        <a href="<?=base_url()?>search/searchTrainer/<?=$strTrSubject->getId()?>/1">
                                          <?=$strTrSubject->getName()?>
                                        </a>
                                      </li>
                                      
                                      <?php } ?>
                                    <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <?php } ?>
                            <?php } ?>
                        </div>
                      <?php } ?>
                    </div>
                    <!--tab container end-->
                </form>
                <!-- / drop down tab form-->
            </div>
        </div>
        <!--search by city-->
        <div class="form-group col-md-2 search-by-city">
            <div class="dropdown dropdown-md">
                <!--search by city button-->
                <button type="button" class="btn btn-green btn-city dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-map-marker"></i>
                </button>
                <!-- / search by city button-->
                <!--search by city container-->
                <div class="dropdown-menu dropdown-menu-right search-by-city-container material" role="menu">

                    <form>
                        <div class="form-group clearfix col-sm-12 padding-0">
                            <label for="input" class="control-label font-10 font-blue">Enter Your City</label>
                            <input type="text" class="form-control" required="required" placeholder="Enter Your City" />
                        </div>
                    </form>
                    <div class="note-box clearfix">
                        <p><span class="font-dark">Example : </span>Mumbai, Pune, Bangalore, Delhi,Chennai, Kolkata, Hyderabad etc.</p>
                    </div>
                </div>
                <!-- / search by city container-->
            </div>
        </div>
        <!-- / search by city-->
    </div>
</div>