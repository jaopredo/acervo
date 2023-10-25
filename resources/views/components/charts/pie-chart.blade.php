<canvas id="{{$id}}" class="!h-full !w-auto m-auto" role="img">
</canvas>

@pushOnce('scripts')
<script>
    xValues = {{Js::from(array_map(function($value) {
        return $value['name'];
    }, $values))}}
    yValues = {{Js::from(array_map(function($value) {
        return $value['count'];
    }, $values))}};

    barColors = ["#279D85", "#091F3C","#65fadc","#576f8d","#096452", "#0e2e2a", "#114380", "#94a3a0"];

    ctx = document.getElementById("{{$id}}");
    new Chart(ctx, {
        type: "pie",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
    });
</script>
@endPushOnce
