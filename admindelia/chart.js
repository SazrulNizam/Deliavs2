$(document).ready(function () {
    var categoryData = JSON.parse(document.getElementById('categoryData').textContent);

    Object.keys(categoryData).forEach(function (categoryName) {
        var monthlyData = categoryData[categoryName];

        Object.keys(monthlyData).forEach(function (month) {
            var attendanceData = monthlyData[month];
            var ctx = document.getElementById('attendanceChart-' + categoryName + '-' + month).getContext('2d');

            var labels = attendanceData.map(function (data) {
                return data.student_name;
            });

            var data = attendanceData.map(function (data) {
                return data.attendance_percentage;
            });

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Attendance Percentage',
                        data: data,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
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
        });
    });
});
