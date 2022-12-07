<?php build('content') ?>
    <div class="row">
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                        <h6 class="card-title mb-0">Total Booked Events</h6>
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-12 col-xl-5">
                            <h3 class="mb-2"><?php echo $event['total']?></h3>
                            <div class="d-flex align-items-baseline">
                                <span class="text-success">Overall</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                        <h6 class="card-title mb-0">Total Earnings</h6>
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-12 col-xl-5">
                            <h3 class="mb-2"><?php echo $event['totalEarning']?></h3>
                            <div class="d-flex align-items-baseline">
                                <span class="text-success">Overall</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                        <h6 class="card-title mb-0">Total Users</h6>
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-12 col-xl-5">
                            <h3 class="mb-2"><?php echo $totalUser?></h3>
                            <div class="d-flex align-items-baseline">
                                <span class="text-success">Overall</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h1>Summary</h1>
    <div class="row">
        <div class="col-md-6">
            <h4>Event Summary</h4>
            <canvas id="eventSummary"></canvas>
        </div>

        <div class="col-md-6">
            <h4>Package Summary</h4>
            <canvas id="packageSummary"></canvas>
        </div>
    </div>
<?php endbuild()?>

<?php build('scripts') ?>
	<script src="<?php echo _path_tmp('assets/vendors/chartjs/Chart.min.js')?>"></script>
	<!-- End plugin js for this page -->
	<script src="<?php echo _path_tmp('assets/vendors/feather-icons/feather.min.js')?>"></script>
	<script src="<?php echo _path_tmp('assets/js/template.js')?>"></script>

	<script>
		$(document).ready(function() {
            let demoColors = ['#6571ff','#7987a1','#05a34a','#66d1d1'];
            let bgColor = '#6571ff';

            let eventLabels= ["<?php echo implode('","', array_keys($summary['events']))?>"];
            let eventValues = ["<?php echo implode('","', array_values($summary['events']))?>"];

            let packageLabels= ["<?php echo implode('","', array_keys($summary['packages']))?>"];
            let packageValues = ["<?php echo implode('","', array_values($summary['packages']))?>"];

			if($('#eventSummary').length) {
				new Chart($('#eventSummary'), {
					type: 'pie',
					data: {
						labels: eventLabels,
						datasets: [{
							label: "EVENTS",
							backgroundColor: demoColors,
							borderColor: bgColor,
							data:eventValues
						}]
					},
					options: {
						plugins: {
						legend: { 
							display: true,
							labels: {
							color: '#7987a1',
							font: {
								size: '13px',
								family: fontFamily
							}
							}
						},
						},
						aspectRatio: 2,
					}
				});	
			}

            if($('#packageSummary').length) {
                new Chart($("#packageSummary"), {
                type: 'bar',
                data: {
                    labels: packageLabels,
                    datasets: [
                    {
                        label: "Packages",
                        backgroundColor:demoColors,
                        data: packageValues,
                    }
                    ]
                },
                options: {
                    plugins: {
                    legend: { display: false },
                    },
                    scales: {
                    x: {
                        display: true,
                        grid: {
                        display: true,
                        color: colors.gridBorder,
                        borderColor: colors.gridBorder,
                        },
                        ticks: {
                        color: colors.bodyColor,
                        font: {
                            size: 12
                        }
                        }
                    },
                    y: {
                        grid: {
                        display: true,
                        color: colors.gridBorder,
                        borderColor: colors.gridBorder,
                        },
                        ticks: {
                        color: colors.bodyColor,
                        font: {
                            size: 12
                        }
                        }
                    }
                    }
                }
                });
            }
            
		});
	</script>
<?php endbuild()?>

<?php loadTo()?>