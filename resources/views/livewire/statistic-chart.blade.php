<div>
    <canvas id="dataTamu"></canvas>
    
    <x-slot:chartJs>
        <script>
            var ctx = document.getElementById('dataTamu').getContext('2d');
            var dataTamu = new Chart(ctx, {
                type: 'bar',
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
                        backgroundColor: []
                    }]
                },
                options: {
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
