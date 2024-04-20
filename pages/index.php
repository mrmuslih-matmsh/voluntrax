<?php
session_start();
include '../database/db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home | Voluntrax.com</title>
  <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/main.css">
  <!-- Icon CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


</head>

<body>

  <section class="navigation-bar">
    <?php include './blocks/navbar.php' ?>
  </section>

  <!-- Top container for Voluntrax -->
  <section class="top-section">
    <div class="container-fluid overflow-hidden">
      <div class="row">
        <div class="col-12 col-md-6 order-1 order-md-0 align-self-md-end">
          <div class="row py-3 py-sm-5 py-xl-9 mt-md-10 justify-content-sm-center">
            <div class="col-12 col-sm-10">
              <h2 class="display-5 fw-bolder mb-4 text-black">Empowering Volunteers, Enriching Communities</h2>
              <div class="row">
                <div class="col-12 col-xxl-8">
                  <p class="fs-5 mb-5 text-black">Join us in making a difference. Explore countless volunteer
                    opportunities tailored to your interests and schedule.</p>
                </div>
              </div>
              <div class="d-grid gap-2 d-sm-flex">
                <a href="opportunities.php" class="join-now btn bsb-btn-2xl mt-5 mt-xl-10" id="all-opp-btn">Join Now</a>
              </div>
            </div>
          </div>
        </div>
        <div class="top-image col-12 col-md-6 p-0">
          <img class="img-fluid" loading="lazy" src="../assets/images/main-bg.jpg"
            alt="Empowering Volunteers, Enriching Communities">
        </div>

      </div>
    </div>
  </section>


  <!-- Recent Volunteer opportunities -->

  <section class="opportunities bsb-blog-5 py-3 py-md-5 py-xl-8">
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
          <h2 class="display-6 mb-4 mb-md-5 text-center">Latest Volunteer Opportunities</h2>
          <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark">
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">

        <?php
        $sql = "SELECT o.*, op.* FROM opportunities op JOIN organizations o ON op.org_id = o.org_id LIMIT 8";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
          // Output data of each row
          while ($row = $result->fetch_assoc()) {
            ?>
            <div class="col-md-3 my-2">
              <div class="col">
                <div class="card rounded-30 border-0 shadow" id="card">
                  <div class="ratio ratio-16x9">
                    <img src="../assets/images/profile_pictures/organization/<?php echo $row["organization_logo"]; ?>"
                      class="card-img-top rounded-top" alt="Image">
                  </div>
                  <div class="card-body">
                    <h5 class="card-title mb-3">
                      <?php echo $row["title"]; ?>
                    </h5>
                    <div class="d-flex align-items-center mb-2">
                      <i class="fas fa-building me-2"></i>
                      <p class="card-text mb-0">
                        <?php echo $row["organization_name"]; ?>
                      </p>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                      <i class="fas fa-calendar-alt me-2"></i>
                      <p class="card-text mb-0">
                        <?php echo $row["start_date"]; ?> to
                        <?php echo $row["end_date"]; ?>
                      </p>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                      <i class="fas fa-clock me-2"></i>
                      <p class="card-text mb-0">
                        <?php echo $row["time"]; ?>
                      </p>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                      <i class="fas fa-map-marker-alt me-2"></i>
                      <p class="card-text mb-0">
                        <?php echo $row["location"]; ?>
                      </p>
                    </div>
                    <p class="card-text mb-4">
                      <?php echo $row["description"]; ?>
                    </p>
                    <a href="signup_opportunities.php?opp_id=<?php echo $row["opp_id"]; ?>"
                      class="read-more btn btn-sm float-end">Read more</a>
                  </div>
                </div>
              </div>

            </div>
            <?php
          }
        } else {
          echo "<div class='col justify-content-center'>
                    <h4 class='text-center'>No Results</h4>
                        </div>";
        }
        ?>

      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col text-center">
          <a href="opportunities.php" class="btn bsb-btn-2xl mt-5 mt-xl-10" id="all-opp-btn">All Opportunities</a>
        </div>
      </div>
    </div>
  </section>


  <!-- Voluntrax About Section -->
  <section class="about-section py-5" style=" border-top: 2px solid #FFC01E; ">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <h1 class="section-title">About Voluntrax</h1>
          <p class="section-description">At Voluntrax, we are dedicated to connecting passionate individuals with
            meaningful volunteering opportunities. Our platform serves as a bridge between volunteers and organizations,
            making it easier for both parties to find each other and collaborate towards creating positive change in
            communities.</p>
          <p class="section-description">With our user-friendly interface, volunteers can easily search for
            opportunities that align with their interests, skills, and availability. From one-time events to ongoing
            projects, there's something for everyone on Voluntrax.</p>
          <p class="section-description">We believe in the power of collective action, and our goal is to inspire and
            facilitate community engagement. Whether you're a seasoned volunteer or new to the world of giving back,
            Voluntrax welcomes you to join our mission of making the world a better place, one act of kindness at a
            time.</p>
        </div>
        <div class="col-lg-3">
          <img src="../assets/images/logo.png" class="img-fluid rounded" alt="About Voluntrax">
        </div>
      </div>
    </div>
  </section>


  <!-- Volunteer Skills -->

  <section class="bsb-skill-2 py-3 py-md-5 py-xl-8" style=" border-top: 2px solid #FFC01E; ">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-10 col-lg-8">
          <h3 class="fs-5 mb-2 text-secondary text-uppercase">Volunteer Skills</h3>
          <h2 class="display-5 mb-4">Our diverse skill set ensures effective contribution to volunteer initiatives.</h2>
        </div>
      </div>
    </div>

    <div class="container overflow-hidden">
      <div class="row gy-3 gy-lg-4">
        <div class="col-12 col-lg-6">
          <div class="card" style=" border: 1px solid #FFC01E; ">
            <div class="card-body p-4 p-xxl-5">
              <div class="row align-items-center">
                <div class="col-12 col-md-7 skill-title">
                  <h3 class="fw-bold mb-2">Community</h3>
                  <p class="text-secondary fst-italic mb-4 mb-md-0">Active involvement in community-based projects and
                    events.</p>
                </div>
                <div class="col-12 col-md-5 skill-progress">
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 95%; background-color: #FFC01E;"
                      aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-6">
          <div class="card" style=" border: 1px solid #FFC01E; ">
            <div class="card-body p-4 p-xxl-5">
              <div class="row align-items-center">
                <div class="col-12 col-md-7 skill-title">
                  <h3 class="fw-bold mb-2">Event Planning</h3>
                  <p class="text-secondary fst-italic mb-4 mb-md-0">Organizing and executing successful volunteer events
                    and initiatives.</p>
                </div>
                <div class="col-12 col-md-5 skill-progress">
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 90%; background-color: #FFC01E;"
                      aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-6">
          <div class="card" style=" border: 1px solid #FFC01E; ">
            <div class="card-body p-4 p-xxl-5">
              <div class="row align-items-center">
                <div class="col-12 col-md-7 skill-title">
                  <h3 class="fw-bold mb-2">Communication</h3>
                  <p class="text-secondary fst-italic mb-4 mb-md-0">Effective communication with volunteers,
                    stakeholders, and communities.</p>
                </div>
                <div class="col-12 col-md-5 skill-progress">
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 92%; background-color: #FFC01E;"
                      aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-6">
          <div class="card" style=" border: 1px solid #FFC01E; ">
            <div class="card-body p-4 p-xxl-5">
              <div class="row align-items-center">
                <div class="col-12 col-md-7 skill-title">
                  <h3 class="fw-bold mb-2">Problem-Solving</h3>
                  <p class="text-secondary fst-italic mb-4 mb-md-0">Finding innovative solutions to challenges
                    encountered during volunteer activities.</p>
                </div>
                <div class="col-12 col-md-5 skill-progress">
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 97%; background-color: #FFC01E;"
                      aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonial Section - Voluntrax -->
  <section class="bg-white py-5 py-xl-8" style=" border-top: 2px solid #FFC01E; ">
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
          <h2 class="fs-6 text-secondary mb-2 text-uppercase text-center">Happy Volunteers</h2>
          <p class="display-5 mb-4 mb-md-5 text-center">We strive to make volunteering a rewarding experience. See what
            our volunteers are saying about their journey with Voluntrax.</p>
          <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
        </div>
      </div>
    </div>

    <div class="container overflow-hidden">
      <div class="row gy-4 gy-md-0 gx-xxl-5">
        <div class="col-12 col-md-4">
          <div class="card shadow-sm" style=" border-top: 3px solid #FFC01E;">
            <div class="card-body p-4 p-xxl-5">
              <figure>
                <img class="img-fluid rounded rounded-circle mb-4 border border-5" loading="lazy"
                  src="../assets/images/profile_pictures/individual/pro1.jpg" alt="">
                <figcaption>
                  <div class="bsb-ratings text-warning mb-3" data-bsb-star="5" data-bsb-star-off="0"></div>
                  <blockquote class="bsb-blockquote-icon mb-4">Voluntrax has been instrumental in connecting me with
                    meaningful volunteering opportunities. I've been able to make a positive impact in my community,
                    thanks to Voluntrax.</blockquote>
                  <h4 class="mb-2">Samantha Greene</h4>
                  <h5 class="fs-6 text-secondary mb-0">Education Volunteer</h5>
                </figcaption>
              </figure>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-4">
          <div class="card shadow-sm" style=" border-top: 3px solid #FFC01E;">
            <div class="card-body p-4 p-xxl-5">
              <figure>
                <img class="img-fluid rounded rounded-circle mb-4 border border-5" loading="lazy"
                  src="../assets/images/profile_pictures/individual/pro2.jpg" alt="">
                <figcaption>
                  <div class="bsb-ratings text-warning mb-3" data-bsb-star="4" data-bsb-star-off="1"></div>
                  <blockquote class="bsb-blockquote-icon mb-4">Voluntrax has made it incredibly easy for me to find
                    volunteer opportunities that match my interests and schedule. I highly recommend it to anyone
                    looking to give back to their community.</blockquote>
                  <h4 class="mb-2">Michael Patel</h4>
                  <h5 class="fs-6 text-secondary mb-0">Environmental Volunteer</h5>
                </figcaption>
              </figure>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-4">
          <div class="card shadow-sm" style=" border-top: 3px solid #FFC01E;">
            <div class="card-body p-4 p-xxl-5">
              <figure>
                <img class="img-fluid rounded rounded-circle mb-4 border border-5" loading="lazy"
                  src="../assets/images/profile_pictures/individual/pro3.jpg" alt="">
                <figcaption>
                  <div class="bsb-ratings text-warning mb-3" data-bsb-star="5" data-bsb-star-off="0"></div>
                  <blockquote class="bsb-blockquote-icon mb-4">I've had an amazing experience volunteering through
                    Voluntrax. The platform is user-friendly, and the support from the team is exceptional. Thank you,
                    Voluntrax!</blockquote>
                  <h4 class="mb-2">David Jones</h4>
                  <h5 class="fs-6 text-secondary mb-0">Community Service Volunteer</h5>
                </figcaption>
              </figure>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



  <!--Popular Volunteer Organizations-->

  <section class="bg-white py-3 py-md-5 py-xl-8" style=" border-top: 2px solid #FFC01E; ">
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
          <h2 class="mb-4 display-5 text-center">Sri Lankan Popular Volunteer Organizations</h2>
          <p class="text-secondary mb-5 text-center lead fs-4">Explore and join these impactful organizations dedicated
            to making a difference in Sri Lanka.</p>
          <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
        </div>
      </div>
    </div>

    <div class="container overflow-hidden">
      <div class="row gy-4 gy-lg-0 gx-xxl-5">
        <div class="col-12 col-md-6 col-lg-3">
          <div class="card overflow-hidden" style=" border-top: 3px solid #FFC01E;">
            <div class="card-body p-0">
              <figure class="m-0 p-0 text-center">
                <img class="img-fluid" loading="lazy" src="../assets/images/org1.png" alt="Organization 1">
                <figcaption class="m-0 p-4">
                  <h4 class="mb-1">Hope Sri Lanka</h4>
                  <p class="text-secondary mb-0">Empowering communities through education and skill development
                    programs.</p>
                </figcaption>
              </figure>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
          <div class="card overflow-hidden" style=" border-top: 3px solid #FFC01E;">
            <div class="card-body p-0">
              <figure class="m-0 p-0 text-center">
                <img class="img-fluid" loading="lazy" src="../assets/images/org2.png" alt="Organization 2">
                <figcaption class="m-0 p-4">
                  <h4 class="mb-1">Green Warriors</h4>
                  <p class="text-secondary mb-0">Preserving Sri Lanka's natural heritage through conservation and
                    eco-friendly initiatives.</p>
                </figcaption>
              </figure>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
          <div class="card overflow-hidden" style=" border-top: 3px solid #FFC01E;">
            <div class="card-body p-0">
              <figure class="m-0 p-0 text-center">
                <img class="img-fluid" loading="lazy" src="../assets/images/org3.png" alt="Organization 3">
                <figcaption class="m-0 p-4">
                  <h4 class="mb-1">Kids Foundation</h4>
                  <p class="text-secondary mb-0">Supporting underprivileged children through healthcare, education
                    programs.</p>
                </figcaption>
              </figure>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
          <div class="card overflow-hidden" style=" border-top: 3px solid #FFC01E;">
            <div class="card-body p-0">
              <figure class="m-0 p-0 text-center">
                <img class="img-fluid" loading="lazy" src="../assets/images/org4.png" alt="Organization 4">
                <figcaption class="m-0 p-4">
                  <h4 class="mb-1">Heal Sri Lanka</h4>
                  <p class="text-secondary mb-0">Providing medical assistance and healthcare services to rural
                    communities in Sri Lanka.</p>
                </figcaption>
              </figure>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- Footer-->
  <footer class="footer">
    <?php include './blocks/footer.php' ?>
  </footer>


  <script src="https://unpkg.com/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://unpkg.com/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>

</html>