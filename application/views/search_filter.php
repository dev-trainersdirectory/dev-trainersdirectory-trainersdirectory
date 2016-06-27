<div class="input-group-btn">
  <div class="btn-group" role="group">
    <div class="dropdown dropdown-lg">
      <button type="button" class="btn btn-default dropdown-toggle btn-category" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>
      <div class="dropdown-menu dropdown-menu-right" role="menu">
        <!-- drop down tab form-->
        <form class="form-horizontal" role="form">
          <!-- tabs names -->
          <ul class="nav nav-pills">
            <?php foreach( $arrstrParentTrCategories as $strParentTrCategory ) { ?>
              <li>
                <a data-toggle="pill" href="#menu<?=$strParentTrCategory->getId()?>"><?=$strParentTrCategory->getName()?>
                </a></li>
            <?php } ?>
          </ul>
          <!-- / tabs names -->
          <!--tab container-->
          <?php foreach( $arrstrParentTrCategories as $strParentTrCategory ) { ?>
          <div id="menu<?=$strParentTrCategory->getId()?>" class="tab-pane fade">
            <?php foreach( $arrstrSubTrCategories as $strSubTrCategory ) { ?>
            <?php if($strParentTrCategory->getId() == $strSubTrCategory->getParentTrCategoryId()){ ?>
              <div class="sub-category">
                <p><?=$strSubTrCategory->getName()?></p>
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
            <?php } ?>
            <?php } ?>
          </div>
          <?php } ?>
          <!--tab container end-->
        </form>
        <!-- / drop down tab form-->
      </div>
    </div>
  </div>
</div>



