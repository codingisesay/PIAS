window.onload = function() {
    fetchCourseTests();
};

function fetchCourseTests() {
    fetch('fetchCourseTests.php')
        .then(response => response.json())
        .then(data => {
            populateCourseTestsList(data);
        })
        .catch(error => console.error('Error fetching course tests:', error));
}

function populateCourseTestsList(tests) {
    const courseTestsList = document.getElementById('course-tests-list');
    courseTestsList.innerHTML = '';

    tests.forEach(test => {
        const testItem = document.createElement('div');
        testItem.className = 'test-item';

        const testName = document.createElement('h3');
        testName.textContent = test.TestPaperLocalName;

        const courseName = document.createElement('p');
        courseName.className = 'course-name';
        courseName.textContent = `Course: ${test.CourseName}`;

        testItem.appendChild(testName);
        testItem.appendChild(courseName);

        courseTestsList.appendChild(testItem);
    });
}
