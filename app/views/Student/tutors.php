<?php $this->view('inc/header', $data); ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/Student/tutors.css">
<div class="container">
    <!-- start of sidebar -->
    <?php $this->view('inc/sidebar'); ?>
    <!-- end of sidebar -->

    <!-- start of main part -->
    <div id="main" class="main">
        <!-- start of navbar -->
        <?php $this->view('inc/navbar', $data); ?>

        <!-- end of navbar -->

        <!-- start of content -->
        <div class="content">
          <!-- Tutor Search Section -->
          <section class="searchSection">
              <input type="text" id="searchInput" placeholder="Search for tutors by subject">
              <button id="searchButton">Search</button>
          </section>

          <!-- Most Active Tutors Section -->
          <section class="mostActiveTutors">
              <!-- Example card for the most active tutors -->
              <!-- <div class="card">
                  <!-- <img class="tutorImage" src="<?=URLROOT?>/assets/img/HeaderLady 1.png" />
                  <div class="tutorDetails">
                      <div class="tutorInfo">
                          <h2 class="tutorName">Jeanne Paige</h2>
                          <p class="tutorRole">Digital Product Designer</p>
                      </div>
                      <div class="tutorRating">
                          <div class="starRating">
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                          </div>
                          <span class="ratingValue">5.0</span>
                      </div>
                      <div class="studentCount">
                          <span class="countValue">236,568</span>
                          <span class="students">students</span>
                      </div>
                      <button class="sendMessageButton">Send message</button>
                  </div> -->
              </div> -->
              <!-- Additional cards for most active tutors will be added dynamically -->
          </section>

        </div>
    </div>

    <script>
      // Example data for most active tutors (you might fetch this from an API)
      const activeTutorsData = [
          {
              name: "Jeanne Paige",
              role: "Digital Product Designer",
              rating: 5.0,
              studentCount: 236568,
              imageUrl: "path_to_image.jpg"
          },
          {
              name: "Hanafe Mira",
              role: "Physics Tutors",
              rating: 5.0,
              studentCount: 25632,
              imageUrl: "<?=URLROOT?>/assets/img/student/hanafe.jpg"
          },
          {
              name: "Shuhail Shukry",
              role: "Chemistry Tutors",
              rating: 5.0,
              studentCount: 25632,
              imageUrl: "<?=URLROOT?>/assets/img/student/shuhail.jpg"
          },
          {
              name: "Anzer",
              role: "Biology Tutors",
              rating: 5.0,
              studentCount: 25632,
              imageUrl: "<?=URLROOT?>/assets/img/student/anzer.jpg"
          },
          {
              name: "Angela Watson",
              role: "Chemistry Tutors",
              rating: 5.0,
              studentCount: 25632,
              imageUrl: "<?=URLROOT?>/assets/img/student/angela.jpg"
          }
      ];

      const mostActiveTutorsSection = document.querySelector(".mostActiveTutors");

      activeTutorsData.forEach((tutor) => {
          const tutorCard = document.createElement("div");
          tutorCard.classList.add("card");

          tutorCard.innerHTML = `
              <img class="tutorImage" src="${tutor.imageUrl}" />
              <div class="tutorDetails">
                  <div class="tutorInfo">
                      <h2 class="tutorName">${tutor.name}</h2>
                      <p class="tutorRole">${tutor.role}</p>
                  </div>
                  <div class="tutorRating">
                      <div class="starRating">
                          <span class="fa fa-star checked"></span>
                          <span class="fa fa-star checked"></span>
                          <span class="fa fa-star checked"></span>
                          <span class="fa fa-star checked"></span>
                          <span class="fa fa-star checked"></span>
                      </div>
                      <span class="ratingValue">${tutor.rating}</span>
                  </div>
                  <div class="studentCount">
                      <span class="countValue">${tutor.studentCount}</span>
                      <span class="students">students</span>
                  </div>
                  <button class="sendMessageButton">Send message</button>
              </div>
          `;

          const sendMessageButton = tutorCard.querySelector(".sendMessageButton");
          sendMessageButton.addEventListener("click", function() {
              window.location.href = "Messages"; 
          });

          mostActiveTutorsSection.appendChild(tutorCard);
      });
    </script>
  
<?php $this->view('inc/footer'); ?>