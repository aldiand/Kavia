<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
    <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active" ><a href="#overview" data-toggle="tab">Ringkasan</a></li>
                <li><a href="#history" data-toggle="tab">Riwayat</a></li>
            </ul>
            <div class="tab-content">
                <div class="active tab-pane" id="overview">
                    <div class="row">
                        <div class="col-md-10">
                            <canvas id="grafik-bahan"></canvas>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="history">
                    <div class="row">
                        <div class="col-md-10">
                        ...
                        </div>
                    </div>
                </div>
            </div>

    <div>
</div>


<script>

        window.chartColors = {
            red: 'rgb(255, 99, 132)',
            orange: 'rgb(255, 159, 64)',
            yellow: 'rgb(255, 205, 86)',
            green: 'rgb(75, 192, 192)',
            blue: 'rgb(54, 162, 235)',
            purple: 'rgb(153, 102, 255)',
            grey: 'rgb(201, 203, 207)'
        };
		var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        var config = {
			type: 'line',
			data: {
				labels: this.MONTH,
				datasets: [{
					label: 'Bahan Masuk',
					backgroundColor: 'rgb(255, 99, 132)',
					borderColor: 'rgb(255, 99, 132)',
					data: [
						10,
						10,
						10,
						10,
						10,
						10,
						10,
						10,
						10,
						10,
						10,
						10
					],
					fill: false,
				}, {
					label: 'My Second dataset',
					fill: false,
					backgroundColor: 'rgb(54, 162, 235)',
					borderColor: 'rgb(54, 162, 235)',
					data: [
						10,
						10,
						10,
						10,
						10,
						10,
						10,
						20,
						10,
						10,
						10,
						10
					],
				}]
			},
			options: {
				responsive: true,
				title: {
					display: true,
					text: 'Chart.js Line Chart'
				},
				tooltips: {
					mode: 'index',
					intersect: false,
				},
				hover: {
					mode: 'nearest',
					intersect: true
				},
				scales: {
					xAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Month'
						}
					}],
					yAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Value'
						}
					}]
				}
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('grafik-bahan').getContext('2d');
			window.myLine = new Chart(ctx, config);
		};
</script>