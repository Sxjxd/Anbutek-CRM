<div>
    <!-- Total Revenue -->
    <div class="bg-white border rounded shadow p-4" x-data="{ renderChart: true }" x-init="() => fetchData()">
        <canvas id="revenueChart"></canvas>
    </div>

    <!-- Total Users -->
    <div class="bg-white border rounded shadow p-4" x-data="{ renderChart: false }" x-init="() => fetchData()">
        <canvas id="usersChart"></canvas>
    </div>

    <!-- Total Orders -->
    <div class="bg-white border rounded shadow p-4" x-data="{ renderChart: false }" x-init="() => fetchData()">
        <canvas id="ordersChart"></canvas>
    </div>
</div>
