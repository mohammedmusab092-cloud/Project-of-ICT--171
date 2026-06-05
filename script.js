// ------------------------------
// Daily Motivation Generator
// ------------------------------
const quotes = [
  "Small progress every day leads to big results.",
  "Your body can stand almost anything. It is your mind you have to convince.",
  "Push yourself because no one else is going to do it for you.",
  "Fitness is not about being better than someone else. It is about being better than you used to be.",
  "Discipline is the bridge between goals and results."
];

function generateQuote() {
  const randomIndex = Math.floor(Math.random() * quotes.length);
  document.getElementById("quote").innerText = quotes[randomIndex];
}

// ------------------------------
// BMI Calculator
// ------------------------------
function calculateBMI() {
  const height = parseFloat(document.getElementById("height").value);
  const weight = parseFloat(document.getElementById("weight").value);
  const result = document.getElementById("bmiResult");

  if (!height || !weight || height <= 0 || weight <= 0) {
    result.innerText = "Please enter valid height and weight.";
    return;
  }

  const heightInMeters = height / 100;
  const bmi = weight / (heightInMeters * heightInMeters);

  let category = "";

  if (bmi < 18.5) {
    category = "Underweight";
  } else if (bmi < 25) {
    category = "Normal weight";
  } else if (bmi < 30) {
    category = "Overweight";
  } else {
    category = "Obese";
  }

  result.innerText = `Your BMI is ${bmi.toFixed(1)} - ${category}`;
}

// ------------------------------
// Water Intake Tracker
// Goal: 3000 ml per day
// Data saved using localStorage
// ------------------------------
let waterAmount = Number(localStorage.getItem("waterAmount")) || 0;
const waterGoal = 3000;

function updateWaterDisplay() {
  const percentage = Math.min((waterAmount / waterGoal) * 100, 100);
  document.getElementById("waterProgress").style.width = percentage + "%";
  document.getElementById("waterText").innerText =
    `${waterAmount} ml / ${waterGoal} ml completed`;
}

function addWater() {
  const input = Number(document.getElementById("waterInput").value);

  if (!input || input <= 0) {
    alert("Please enter a valid water amount.");
    return;
  }

  waterAmount += input;
  localStorage.setItem("waterAmount", waterAmount);
  document.getElementById("waterInput").value = "";
  updateWaterDisplay();
}

function resetWater() {
  waterAmount = 0;
  localStorage.setItem("waterAmount", waterAmount);
  updateWaterDisplay();
}

// ------------------------------
// Workout Log
// Data saved using localStorage
// ------------------------------
let workouts = JSON.parse(localStorage.getItem("workouts")) || [];

function displayWorkouts() {
  const list = document.getElementById("workoutList");
  list.innerHTML = "";

  workouts.forEach((workout, index) => {
    const li = document.createElement("li");

    li.innerHTML = `
      <span>${workout.exercise} - ${workout.sets} sets x ${workout.reps} reps</span>
      <button class="delete-btn" onclick="deleteWorkout(${index})">Delete</button>
    `;

    list.appendChild(li);
  });
}

function addWorkout() {
  const exercise = document.getElementById("exercise").value.trim();
  const sets = document.getElementById("sets").value;
  const reps = document.getElementById("reps").value;

  if (!exercise || !sets || !reps) {
    alert("Please enter exercise name, sets, and reps.");
    return;
  }

  workouts.push({
    exercise,
    sets,
    reps
  });

  localStorage.setItem("workouts", JSON.stringify(workouts));

  document.getElementById("exercise").value = "";
  document.getElementById("sets").value = "";
  document.getElementById("reps").value = "";

  displayWorkouts();
}

function deleteWorkout(index) {
  workouts.splice(index, 1);
  localStorage.setItem("workouts", JSON.stringify(workouts));
  displayWorkouts();
}

// ------------------------------
// Daily Step Tracker
// Goal: 10,000 steps per day
// Data saved using localStorage
// ------------------------------
let steps = Number(localStorage.getItem("steps")) || 0;
const stepGoal = 10000;

function updateStepDisplay() {
  const percentage = Math.min((steps / stepGoal) * 100, 100);
  document.getElementById("stepProgress").style.width = percentage + "%";
  document.getElementById("stepText").innerText =
    `${steps} steps / ${stepGoal} steps completed`;
}

function addSteps() {
  const input = Number(document.getElementById("stepInput").value);

  if (!input || input < 0) {
    alert("Please enter valid steps.");
    return;
  }

  steps = input;
  localStorage.setItem("steps", steps);
  document.getElementById("stepInput").value = "";
  updateStepDisplay();
}

function resetSteps() {
  steps = 0;
  localStorage.setItem("steps", steps);
  updateStepDisplay();
}

// ------------------------------
// Load saved data when page opens
// ------------------------------
updateWaterDisplay();
updateStepDisplay();
displayWorkouts();
