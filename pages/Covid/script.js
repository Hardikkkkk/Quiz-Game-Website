let question_count = 0
let count = 0
let correct
const sectionQ = document.querySelector('.quiz')
const asking = document.querySelector('.asking')
const answera = document.querySelector('.a')
const answerb = document.querySelector('.b')
const answerc = document.querySelector('.c')
const answerd = document.querySelector('.d')
const next = document.querySelector('.next')
const score = document.querySelector('.score')
const expo = document.querySelector('.expo')
const start = document.querySelector('.start')
start.addEventListener('click', startQuiz)
start.addEventListener('click', redirect)
start.addEventListener('click', timer)

function timer() {
    
    var sec = 59;
    var timer = setInterval(function () {
        document.getElementById('safeTimerDisplay').innerHTML = 'You will be redirected after ' + '00:' + sec;
        sec--;
        if (sec < 0) {
            clearInterval(timer);
        }
    }, 1000);
}

function redirect() {
    setTimeout(myURL, 59000);
}

function myURL() {
    document.location.href = 'http://127.0.0.1:5500/quizProject.html';
}

function listeners() {

    answera.onclick = () => { reveal(answera) }
    answerb.onclick = () => { reveal(answerb) }
    answerc.onclick = () => { reveal(answerc) }
    answerd.onclick = () => { reveal(answerd) }

}

function reveal(selected) {

    answera.onclick = null
    answerb.onclick = null
    answerc.onclick = null
    answerd.onclick = null
    resetAnim(expo); resetAnim(next)
    expo.classList.remove('hidden')
    next.classList.remove('hidden')
    next.addEventListener('click', nextQuestion)
    answera.classList.add('selected')
    answerb.classList.add('selected')
    answerc.classList.add('selected')
    answerd.classList.add('selected')
    document.querySelectorAll('.alternative').forEach(indice => {
        if (indice.textContent === correct) { indice.classList.add('correct') }
    })
    if (selected.textContent === correct) { count++ } else { console.log(selected.textContent, correct) }

    if (question_count == 10) {
        next.classList.add('hidden')
        next.removeEventListener('click', nextQuestion)
        fscore()
    }
}

function startQuiz() {

    start.removeEventListener('click', startQuiz)
    start.classList.add('hidden')
    answera.classList.remove('hidden')
    answerb.classList.remove('hidden')
    answerc.classList.remove('hidden')
    answerd.classList.remove('hidden')
    nextQuestion()
}

function nextQuestion() {

    expo.classList.add('hidden')
    answera.classList.remove('selected', 'correct')
    answerb.classList.remove('selected', 'correct')
    answerc.classList.remove('selected', 'correct')
    answerd.classList.remove('selected', 'correct')
    next.classList.add('hidden')
    next.removeEventListener('click', nextQuestion)
    document.querySelectorAll('.alternative').forEach(indice => resetAnim(indice, question_count))
    asking.innerHTML = questions[question_count].question
    expo.innerHTML = questions[question_count].expo
    correct = questions[question_count].correct
    let sorted = questions[question_count].alternatives.sort(() => {
        return Math.round(Math.random() * -1)
    })
    answera.innerHTML = sorted[0]
    answerb.innerHTML = sorted[1]
    answerc.innerHTML = sorted[2]
    answerd.innerHTML = sorted[3]
    question_count++
    listeners()

}

function fscore() {
    const performance = (count * 100) / 10
    score.innerHTML = 'You got ' + count + '/10 Questions correct!<br>Your performance is: ' + performance + '%'

    if (performance < 39) {
        score.classList.add('selected')
        score.style.border = '2px solid white'
    }
    else if (performance >= 40 && performance <= 66) {
        score.style.backgroundColor = '#FFD700'
        score.style.border = '2px solid white'
        score.style.color = 'black'
    }
    else if (performance > 66) { score.classList.add('correct') }

}

function resetAnim(el, index) {
    el.style.animation = "none"
    el.offsetWidth
    el.style.animation = ""

    if (index > 0) { el.style.animationDelay = "0s" }
}