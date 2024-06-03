@extends('layouts.app')
@section('title', 'Dashboard|Movie')
@section('content')

                        <section class="section">
                            <div class="card">
                                <div class="card-header">
                                    Movie Genres
                                </div>
                                <div class="card-body">
                                    <table class="display table table-striped table-bordered table-hover dataTable " id="table1">
                                        <thead>
                                            <tr class="bg-color">
                                                <th class="tbl no">ID</th>
                                                <th class="tbl name">GENRES NAME</th>
                                                <th class="tbl name text-center">MODIFY</th>
                                            </tr>    
                                        </thead>
                                        <tbody>
                                            @foreach ($genres as $key => $item)
                                                <tr>
                                                    <!-- <td class="tbl">{{ ++$key }}</td> -->
                                                    <td class="tbl">{{ $item->id }}</td>
                                                    <td class="tbl">{{ $item->name }}</td>
                                                 
                                                    <td style="text-align:center;">
                                                        <a href="{{url ('/genres')}}">
                                                            <span class="badge "><i class="fa fa-user-plus" aria-hidden="true"></i></span>
                                                        </a>

                                                        <a href="{{ url('/genres/edit/'.$item->id) }}">
                                                            <span class="badge "><i class="fa fa-edit"></i></span>
                                                        </a> 

                                                        <a href="{{ url('/genres/delete/'.$item->id)}}" onclick="return confirm('Are you sure to want to delete it?')">
                                                            <span class="badge ">
                                                                <i class="fa fa-trash"></i>
                                                            </span>
                                                        </a>   
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </section>

@endsection