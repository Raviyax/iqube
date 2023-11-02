
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/courses.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/style.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/student.css">
    <title>Courses</title>
</head>
<body>
    <!-- start of sidebar -->
    <?php include "../app/views/components/sidebar.php"?>

    <div class="main">
      <div class="topbar">
        <div class="toggle" onclick="openNav()">
          <i class="fa-solid fa-bars"></i>
        </div>

        <div class="dashboardtype">
            <label>
                Courses
            </label>
        </div>
      </div>

      <div class="filter-section">
        <div class="filter">
          <div class="content">
            <div class="icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M12.0001 11.25L12.0001 20.25" stroke="#1D2026" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M12.0001 3.75L12.0001 8.25" stroke="#1D2026" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M18.7501 18.75L18.7502 20.25" stroke="#1D2026" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M18.7502 3.75L18.7501 15.75" stroke="#1D2026" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M21.0001 15.75H16.5001" stroke="#1D2026" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M5.25013 15.75L5.25006 20.25" stroke="#1D2026" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M5.25006 3.75L5.25013 12.75" stroke="#1D2026" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M3.00012 12.75H7.50012" stroke="#1D2026" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M14.2501 8.25H9.75012" stroke="#1D2026" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
            <div class="text" style="font-family: 'Courier New', Courier, monospace;">
              Filters
            </div>
          </div>
        </div>
        <div class="search">
          <div class="info">
            <div class="icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M10.875 18.75C15.2242 18.75 18.75 15.2242 18.75 10.875C18.75 6.52576 15.2242 3 10.875 3C6.52576 3 3 6.52576 3 10.875C3 15.2242 6.52576 18.75 10.875 18.75Z" stroke="#1D2026" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M16.4431 16.4434L20.9994 20.9997" stroke="#1D2026" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
            <div>
              <input type="text" placeholder="course title" class="searchbar">
            </div>
          </div>
        </div>
      </div>

      <div class="coursePane">
        <div class="course-col">
          <a href="<?=ROOT?>/singleCourse">
          <div class="courseCard">
            <div class="img">
              <img src="<?=ROOT?>/assets/img/physics.png" alt="">
            </div>
            <div class="course-info">
              <div class="tag">
                <div class="categ">Physics</div>
                <div class="price">Rs. 4000/=</div>
              </div>
              <div class="name">
                Physics | Mechanics
              </div>
            </div>
            <div class="courseFoot">
              <div class="rate">
                <div class="star">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M10.3446 14.901L14.2849 17.3974C14.7886 17.7165 15.4139 17.2419 15.2644 16.654L14.126 12.1756C14.0939 12.0509 14.0977 11.9197 14.137 11.797C14.1762 11.6743 14.2492 11.5652 14.3477 11.4822L17.8811 8.54132C18.3453 8.1549 18.1057 7.38439 17.5092 7.34567L12.8949 7.0462C12.7706 7.03732 12.6514 6.99332 12.5511 6.91931C12.4509 6.84531 12.3737 6.74435 12.3286 6.62819L10.6076 2.29436C10.5609 2.17106 10.4777 2.06492 10.3692 1.99002C10.2606 1.91511 10.1319 1.875 10 1.875C9.86813 1.875 9.73938 1.91511 9.63085 1.99002C9.52232 2.06492 9.43914 2.17106 9.39236 2.29436L7.6714 6.62819C7.62631 6.74435 7.54914 6.84531 7.4489 6.91931C7.34865 6.99332 7.22944 7.03732 7.10515 7.0462L2.49078 7.34567C1.89429 7.38439 1.65466 8.1549 2.11894 8.54132L5.65232 11.4822C5.75079 11.5652 5.82383 11.6743 5.86305 11.797C5.90226 11.9197 5.90606 12.0509 5.874 12.1756L4.81824 16.3288C4.63889 17.0343 5.38929 17.6038 5.99369 17.2209L9.65539 14.901C9.75837 14.8354 9.87792 14.8006 10 14.8006C10.1221 14.8006 10.2416 14.8354 10.3446 14.901Z" fill="#FD8E1F"/>
                  </svg>
                </div>
                <div class="rating">
                  4.8
                </div>
              </div>
              <div class="stu">
                <div class="stu-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M10 12.5C12.7614 12.5 15 10.2614 15 7.5C15 4.73858 12.7614 2.5 10 2.5C7.23858 2.5 5 4.73858 5 7.5C5 10.2614 7.23858 12.5 10 12.5Z" stroke="#564FFD" stroke-width="1.5" stroke-miterlimit="10"/>
                    <path d="M2.42102 16.8743C3.18943 15.5442 4.29431 14.4398 5.62468 13.672C6.95505 12.9042 8.46405 12.5 10.0001 12.5C11.5361 12.5 13.0451 12.9043 14.3755 13.6721C15.7058 14.44 16.8107 15.5444 17.5791 16.8744" stroke="#564FFD" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                </div>
                <div class="stu-cnt">
                  <div class="no">55</div>
                  <div class="stu-tag">Students</div>
                </div>
              </div>
            </div>
          </div>
          </a>
          <div class="courseCard">
            <div class="img">
              <img src="<?=ROOT?>/assets/img/physics.png" alt="">
            </div>
            <div class="course-info">
              <div class="tag">
                <div class="categ">Physics</div>
                <div class="price">Rs. 4000/=</div>
              </div>
              <div class="name">
                Physics | Mechanics
              </div>
            </div>
            <div class="courseFoot">
              <div class="rate">
                <div class="star">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M10.3446 14.901L14.2849 17.3974C14.7886 17.7165 15.4139 17.2419 15.2644 16.654L14.126 12.1756C14.0939 12.0509 14.0977 11.9197 14.137 11.797C14.1762 11.6743 14.2492 11.5652 14.3477 11.4822L17.8811 8.54132C18.3453 8.1549 18.1057 7.38439 17.5092 7.34567L12.8949 7.0462C12.7706 7.03732 12.6514 6.99332 12.5511 6.91931C12.4509 6.84531 12.3737 6.74435 12.3286 6.62819L10.6076 2.29436C10.5609 2.17106 10.4777 2.06492 10.3692 1.99002C10.2606 1.91511 10.1319 1.875 10 1.875C9.86813 1.875 9.73938 1.91511 9.63085 1.99002C9.52232 2.06492 9.43914 2.17106 9.39236 2.29436L7.6714 6.62819C7.62631 6.74435 7.54914 6.84531 7.4489 6.91931C7.34865 6.99332 7.22944 7.03732 7.10515 7.0462L2.49078 7.34567C1.89429 7.38439 1.65466 8.1549 2.11894 8.54132L5.65232 11.4822C5.75079 11.5652 5.82383 11.6743 5.86305 11.797C5.90226 11.9197 5.90606 12.0509 5.874 12.1756L4.81824 16.3288C4.63889 17.0343 5.38929 17.6038 5.99369 17.2209L9.65539 14.901C9.75837 14.8354 9.87792 14.8006 10 14.8006C10.1221 14.8006 10.2416 14.8354 10.3446 14.901Z" fill="#FD8E1F"/>
                  </svg>
                </div>
                <div class="rating">
                  4.8
                </div>
              </div>
              <div class="stu">
                <div class="stu-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M10 12.5C12.7614 12.5 15 10.2614 15 7.5C15 4.73858 12.7614 2.5 10 2.5C7.23858 2.5 5 4.73858 5 7.5C5 10.2614 7.23858 12.5 10 12.5Z" stroke="#564FFD" stroke-width="1.5" stroke-miterlimit="10"/>
                    <path d="M2.42102 16.8743C3.18943 15.5442 4.29431 14.4398 5.62468 13.672C6.95505 12.9042 8.46405 12.5 10.0001 12.5C11.5361 12.5 13.0451 12.9043 14.3755 13.6721C15.7058 14.44 16.8107 15.5444 17.5791 16.8744" stroke="#564FFD" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                </div>
                <div class="stu-cnt">
                  <div class="no">55</div>
                  <div class="stu-tag">Students</div>
                </div>
              </div>
            </div>
          </div>
          <div class="courseCard">
            <div class="img">
              <img src="<?=ROOT?>/assets/img/physics.png" alt="">
            </div>
            <div class="course-info">
              <div class="tag">
                <div class="categ">Physics</div>
                <div class="price">Rs. 4000/=</div>
              </div>
              <div class="name">
                Physics | Mechanics
              </div>
            </div>
            <div class="courseFoot">
              <div class="rate">
                <div class="star">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M10.3446 14.901L14.2849 17.3974C14.7886 17.7165 15.4139 17.2419 15.2644 16.654L14.126 12.1756C14.0939 12.0509 14.0977 11.9197 14.137 11.797C14.1762 11.6743 14.2492 11.5652 14.3477 11.4822L17.8811 8.54132C18.3453 8.1549 18.1057 7.38439 17.5092 7.34567L12.8949 7.0462C12.7706 7.03732 12.6514 6.99332 12.5511 6.91931C12.4509 6.84531 12.3737 6.74435 12.3286 6.62819L10.6076 2.29436C10.5609 2.17106 10.4777 2.06492 10.3692 1.99002C10.2606 1.91511 10.1319 1.875 10 1.875C9.86813 1.875 9.73938 1.91511 9.63085 1.99002C9.52232 2.06492 9.43914 2.17106 9.39236 2.29436L7.6714 6.62819C7.62631 6.74435 7.54914 6.84531 7.4489 6.91931C7.34865 6.99332 7.22944 7.03732 7.10515 7.0462L2.49078 7.34567C1.89429 7.38439 1.65466 8.1549 2.11894 8.54132L5.65232 11.4822C5.75079 11.5652 5.82383 11.6743 5.86305 11.797C5.90226 11.9197 5.90606 12.0509 5.874 12.1756L4.81824 16.3288C4.63889 17.0343 5.38929 17.6038 5.99369 17.2209L9.65539 14.901C9.75837 14.8354 9.87792 14.8006 10 14.8006C10.1221 14.8006 10.2416 14.8354 10.3446 14.901Z" fill="#FD8E1F"/>
                  </svg>
                </div>
                <div class="rating">
                  4.8
                </div>
              </div>
              <div class="stu">
                <div class="stu-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M10 12.5C12.7614 12.5 15 10.2614 15 7.5C15 4.73858 12.7614 2.5 10 2.5C7.23858 2.5 5 4.73858 5 7.5C5 10.2614 7.23858 12.5 10 12.5Z" stroke="#564FFD" stroke-width="1.5" stroke-miterlimit="10"/>
                    <path d="M2.42102 16.8743C3.18943 15.5442 4.29431 14.4398 5.62468 13.672C6.95505 12.9042 8.46405 12.5 10.0001 12.5C11.5361 12.5 13.0451 12.9043 14.3755 13.6721C15.7058 14.44 16.8107 15.5444 17.5791 16.8744" stroke="#564FFD" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                </div>
                <div class="stu-cnt">
                  <div class="no">55</div>
                  <div class="stu-tag">Students</div>
                </div>
              </div>
            </div>
          </div>
          <div class="courseCard">
            <div class="img">
              <img src="<?=ROOT?>/assets/img/physics.png" alt="">
            </div>
            <div class="course-info">
              <div class="tag">
                <div class="categ">Physics</div>
                <div class="price">Rs. 4000/=</div>
              </div>
              <div class="name">
                Physics | Mechanics
              </div>
            </div>
            <div class="courseFoot">
              <div class="rate">
                <div class="star">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M10.3446 14.901L14.2849 17.3974C14.7886 17.7165 15.4139 17.2419 15.2644 16.654L14.126 12.1756C14.0939 12.0509 14.0977 11.9197 14.137 11.797C14.1762 11.6743 14.2492 11.5652 14.3477 11.4822L17.8811 8.54132C18.3453 8.1549 18.1057 7.38439 17.5092 7.34567L12.8949 7.0462C12.7706 7.03732 12.6514 6.99332 12.5511 6.91931C12.4509 6.84531 12.3737 6.74435 12.3286 6.62819L10.6076 2.29436C10.5609 2.17106 10.4777 2.06492 10.3692 1.99002C10.2606 1.91511 10.1319 1.875 10 1.875C9.86813 1.875 9.73938 1.91511 9.63085 1.99002C9.52232 2.06492 9.43914 2.17106 9.39236 2.29436L7.6714 6.62819C7.62631 6.74435 7.54914 6.84531 7.4489 6.91931C7.34865 6.99332 7.22944 7.03732 7.10515 7.0462L2.49078 7.34567C1.89429 7.38439 1.65466 8.1549 2.11894 8.54132L5.65232 11.4822C5.75079 11.5652 5.82383 11.6743 5.86305 11.797C5.90226 11.9197 5.90606 12.0509 5.874 12.1756L4.81824 16.3288C4.63889 17.0343 5.38929 17.6038 5.99369 17.2209L9.65539 14.901C9.75837 14.8354 9.87792 14.8006 10 14.8006C10.1221 14.8006 10.2416 14.8354 10.3446 14.901Z" fill="#FD8E1F"/>
                  </svg>
                </div>
                <div class="rating">
                  4.8
                </div>
              </div>
              <div class="stu">
                <div class="stu-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M10 12.5C12.7614 12.5 15 10.2614 15 7.5C15 4.73858 12.7614 2.5 10 2.5C7.23858 2.5 5 4.73858 5 7.5C5 10.2614 7.23858 12.5 10 12.5Z" stroke="#564FFD" stroke-width="1.5" stroke-miterlimit="10"/>
                    <path d="M2.42102 16.8743C3.18943 15.5442 4.29431 14.4398 5.62468 13.672C6.95505 12.9042 8.46405 12.5 10.0001 12.5C11.5361 12.5 13.0451 12.9043 14.3755 13.6721C15.7058 14.44 16.8107 15.5444 17.5791 16.8744" stroke="#564FFD" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                </div>
                <div class="stu-cnt">
                  <div class="no">55</div>
                  <div class="stu-tag">Students</div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="course-col">
          <div class="courseCard">
            <div class="img">
              <img src="<?=ROOT?>/assets/img/physics.png" alt="">
            </div>
            <div class="course-info">
              <div class="tag">
                <div class="categ">Physics</div>
                <div class="price">Rs. 4000/=</div>
              </div>
              <div class="name">
                Physics | Mechanics
              </div>
            </div>
            <div class="courseFoot">
              <div class="rate">
                <div class="star">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M10.3446 14.901L14.2849 17.3974C14.7886 17.7165 15.4139 17.2419 15.2644 16.654L14.126 12.1756C14.0939 12.0509 14.0977 11.9197 14.137 11.797C14.1762 11.6743 14.2492 11.5652 14.3477 11.4822L17.8811 8.54132C18.3453 8.1549 18.1057 7.38439 17.5092 7.34567L12.8949 7.0462C12.7706 7.03732 12.6514 6.99332 12.5511 6.91931C12.4509 6.84531 12.3737 6.74435 12.3286 6.62819L10.6076 2.29436C10.5609 2.17106 10.4777 2.06492 10.3692 1.99002C10.2606 1.91511 10.1319 1.875 10 1.875C9.86813 1.875 9.73938 1.91511 9.63085 1.99002C9.52232 2.06492 9.43914 2.17106 9.39236 2.29436L7.6714 6.62819C7.62631 6.74435 7.54914 6.84531 7.4489 6.91931C7.34865 6.99332 7.22944 7.03732 7.10515 7.0462L2.49078 7.34567C1.89429 7.38439 1.65466 8.1549 2.11894 8.54132L5.65232 11.4822C5.75079 11.5652 5.82383 11.6743 5.86305 11.797C5.90226 11.9197 5.90606 12.0509 5.874 12.1756L4.81824 16.3288C4.63889 17.0343 5.38929 17.6038 5.99369 17.2209L9.65539 14.901C9.75837 14.8354 9.87792 14.8006 10 14.8006C10.1221 14.8006 10.2416 14.8354 10.3446 14.901Z" fill="#FD8E1F"/>
                  </svg>
                </div>
                <div class="rating">
                  4.8
                </div>
              </div>
              <div class="stu">
                <div class="stu-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M10 12.5C12.7614 12.5 15 10.2614 15 7.5C15 4.73858 12.7614 2.5 10 2.5C7.23858 2.5 5 4.73858 5 7.5C5 10.2614 7.23858 12.5 10 12.5Z" stroke="#564FFD" stroke-width="1.5" stroke-miterlimit="10"/>
                    <path d="M2.42102 16.8743C3.18943 15.5442 4.29431 14.4398 5.62468 13.672C6.95505 12.9042 8.46405 12.5 10.0001 12.5C11.5361 12.5 13.0451 12.9043 14.3755 13.6721C15.7058 14.44 16.8107 15.5444 17.5791 16.8744" stroke="#564FFD" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                </div>
                <div class="stu-cnt">
                  <div class="no">55</div>
                  <div class="stu-tag">Students</div>
                </div>
              </div>
            </div>
          </div>
          <div class="courseCard">
            <div class="img">
              <img src="<?=ROOT?>/assets/img/physics.png" alt="">
            </div>
            <div class="course-info">
              <div class="tag">
                <div class="categ">Physics</div>
                <div class="price">Rs. 4000/=</div>
              </div>
              <div class="name">
                Physics | Mechanics
              </div>
            </div>
            <div class="courseFoot">
              <div class="rate">
                <div class="star">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M10.3446 14.901L14.2849 17.3974C14.7886 17.7165 15.4139 17.2419 15.2644 16.654L14.126 12.1756C14.0939 12.0509 14.0977 11.9197 14.137 11.797C14.1762 11.6743 14.2492 11.5652 14.3477 11.4822L17.8811 8.54132C18.3453 8.1549 18.1057 7.38439 17.5092 7.34567L12.8949 7.0462C12.7706 7.03732 12.6514 6.99332 12.5511 6.91931C12.4509 6.84531 12.3737 6.74435 12.3286 6.62819L10.6076 2.29436C10.5609 2.17106 10.4777 2.06492 10.3692 1.99002C10.2606 1.91511 10.1319 1.875 10 1.875C9.86813 1.875 9.73938 1.91511 9.63085 1.99002C9.52232 2.06492 9.43914 2.17106 9.39236 2.29436L7.6714 6.62819C7.62631 6.74435 7.54914 6.84531 7.4489 6.91931C7.34865 6.99332 7.22944 7.03732 7.10515 7.0462L2.49078 7.34567C1.89429 7.38439 1.65466 8.1549 2.11894 8.54132L5.65232 11.4822C5.75079 11.5652 5.82383 11.6743 5.86305 11.797C5.90226 11.9197 5.90606 12.0509 5.874 12.1756L4.81824 16.3288C4.63889 17.0343 5.38929 17.6038 5.99369 17.2209L9.65539 14.901C9.75837 14.8354 9.87792 14.8006 10 14.8006C10.1221 14.8006 10.2416 14.8354 10.3446 14.901Z" fill="#FD8E1F"/>
                  </svg>
                </div>
                <div class="rating">
                  4.8
                </div>
              </div>
              <div class="stu">
                <div class="stu-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M10 12.5C12.7614 12.5 15 10.2614 15 7.5C15 4.73858 12.7614 2.5 10 2.5C7.23858 2.5 5 4.73858 5 7.5C5 10.2614 7.23858 12.5 10 12.5Z" stroke="#564FFD" stroke-width="1.5" stroke-miterlimit="10"/>
                    <path d="M2.42102 16.8743C3.18943 15.5442 4.29431 14.4398 5.62468 13.672C6.95505 12.9042 8.46405 12.5 10.0001 12.5C11.5361 12.5 13.0451 12.9043 14.3755 13.6721C15.7058 14.44 16.8107 15.5444 17.5791 16.8744" stroke="#564FFD" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                </div>
                <div class="stu-cnt">
                  <div class="no">55</div>
                  <div class="stu-tag">Students</div>
                </div>
              </div>
            </div>
          </div>
          <div class="courseCard">
            <div class="img">
              <img src="<?=ROOT?>/assets/img/physics.png" alt="">
            </div>
            <div class="course-info">
              <div class="tag">
                <div class="categ">Physics</div>
                <div class="price">Rs. 4000/=</div>
              </div>
              <div class="name">
                Physics | Mechanics
              </div>
            </div>
            <div class="courseFoot">
              <div class="rate">
                <div class="star">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M10.3446 14.901L14.2849 17.3974C14.7886 17.7165 15.4139 17.2419 15.2644 16.654L14.126 12.1756C14.0939 12.0509 14.0977 11.9197 14.137 11.797C14.1762 11.6743 14.2492 11.5652 14.3477 11.4822L17.8811 8.54132C18.3453 8.1549 18.1057 7.38439 17.5092 7.34567L12.8949 7.0462C12.7706 7.03732 12.6514 6.99332 12.5511 6.91931C12.4509 6.84531 12.3737 6.74435 12.3286 6.62819L10.6076 2.29436C10.5609 2.17106 10.4777 2.06492 10.3692 1.99002C10.2606 1.91511 10.1319 1.875 10 1.875C9.86813 1.875 9.73938 1.91511 9.63085 1.99002C9.52232 2.06492 9.43914 2.17106 9.39236 2.29436L7.6714 6.62819C7.62631 6.74435 7.54914 6.84531 7.4489 6.91931C7.34865 6.99332 7.22944 7.03732 7.10515 7.0462L2.49078 7.34567C1.89429 7.38439 1.65466 8.1549 2.11894 8.54132L5.65232 11.4822C5.75079 11.5652 5.82383 11.6743 5.86305 11.797C5.90226 11.9197 5.90606 12.0509 5.874 12.1756L4.81824 16.3288C4.63889 17.0343 5.38929 17.6038 5.99369 17.2209L9.65539 14.901C9.75837 14.8354 9.87792 14.8006 10 14.8006C10.1221 14.8006 10.2416 14.8354 10.3446 14.901Z" fill="#FD8E1F"/>
                  </svg>
                </div>
                <div class="rating">
                  4.8
                </div>
              </div>
              <div class="stu">
                <div class="stu-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M10 12.5C12.7614 12.5 15 10.2614 15 7.5C15 4.73858 12.7614 2.5 10 2.5C7.23858 2.5 5 4.73858 5 7.5C5 10.2614 7.23858 12.5 10 12.5Z" stroke="#564FFD" stroke-width="1.5" stroke-miterlimit="10"/>
                    <path d="M2.42102 16.8743C3.18943 15.5442 4.29431 14.4398 5.62468 13.672C6.95505 12.9042 8.46405 12.5 10.0001 12.5C11.5361 12.5 13.0451 12.9043 14.3755 13.6721C15.7058 14.44 16.8107 15.5444 17.5791 16.8744" stroke="#564FFD" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                </div>
                <div class="stu-cnt">
                  <div class="no">55</div>
                  <div class="stu-tag">Students</div>
                </div>
              </div>
            </div>
          </div>
          <div class="courseCard">
            <div class="img">
              <img src="<?=ROOT?>/assets/img/physics.png" alt="">
            </div>
            <div class="course-info">
              <div class="tag">
                <div class="categ">Physics</div>
                <div class="price">Rs. 4000/=</div>
              </div>
              <div class="name">
                Physics | Mechanics
              </div>
            </div>
            <div class="courseFoot">
              <div class="rate">
                <div class="star">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M10.3446 14.901L14.2849 17.3974C14.7886 17.7165 15.4139 17.2419 15.2644 16.654L14.126 12.1756C14.0939 12.0509 14.0977 11.9197 14.137 11.797C14.1762 11.6743 14.2492 11.5652 14.3477 11.4822L17.8811 8.54132C18.3453 8.1549 18.1057 7.38439 17.5092 7.34567L12.8949 7.0462C12.7706 7.03732 12.6514 6.99332 12.5511 6.91931C12.4509 6.84531 12.3737 6.74435 12.3286 6.62819L10.6076 2.29436C10.5609 2.17106 10.4777 2.06492 10.3692 1.99002C10.2606 1.91511 10.1319 1.875 10 1.875C9.86813 1.875 9.73938 1.91511 9.63085 1.99002C9.52232 2.06492 9.43914 2.17106 9.39236 2.29436L7.6714 6.62819C7.62631 6.74435 7.54914 6.84531 7.4489 6.91931C7.34865 6.99332 7.22944 7.03732 7.10515 7.0462L2.49078 7.34567C1.89429 7.38439 1.65466 8.1549 2.11894 8.54132L5.65232 11.4822C5.75079 11.5652 5.82383 11.6743 5.86305 11.797C5.90226 11.9197 5.90606 12.0509 5.874 12.1756L4.81824 16.3288C4.63889 17.0343 5.38929 17.6038 5.99369 17.2209L9.65539 14.901C9.75837 14.8354 9.87792 14.8006 10 14.8006C10.1221 14.8006 10.2416 14.8354 10.3446 14.901Z" fill="#FD8E1F"/>
                  </svg>
                </div>
                <div class="rating">
                  4.8
                </div>
              </div>
              <div class="stu">
                <div class="stu-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M10 12.5C12.7614 12.5 15 10.2614 15 7.5C15 4.73858 12.7614 2.5 10 2.5C7.23858 2.5 5 4.73858 5 7.5C5 10.2614 7.23858 12.5 10 12.5Z" stroke="#564FFD" stroke-width="1.5" stroke-miterlimit="10"/>
                    <path d="M2.42102 16.8743C3.18943 15.5442 4.29431 14.4398 5.62468 13.672C6.95505 12.9042 8.46405 12.5 10.0001 12.5C11.5361 12.5 13.0451 12.9043 14.3755 13.6721C15.7058 14.44 16.8107 15.5444 17.5791 16.8744" stroke="#564FFD" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                </div>
                <div class="stu-cnt">
                  <div class="no">55</div>
                  <div class="stu-tag">Students</div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="course-col">
          <div class="courseCard">
            <div class="img">
              <img src="<?=ROOT?>/assets/img/physics.png" alt="">
            </div>
            <div class="course-info">
              <div class="tag">
                <div class="categ">Physics</div>
                <div class="price">Rs. 4000/=</div>
              </div>
              <div class="name">
                Physics | Mechanics
              </div>
            </div>
            <div class="courseFoot">
              <div class="rate">
                <div class="star">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M10.3446 14.901L14.2849 17.3974C14.7886 17.7165 15.4139 17.2419 15.2644 16.654L14.126 12.1756C14.0939 12.0509 14.0977 11.9197 14.137 11.797C14.1762 11.6743 14.2492 11.5652 14.3477 11.4822L17.8811 8.54132C18.3453 8.1549 18.1057 7.38439 17.5092 7.34567L12.8949 7.0462C12.7706 7.03732 12.6514 6.99332 12.5511 6.91931C12.4509 6.84531 12.3737 6.74435 12.3286 6.62819L10.6076 2.29436C10.5609 2.17106 10.4777 2.06492 10.3692 1.99002C10.2606 1.91511 10.1319 1.875 10 1.875C9.86813 1.875 9.73938 1.91511 9.63085 1.99002C9.52232 2.06492 9.43914 2.17106 9.39236 2.29436L7.6714 6.62819C7.62631 6.74435 7.54914 6.84531 7.4489 6.91931C7.34865 6.99332 7.22944 7.03732 7.10515 7.0462L2.49078 7.34567C1.89429 7.38439 1.65466 8.1549 2.11894 8.54132L5.65232 11.4822C5.75079 11.5652 5.82383 11.6743 5.86305 11.797C5.90226 11.9197 5.90606 12.0509 5.874 12.1756L4.81824 16.3288C4.63889 17.0343 5.38929 17.6038 5.99369 17.2209L9.65539 14.901C9.75837 14.8354 9.87792 14.8006 10 14.8006C10.1221 14.8006 10.2416 14.8354 10.3446 14.901Z" fill="#FD8E1F"/>
                  </svg>
                </div>
                <div class="rating">
                  4.8
                </div>
              </div>
              <div class="stu">
                <div class="stu-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M10 12.5C12.7614 12.5 15 10.2614 15 7.5C15 4.73858 12.7614 2.5 10 2.5C7.23858 2.5 5 4.73858 5 7.5C5 10.2614 7.23858 12.5 10 12.5Z" stroke="#564FFD" stroke-width="1.5" stroke-miterlimit="10"/>
                    <path d="M2.42102 16.8743C3.18943 15.5442 4.29431 14.4398 5.62468 13.672C6.95505 12.9042 8.46405 12.5 10.0001 12.5C11.5361 12.5 13.0451 12.9043 14.3755 13.6721C15.7058 14.44 16.8107 15.5444 17.5791 16.8744" stroke="#564FFD" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                </div>
                <div class="stu-cnt">
                  <div class="no">55</div>
                  <div class="stu-tag">Students</div>
                </div>
              </div>
            </div>
          </div>
          <div class="courseCard">
            <div class="img">
              <img src="<?=ROOT?>/assets/img/physics.png" alt="">
            </div>
            <div class="course-info">
              <div class="tag">
                <div class="categ">Physics</div>
                <div class="price">Rs. 4000/=</div>
              </div>
              <div class="name">
                Physics | Mechanics
              </div>
            </div>
            <div class="courseFoot">
              <div class="rate">
                <div class="star">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M10.3446 14.901L14.2849 17.3974C14.7886 17.7165 15.4139 17.2419 15.2644 16.654L14.126 12.1756C14.0939 12.0509 14.0977 11.9197 14.137 11.797C14.1762 11.6743 14.2492 11.5652 14.3477 11.4822L17.8811 8.54132C18.3453 8.1549 18.1057 7.38439 17.5092 7.34567L12.8949 7.0462C12.7706 7.03732 12.6514 6.99332 12.5511 6.91931C12.4509 6.84531 12.3737 6.74435 12.3286 6.62819L10.6076 2.29436C10.5609 2.17106 10.4777 2.06492 10.3692 1.99002C10.2606 1.91511 10.1319 1.875 10 1.875C9.86813 1.875 9.73938 1.91511 9.63085 1.99002C9.52232 2.06492 9.43914 2.17106 9.39236 2.29436L7.6714 6.62819C7.62631 6.74435 7.54914 6.84531 7.4489 6.91931C7.34865 6.99332 7.22944 7.03732 7.10515 7.0462L2.49078 7.34567C1.89429 7.38439 1.65466 8.1549 2.11894 8.54132L5.65232 11.4822C5.75079 11.5652 5.82383 11.6743 5.86305 11.797C5.90226 11.9197 5.90606 12.0509 5.874 12.1756L4.81824 16.3288C4.63889 17.0343 5.38929 17.6038 5.99369 17.2209L9.65539 14.901C9.75837 14.8354 9.87792 14.8006 10 14.8006C10.1221 14.8006 10.2416 14.8354 10.3446 14.901Z" fill="#FD8E1F"/>
                  </svg>
                </div>
                <div class="rating">
                  4.8
                </div>
              </div>
              <div class="stu">
                <div class="stu-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M10 12.5C12.7614 12.5 15 10.2614 15 7.5C15 4.73858 12.7614 2.5 10 2.5C7.23858 2.5 5 4.73858 5 7.5C5 10.2614 7.23858 12.5 10 12.5Z" stroke="#564FFD" stroke-width="1.5" stroke-miterlimit="10"/>
                    <path d="M2.42102 16.8743C3.18943 15.5442 4.29431 14.4398 5.62468 13.672C6.95505 12.9042 8.46405 12.5 10.0001 12.5C11.5361 12.5 13.0451 12.9043 14.3755 13.6721C15.7058 14.44 16.8107 15.5444 17.5791 16.8744" stroke="#564FFD" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                </div>
                <div class="stu-cnt">
                  <div class="no">55</div>
                  <div class="stu-tag">Students</div>
                </div>
              </div>
            </div>
          </div>
          <div class="courseCard">
            <div class="img">
              <img src="<?=ROOT?>/assets/img/physics.png" alt="">
            </div>
            <div class="course-info">
              <div class="tag">
                <div class="categ">Physics</div>
                <div class="price">Rs. 4000/=</div>
              </div>
              <div class="name">
                Physics | Mechanics
              </div>
            </div>
            <div class="courseFoot">
              <div class="rate">
                <div class="star">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M10.3446 14.901L14.2849 17.3974C14.7886 17.7165 15.4139 17.2419 15.2644 16.654L14.126 12.1756C14.0939 12.0509 14.0977 11.9197 14.137 11.797C14.1762 11.6743 14.2492 11.5652 14.3477 11.4822L17.8811 8.54132C18.3453 8.1549 18.1057 7.38439 17.5092 7.34567L12.8949 7.0462C12.7706 7.03732 12.6514 6.99332 12.5511 6.91931C12.4509 6.84531 12.3737 6.74435 12.3286 6.62819L10.6076 2.29436C10.5609 2.17106 10.4777 2.06492 10.3692 1.99002C10.2606 1.91511 10.1319 1.875 10 1.875C9.86813 1.875 9.73938 1.91511 9.63085 1.99002C9.52232 2.06492 9.43914 2.17106 9.39236 2.29436L7.6714 6.62819C7.62631 6.74435 7.54914 6.84531 7.4489 6.91931C7.34865 6.99332 7.22944 7.03732 7.10515 7.0462L2.49078 7.34567C1.89429 7.38439 1.65466 8.1549 2.11894 8.54132L5.65232 11.4822C5.75079 11.5652 5.82383 11.6743 5.86305 11.797C5.90226 11.9197 5.90606 12.0509 5.874 12.1756L4.81824 16.3288C4.63889 17.0343 5.38929 17.6038 5.99369 17.2209L9.65539 14.901C9.75837 14.8354 9.87792 14.8006 10 14.8006C10.1221 14.8006 10.2416 14.8354 10.3446 14.901Z" fill="#FD8E1F"/>
                  </svg>
                </div>
                <div class="rating">
                  4.8
                </div>
              </div>
              <div class="stu">
                <div class="stu-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M10 12.5C12.7614 12.5 15 10.2614 15 7.5C15 4.73858 12.7614 2.5 10 2.5C7.23858 2.5 5 4.73858 5 7.5C5 10.2614 7.23858 12.5 10 12.5Z" stroke="#564FFD" stroke-width="1.5" stroke-miterlimit="10"/>
                    <path d="M2.42102 16.8743C3.18943 15.5442 4.29431 14.4398 5.62468 13.672C6.95505 12.9042 8.46405 12.5 10.0001 12.5C11.5361 12.5 13.0451 12.9043 14.3755 13.6721C15.7058 14.44 16.8107 15.5444 17.5791 16.8744" stroke="#564FFD" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                </div>
                <div class="stu-cnt">
                  <div class="no">55</div>
                  <div class="stu-tag">Students</div>
                </div>
              </div>
            </div>
          </div>
          <div class="courseCard">
            <div class="img">
              <img src="<?=ROOT?>/assets/img/physics.png" alt="">
            </div>
            <div class="course-info">
              <div class="tag">
                <div class="categ">Physics</div>
                <div class="price">Rs. 4000/=</div>
              </div>
              <div class="name">
                Physics | Mechanics
              </div>
            </div>
            <div class="courseFoot">
              <div class="rate">
                <div class="star">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M10.3446 14.901L14.2849 17.3974C14.7886 17.7165 15.4139 17.2419 15.2644 16.654L14.126 12.1756C14.0939 12.0509 14.0977 11.9197 14.137 11.797C14.1762 11.6743 14.2492 11.5652 14.3477 11.4822L17.8811 8.54132C18.3453 8.1549 18.1057 7.38439 17.5092 7.34567L12.8949 7.0462C12.7706 7.03732 12.6514 6.99332 12.5511 6.91931C12.4509 6.84531 12.3737 6.74435 12.3286 6.62819L10.6076 2.29436C10.5609 2.17106 10.4777 2.06492 10.3692 1.99002C10.2606 1.91511 10.1319 1.875 10 1.875C9.86813 1.875 9.73938 1.91511 9.63085 1.99002C9.52232 2.06492 9.43914 2.17106 9.39236 2.29436L7.6714 6.62819C7.62631 6.74435 7.54914 6.84531 7.4489 6.91931C7.34865 6.99332 7.22944 7.03732 7.10515 7.0462L2.49078 7.34567C1.89429 7.38439 1.65466 8.1549 2.11894 8.54132L5.65232 11.4822C5.75079 11.5652 5.82383 11.6743 5.86305 11.797C5.90226 11.9197 5.90606 12.0509 5.874 12.1756L4.81824 16.3288C4.63889 17.0343 5.38929 17.6038 5.99369 17.2209L9.65539 14.901C9.75837 14.8354 9.87792 14.8006 10 14.8006C10.1221 14.8006 10.2416 14.8354 10.3446 14.901Z" fill="#FD8E1F"/>
                  </svg>
                </div>
                <div class="rating">
                  4.8
                </div>
              </div>
              <div class="stu">
                <div class="stu-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M10 12.5C12.7614 12.5 15 10.2614 15 7.5C15 4.73858 12.7614 2.5 10 2.5C7.23858 2.5 5 4.73858 5 7.5C5 10.2614 7.23858 12.5 10 12.5Z" stroke="#564FFD" stroke-width="1.5" stroke-miterlimit="10"/>
                    <path d="M2.42102 16.8743C3.18943 15.5442 4.29431 14.4398 5.62468 13.672C6.95505 12.9042 8.46405 12.5 10.0001 12.5C11.5361 12.5 13.0451 12.9043 14.3755 13.6721C15.7058 14.44 16.8107 15.5444 17.5791 16.8744" stroke="#564FFD" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                </div>
                <div class="stu-cnt">
                  <div class="no">55</div>
                  <div class="stu-tag">Students</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
      const sidebar = document.getElementById('sidebar');
      const sidebarIcon = document.getElementById('sidebar-icon');
      const menu = document.getElementById('menu');

      sidebarIcon.addEventListener('click', () => {
          sidebar.classList.toggle('expanded');
      });

      // Close sidebar when clicking outside of it
      document.addEventListener('click', (event) => {
        if (!sidebar.contains(event.target) && sidebar.classList.contains('expanded')) {
            sidebar.classList.remove('expanded');
        }
      });

        </script>
     <script src="<?=ROOT?>/assets/js/index.js" defer></script>

</body>
</html>