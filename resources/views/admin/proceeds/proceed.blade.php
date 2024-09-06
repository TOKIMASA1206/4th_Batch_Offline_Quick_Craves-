<div class="tab-pane fade" id="v-pills-proceed" role="tabpanel" aria-labelledby="v-pills-proceed-tab">
    <div class="fp_dashboard_body">
        <div class="container">

            <div class="row justify-content-center">

                <div class="tab-pane fade col-10 show active" id="v-pills-category-1" role="tabpanel"
                    aria-labelledby="v-pills-category-tab1">
                    <div class="fp_dashboard_body row palanquin-dark-regular">

                        <div class="col-4 mt-5">
                            <div class="card" style="width:250px !important;">
                                <div class="card-body">
                                    <h5 class="card-title palanquin-dark-regular">Customer 1</h5>
                                    <span>
                                        <div class="timer-container">
                                            <div class="time-display">00:00.000</div>
                                            <div class="buttons" class="text-center mt-2">
                                                <input type="button" value="start"
                                                    class="start btn w-auto btn-sm text-white"
                                                    style="background-color: gray !important">
                                                <input type="button" value="stop"
                                                    class="stop btn btn-secondary w-auto btn-sm text-white"
                                                    style="background-color: gray !important">
                                                <input type="button" value="reset"
                                                    class="reset btn btn-secondary w-auto btn-sm text-white"
                                                    style="background-color: gray !important">
                                                <div class="d-flex justify-content-end">
                                                    <button type="submit" class="btn-red-black ms-2" data-bs-toggle="modal"
                                                        data-bs-target="#delete-proceed-{{-- $category->id --}}">
                                                        <i class="fa-regular fa-trash-can"></i>
                                                    </button>
                                                </div>
                                                @include('admin.proceeds.modal.status')
                                            </div>
                                        </div>
                                    </span>
                                </div>
                                <ul class="list-group list-group-flush">

                                    {{-- @foreach ($orders as $order) --}}
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="me-2">Pizza</span>
                                        <span class="justify-content-center">3</span>

                                        <button id="myButton1" type="submit"
                                            class="btn start text-white">Start</button>
                                        <button id="doneButton1" class="btn done text-white">DONE</button>
                                        <button id="resetButton1" class="reset btn btn-link">
                                            <i class="fa-solid fa-rotate-left text-dark"></i>
                                        </button>

                                    </li>
                                    {{-- @endforeach --}}

                                    <li class="list-group-item d-flex justify-content-between align-items-center">

                                        <span class="me-2">Burger</span>
                                        <span class="justify-content-center">2</span>

                                        <button id="myButton2" type="submit"
                                            class="btn start text-white">Start</button>
                                        <button id="doneButton2" class="btn done text-white">DONE</button>
                                        <button id="resetButton2" class="reset btn btn-link">
                                            <i class="fa-solid fa-rotate-left text-dark"></i>
                                        </button>

                                    </li>

                                    <li class="list-group-item d-flex justify-content-between align-items-center">

                                        <span class="me-2">Latte</span>
                                        <span class="justify-content-center">1</span>
                                        <button id="myButton3" type="submit"
                                            class="btn start text-white">Start</button>
                                        <button id="doneButton3" class="btn done text-white">DONE</button>
                                        <button id="resetButton3" class="reset btn btn-link">
                                            <i class="fa-solid fa-rotate-left text-dark"></i>
                                        </button>
                                    </li>

                                </ul>
                            </div>
                        </div>

                        <div class="col-4 mt-5">
                            <div class="card" style="width:250px !important;">
                                <div class="card-body">
                                    <h5 class="card-title palanquin-dark-regular">Customer 2</h5>
                                    <span>
                                        <div class="timer-container">
                                            <div class="time-display">00:00.000</div>
                                            <div class="buttons" class="text-center mt-2">
                                                <input type="button" value="start"
                                                    class="start btn w-auto btn-sm text-white"
                                                    style="background-color: gray !important">
                                                <input type="button" value="stop"
                                                    class="stop btn btn-secondary w-auto btn-sm text-white"
                                                    style="background-color: gray !important">
                                                <input type="button" value="reset"
                                                    class="reset btn btn-secondary w-auto btn-sm text-white"
                                                    style="background-color: gray !important">
                                                <div class="d-flex justify-content-end">
                                                    <button type="submit" class="btn-red-black ms-2" data-bs-toggle="modal"
                                                        data-bs-target="#delete-proceed-{{-- $category->id --}}">
                                                        <i class="fa-regular fa-trash-can"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </span>
                                </div>
                                <ul class="list-group list-group-flush">

                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="me-2">Pizza</span>
                                        <span class="justify-content-center">3</span>
                                        <button id="myButton" type="submit"
                                            class="btn start text-white">Start</button>
                                        <button id="doneButton" class="btn done text-white">DONE</button>
                                        <button id="resetButton" class="reset btn btn-link">
                                            <i class="fa-solid fa-rotate-left text-dark"></i>
                                        </button>
                                    </li>

                                    <li class="list-group-item d-flex justify-content-between align-items-center">

                                        <span class="me-2">Burger</span>
                                        <span class="justify-content-center">2</span>
                                        <button id="myButton" type="submit"
                                            class="btn start text-white">Start</button>
                                        <button id="doneButton" class="btn done text-white">DONE</button>
                                        <button id="resetButton" class="reset btn btn-link">
                                            <i class="fa-solid fa-rotate-left text-dark"></i>
                                        </button>

                                    </li>

                                    <li class="list-group-item d-flex justify-content-between align-items-center">

                                        <span class="me-2">Latte</span>
                                        <span class="justify-content-center">1</span>
                                        <button id="myButton" type="submit"
                                            class="btn start text-white">Start</button>
                                        <button id="doneButton" class="btn done text-white">DONE</button>
                                        <button id="resetButton" class="reset btn btn-link">
                                            <i class="fa-solid fa-rotate-left text-dark"></i>
                                        </button>
                                    </li>

                                </ul>
                            </div>
                        </div>

                        <div class="col-4 mt-5">
                            <div class="card" style="width:250px !important;">
                                <div class="card-body">
                                    <h5 class="card-title palanquin-dark-regular">Customer 3</h5>
                                    <span>
                                        <div class="timer-container">
                                            <div class="time-display">00:00.000</div>
                                            <div class="buttons" class="text-center mt-2">
                                                <input type="button" value="start"
                                                    class="start btn w-auto btn-sm text-white"
                                                    style="background-color: gray !important">
                                                <input type="button" value="stop"
                                                    class="stop btn btn-secondary w-auto btn-sm text-white"
                                                    style="background-color: gray !important">
                                                <input type="button" value="reset"
                                                    class="reset btn btn-secondary w-auto btn-sm text-white"
                                                    style="background-color: gray !important">
                                                <div class="d-flex justify-content-end">
                                                    <button type="submit" class="btn-red-black ms-2" data-bs-toggle="modal"
                                                        data-bs-target="#delete-proceed-{{-- $category->id --}}">
                                                        <i class="fa-regular fa-trash-can"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </span>
                                </div>
                                <ul class="list-group list-group-flush">

                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="me-2">Pizza</span>
                                        <span class="justify-content-center">3</span>
                                        <button id="myButton" type="submit"
                                            class="btn start text-white">Start</button>
                                        <button id="doneButton" class="btn done text-white">DONE</button>
                                        <button id="resetButton" class="reset btn btn-link">
                                            <i class="fa-solid fa-rotate-left text-dark"></i>
                                        </button>
                                    </li>

                                    <li class="list-group-item d-flex justify-content-between align-items-center">

                                        <span class="me-2">Burger</span>
                                        <span class="justify-content-center">2</span>
                                        <button id="myButton" type="submit"
                                            class="btn start text-white">Start</button>
                                        <button id="doneButton" class="btn done text-white">DONE</button>
                                        <button id="resetButton" class="reset btn btn-link">
                                            <i class="fa-solid fa-rotate-left text-dark"></i>
                                        </button>

                                    </li>

                                    <li class="list-group-item d-flex justify-content-between align-items-center">

                                        <span class="me-2">Latte</span>
                                        <span class="justify-content-center">1</span>
                                        <button id="myButton" type="submit"
                                            class="btn start text-white">Start</button>
                                        <button id="doneButton" class="btn done text-white">DONE</button>
                                        <button id="resetButton" class="reset btn btn-link">
                                            <i class="fa-solid fa-rotate-left text-dark"></i>
                                        </button>
                                    </li>

                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
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
</script>

<script>
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
</script>
