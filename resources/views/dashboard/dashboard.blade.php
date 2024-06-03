@extends('layouts.app')
@section('title', 'Admin|Dashboard')
@section('content')
                    <section class="row">
                        <div class="col-md-6 col-lg-4">
                            <!-- card -->
                            <article class="p-4 rounded shadow-sm border-left mb-4">
                                <a href="#" class="d-flex align-items-center">
                                    <span class="fas fa-box h5"></span>
                                    <h5 class="ml-2">Movie</h5>
                                </a>
                            </article>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <article class="p-4 rounded shadow-sm border-left mb-4">
                                <a href="#" class="d-flex align-items-center">
                                    <span class="fas fa-users h5"></span>
                                    <h5 class="ml-2">Casts</h5>
                                </a>
                            </article>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <article class="p-4 rounded shadow-sm border-left mb-4">
                                <a href="#" class="d-flex align-items-center">
                                    <span class="fas fa-user-tie h5"></span>
                                    <h5 class="ml-2">Genres</h5>
                                </a>
                            </article>
                        </div>
                    </section>
@endsection