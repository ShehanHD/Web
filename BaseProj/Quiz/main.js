let currentQuiz = 0;
let questions = [];
let correct = 0;
let wrong = 0;
let numberOfQuestion = 10;

let submit = document.getElementById("submit");
let quizContainer = document.getElementById("quiz-container");
let q = document.getElementById("question");
let a = document.getElementById("a_text");
let b = document.getElementById("b_text");
let c = document.getElementById("c_text");
let d = document.getElementById("d_text");
let answers_count = document.getElementById("answers");
let correct_count = document.getElementById("correct");
let wrong_count = document.getElementById("wrong");

let getData = async () => {
    let data = await fetch('https://opentdb.com/api.php?amount=' + numberOfQuestion + '&category=9');
    let response = await data.json();
    questions = response.results;
}

const printQuestion = () => {
    console.log(questions)
    let answers = [...questions[currentQuiz].incorrect_answers, questions[currentQuiz].correct_answer]
    let list = [a, b, c, d];

    answers.sort(() => Math.random() - 0.5)

    q.innerHTML = questions[currentQuiz].question;

    a.innerHTML = answers[0]
    b.innerHTML = answers[1]
    c.innerHTML = answers[2]
    d.innerHTML = answers[3]
}

submit.addEventListener("click", (e) => {
    if (currentQuiz !== 0) {
        let answer;

        document.getElementsByName("answer").forEach(e => {
            if (e.checked) {
                answer = e.nextElementSibling.innerHTML;
                e.checked = false;
            }
        })

        if (answer !== undefined) {
            if (answer == questions[currentQuiz - 1].correct_answer) {
                correct++;
                quizContainer.classList.toggle("ok", true);
                correct_count.innerHTML = correct;
            }
            else {
                wrong++;
                quizContainer.classList.toggle("no", true);
                wrong_count.innerHTML = wrong;
            }
            printQuestion();
            currentQuiz++;
        }
        else {
            alert("select an answer")
        }
    }
    else {
        printQuestion();
        submit.innerHTML = "Submit Answer";
        currentQuiz++;

        answers_count.innerHTML = currentQuiz - 1 + "/" + numberOfQuestion;
    }
})

questions.length === 0 && getData() && (answers_count.innerHTML = (currentQuiz) + "/" + numberOfQuestion);