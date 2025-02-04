window.onload = function() {
    var timer = document.getElementById('timer');
    var time = 59 * 60; // 59 minutes

    setInterval(function() {
        var minutes = Math.floor(time / 60);
        var seconds = time % 60;

        seconds = seconds < 10 ? '0' + seconds : seconds;

        timer.textContent = minutes + ":" + seconds;

        time--;

        if (time < 0) {
            clearInterval(timer);
            alert("Time is up!");
            document.getElementById('mcqForm').submit();
        }
    }, 1000);

    // Load questions
    fetchQuestions();

    // Add event listeners for navigation buttons
    document.getElementById('prev-btn').addEventListener('click', showPrevQuestion);
    document.getElementById('next-btn').addEventListener('click', showNextQuestion);
    document.getElementById('mcqForm').addEventListener('submit', handleSubmit);
};

let currentQuestionIndex = 0;
let questions = [];
let userAnswers = {};

function fetchQuestions() {
    fetch('../testSeries/questions.php')
        .then(response => response.json())
        .then(data => {
            questions = data;
            populateQuestionsList();
            displayQuestion(0);
        })
        .catch(error => console.error('Error fetching questions:', error));
}

function populateQuestionsList() {
    const questionsList = document.getElementById('questions-list');
    questions.forEach((question, index) => {
        const questionItem = document.createElement('div');
        questionItem.className = 'question-item';
        questionItem.textContent = (index + 1) + '. ' + question.ObjQuestionText.substring(0, 30) + '...';
        questionItem.onclick = () => displayQuestion(index);
        questionsList.appendChild(questionItem);
    });
}

function displayQuestion(index) {
    currentQuestionIndex = index;
    const questionContainer = document.getElementById('question-container');
    questionContainer.innerHTML = '';

    const question = questions[index];
    const questionElement = document.createElement('div');
    questionElement.className = 'question';

    const questionText = document.createElement('p');
    questionText.textContent = question.ObjQuestionText;
    questionElement.appendChild(questionText);

    const options = ['A', 'B', 'C', 'D'];
    options.forEach(option => {
        const label = document.createElement('label');
        const checked = userAnswers[question.ObjectiveQuestionId] === option ? 'checked' : '';
        label.innerHTML = `<input type="radio" name="question${question.ObjectiveQuestionId}" value="${option}" ${checked}> ${question['Option_' + option]}`;
        label.addEventListener('change', () => {
            userAnswers[question.ObjectiveQuestionId] = option;
        });
        questionElement.appendChild(label);
        questionElement.appendChild(document.createElement('br'));
    });

    questionContainer.appendChild(questionElement);
}

function showPrevQuestion() {
    if (currentQuestionIndex > 0) {
        displayQuestion(currentQuestionIndex - 1);
    }
}

function showNextQuestion() {
    if (currentQuestionIndex < questions.length - 1) {
        displayQuestion(currentQuestionIndex + 1);
    }
}


function handleSubmit(event) {
	alert('form is submiting');
    const form = document.getElementById('mcqForm');
    Object.keys(userAnswers).forEach(questionId => {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = `question${questionId}`;
        input.value = userAnswers[questionId];
        form.appendChild(input);
    });
}
