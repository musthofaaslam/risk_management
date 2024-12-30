let timer;
let isRunning = false; // Status apakah timer sedang berjalan atau tidak
let timeLeft = 0; // Timer dimulai dari 0 detik
let initialTime = 0; // Waktu reset harus dimulai dari 0 detik

// Ambil elemen DOM
// Podomoro
const startStopButton = document.getElementById("startStopButton");
const resetButton = document.getElementById("resetButton");
const timerDisplay = document.getElementById("timerDisplay");
const statusDisplay = document.getElementById("status");
const durationInput = document.getElementById("durationInput");
//todolist
const addTodoBtn = document.getElementById("addTodoBtn");
const todoInput = document.getElementById("todoInput");
const todoDateInput = document.getElementById("todoDateInput");
const todoTimeInput = document.getElementById("todoTimeInput");
const todoList = document.getElementById("todoList");

// Load todos from localStorage
window.addEventListener("load", loadTodos);

// Event listener untuk tombol mulai/stop/lanjut
startStopButton.addEventListener("click", function() {
    if (isRunning) {
        stopTimer(); // Jika timer sedang berjalan, hentikan
    } else if (startStopButton.textContent === "Stop") {
        stopTimer(); // Jika timer sedang berjalan, hentikan
    } else if (startStopButton.textContent === "Lanjut") {
        continueTimer(); // Jika timer terhenti, lanjutkan
    } else {
        startTimer(); // Jika timer belum berjalan, mulai timer
    }
});

// Event listener untuk tombol reset
resetButton.addEventListener("click", function() {
    if (confirm("Apakah Anda yakin ingin mereset timer?")) {
        resetTimer(); // Reset jika pengguna mengonfirmasi
    }
});

// Event listener untuk menambahkan tugas
addTodoBtn.addEventListener("click", addTodo);

// Fungsi untuk memulai timer
function startTimer() {
    isRunning = true; // Tandakan timer sedang berjalan
    startStopButton.textContent = "Stop"; // Ubah tombol menjadi Stop

    timeLeft = parseInt(durationInput.value) * 60; // Ambil nilai dari input durasi dan ubah menjadi detik

    timer = setInterval(function() {
        if (timeLeft <= 0) {
            clearInterval(timer); // Stop timer ketika waktu habis
            alert("Waktu telah usai!"); // Menampilkan notifikasi waktu selesai
            startStopButton.textContent = "Start"; // Ubah tombol menjadi Start
        } else {
            timeLeft--; // Kurangi waktu setiap detik
            timerDisplay.textContent = formatTime(timeLeft); // Update tampilan timer
        }
    }, 1000); // Update setiap detik
}

// Fungsi untuk menghentikan timer
function stopTimer() {
    clearInterval(timer); // Hentikan timer
    isRunning = false; // Tandakan timer tidak berjalan
    startStopButton.textContent = "Lanjut"; // Ubah tombol menjadi Lanjut
}

// Fungsi untuk melanjutkan timer
function continueTimer() {
    isRunning = true; // Tandakan timer sedang berjalan
    startStopButton.textContent = "Stop"; // Ubah tombol menjadi Stop

    timer = setInterval(function() {
        if (timeLeft <= 0) {
            clearInterval(timer); // Stop timer ketika waktu habis
            alert("Waktu telah usai!"); // Menampilkan notifikasi waktu selesai
            startStopButton.textContent = "Start"; // Ubah tombol menjadi Start
        } else {
            timeLeft--; // Kurangi waktu setiap detik
            timerDisplay.textContent = formatTime(timeLeft); // Update tampilan timer
        }
    }, 1000); // Update setiap detik
}

// Fungsi untuk mereset timer
function resetTimer() {
    clearInterval(timer); // Hentikan timer
    isRunning = false; // Tandakan timer tidak berjalan
    timeLeft = 0; // Reset waktu ke 0 detik
    timerDisplay.textContent = formatTime(timeLeft); // Update tampilan timer ke 00:00
    startStopButton.textContent = "Start"; // Ubah tombol menjadi Start
}

// Fungsi untuk format waktu menjadi MM:SS
function formatTime(seconds) {
    const minutes = Math.floor(seconds / 60);
    const secs = seconds % 60;
    return `${String(minutes).padStart(2, "0")}:${String(secs).padStart(2, "0")}`;
}
//
//
//
//
// Fungsi untuk menambah tugas
function addTodo() {
    const taskText = todoInput.value.trim();
    const taskDate = todoDateInput.value;
    const taskTime = todoTimeInput.value;

    if (taskText && taskDate && taskTime) {
        if (todoList.children.length === 0) {
            todoList.innerHTML = "<tr><th>ID</th><th>Tugas</th><th>Waktu</th><th>Tanggal</th><th>Aksi</th></tr>";
        }

        const li = document.createElement("tr");
        li.innerHTML = `
            <td>${taskText}</td>
            <td>${taskTime}</td>
            <td>${taskDate}</td>
            <td>
                <button class="toggle-complete-btn">Selesai</button>
                <button class="delete-btn">Hapus</button>
            </td>
        `;

        // Event listener untuk mengubah status selesai
        li.querySelector(".toggle-complete-btn").addEventListener("click", function() {
            if (li.style.textDecoration === "line-through") {
                li.style.textDecoration = "";
            } else {
                li.style.textDecoration = "line-through";
            }
        });

        // Event listener untuk menghapus tugas
        li.querySelector(".delete-btn").addEventListener("click", () => {
            li.remove();
            if (todoList.children.length === 1) {
                todoList.innerHTML = "";
            }
            saveTodos();
        });

        // Tambahkan tugas ke dalam list
        todoList.appendChild(li);

        // Reset input
        todoInput.value = "";
        todoDateInput.value = "";
        todoTimeInput.value = "";

        // Simpan todo ke localStorage
        saveTodos();
    } else {
        alert("Silakan isi semua kolom!");
    }
}

// Fungsi untuk menyimpan todos ke localStorage
function saveTodos() {
    const todos = [];
    todoList.querySelectorAll("tr").forEach((row, index) => {
        if (index === 0) return; // Lewati header tabel
        const cells = row.querySelectorAll("td");
        todos.push({
            text: cells[0].textContent,
            time: cells[1].textContent,
            date: cells[2].textContent,
            completed: row.style.textDecoration === "line-through",
        });
    });
    localStorage.setItem("todos", JSON.stringify(todos));
}

// Fungsi untuk memuat todos dari localStorage
function loadTodos() {
    const todos = JSON.parse(localStorage.getItem("todos")) || [];
    if (todos.length > 0) {
        todoList.innerHTML = "<th>Kegiatan</th><th>Waktu</th><th>Tanggal</th><th>Aksi</th></tr>";
    }
    todos.forEach(todo => {
        const li = document.createElement("tr");
        li.innerHTML = `
            <td>${todo.text}</td>
            <td>${todo.time}</td>
            <td>${todo.date}</td>
            <td>
                <button class="toggle-complete-btn">Selesai</button>
                <button class="delete-btn">Hapus</button>
            </td>
        `;

        if (todo.completed) li.style.textDecoration = "line-through";

        li.querySelector(".toggle-complete-btn").addEventListener("click", function() {
            if (li.style.textDecoration === "line-through") {
                li.style.textDecoration = "";
            } else {
                li.style.textDecoration = "line-through";
            }
        });

        li.querySelector(".delete-btn").addEventListener("click", () => {
            li.remove();
            if (todoList.children.length === 1) {
                todoList.innerHTML = "";
            }
            saveTodos();
        });

        todoList.appendChild(li);
    });
}
