function showContent(contentId) {
    // Hide all content areas
    var contentAreas = document.querySelectorAll('.content');
    contentAreas.forEach(function (element) {
        element.style.display = 'none';
    });

    // Show the selected content area
    var selectedContent = document.getElementById(contentId);
    selectedContent.style.display = 'block';
}