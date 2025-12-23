@extends('layouts.app')

@section('title', 'About Us - School Website')
@section('description', 'Learn more about our school')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s" 
     style="background: linear-gradient(rgba(24, 29, 56, .7), rgba(24, 29, 56, .7)), url('{{ $headerBackgroundImage }}'); background-position: center center; background-repeat: no-repeat; background-size: cover;">
    <div class="container text-center py-5">
        <h1 class="display-4 text-primary animated slideInDown mb-3">About Us</h1>
        <h2 class="display-2 text-white animated slideInDown">{{ $siteSettings->admission_text }}</h2>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">About</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Historical Background Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
            <h1 class="mb-4">Historical Background of the School</h1>
        </div>
        
        <div class="row g-4">
            <!-- Origin of Name -->
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="bg-light rounded p-4 h-100">
                    <h4 class="text-primary mb-3">Origin of Name</h4>
                    <p class="mb-0">The name "Abesther" was derived from the names of the director's two children, <strong>Abel</strong> and <strong>Esther</strong>.</p>
                </div>
            </div>
            
            <!-- Establishment -->
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="bg-light rounded p-4 h-100">
                    <h4 class="text-primary mb-3">Establishment</h4>
                    <p class="mb-0">The school was established on <strong>July 27, 2007</strong>, originally as a kindergarten for young children with an initial enrollment of <strong>5 pupils</strong>.</p>
                </div>
            </div>
            
            <!-- Early Growth -->
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="bg-light rounded p-4 h-100">
                    <h4 class="text-primary mb-3">Early Growth</h4>
                    <p class="mb-0">By the end of August 2007, the total number of pupils increased to <strong>20</strong>. These students were distributed across Class 1, Middle Class, and Class 3.</p>
                </div>
            </div>
            
            <!-- Expansion -->
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="bg-light rounded p-4 h-100">
                    <h4 class="text-primary mb-3">Expansion</h4>
                    <p class="mb-0">Primary levels <strong>P.1 through P.7</strong> were introduced between the years <strong>2008 and 2012</strong>.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Historical Background End -->

<!-- Academic Achievement Start -->
<div class="container-xxl py-5 bg-light">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
            <h1 class="mb-4">Academic Achievement</h1>
            <p class="fs-5">In <strong>2012</strong>, the first group of primary seven students sat for their Primary Leaving Exams (P.L.E). Out of <strong>15 candidates</strong>:</p>
        </div>
        
        <div class="row g-4 justify-content-center">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="bg-white rounded p-4 text-center h-100 shadow">
                    <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 75px; height: 75px;">
                        <i class="fa fa-trophy fa-2x text-white"></i>
                    </div>
                    <h4 class="mb-3">Division II</h4>
                    <h2 class="text-primary mb-2">13</h2>
                    <p class="mb-0">Students passed with Division II</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="bg-white rounded p-4 text-center h-100 shadow">
                    <div class="bg-success rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 75px; height: 75px;">
                        <i class="fa fa-medal fa-2x text-white"></i>
                    </div>
                    <h4 class="mb-3">Division III</h4>
                    <h2 class="text-success mb-2">1</h2>
                    <p class="mb-0">Student passed with Division III</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="bg-white rounded p-4 text-center h-100 shadow">
                    <div class="bg-info rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 75px; height: 75px;">
                        <i class="fa fa-certificate fa-2x text-white"></i>
                    </div>
                    <h4 class="mb-3">Division IV</h4>
                    <h2 class="text-info mb-2">1</h2>
                    <p class="mb-0">Student passed with Division IV</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Academic Achievement End -->

<!-- Status Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
            <h1 class="mb-4">Current Status</h1>
            <div class="bg-primary rounded p-4">
                <h3 class="text-white mb-3">Fully Licensed & Registered</h3>
                <p class="text-white fs-5 mb-0">The school is now a fully licensed and registered primary school with registration number <strong>PPS/A/100</strong>.</p>
            </div>
        </div>
    </div>
</div>
<!-- Status End -->

<!-- Location Start -->
<div class="container-xxl py-5 bg-light">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
            <h1 class="mb-4">Location</h1>
        </div>
        
        <div class="row g-4">
            <!-- District and Sub-county -->
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="bg-white rounded p-4 h-100 shadow">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                            <i class="fa fa-map-marker-alt text-white"></i>
                        </div>
                        <h4 class="mb-0">District and Sub-county</h4>
                    </div>
                    <p class="mb-0">The school is located in <strong>Wakiso District</strong>, within <strong>Makindye Ssabagabo</strong>.</p>
                </div>
            </div>
            
            <!-- Specific Area -->
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="bg-white rounded p-4 h-100 shadow">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-success rounded-circle d-inline-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                            <i class="fa fa-home text-white"></i>
                        </div>
                        <h4 class="mb-0">Specific Area</h4>
                    </div>
                    <p class="mb-0">It is situated in a quiet suburb called <strong>Kibutika</strong>, approximately <strong>one kilometer from Ndejje Road</strong>.</p>
                </div>
            </div>
            
            <!-- Landmarks -->
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="bg-white rounded p-4 h-100 shadow">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-warning rounded-circle d-inline-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                            <i class="fa fa-motorcycle text-white"></i>
                        </div>
                        <h4 class="mb-0">Landmarks</h4>
                    </div>
                    <p class="mb-0">The site is located <strong>immediately after the Kibutika boda boda stage</strong>.</p>
                </div>
            </div>
            
            <!-- Environment -->
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="bg-white rounded p-4 h-100 shadow">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-info rounded-circle d-inline-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                            <i class="fa fa-leaf text-white"></i>
                        </div>
                        <h4 class="mb-0">Environment</h4>
                    </div>
                    <p class="mb-0">The school is set in a <strong>beautiful and quiet environment</strong> conducive to learning and the development of a pupil's academic career.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Location End -->

<!-- Vision and Mission Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
            <h1 class="mb-4">Vision and Mission</h1>
        </div>
        
        <div class="row g-4">
            <!-- Vision Statement -->
            <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="bg-primary rounded p-4 text-center h-100">
                    <div class="bg-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 75px; height: 75px;">
                        <i class="fa fa-eye fa-2x text-primary"></i>
                    </div>
                    <h4 class="text-white mb-3">Vision Statement</h4>
                    <p class="text-white mb-0">"To train up a child the way he should go and when old, he shall not depart from it" <em>(Proverbs 22:6)</em></p>
                </div>
            </div>
            
            <!-- Mission Statement -->
            <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="bg-success rounded p-4 text-center h-100">
                    <div class="bg-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 75px; height: 75px;">
                        <i class="fa fa-bullseye fa-2x text-success"></i>
                    </div>
                    <h4 class="text-white mb-3">Mission Statement</h4>
                    <p class="text-white mb-0">To impart quality education, practical skills and self-discipline in children in order to become God-fearing, creative and adaptive in modern challenging society today.</p>
                </div>
            </div>
            
            <!-- School Motto -->
            <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                <div class="bg-warning rounded p-4 text-center h-100">
                    <div class="bg-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 75px; height: 75px;">
                        <i class="fa fa-star fa-2x text-warning"></i>
                    </div>
                    <h4 class="text-white mb-3">School Motto</h4>
                    <p class="text-white mb-0 fs-5"><strong>"God gives way and wisdom"</strong></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Vision and Mission End -->

<!-- Aims and Objectives Start -->
<div class="container-xxl py-5 bg-light">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
            <h1 class="mb-4">Aims and Objectives</h1>
        </div>
        
        <div class="row g-4">
            <!-- Environment -->
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="bg-white rounded p-4 h-100 shadow">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                            <i class="fa fa-shield-alt text-white"></i>
                        </div>
                        <h4 class="mb-0">Environment</h4>
                    </div>
                    <p class="mb-0">To provide a rich, stimulating, and caring environment where children feel safe, secure, and confident.</p>
                </div>
            </div>
            
            <!-- Holistic Development -->
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="bg-white rounded p-4 h-100 shadow">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-success rounded-circle d-inline-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                            <i class="fa fa-child text-white"></i>
                        </div>
                        <h4 class="mb-0">Holistic Development</h4>
                    </div>
                    <p class="mb-0">To encourage children to become confident, creative, cooperative, and able to cope with challenges.</p>
                </div>
            </div>
            
            <!-- Skills Acquisition -->
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="bg-white rounded p-4 h-100 shadow">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-warning rounded-circle d-inline-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                            <i class="fa fa-tools text-white"></i>
                        </div>
                        <h4 class="mb-0">Skills Acquisition</h4>
                    </div>
                    <p class="mb-0">To equip children with skills and knowledge that enable them to develop as individuals in their own rights.</p>
                </div>
            </div>
            
            <!-- Academic Excellence -->
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="bg-white rounded p-4 h-100 shadow">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-info rounded-circle d-inline-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                            <i class="fa fa-graduation-cap text-white"></i>
                        </div>
                        <h4 class="mb-0">Academic Excellence</h4>
                    </div>
                    <p class="mb-0">To provide high-quality teaching and learning experiences to enable all children to achieve the highest possible standards across a broad and balanced curriculum.</p>
                </div>
            </div>
            
            <!-- Inclusivity -->
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.9s">
                <div class="bg-white rounded p-4 h-100 shadow">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-danger rounded-circle d-inline-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                            <i class="fa fa-heart text-white"></i>
                        </div>
                        <h4 class="mb-0">Inclusivity</h4>
                    </div>
                    <p class="mb-0">To meet the needs of all children, including those with special educational needs.</p>
                </div>
            </div>
            
            <!-- Social Responsibility -->
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="1.1s">
                <div class="bg-white rounded p-4 h-100 shadow">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-secondary rounded-circle d-inline-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                            <i class="fa fa-hands-helping text-white"></i>
                        </div>
                        <h4 class="mb-0">Social Responsibility</h4>
                    </div>
                    <p class="mb-0">To continuously support and retain orphans and needy children until the completion of primary education through subsidized fees.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Aims and Objectives End -->

<!-- Type of School Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
            <h1 class="mb-4">Type of School</h1>
        </div>
        
        <div class="row g-4 justify-content-center">
            <!-- Mixed Day Primary School -->
            <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
                <div class="bg-primary rounded p-5 text-center">
                    <div class="bg-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 100px; height: 100px;">
                        <i class="fa fa-school fa-3x text-primary"></i>
                    </div>
                    <h3 class="text-white mb-4">Mixed Day Primary School</h3>
                    <p class="text-white fs-5 mb-4">Children come from home in the morning to attend classes and go back home after classes.</p>
                    <div class="bg-white rounded p-3">
                        <p class="text-primary mb-0 fs-6"><strong>Community Private & Non-Profit Making</strong><br>
                        Providing education designed by the National Curriculum Center</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Type of School End -->

<!-- Other Activities Start -->
<div class="container-xxl py-5 bg-light">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
            <h1 class="mb-4">Other Activities</h1>
            <p class="fs-5">We offer a wide range of extracurricular activities to ensure holistic development of our students.</p>
        </div>
        
        <div class="row g-4">
            <!-- Educational Programs -->
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="bg-white rounded p-4 h-100 shadow">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                            <i class="fa fa-chalkboard-teacher text-white"></i>
                        </div>
                        <h4 class="mb-0">Educational Programs</h4>
                    </div>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><i class="fa fa-check text-primary me-2"></i>School talk shows on sex abuse and legal issues</li>
                        <li class="mb-2"><i class="fa fa-check text-primary me-2"></i>Abstinence education</li>
                        <li class="mb-2"><i class="fa fa-check text-primary me-2"></i>PIASCY assemblies</li>
                        <li class="mb-2"><i class="fa fa-check text-primary me-2"></i>Counseling and guidance</li>
                    </ul>
                </div>
            </div>
            
            <!-- Creative Activities -->
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="bg-white rounded p-4 h-100 shadow">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-success rounded-circle d-inline-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                            <i class="fa fa-palette text-white"></i>
                        </div>
                        <h4 class="mb-0">Creative Activities</h4>
                    </div>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><i class="fa fa-check text-success me-2"></i>Debating competitions</li>
                        <li class="mb-2"><i class="fa fa-check text-success me-2"></i>Art work for talking compounds</li>
                        <li class="mb-2"><i class="fa fa-check text-success me-2"></i>PIASCY and drama competitions</li>
                        <li class="mb-2"><i class="fa fa-check text-success me-2"></i>Skits (MDD)</li>
                    </ul>
                </div>
            </div>
            
            <!-- Spiritual & Sports -->
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="bg-white rounded p-4 h-100 shadow">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-warning rounded-circle d-inline-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                            <i class="fa fa-praying-hands text-white"></i>
                        </div>
                        <h4 class="mb-0">Spiritual Development</h4>
                    </div>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><i class="fa fa-check text-warning me-2"></i>Bible study (fellowship)</li>
                        <li class="mb-2"><i class="fa fa-check text-warning me-2"></i>Prayer sessions</li>
                        <li class="mb-2"><i class="fa fa-check text-warning me-2"></i>Moral guidance</li>
                    </ul>
                </div>
            </div>
            
            <!-- Sports Activities -->
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="bg-white rounded p-4 h-100 shadow">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-info rounded-circle d-inline-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                            <i class="fa fa-futbol text-white"></i>
                        </div>
                        <h4 class="mb-0">Sports Activities</h4>
                    </div>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><i class="fa fa-check text-info me-2"></i>Ball games</li>
                        <li class="mb-2"><i class="fa fa-check text-info me-2"></i>Sports competitions</li>
                        <li class="mb-2"><i class="fa fa-check text-info me-2"></i>Physical education</li>
                        <li class="mb-2"><i class="fa fa-check text-info me-2"></i>Team building activities</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Other Activities End -->
@endsection