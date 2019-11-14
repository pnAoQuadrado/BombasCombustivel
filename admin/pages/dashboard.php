<?php

    include '../../model/daoStandard.php';

    $ob = new daoStandard();
    $a = $ob->qtdAuto();
    $p = $ob->qtdProp();

?>

<section class="wrapper">
  <br>
  <br>
<div class="row">
              <!--  TODO PANEL -->
              <div class="col-lg-4 col-md-4 col-sm-4 mb">
                <div class="content-panel pn">
                  <div id="profile-01">
                    <div class="user">
                      <!--<img src="img/friends/fr-06.jpg" class="img-circle" width="80">-->
                    </div>
                  </div>
                </div>
                <!-- /panel -->
              </div>
              <!-- /col-md-4 -->
              <!--  PROFILE 01 PANEL -->
              <div class="col-lg-4 col-md-4 col-sm-4 mb">
                <div class="content-panel pn">
                  <div id="profile-02">
                    <div class="user">
                      <!--<img src="img/friends/fr-06.jpg" class="img-circle" width="80">-->
                    </div>
                  </div>
                </div>
                <!-- /panel -->
              </div>
              <!-- /col-md-4 -->
              <!--  PROFILE 02 PANEL -->
              <div class="col-lg-4 col-md-4 col-sm-4 mb">
                <div class="content-panel pn">
                  <div id="profile-03">
                    <div class="user">
                      <!--<img src="img/friends/fr-06.jpg" class="img-circle" width="80">-->
                    </div>
                  </div>
                </div>
                <!-- /panel -->
              </div>
              <!--/ col-md-4 -->
            </div>
        <!-- /row -->
      </section>