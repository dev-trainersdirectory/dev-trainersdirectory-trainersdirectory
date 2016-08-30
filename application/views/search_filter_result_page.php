<div class="input-group-btn">
    <div class="btn-group" role="group">
        <div class="dropdown dropdown-lg">
            <button type="button" class="btn btn-default dropdown-toggle btn-header-category" data-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-chevron-down"></i>
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
                    <div class="tab-content clearfix" style="width:800px;">
                      <?php foreach( $arrstrParentTrCategories as $strParentTrCategory ) { ?>
                        <div role="tabpanel" class="tab-pane clearfix" id="menu<?=$strParentTrCategory->getId()?>">
                          <?php foreach( $arrstrSubTrCategories as $strSubTrCategory ) { ?>
                          <?php if($strParentTrCategory->getId() == $strSubTrCategory->getParentTrCategoryId()){ ?>
                            <div class="sub-category-box">
                                <p class="sub-category-title"><?=$strSubTrCategory->getName()?></p>
                                <div class="sub-category">
                                   
                                    <?php $i=0; foreach( $arrstrTrSubjects as $strTrSubject ) { ?>
                                      <?php if($strSubTrCategory->getId() == $strTrSubject->getTrCategoryId()){ ?>
                                      <?php if( $i%3 == 0 ) echo '<ul>'; ?>
                                      <li>
                                        <a href="<?=base_url()?>search/searchTrainer/<?=$strTrSubject->getId()?>/1">
                                          <?=$strTrSubject->getName()?>
                                        </a>
                                      </li>
                                      <?php if( $i%3 == 1 ) echo '</ul>'; ?>
                                      <?php } ?>
                                    <?php } ?>
                                    
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
    </div>
</div>
<!-- / search by catergory -->