<?php if (isset($divisions) && is_array($divisions)): ?>
    <div class="team">
        <?php foreach ($divisions as $division): ?>
            <div class="team__division">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2 class="heading-red"><?= $division['division_name'] ?></h2>
                        </div>

<!--                        --><?php //$firstMember = array_shift($division['team_members']) ?>
<!--                        <div class="col-md-12 text-center purple">-->
<!--                            --><?//= View::make('about/team-member', ['member' => <!-- $firstMember, 'class' => 'purple']) ?>-->
<!--                        </div>-->

                        <?php $i = 0; ?>
                        <?php foreach ($division['team_members'] as $member): ?>
                            <?php
                            $class = '';
                            if ($i == 0 || $i % 4 == 0) {
//                                $class = 'red col-md-offset-2';
                                $class = 'black col-md-offset-2';
//                            } elseif ($i % 2 == 0) {
//                                $class = 'green';
                            } else {
                                $class = 'black';
                            }
                            ?>
                            <div class="col-md-2 col-sm-4 <?= $class ?>">
                                <?= View::make('about/team-member', ['member' => $member, 'class' => $class]) ?>
                            </div>
                            <?php $i++; ?>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="modal fade team__modal" tabindex="-1" role="dialog">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="modal-dialog" role="document">
                        <a href="#" class="team__modal__close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"></span>
                        </a>
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="col-md-4">
                                    <div class="team__modal__member text-center">
                                        <img src="" alt="" class="img-responsive">
                                        <div class="wrapper">
                                            <p class="team__modal__name"></p>
                                            <p class="team__modal__occupation"></p>
                                            <p class="team__modal__phone hidden"><i class="fa fa-phone"></i><span></span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <p class="team__modal__header"></p>
                                    <p class="team__modal__content"></p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>