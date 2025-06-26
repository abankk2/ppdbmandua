   <style>
       h1 {
           font-size: 40px;
           margin-bottom: 10px;
       }

       p {
           font-size: 16px;
           color: #ccc;
           margin-bottom: 40px;
       }

       .countdown-container {
           display: flex;
           justify-content: center;
           gap: 20px;
           flex-wrap: wrap;
       }

       .time-box {
           background: rgb(255, 255, 255);
           border-radius: 50%;
           width: 100px;
           height: 100px;
           display: flex;
           flex-direction: column;
           justify-content: center;
           align-items: center;
       }

       .time-box span:first-child {
           font-size: 30px;
           font-weight: bold;
           color: black;
       }

       .time-box span:last-child {
           font-size: 12px;
           text-transform: uppercase;
           color: black;
       }

       .pengumuman {
           display: none;
       }
   </style>

   <section id="hero">
       <div class="container py-1">
           <div class="row justify-content-center">
               <div class="col-md-6">
                   <h1 class="text-center text-white">PENGUMUMAN HASIL SELEKSI</h1>
                   <h4 class="text-center text-white mb-3">PPDB MAN 2 KOTA CIREBON TAHUN PELAJARAN 2025/2026</h4>

                   <div class="countdown-container" id="countdown">
                       <div class="time-box">
                           <span id="days">00</span>
                           <span>Hari</span>
                       </div>
                       <div class="time-box">
                           <span id="hours">00</span>
                           <span>Jam</span>
                       </div>
                       <div class="time-box">
                           <span id="minutes">00</span>
                           <span>Menit</span>
                       </div>
                       <div class="time-box">
                           <span id="seconds">00</span>
                           <span>Detik</span>
                       </div>
                   </div>

                   <div class="pengumuman">
                       <div class="card p-3">
                           <form action="" method="post">
                               <div class="my-3">
                                   <input type="number" name="nisn" class="form-control" id="exampleFormControlInput1" placeholder="NISN">
                               </div>
                               <button class="btn btn-sm mt-3 btn-block w-100 text-white" type="submit" style="border-radius: 2em; background-color:green">CEK NISN</button>
                           </form>
                       </div>
                   </div>


               </div>
           </div>
       </div>
       </div>
       <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
           <defs>
               <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
           </defs>
           <g class="parallax">
               <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255, 255,0.7" />
               <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255, 255,0.5)" />
               <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255, 255,0.3)" />
               <use xlink:href="#gentle-wave" x="48" y="7" fill="#FFFFFF" />
           </g>
       </svg>
   </section>


   <script>
       // Target waktu: 30 Juni 2025 jam 06:00
       const targetDate = new Date("2025-06-26T13:55:00+07:00").getTime();

       const updateCountdown = () => {
           const now = new Date().getTime();
           const distance = targetDate - now;

           if (distance > 0) {
               const days = Math.floor(distance / (1000 * 60 * 60 * 24));
               const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
               const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
               const seconds = Math.floor((distance % (1000 * 60)) / 1000);

               document.getElementById("days").textContent = String(days).padStart(2, '0');
               document.getElementById("hours").textContent = String(hours).padStart(2, '0');
               document.getElementById("minutes").textContent = String(minutes).padStart(2, '0');
               document.getElementById("seconds").textContent = String(seconds).padStart(2, '0');
           } else {
               // Waktu telah tiba
               document.getElementById("countdown").style.display = "none";
               document.querySelector(".pengumuman").style.display = "block";
               clearInterval(timer);
           }
       };

       const timer = setInterval(updateCountdown, 1000);
       updateCountdown();
   </script>