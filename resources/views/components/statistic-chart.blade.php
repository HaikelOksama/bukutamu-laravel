@props(['chartData', 'chartLabel'])
<div>
    <canvas id="dataTamu"></canvas>

    <x-slot:chartJs>
        <script>

            var ctx = document.getElementById('dataTamu').getContext('2d');
            var dataTamu = new Chart(ctx, {
                type: 'line',
                data:
                {
                    labels: [
                        @foreach ($chartLabel as $label)
                        '{{$label}}',
                        @endforeach
                    ],
                    datasets: [{
                        label: 'Tamu',
                        data: [
                            @foreach ($chartData as $data)
                            {{$data->total}},
                            @endforeach
                        ],
                        backgroundColor: [
                            
                            "rgba( 173, 231, 255, 1)",
                        ]
                    }]
                },
                options: {
                    animations: {
                        tension: {
                            duration: 10000,
                            easing: 'linear',
                            from: 1,
                            to: 0,
                            loop: true
                        }
                    },
                    hoverRadius: 12,
                    fill: true,
                    borderColor: 'rgb(75, 192, 192)',
                    hoverBackgroundColor: 'rgb(75, 192, 192)',
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });

            window.livewire.on('updateChart', () => {
                console.log('Chart is updated')
                dataTamu.data.labels = []
                dataTamu.data.datasets[0].data = [];
                dataTamu.data.datasets[0].backgroundColor = [];
                
                @foreach ($chartLabel as $label)
                dataTamu.data.labels.push("{{$label}}");
                @endforeach

                @foreach ($chartData as $data)
                dataTamu.data.datasets[0].data.push({{ $data->total }});
                @endforeach

                dataTamu.data.datasets[0].backgroundColor.push('rgba(54, 162, 235, 0.2)');
                dataTamu.update();
            })
        </script>       
        <script>
         
        </script>
    </x-slot:chartJs>
</div>
