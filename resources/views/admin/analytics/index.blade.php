<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Analytics Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-10">
        <!-- Revenue Chart -->
        <div class="bg-white border rounded shadow p-4">
            <canvas id="revenueChart"></canvas>
        </div>

        <!-- User Chart -->
        <div class="bg-white border rounded shadow p-4">
            <canvas id="userChart"></canvas>
        </div>
    </div>
</x-app-layout>

@push('scripts')
    <script>
        const fetchData = async () => {
            // Fetch data using Livewire
            const response = await Livewire.emit('fetchData');
            if (response) {
                // Render your charts using the fetched data
                if (response.revenueData && response.revenueData.length > 0) {
                    renderRevenueChart(response.revenueData);
                }
                if (response.usersData && response.usersData.length > 0) {
                    renderUserChart(response.usersData);
                }
            }
        };

        function renderRevenueChart(data) {
            const ctx = document.getElementById('revenueChart').getContext('2d');
            const chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: data.map(entry => entry.month),
                    datasets: [{
                        label: 'Revenue',
                        data: data.map(entry => entry.revenue),
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1,
                        tension: 0.1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function (value) {
                                    return 'LKR ' + value;
                                }
                            }
                        }
                    }
                }
            });
        }

        function renderUserChart(data) {
            const ctx = document.getElementById('userChart').getContext('2d');
            const chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: data.map(entry => entry.month),
                    datasets: [{
                        label: 'Users',
                        data: data.map(entry => entry.users),
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
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
        }

        document.addEventListener('livewire:load', function () {
            // Initialize Alpine.js
            Alpine.start();
            // Fetch data on page load
            fetchData();
        });
    </script>
@endpush
