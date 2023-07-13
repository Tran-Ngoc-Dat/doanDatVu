<!-- Main content -->
<section class="content mb-3">
    <div class="container-fluid">
        <h5 class="pt-3 pb-2">Dashboard</h5>
        
    </div>
</section>

<section class="content pb-4">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Thống kê truy cập tháng <?=$month?>/<?=$year?></h5>
            </div>
            <div class="card-body">
                <form class="form-filter-charts row align-items-center mb-1" action="index.php" method="get"
                    name="form-thongke" accept-charset="utf-8">
                    <div class="col-md-4">
                        <div class="form-group">
                            <select class="form-control select2" name="month" id="month">
                                <option value="">Chọn tháng</option>
                                <?php for($i=1; $i<=12 ;$i++) { ?>
                                <?php
                                    if(isset($_GET['year'])) $selected = ($i==$_GET['month']) ? 'selected':'';
                                    else $selected = ($i==date('m')) ? 'selected':'';
                                ?>
                                <option value="<?=$i?>" <?=$selected?>>Tháng <?=$i?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <select class="form-control select2" name="year" id="year">
                                <option value="">Chọn năm</option>
                                <?php for($i=2000;$i<=date('Y')+20;$i++) { ?>
                                <?php
                                    if(isset($_GET['year'])) $selected = ($i==$_GET['year']) ? 'selected':'';
                                    else $selected = ($i==date('Y')) ? 'selected':'';
                                ?>
                                <option value="<?=$i?>" <?=$selected?>>Năm <?=$i?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group"><button type="submit" class="btn btn-success">Thống Kê</button></div>
                    </div>
                </form>
                <div id="apexMixedChart"></div>
            </div>
        </div>
    </div>
</section>