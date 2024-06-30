<script>
$(document).ready(function() {
    var selectedCourses = {}; // Object to store selected courses for each category

    // Event listener for course selection change
    $('.course-select').change(function() {
        var categoryId = $(this).data('category-id');
        var courseId = $(this).val();
        selectedCourses[categoryId] = courseId; // Store the selected course for this category
        updateTableVisibility(categoryId, courseId); // Update the table rows visibility for the selected category
    });

    // Function to update table rows visibility based on selected course
    function updateTableVisibility(categoryId, courseId) {
        $('#example-' + categoryId + ' tbody tr').each(function() {
            var courseTd = $(this).find('td:eq(5)'); 
            if (courseTd.text() === courseId || courseId === '') {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
        if (courseId !== '') {
            $('#example-' + categoryId + ' .action-column').css('display', 'table-cell');
        } else {
            $('#example-' + categoryId + ' .action-column').hide();
        }
    }

    // Initialize DataTables for each category's table
    $('.course-table').each(function() {
        var categoryId = $(this).data('category-id');
        $(this).DataTable();
    });

    // Show action columns if a specific course is already selected on page load
    $('.course-select').each(function() {
        var initialSelectedCourse = $(this).val();
        var categoryId = $(this).data('category-id');
        selectedCourses[categoryId] = initialSelectedCourse; // Store the selected course for this category
        updateTableVisibility(categoryId, initialSelectedCourse);
    });

    // Restore selected courses when page loads or is refreshed
    Object.keys(selectedCourses).forEach(function(categoryId) {
        $('#course-' + categoryId).val(selectedCourses[categoryId]);
    });
});


</script>