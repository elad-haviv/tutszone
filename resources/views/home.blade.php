@extends('layout.base')

@section('content')
    <section class="px-4 py-5 my-5 text-center shadow-lg">
        <h1 class="display-5 fw-bold text-body-emphasis">Welcome To TutsZone!</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio quis ad velit illo autem
                amet quo sed explicabo, sunt eligendi commodi corrupti. Natus, asperiores. Rem sit totam assumenda cum
                commodi!</p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <button type="button" class="btn btn-primary btn-lg px-4 gap-3">Primary button</button>
                <button type="button" class="btn btn-outline-secondary btn-lg px-4">Secondary</button>
            </div>
        </div>
    </section>
    <section>
        <h2>Recently Added Courses:</h2>
        <div class="container-fluid d-flex gap-3">
            <div class="flipping-card">
                <div class="flipping-card-inner">
                    <div class="card text-bg-dark flipping-card-front shadow-md">
                        <img src="https://via.placeholder.com/640x480.png/004477?text=Background" class="card-img" />
                        <div class="card-img-overlay">
                            <h3 class="card-title">Course Title</h3>
                            <p class="card-text"><i class="bi bi-person-circle"></i> By John Doe</p>
                            <p class="card-text"><i class="bi bi-clock"></i> Added 3 weeks ago</p>
                            <p class="card-text">Category</p>
                        </div>
                    </div>
                    <div class="card flipping-card-back shadow-md">
                        <p class="card-text">
                            <small>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate aperiam quis vero
                                veritatis doloribus veniam quos debitis perspiciatis quaerat ipsum temporibus quod minus
                                sequi voluptas facere assumenda pariatur, dolor nam?</small>
                        </p>
                    </div>
                </div>
            </div>
            <div class="flipping-card">
                <div class="flipping-card-inner">
                    <div class="card text-bg-dark flipping-card-front shadow-md">
                        <img src="https://via.placeholder.com/640x480.png/004477?text=Background" class="card-img" />
                        <div class="card-img-overlay">
                            <h3 class="card-title">Course Title</h3>
                            <p class="card-text"><i class="bi bi-person-circle"></i> By John Doe</p>
                            <p class="card-text"><i class="bi bi-clock"></i> Added 3 weeks ago</p>
                            <p class="card-text">Category</p>
                        </div>
                    </div>
                    <div class="card flipping-card-back shadow-md">
                        <p class="card-text">
                            <small>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate aperiam quis vero
                                veritatis doloribus veniam quos debitis perspiciatis quaerat ipsum temporibus quod minus
                                sequi voluptas facere assumenda pariatur, dolor nam?</small>
                        </p>
                    </div>
                </div>
            </div>
            <div class="flipping-card">
                <div class="flipping-card-inner">
                    <div class="card text-bg-dark flipping-card-front shadow-md">
                        <img src="https://via.placeholder.com/640x480.png/004477?text=Background" class="card-img" />
                        <div class="card-img-overlay">
                            <h3 class="card-title">Course Title</h3>
                            <p class="card-text"><i class="bi bi-person-circle"></i> By John Doe</p>
                            <p class="card-text"><i class="bi bi-clock"></i> Added 3 weeks ago</p>
                            <p class="card-text">Category</p>
                        </div>
                    </div>
                    <div class="card flipping-card-back shadow-md">
                        <p class="card-text">
                            <small>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate aperiam quis vero
                                veritatis doloribus veniam quos debitis perspiciatis quaerat ipsum temporibus quod minus
                                sequi voluptas facere assumenda pariatur, dolor nam?</small>
                        </p>
                    </div>
                </div>
            </div>
            <div class="flipping-card">
                <div class="flipping-card-inner">
                    <div class="card text-bg-dark flipping-card-front shadow-md">
                        <img src="https://via.placeholder.com/640x480.png/004477?text=Background" class="card-img" />
                        <div class="card-img-overlay">
                            <h3 class="card-title">Course Title</h3>
                            <p class="card-text"><i class="bi bi-person-circle"></i> By John Doe</p>
                            <p class="card-text"><i class="bi bi-clock"></i> Added 3 weeks ago</p>
                            <p class="card-text">Category</p>
                        </div>
                    </div>
                    <div class="card flipping-card-back shadow-md">
                        <p class="card-text">
                            <small>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate aperiam quis vero
                                veritatis doloribus veniam quos debitis perspiciatis quaerat ipsum temporibus quod minus
                                sequi voluptas facere assumenda pariatur, dolor nam?</small>
                        </p>
                    </div>
                </div>
            </div>
            <div class="flipping-card">
                <div class="flipping-card-inner">
                    <div class="card text-bg-dark flipping-card-front shadow-md">
                        <img src="https://via.placeholder.com/640x480.png/004477?text=Background" class="card-img" />
                        <div class="card-img-overlay">
                            <h3 class="card-title">Course Title</h3>
                            <p class="card-text"><i class="bi bi-person-circle"></i> By John Doe</p>
                            <p class="card-text"><i class="bi bi-clock"></i> Added 3 weeks ago</p>
                            <p class="card-text">Category</p>
                        </div>
                    </div>
                    <div class="card flipping-card-back shadow-md">
                        <p class="card-text">
                            <small>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate aperiam quis vero
                                veritatis doloribus veniam quos debitis perspiciatis quaerat ipsum temporibus quod minus
                                sequi voluptas facere assumenda pariatur, dolor nam?</small>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
