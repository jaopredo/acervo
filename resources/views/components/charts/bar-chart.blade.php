<canvas id="{{$id}}" class="!h-auto !w-full m-auto" role="img">
</canvas>

@pushOnce('scripts')
    <script>
        labels = {{Js::from(array_map(function($value) {
            return $value['name'];
        }, $values))}}
        values = {{Js::from(array_map(function($value) {
            return $value['count'];
        }, $values))}};

        ctx = document.getElementById("{{$id}}");
        new Chart(ctx, {
            type: "bar",
            data: {
                labels,
                datasets: [{
                    backgroundColor: barColors,
                    data: values
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    </script>
@endPushOnce