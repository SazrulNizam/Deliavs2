<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Function to initialize a chart
    function initializeChart(ctx, data, label) {
        return new Chart(ctx, {
            type: "bar",
            data: {
                labels: [
                    "January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                    "August",
                    "September",
                    "October",
                    "November",
                    "December"
                ],
                datasets: [{
                    label: label,
                    data: data,
                    backgroundColor: "rgba(153, 205, 1, 0.6)",
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1,
                        },
                    },
                },
            },
        });
    }

    // Fetch data from PHP (assuming stateChartData is the JSON data from graphstate.php)
    const stateChartData = <?php include('graphstate.php'); ?>;

    // Initialize all charts
    document.addEventListener("DOMContentLoaded", function () {
        const chartElements = document.querySelectorAll("canvas[id^='myChart']");

        chartElements.forEach((chartElement, index) => {
            const ctx = chartElement.getContext("2d");
            const stateName = Object.keys(stateChartData)[index]; // Get state name dynamically
            const attendanceData = Object.values(stateChartData[stateName]); // Get attendance data
            initializeChart(ctx, attendanceData, stateName);
        });
    });

    // jQuery UI Tabs Initialization
    $(function () {
        $("#tabs").tabs();
    });
</script>
