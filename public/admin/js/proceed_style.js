document.querySelectorAll(".timer-container").forEach((container) => {
  const timeDisplay = container.querySelector(".time-display");
  const startButton = container.querySelector(".start");
  const stopButton = container.querySelector(".stop");
  const resetButton = container.querySelector(".reset");

  let startTime;
  let stopTime = 0;
  let timeoutID;

  function displayTime() {
      const currentTime = new Date(Date.now() - startTime + stopTime);
      const m = String(currentTime.getMinutes()).padStart(2, "0");
      const s = String(currentTime.getSeconds()).padStart(2, "0");
      const ms = String(currentTime.getMilliseconds()).padStart(3, "0");

      timeDisplay.textContent = `${m}:${s}.${ms}`;
      timeoutID = setTimeout(displayTime, 10);
  }

  startButton.addEventListener("click", () => {
      startButton.disabled = true;
      stopButton.disabled = false;
      resetButton.disabled = true;
      startTime = Date.now();
      displayTime();
  });

  stopButton.addEventListener("click", function() {
      startButton.disabled = false;
      stopButton.disabled = true;
      resetButton.disabled = false;
      clearTimeout(timeoutID);
      stopTime += Date.now() - startTime;
  });

  resetButton.addEventListener("click", function() {
      startButton.disabled = false;
      stopButton.disabled = true;
      resetButton.disabled = true;
      timeDisplay.textContent = "00:00.000";
      stopTime = 0;
  });
});

document.addEventListener('DOMContentLoaded', () => {
  const myButton = document.getElementById('myButton1');
  const doneButton = document.getElementById('doneButton1');
  const resetButton = document.getElementById('resetButton1');
  let state = 'start'; // Initial state

  myButton.addEventListener('click', () => {

      if (state === 'start') {
          myButton.textContent = 'End';
          myButton.classList.remove('start');
          myButton.classList.add('end');
          doneButton.style.display = 'none'; // Hide the DONE button
          state = 'end';
          sendStatusToServer('Cooking started');
      } else if (state === 'end') {
          myButton.style.display = 'none'; // Hide the Start/End button
          doneButton.style.display = 'inline-block'; // Show the DONE button
          state = 'done';
          sendStatusToServer('Cooking ended');
      }
  });

  resetButton.addEventListener('click', () => {
      myButton.textContent = 'Start';
      myButton.style.display = 'inline-block'; // Show the Start button
      myButton.classList.remove('end');
      myButton.classList.add('start');
      doneButton.style.display = 'none'; // Hide the DONE button
      state = 'start';
      // sendStatusToServer('Cooking reset');
  });
});

document.addEventListener('DOMContentLoaded', () => {
  const myButton = document.getElementById('myButton2');
  const doneButton = document.getElementById('doneButton2');
  const resetButton = document.getElementById('resetButton2');
  let state = 'start'; // Initial state

  myButton.addEventListener('click', () => {
      if (state === 'start') {
          myButton.textContent = 'End';
          myButton.classList.remove('start');
          myButton.classList.add('end');
          doneButton.style.display = 'none'; // Hide the DONE button
          state = 'end';
          sendStatusToServer('Cooking started');
      } else if (state === 'end') {
          myButton.style.display = 'none'; // Hide the Start/End button
          doneButton.style.display = 'inline-block'; // Show the DONE button
          state = 'done';
          sendStatusToServer('Cooking ended');
      }
  });

  resetButton.addEventListener('click', () => {
      myButton.textContent = 'Start';
      myButton.style.display = 'inline-block'; // Show the Start button
      myButton.classList.remove('end');
      myButton.classList.add('start');
      doneButton.style.display = 'none'; // Hide the DONE button
      state = 'start';
      // sendStatusToServer('Cooking reset');
  });
});

document.addEventListener('DOMContentLoaded', () => {
  const myButton = document.getElementById('myButton3');
  const doneButton = document.getElementById('doneButton3');
  const resetButton = document.getElementById('resetButton3');
  let state = 'start'; // Initial state

  myButton.addEventListener('click', () => {
      if (state === 'start') {
          myButton.textContent = 'End';
          myButton.classList.remove('start');
          myButton.classList.add('end');
          doneButton.style.display = 'none'; // Hide the DONE button
          state = 'end';
          sendStatusToServer('Cooking started');
      } else if (state === 'end') {
          myButton.style.display = 'none'; // Hide the Start/End button
          doneButton.style.display = 'inline-block'; // Show the DONE button
          state = 'done';
          sendStatusToServer('Cooking ended');
      }
  });

  resetButton.addEventListener('click', () => {
      myButton.textContent = 'Start';
      myButton.style.display = 'inline-block'; // Show the Start button
      myButton.classList.remove('end');
      myButton.classList.add('start');
      doneButton.style.display = 'none'; // Hide the DONE button
      state = 'start';
      // sendStatusToServer('Cooking reset');
  });
});

