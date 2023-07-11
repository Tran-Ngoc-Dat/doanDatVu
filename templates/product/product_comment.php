<div class="comment-page">
    <!-- Write comment -->
    <div class="comment-write mb-4" id="comment-write">
        <div class="card">
            <div class="card-header text-uppercase"><strong>Bình luận của bạn : </strong></div>
            <div class="card-body">
                <?= $flash->getMessages("frontend") ?>
                <form action="" method="POST" name="comment_product">
                    <div class="response-review"></div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="review-content">Viết nhận xét của bạn vào bên dưới:</label>
                                <textarea class="form-control text-sm" name="comment_product" id="question_member" placeholder="Nhận xét của bạn về sản phẩm này *" rows="11"></textarea>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-sm btn-warning text-capitalize py-2 px-3" name="sumbit_comment_product" id="sumbit_comment_product"><strong>Gửi bình luận</strong></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="comment-lists">
        <div class="card">
            <div class="card-header text-uppercase"><strong>Các bình luận khác</strong></div>
            <div class="card-body pt-5 pb-3">
                <?php if (!empty($commentList)) { ?>
                    <?php foreach ($commentList as $v) {
                        $userName = $d->rawQuery("select fullname from #_user where id = ?", array($v['id_user']));
                    ?>
                        <!-- <div class="media-body">
                            <div class="well well-lg" style="border: solid 1px gray;border-radius: 9px;padding: 10px;">
                                <div>
                                    <h6 class="media-heading text-uppercase reviews"> <?= $userName[0]['fullname'] ?> </h6>
                                    <div class="dd"><?= $func->makeDate($v['date_comment']) ?></div>
                                </div>
                                <p class="media-comment">
                                    <?= $v['content'] ?>
                                </p>
                            </div>
                        </div> -->
                        <div class="card-body" style="border: solid 1px gray;border-radius: 9px;height:120px;">
                            <div class="d-flex flex-start align-items-center">

                                <div>
                                    <h6 class="fw-bold text-primary mb-1"><?= $userName[0]['fullname'] ?></h6>
                                    <p class="text-muted small mb-0">
                                        <?= $func->makeDate($v['date_comment']) ?>
                                    </p>
                                </div>
                            </div>

                            <p class="mt-3 mb-4 pb-2">
                                <?= $v['content'] ?>
                            </p>
                        </div>
            </div>
        <?php } ?>
    <?php } ?>

        </div>
    </div>
</div>