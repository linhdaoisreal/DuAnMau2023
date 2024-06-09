@extends ('layouts.master')

@section('title')
Dashboard
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page_title_box d-flex align-items-center justify-content-between">
            <div class="page_title_left">
                <h3 class="f_s_30 f_w_700 text_white">Dashboard</h3>
                <ol class="breadcrumb page_bradcam mb-0">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Salessa </a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item active">Sales</li>
                </ol>
            </div>
            <a href="#" class="white_btn3">Create Report</a>
        </div>
    </div>
</div>

<div class="row ">
    <div class="col-lg-12 card_height_100 mb_20">
        <div class="white_card">
            <div class="white_card_body p-0">
                <div class="card_container">
                    <canvas id="myChart" style="width:100%"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    @php
        $data = array();

        foreach ($analysPost as $analys) {
            $data[] = array(
                'label' => $analys['name'], // Tên danh mục sản phẩm
                'value' => $analys['analys_post'], // Doanh thu
                'color' => sprintf('#%06X', mt_rand(0, 0xFFFFFF))
            );
        }
    @endphp

var xValues =   <?php echo json_encode(array_column($data, 'label')); ?>;
var yValues =   <?php echo json_encode(array_column($data, 'value')); ?>;
var barColors = <?php echo json_encode(array_column($data, 'color')); ?>;

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Statistics of articles by category"
    }
  }
});
</script>
@endsection