<div class="bg-gray-100 p-4">
    <div class="bg-white rounded-lg shadow-md p-4">
        <h2 class="text-xl font-semibold mb-2 text-center">Customer Count</h2>
        <div class="flex justify-center">
            <canvas id="customerChart" class="w-full md:w-1/2"></canvas>
        </div>
    </div>
    <div class="bg-white rounded-lg shadow-md p-4 mt-4">
        <h2 class="text-xl font-semibold mb-2 text-center">Revenue Generated</h2>
        <div class="flex justify-center">
            <canvas id="revenueChart" class="w-full md:w-1/2"></canvas>
        </div>
    </div>
</div>

<script>
    // Revenue Chart
    const revenueCtx = document.getElementById('revenueChart').getContext('2d');
    const revenueChart = new Chart(revenueCtx, {
        type: 'line',
        data: {
            labels: @json($labels),
            datasets: [{
                label: 'Revenue',
                data: @json($revenue),
                backgroundColor: 'rgba(99,161,255,0.2)',
                borderColor: 'rgb(13,112,239)',
                borderWidth: 1,
                tension: 0.1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value, index, values) {
                            return 'LKR ' + value;
                        }
                    }
                }
            }
        }
    });

    // Customer Chart
    const customerCtx = document.getElementById('customerChart').getContext('2d');
    const customerChart = new Chart(customerCtx, {
        type: 'bar',
        data: {
            labels: @json($customerLabels),
            datasets: [{
                label: 'Customers',
                data: @json($customerCount),
                backgroundColor: 'rgba(255,99,132,0.2)',
                borderColor: 'rgb(255,99,132)',
                borderWidth: 1,
                tension: 0.1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
