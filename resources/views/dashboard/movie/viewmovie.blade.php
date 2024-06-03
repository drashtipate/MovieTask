@extends('layouts.app')
@section('title', 'Dashboard|Movie')
@section('content')

                        <section class="section">
                            <div class="card">
                                <div class="card-header">
                                    Movie Manage
                                </div>
                                <div class="card-body">
                                    <table class="display table table-striped table-bordered table-hover dataTable " id="table1">
                                        <thead>
                                            <tr class="bg-color">
                                                <th class="tbl no" style="font-size:13px;">ID</th>
                                                <th class="tbl" style="font-size:13px;">NAME</th>
                                                <th class="tbl" style="font-size:13px;">COUNTRY</th>
                                                <th class="tbl" style="font-size:13px;">DURATION</th>
                                                <th class="tbl" style="font-size:13px;">GENRES</th>
                                                <th class="tbl" style="font-size:13px;">CASTS</th>
                                                <th class="tbl" style="font-size:13px;">PRODUCTION</th>
                                                <th class="tbl" style="font-size:13px;">SHORT DESCRIPTION</th>
                                                <th class="tbl" style="font-size:16px;">MODIFY</th>
                                            </tr>    
                                        </thead>
                                        <tbody>
                                            @foreach ($movies as $key => $item)
                                                <tr>
                                                    <!-- <td class="tbl">{{ ++$key }}</td> -->
                                                    <td class="tbl" style="font-size:13px;">{{ $item->id }}</td>
                                                    <td class="tbl" style="font-size:13px;">{{ $item->m_title }}</td>
                                                    <td class="tbl" style="font-size:13px;">{{ $item->country }}</td>
                                                    <td class="tbl" style="font-size:13px;">{{ $item->Duration}}</td>
                                                    <td class="tbl" style="font-size:13px;">@foreach($item->genres as $genre)
                                                                                                {{ $genre->name }}
                                                                                            @endforeach</td>
                                                    <td class="tbl" style="font-size:13px;">@foreach($item->casts as $cast)
                                                                                                {{ $cast->name }}
                                                                                            @endforeach</td>
                                                    <td class="tbl" style="font-size:13px;">{{ $item->Production }}</td>
                                                    <td class="tbl" style="font-size:13px;">{{ $item->m_short_desc }}</td>
                                                 
                                                    <td style="text-align:center; font-size:13px;">
                                                        <a href="{{url('/movies')}}">
                                                            <span class="badge "><i class="fa fa-user-plus" aria-hidden="true"></i></span>
                                                        </a>

                                                        <a href="{{ url('/movies/edit/'.$item->id)}}">
                                                            <span class="badge "><i class="fa fa-edit"></i></span>
                                                        </a> 

                                                        <a href="{{ url('/movies/delete/'.$item->id)}}" onclick="return confirm('Are you sure to want to delete it?')">
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