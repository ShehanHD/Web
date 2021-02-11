let currentQuiz = 0;
let questions = [];
let submit = document.getElementById("submit");
let q = document.getElementById("question");
let a = document.getElementById("a_text");
let b = document.getElementById("b_text");
let c = document.getElementById("c_text");
let d = document.getElementById("d_text");

let getData = async () => {
    let data = await fetch('https://opentdb.com/api.php?amount=50&category=9');
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
    console.log(e.target.value)

    printQuestion();
    submit.innerHTML = "Submit Answer";
    currentQuiz++;
})

questions.length === 0 && getData();